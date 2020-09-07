<?php

namespace App\Models;


use CodeIgniter\Model;

class GalleryModel extends Model
{

    protected $deletedField  = 'deleted_at';
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['photo', 'caption', 'category_id', 'pemilik'];

    public function getGallery($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id', $id])->first();
    }
    public function updateProduct($data, $id)
    {
        return $this->db->table('gallery')->update($data, array('id' => $id));
    }
}