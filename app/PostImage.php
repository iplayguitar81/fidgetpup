<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;

class PostImage extends Model
{
    public function post_image(){
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function upload( $form_data )
    {

        $validator = Validator::make($form_data, Image::$rules, Image::$messages);

        if ($validator->fails()) {

            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);

        }

        $photo = $form_data['file'];

        $originalName = $photo->getClientOriginalName();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - 4);

        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename );

        $filenameExt = $allowed_filename .'.jpg';

        $uploadSuccess1 = $this->original( $photo, $filenameExt );

        $uploadSuccess2 = $this->icon( $photo, $filenameExt );

        if( !$uploadSuccess1 || !$uploadSuccess2 ) {

            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);

        }

        $sessionImage = new Image;
        $sessionImage->img_path      = $allowed_filename;
        // $sessionImage->original_name = $originalName;
        $sessionImage->save();

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);

    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_images';

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
    protected $fillable = [ 'img_path'];
}
