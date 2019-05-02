<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $post = [];
    public $comment = [];
    public $parentComment = [];
    public $newPosts;

    public function __construct($post, $comment, $parentComment, $newPosts)
    {
        $this->post = $post;
        $this->comment = $comment;
        $this->parentComment = $parentComment;
        $this->newPosts = $newPosts;
    }

    public function build()
    {
        return $this->subject('На Ваш комментарий на сайте Posmotrim.by ответили')
            ->view('emails.comment_reply_send');
    }
}