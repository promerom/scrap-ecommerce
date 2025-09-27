# Scrap Ecommerce

**Scrap Ecommerce** es una aplicación web simple construida con Symfony y un frontend minimalista usando Bootstrap 5, HTML, CSS, JavaScript y jQuery.

Permite:
- Scraping de productos desde sitios de ecommerce configurables (ejemplo incluido).
- Procesamiento asíncrono de scraping para distintos sitios.
- Visualización y filtrado de productos por tienda y categoría.
- Login y registro utilizando Google (OAuth2).
- Guardar productos en una lista de favoritos por usuario.
- Frontend responsivo, simple y atractivo.

## Tecnologías principales

- Symfony 7.x (PHP 8.2+)
- Doctrine ORM (SQLite por defecto)
- Bootstrap 5
- jQuery
- Google OAuth2 (KnpUOAuth2ClientBundle)
- Symfony Messenger (para jobs asíncronos)

## Instalación rápida

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/promerom/scrap-ecommerce.git
   cd scrap-ecommerce
   ```

2. **Instala dependencias:**
   ```bash
   composer install
   ```

3. **Configura variables de entorno:**
   - Renombra `.env.example` a `.env` y añade tus credenciales de Google.

4. **Crea la base de datos y ejecuta migraciones:**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Corre el servidor de desarrollo:**
   ```bash
   symfony server:start
   ```

6. **Abre en tu navegador:**
   - [http://localhost:8000](http://localhost:8000)

## Estructura básica del proyecto

- `/src/Entity/`: Entidades Doctrine (`User`, `Store`, `Category`, `Product`, `Favorite`).
- `/src/Controller/`: Controladores API y autenticación.
- `/src/Service/Scraper/`: Scrapers para cada tienda (ejemplo incluido).
- `/public/`: Archivos frontend (Bootstrap, JS, HTML).
- `/config/`: Configuración Symfony y bundles.

## Scraper de ejemplo

En `/src/Service/Scraper/ExampleScraper.php` se incluye un scraper básico que extrae productos de una página HTML simulada. Puedes extenderlo para nuevos sitios.

## Funcionalidad de favoritos

Desde el frontend puedes agregar productos a favoritos con un click (almacenado y consultado por usuario logueado).

## Autenticación Google

La autenticación se realiza vía Google OAuth2. Recuerda configurar tus credenciales en `.env`.

---

¿Preguntas o sugerencias? ¡Abre un issue o un pull request!
