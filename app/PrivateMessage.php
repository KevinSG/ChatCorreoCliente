<?php

namespace App;


use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
   protected $fillable = ['sender_id','receiver_id','subject_message_id','message','read'];

   protected $appends = ['sender', 'receiver'];

   public function getCreatedAtAttribute($value)
   {
   		return Carbon::parse($value)->diffForHumans();
   }
 
   
   public function getSenderAttribute()
	{
      return User::where('id', $this->sender_id)->first();
  }
    
  public function getReceiverAttribute()
  {
      return User::where('id', $this->receiver_id)->first();
  }

  public function subject(){
      return $this->belongsTo('App\Subject');
  }
}
