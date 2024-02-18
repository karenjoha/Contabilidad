
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


