<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API RESTful para la gestión de reservas de salones infantiles

Este proyecto es una API REST desarrollada en Laravel para la gestion de reservas de salon de eventos infantiles, mediante usuarios y roles. Utiliza **Sanctum** para la autenticación de usuarios, permitiendo un acceso seguro mediante login. Está diseñado como un entorno backend y puede ser integrado con frameworks frontend como **React** o **Next.js**.

## Características

- **Autenticación segura**: Implementación de autenticación basada en tokens con Laravel Sanctum.
- **CRUD completo**: Operaciones de creación, lectura, actualización y eliminación para los recursos de las tareas asignadas.
- **Arquitectura escalable**: Diseñado para integrarse fácilmente con cualquier frontend moderno.
- **Documentación de endpoints**: Incluye una colección de Postman para facilitar el uso de la API.

## Requisitos previos

- PHP >= 8.1
- Composer
- MySQL o cualquier base de datos compatible
- Laravel 11
- Node.js (opcional, para integraciones frontend)

## Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/JoseNava100/party-kids-app
   cd party-kids-app
   ```

2. Instala las dependencias de PHP:
   ```bash
   composer install
   ```

3. Configura el archivo `.env`:
   - Copia el archivo de ejemplo:
     ```bash
     cp .env.example .env
     ```
   - Configura las variables de entorno, como la conexión a la base de datos.

4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

5. Ejecuta las migraciones para crear las tablas necesarias:
   ```bash
   php artisan migrate
   ```

6. (Opcional) Llena la base de datos con los datos de prueba configurados:
   ```bash
   php artisan db:seed
   ```

7. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Endpoints principales

| Método | Endpoint           | Descripción                     | Autenticación |
|--------|--------------------|---------------------------------|---------------|
| POST   | `/api/register`    | Registrar un nuevo usuario      | No            |
| POST   | `/api/login`       | Iniciar sesión y obtener token  | No            |
| GET    | `/api/ `        | Listar todas las tareas         | Sí            |
| POST   | `/api/ `        | Crear una nueva tarea            | Sí            |
| GET    | `/api/ /{id}`   | Obtener detalles de una tarea    | Sí            |
| PUT/PATCH    | `/api/ /{id}`   | Actualizar una tarea existente   | Sí            |
| DELETE | `/api/ /{id}`   | Eliminar una tarea               | Sí            |
| POST   | `/api/logout`      | Cerrar sesión                   | Sí            |

## Autenticación

Este proyecto utiliza **Laravel Sanctum** para la autenticación basada en tokens. Asegúrate de incluir el token en el encabezado de cada solicitud autenticada:

```http
Authorization: Bearer <tu-token>
```

## Integración con Frontend

Esta API está preparada para ser consumida por frameworks frontend como **React** o **Next.js**. Puedes realizar solicitudes HTTP utilizando bibliotecas como **Axios** o **Fetch API**.

### Ejemplo de solicitud con Axios

```javascript
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://127.0.0.1::8000/api',
  headers: {
    Authorization: `Bearer ${tuToken}`,
  },
});

// Obtener todos los carros
api.get('/cars')
  .then(response => console.log(response.data))
  .catch(error => console.error(error));
```