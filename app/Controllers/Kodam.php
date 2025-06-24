<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelSetting;
use App\Models\ModelKodam;
use App\Models\ModelKesatuan;
use App\Models\ModelWilayah;



class Kodam extends BaseController
{
    public function __construct()
    {
        //Cek role login
        if (session()->get('role') != 'admin') {
            session()->setFlashdata('pesan', 'Harap login dahulu sebagai admin!');
            header('Location: ' . base_url('Auth/LoginAdmin'));
            exit;
        }

        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelKodam = new ModelKodam();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Daftar Kodam',
            'menu'  => 'kodam',
            'page' => 'kodam/v_index',
            'kodam' => $this->ModelKodam->AllDataPerAlutsista(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Detail($id)
    {
        $data = [
            'judul' => 'Detail Kodam',
            'menu'  => 'kodam',
            'page' => 'kodam/v_detail',
            'web' => $this->ModelSetting->DataWeb(),
            'kodam' => $this->ModelKodam->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input Kodam dan Alutsista',
            'menu'  => 'kodam',
            'page' => 'kodam/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Insert()
    {
        if ($this->validate([
            'nama_kodam' => [
                'label' => 'Nama Kodam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'tgl_dibentuk' => [
                'label' => 'Tanggal Didirikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_wilayah' => [
                'label' => 'Wilayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_personel' => [
                'label' => 'Jumlah Personil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_artileri' => [
                'label' => 'Nama Artileri 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_artileri_2' => [
                'label' => 'Nama Artileri 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_artileri' => [
                'label' => 'Deskripsi Artileri 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_artileri_2' => [
                'label' => 'Deskripsi Artileri 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_artileri' => [
                'label' => 'Foto Artileri 1',
                'rules' => 'max_size[foto_artileri,3072]|mime_in[foto_artileri,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_artileri_2' => [
                'label' => 'Foto Artileri 2',
                'rules' => 'max_size[foto_artileri_2,3072]|mime_in[foto_artileri_2,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_artileri' => [
                'label' => 'Jumlah Artileri 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_artileri_2' => [
                'label' => 'Jumlah Artileri 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_tank' => [
                'label' => 'Nama Tank 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_tank_2' => [
                'label' => 'Nama Tank 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_tank' => [
                'label' => 'Deskripsi Tank 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_tank_2' => [
                'label' => 'Deskripsi Tank 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_tank' => [
                'label' => 'Foto Tank 1',
                'rules' => 'max_size[foto_tank,3072]|mime_in[foto_tank,image/jpg,image/jpeg,image/png]|ext_in[foto_tank,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_tank_2' => [
                'label' => 'Foto Tank 2',
                'rules' => 'max_size[foto_tank_2,3072]|mime_in[foto_tank_2,image/jpg,image/jpeg,image/png]|ext_in[foto_tank_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_tank' => [
                'label' => 'Jumlah Tank 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_tank_2' => [
                'label' => 'Jumlah Tank 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_helikopter' => [
                'label' => 'Nama Helikopter 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_helikopter_2' => [
                'label' => 'Nama Helikopter 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_helikopter' => [
                'label' => 'Deskripsi Helikopter 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_helikopter_2' => [
                'label' => 'Deskripsi Helikopter 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_helikopter' => [
                'label' => 'Foto Helikopter 1',
                'rules' => 'max_size[foto_helikopter,3072]|mime_in[foto_helikopter,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_helikopter_2' => [
                'label' => 'Foto Helikopter 2',
                'rules' => 'max_size[foto_helikopter_2,3072]|mime_in[foto_helikopter_2,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_helikopter' => [
                'label' => 'Jumlah Helikopter 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_helikopter_2' => [
                'label' => 'Jumlah Helikopter 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'koordinat' => [
                'label' => 'Koordinat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat Kodam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Kodam',
                'rules' => 'max_size[foto,3072]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $foto_kodam = $this->request->getFile('foto');
            if ($foto_kodam->isValid()) {
                $nama_file_foto_kodam = $foto_kodam->getRandomName();
                $foto_kodam->move('Gambar/Kodam/Logo', $nama_file_foto_kodam);
            }

            $foto_artileri = $this->request->getFile('foto_artileri');
            $nama_file_foto_artileri = '-';
            if ($foto_artileri->isValid()) {
                $nama_file_foto_artileri = $foto_artileri->getRandomName();
                $foto_artileri->move('Gambar/Kodam/Artileri', $nama_file_foto_artileri);
            }

            $foto_artileri_2 = $this->request->getFile('foto_artileri_2');
            $nama_file_foto_artileri_2 = '-';
            if ($foto_artileri_2->isValid()) {
                $nama_file_foto_artileri_2 = $foto_artileri_2->getRandomName();
                $foto_artileri_2->move('Gambar/Kodam/Artileri 2', $nama_file_foto_artileri_2);
            }

            $foto_tank = $this->request->getFile('foto_tank');
            $nama_file_foto_tank = '-';
            if ($foto_tank->isValid()) {
                $nama_file_foto_tank = $foto_tank->getRandomName();
                $foto_tank->move('Gambar/Kodam/Tank', $nama_file_foto_tank);
            }

            $foto_tank_2 = $this->request->getFile('foto_tank_2');
            $nama_file_foto_tank_2 = '-';
            if ($foto_tank_2->isValid()) {
                $nama_file_foto_tank_2 = $foto_tank_2->getRandomName();
                $foto_tank_2->move('Gambar/Kodam/Tank 2', $nama_file_foto_tank_2);
            }

            $foto_helikopter = $this->request->getFile('foto_helikopter');
            $nama_file_foto_helikopter = '-';
            if ($foto_helikopter->isValid()) {
                $nama_file_foto_helikopter = $foto_helikopter->getRandomName();
                $foto_helikopter->move('Gambar/Kodam/Helikopter', $nama_file_foto_helikopter);
            }

            $foto_helikopter_2 = $this->request->getFile('foto_helikopter_2');
            $nama_file_foto_helikopter_2 = '-';
            if ($foto_helikopter_2->isValid()) {
                $nama_file_foto_helikopter_2 = $foto_helikopter_2->getRandomName();
                $foto_helikopter_2->move('Gambar/Kodam/Helikopter 2', $nama_file_foto_helikopter_2);
            }

            //jika validasi berhasil
            $data = [
                'nama_kodam'              => $this->request->getPost('nama_kodam'),
                'tgl_dibentuk'            => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'              => $this->request->getPost('id_wilayah'),
                'jml_personel'            => (int)$this->request->getPost('jml_personel'),
                'nama_artileri'           => empty($this->request->getPost('nama_artileri')) ? '-' : $this->request->getPost('nama_artileri'),
                'nama_artileri_2'         => empty($this->request->getPost('nama_artileri_2')) ? '-' : $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'      => empty($this->request->getPost('deskripsi_artileri')) ? '-' : $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'    => empty($this->request->getPost('deskripsi_artileri_2')) ? '-' : $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'           => $nama_file_foto_artileri,
                'foto_artileri_2'         => $nama_file_foto_artileri_2,
                'jml_artileri'            => empty($this->request->getPost('jml_artileri')) ? 0 : (int)$this->request->getPost('jml_artileri'),
                'jml_artileri_2'          => empty($this->request->getPost('jml_artileri_2')) ? 0 : (int)$this->request->getPost('jml_artileri_2'),
                'nama_tank'               => empty($this->request->getPost('nama_tank')) ? '-' : $this->request->getPost('nama_tank'),
                'nama_tank_2'             => empty($this->request->getPost('nama_tank_2')) ? '-' : $this->request->getPost('nama_tank_2'),
                'deskripsi_tank'          => empty($this->request->getPost('deskripsi_tank')) ? '-' : $this->request->getPost('deskripsi_tank'),
                'deskripsi_tank_2'        => empty($this->request->getPost('deskripsi_tank_2')) ? '-' : $this->request->getPost('deskripsi_tank_2'),
                'foto_tank'               => $nama_file_foto_tank,
                'foto_tank_2'             => $nama_file_foto_tank_2,
                'jml_tank'                => empty($this->request->getPost('jml_tank')) ? 0 : (int)$this->request->getPost('jml_tank'),
                'jml_tank_2'              => empty($this->request->getPost('jml_tank_2')) ? 0 : (int)$this->request->getPost('jml_tank_2'),
                'nama_helikopter'         => empty($this->request->getPost('nama_helikopter')) ? '-' : $this->request->getPost('nama_helikopter'),
                'nama_helikopter_2'       => empty($this->request->getPost('nama_helikopter_2')) ? '-' : $this->request->getPost('nama_helikopter_2'),
                'deskripsi_helikopter'    => empty($this->request->getPost('deskripsi_helikopter')) ? '-' : $this->request->getPost('deskripsi_helikopter'),
                'deskripsi_helikopter_2'  => empty($this->request->getPost('deskripsi_helikopter_2')) ? '-' : $this->request->getPost('deskripsi_helikopter_2'),
                'foto_helikopter'         => $nama_file_foto_helikopter,
                'foto_helikopter_2'       => $nama_file_foto_helikopter_2,
                'jml_helikopter'          => empty($this->request->getPost('jml_helikopter')) ? 0 : (int)$this->request->getPost('jml_helikopter'),
                'jml_helikopter_2'        => empty($this->request->getPost('jml_helikopter_2')) ? 0 : (int)$this->request->getPost('jml_helikopter_2'),
                'koordinat'               => $this->request->getPost('koordinat'),
                'alamat'                  => $this->request->getPost('alamat'),
                'foto'                    => $nama_file_foto_kodam,
            ];

            $this->ModelKodam->InsertData($data);
            session()->setFlashdata('success', 'Data ' . $data['nama_kodam'] . ' Berhasil Ditambahkan!');
            return redirect()->to('Kodam');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Kodam/Input')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Edit($id)
    {
        $data = [
            'judul' => 'Edit Kodam dan Alutsista',
            'menu'  => 'kodam',
            'page' => 'kodam/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kodam' => $this->ModelKodam->DetailData($id),

        ];
        return view('v_template_back_end', $data);
    }

    public function Update($id)
    {
        if ($this->validate([
            'nama_kodam' => [
                'label' => 'Nama Kodam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'tgl_dibentuk' => [
                'label' => 'Tanggal Didirikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_wilayah' => [
                'label' => 'Wilayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_personel' => [
                'label' => 'Jumlah Personil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_artileri' => [
                'label' => 'Nama Artileri 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_artileri_2' => [
                'label' => 'Nama Artileri 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_artileri' => [
                'label' => 'Deskripsi Artileri 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_artileri_2' => [
                'label' => 'Deskripsi Artileri 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_artileri' => [
                'label' => 'Foto Artileri 1',
                'rules' => 'max_size[foto_artileri,3072]|mime_in[foto_artileri,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_artileri_2' => [
                'label' => 'Foto Artileri 2',
                'rules' => 'max_size[foto_artileri_2,3072]|mime_in[foto_artileri_2,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_artileri' => [
                'label' => 'Jumlah Artileri 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_artileri_2' => [
                'label' => 'Jumlah Artileri 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_tank' => [
                'label' => 'Nama Tank 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_tank_2' => [
                'label' => 'Nama Tank 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_tank' => [
                'label' => 'Deskripsi Tank 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_tank_2' => [
                'label' => 'Deskripsi Tank 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_tank' => [
                'label' => 'Foto Tank 1',
                'rules' => 'max_size[foto_tank,3072]|mime_in[foto_tank,image/jpg,image/jpeg,image/png]|ext_in[foto_tank,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_tank_2' => [
                'label' => 'Foto Tank 2',
                'rules' => 'max_size[foto_tank_2,3072]|mime_in[foto_tank_2,image/jpg,image/jpeg,image/png]|ext_in[foto_tank_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_tank' => [
                'label' => 'Jumlah Tank 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_tank_2' => [
                'label' => 'Jumlah Tank 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_helikopter' => [
                'label' => 'Nama Helikopter 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_helikopter_2' => [
                'label' => 'Nama Helikopter 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_helikopter' => [
                'label' => 'Deskripsi Helikopter 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_helikopter_2' => [
                'label' => 'Deskripsi Helikopter 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_helikopter' => [
                'label' => 'Foto Helikopter 1',
                'rules' => 'max_size[foto_helikopter,3072]|mime_in[foto_helikopter,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_helikopter_2' => [
                'label' => 'Foto Helikopter 2',
                'rules' => 'max_size[foto_helikopter_2,3072]|mime_in[foto_helikopter_2,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_helikopter' => [
                'label' => 'Jumlah Helikopter 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_helikopter_2' => [
                'label' => 'Jumlah Helikopter 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'koordinat' => [
                'label' => 'Koordinat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat Kodam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Kodam',
                'rules' => 'max_size[foto,3072]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            // Ambil data lama untuk keperluan update file
            $kodam = $this->ModelKodam->DetailData($id);

            // Handle file uploads
            $fileFields = [
                'foto' => ['path' => 'Gambar/Kodam/Logo/', 'current' => $kodam['foto']],
                'foto_artileri' => ['path' => 'Gambar/Kodam/Artileri/', 'current' => $kodam['foto_artileri']],
                'foto_artileri_2' => ['path' => 'Gambar/Kodam/Artileri 2/', 'current' => $kodam['foto_artileri_2']],
                'foto_tank' => ['path' => 'Gambar/Kodam/Tank/', 'current' => $kodam['foto_tank']],
                'foto_tank_2' => ['path' => 'Gambar/Kodam/Tank 2/', 'current' => $kodam['foto_tank_2']],
                'foto_helikopter' => ['path' => 'Gambar/Kodam/Helikopter/', 'current' => $kodam['foto_helikopter']],
                'foto_helikopter_2' => ['path' => 'Gambar/Kodam/Helikopter 2/', 'current' => $kodam['foto_helikopter_2']]
            ];

            $uploadedFiles = [];
            foreach ($fileFields as $field => $config) {
                $file = $this->request->getFile($field);
                if ($file->isValid() && !$file->hasMoved()) {
                    // Hapus file lama jika bukan default
                    if ($config['current'] && $config['current'] != '-' && file_exists($config['path'] . $config['current'])) {
                        unlink($config['path'] . $config['current']);
                    }
                    // Upload file baru
                    $newName = $file->getRandomName();
                    $file->move($config['path'], $newName);
                    $uploadedFiles[$field] = $newName;
                } else {
                    $uploadedFiles[$field] = $config['current'] ?? '-';
                }
            }

            // Siapkan data untuk update
            $data = [
                'id'                    => $id,
                'nama_kodam'            => $this->request->getPost('nama_kodam'),
                'tgl_dibentuk'          => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'            => $this->request->getPost('id_wilayah'),
                'jml_personel'          => (int)$this->request->getPost('jml_personel'),
                'nama_artileri'         => empty($this->request->getPost('nama_artileri')) ? '-' : $this->request->getPost('nama_artileri'),
                'nama_artileri_2'       => empty($this->request->getPost('nama_artileri_2')) ? '-' : $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'    => empty($this->request->getPost('deskripsi_artileri')) ? '-' : $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'  => empty($this->request->getPost('deskripsi_artileri_2')) ? '-' : $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'         => $uploadedFiles['foto_artileri'],
                'foto_artileri_2'       => $uploadedFiles['foto_artileri_2'],
                'jml_artileri'          => empty($this->request->getPost('jml_artileri')) ? 0 : (int)$this->request->getPost('jml_artileri'),
                'jml_artileri_2'        => empty($this->request->getPost('jml_artileri_2')) ? 0 : (int)$this->request->getPost('jml_artileri_2'),
                'nama_tank'             => empty($this->request->getPost('nama_tank')) ? '-' : $this->request->getPost('nama_tank'),
                'nama_tank_2'           => empty($this->request->getPost('nama_tank_2')) ? '-' : $this->request->getPost('nama_tank_2'),
                'deskripsi_tank'        => empty($this->request->getPost('deskripsi_tank')) ? '-' : $this->request->getPost('deskripsi_tank'),
                'deskripsi_tank_2'      => empty($this->request->getPost('deskripsi_tank_2')) ? '-' : $this->request->getPost('deskripsi_tank_2'),
                'foto_tank'             => $uploadedFiles['foto_tank'],
                'foto_tank_2'           => $uploadedFiles['foto_tank_2'],
                'jml_tank'              => empty($this->request->getPost('jml_tank')) ? 0 : (int)$this->request->getPost('jml_tank'),
                'jml_tank_2'            => empty($this->request->getPost('jml_tank_2')) ? 0 : (int)$this->request->getPost('jml_tank_2'),
                'nama_helikopter'       => empty($this->request->getPost('nama_helikopter')) ? '-' : $this->request->getPost('nama_helikopter'),
                'nama_helikopter_2'     => empty($this->request->getPost('nama_helikopter_2')) ? '-' : $this->request->getPost('nama_helikopter_2'),
                'deskripsi_helikopter'  => empty($this->request->getPost('deskripsi_helikopter')) ? '-' : $this->request->getPost('deskripsi_helikopter'),
                'deskripsi_helikopter_2' => empty($this->request->getPost('deskripsi_helikopter_2')) ? '-' : $this->request->getPost('deskripsi_helikopter_2'),
                'foto_helikopter'       => $uploadedFiles['foto_helikopter'],
                'foto_helikopter_2'     => $uploadedFiles['foto_helikopter_2'],
                'jml_helikopter'        => empty($this->request->getPost('jml_helikopter')) ? 0 : (int)$this->request->getPost('jml_helikopter'),
                'jml_helikopter_2'      => empty($this->request->getPost('jml_helikopter_2')) ? 0 : (int)$this->request->getPost('jml_helikopter_2'),
                'koordinat'             => $this->request->getPost('koordinat'),
                'alamat'                => $this->request->getPost('alamat'),
                'foto'                  => $uploadedFiles['foto'],
            ];


            $this->ModelKodam->UpdateData($data);
            session()->setFlashdata('success', 'Data ' . $kodam['nama_kodam'] . ' Berhasil Diubah!');
            return redirect()->to('Kodam');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Kodam/Edit')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Delete($id)
    {
        $kodam = $this->ModelKodam->DetailData($id);

        // Daftar file dan path yang perlu dihapus
        $filesToDelete = [
            'foto' => 'Gambar/Kodam/Logo/' . $kodam['foto'],
            'foto_tank' => 'Gambar/Kodam/Tank/' . $kodam['foto_tank'],
            'foto_tank_2' => 'Gambar/Kodam/Tank 2/' . $kodam['foto_tank_2'],
            'foto_artileri' => 'Gambar/Kodam/Artileri/' . $kodam['foto_artileri'],
            'foto_artileri_2' => 'Gambar/Kodam/Artileri 2/' . $kodam['foto_artileri_2'],
            'foto_helikopter' => 'Gambar/Kodam/Helikopter/' . $kodam['foto_helikopter'],
            'foto_helikopter_2' => 'Gambar/Kodam/Helikopter 2/' . $kodam['foto_helikopter_2']
        ];

        foreach ($filesToDelete as $field => $filePath) {
            try {
                // Skip jika file tidak ada atau default value '-'
                if ($kodam[$field] == '-' || empty($kodam[$field]) || !file_exists($filePath)) {
                    continue;
                }

                // Hapus file jika ada
                if (is_file($filePath)) {
                    unlink($filePath);
                }
            } catch (\Exception $e) {
                // Log error tapi jangan hentikan proses
                log_message('error', 'Gagal menghapus file ' . $field . ': ' . $e->getMessage());
            }
        }

        // Hapus data dari database
        $data = ['id' => $id];
        $this->ModelKodam->DeleteData($data);

        session()->setFlashdata('success', 'Data ' . $kodam['nama_kodam'] . ' Berhasil Dihapus!');
        return redirect()->to('Kodam');
    }
}
