<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\Oauth;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Client;
use Carbon\Carbon;
use DB;
use Session;


class LineController extends Controller
{
    public function index()
    {
        $client = new Client();

        $carbon = Carbon::today();
        $today = $carbon->format('Y-m-d');

        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $message_request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/data/log/exception', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
        $message = $message_request->getBody();
        $message_count = substr_count($message, $today);

        $follow_request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/data/log/follow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
        $follow = $follow_request->getBody();
        $follow_count = substr_count($follow, $today);

        $unfollow_request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/data/log/unfollow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
        $unfollow = $unfollow_request->getBody();
        $unfollow_count = substr_count($unfollow, $today);
        $friend_count = $follow_count - $unfollow_count;

        $request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/status');
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
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/data/log/exception', [
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
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/data/log/follow', [
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
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('GET', env('LINE_CUSTOMIZED_API').'/api/v1/data/log/unfollow', [
            'headers' => [
                "Authorization" => "JWT $token",
            ]
        ]);
    
        $unfollows = json_decode($request->getBody());
        return view('line.log_unfollow', compact('unfollows'));
    }

    public function store_list()
    {
        $stores = Store::all();

        return view('line.store', compact('stores'));
    }

    public function generate_code(Store $store)
    {   
        $client = new Client();
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/api/v1/store/generate/code', [
            'headers' => [
                "Authorization" => "JWT $token",
            ],
            'json' => [
                "store_id"=> (string)$store->id
            ]
        ]);

        $code = json_decode($request->getBody())->code;
        return view('line.store_code', compact('code', 'store'));
    }

    public function user_list()
    {
        $users = DB::table('users')->where('users.phone', 'Not like', '%d%')->join('oauth', 'users.id', '=', 'oauth.user_id')->get();
        
        return view('line.user', compact('users'));
    }

    public function user_message(Line $line)
    {   
        $users = DB::table('oauth')->where('oauth.id', '=', $line->oauth_id)->first();
        $user_id = $users->user_id;
        $line_id = $line->id;
        $client = new Client();
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/api/v1/user/info', [
            'headers' => [
                "Authorization" => "JWT $token",
            ],
            'json' => [
                "mid"=> (string)$line->line_user_id
            ]
        ]);
        $info = json_decode($request->getBody());
        return view('line.user_message', compact('line', 'info', 'user_id', 'line_id'));
    }

    public function send_message()
    {
        $client = new Client();
        $message = Input::get('message'); 
        $user_id = Input::get('user_id');
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/auth', [
            'json' => [
                "username"=> env('LINE_API_USERNAME'),
                "password"=> env('LINE_API_PASSWORD'),
            ]
        ]);
        $token = json_decode($request->getBody())->access_token;
        $request = $client->request('POST', env('LINE_CUSTOMIZED_API').'/api/v1/push/user', [
            'headers' => [
                "Authorization" => "JWT $token",
            ],
            'json' => [
                "user_id"=> (string)$user_id,
                "message"=> (string)$message
            ]
        ]);
        Session::flash('message', '訊息已經成功送出！！'); 
        return redirect()->route('line.user');
    }
}
