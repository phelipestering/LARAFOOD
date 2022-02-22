<?php

use App\Http\Controllers\Admin\PlanController;
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



// @include('./planroutes.php');

// ROTAS DE PLANOS

Route::prefix('admin')->group(function(){

    Route::get('plans',[PlanController::class, 'index'])->name('plans.index');

    Route::get('plans/create',[PlanController::class, 'create'])->name('plans.create');

    Route::post('plans/', [PlanController::class, 'store'])->name('plans.store');

    Route::get('plans/{id}', [PlanController::class, 'show'])->name('plans.show');

    Route::delete('plans/{id}', [PlanController::class, 'delete'])->name('plans.delete');

    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');

    Route::get('plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');

    Route::put('plans/{id}', [PlanController::class, 'update'])->name('plans.update');


    // BreadCumbs

    Route::get('/', [PlanController::class, 'index'])->name('admin.index');


    });




// Route::get('/', function () {
//     return view('welcome');
// });
