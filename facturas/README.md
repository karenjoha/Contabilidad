
[index](../README.md)

# Base de datos

``` sql

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `fecha_registro` varchar(25) NOT NULL,
  `descripcion` varchar(15) NOT NULL,
  `empleado_registra` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`);

ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

```