<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillable=['title' ,'body'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function setTitleAttribute($value){
        $this->attributes['title'] =$value;
        $this->attributes['slug'] = Str::slug($value);
    }
    //$question = Question::find(1);

    public function getUrlAttribute(){
        return route("question.show", $this->slug);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute(){
        if($this->answers >0){
            if($this->best_answer_id){
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute(){
        return $this->body;
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
