# Nomenclatura

[..index](../README.md)

## contents

- [contents](#contents)
- [Naming convention](#naming-convention)
  - [Table](#table)
- [Commit convention](#commit-nomenclatura)
  - [Struct](#struct)
  - [types](#types)
    - [Scopes](#scopes)
    - [Subject](#subject)
    - [Example](#example)
  - [Merge case](#merge-case)
- [Semantic Versioning](#semantic-versioning)
  - [Summary](#summary)
  - [Examples](#examples)
  - [Where to apply](#where-to-apply)
  - [Semantic Versioning References](#semantic-versioning-references)
- [Database Naming Conventions](#database-naming-conventions)

## [Naming convention](https://en.wikipedia.org/wiki/Naming_convention_(programming)#:~:text=Constants%20should%20be%20written%20in,not%20as%20the%20first%20character.)

Las convenciones que usaremos para nombrar variables, constantes, funciones, métodos y parámetros no tendrán en cuenta el lenguaje de programación y aplican para el DOM en HTML.

### Table

| | | |
|-|-|-|
| **Variable** | [snake_case](https://en.wikipedia.org/wiki/Snake_case) | Minúsculas sostenidas separadas por guion bajo [ _ \] |
| **Constante** | [SCREAMING_SNAKE_CASE](https://en.wikipedia.org/wiki/SCREAMING_SNAKE_CASE) | Mayúsculas sostenidas separadas por guion bajo [ _ \] |
| **Atributo** | [snake_case](https://en.wikipedia.org/wiki/Snake_case) | Minúsculas sostenidas separadas por guion bajo [ _ \] |
| **Funciones** | [camelCase](https://en.wikipedia.org/wiki/Camel_case) | Primera palabra en minúscula y las siguientes palabras empiezan con la primera letra en Mayúscula. Sin separadores |
| **Métodos** | [PascalCase](https://en.wikipedia.org/wiki/Naming_convention_(programming)#:~:text=Constants%20should%20be%20written%20in,not%20as%20the%20first%20character.) | Todas las palabras tienen la primera letra en Mayúscula. Sin separadores |
| **Clases** | [PascalCase](https://en.wikipedia.org/wiki/Naming_convention_(programming)#:~:text=Constants%20should%20be%20written%20in,not%20as%20the%20first%20character.) | Todas las palabras tienen la primera letra en Mayúscula. Sin separadores |
| **HTML Id's** | [snake_case](https://en.wikipedia.org/wiki/Snake_case) | Minúsculas sostenidas separadas por guion bajo [ _ \] |
| **HTML Clases** | [camelCase](https://en.wikipedia.org/wiki/Camel_case) | Primera palabra en minúscula y las siguientes palabras empiezan con la primera letra en Mayúscula. Sin separadores |
| **Form Names** |[English](#naming-convention) | Use English words to define forms names|

## Commit Nomenclatura

### Struct

[\<type>](#types)([\<scope>](#scopes)): [\<subject>](#subject)
> Breaking Changes should end with the symbol !: followed by subject. [\<type>](#types)([\<scope>](#scopes)): [\<subject>](#subject)
>
### types

| types | description |
|-|-|
|API| relevant changes|
|feat| Commits, that adds a new feature|
|fix| Commits, that fixes a bug|
|refactor |Commits, that rewrite/restructure your code, however does not change any behaviour|
|perf |Commits are special refactor commits, that improve performance|
|style |Commits, that do not affect the meaning (white-space, formatting, missing semi-colons, etc)|
|test| Commits, that add missing tests or correcting existing tests|
|docs| Commits, that affect documentation only|
|build |Commits, that affect build components like build tool, ci pipeline, dependencies, project version, ...|
|ops| Commits, that affect operational components like infrastructure, deployment, backup, recovery, ...|
|chore| Miscellaneous commits e.g. modifying .gitignore|

#### Scopes

The scope provides additional contextual information.

- Allowed Scopes depends on the specific project
- Don't use issue identifiers as scopes

#### Subject

The subject contains a succinct description of the change.

- Is a mandatory part of the format
- Use the imperative, present tense: "change" not "changed" nor "changes"
- Think of This commit will
- No dot (.) at the end

#### Example

`feat(shopping cart): add the amazing button`
`build(release): bump version to 1.0.0`

### Merge case

In merge case: `merge PR # scopes`

### References

Nomenclatura para commits, branches, releases, etc. refs:
[conventional commits](https://www.conventionalcommits.org/en/v1.0.0/)
[conventional commit messages](https://gist.github.com/qoomon/5dfcdf8eec66a051ecd85625518cfd13#file-conventional_commit_messages-md)

## [Semantic Versioning](https://semver.org/)

### Summary

Given a version number **MAJOR.MINOR.PATCH**, increment the: **MAJOR** version when you make incompatible API changes, **MINOR** version when you add functionality in a backwards compatible manner, and **PATCH** version when you make backwards compatible bug fixes.

### Examples

| Examples | Description |
|-|-|
| 1.0.0 | Initial release |
| 1.1.0 | Add feature |
| 1.1.1 | Fix bug |

### Where to apply

add or increment version in: methods, functions, classes, files, etc.
Files: mostly .css, .js by requiring or importing them.

### Semantic Versioning References

[Semantic Versioning](https://semver.org/)

## Database Naming Conventions

- Naming col English lowercase snake case singularity
- If need abbreviation split vocal
- If the name of the variable have 20 characters or more can use abbreviation naming
- avoid using table name in var of the table
- Follow examples in the documentation when in doubt
