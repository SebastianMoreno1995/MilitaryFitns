<?php

use App\Http\Controllers\BannerDescuentoController;
use App\Http\Controllers\BannerFotosController;
use App\Http\Controllers\BannerOfertasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\PerfilUserController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ObjetivosController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SaboresController;
use App\Http\Controllers\SubCategoriasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeController::class)->name('Tienda');
Route::get('DetallesProducto', [HomeController::class, 'DetalleProducto'])->name('DetalleProducto');
Route::post('BuscarInfoSabores', [HomeController::class, 'BuscarInfoPresentaciones'])->name('BuscarInfoPresentaciones');


Route::get('LoginUser', UserController::class)->name('LoginUser');
Route::post('LoginUsers', [UserController::class, 'Login'])->name('LoginUsers.Login');
Route::post('Logout', [UserController::class, 'Logout'])->name('Logout');

//Auth::routes();

//Route::group(['prefix'=> 'admin'],function (){
Route::get('Dashboard', DashboardController::class)->middleware('auth')->name("Dashboard");
Route::get('PerfilUser', PerfilUserController::class)->middleware('auth')->name('PerfilUser');
Route::post('PerfilUsers', [PerfilUserController::class, 'Actualizar'])->middleware('auth')->name('ActualizarUser');
Route::post('PasswordUsers', [PerfilUserController::class, 'ActualizarPassword'])->middleware('auth')->name('ActualizarPassword');
Route::post('AvatarUsers', [PerfilUserController::class, 'ActualizarFotoPerfil'])->middleware('auth')->name('AvatarUsers');

//Proveedores
Route::get('Proveedores', ProveedorController::class)->middleware('auth')->name('ProveedorUser');
Route::post('ProveedoresReg', [ProveedorController::class, 'Actualizar'])->middleware('auth')->name('ActualizarProveedores');
Route::get('AllProveedores', [ProveedorController::class, 'ConsultaAll'])->middleware('auth')->name('AllProveedorUser');
Route::get('InfoProveedores', [ProveedorController::class, 'ConsultaEspecifica'])->middleware('auth')->name('InfoProveedores');
Route::post('ProveedoresEli', [ProveedorController::class, 'Eliminar'])->middleware('auth')->name('EliminarProveedores');

//Categorias
Route::get('Categorias', CategoriasController::class)->middleware('auth')->name('CategoriaUser');
Route::get('CategoriasBusqueda', [CategoriasController::class, 'Index'])->middleware('auth')->name('BusquedaCategorias');
Route::get('CategoriasBusquedaFilas', [CategoriasController::class, 'FiltroFilas'])->middleware('auth')->name('BusquedaCategoriasFilas');
Route::get('CategoriasSearch', [CategoriasController::class, 'Search'])->middleware('auth')->name('SearchCategorias');
Route::post('CategoriasRegistro', [CategoriasController::class, 'Registrar'])->middleware('auth')->name('RegistrarCategorias');
Route::post('CategoriasModificar', [CategoriasController::class, 'Modificar'])->middleware('auth')->name('ModificarCategorias');
Route::post('CategoriasEliminar', [CategoriasController::class, 'Eliminar'])->middleware('auth')->name('EliminarCategorias');
// SubCategorias
Route::post('SubCategoriasRegistro', [SubCategoriasController::class, 'Registrar'])->middleware('auth')->name('RegistrarSubCategorias');
Route::get('AllSubCategorias', [SubCategoriasController::class, 'ConsultaAll'])->middleware('auth')->name('AllSubCategoriasUser');
Route::post('SubCategoriasModificar', [SubCategoriasController::class, 'Modificar'])->middleware('auth')->name('ModificarSubCategorias');
Route::post('SubCategoriasEliminar', [SubCategoriasController::class, 'Eliminar'])->middleware('auth')->name('EliminarSubCategorias');

//Sabores
Route::get('Sabores', SaboresController::class)->middleware('auth')->name('SaboresUser');
Route::post('SaboresRegistro', [SaboresController::class, 'Registrar'])->middleware('auth')->name('RegistrarSabores');
Route::get('AllSabores', [SaboresController::class, 'ConsultaAll'])->middleware('auth')->name('AllSaboresUser');
Route::post('SaboresModificar', [SaboresController::class, 'Modificar'])->middleware('auth')->name('ModificarSabores');
Route::post('SaboresEliminar', [SaboresController::class, 'Eliminar'])->middleware('auth')->name('EliminarSabores');

//Marcas
Route::get('Marcas', MarcasController::class)->middleware('auth')->name('MarcasUser');
Route::post('MarcasRegistro', [MarcasController::class, 'Registrar'])->middleware('auth')->name('RegistrarMarcas');
Route::get('AllMarcas', [MarcasController::class, 'ConsultaAll'])->middleware('auth')->name('AllMarcasUser');
Route::post('MarcasModificar', [MarcasController::class, 'Modificar'])->middleware('auth')->name('ModificarMarcas');
Route::post('MarcasEliminar', [MarcasController::class, 'Eliminar'])->middleware('auth')->name('EliminarMarcas');

//Presentaciones
Route::get('Presentacion', PresentacionController::class)->middleware('auth')->name('PresentacionUser');
Route::post('PresentacionRegistro', [PresentacionController::class, 'Registrar'])->middleware('auth')->name('RegistrarPresentacion');
Route::get('AllPresentacion', [PresentacionController::class, 'ConsultaAll'])->middleware('auth')->name('AllPresentacionUser');
Route::post('PresentacionModificar', [PresentacionController::class, 'Modificar'])->middleware('auth')->name('ModificarPresentacion');
Route::post('PresentacionEliminar', [PresentacionController::class, 'Eliminar'])->middleware('auth')->name('EliminarPresentacion');
//});

//Objetivos
Route::get('Objetivos', ObjetivosController::class)->middleware('auth')->name('ObjetivosUser');
Route::post('ObjetivosRegistro', [ObjetivosController::class, 'Registrar'])->middleware('auth')->name('RegistrarObjetivos');
Route::get('AllObjetivos', [ObjetivosController::class, 'ConsultaAll'])->middleware('auth')->name('AllObjetivosUser');
Route::post('ObjetivosModificar', [ObjetivosController::class, 'Modificar'])->middleware('auth')->name('ModificarObjetivos');
Route::post('ObjetivosEliminar', [ObjetivosController::class, 'Eliminar'])->middleware('auth')->name('EliminarObjetivos');

//Productos
Route::get('Productos', ProductoController::class)->middleware('auth')->name('ProductosUser');
Route::get('AllProductos', [ProductoController::class, 'ConsultaAll'])->middleware('auth')->name('AllProductosUser');
Route::get('ProductosRegistros', [ProductoController::class, 'index'])->middleware('auth')->name('RegistrarProductos');
Route::post('ProductosRegistro', [ProductoController::class, 'Registrar'])->middleware('auth')->name('RegistrarProducto');
Route::get('ProductosFotos', [ProductoController::class, 'Index1'])->middleware('auth')->name('ProductosFotosUser');
Route::get('ProductosPresentaciones', [ProductoController::class, 'Index2'])->middleware('auth')->name('ProductosPresentacionesUser');
Route::get('AllProductosPresentaciones', [ProductoController::class, 'ConsultaAllPresentacion'])->middleware('auth')->name('AllProductosPresentacionUser');
Route::post('GrupoSaborModificar', [ProductoController::class, 'ModificarGrupoSabores'])->middleware('auth')->name('ModificarGrupoSabores');
Route::post('GrupoSaborEliminar', [ProductoController::class, 'EliminarGrupoSabores'])->middleware('auth')->name('EliminarGrupoSabores');
Route::get('AllProductosObjetivos', [ProductoController::class, 'ConsultaAllObjetivos'])->middleware('auth')->name('AllProductosObjetivosUser');
Route::post('GrupoObjetivoModificar', [ProductoController::class, 'ModificarObjetivos'])->middleware('auth')->name('ModificarObjetivosProducto');
Route::post('GrupoObjetivoEliminar', [ProductoController::class, 'EliminarObjetivosProducto'])->middleware('auth')->name('EliminarObjetivosProducto');
Route::post('ProductosModificar', [ProductoController::class, 'Modificar'])->middleware('auth')->name('ModificarProducto');
Route::get('ProductosVer', [ProductoController::class, 'VerProducto'])->middleware('auth')->name('VerProducto');
Route::get('SubCategorias', [ProductoController::class, 'SubCategorias'])->middleware('auth')->name('SubCategoriasEsp');
Route::post('ImagenesProductos', [ProductoController::class, 'CargarImagenesComplementarias'])->middleware('auth')->name('ImagenesProducto');
Route::get('AllFotosProductos', [ProductoController::class, 'ConsultaAllFotos'])->middleware('auth')->name('AllProductosFotosUser');
Route::post('ImagenEliminar', [ProductoController::class, 'Eliminar'])->middleware('auth')->name('EliminarFotoRelacionadas');
Route::post('ProductoEliminar', [ProductoController::class, 'EliminarProducto'])->middleware('auth')->name('EliminarProducto');


Route::post('CiudadEspecifica', [CiudadController::class, 'CiudadEspecifica'])->middleware('auth');

//Compras
Route::get('Compras', ComprasController::class)->middleware('auth')->name('ComprasUser');
Route::post('BuscarPresentaciones', [ComprasController::class, 'BuscarPresentacionesProducto'])->middleware('auth')->name('BuscarPresentacionesProducto');
Route::get('ComprasRegistro', [ComprasController::class, 'Registrar'])->middleware('auth')->name('RegistrarCompra');

//BannerFoto
Route::get('FotoBanner', BannerFotosController::class)->middleware('auth')->name('FotosBannerUser');
Route::post('FotoBannerRegistro', [BannerFotosController::class, 'Registrar'])->middleware('auth')->name('RegistrarFotoBanner');
Route::get('AllFotoBanner', [BannerFotosController::class, 'ConsultaAll'])->middleware('auth')->name('AllFotoBannerUser');
Route::post('FotoBannerModificar', [BannerFotosController::class, 'Modificar'])->middleware('auth')->name('ModificarFotoBanner');
Route::post('FotoBannerEliminar', [BannerFotosController::class, 'Eliminar'])->middleware('auth')->name('EliminarFotoBanner');

//Ofertas
Route::get('Ofertas', OfertasController::class)->middleware('auth')->name('OfertasUser');
Route::get('AllOfertas', [OfertasController::class, 'ConsultaAll'])->middleware('auth')->name('AllOfertasUser');
Route::get('OfertasRegistros', [OfertasController::class, 'index'])->middleware('auth')->name('RegistrarOfertas');
Route::post('OfertasRegistro', [OfertasController::class, 'Registrar'])->middleware('auth')->name('RegistrarOferta');
Route::post('OfertasModificar', [OfertasController::class, 'Modificar'])->middleware('auth')->name('ModificarOferta');
Route::post('OfertasEliminar', [OfertasController::class, 'Eliminar'])->middleware('auth')->name('EliminarOferta');

//BannerOfertas
Route::get('BannerOfertas', BannerOfertasController::class)->middleware('auth')->name('OfertasBannerUser');
Route::get('AllBannerOfertas', [BannerOfertasController::class, 'ConsultaAll'])->middleware('auth')->name('AllBannerOfertasUser');
Route::get('BannerOfertasRegistros', [BannerOfertasController::class, 'index'])->middleware('auth')->name('RegistrarBannerOfertas');
Route::post('BuscarPresentacionesOferta', [BannerOfertasController::class, 'BuscarPresentacionesProductoOferta'])->middleware('auth')->name('BuscarPresentacionesProductoOferta');
Route::post('BuscarFotosDeportivas', [BannerOfertasController::class, 'BuscarFotoDeportiva'])->middleware('auth')->name('BuscarFotoDeportiva');
Route::post('BannerOfertasRegistro', [BannerOfertasController::class, 'Registrar'])->middleware('auth')->name('RegistrarBannerOferta');
Route::post('BannerOfertasModificar', [BannerOfertasController::class, 'Modificar'])->middleware('auth')->name('ModificarBannerOferta');
Route::post('OfertasBannerEliminar', [BannerOfertasController::class, 'Eliminar'])->middleware('auth')->name('EliminarBannerOferta');


Route::post('BuscarSabores', [SaboresController::class, 'BuscarSaboresPresentaciones'])->name('BuscarSaboresPresentaciones');
Route::post('CostoPresentaciones', [PresentacionController::class, 'CostoPresentacionProducto'])->middleware('auth')->name('CostoPresentacionProducto');