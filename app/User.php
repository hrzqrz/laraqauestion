<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = ['url', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getUrlAttribute()
    {
        return '#';
    }

    public function getAvatarAttribute()
    {
        $email = $this->email;
        $size = 32;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
    }

    public function favorites()
    {
        return $this->belongsToMany(Question::class, 'favorites', 'user_id', 'question_id')->withTimestamps();
    }

    public function voteQuestions()
    {
        return $this->morphedByMany(Question::class, 'votable');
    }

    public function voteAnswers()
    {
        return $this->morphedByMany(Answer::class, 'votable');
    }

    public function voteQuestion(Question $question, $vote)
    {
        $voteQuestions = $this->voteQuestions();
        // if($voteQuestions->where('votable_id', $question->id)->exists())
        // {
        //     $voteQuestions->updateExistingPivot($question, ['vote'=>$vote]);
        // }else{
        //     $voteQuestions->attach($question, ['vote'=>$vote]);
        // }

        // $question->load('votes');
        // $downVote = (int) $question->downVote()->sum('vote');
        // $upVote = (int) $question->upVote()->sum('vote');
        // $question->votes_count = $downVote + $upVote;
        // $question->save();
        $this->_vote($voteQuestions, $question, $vote);
    }

    public function voteAnswer(Answer $answer, $vote)
    {
        $voteAnswers = $this->voteAnswers();
        $this->_vote($voteAnswers, $answer, $vote);
    }

    public function _vote($relationship, $model, $vote)
    {
        if($relationship->where('votable_id', $model->id)->exists())
        {
            $relationship->updateExistingPivot($model, ['vote'=>$vote]);
        }else{
            $relationship->attach($model, ['vote'=>$vote]);
        }

        $model->load('votes');
        $downVote = (int) $model->voteDown()->sum('vote');
        $upVote = (int) $model->upVote()->sum('vote');
        $model->votes_count = $downVote + $upVote;
        $model->save();
    }

    
}
