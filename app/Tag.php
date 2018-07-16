<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $primaryKey = 'tag_id';
    protected $fillable   = ['tag_user', 'tag_name', ];

    /**
     * Return model for the User who created this tag
     *
     * @return model App\User
     */
    public function getTagOwner()
    {
        return $this->belongsTo('App/User', 'tag_user');
    }
}
