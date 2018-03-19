<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class LineController extends Controller
{
    public function index()
    {
        $client = new Client();

        $carbon = Carbon::today();
        $today = $carbon->format('Y-m-d');

        $request = $client->request('POST', 'https://linebot.5breakfast.com/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $message_request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/exception', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
        $message = $message_request->getBody();
        $message_count = substr_count($message, $today);

        $follow_request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/follow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
        $follow = $follow_request->getBody();
        $follow_count = substr_count($follow, $today);

        $unfollow_request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/unfollow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
        $unfollow = $unfollow_request->getBody();
        $unfollow_count = substr_count($unfollow, $today);
        $friend_count = $follow_count - $unfollow_count;

        $request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/status');
        $bot_status = json_decode($request->getBody());
        return view('line.index', compact('message_count', 'follow_count', 'unfollow_count', 'friend_count', 'bot_status'));
    }

    public function note()
    {
        return view('line.note');
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

    public function follow_log()
    {
        $client = new Client();
        $request = $client->request('POST', 'https://linebot.5breakfast.com/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/follow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
    
        $follows = json_decode($request->getBody());
        return view('line.log_follow', compact('follows'));
    }

    public function unfollow_log()
    {
        $client = new Client();
        $request = $client->request('POST', 'https://linebot.5breakfast.com/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', 'https://linebot.5breakfast.com/api/v1/data/log/unfollow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
    
        $unfollows = json_decode($request->getBody());
        return view('line.log_unfollow', compact('unfollows'));
    }
}
