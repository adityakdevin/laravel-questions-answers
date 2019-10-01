<?php
    
    namespace App\Models;
    
    trait VotableTrait
    {
        public function upVotes()
        {
            return $this->votes()->wherePivot('vote', 1);
        }
        
        public function votes()
        {
            return $this->morphToMany(User::class, 'votable');
        }
        
        public function downVotes()
        {
            return $this->votes()->wherePivot('vote', -1);
        }
    }
