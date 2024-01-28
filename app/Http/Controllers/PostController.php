<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    // Get all posts with its images and paragraphs

    public function index()
    {
        $posts = Post::with('paragraphs', 'images')->where('is_deleted', false)->get();

        if(isset($posts) && !empty($posts)) {
            return response()->json($posts);
        } else {
            return response()->json([
                'bubbs_message' => 'There are no posts to see here my dude'
            ]);
        }
    }

    // Store a new post with only its title

    public function store(Request $request)
    {
        $bubbs_data = $request; 

        $post = new Post();
        $post->title = $bubbs_data['title'];

        $post->save();

        if (isset($post) && !empty($post)) {
                return response()->json($post);
            } else {
                return response()->json([
                    'bubbs_message' => 'You need to provide a title for your post to be created'
                ]);
            }
    }

    // Update an allready existing post by providing an id and a new title

    public function update(Request $request) 
    {
        $bubbs_data = $request;

        $post = Post::where('id', $bubbs_data['id'])->first();
    
        if (!$post) {
            return response()->json([
                'bubbs_message' => 'Sorry, cant find the post you are looking for'
            ]);
        }
    
        $post->title = $bubbs_data['title'];
    
        $post->save();
    
        return response()->json($post);
    }
}
