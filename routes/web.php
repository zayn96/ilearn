<?php
Route::get('/', function () {
    $client = new GuzzleHttp\Client;
    try {
        $response = $client->post('http://dev.fun.test/oauth/token', [
            'form_params' => [
            'client_id' =>'13',
            'client_secret' => 'aKs8MjcTVp2VGalcArboYCuS8SNn0LyhorbMpCkp',
            'grant_type' => 'password',
            'username' => 'denis@gmail.com',
            'password' => '12345678',
            'scope' => '*',
            ]
        ]);

        $auth = json_decode( (string) $response->getBody() );
        $response = $client->get('http://ilearn.test/transactions', [
            'headers' => [
                'Authorization' => 'Bearer '.$auth->access_token,
            ]
        ]);
    } catch (GuzzleHttp\Exception\BadResponseException $e) {
        echo "<pre>";
        echo $e . "Unable to retrieve access token.";
        echo "</pre>";
    }
});


Route::resource('transactions', 'TransactionsController');
