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
$client = new GuzzleHttp\Client;
try {
$response = $client->post('http://localhost:8000/oauth/token', [
    'form_params' => [
        'client_id' => 'the_client_id_obtained_when_registered_to_API',
        'client_secret' => 'the_client_secret_obtained_when_registered_to_API',
        'grant_type' => 'password',
        'username' => 'username_used_for_registering',
        'password' => 'password_used_for_registering',
        'scope' => '*',
    ]
]);

$auth = json_decode( (string) $response->getBody() );
$response = $client->get('http://localhost:8000/api/users', [
    'headers' => [
        'Authorization' => 'Bearer '.$auth->access_token,
    ]
]);
$details = json_decode( (string) $response->getBody() );
