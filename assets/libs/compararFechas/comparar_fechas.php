<?php
function compararFechas($primera, $segunda) {
	$cache_file = __DIR__ . '/festivos_cache.json';

	// Obtenemos el año actual y creamos la URL de consulta a la API segun este año
	$year = date('Y');
	$cache_data = [];

	if (file_exists($cache_file)) {
        $cache_data = json_decode(file_get_contents($cache_file), true);
    }

	$cache_year = isset($cache_data['year']) ? $cache_data['year'] : null;

	// Verificar si el archivo de caché no existe o si el año es diferente para actualizar los datos
    if (!$cache_year || $cache_year !== $year) {
        // Creamos la URL de consulta a la API según el nuevo año
        $url  = 'https://date.nager.at/api/v3/PublicHolidays/' . $year . '/CO';

        // Hacer la petición a la API y almacenar los datos en caché con el nuevo año
        $data = file_get_contents($url);
        $cache_data = [
            'year' => $year,
            'holidays' => json_decode($data, true)
        ];
        file_put_contents($cache_file, json_encode($cache_data));
    }

	// Obtenemos los festivos del año actual del archivo de caché
    $fechas_festivas = $cache_data['holidays'];
    $fechas_festivas = array_column($fechas_festivas, 'date');

	// A partir de las fechas recibidas creamos objetos con el formato DateTime y un intervalo de 1 día para ir sumando
	$fecha_inicio = new DateTime($primera);
	$fecha_final  = new DateTime($segunda);
	$intervalo    = new DateInterval('P1D');

	// Creamos un arreglo para las fechas transcurridas y clonamos fecha_inicio para no afectar el objeto principal
	$fechas_transcurridas = [];
	$fecha_actual         = clone $fecha_inicio;

	// Recorremos todas las fechas que transcurren entre la de inicio y la de final y las guardamos en un arreglo
	while ($fecha_actual < $fecha_final) {
		$fechas_transcurridas[] = $fecha_actual->format('Y-m-d');
		$fecha_actual->add($intervalo);
	}

	// Detectamos entre las fechas transcurridas cuales coinciden con los festivos
	$fechas_trans_festivas = array_intersect($fechas_transcurridas, $fechas_festivas);

	// Contamos los días festivos
	$dias_festivos = count($fechas_trans_festivas);

	// Contamos los días transcurridos
	$dias_transcurridos = count($fechas_transcurridas);

	// Restamos los días festivos
	$dias_sin_festivos = $dias_transcurridos - $dias_festivos;

	// Detectamos los domingos entre las fechas transcurridas
	$domingos = 0;
	foreach ($fechas_transcurridas as $fecha) {
		$fecha_actual = new DateTime($fecha);
		$dia_semana   = $fecha_actual->format('w'); // Obtener el día de la semana (0 para domingo, 6 para sábado)
		if ($dia_semana == 0 && !in_array($fecha, $fechas_trans_festivas)) {
			$domingos++;
		}
	}

	$dias_sin_festivos -= $domingos;

	return $dias_sin_festivos;
}