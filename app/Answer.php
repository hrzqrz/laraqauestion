<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use votableTrait;
    protected $fillable = ['body', 'user_id'];
    protected $appends = ['created_date', 'body_html'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return clean(\Parsedown::instance()->text($this->body));
    }

    public static function boot()
    {
        parent::boot();
        static::created(function($answer){
            $answer->question->increment('answers_count');
        });

        static::deleted(function($answer){
            $question = $answer->question;
            $question->decrement('answers_count');
            if($question->best_answer_id == $answer->id)
            {
                $question->best_answer_id = NULL;
                $question->save();
            }
        });

        // static::saved(function($answer){ 
        //     echo "Answer saved\n";
        // });
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatuseAttribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }

    public function isBest()
    {
        return $this->id === $this->question->best_answer_id;
    }

}
