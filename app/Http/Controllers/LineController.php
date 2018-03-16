<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LineController extends Controller
{
    public function index()
    {
        $client = new Client();
        $request = $client->request('POST', 'https://linebot.5breakfast.com/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/exception', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
    
        json_decode($request->getBody());
        return view('line.index');
    }

    public function message_log()
    {
        $client = new Client();
        $request = $client->request('POST', 'https://linebot.5breakfast.com/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/exception', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
    
        $messages = json_decode($request->getBody());
        return view('line.log_message', compact('messages'));
    }
}
