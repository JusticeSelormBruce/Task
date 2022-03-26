<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use HasFactory;

    
    protected $guarded  =[];


    public static function validateIncomingPostRequest()
    {
        return request()->validate(
            [
                'title'=> 'string|required',
                'description'=> 'string|required',
                'website_id'=> 'numeric|required'
            ]
        );
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public static  function subscribers($post)
    {
        $data  = WebsiteSubscriber::whereWebsiteId($post)->get()->all();
     
        $array =[];
        foreach($data as $model){
           
           array_push($array,Subscriber::find($model->subscriber_id)->email);
        }
        return array_unique($array);

    }
}
