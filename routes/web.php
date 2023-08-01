<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\StocktiendaController;
use App\Http\Controllers\TiendacentroController;
use App\Http\Controllers\TipoproductoController;

//ruta para usuarios
Route::get('/', [UsuarioController::class,'home'])->name('home');
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/login',[UsuarioController::class,'loginPost'])->name('login.post');
Route::get('/registrar', [UsuarioController::class, 'registro'])->name('registrar');
Route::post('/registrar', [UsuarioController::class, 'registroPost'])->name('registrar.post');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');
//metodos CRUD para cata una de la tablas
Route::get('/', [CatalogoController::class,'home'])->name('home');
Route::resource('catalogo',CatalogoController::class);
Route::resource('proveedor',ProveedorController::class);
Route::resource('stock',StocktiendaController::class);
Route::resource('tiendacentro',TiendacentroController::class);
Route::resource('tipoproducto',TipoproductoController::class);

//se crean metodos restore por cada tabla

//metodos restore para categoria
Route::get('catalogo/{catalogo}', [CatalogoController::class, 'restore'])->name('catalogo.restore');
Route::get('trashed',[CatalogoController::class,'trashed'])->name('catalogo.trashed');
Route::get('restore-all',[CatalogoController::class,'restoreAll']);

//metodo restore para proveedores
Route::get('proveedor/{proveedor}', [ProveedorController::class, 'restoreP'])->name('proveedor.restore');
Route::get('trashedP',[ProveedorController::class,'trashedP'])->name('proveedor.trashed');
Route::get('restore-allP',[ProveedorController::class,'restoreAllP']);

//metodo restore para tiendacentro TC
Route::get('tiendacentro/{tiendacentro}',[TiendacentroController:: class,'restoreTC'])->name('tiendacentro.restore');
Route::get('trashedTC',[TiendacentroController::class,'trashedTC'])->name('tiendacentro.trashed');
Route::get('restore-allTC',[TiendacentroController::class,'restoreallTC']);

//tipoproducto
Route::get('tipoproducto/{tipoproducto}',[TipoproductoController::class, 'restoreTP'])->name('tipoproducto.restore');
Route::get('trashedTP',[TipoproductoController::class,'trashedTP'])->name('tipoproducto.trashed');
Route::get('restore-allTP',[TipoproductoController::class,'restoreallTP']);

//restaurar stock
Route::get('stock/{stock}', [StocktiendaController::class, 'restoreS'])->name('stock.restore');
Route::get('trashedS',[StocktiendaController::class, 'trashedS'])->name('stock.trashed');
Route::get('restore-allS',[StocktiendaController::class, 'restoreallS']);


