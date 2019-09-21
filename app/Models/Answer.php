<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    
    class Answer extends Model
    {
        public static function boot()
        {
            parent::boot(); // TODO: Change the autogenerated stub
            static::created(function ($answer) {
                $answer->question->increment('answers_count');
                $answer->question->save();
            });
        }
        
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
            return \Parsedown::instance()->text($this->body);
        }
        
        public function getCreateDateAttribute()
        {
            return $this->created_at->diffForHumans();
        }
    }