<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: http://10.1.1.8/contabilidad/login.php");
}
$usuario = $_SESSION['usuario'];

if (isset($_SESSION['logged']) === FALSE) {
	header("Location: http://10.1.1.8/contabilidad/login.php");
}
//if($_SESSION['rol']==1) {
//if(isset($_SESSION['logged']) === TRUE) {
//		echo '<script language="javascript">alert("BIENVENIDO.");</script>';

//echo "<script type='text/javascript'>alert('$usuario');</script>";
//header("Location: register.php");
//}
elseif ($_SESSION['rol'] == 1 or $_SESSION['rol'] == 5) {
	require 'db.php';
} else {
	# code...
	echo '<script language="javascript">alert("NO ESTAS AUTORIZADO PARA INGRESAR A ESTE MODULO.");</script>';
	echo '<script language="javascript">location.assign("index.php");</script>';
	//header("Location: index.php");
}

class EmpleadoModel {
	private $pdo;

	public function __CONSTRUCT() {
		try {
			$this->pdo = new PDO('mysql:host=localhost;dbname=contabilidad', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar() {
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM empleados");
			$stm->execute();

			foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
				$emple = new Empleado();

				//INFORMACION DEL EMPLEADO
				$emple->__SET('id_emple', $r->id_emple);
				$emple->__SET('cc_emple', $r->cc_emple);
				$emple->__SET('nom_emple', $r->nom_emple);
				$emple->__SET('fechan_emple', $r->fechan_emple);
				$emple->__SET('rh_emple', $r->rh_emple);
				$emple->__SET('riesgo_emple', $r->riesgo_emple);
				$emple->__SET('cargo_emple', $r->cargo_emple);
				$emple->__SET('celp_emple', $r->celp_emple);
				$emple->__SET('celc_emple', $r->celc_emple);
				$emple->__SET('fechain_emple', $r->fechain_emple);
				$emple->__SET('dira_emple', $r->dira_emple);
				$emple->__SET('barrio_emple', $r->barrio_emple);
				$emple->__SET('cd_emple', $r->cd_emple);
				$emple->__SET('nom_sos_emple', $r->nom_sos_emple);
				$emple->__SET('cel_sos_emple', $r->cel_sos_emple);
				$emple->__SET('par_sos_emple', $r->par_sos_emple);
				$emple->__SET('doc_emple', $r->doc_emple);




				$result[] = $emple;
			}

			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id_emple) {
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM empleados WHERE id_emple = ?");


			$stm->execute(array($id_emple));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$emple = new Empleado();
			//INFORMACION DEL EMPLEADO
			$emple->__SET('id_emple', $r->id_emple);
			$emple->__SET('cc_emple', $r->cc_emple);
			$emple->__SET('nom_emple', $r->nom_emple);
			$emple->__SET('fechan_emple', $r->fechan_emple);
			$emple->__SET('rh_emple', $r->rh_emple);
			$emple->__SET('riesgo_emple', $r->riesgo_emple);
			$emple->__SET('cargo_emple', $r->cargo_emple);
			$emple->__SET('celp_emple', $r->celp_emple);
			$emple->__SET('celc_emple', $r->celc_emple);
			$emple->__SET('fechain_emple', $r->fechain_emple);
			$emple->__SET('dira_emple', $r->dira_emple);
			$emple->__SET('barrio_emple', $r->barrio_emple);
			$emple->__SET('cd_emple', $r->cd_emple);
			$emple->__SET('nom_sos_emple', $r->nom_sos_emple);
			$emple->__SET('cel_sos_emple', $r->cel_sos_emple);
			$emple->__SET('par_sos_emple', $r->par_sos_emple);
			$emple->__SET('doc_emple', $r->doc_emple);


			return $emple;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id_emple) {
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM empleados WHERE id_emple = ?");

			$stm->execute(array($id_emple));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(Empleado $data) {
		try {
			$sql = "UPDATE empleados SET
						cc_emple     = ?,
						nom_emple     = ?,
						fechan_emple     = ?,
						rh_emple     = ?,
						riesgo_emple     = ?,
						cargo_emple     = ?,
						celp_emple     = ?,
						celc_emple     = ?,
						fechain_emple     = ?,
						dira_emple     = ?,
						barrio_emple     = ?,
						cd_emple     = ?,
						nom_sos_emple     = ?,
						cel_sos_emple     = ?,
						par_sos_emple     = ?,
						doc_emple     = ?

				    	WHERE id_emple = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						//INFORMACION DEL EMPLEADO
						$data->__GET('cc_emple'),
						$data->__GET('nom_emple'),
						$data->__GET('fechan_emple'),
						$data->__GET('rh_emple'),
						$data->__GET('riesgo_emple'),
						$data->__GET('cargo_emple'),
						$data->__GET('celp_emple'),
						$data->__GET('celc_emple'),
						$data->__GET('fechain_emple'),
						$data->__GET('dira_emple'),
						$data->__GET('barrio_emple'),
						$data->__GET('cd_emple'),
						$data->__GET('nom_sos_emple'),
						$data->__GET('cel_sos_emple'),
						$data->__GET('par_sos_emple'),
						$data->__GET('doc_emple'),

						$data->__GET('id_emple')

					)
				);

		} catch (Exception $e) {
			echo "EL EMPLEADO HA SIDO ACTUALIZADO CON EXITO";
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data) {
		try {
			$sql = "INSERT INTO empleados (cc_emple,nom_emple,fechan_emple,rh_emple,riesgo_emple,cargo_emple,celp_emple,celc_emple,fechain_emple,dira_emple,barrio_emple,cd_emple,nom_sos_emple,cel_sos_emple,par_sos_emple,doc_emple)
		       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(

						//INFORMACION DEL EMPLEADO
						$data->__GET('cc_emple'),
						$data->__GET('nom_emple'),
						$data->__GET('fechan_emple'),
						$data->__GET('rh_emple'),
						$data->__GET('riesgo_emple'),
						$data->__GET('cargo_emple'),
						$data->__GET('celp_emple'),
						$data->__GET('celc_emple'),
						$data->__GET('fechain_emple'),
						$data->__GET('dira_emple'),
						$data->__GET('barrio_emple'),
						$data->__GET('cd_emple'),
						$data->__GET('nom_sos_emple'),
						$data->__GET('cel_sos_emple'),
						$data->__GET('par_sos_emple'),
						$data->__GET('doc_emple'),

					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}

//

if (!isset($_POST['buscar'])) {

	$_POST['buscar'] = "";

	$buscar = $_POST['buscar'];

}

$buscar = $_POST['buscar'];

$SQL_READ = "SELECT * FROM empleados WHERE id_emple LIKE '%" . $buscar . "%' OR cc_emple LIKE '%" . $buscar . "%' OR nom_emple LIKE '%" . $buscar . "%' OR fechan_emple LIKE '%" . $buscar . "%' OR rh_emple LIKE '%" . $buscar . "%' OR riesgo_emple LIKE '%" . $buscar . "%' OR cargo_emple LIKE '%" . $buscar . "%' OR celp_emple LIKE '%" . $buscar . "%' OR celc_emple LIKE '%" . $buscar . "%' OR fechain_emple LIKE '%" . $buscar . "%' OR dira_emple LIKE '%" . $buscar . "%' OR barrio_emple LIKE '%" . $buscar . "%' OR cd_emple LIKE '%" . $buscar . "%' OR nom_sos_emple LIKE '%" . $buscar . "%' OR cel_sos_emple LIKE '%" . $buscar . "%' OR par_sos_emple LIKE '%" . $buscar . "%' OR doc_emple LIKE '%" . $buscar . "%'";

$db        = new DB();
$sql_query = $db->connect()->query($SQL_READ);

?>