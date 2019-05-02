<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $post = [];
    public $comment = [];
    public $newPosts;

    public function __construct($post, $comment, $newPosts)
    {
        $this->post = $post;
        $this->comment = $comment;
        $this->newPosts = $newPosts;
    }

    public function build()
    {
        return $this->subject('Комментарий к Вашей статье на сайте Posmotrim.by')
                     ->view('emails.comment_send');
    }
}
