<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{

    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $returnType = 'array';
    protected $allowedFields = ['cover', 'caption', 'pemilik', 'category', 'type'];
    public function getGallery($id = false)
    {
        if ($id == false) {
            return $this->join('gallery_slideshow','gallery_slideshow.gallery_id = gallery.id')
                ->orderBy('gallery.id', 'DESC')
                ->findAll();
        }
        return $this->where(['id', $id])
            ->join('gallery_slideshow','gallery_slideshow.gallery_id = gallery.id')
            ->orderBy('DESC')
            ->first();
    }
    public function updateProduct($data, $id)
    {
        return $this->db->table('gallery')->update($data, array('id' => $id));
    }
}