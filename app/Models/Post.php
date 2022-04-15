<?php

namespace App\Models;


use App\Mail\PostMail;
use App\Models\Category;
use App\Mail\PostMarkdownMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Mailing 
    protected static function booted()
    {
        static::created(function($post){
            Mail::to('saimon@gmail.com')->send(new PostMail($post)); 
        });
    }


}
