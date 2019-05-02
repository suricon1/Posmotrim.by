<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\AddCommentRequest;
use App\Http\Requests\Site\DeleteCommentRequest;
use App\Http\Requests\Site\EditCommentRequest;
use App\Mail\CommentEmail;
use App\Mail\CommentReplyEmail;
use App\Models\Site\Comment;
use App\Models\Site\Post;
use App\Models\Site\UserComment;
use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

class CommentController extends Controller
{
    public $mail;
    public $newPosts = [];

    public function __construct(PostRepository $postRep)
    {
        $this->newPosts = $postRep->getNewOrPopularPosts ('date_add', 4);
    }

    /*-------------------
        store action
    -------------------*/
    public function store(AddCommentRequest $request)
    {
        $this->addCommentAndSendEmail($request);
        return redirect()->back()->with('status', is_admin()
                                                    ? 'Ваш комментарий добавлен!'
                                                    : 'Ваш комментарий будет добавлен после проверки!');
    }

    /*-------------------
        ajaxStore action
    -------------------*/
    public function ajaxStore (AddCommentRequest $request)
    {
        $comment = $this->addCommentAndSendEmail($request);
        return ['succes' => is_admin()
            ? view('components.ajax-comment-item', ['comment' => $comment])->render()
            : '<div class="alert alert-success coment_blok"> Ваш комментарий будет добавлен после проверки!</div>'];
    }

    /*-------------------
        ajaxEdit action
    -------------------*/
    public function ajaxEdit(EditCommentRequest $request)
    {
        $comment = Comment::find($request->input('comment_id'));
        $comment->text = $request->input('text');
        $comment->save();

        return ['succes' => $request->input('text')];
    }

    /*-------------------
        ajaxDelete action
    -------------------*/
    public function ajaxDelete(DeleteCommentRequest $request)
    {
        if (Comment::where('parent_id', $request->input('comment_id'))->count()){
            return ['errors' => ['2' => 'Удалить этот комментарий нельзя, на него есть ответы!']];
        }

        Comment::find($request->input('comment_id'))->delete();
        return ['succes' => 'Ok'];
    }

//-----------------------------------------------------------

    private function addCommentAndSendEmail($request)
    {
        if(!Auth::user())
        {
            $user_comment = UserComment::add($request->get('name'), $request->get('email'));
            $comment = Comment::add($request->all(), $user_comment->id);
        }
        else
        {
            $comment = Comment::add($request->all());
        }

        $post = Post::find($comment->post_id);
        if($post->user_id != $comment->user_id) {
            //Mail::to($post->author->email)->send(new CommentEmail($post, $comment, $this->newPosts));
            //Mail::to($$post->author->email)->later(10, new CommentEmail($post, $comment, $this->newPosts));
            Mail::to($post->author->email)->queue(new CommentEmail($post, $comment, $this->newPosts));
        }
        if($comment->parent_id)
        {
            $parentComment = Comment::find($comment->parent_id);
            if($post->user_id != $parentComment->user_id) {
                //Mail::to($email)->send(new CommentReplyEmail($post, $comment, $parentComment, $this->newPosts));
                //Mail::to($email)->later(10, new CommentReplyEmail($post, $comment, $parentComment, $newPosts));
                Mail::to($parentComment->author ? $parentComment->author->email : $parentComment->commentAuthor->email)
                    ->queue(new CommentReplyEmail($post, $comment, $parentComment, $this->newPosts));
            }
        }
        return $comment;
    }
}
