<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    // Get all posts with its images and paragraphs by providing a page number 
    // You can with ease change the amount of pages to get by changing the $page_amount value

    public function index(Request $request)
    {
        $page = $request->input('page', 1);

        $page_amount = 3;

        $posts = Post::with('paragraphs', 'images')
        ->where('is_deleted', false)
        ->paginate($page_amount, ['*'], 'page', $page);

        if(isset($posts) && !empty($posts)) {
            return response()->json($posts);
        } else {
            return response()->json([
                'bubbs_message' => 'There are no posts to see here my dude'
            ]);
        }
    }

    // Get a single post by providing an id

    public function single(Request $request)
    {
        $bubbs_data = $request;

        $post = Post::with('paragraphs', 'images')
        ->where('is_deleted', false)
        ->where('id', $bubbs_data['id'])
        ->first();
        if(!$post) {
            return response()->json([
                'bubbs_message' => 'This post does not exist its a fugazzi'
            ]);
        }
        return response()->json($post);
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

    // Update an allready existing post title by providing an id and a new title

    public function update(Request $request) 
    {
        $bubbs_data = $request;

        $post = Post::where('id', $bubbs_data['id'])->first();
    
        if(!$post) {
            return response()->json([
                'bubbs_message' => 'Sorry, cant find the post you are looking for'
            ]);
        }
    
        $post->title = $bubbs_data['title'];
    
        $post->save();
    
        return response()->json($post);
    }

    // Soft delete a post by providing a bool and an id

    public function delete(Request $request)
    {
        $bubbs_data = $request;

        $post = Post::where('id', $bubbs_data['id'])->first();

        if (!$post) {
            return response()->json([
                'bubbs_message' => 'Sorry, cant find the post you are looking for'
            ]);
        }

        $post->is_deleted = $bubbs_data['is_deleted'];
    
        $post->save();

        return response()->json([
            'deleted_post' => $post
        ]);
    }
}
