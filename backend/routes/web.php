<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {
    Route::namespace('Auth')->group(function () {
        Route::namespace('Login')->group(function () {
            Route::get('/login', 'LoginController@loginForm')->name('login.form');
            Route::post('/login', 'LoginController@login')->name('login');
        });
        Route::namespace('Register')->group(function () {
            Route::get('/register/form', 'RegisterController@registerForm')->name('register.form');
            Route::post('/register', 'RegisterController@register')->name('register');
            Route::get('/register/added', 'RegisterController@registerAdded')->name('register.added');
        });
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['can:admin']], function () {
        Route::namespace('Admin')->group(function () {
            Route::namespace('Post')->group(function () {
                Route::get('/post_category', 'PostsController@postCategoryIndex')->name('post_category.index');
                Route::resource('post_main_category', 'PostMainCategoriesController', ['only' => ['store', 'destroy']]);
                Route::resource('post_sub_category', 'PostSubCategoriesController', ['only' => ['store', 'destroy']]);
            });
        });
    });
    Route::group(['middleware' => ['can:user']], function () {
        Route::namespace('Auth')->group(function () {
            Route::namespace('Login')->group(function () {
                Route::get('/logout', 'LoginController@logout')->name('logout');
            });
        });
        Route::namespace('User')->group(function () {
            Route::namespace('Nav')->group(function () {
                Route::get('/work', 'NavsController@work')->name('work');
                Route::get('/profile', 'NavsController@profile')->name('profile');
            });
            Route::namespace('Post')->group(function () {
                Route::get('/post/index/{category?}', 'PostsController@index')->name('post.index');
                Route::resource('post', 'PostsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
                Route::group(['middleware' => ['post.show']], function () {
                    Route::get('/post/{post}', 'PostsController@show')->name('post.show');
                });
                Route::post('/post_comment/{post_comment}', 'PostCommentsController@store')->name('post_comment.store');
                Route::resource('post_comment', 'PostCommentsController', ['only' => ['edit', 'update', 'destroy']]);
                Route::post('/post_favorite', 'PostFavoritesController@postFavorite')->name('post_favorite');
                Route::post('/post_comment_favorite', 'PostCommentFavoritesController@postCommentFavorite')->name('post_comment_favorite');
            });
        });
    });
});
