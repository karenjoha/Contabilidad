# Winget

[..index](../README.md)

[winget](<https://apps.microsoft.com/detail/instalador-de-aplicaci%C3%B3n/9NBLGGH4NNS1?hl=es-co&gl=CO>) es un administrador de paquetes de aplicaciones de Microsoft para Windows. Permite a los usuarios instalar y administrar aplicaciones de la línea de comandos.

## Contenido

- [Winget](#winget)
  - [Contenido](#contenido)
  - [Instalación](#instalación)
  - [Lista de aplicaciones](#lista-de-aplicaciones)
    - [Aplicaciones principales](#aplicaciones-principales-para-el-desarrollo-de-software)
    - [Node JS by nvm](#node-js-by-nvm)
    - [Sugerencias](#sugerencias)
    - [Configuración](#configuración)
      - [Xampp](#xampp)

## Instalación

Para instalar [winget](<https://apps.microsoft.com/detail/instalador-de-aplicaci%C3%B3n/9NBLGGH4NNS1?hl=es-co&gl=CO>)

## Lista de aplicaciones

### Aplicaciones principales para el desarrollo de software

```powershell

winget install --id Git.Git --source winget -e;
winget install --id Microsoft.VisualStudioCode --source winget -e;
winget install --id ApacheFriends.Xampp.8.2 --source winget -e;
winget install --id GlavSoft.TightVNC --source winget -e;
winget install --id GitHub.GitHubDesktop --source winget -e;
winget install --id AnyDeskSoftwareGmbH.AnyDesk --source winget -e;

```

### Node JS by nvm

``` powershell

winget install --id CoreyButler.NVMforWindows --source winget -e;
# then restart the terminal
nvm install latest
nvm use latest

# install and use pnpm
# https://pnpm.io/es/installation
corepack enable
corepack prepare pnpm@latest --activate

```

### Sugerencias

``` powershell

winget install --id Brave.Brave --source winget -e;

```

### Configuración

#### Xampp

- php.ini

> - max_input_vars = 9000

- my.ini

> - innodb_strict_mode=0

- php.ini (Configuración para envío masivo de multimedia)

> - max_file_uploads=600
> - upload_max_filesize=2042M
> - post_max_size=2042M
> - max_execution_time=1200
> - memory_limit=2042M
