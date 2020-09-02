<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use VotableTrait;
    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'question_id', 'user_id')->withTimestamps();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->answers_count > 0 )
        {
            if($this->best_answer_id)
            {
                return "answer-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
    }

    // public function setBodyAttribute($value)
    // {
    //      $this->attributes['body'] = clean($value);
    // }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', \auth()->id())->count() > 0 ;
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function getExcerpAttribute()
    {
        return $this->excerp(300);
    }

    public function excerp($length)
    {
        return str_limit(strip_tags($this->bodyHtml()), $length);
    }

    private function bodyHtml()
    {
        return \Parsedown::instance()->text($this->body);
    }
}
