<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\MasterSubscriberController;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public $subscriber_controller_controller;
    public function  __construct()
    {
        $this->subscriber_controller_controller = new MasterSubscriberController();
    }

    public function index()
    {
        return $this->subscriber_controller_controller->all();
    }

    public function store()
    {
      return $this->subscriber_controller_controller->create();
    }
   
    public function show($id)
    {
        $post = Subscriber::whereId($id)->get();
        return SubscriberResource::collection($post);
    }
}
