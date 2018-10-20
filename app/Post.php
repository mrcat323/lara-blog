<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = true;

    /**
    * One-To-Many (inverse) relation
    * Binding Post Model to User Model
    * @see https://laravel.com/docs/5.5/eloquent-relationships#one-to-many-inverse
    */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
