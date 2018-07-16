<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapPhotoTag extends Model
{
    protected $primaryKey = 'map_id';
    protected $fillable   = ['photo_id', 'tag_id', ];

    /**
     * Return model for the Photo that was tagged
     *
     * @return model App\User
     */
    public function getTaggedPhoto()
    {
        return $this->belongsTo('App/Photo');
    }

    /**
     * Return model for the Photo that was tagged
     *
     * @return model App\User
     */
    public function getTaggedTag()
    {
        return $this->belongsTo('App/Tag');
    }
}
