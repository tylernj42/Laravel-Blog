<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsto(User::class);
    }
    public function addComment($body){
        $comment = new \App\Comment;
        $comment->body = $body;
        $comment->user_id = auth()->id();
        $comment->post_id = $this->id;
        $comment->save();
    }
    public function scopeFilter($query, $filters){
        if(isset($filters['month']) && isset($filters['month'])){
            if($month = $filters['month']){
                $query->whereMonth('created_at', \Carbon\Carbon::parse($month)->month);
            }
            if($year = $filters['year']){
                $query->whereYear('created_at', $year);
            }
        }
    }
    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
