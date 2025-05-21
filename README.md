<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Antes de funcionar

## Image2recognition 2.0
1. Clonar este repositorio de [GitHub](https://github.com/juanfran-antonaya-estech/image2recognition2dot0.git) (Da igual la ubicación)
1. Copiar .env.example a .env y añadir el mail de superadmin (En dev siempre hay un botino@example.com) y la contraseña
1. ejecutar en la raíz
```bash
docker build -t image2recognition .
```

## Build de laravel

1. Realizar la instalación de laravel con el migrate --seed (En consola saldrán las credenciales de cada rol de usuario, solo pueden acceder a web support, admin, super admin, y father (la cuenta dev con permisos ilimitados)):
    1. copiar `.env.example` a `.env` e introducir datos de la base de datos y nombre del proyecto
    1. `composer install`
    1. `composer update`
    1. `php artisan key:generate`
    1. `php artisan migrate:fresh --seed`
    1. `npm install`
    1. `npm update`

## Ejecución

### Terminal 1
`php artisan serve`
### Terminal 2
`npm run dev`


# Credenciales Importantes

## Usuario Padre
- **Correo Electrónico**: fathericus@example.com
- **Rol**: 6 (Padre)

## Usuario Bot
- **Correo Electrónico**: botino@example.com
- **Rol**: 5 (Bot)

Estas credenciales se generan durante el seeder de la base de datos y pueden ser utilizadas con fines de prueba.

---

# Documentación Swagger

Para visualizar la documentación Swagger de la API:

1. **Acceso directo**:
   - He configurado una instancia de Swagger UI para que puedas acceder directamente a la documentación.
   - [Haz clic aquí para ver la documentación Swagger](http://127.0.0.1:8000/docs/api).

---

# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


