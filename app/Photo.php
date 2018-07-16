<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $primaryKey = 'photo_id';
    protected $fillable   = [
        'photo_user', 'photo_name', 'photo_path', 'photo_privacy',
    ];

    /**
     * Return model for the User who uploaded this photo
     *
     * @return model App\User
     */
    public function getPhotoOwner()
    {
        return $this->belongsTo('App/User', 'photo_user');
    }
}
