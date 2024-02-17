
# Style Guide

[..index](../README.md)

Aclaro la importancia de los nombres descriptivos para las variables (No importa si toca extenderse en el nombre), esto con el fin de que el código sea legible y entendible para todos.

## Contenido

- [Style Guide](#style-guide)
  - [Contenido](#contenido)
  - [php style guide](#php-style-guide)
  - [Documentación](#documentación)
    - [Documentation convention](#documentation-convention)
    - [Indentación](#indentación)

## php style guide

- En los archivos que utilizamos objetos como por ejemplo $objeto->__GET , los asignaremos como es debido a una variable o los referenciaremos (en términos de programación), esto con el fin de manejar un estándar , también aplica para las variables super globales como por ejemplo $_GET , deben ser almacenadas en variables siguiendo el naming convention y usando nombres descriptivos, esto de los nombres descriptivos aplica para todas las variables que generemos.

## Documentación

- Recuerden que es de suma importancia documentar entre líneas y aclarar el funcionamiento del  código cuando es netamente necesario, ya que hay líneas que no necesitan explicación.

### Documentation convention

[Documentación de comentarios tipo Doc PHP](http://www.epsilon-eridani.com/cubic/ap/cubic.php/doc/phpDocumentor---documentacion-para-codigo-PHP-246.html) Se usa principalmente para la documentación del funcionamiento de funciones y clases. Los mismos criterios que usa PHP para este tipo de comentarios pueden ser utilizados para documentar funciones y clases de JavaScript, [JS DOC](https://es.wikipedia.org/wiki/JSDoc), [más...](https://www.aprenderaprogramar.com/index.php?option=com_content&view=article&id=881:guia-de-estilo-javascript-comentarios-proyectos-jsdoc-param-return-extends-ejemplos-cu01192e&catid=78&Itemid=206)

## Indentación

La indentación de los archivos debe ser tabulada con 4 espacios.

- Sumamente importante no identar archivos antiguos que no sea hayan identado con anterioridad (aplica cuando se van a realizar nuevos cambios), esta identación debe ser planeada y hecha en una rama aparte ya que tenemos el issue #164 para realizar dicha identación, es requerido que sea de esta forma (excepto para los archivos nuevos que deben ser obligatoriamente identados y para los archivos antiguos que ya se encuentran identados) ya que dificulta la lectura de cambios o en ocasiones puede ser imposible ver estos cambios. (**temporal**).

- Respecto al punto anterior hacer la adecuada revisión de los cambios antes de realizar el commit, para evitar la identación no prevista.
