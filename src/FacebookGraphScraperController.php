<?php

namespace Famdirksen\LaravelFacebookGraphScraper;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FacebookGraphScraperController extends Controller
{
    public function scrape($object, $access_token) {
        $client = new Client();
        $res = $client->request('POST', 'https://graph.facebook.com', [
            'form_params' => [
                'access_token' => $access_token,
                'id' => $object,
                'scrape' => true,
            ]
        ]);

        if($res->getStatusCode() != 200) {
            return [
                'status' => false,
                'response' => $res->getBody(),
                'status_code' => $res->getStatusCode()
            ];
        } else {
            return [
                'status' => true,
                'response' => $res->getBody(),
                'status_code' => $res->getStatusCode()
            ];
        }
    }
}
