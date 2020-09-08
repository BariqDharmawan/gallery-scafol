<?php

namespace App\Models;

use CodeIgniter\Model;

class GallerySlideshowModel extends Model
{
    protected $table = 'gallery_slideshow';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['photo', 'gallery_id'];
}