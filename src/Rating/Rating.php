<?php

namespace Unikat\LaravelRating;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Rating extends Model
{
    
    /**
     * @var array
     */
    public $fillable = ['rating'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function rateable()
    {
        return $this->morphTo();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Config::get('cartalyst.sentinel.users.model'));
    }
}