<?php

namespace App\Controllers;

use App\Models\Gallery;
use App\Models\GalleryModel;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use Config\Services;

class GalleryController extends BaseController
{

    protected $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }

    public function index()
    {
        session();
        $galleries = $this->galleryModel->getGallery();
        $data = [
            'title' => 'Gallery',
            'galleries' => $galleries,
            'validation' => Services::validation()
        ];
        return view('gallery/homepage', $data);
    }

    public function store()
    {
        if ($this->request->getMethod() === 'post' and $this->validate([
                'photo' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} gallery harus diisi',
                        'min_length' => '{field} gallery minimal 5 karakter'
                    ]
                ],
                'caption' => [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} gallery harus diisi',
                        'max_length' => '{field} gallery maksimal 255 karakter'
                    ]
                ],
                'category_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'gallery harus memiliki {field}'
                    ]
                ]
            ]))
        {
            $this->galleryModel->save([
                'photo' => $this->request->getPost('photo'),
                'caption' => $this->request->getPost('caption'),
                'category_id' => $this->request->getPost('category_id')
            ]);

            session()->setFlashdata('message', 'Berhasil menambahkan gallery baru');
            return redirect()->to('/gallery');
        }
        else {
            $validation = Services::validation();
            return redirect()->to('/gallery')->withInput()->with('validation', $validation);
        }

    }

    public function update($id)
    {
        $model = new GalleryModel();
        $data = [
            'caption' => $this->request->getPost('caption'),
            'photo' => $this->request->getPost('photo'),
            'category_id'=> $this->request->getPost('category_id'),
            'pemilik' => $this->request->getPost('pemilik')
        ];
        $model->updateProduct($data, $this->request->getPost('id'));
        return redirect()->to('/product');
    }

    public function destroy($id)
    {
        $this->galleryModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus salah satu gallery');
        return redirect()->to('/gallery');
    }
    
}