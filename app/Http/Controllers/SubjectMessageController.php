<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LRedis;
use App\SubjectMessage;
use App\User;

class SubjectMessageController extends Controller
{
    
    public function getSubjectMessages(Request $request)
    {
        $pms = SubjectMessage::where('receiver_id', $request->id)
                ->orderBy('created_at', 'desc')
                ->get();

        return response(['data' => $pms], 200);
        //return $request;
    }

    public function getSubjectMessageSent(Request $request)
    {
        $pms = SubjectMessage::where('sender_id', $request->id)
                ->orderBy('created_at', 'desc')
                ->get();

        return response(['data' => $pms], 200);
       //return $request->user()->id;   
    }

    public function sendSubjectMessage(Request $request)
    {
    	$attributes = [
    		'sender_id' => $request->input('sender'),
    		'receiver_id' => $request->input('receiver'),
    		'subject' => $request->input('subject'),
            'read' => 0
    	];


    	$pm = SubjectMessage::create($attributes);
    	$data = SubjectMessage::where('id', $pm->id)->first();

        $countdata = SubjectMessage::where('read', 0)
                ->where('receiver_id', $pm->receiver_id)
                ->count();

        $redis = LRedis::connection();
        $redis->publish('message', json_encode(['message' => $data, 'count' => $countdata]));

        return response(['data' => $data], 201);
         
    }
    public function getSubjectMessageById(Request $request)
    {
        $pm = SubjectMessage::where('id', $request->input('id'))->first();

        return response(['data' => $pm], 200);  
    }
}
