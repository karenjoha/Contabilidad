<style>
	.header_cttos>div>h1 {
		padding: 0;
		margin: 4px;
		font-size: 15px;
		font-weight: 100;
		color: black;
	}

	:root {
		--primary: #157dcf;
		--greyLight: #23adad e1;
		--greyLight-2: #cbe0dd;
		--greyDark: #2d4848;
	}

	.pagination-container a {
		color: var(--greyDark);
	}

	.pagination-container {
		font-family: "Poppins", sans-serif;
		letter-spacing: 0.6px;
		line-height: 1.4;
		backface-visibility: hidden;
		-webkit-font-smoothing: subpixel-antialiased;
		display: flex;
		flex-direction: column;
		align-items: flex-end;
		color: var(--greyDark);
		font-weight: 400;
		user-select: none;
	}

	.pagination-container ul {
		display: flex;
		list-style-type: none;
		justify-content: center;
		align-items: center;
		border-radius: 0.6rem;
		background: var(--greyLight-2);
		box-shadow: 0 0.8rem 2rem rgb(90 97 129 / 5%);
		height: fit-content;
		margin: 15px 5px;
		padding: 0;
	}

	.pagination-container li {
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0.8rem;
		font-size: 1.4rem;
		cursor: pointer;
		border-radius: 0.4rem;
	}

	.pagination-container li a {
		width: 2.6rem;
		height: 3rem;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.pagination-container li a:hover {
		color: var(--primary);
	}


	.pagination-container .active {
		color: #fff;
		background: var(--primary);
		font-weight: 600;
		border: 1px solid var(--primary);
	}

	.pagination-container .active a {
		color: #fff !important;
	}

	.pagination-container .active:hover {
		background-color: var(--greyDark);
	}


	.pagination-container li.disabled {
		cursor: not-allowed;
	}

	.pagination-container .disabled a {
		pointer-events: none;
		cursor: default;
		color: gray;
	}

	.pagination-container ul>li:nth-child(1) a,
	.pagination-container>ul li:last-child a {
		display: flex;
		flex-direction: column-reverse;
		flex-wrap: nowrap;
		width: fit-content;
		color: var(--greyLight);
	}

	.pagination-container ul>li:nth-child(1) .active,
	.pagination-container>ul li:last-child {
		color: var(--greyDark);
		pointer-events: initial;
	}

	.pagination-container ul>li:nth-child(1) .active:hover,
	.pagination-container>ul li:last-child {
		color: var(--primary);
	}

	.material-icons {
		background: whitesmoke;
		border-radius: 25px;
	}
</style>
<?php
/**
 * Generar la paginación de resultados de una consulta
 * @author <D3v$/*>
 * @copyright true
 * @version 1.0
 */
class paginator {
	/**
	 * @var object $paginator_conn Conexión a base de datos
	 */
	private $paginator_conn;
	/**
	 * @var int $paginator_limit Limita la cantidad total de registros
	 */
	private $paginator_limit;
	/**
	 * @var int $paginator_page Pagina actual
	 */
	private $paginator_page;
	/**
	 * @var String $paginator_query Consulta a la base de datos
	 */
	private $paginator_query;
	/**
	 * @var int $paginator_total Número total de filas
	 */
	private $paginator_total;
	/**
	 * Se ejecuta cuando se crea una instancia de esa clase
	 * @param object $conn instacia de mysqli para la conexión a la base de datos
	 * @param string $query
	 */
	public function __construct($conn, $query) {
		$this->paginator_conn = $conn;

		$this->paginator_query = $query;
		/**
		 * @var object $rs Resultados de la conexión con método mysqli
		 */
		$rs = $this->paginator_conn->query($this->paginator_query);

		$this->paginator_total = $rs->num_rows;
	}
	/**
	 * Devuleve el valor almacenado en $paginator_total, número total de filas
	 * @return int
	 */
	public function allData() {
		return $this->paginator_total;
	}
	/**
	 * Obtiene un objeto con los resultados de la consulta
	 * @param int $limit
	 * @param int $page
	 * @return object
	 */
	public function getData($limit = 1, $page = 1) {
		/**
		 * Asigna el valor del parametro $limit a el atributo paginator_limit
		 */
		$this->paginator_limit = $limit;
		/**
		 * Asigna el valor del parametro $page a el atributo paginator_page
		 */
		$this->paginator_page = $page;
		/**
		 * @var string $query Consulta para la base de datos
		 */
		$query = '';
		/**
		 * Obtener todos los registros sin aplicar limites de paginación
		 */
		if ($this->paginator_limit == 'all') {
			/**
			 * Asigna el valor $_query (consulta original) a $query
			 */
			$query = $this->paginator_query;
		} else {
			/**
			 * Número de registros a omitir y registros a recuperar
			 */
			$query = $this->paginator_query . " LIMIT " . (($this->paginator_page - 1) * $this->paginator_limit) . ", $this->paginator_limit";
		}
		/**
		 * @var object $rs Respuesta de la base de datos a la consulta $query
		 */
		$rs = $this->paginator_conn->query($query);
		/**
		 * Verifica si la consulta devolvio al menos una fila
		 */
		if ($rs->num_rows > 0) {
			while ($row = $rs->fetch_assoc()) {
				/**
				 * Itera sobre cada fila devuleta por la consulta, cada fila se agrega  al arreglo,
				 * Si no hay filas se asigna valor '0'
				 * @var array $results
				 */
				$results[] = $row;
			}
		} else {
			$results = 0;
		}
		/**
		 * Instancia y almacena la información sobre la paginación y los datos recuperados
		 * @var object $result
		 */
		$result = new stdClass();
		/**
		 * Almacena el número de página actual
		 */
		$result->page = $this->paginator_page;
		/**
		 * Almacena el limite de registros por página
		 */
		$result->limit = $this->paginator_limit;
		/**
		 * Almacena el número total de registros
		 */
		$result->total = $this->paginator_total;
		/**
		 * Almacena los datos recuperados de la consulta
		 */
		$result->data = $results;
		return $result;
	}
	/**
	 * Genera los enlaces de paginación
	 * @param string $list_class para los estilos
	 * @param array $extraParams construir parámetros extra
	 * @return string Devuelve la cadena de HTML generada
	 */
	public function createLinks($list_class, $extraParams) {
		/**
		 * @var int $NUM_CALCULATED numero necsario para calcular las paginas y filas
		 */
		$NUM_CALCULATED = 2;
		/**
		 * @var string $href Instacia una cadena vacía que se utiliza para construir los parámetros extra
		 */
		$href = '';
		/**
		 * Retorna una cadena vacía, no se necesitara generar enlaces
		 */
		if ($this->paginator_limit == 'all') {
			return '';
		}
		if (isset($extraParams) && is_array($extraParams)) {
			/**
			 * Itera sobre sus elementos para construir los parametros
			 */
			foreach ($extraParams as $key => $value) {
				$href .= '&' . urlencode($key) . '=' . urlencode($value);
			}
		}
		/**
		 * @var int $last Asegura que siempre se obtenga un número entero en el total de filas
		 */
		$last = ceil($this->paginator_total / $this->paginator_limit);
		/**
		 * @var int $start Calcula el número de la primera página
		 */
		$start = (($this->paginator_page - $NUM_CALCULATED) > 0) ? $this->paginator_page - $NUM_CALCULATED : 1;
		/**
		 * @var int $end Calcula el número de la última página
		 */
		$end = (($this->paginator_page + $NUM_CALCULATED) < $last) ? $this->paginator_page + $NUM_CALCULATED : $last;
		/**
		 * @var string $html Contiene una sección de lista HTML
		 */
		$html = '<section class="' . $list_class . '"><ul>';
		/**
		 * @var string $class Habilita y deshabilita los botones anterior y siguiente
		 */
		$class = ($this->paginator_page == 1) ? "disabled" : "";
		/**
		 * Muestra el botón anterior
		 */
		$html .= '<li class="' . $class . '"><a href="?limit=' . $this->paginator_limit . '&page=' . ($this->paginator_page - 1) . $href . '"><small>Anterior</small><span class="material-icons">chevron_left</span></a></li>';
		/**
		 * Si el número de la primera página es > 1. Muestra etiqueta de puntos suspensivos
		 */
		if ($start > 1) {
			$html .= '<li><a href="?limit=' . $this->paginator_limit . '&page=1' . $href . '">1</a></li>';
			$html .= '<li class="disabled"><span>...</span></li>';
		}
		/**
		 * Itera desde el número de la primera página en el rango de páginas a mostrar
		 */
		for ($i = $start; $i <= $end; $i++) {
			$class = ($this->paginator_page == $i) ? "active" : "";
			/**
			 * Para cada número de página, se genera un enlace con la página correspondiente.
			 */
			$html .= '<li class="' . $class . '"><a href="?limit=' . $this->paginator_limit . '&page=' . $i . $href . '">' . $i . '</a></li>';
		}
		/**
		 * Rango de paginas a mostrar es menor que total de páginas
		 * Indicar que hay más páginas después de la última página mostrada
		 */
		if ($end < $last) {
			$html .= '<li class="disabled"><span>...</span></li>';
			$html .= '<li><a href="?limit=' . $this->paginator_limit . '&page=' . $last . $href . '">' . $last . '</a></li>';
		}
		$class = ($this->paginator_page == $last) ? "disabled" : "";
		/**
		 * Muestra el botón siguiente
		 */
		$html .= '<li class="' . $class . '"><a href="?limit=' . $this->paginator_limit . '&page=' . ($this->paginator_page + 1) . $href . '"><small>Siguiente</small><span class="material-icons">chevron_right</span></a></li>';
		$html .= '</ul></section>';
		return $html;
	}
}
/**
 * Generar la paginación de resultados de una consulta
 * @author <D3v$/*>
 * @copyright true
 * @version 1.2
 */
class paginator_PDO {
	/**
	 * @var object $paginator_conn Conexión a base de datos
	 */
	private $paginator_conn;
	/**
	 * @var int $paginator_limit Limita la cantidad total de registros
	 */
	private $paginator_limit;
	/**
	 * @var int $paginator_page Pagina actual
	 */
	private $paginator_page;
	/**
	 * @var String $paginator_query Consulta a la base de datos
	 */
	private $paginator_query;
	/**
	 * @var int $paginator_total Número total de filas
	 */
	private $paginator_total;
	/**
	 * Se ejecuta cuando se crea una instancia de esa clase
	 * @param object $conn instacia de mysqli para la conexión a la base de datos
	 * @param string $query
	 */
	public function __construct($conn, $query) {
		$this->paginator_conn = $conn;

		$this->paginator_query = $query;
		/**
		 * @var object $rs Resultados de la conexión con método mysqli
		 */
		$rs = $this->paginator_conn->query($this->paginator_query);

		$this->paginator_total = $rs->rowCount();
	}
	/**
	 * Devuleve el valor almacenado en $paginator_total, número total de filas
	 * @return int
	 */
	public function allData() {
		return $this->paginator_total;
	}
	/**
	 * Obtiene un objeto con los resultados de la consulta
	 * @param int $limit
	 * @param int $page
	 * @return object
	 */
	public function getData($limit = 1, $page = 1) {
		/**
		 * Asigna el valor del parametro $limit a el atributo paginator_limit
		 */
		$this->paginator_limit = $limit;
		/**
		 * Asigna el valor del parametro $page a el atributo paginator_page
		 */
		$this->paginator_page = $page;
		/**
		 * @var string $query Consulta para la base de datos
		 */
		$query = '';
		/**
		 * Obtener todos los registros sin aplicar limites de paginación
		 */
		if ($this->paginator_limit == 'all') {
			/**
			 * Asigna el valor $_query (consulta original) a $query
			 */
			$query = $this->paginator_query;
		} else {
			/**
			 * Número de registros a omitir y registros a recuperar
			 */
			$query = $this->paginator_query . " LIMIT " . (($this->paginator_page - 1) * $this->paginator_limit) . ", $this->paginator_limit";
		}
		/**
		 * @var object $rs Respuesta de la base de datos a la consulta $query
		 */
		$rs = $this->paginator_conn->query($query);

		$results = $rs->fetchAll(PDO::FETCH_ASSOC);
		/**
		 * Instancia y almacena la información sobre la paginación y los datos recuperados
		 * @var object $result
		 */
		$result = new stdClass();
		/**
		 * Almacena el número de página actual
		 */
		$result->page = $this->paginator_page;
		/**
		 * Almacena el limite de registros por página
		 */
		$result->limit = $this->paginator_limit;
		/**
		 * Almacena el número total de registros
		 */
		$result->total = $this->paginator_total;
		/**
		 * Almacena los datos recuperados de la consulta
		 */
		$result->data = $results;
		return $result;
	}
	/**
	 * Genera los enlaces de paginación
	 * @param string $list_class para los estilos
	 * @param array $extraParams construir parámetros extra
	 * @return string Devuelve la cadena de HTML generada
	 */
	public function createLinks($list_class, $extraParams) {
		/**
		 * @var int $NUM_CALCULATED numero necsario para calcular las paginas y filas
		 */
		$NUM_CALCULATED = 2;
		/**
		 * @var string $href Instacia una cadena vacía que se utiliza para construir los parámetros extra
		 */
		$href = '';
		/**
		 * Retorna una cadena vacía, no se necesitara generar enlaces
		 */
		if ($this->paginator_limit == 'all') {
			return '';
		}
		if (isset($extraParams) && is_array($extraParams)) {
			/**
			 * Itera sobre sus elementos para construir los parametros
			 */
			foreach ($extraParams as $key => $value) {
				$href .= '&' . urlencode($key) . '=' . urlencode($value);
			}
		}
		/**
		 * @var int $last Asegura que siempre se obtenga un número entero en el total de filas
		 */
		$last = ceil($this->paginator_total / $this->paginator_limit);
		/**
		 * @var int $start Calcula el número de la primera página
		 */
		$start = (($this->paginator_page - $NUM_CALCULATED) > 0) ? $this->paginator_page - $NUM_CALCULATED : 1;
		/**
		 * @var int $end Calcula el número de la última página
		 */
		$end = (($this->paginator_page + $NUM_CALCULATED) < $last) ? $this->paginator_page + $NUM_CALCULATED : $last;
		/**
		 * @var string $html Contiene una sección de lista HTML
		 */
		$html = '<section class="' . $list_class . '"><ul>';
		/**
		 * @var string $class Habilita y deshabilita los botones anterior y siguiente
		 */
		$class = ($this->paginator_page == 1) ? "disabled" : "";
		/**
		 * Muestra el botón anterior
		 */
		$html .= '<li class="' . $class . '"><a href="?limit=' . $this->paginator_limit . '&page=' . ($this->paginator_page - 1) . $href . '"><small>Anterior</small><span class="material-icons">chevron_left</span></a></li>';
		/**
		 * Si el número de la primera página es > 1. Muestra etiqueta de puntos suspensivos
		 */
		if ($start > 1) {
			$html .= '<li><a href="?limit=' . $this->paginator_limit . '&page=1' . $href . '">1</a></li>';
			$html .= '<li class="disabled"><span>...</span></li>';
		}
		/**
		 * Itera desde el número de la primera página en el rango de páginas a mostrar
		 */
		for ($i = $start; $i <= $end; $i++) {
			$class = ($this->paginator_page == $i) ? "active" : "";
			/**
			 * Para cada número de página, se genera un enlace con la página correspondiente.
			 */
			$html .= '<li class="' . $class . '"><a href="?limit=' . $this->paginator_limit . '&page=' . $i . $href . '">' . $i . '</a></li>';
		}
		/**
		 * Rango de paginas a mostrar es menor que total de páginas
		 * Indicar que hay más páginas después de la última página mostrada
		 */
		if ($end < $last) {
			$html .= '<li class="disabled"><span>...</span></li>';
			$html .= '<li><a href="?limit=' . $this->paginator_limit . '&page=' . $last . $href . '">' . $last . '</a></li>';
		}
		$class = ($this->paginator_page == $last) ? "disabled" : "";
		/**
		 * Muestra el botón siguiente
		 */
		$html .= '<li class="' . $class . '"><a href="?limit=' . $this->paginator_limit . '&page=' . ($this->paginator_page + 1) . $href . '"><small>Siguiente</small><span class="material-icons">chevron_right</span></a></li>';
		$html .= '</ul></section>';
		return $html;
	}
}