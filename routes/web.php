<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Product\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/product/new', [ProductController::class, 'store'])->name('products.store');;

// Test this route using PostMan -  Go to Body->form-data and you will able of upload files
//add the parameters 'name' and 'photo'

#################### BEFEORE OF TEST THIS ROUTE YOU SHOULD ADD AND COMMENT THE NEXT CODE:
/*
https://laracasts.com/discuss/channels/laravel/token-mismatch-when-sending-post-request-on-postman
Actually you must add this lines of code. In App\Http\Kernel.php add this:

protected $routeMiddleware = [
    'csrf' => \Http\Middleware\VerifyCsrfToken::class,
(just add 'csrf' line)

and in:

protected $middlewareGroups = [
    'web' => [
//\App\Http\Middleware\VerifyCsrfToken::class,
Comment VerifyCsrfToken class: (just commit with //)

*/
Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');

//ruta para ejecutar comandos artisan desde la web
Route::get('/cmd/{command}', function($command) {
    //ejemplo: wwww.miweb.com/cmd/migrate
    Artisan::call($command);
    dd(Artisan::output());
});

//Before of test this proyect create the symbolic link of storage folder to public
// php artisan storage:link