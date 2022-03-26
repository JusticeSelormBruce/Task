<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Models\WebsiteSubscriber;
use Illuminate\Http\Request;

class MasterSubscriberController extends Controller
{
    public   function all()
    {
        return  SubscriberResource::collection(Subscriber::paginate());
    }

    public function create()
    {
        $data = Subscriber::validateIncomingSubscriberRequest();
        $subscriptions = $data['website_id'];
        unset($data['website_id']);
        $subcriber= Subscriber::create($data);
        foreach ($subscriptions as $item) {

            WebsiteSubscriber::create(['subscriber_id' => $subcriber->id, 'website_id' => $item]);
        }
        return $subcriber;
    }

    public function getPost($id)
    {
        $post = Subscriber::find($id);
        $posts = $post->website;
        return  SubscriberResource::collection($posts);
    }
}
