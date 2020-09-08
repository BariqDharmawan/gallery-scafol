<?php

namespace App\Controllers;

use App\Models\GalleryModel;
use App\Models\GallerySlideshowModel;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use Config\Services;

class GalleryController extends BaseController
{

    protected $galleryModel;
    protected $gallerySlideshowModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
        $this->gallerySlideshowModel = new GallerySlideshowModel();
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
//        echo json_encode($galleries->toArray());
        return view('gallery/homepage', $data);
    }

    public function store()
    {
        if ($this->request->getMethod() === 'post' and $this->validate([
                'pemilik' => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} gallery harus diisi',
                    ]
                ],
                'cover' => [
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
                'category' => [
                    'rules' => 'required|max_length[20]'
                ]
            ]))
        {
            $this->galleryModel->save([
                'pemilik' => $this->request->getPost('pemilik'),
                'cover' => $this->request->getPost('cover'),
                'caption' => $this->request->getPost('caption'),
                'category' => $this->request->getPost('category'),
                'created_at' => date('Y-m-d H:i:s')
            ]);

            session()->setFlashdata('message', 'Berhasil menambahkan gallery baru');
            return redirect()->to(route_to('gallery.index'));
        }
        else {
            $validation = Services::validation();
            return redirect()->to(route_to('gallery.index'))->withInput()->with('validation', $validation);
        }

    }

    public function update($id)
    {
        $model = new GalleryModel();
        $data = [
            'caption' => $this->request->getPost('caption'),
            'photo' => $this->request->getPost('photo'),
            'category'=> $this->request->getPost('category'),
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

    public function filter($category)
    {
        session();
        $galleries = $this->galleryModel->where('category', $category)->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Gallery',
            'galleries' => $galleries,
            'validation' => Services::validation()
        ];
        return view('gallery/homepage', $data);
    }
    
}