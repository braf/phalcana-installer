# Phalcana Installer

This is a custom composer installer for the Phalcana framework.

## Usage

When creating a module to be included via composer you must include this in your `composer.json`
and give the module the type `phalcana-module`. This ensures that composer will install the module
into the `modules` folder in your project.

You can do this by simply running the code below.

```bash
composer require phalcana/installer
```
