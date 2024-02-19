
# contabilidad

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


