<?php

namespace App;

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
        'name', 'email', 'password','school','hall','phone','gender','course'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function settings(){
      return $this->hasOne("App\Setting");
    }
    public function reputation(){
      return $this->hasOne('App\Rep');
    }
    public function paperPieces(){
        return $this->hasMany('App\PaperPiece');
    }
    public function picturePieces(){
        return $this->hasMany('App\PicturePiece');
    }
    public function pdfPieces(){
       return $this->hasMany('App\PdfPiece');
    }
    public function likes(){
      return $this->hasMany("App\Likes");
    }
    public function comments(){
      return $this->hasMany("App\Comment");
    }
   
}
