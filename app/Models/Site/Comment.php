<?php

namespace App\Models\Site;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = ['text','post_id', 'parent_id'];

    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
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
        $comment->status = (Auth::check() && Auth::user()['role'] == 3) ? 0 : 1;
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

    public static function getAllPostComments($id)
    {
        $temps = self::with('author', 'commentAuthor')->where(['post_id' => $id, 'status' => 0])->orderBy('id', 'asc')->get();
        foreach ($temps as $temp)
        {
            $temp->push($temp->author);
            $temp->push($temp->commentAuthor);
        }
        return getTree($temps->keyBy('id')->toArray());
    }
}
