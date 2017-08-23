<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{

    protected $fillable =['post_id', 'file_name', 'file_size', 'file_mime', 'file_path', 'created_by'];
    //

    public function post(){
        return $this->belongsTo('App\Post');
    }

}
