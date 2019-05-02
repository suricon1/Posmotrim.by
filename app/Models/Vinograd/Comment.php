<?php

namespace App\Models\Vinograd;

use App\Models\Site\User;
use App\Models\Site\UserComment;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'vinograd_comments';
    public $timestamps = false;
    protected $fillable = ['text','product_id', 'blog_id', 'parent_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentAuthor()
    {
        return $this->belongsTo(UserComment::class, 'user_coment');
    }

    public static function add($fields, $user_comment = 0)
    {
        $comment = new static;
        $comment->fill($fields);
        $comment->date_coment = time();
        $comment->user_id = Auth::check() ? Auth::user()->id : 0;
        $comment->status = is_admin() ? 0 : 1;
        $comment->user_coment = $user_comment;
        $comment->save();
        return $comment;
    }

    public function allow()
    {
        $this->status = 1;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = 0;
        $this->save();
    }

    public function toggleStatus()
    {
        return ($this->status == 0) ? $this->allow() : $this->disAllow();
    }

    public function remove()
    {
        $this->delete();
    }

    public static function getNewCommentsCount()
    {
        $temp = self::where('status', 1)->get();
        return $temp->count();
    }

    public function getCildrenComments($id)
    {
        return $this->where(['status' => 0, 'parent_id' => $id])->get();
    }

    public static function getAllProductComments($id)
    {
        $temps = self::with('author', 'commentAuthor')->where(['product_id' => $id, 'status' => 0])->orderBy('id', 'asc')->get();
        foreach ($temps as $temp) {
            $temp->push($temp->author);
            $temp->push($temp->commentAuthor);
        }
        return getTree($temps->keyBy('id')->toArray());
    }
}
