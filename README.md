<p align="center">
	<img src="logo.png" width="525" height="203" alt="Logo Granosagrado"/>
</p>

# MAQUIRENTA

Maquirenta es una empresa peruana dedicada al servicio de alquiler de grúas, maquinaria pesada, equipos de izaje y transporte de carga pesada en todo el territorio peruano.

### NOTA:

> Antes de la instalación:
> - **Entorno:** Este ejemplo de comandos de instalación están dedicados para ser ejecutados en un entorno de **CMD de Windows**.
> - **Programas Preinstalados:** Se debe tener en cuenta tener antes instaladas las siguientes herramientas:
>   - **[Composer](https://getcomposer.org/)**
>   - **[Nodejs](https://nodejs.org/en)**
>   - **[Xampp](https://www.apachefriends.org/es/index.html)**

## Instalación

1. Instalar las dependencias necesarias
```bash
composer install
```
2. Hacer una copia del archivo `.env.example` a sólo `.env` (comando en Windows)
```bash
copy .env.example .env
```
3. Generar clave de aplicación pública en archivo `.env`
```bash
php artisan key:generate
```
4. Migrar las bases de datos de la aplicación `.env`
```bash
php artisan migrate
```
5. Insertar registros de prueba en algunas tablas principales
```bash
php artisan db:seed
```
6. Generar el enlace simbólico (symlink) entre la ruta `storage/app/public` y `public/storage`
```bash
php artisan storage:link
```

7. Cambiar el valor en  `DB_CONNECTION=` de `sqlite` a `mysql` dentro del archivo `.env`



## Comandos de limpieza general dentro de la aplicación

Los siguientes comandos sirven para limpiar los datos almacenados en caché, así como optimizar, generar clave de la aplicación, además de eliminar las sesiones almacenadas en base de datos (esto último depende de la configuración del usuario en el archivo `.env`):

```shell
php artisan config:clear
php artisan debugbar:clear
php artisan config:cache
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan optimize:clear
php artisan storage:link
php artisan key:generate
php artisan session:flush

```