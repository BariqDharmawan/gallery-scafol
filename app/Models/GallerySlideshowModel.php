<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GallerySlideshowModel extends Model
{
    protected $table = 'gallery_slideshow';
    protected $primaryKey = 'id';
    protected $fillable = ['photo', 'gallery_id'];
    protected $with = ['gallery'];

    public $timestamps = true;

    public function gallery()
    {
        return $this->belongsTo('App\Models\GalleryModel');
    }
}