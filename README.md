
# contabilidad

Aplicación web de Portada Inmobiliaria para el gestionamiento

# en general: **use preferably English**

## tabla de Contenido

- [Xampp configuration](./docs/winget.md#xampp)
- [Git Tutorial](./docs/Git_Tutorial.md)
- [Naming convention](./docs/Nomenclatura.md#naming-convention)
- [Doc convention](./docs/StyleGuide.md#documentation-convention)
- [Bases de datos](./docs/db.md)
- [Winget](./docs/winget.md)
- [Nomenclatura](./docs/Nomenclatura.md)
- [Getting Started](./docs//Getting%20Started.md)
- [Style Guide](./docs/StyleGuide.md)
- [Diagramas](./docs/Diagramas.md)

### Módulos

- [Inventarios](./inventarios/README.md)
- [Mantenimientos](./mantenimientos/readme.md)
- [FACTURAS](./facturas/README.md)
- [Terminación de contratos](./terminacion_contratos/readme.md)
- [Dispositivos](./dispositivos/readme.md)
- [Archivos](./archivos/readme.md)
- [Inmuebles](./inmuebles/README.md)
- [Usuarios](./usuarios/readme.md)
- [Contratos](./contratos/docs/readme.md)
- [Entregas](./recibimientos/rec_simi/README.md)

LA BD SE LLAMA CONTABILIDAD


usuarios
	#	Nombre	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Comentarios	Extra	Acción
	1	id Primaria	int(6)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar
	2	doc_identidad	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	3	usuario	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	4	email	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	5	nombres	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	6	apellidos	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	7	contrasena	varchar(255)	utf8_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	8	rol	int(6)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar



log visitas
	1	id_log Primaria	int(11)			No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar
	2	usuario	varchar(255)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	3	fecha_ingreso	datetime			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	4	fecha_salida	datetime			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar


FACTURAS
	1	id_factura Primaria	int(11)			No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar
	2	num_factura	int(20)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	3	fecha_registro	varchar(25)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	4	empleado_registra	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	5	descripcion	varchar(50)	utf8mb4_general_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
