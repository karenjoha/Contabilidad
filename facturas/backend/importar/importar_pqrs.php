<?php

require_once "../conexion/conexion.php";
 //Reemplaza las comillas
function QuitarComillas($campos)
{

        $campos = preg_replace("['\"]", '', $campos);
        return $campos;
}

//Esta función toma una cadena y reemplaza las ocurrencias de "TRUE" o "true"
function formatoCambiarTrue($gdpr)
{
	// Reemplazar "TRUE" con "VERDADERO" (mayúsculas)
	$gdpr = str_replace('TRUE', 'VERDADERO', $gdpr);

	// Reemplazar "true" con "VERDADERO" (minúsculas)
   $gdpr = str_replace('true', 'VERDADERO', $gdpr);

   // Devolver la cadena formateada
   return $gdpr;
	}

	//Funcion para darle formato a la fecha
	function formatoSepararFecha($fecha){

	// Dividir la cadena de fecha en dos partes: el mes y el resto de la fecha
    $fecha_separada = explode(" ", $fecha);

	// Definir un arreglo asociativo para mapear nombres de meses a números de mes
    $meses = array(
        'Ene' => '01',
        'Feb' => '02',
        'Mar' => '03',
        'Abr' => '04',
        'May' => '05',
        'Jun' => '06',
        'Jul' => '07',
        'Ago' => '08',
        'Sep' => '09',
        'Oct' => '10',
        'Nov' => '11',
        'Dic' => '12'
    );

	//Verificacion y manejo de errores
	if (!$fecha_separada[0]) {
		// Lanzar una excepción de error si la fecha está incompleta
		throw new Exception("fail");
	}

	// Convertir el nombre del mes en número de mes usando el arreglo de meses
    $fecha_separada[0] = $meses[$fecha_separada[0]];
	// Reconstruir la fecha en el formato deseado: 'dd mm aaaa'
    $fecha = $fecha_separada[1] . " " . $fecha_separada[0] . " " . $fecha_separada[2];
	//Devuelve la fecha con el formato correcto
    return $fecha;
}


//Funcion para quitar comas de una cadena
function remplazarComas($comas) {

	$comas = preg_replace("[,]", '', $comas);
	return $comas;

}

//funcion para comparar strings ya sea en mayusculas o minusculas con UTF-8
function strcasecmp_utf8($str1, $str2) {
	return strcmp(mb_strtolower($str1, 'UTF-8'), mb_strtolower($str2, 'UTF-8'));
}

// Función para mostrar mensajes de error
function msgError($message) {
	printf("<script type='text/javascript'>alert('$message');</script>"); //segun sea el caso imprime el $message correspondiente
	printf("<script>window.location='index_importar.php';</script>"); //Redireccionanmiento al index_importar.php para que corriga el error presentado
	die();
}


// Verifica si se ha enviado un archivo
if (isset($_FILES['archivo'])) {
    $fileContent = $_FILES['archivo']['tmp_name']; // Obtiene la ubicación temporal del archivo
    $file = fopen($fileContent, "r"); // Abre el archivo en modo de lectura

	// Verifica si se pudo abrir el archivo
	if ($file !== false) {
		$header = fgetcsv($file);

		// Verifica si el archivo tiene 11 columnas
		if (count($header) !== 8) {
			fclose($file);
			msgError('El archivo debe tener 8 columnas, por favor carga el documento correcto');
		}
		//verifica que el documento contenga registros
		if (feof($file)) {
			fclose($file);
			msgError('El archivo está vacío, carga otro por favor'); //Mensaje de error si la condicion no se cumple
		}
		//se inicializa los contadores
		$repetidos = 0;
		$uniqes    = 0;
		//Verificación de si el archivo esta listo para entrar en el proceso
		while (($data = fgetcsv($file)) !== false) {

		//Formateo y limpieza del archivo CSV subido
        $data[7]= formatoCambiarTrue($data[7]);

        //Además se define su formato
        $data[3] = strtoupper($data[3]);
        $data[6] = strtoupper($data[6]);
        $data[1] = strtoupper($data[1]);

		// Formateo de la fecha y tratamiento con la función remplazarComas
		try {

			$data[0] = formatoSepararFecha($data[0]);
			$fechaFormateada1 = remplazarComas($data[0]);
		} catch (\Throwable $th) {
			continue;
		}

		//Funcion quitar comillas
        $data[1] = QuitarComillas($data[1]);
        $data[2] = QuitarComillas($data[2]);
        $data[3] = QuitarComillas($data[3]);
        $data[4] = QuitarComillas($data[4]);
        $data[5] = QuitarComillas($data[5]);
        $data[6] = QuitarComillas($data[6]);
        $data[7] = QuitarComillas($data[7]);

		//Consulta y validacion de posibles registros repetidos
		$stmtCheck = Conexion::conectar()->prepare("SELECT COUNT(*) as repetidos FROM facturas WHERE mensaje LIKE :mensaje");
		$stmtCheck->bindParam(':mensaje', $data[6]); //Validacion por campo link_carta
		$stmtCheck->execute();
		$registroExistente = $stmtCheck->fetchColumn();

		//Validacion de registro existente
		if ($registroExistente >= 1) {
			$repetidos++; //Incrementa el contador de registros repetidos
			continue; // Termina la ejecución de esta iteración
		}
		$uniqes++; // Incrementa el contador de registros únicos

		try {
			// Prepara la consulta SQL y realiza inserciones
			$stmt = Conexion::conectar()->prepare("INSERT INTO facturas(
                num_factura,
                fecha_registro,
                descripcion,
                empleado_registra,
            VALUES(
				:fecha,
				:num_factura,
				:descripcion,
				:empleado_registra,
				)");

				// Enlaza los parametros a los marcadores
				$stmt->bindParam(':fecha', $fechaFormateada1);/*FECHA*/
				$stmt->bindParam(':num_factura', $data[1] );/*TIPO_DOC*/
				$stmt->bindParam(':descripcion', $data[2]);/*IDENTIFICACION*/
				$stmt->bindParam(':empleado_registra', $data[3]);/*NOMBRES_APELLIDOS*/
				$stmt->execute();
		} catch (PDOException $e) {
			// Capturar excepción de PDO (base de datos) en caso de error
			die("Error de base de datos: " . $e->getMessage());

		}

    }
	fclose($file); // Cierra del proceso


	}
	//  Muestra un mensaje de éxito y redirige
	if ($repetidos > 0) {

		// Si hay registros repetidos, muestra una alerta con la cantidad de registros omitidos.
		printf("<script type='text/javascript'>alert('Se omitieron $repetidos registros repetidos.');</script>");
	}
	// Muestra una alerta con la cantidad de registros registrados con éxito.
	printf("<script type='text/javascript'>alert('Se registraron $uniqes registros con exito!'); </script>");

	// Redirige al usuario a la página principal del modulo.
	printf("<script> window.location='../../frontend/index.php';</script>");

}