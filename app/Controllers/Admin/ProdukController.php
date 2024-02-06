<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;

class ProdukController extends BaseController
{
    protected $KategoriModel;
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk'
        ];
        return view('admin/produk/index', $data);
    }

    public function kategori()
    {
        $kategori = $this->KategoriModel->orderBy('id_kategori', 'DESC')->findAll();
        $data = [
            'title' => 'Daftar Kategori',
            'daftar_kategori' => $kategori
        ];

        return view('admin/produk/kategori', $data, $kategori);
    }

    //tambah data kategori
    public function store()
    {
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->insert($data);
        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Ditambahkan!!!');
    }

    //ubah kategori
    public function update($id_kategori)
    {
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->update($id_kategori, $data); 

        return redirect()->back()->with('success', 'Data Kategori Berhasil Diubah!!!');
    }
}
