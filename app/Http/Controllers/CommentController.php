<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'news_id' => $request->news_id,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Reactie ingediend en wacht op goedkeuring.');
    }
}
