<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* very temporary user storage */
class User
{
    public $id;
    public $name;
    public function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }
}

function initUsers() {
    global $users;
    $users[] = new User(0,'Derek');
    $users[] = new User(1,'Sam');
    $users[] = new User(2,'Niels');
}

/* example inline routes */

Route::get('/users', function() {
    global $users;
    initUsers();
    return json_encode($users);
});

Route::get('/users/{userId}', function($userId) {
    global $users;
    initUsers();
    return json_encode($users[$userId]);
});