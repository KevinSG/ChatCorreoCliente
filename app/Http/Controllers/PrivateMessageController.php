<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Redis;
use LRedis;
use Illuminate\Http\Request;
use App\PrivateMessage;
use App\User;

class PrivateMessageController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function getUserList()
    {
        $user = User::where('id', 1)->get();
        return response(['data' => $user], 200);
    }

    public function getUserNotifications(Request $request)
    {
    	$notifications = PrivateMessage::where('read', 0)
    	->where('receiver_id', $request->user()->id)
    	->orderBy('created_at','desc')
    	->get();

    	return response(['data' => $notifications], 200);
    }

    public function getPrimateMessages(Request $request)
    {
        $pms = PrivateMessage::where('subject_message_id', $request->id)
    			->orderBy('created_at', 'desc')
    			->get();

    	return response(['data' => $pms], 200);
        //return response(['data' => PrivateMessage::all()], 200);
    }
    
    public function sendPrivateMessage(Request $request)
    {
    	$attributes = [
    		'sender_id' => $request->input('sender'),
    		'receiver_id' => $request->input('receiver'),
    		'subject_message_id' => $request->input('subject_id'),
    		'message' => $request->input('message'),
    		'read' => 0
    	];


    	$pm = PrivateMessage::create($attributes);
    	$data = PrivateMessage::where('id', $pm->id)->first();

        $redis = LRedis::connection();
        $redis->publish('message', $data);

        return response(['data' => $data], 201);
         
    }

}
