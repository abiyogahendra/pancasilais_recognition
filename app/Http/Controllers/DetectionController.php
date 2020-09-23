<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\HistoryDetection;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class DetectionController extends Controller
{
    public function index(){

        $account = HistoryDetection::orderBy('created_at', 'desc')->paginate(8);
        
        $getInfo = function($username){
            $stack = HandlerStack::create();
            $middleware = new Oauth1([
                'consumer_key'    => 'MqiWcnuB3qbOh7TGw3Ia54qFB',
                'consumer_secret' => 'b6QZ4eQwOvJooTPloWTHOGEPKl8wApmeVMs14hyqnHfNsvCRuC',
                'token'           => '1278260576251076608-AZd9nafiaqpn6Z1Eaq2Qgy9uYFgpBM',
                'token_secret'    => 'Mf3Jn8h53FNSK0e9DdnBILX6KOSXABKna9rikzLSo7EVL'
            ]);
            $stack->push($middleware);

            try {
            $client = new Client([
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack
            ]);

            // Set the "auth" request option to "oauth" to sign using oauth
            $res = $client->get('users/show.json?screen_name='.$username, ['auth' => 'oauth']);
            
            }catch (\GuzzleHttp\Exception\RequestException $e) {
                $res = $e->getResponse();
            }
            $statusCode = $res->getStatusCode();

            if($statusCode == 200){
                $response = $res->getBody();
                $result = json_decode($response, true);
            }else{
                $result = 'error';
            }
            

            return $result;
        };

        //dd($getInfo('tori_antosari'));
        return view('detection.index', compact('account', 'getInfo'));
    }

    public function list(){
        $account = HistoryDetection::orderBy('created_at', 'desc')->paginate(25);

        return view('detection.list', compact('account'));
    }

    public function manual(){
        return view('detection.manual');
    }

    public function processManual(Request $req){
        $username = $req->input('username');
        $tweet = $this->getTweetUser($username);

        $negativeResult = 0;
        $positiveResult = 0;
        $result = [];
        foreach($tweet as $t){
            $classify = $this->classify($t['text']);
            $result[] = [
                'tweet' => $t["text"],
                'class' => $classify[0],
                'classification' => $classify[1],
            ];
            if($classify[0] == 'positive'){
                $positiveResult += $classify[1];
            }else{
                $negativeResult += $classify[1];
            }

            

        }
        
        return view('detection.manualResult', compact('result'));
    }

    public function getUserInfo($username){
        $stack = HandlerStack::create();
            $middleware = new Oauth1([
                'consumer_key'    => 'MqiWcnuB3qbOh7TGw3Ia54qFB',
                'consumer_secret' => 'b6QZ4eQwOvJooTPloWTHOGEPKl8wApmeVMs14hyqnHfNsvCRuC',
                'token'           => '1278260576251076608-AZd9nafiaqpn6Z1Eaq2Qgy9uYFgpBM',
                'token_secret'    => 'Mf3Jn8h53FNSK0e9DdnBILX6KOSXABKna9rikzLSo7EVL'
            ]);
            $stack->push($middleware);

            try {
            $client = new Client([
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack
            ]);

            // Set the "auth" request option to "oauth" to sign using oauth
            $res = $client->get('users/show.json?screen_name='.$username, ['auth' => 'oauth']);
            
            }catch (\GuzzleHttp\Exception\RequestException $e) {
                $res = $e->getResponse();
            }
            $statusCode = $res->getStatusCode();

            if($statusCode == 200){
                $response = $res->getBody();
                $result = json_decode($response, true);
            }else{
                $result = 'error';
            }
            

        return $result;
    }

    public function getTweetUser($username){
        $stack = HandlerStack::create();
            $middleware = new Oauth1([
                'consumer_key'    => 'MqiWcnuB3qbOh7TGw3Ia54qFB',
                'consumer_secret' => 'b6QZ4eQwOvJooTPloWTHOGEPKl8wApmeVMs14hyqnHfNsvCRuC',
                'token'           => '1278260576251076608-AZd9nafiaqpn6Z1Eaq2Qgy9uYFgpBM',
                'token_secret'    => 'Mf3Jn8h53FNSK0e9DdnBILX6KOSXABKna9rikzLSo7EVL'
            ]);
            $stack->push($middleware);

            try {
            $client = new Client([
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack
            ]);

            // Set the "auth" request option to "oauth" to sign using oauth
            $res = $client->get('statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name='.$username.'&count=10', ['auth' => 'oauth']);
            
            }catch (\GuzzleHttp\Exception\RequestException $e) {
                $res = $e->getResponse();
            }
            $statusCode = $res->getStatusCode();

            if($statusCode == 200){
                $response = $res->getBody();
                $result = json_decode($response, true);
            }else{
                $result = 'error';
            }
            

        return $result;
    }

    public function classify($tweet){
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:5000/']);

        $response = $client->post('manual', [
            'json' => [
            'tweet' => $tweet
            ]
        ]);

        $response = $response->getBody();
        $result = json_decode($response, true);

        return $result[0];
    
    }
}
