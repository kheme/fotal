<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $primaryKey = 'rating_id';
    protected $fillable   = ['rating_value', 'rating_user', 'rating_photo',];

    /**
     * Return model for the User who added this rating
     *
     * @return model App\User
     */
    public function getRatingOwner()
    {
        return $this->belongsTo('App/User', 'user_id', 'rating_user');
    }

    /**
     * Return model for the Photo that was rater
     *
     * @return model App\User
     */
    public function getRatedPhoto()
    {
        return $this->belongsTo('App/Photo', 'rating_photo');
    }
}
