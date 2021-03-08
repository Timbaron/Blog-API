<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function index()
    {
        return post::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        return post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    }
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $success = $post->update([
            'title' => $request['title'],
            'content' => $request['content'],
        ]);

        return [
            'success' => $success,
        ];
    }
    public function destroy(Post $post)
    {
        $deleted = $post->delete();

        return [
            'Success' => $deleted,
        ];
    }
}
