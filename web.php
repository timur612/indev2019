<?php

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
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use app\Role;
use App\Post;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/registr', function(Request $req){
   header('Access-Control-Allow-Origin:*');
    $id = App\User::insertGetId(
    ['name' => $req->login , 'email' => $req->email, 'password' => $req->password,'phone'=>$req->phone,'surname'=>$req->surname]
);
    return $id;
});

Route::get('/signIn', function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    $user=App\User::where("email",'=',$req->log )->where("password","=",$req->pass)->get();
  
    
    return $user;
});
Route::get('/createPost', function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    App\Post::create(["description"=>$req->description,"category"=>$req->category,"user_id"=>$req->userId, "status"=>0,"time1"=>$req->time1,"time2"=>$req->time2,"price"=>$req->price,"price2"=>0,"price_time"=>$req->price_time,"title"=>$req->title]);
});
Route::get('/test',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    
});
Route::get('/myPost',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    $post=App\Post::where('status',0)->where("user_id",'=',$req->user_id)->get();
    return $post;
    
});
Route::get('/post',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    $post=App\Post::where('status',0)->get();
    return $post;
    
});
Route::get('/donePost',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    $post= App\Post::where('id',$req->post_id)->update(['status'=>1]);
    return $post;
    
});
Route::get('/productPost',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    $post=App\Post::where('status',1)->get();
    return $post;
    
});
Route::get('/horosh',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    $post= App\Post::where('id',$req->post_id)->update(['status'=>2]);
    return $post;
});
Route::get('/myProfile', function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    $user=App\User::where("id",'=',$req->user_id)->get();
    return $user;
});
Route::get('/doneProduct',function(Request $req){
    header('Access-Control-Allow-Origin:*');
    
    $post= App\Post::where('id',$req->post_id)->update(['price2'=>$req->price]);
    return $post;
    
});