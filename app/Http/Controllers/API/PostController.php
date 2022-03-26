<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\MasterPostController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post_controller_controller;
    public function  __construct()
    {
        $this->post_controller_controller = new MasterPostController();
    }

    public function index()
    {
        return $this->post_controller_controller->all();
    }

    public function store()
    {
      return $this->post_controller_controller->create();
    }
   
    public function show($id)
    {
        $post = Post::with(['website'])->whereId($id)->get();
        return PostResource::collection($post);
    }
}
