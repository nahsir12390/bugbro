<?php
use App\Models\Post;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TutorialController;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::middleware('auth')->controller(ChatController::class)->group(function () {
    Route::get('/chat', 'index')->name('chat.index');
    Route::post('/chat/send', 'send')->name('chat.send');
    Route::get('/chat/user/{user}', 'loadChat')->name('chat.load');
    Route::get('/chat/search-users', 'searchUsers')->name('chat.search');
});



Route::middleware('auth')->controller(TutorialController::class)->group(function() {
    Route::get('/tutorial/html', 'html')->name('tutorial.html');
    Route::get('/tutorial/css', 'css')->name('tutorial.css');
    Route::get('/tutorial/js', 'js')->name('tutorial.js');
    Route::get('/tutorial/php', 'php')->name('tutorial.php');
    Route::get('/tutorial/laravel', 'laravel')->name('tutorial.laravel');
    Route::get('/tutorial/vue', 'vue')->name('tutorial.vue');
    Route::get('/tutorial/react', 'react')->name('tutorial.react');
    Route::get('/tutorial/python', 'python')->name('tutorial.python');
    Route::get('/tutorial/java', 'java')->name('tutorial.java');
    Route::get('/tutorial/csharp', 'csharp')->name('tutorial.csharp');
    Route::get('/tutorial/ruby', 'ruby')->name('tutorial.ruby');
    Route::get('/tutorial/mysql', 'mysql')->name('tutorial.mysql');
      Route::get('/tutorial/jquery', 'jquery')->name('tutorial.jquery');
          Route::get('/tutorial/cpp', 'cpp')->name('tutorial.cpp');
});


use App\Http\Controllers\FriendshipController;

Route::middleware('auth')->group(function () {
    Route::get('/friends', [FriendshipController::class, 'friendsList'])->name('friends.list');
    Route::get('/requests', [FriendshipController::class, 'pendingRequests'])->name('friends.requests');
    Route::post('/send-request/{id}', [FriendshipController::class, 'sendRequest'])->name('friends.send');
    Route::post('/accept-request/{id}', [FriendshipController::class, 'acceptRequest'])->name('friends.accept');
    Route::post('/cancel-request/{id}', [FriendshipController::class, 'cancelRequest'])->name('friends.cancel');
    Route::get('/friends', [FriendshipController::class, 'friendsList'])->name('friends.list');


});



Route::middleware('auth')->controller(PostController::class)->group(function(){
Route::get('/post', 'index')->name('show.post'); 
Route::get('/post/create', 'create')->name('createData') ;
Route::post('/store','store')->name('storeData');
Route::get('/post/{id}/edit', 'edit')->name('editData');
Route::put('/post/{id}', 'update')->name('updateData');
Route::delete('/post/{id}', 'destroy')->name('deleteData');

});

// authentication routes

Route::middleware('auth')->controller(LikeController::class)->group(function(){
Route::post('/posts/{post}/like', 'like')->name('posts.like');
Route::delete('/posts/{post}/unlike', 'unlike')->name('posts.unlike');

});

Route::middleware('auth')->controller(CommentController::class)->group(function () {
    Route::post('/posts/{post}/comments', 'store')->name('comments.store');
    Route::get('/comments/{comment}/edit', 'edit')->name('comments.edit');
    Route::put('/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
});



Route::middleware('guest')->controller(AuthController::class)->group(function(){
Route::get('/login', 'showLogin')->name('show.login');
Route::post('/login', 'login')->name('login');


Route::get('/register',  'showRegister')->name('show.register');
Route::post('/register', 'register')->name('register');




});


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->controller(UserController::class)->group(function () {
    // View any user's profile
    Route::get('/user/{user}', 'profile')->name('user.profile');
    
    // View your own profile
    Route::get('/my-profile', function () {
        return redirect()->route('user.profile', auth()->id());
    })->name('user.myprofile');
});
