<?php

use Illuminate\Database\Eloquent\Model;
use Unikat\LaravelRating\RatingTrait;

class Post extends Model
{
    use RatingTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['title', 'body'];

}
