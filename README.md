<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre el proyecto

Este es una entrega para Woobsing, adjunto requisitos:

- PHP 8.0 o +
- Composer 2
- MySQL 8
- Mailtrap u otro servicio de correo (Mailer catcher)

## Instalación
Se debe descargar o clonar el proyecto.
```console
git clone https://github.com/sebasroldanm/woobsing.git

```
Usando composer se deben instalar las dependencias.
```console
composer install

```
Luego, realizar una copia de las variables de entorno.
```console
cp .env.example .env
```

Por último, realizar la configuración de conexión de la Base de Datos MySQL y la conexión con el servicio de correo.

```console
php artisan migrate
php artisan db:seed
```
Ya está listo, se puede abrir desde un vhost creado para entorno local o usando el servidor de artisan
```console
php artisan serve
```
