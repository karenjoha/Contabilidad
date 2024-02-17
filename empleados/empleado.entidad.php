<?php
class Empleado {
	//DATOS DEL USUARIO
	private $id_emple;
	private $cc_emple;
	private $nom_emple;
	private $fechan_emple;
	private $rh_emple;
	private $riesgo_emple;
	private $cargo_emple;
	private $celp_emple;
	private $celc_emple;
	private $fechain_emple;
	private $dira_emple;
	private $barrio_emple;
	private $cd_emple;
	private $nom_sos_emple;
	private $cel_sos_emple;
	private $par_sos_emple;
	private $doc_emple;

	public function __GET($k) {
		return $this->$k;
	}
	public function __SET($k, $v) {
		return $this->$k = $v;
	}
}