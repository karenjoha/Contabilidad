<?php
class Usuario {
	//DATOS DEL USUARIO
	private $id;
	private $doc_identidad;
	private $usuario;
	private $email;
	private $nombres;
	private $apellidos;
	private $contrasena;
	private $rol;

	public function __GET($k) {
		return $this->$k;
	}
	public function __SET($k, $v) {
		return $this->$k = $v;
	}
}

class Usuarioh {
	//DATOS DEL USUARIO
	private $action;
	private $revision;
	private $dt_datetime;
	private $id;
	private $doc_identidad;
	private $nombres;
	private $apellidos;
	private $email;
	private $usuario;
	private $password;
	private $rol;


	public function __GET($k) {
		return $this->$k;
	}
	public function __SET($k, $v) {
		return $this->$k = $v;
	}
}
