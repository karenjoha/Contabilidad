# Contenido

[..volver](./README.md)

- [Estructura de Archivos](#estructura-de-tabla-para-Archivos)

## Estructura de tabla para `info_prestamos`

``` sql

 | CREATE TABLE `info_prestamos` (
  `id_archivosP` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_prestamo` varchar(25) NOT NULL,
  `carpeta` varchar(10) DEFAULT NULL,
  `contrato` varchar(10) DEFAULT NULL,
  `cd` varchar(10) DEFAULT NULL,
  `titulo_valor` varchar(15) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `responsable_recP` varchar(80) NOT NULL,
  `firma_recibe_prestamo` text NOT NULL,
  `responsable_entP` varchar(80) NOT NULL,
  `firma_entrega_prestamo` text NOT NULL,
  PRIMARY KEY (`id_archivosP`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci |

```
## Estructura de tabla para `info_devoluciones`

``` sql

| info_devoluciones | CREATE TABLE `info_devoluciones` (
  `id_archivosD` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_devolucion` varchar(25) NOT NULL,
  `responsable_entD` varchar(80) NOT NULL,
  `firma_devuelve_prestamo` text NOT NULL,
  `responsable_recD` varchar(80) NOT NULL,
  `firma_recibe_devolucion` text NOT NULL,
  PRIMARY KEY (`id_archivosD`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci |

```
## Definición del campo `titulo_valor`

El término "Título Valor" hace referencia a un concepto financiero y legal que se utiliza en el ámbito de las inversiones y los mercados financieros. En un sentido general, un título valor es un instrumento financiero que representa la propiedad o el derecho de una persona sobre un activo financiero. Estos activos pueden ser diversos, como acciones, bonos, participaciones en fondos de inversión u otros tipos de valores negociables.
