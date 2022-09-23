<?php

namespace App\Http\Repository;

use GuzzleHttp\Client; 

class FirebaseRepositoryImpl  implements FirebaseRepositoryInterface
{
    public function blastBroadCast($request)
    {
        // return $request;
        $client = new Client();
        $url =  env('URL_FIREBASE');
        $token = env('AUTHORIZATION');

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' =>    $token 
        ];
        $params = [
            'to' => '/topics/weather',
            'data' => [
                'extra_information'    => 'This is some Information' 
            ],
            'notification' => [
                'title'   => $request->judul,
                'text'   => "xxxxxxx",
                'image'   => 'https://rsyarsi.co.id/wp-content/uploads/2021/10/WhatsApp-Image-2021-10-18-at-09.20.38.jpeg'
            ]
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);

        $responseBody = json_decode($response->getBody());
       
            return $responseBody;
     

    } 
}
