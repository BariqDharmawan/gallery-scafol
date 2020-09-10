<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{

    protected $table = 'gallery';
    protected $fillable = ['cover', 'caption', 'pemilik', 'category', 'type'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function slideshow() {
        return $this->hasMany('App\Models\GallerySlideshowModel', 'gallery_id', 'id');
    }
}