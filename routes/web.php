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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saml/login', function () {
    include '\app\SAML\saml\AuthnRequest.php';
    include '\app\SAML\saml\Acs.php';

    if( isset($_POST['SAMLResponse']) )
    {
        $response_obj = new Acs();
        $response = $response_obj->processSamlResponse($_POST);
        echo 'hello '.$response;
    }
    else{
        $authn_request = new AuthnRequest();
        $authn_request->initiateLogin();
    }
});
