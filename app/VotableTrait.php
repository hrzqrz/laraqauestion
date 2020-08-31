<?php
namespace App;

/**
 * 
 */
trait VotableTrait
{
    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }

    public function voteDown()
    {
        return $this->votes()->wherePivot('vote', -1);
    }

    public function upVote()
    {
        return $this->votes()->wherePivot('vote', 1);
    }
}
