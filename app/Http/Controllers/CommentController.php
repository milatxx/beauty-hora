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

    public function index()
{
    $comments = Comment::latest()->paginate(10);
    return view('comments.index', compact('comments'));
}

public function approve(Comment $comment)
{
    $comment->approved = true;
    $comment->save();

    return redirect()->back()->with('success', 'Comment goedgekeurd.');
}

public function destroy(Comment $comment)
{
    $comment->delete();

    return redirect()->back()->with('success', 'Comment verwijderd.');
}

}
