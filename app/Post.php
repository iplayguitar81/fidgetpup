<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */

    public function images(){
        return $this ->hasMany('App\ImageGallery');
    }

    public function posts(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function ratings(){
        return $this->hasMany('willvincent\Rateable\Rating', 'post_id');
    }

    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id','title','subHead','body','imgPath', 'videoPath','mainImg_caption','main_article','published','category'];
}
