<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{

    function index()
    {
        $posts = Post::all();
        return view('wall', ['posts' => $posts]);
    }

    public function post(Request $request)
    {
        echo "poster sur le mur : " . $request->username;
        $post = new Post;
        $post->content = $request->username;
        $post->user_id = Auth::id();
        $post->save();

        return redirect('wall');
    }

    function plip ($truc = null)
    {
        return '<p>plip : ' . $truc . '</p>';
    }

    // Afficher le formulaire de mise à jour d'un post
    function update(Request $request) {
        $post = Post::find($request->post_id);
        return view('postUpdate', ['post' => $post]);
    }

    function save(Request $request) {
        $post = Post::find($request->post_id);
        $post->content = $request->content;
        $post->save();
        return redirect('wall');
    }

    // Supprimer le post
    function delete(Request $request) {
        $post = Post::find($request->post_id);
        $post->delete();
        return redirect('wall')->with('success', 'Post deleted');
    }

}
