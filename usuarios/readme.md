[index](../README.md)

# Consulta UPDATE `gestionadministrativa`.``usuarios` en el campo doc_identidad

``` sql
-- Este comando SQL actualiza la tabla de usuarios para limpiar el campo doc_identidad
-- Elimina todos los caracteres no numéricos del campo doc_identidad

-- Comienza la actualización de la tabla usuarios
UPDATE usuarios

-- Modifica el campo doc_identidad utilizando REGEXP_REPLACE
-- La función REGEXP_REPLACE elimina caracteres no numéricos del campo
SET `doc_identidad` = REGEXP_REPLACE(`doc_identidad`, '[^0-9]', '')

-- Filtra las filas donde doc_identidad contiene al menos un carácter no numérico
WHERE `doc_identidad` REGEXP '[^0-9]';


```
