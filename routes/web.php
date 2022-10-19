<?php

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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});
Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
});
Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
    Route::get('/', 'IndexController')->name('category.index');
    Route::get('/{category}', 'ShowController')->name('category.show');

});
Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function () {
    Route::get('/', 'IndexController')->name('tag.index');
    Route::get('/{tag}', 'ShowController')->name('tag.show');
});
Route::group(['namespace' => 'Map', 'prefix' => 'map'], function () {
    Route::get('/', 'IndexController')->name('map.index');
});
Route::group(['namespace' => 'Item', 'prefix' => 'item'], function () {
    Route::get('/', 'IndexController')->name('item.index');
});
Route::group(['namespace' => 'Character', 'prefix' => 'character'], function () {
    Route::get('/', 'IndexController')->name('character.index');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });
    Route::group(['namespace' => 'Character', 'prefix' => 'characters'], function () {
        Route::get('/', 'IndexController')->name('admin.character.index');
        Route::get('/create', 'CreateController')->name('admin.character.create');
        Route::post('/', 'StoreController')->name('admin.character.store');
        Route::get('/{character}', 'ShowController')->name('admin.character.show');
        Route::get('/{character}/edit', 'EditController')->name('admin.character.edit');
        Route::patch('/{character}', 'UpdateController')->name('admin.character.update');
        Route::delete('/{character}', 'DeleteController')->name('admin.character.delete');
    });
    Route::group(['namespace' => 'Spec', 'prefix' => 'spec'], function () {
        Route::get('/', 'IndexController')->name('admin.spec.index');
        Route::get('/create', 'CreateController')->name('admin.spec.create');
        Route::post('/', 'StoreController')->name('admin.spec.store');
        Route::get('/{spec}', 'ShowController')->name('admin.spec.show');
        Route::get('/{spec}/edit', 'EditController')->name('admin.spec.edit');
        Route::patch('/{spec}', 'UpdateController')->name('admin.spec.update');
        Route::delete('/{spec}', 'DeleteController')->name('admin.spec.delete');
    });
    Route::group(['namespace' => 'Weapon', 'prefix' => 'weapons'], function () {
        Route::get('/', 'IndexController')->name('admin.weapon.index');
        Route::get('/create', 'CreateController')->name('admin.weapon.create');
        Route::post('/', 'StoreController')->name('admin.weapon.store');
        Route::get('/{weapon}', 'ShowController')->name('admin.weapon.show');
        Route::get('/{weapon}/edit', 'EditController')->name('admin.weapon.edit');
        Route::patch('/{weapon}', 'UpdateController')->name('admin.weapon.update');
        Route::delete('/{weapon}', 'DeleteController')->name('admin.weapon.delete');
    });

    Route::group(['namespace' => 'Rarity', 'prefix' => 'rarity'], function () {
        Route::get('/', 'IndexController')->name('admin.rarity.index');
        Route::get('/create', 'CreateController')->name('admin.rarity.create');
        Route::post('/', 'StoreController')->name('admin.rarity.store');
        Route::get('/{rarity}', 'ShowController')->name('admin.rarity.show');
        Route::get('/{rarity}/edit', 'EditController')->name('admin.rarity.edit');
        Route::patch('/{rarity}', 'UpdateController')->name('admin.rarity.update');
        Route::delete('/{rarity}', 'DeleteController')->name('admin.rarity.delete');
    });
    Route::group(['namespace' => 'Food', 'prefix' => 'food'], function () {
        Route::get('/', 'IndexController')->name('admin.food.index');
        Route::get('/create', 'CreateController')->name('admin.food.create');
        Route::post('/', 'StoreController')->name('admin.food.store');
        Route::get('/{food}', 'ShowController')->name('admin.food.show');
        Route::get('/{food}/edit', 'EditController')->name('admin.food.edit');
        Route::patch('/{food}', 'UpdateController')->name('admin.food.update');
        Route::delete('/{food}', 'DeleteController')->name('admin.food.delete');
    });
    Route::group(['namespace' => 'Ingredient', 'prefix' => 'ingredients'], function () {
        Route::get('/', 'IndexController')->name('admin.ingredient.index');
        Route::get('/create', 'CreateController')->name('admin.ingredient.create');
        Route::post('/', 'StoreController')->name('admin.ingredient.store');
        Route::get('/{ingredient}', 'ShowController')->name('admin.ingredient.show');
        Route::get('/{ingredient}/edit', 'EditController')->name('admin.ingredient.edit');
        Route::patch('/{ingredient}', 'UpdateController')->name('admin.ingredient.update');
        Route::delete('/{ingredient}', 'DeleteController')->name('admin.ingredient.delete');
    });
    Route::group(['namespace' => 'Relic', 'prefix' => 'relics'], function () {
        Route::get('/', 'IndexController')->name('admin.relic.index');
        Route::get('/create', 'CreateController')->name('admin.relic.create');
        Route::post('/', 'StoreController')->name('admin.relic.store');
        Route::get('/{relic}', 'ShowController')->name('admin.relic.show');
        Route::get('/{relic}/edit', 'EditController')->name('admin.relic.edit');
        Route::patch('/{relic}', 'UpdateController')->name('admin.relic.update');
        Route::delete('/{relic}', 'DeleteController')->name('admin.relic.delete');
    });
    Route::group(['namespace' => 'Matrix', 'prefix' => 'matrices'], function () {
        Route::get('/', 'IndexController')->name('admin.matrix.index');
        Route::get('/create', 'CreateController')->name('admin.matrix.create');
        Route::post('/', 'StoreController')->name('admin.matrix.store');
        Route::get('/{matrix}', 'ShowController')->name('admin.matrix.show');
        Route::get('/{matrix}/edit', 'EditController')->name('admin.matrix.edit');
        Route::patch('/{matrix}', 'UpdateController')->name('admin.matrix.update');
        Route::delete('/{matrix}', 'DeleteController')->name('admin.matrix.delete');
    });
    Route::group(['namespace' => 'Element', 'prefix' => 'elements'], function () {
        Route::get('/', 'IndexController')->name('admin.element.index');
        Route::get('/create', 'CreateController')->name('admin.element.create');
        Route::post('/', 'StoreController')->name('admin.element.store');
        Route::get('/{element}', 'ShowController')->name('admin.element.show');
        Route::get('/{element}/edit', 'EditController')->name('admin.element.edit');
        Route::patch('/{element}', 'UpdateController')->name('admin.element.update');
        Route::delete('/{element}', 'DeleteController')->name('admin.element.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
