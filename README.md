## MileApp Web Service

How to run project : 

- Create new MongoDB Database
- Create a collection named "package" 
- Clone Repository
- Run
<pre><code>
composer install
</code></pre>
- Setup .env file, you can copy from .env.example
- Add or change .env configuration  below
- Add database configuration example : 
<pre><code>
MONGO_DB_HOST=127.0.0.1
MONGO_DB_PORT=27017
MONGO_DB_DATABASE=your_database_name
MONGO_DB_USERNAME=
MONGO_DB_PASSWORD=
</code></pre>
- Run code below using terminal
<pre><code>
php artisan key:generate
</code></pre>
- Run Laravel Development Server
<pre><code>
php artisan serve
</code></pre>
- Access to http://127.0.0.1:8000/

## Route List
<table>
    <tr>
        <th>Route</td>
        <th>Method</td>
    </tr>
    <tr>
        <th>/api/package</td>
        <th>GET</td>
        <th>Get All Package</td>
    </tr>
    <tr>
        <th>/api/package/{id}</td>
        <th>GET</td>
        <th>Get Package By Id</td>
    </tr>
    <tr>
        <th>/api/package</td>
        <th>POST</td>
        <th>Create Package</td>
    </tr>
    <tr>
        <th>/api/package/{id}</td>
        <th>PUT</td>
        <th>Update All Data from Package By Id</td>
    </tr>
    <tr>
        <th>/api/package/{id}</td>
        <th>PATCH</td>
        <th>Update Partial Data from Package By Id</td>
    </tr>
    <tr>
        <th>/api/package/{id}</td>
        <th>DELETE</td>
        <th>Delete Package By Id</td>
    </tr>
</table>

How run unit test : 

- Run code below using terminal
<pre><code>
.\vendor\bin\phpunit
</code></pre>
