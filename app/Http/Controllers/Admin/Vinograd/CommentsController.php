<?php

namespace App\Http\Controllers\Admin\Vinograd;

use App\Models\Vinograd\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;

class CommentsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('vinograd_comment_active', ' active');
    }

    public function index()
    {
        return view('admin.vinograd.comment.index', [
            'comments'	=>	Comment::with('product')->orderBy('status', 'desc')->paginate(20)
        ]);
    }

    public function edit($id)
    {
        return view('admin.comments.edit', [
            'comment' => Comment::find($id)
        ]);
    }

    public function update(Request $request)
    {
        return 'OK';
    }

    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::find($id)->remove();
        return redirect()->back();
    }
}
