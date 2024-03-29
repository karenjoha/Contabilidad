
# gestionadministrativa

´´´sql´´´
CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    doc_identidad VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    usuario VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    email VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    nombres VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    apellidos VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    contrasena VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    rol INT(6) NOT NULL,
    firma varchar(255)
);
´´´


CREATE TABLE FACTURAS (
    id_factura INT(11) AUTO_INCREMENT PRIMARY KEY,
    num_factura INT(20) NOT NULL,
    fecha_registro VARCHAR(25) COLLATE utf8mb4_general_ci NOT NULL,
    empleado_registra VARCHAR(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
    descripcion VARCHAR(50) COLLATE utf8mb4_general_ci NOT NULL
);
CREATE TABLE log_visitas (
    id_log INT(11) AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) COLLATE utf8mb4_general_ci NOT NULL,
    fecha_ingreso DATETIME NOT NULL,
    fecha_salida DATETIME DEFAULT NULL
);

CREATE TABLE eventoscalendar (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  evento VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  color_evento VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  fecha_inicio VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  fecha_fin VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL
);

-- Creación de la tabla "alumno"
CREATE TABLE alumno (
    id_alumno INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre_alum VARCHAR(255) NOT NULL,
    primer_apellido VARCHAR(255) NOT NULL,
    segundo_apellido VARCHAR(255),
    tipo_documento VARCHAR(50) NOT NULL,
    documento VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    sexo VARCHAR(20) NOT NULL,
    lugar_nacimiento VARCHAR(255),
    nacionalidad VARCHAR(255),
    direccion VARCHAR(255) NOT NULL,
    ciudad VARCHAR(50) NOT NULL,
    rh VARCHAR(10) NOT NULL,
    barrio VARCHAR(255),
    estrato INT(11),
    comuna VARCHAR(50),
    celular VARCHAR(20) NOT NULL,
    segundo_celular VARCHAR(20),
    email VARCHAR(255),
    fecha_registro VARCHAR(11) NOT NULL,
    file TEXT
);

-- Creación de la tabla "acudiente"
CREATE TABLE acudiente (
    id_acudiente INT(11) AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT(11),
    nombre_acudiente VARCHAR(255),
    celular_acudiente VARCHAR(20),
    parentesco VARCHAR(100),
    tipo_documento_acudiente VARCHAR(50),
    documento_acudiente VARCHAR(50)
);

-- Creación de la tabla "registro_academico"
CREATE TABLE registro_academico (
    id_registro_academico INT(11) AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT(11),
    grupo VARCHAR(50),
    jornada VARCHAR(50),
    periodo_lectivo VARCHAR(50),
    procedencia VARCHAR(255)
);

-- Agregar claves foráneas
ALTER TABLE acudiente
ADD CONSTRAINT fk_alumno_acudiente FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno);

ALTER TABLE registro_academico
ADD CONSTRAINT fk_alumno_registro FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno);


CREATE TABLE calificaciones (
    id_calificaion INT(10) PRIMARY KEY AUTO_INCREMENT,
    id_alumno INT(11),
    materia VARCHAR(100),
    nota INT(5),
    trimestre VARCHAR(50)
);

ALTER TABLE calificaciones
ADD CONSTRAINT fk_alumno_calificacion FOREIGN KEY (id_alumno) REFERENCES datos_alumno(id_alumno);


ALTER TABLE calificaciones
DROP FOREIGN KEY fk_alumno_calificacion;
ALTER TABLE calificaciones
ADD CONSTRAINT fk_alumno_calificacion
FOREIGN KEY (id_alumno)
REFERENCES datos_alumno(id_alumno)
ON DELETE CASCADE;
