<?php

namespace App\Controllers;

use App\Models\GalleryModel;
use App\Models\GallerySlideshowModel;
use App\Controllers\BaseController;
use Config\Services;
use Jenssegers\Blade\Blade;

class GalleryController extends BaseController
{

    public function index()
    {
        session();
        $blade  = new Blade(APPPATH . 'Views', WRITEPATH . 'cache');
        $galleries = GalleryModel::orderBy('id', 'ASC')->get();
        $data = [
            'galleries' => $galleries,
            'validation' => Services::validation()
        ];
        return $blade->make('gallery.homepage', $data)->render();
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
                ],
                'type' => [
                    'rules' => 'required|max_length[20]'
                ]
            ]))
        {
            $gallery = new GalleryModel;
            $data = [
                'pemilik' => $this->request->getPost('pemilik'),
                'cover' => $this->request->getPost('cover'),
                'caption' => $this->request->getPost('caption'),
                'category' => $this->request->getPost('category'),
                'type' => $this->request->getPost('type')
            ];
            $gallery->insert($data);

            return redirect()->to(route_to('gallery.index'))->with(
                'message', 'Berhasil menambah gallery'
            );
        }
        else {
            $validation = Services::validation();
            return redirect()->to(route_to('gallery.index'))->withInput()->with('validation', $validation);
        }

    }

    public function update($id)
    {
        $data = [
            'caption' => $this->request->getPost('caption'),
            'photo' => $this->request->getPost('photo'),
            'category'=> $this->request->getPost('category'),
            'pemilik' => $this->request->getPost('pemilik')
        ];
        GalleryModel::where('id', $id)->update($data);
        return redirect()->to(route_to('gallery.index'))->with(
            'message', 'berhasil update gallery'
        );
    }

    public function destroy($id)
    {
        $gallery = GalleryModel::findOrFail($id);
        $gallery->delete($id);

        return redirect()->route('gallery.index')->with(
            'message', "Berhasil menghapus salah satu gallery dengan pemilik $gallery->pemilik"
        );
    }

    public function filter($category)
    {
        session();
        $blade = new Blade(APPPATH . 'Views', WRITEPATH . 'cache');
        $galleries = $this->galleryModel->where('category', $category)
            ->join('gallery_slideshow','gallery_slideshow.gallery_id = gallery.id')
            ->orderBy('gallery.id', 'DESC')->findAll();
        $data = [
            'galleries' => $galleries,
            'validation' => Services::validation()
        ];
        return $blade->make('gallery.homepage', $data)->render();
    }

    public function type($type)
    {
        session();
        $galleries = GalleryModel::where('type', $type)->orderBy('gallery.id', 'DESC')->get();
        $blade  = new Blade(APPPATH . 'Views', WRITEPATH . 'cache');
        $data = [
            'galleries' => $galleries,
            'validation' => Services::validation()
        ];
        return $blade->make('gallery.homepage', $data)->render();
    }
    
}