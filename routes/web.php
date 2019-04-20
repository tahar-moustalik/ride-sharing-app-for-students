<?php
use Spatie\Sitemap\SitemapGenerator;

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
    return view('home');
});

Route::get('/messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('/messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('/messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::put('/messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);   //fin

Route::get('/load_messages', ['as' => 'load_messages',
 'uses' => 'MessagesController@index']);
 Route::get('/isVerified', ['as' => 'isVerified',
 'uses' => 'UserController@isVerified']);
Route::post('/dem_trajet',[
    'uses' => 'UserController@demTrajet',
    'as' => 'dem_trajet'
]);
Route::get('/sitemap',function(){
   SitemapGenerator::create('https://covoitlbahja.herokuapp.com/')->writeToFile('sitemap.xml');
  return 'sitemap created';
});


Route::get('/resultat_en', function () {
    return view('resultat_en');
});
Route::get('/dem_trajet',[
    'uses' => 'UserController@demTrajet',
    'as' => 'dem_trajet'
]);
Route::get('/act_trajet',[
    'uses' => 'UserController@actTrajet',
    'as' => 'act_trajet'
]);
Route::get('/resultat_re', function () {
    return view('resultat_re');
});
Route::post('/verification_account', [
    'uses' => 'verifiercontroller@store',
    'as' => 'verification_account'
  ]);
Route::get('/etatv', function () {
    return view('etatv');
});
Route::get('/notifications', function () {
    return view('notifications_panel');
});
Route::get('/verification', function () {
    return view('ver_cin');
});

Route::post('/qrcodetest',[
    'uses' => 'UserController@QRTest',
    'as' => 'qrcodetest'
]);

Route::get('/nbr_jetons', function () {
    return view('nbr_jetons');
});
Route::post('/updateProfil',[
    'uses' => 'ProfilController@updateProfil',
    'as' => 'updateProfil'
]);
Route::post('/updatePref',[
    'uses' => 'PrefController@updatePref',
    'as' => 'updatePref'
]);
Route::post('/updateVehicule',[
    'uses' => 'VehiculeController@updatevehicule',
    'as' => 'updatevehicule'
]);

Route::post('/passwordchange',[
    'uses' => 'UserController@passwordchange',
    'as' => 'passwordchange'
]);


Route::post('/test',[
    'uses' => 'UserController@test',
    'as' => 'test'
]);
Route::get('/plus_info', function(){
  return view('us');
});
Route::get('/index', function () {

        return view('index');

})->name('index');

Route::get('/proposer_trajet',[
    'uses' => 'UserController@propoTrajet',
    'as' => 'proposer_trajet'
]);
Route::get('/dem_trajet',[
    'uses' => 'UserController@demTrajet',
    'as' => 'dem_trajet'
]);
Route::get('/profil',[
    'uses' => 'ProfilController@infoPerso',
    'as' => 'profil'

]);
Route::get('/preferences',[
    'uses' => 'PrefController@infoPref',
    'as' => 'preferences'

]);

Route::get('/vehicule',[
    'uses' => 'VehiculeController@infovehicule',
    'as' => 'vehicule'

   ]);

Route::get('/fermercompte',function(){
    return view('profil.fermercompte');

   });
   Route::get('/mdp',function(){
    return view('profil.mdp');

   });

Route::post('/get-private-message-notifications',[
    'uses' => 'PrivateMessageController@getUserNotifications',
    'as' => 'get-private-message-notifications'
]);
Route::post('/get-private-messages',[
    'uses' => 'PrivateMessageController@getPrivateMessages',
    'as' => 'get-private-messages'
]);
Route::post('/get-private-message',[
    'uses' => 'PrivateMessageController@getPrivateMessageById',
    'as' => 'get-private-message'
]);
Route::post('/get-private-messages-sent',[
    'uses' => 'PrivateMessageController@getPrivateMessageSent',
    'as' => 'get-private-messages-sent'
]);
Route::post('/send-private-message',[
    'uses' => 'PrivateMessageController@sendPrivateMessage',
    'as' => 'send-private-message'
]);
Route::get('/demand_tr', [
    'uses' => 'TrajetController@dem_tr',
    'as' => 'demand_tr'
]);
Route::post('/submit_trajet',[
    'uses' => 'UserController@submitTrajet',
    'as' => 'submit_trajet'
]);
Route::get('/list_users', [
    'uses' => 'UserController@list',
    'as' => 'list_users'
]);
Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);
Route::post('/cherch_trajet', [
    'uses' => 'TrajetController@search',
    'as' => 'cherch_trajet'
]);
Route::get('/rech_quart', [
    'uses' => 'QuartController@search',
    'as' => 'rech_quart'
]);
Route::get('/rech_univ', [
    'uses' => 'UnivController@search',
    'as' => 'rech_univ'
]);
Route::post('/submit',[
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);
Route::post('/signin',[
    'uses' => 'UserController@postSignIn',
    'as' => 'signin',

]);
Route::get('/signin', function () {
    return view('index');
})->name('signin')->middleware('auth');
Auth::routes();

Route::get('/inscription',function(){
    return view('inscription');
});
Route::get('/connexion',function(){
    return view('connexion');
});

Route::get('/verifyEmailFirst',[

    'uses' =>'UserController@verifyEmail',
    'as' => 'verifyEmailFirst'

    ]);

Route::get('/verify/{email}/{token}',[

    'uses' =>'UserController@sendEmailDone',
    'as' => 'sendEmailDone'
    ]);

Route::get('/signin-failure',function (){

  return view('signin-failure');
})->name('signin-failure');

Route::get('/signin-success',function (){
 //return view('signin-success')->with('status',$status);
 return view('signin-success');

})->name('signin-success');
