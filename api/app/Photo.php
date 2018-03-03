<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'ur',
        'comment',
        'user_id',
        'comment_id'
    ];
}