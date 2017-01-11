<?php

namespace Unikat\LaravelRating;

trait RatingTrait
{
    
    /**
     * @return mixed
     */
    public function ratings()
    {
        return $this->morphMany('Unikat\LaravelRating\Rating', 'rateable');
    }
    
    /**
     * @return mixed
     */
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    
    /**
     * @return mixed
     */
    public function sumRating()
    {
        return $this->ratings()->sum('rating');
    }
    
    /**
     * @param $id
     *
     * @return mixed
     */
    public function userAverageRating($id)
    {
        return $this->ratings()->where('user_id', $id)->avg('rating');
    }
    
    /**
     * @param $id
     *
     * @return mixed
     */
    public function userSumRating($id)
    {
        return $this->ratings()->where('user_id', $id)->sum('rating');
    }
    
    /**
     * @param int $max
     *
     * @return float|int
     */
    public function ratingPercent($max = 5)
    {
        $quantity = $this->ratings()->count();
        $total    = $this->sumRating();
        
        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    }
    
    /**
     * @return mixed
     */
    public function getAverageRatingAttribute()
    {
        return $this->averageRating();
    }
    
    /**
     * @return mixed
     */
    public function getSumRatingAttribute()
    {
        return $this->sumRating();
    }
    
    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUserAverageRatingAttribute($id)
    {
        return $this->userAverageRating($id);
    }
    
    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUserSumRatingAttribute($id)
    {
        return $this->userSumRating($id);
    }
}