# Getting Started

[index](../README.md)

## contenido

- [Getting Started](#getting-started)
  - [contenido](#contenido)
  - [Introducción](#introducción)
  - [Requisitos](#requisitos)
  - [Instalación](#instalación)
  - [Flujo de trabajo](#flujo-de-trabajo)
  - [Respect issues](#respect-issues)
  - [Pull Request Keywords](#pull-request-keywords)
  - [Style Guide](#style-guide)
  - [Diagramas](#diagramas)

## Introducción

Este repositorio contiene el código fuente de la aplicación web de Portada Inmobiliaria para el gestionamiento de inmuebles, contratos, inventarios, mantenimientos, FACTURAS, terminación de contratos y dispositivos.

## Requisitos

- [Git](https://git-scm.com/downloads)
- [Node.js](./winget.md#node-js-by-nvm)
- [Xampp](https://www.apachefriends.org/es/download.html)
  - [Xampp configuration](./winget.md#xampp)
- [Winget](./winget.md)

## Instalación

1. Clona este repositorio en tu máquina local usando Git.
2. Instala las dependencias del proyecto con el comando `npm install`.
    1. Especificamente en `./contratos/frontend/contratosREACT/`
3. Descargar otras dependencias del repositorio.
    1. `vendor`, carpeta de recursos estáticos. No disponible en el repositorio. Debe estar disponible en la carpeta raíz del proyecto.
    2. Archivos .sql de las Bases de datos.
4. Clonar las bases de datos de desarrollo y pruebas.

## Configuración VS Code

Para que el editor de código VS Code funcione correctamente con el proyecto, se deben instalar las siguientes [extensiones](../.vscode/extensions.json):

```json
{
    "recommendations": [
        "editorconfig.editorconfig",
        "mhutchie.git-graph",
        "donjayamanne.githistory",
        "xdebug.php-debug",
        "xdebug.php-pack",
        "devsense.profiler-php-vscode",
        "devsense.phptools-vscode",
        "devsense.composer-php-vscode",
        "zobo.php-intellisense",
        "bmewburn.vscode-intelephense-client",
        "github.vscode-pull-request-github",
        "ms-vsliveshare.vsliveshare"
    ]
}
```

En la carpeta `.vscode` hay configuraciones para el editor de código VS Code, como el formateo de código, la configuración de depuración, etc. Por favor, asegúrese de que estas configuraciones estén activadas en su editor de código. (No modificar estas configuraciones, a menos que sepa lo que está haciendo)

## Flujo de trabajo

1. Observa el [Ejemplo de git y gitflow](https://www.youtube.com/watch?v=VdGzPZ31ts8&ab_channel=HolaMundo) para entender el proceso.
2. Clona este repositorio en tu máquina local.
3. Crea un nuevo issue o toma uno existente para comenzar un desarrollo necesario.
    1. Para crear un nuevo issue, accede a la pestaña "Issues" en el repositorio y haz clic en "New Issue".
    2. Asegúrate de proporcionar una descripción clara en el issue, junto con una lista de tareas específicas que deben completarse.
    3. Asigna los labels destinados para el Issue creado, tanto la prioridad como la categoría del Issue.
4. Asígnate el Issue para comenzar con dicha tarea o asunto.
5. Crea una nueva rama local específica para el Issue asignado.
    1. Es importante mantener el desarrollo enfocado y limitar los cambios a las líneas y archivos relevantes.
6. Desarrolla el issue en tu rama hasta cumplir con los criterios de aceptación establecidos.
7. Sube o publica esa rama en el repositorio remoto.
8. Utilizando la rama que creaste para el desarrollo y la rama principal del repositorio, solicita la incorporación de los cambios ([Pull Request o PR](#pull-request-keywords)) en el proyecto.
9. Asigna a otros desarrolladores (Reviewers) para revisar tu código.
10. Los Reviewers pueden solicitar cambios o correcciones.
11. Si es necesario, realiza los cambios solicitados en tu rama local correspondiente al issue.
12. Actualiza la rama en el repositorio remoto con tus cambios locales.
13. Vuelve a solicitar la revisión de los desarrolladores si hubo cambios adicionales.
14. Una vez que los Reviewers aprueben los cambios, solicita la fusión de los cambios a la persona encargada.

Este flujo de trabajo te permitirá colaborar eficientemente con otros desarrolladores, mantener un código limpio y bien revisado, y seguir un proceso estructurado para el desarrollo de aplicaciones alojadas en GitHub.

### Respect issues

Si el desarrollo (los issues) no han sido terminados o les falta algo; antes de generar otro, Reábralos y comente en ellos que falto y como va a subsanarlo.

### Pull Request Keywords

[using keywords in issues and pull requests](https://docs.github.com/en/get-started/writing-on-github/working-with-advanced-formatting/using-keywords-in-issues-and-pull-requests)

Usar una palabra clave para enlazar un issue en una solicitud de inserción de cambios (PR) expresa el tipo de progreso desarrollado y cierra automáticamente el issue después de aplicar la inserción de cambios.

Al mencionar un issue dentro de un PR, se debe tener en cuenta la relación del issue con el PR. Por ejemplo, si el PR soluciona todos los criterios del issue, el paso lógico sería cerrar el issue cuando la inserción de cambios se efectúe.

La mención del issue quedaría así:

```md
Palbra_Clave #issue
```

Todas estas palabras clave, a pesar de ser un tipo distinto de progreso, cierran el issue cuando se usan en una solicitud de incorporación de cambios (PR)

- close
- closes
- closed
- fix
- fixes
- fixed
- resolve
- resolves
- resolved

Las palbras claves que se usan en caso de que el issue no se haya terminado o falte algo son:

- progress

## [Style Guide](./StyleGuide.md)

## [Diagramas](./Diagramas.md)
