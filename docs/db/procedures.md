# Procedimientos almacenados

[..volver](../db.md)

## convenciones de nomenclatura

[Convenciones de nomenclatura](../../README.md#naming-convention) para procedimientos almacenados (aplica convención para Métodos).

## convenciones para procedimientos obsoletos

Marcar un procedimiento almacenado como obsoleto sin perder su definición en la base de datos implica básicamente indicar que ese procedimiento ya no se recomienda para su uso futuro y que podría ser eliminado en versiones futuras, pero sin quitarlo inmediatamente.

### 1. **Convención de Nomenclatura:**

Para indicar que el procedimiento está obsoleto. Por ejemplo, agregar prefijo "Deprecated_" al nombre del procedimiento.

Puedes agregar comentarios en el cuerpo del procedimiento almacenado para indicar que está obsoleto y proporcionar información sobre alternativas o razones para su desuso. Este enfoque es principalmente descriptivo y no tiene un impacto funcional directo.

```sql
-- Procedimiento Almacenado Obsoleto
CREATE PROCEDURE Deprecated_Procedimiento()
BEGIN
    -- Proporcionar comentarios sobre alternativas o razones
    -- para su desuso.

    -- Código del procedimiento almacenado

    -- Indicar que está obsoleto

END;
```

### 2. **Documentación Externa:**

Además de marcar el procedimiento almacenado en la base de datos, también es una buena práctica mantener una documentación actualizada, ya sea en un sistema de gestión de documentación o directamente en el código fuente, para informar a los desarrolladores sobre la obsolescencia del procedimiento.

Recuerda que estos enfoques son convenciones y prácticas recomendadas, pero no impiden que alguien use el procedimiento obsoleto. Es responsabilidad del equipo de desarrollo seguir las mejores prácticas y migrar a nuevas soluciones cuando sea apropiado.
