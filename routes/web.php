<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CmsControllers\DashboardController;
use App\Http\Controllers\CmsControllers\EventController;
use App\Http\Controllers\CmsControllers\UsersController;
use App\Http\Controllers\CmsControllers\ContentController;
use App\Http\Controllers\CmsControllers\DestaqueController;
use App\Http\Controllers\CmsControllers\GaleriasController;
use App\Http\Controllers\CmsControllers\PaginaHome;
use App\Http\Controllers\CmsControllers\ServicesController;
use App\Http\Controllers\CmsControllers\ProjectsController;
use App\Http\Controllers\CmsControllers\ContatoController as ContatoCMSController;

use App\Http\Controllers\SiteControllers\HomeController;
use App\Http\Controllers\SiteControllers\ContentController as ConteudoSiteController;
use App\Http\Controllers\SiteControllers\ServicesController as ServicesSiteController;
use App\Http\Controllers\SiteControllers\ProjectsController as ProjectsSiteController;

Auth::routes();

// Rotas SITE ##############################################################
// --------------------------------------------------------------------------
// HOME SITE
Route::get('/', [HomeController::class, 'index'])->name('home');

// CONTATO SITE
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::post('/contato/send-message', [ContatoController::class, 'sendMessage'])->name('sendmsg');

// BLOG
Route::get('/blog', [ConteudoSiteController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [ConteudoSiteController::class, 'single'])->name('blog.single');

// SERVICOS
Route::get('/servicos', [ServicesSiteController::class, 'index'])->name('services.index');
Route::get('/servicos/{id}', [ServicesSiteController::class, 'single'])->name('service.single');

// PROJETOS
Route::get('/projetos', [ProjectsSiteController::class, 'index'])->name('projetos.index');
Route::get('/projetos/{id}', [ProjectsSiteController::class, 'single'])->name('projeto.single');

// Rotas CMS ################################################################
// --------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {

        // DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // USUÁRIOS
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/register', [UsersController::class, 'register'])->name('user.create');
        Route::post('/users/store', [UsersController::class, 'store'])->name('user.store');
        Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
        Route::post('/users/{id}/update', [UsersController::class, 'update'])->name('user.update');
        Route::delete('/users/{id}/delete', [UsersController::class, 'delete'])->name('user.delete');

        // EVENTOS
        Route::get('/events', [EventController::class , 'index'])->name('events.index');
        Route::get('/events/register', [EventController::class , 'register'])->name('event.create');
        Route::post('/events/store', [EventController::class , 'store'])->name('event.store');
        Route::get('/events/{id}/edit', [EventController::class , 'edit'])->name('event.edit');
        Route::put('/events/{id}/update', [EventController::class , 'update'])->name('event.update');
        Route::delete('/events/{id}/delete', [EventController::class , 'delete'])->name('event.delete');

        // CONTEÚDOS(blog)
        Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
        Route::get('/contents/register', [ContentController::class , 'register'])->name('content.create');
        Route::post('/contents/store', [ContentController::class , 'store'])->name('content.store');
        Route::get('/contents/{id}/edit', [ContentController::class , 'edit'])->name('content.edit');
        Route::put('/contents/{id}/update', [ContentController::class , 'update'])->name('content.update');
        Route::delete('/contents/{id}/delete', [ContentController::class , 'delete'])->name('content.delete');

        // GALERIA
        Route::get('/galeria', [GaleriasController::class, 'index'])->name('galerias.index');
        Route::get('/galeria/register', [GaleriasController::class, 'register'])->name('galeria.create');
        Route::post('/galeria/store', [GaleriasController::class, 'store'])->name('galeria.store');
        Route::get('/galeria/{id}/edit', [GaleriasController::class, 'edit'])->name('galeria.edit');
        Route::put('/galeria/{id}/update', [GaleriasController::class, 'update'])->name('galeria.update');
        Route::delete('/galeria/{id}/delete', [GaleriasController::class, 'delete'])->name('galeria.delete');
        // -- ADICIONAR/REMOVER FOTOS DA GALERIA
        Route::put('/galeria/{id}/add', [GaleriasController::class, 'add'])->name('galeria.add');
        Route::get('/galeria/{id}/remove/{id_foto}', [GaleriasController::class, 'remove'])->name('galeria.remove');

        // PAGINAS HOME
        Route::get('/paginas/home', [PaginaHome::class, 'index'])->name('paginas.home');

        // DESTAQUES(HOME)
        Route::get('/destaques', [DestaqueController::class, 'index'])->name('destaques.index');
        Route::get('/destaques/register', [DestaqueController::class , 'register'])->name('destaque.create');
        Route::post('/destaques/store', [DestaqueController::class , 'store'])->name('destaque.store');
        Route::get('/destaques/{id}/edit', [DestaqueController::class , 'edit'])->name('destaque.edit');
        Route::put('/destaques/{id}/update', [DestaqueController::class , 'update'])->name('destaque.update');
        Route::delete('/destaques/{id}/delete', [DestaqueController::class , 'delete'])->name('destaque.delete');

        // SERVIÇOS
        Route::get('/servicos', [ServicesController::class, 'index'])->name('services.index');
        Route::get('/servicos/register', [ServicesController::class , 'register'])->name('service.create');
        Route::post('/servicos/store', [ServicesController::class , 'store'])->name('service.store');
        Route::get('/servicos/{id}/edit', [ServicesController::class , 'edit'])->name('service.edit');
        Route::put('/servicos/{id}/update', [ServicesController::class , 'update'])->name('service.update');
        Route::delete('/servicos/{id}/delete', [ServicesController::class , 'delete'])->name('service.delete');

        // PROJETOS
        Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
        Route::get('/projects/register', [ProjectsController::class , 'register'])->name('project.create');
        Route::post('/projects/store', [ProjectsController::class , 'store'])->name('project.store');
        Route::get('/projects/{id}/edit', [ProjectsController::class , 'edit'])->name('project.edit');
        Route::put('/projects/{id}/update', [ProjectsController::class , 'update'])->name('project.update');
        Route::delete('/projects/{id}/delete', [ProjectsController::class , 'delete'])->name('project.delete');

        // CONTATO
        Route::get('/contatos', [ContatoCMSController::class, 'index'])->name('contatos.index');

        Route::post('logout', 'AuthController@logout')->name('logout');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
