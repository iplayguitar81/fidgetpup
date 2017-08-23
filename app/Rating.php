<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public function ratings(){
        return $this->belongsTo('willvincent\Rateable\Rating', 'id');
    }


    protected $table = 'ratings';

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
    protected $fillable = ['rating', 'user_id', 'rateable_id', 'post_id'];
}
