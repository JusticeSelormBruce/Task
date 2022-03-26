<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Jobs\SendEmailJob;
use App\Mail\Notify;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MasterPostController extends Controller
{
    public   function all()
    {
        return  PostResource::collection(Post::paginate());
    }

    public function create()
    {
      $data =  Post::create(Post::validateIncomingPostRequest());
      foreach ( Post::subscribers($data['website_id']) as $recipient) {
        Mail::to($recipient)->send(new Notify($data));
    }
      dispatch(new SendEmailJob($data));
    }

    public function getPost($id)
    {
        $post = Post::find($id);
        $posts = $post->website;
        return  PostResource::collection($posts);
      
    }
}
