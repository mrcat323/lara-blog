<?php

namespace App;

use App\Notifications\UserResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * One-To-Many relation
    * Binding User Model to Post model. With this, we'll get many posts for one user.
    * @see https://laravel.com/docs/5.5/eloquent-relationships#one-to-many
    */

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
    * Send Token to user's E-Mail
    *
    * @param string $token
    *
    * @return \Illuminate\Http\Response 
    */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }
}
