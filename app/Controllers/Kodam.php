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
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelKodam = new ModelKodam();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kodam',
            'menu'  => 'kodam',
            'page' => 'kodam/v_index',
            'kodam' => $this->ModelKodam->AllData(),
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
            'judul' => 'Kodam',
            'menu'  => 'kodam',
            'page' => 'kodam/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertDataKodam()
    {
        if ($this->validate([
            'nama_kodam' => [
                'label' => 'Nama Kodam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_kesatuan' => [
                'label' => 'Kesatuan',
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_artileri_2' => [
                'label' => 'Nama Artileri 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_artileri' => [
                'label' => 'Deskripsi Artileri 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_artileri_2' => [
                'label' => 'Deskripsi Artileri 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_artileri' => [
                'label' => 'Foto Artileri 1',
                'rules' => 'max_size[foto_artileri,1024]|mime_in[foto_artileri,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_artileri_2' => [
                'label' => 'Foto Artileri 2',
                'rules' => 'max_size[foto_artileri_2,1024]|mime_in[foto_artileri_2,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_artileri' => [
                'label' => 'Jumlah Artileri 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_artileri_2' => [
                'label' => 'Jumlah Artileri 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_tank' => [
                'label' => 'Nama Tank 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_tank_2' => [
                'label' => 'Nama Tank 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_tank' => [
                'label' => 'Deskripsi Tank 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_tank_2' => [
                'label' => 'Deskripsi Tank 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_tank' => [
                'label' => 'Foto Tank 1',
                'rules' => 'max_size[foto_tank,1024]|mime_in[foto_tank,image/jpg,image/jpeg,image/png]|ext_in[foto_tank,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_tank_2' => [
                'label' => 'Foto Tank 2',
                'rules' => 'max_size[foto_tank_2,1024]|mime_in[foto_tank_2,image/jpg,image/jpeg,image/png]|ext_in[foto_tank_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_tank' => [
                'label' => 'Jumlah Tank 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_tank_2' => [
                'label' => 'Jumlah Tank 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_helikopter' => [
                'label' => 'Nama Helikopter 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_helikopter_2' => [
                'label' => 'Nama Helikopter 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_helikopter' => [
                'label' => 'Deskripsi Helikopter 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_helikopter_2' => [
                'label' => 'Deskripsi Helikopter 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_helikopter' => [
                'label' => 'Foto Helikopter 1',
                'rules' => 'max_size[foto_helikopter,1024]|mime_in[foto_helikopter,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_helikopter_2' => [
                'label' => 'Foto Helikopter 2',
                'rules' => 'max_size[foto_helikopter_2,1024]|mime_in[foto_helikopter_2,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_helikopter' => [
                'label' => 'Jumlah Helikopter 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_helikopter_2' => [
                'label' => 'Jumlah Helikopter 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            // Ambil semua file foto
            $foto_kodam = $this->request->getFile('foto');
            $foto_artileri = $this->request->getFile('foto_artileri');
            $foto_artileri_2 = $this->request->getFile('foto_artileri_2');
            $foto_tank = $this->request->getFile('foto_tank');
            $foto_tank_2 = $this->request->getFile('foto_tank_2');
            $foto_helikopter = $this->request->getFile('foto_helikopter');
            $foto_helikopter_2 = $this->request->getFile('foto_helikopter_2');

            // Generate nama random untuk setiap file
            $nama_file_foto = $foto_kodam->getRandomName();
            $nama_file_foto_artileri = $foto_artileri->getRandomName();
            $nama_file_foto_artileri_2 = $foto_artileri_2->getRandomName();
            $nama_file_foto_tank = $foto_tank->getRandomName();
            $nama_file_foto_tank_2 = $foto_tank_2->getRandomName();
            $nama_file_foto_helikopter = $foto_helikopter->getRandomName();
            $nama_file_foto_helikopter_2 = $foto_helikopter_2->getRandomName();
            
            //jika validasi berhasil
            $data = [
                'nama_kodam'                     => $this->request->getPost('nama_kodam'),
                'id_kesatuan'                       => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                      => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                        => $this->request->getPost('id_wilayah'),
                'jml_personel'                      => $this->request->getPost('jml_personel'),
                'nama_artileri'           => $this->request->getPost('nama_artileri'),
                'nama_artileri_2'         => $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'      => $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'    => $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'           => $nama_file_foto_artileri,
                'foto_artileri_2'         => $nama_file_foto_artileri_2,
                'jml_artileri'            => $this->request->getPost('jml_artileri'),
                'jml_artileri_2'          => $this->request->getPost('jml_artileri_2'),
                'nama_tank'                     => $this->request->getPost('nama_tank'),
                'nama_tank_2'                   => $this->request->getPost('nama_tank_2'),
                'deskripsi_tank'                => $this->request->getPost('deskripsi_tank'),
                'deskripsi_tank_2'              => $this->request->getPost('deskripsi_tank_2'),
                'foto_tank'                     => $nama_file_foto_tank,
                'foto_tank_2'                   => $nama_file_foto_tank_2,
                'jml_tank'                      => $this->request->getPost('jml_tank'),
                'jml_tank_2'                    => $this->request->getPost('jml_tank_2'),
                'nama_helikopter'       => $this->request->getPost('nama_helikopter'),
                'nama_helikopter_2'     => $this->request->getPost('nama_helikopter_2'),
                'deskripsi_helikopter'  => $this->request->getPost('deskripsi_helikopter'),
                'deskripsi_helikopter_2' => $this->request->getPost('deskripsi_helikopter_2'),
                'foto_helikopter'       => $nama_file_foto_helikopter,
                'foto_helikopter_2'     => $nama_file_foto_helikopter_2,
                'jml_helikopter'        => $this->request->getPost('jml_helikopter'),
                'jml_helikopter_2'      => $this->request->getPost('jml_helikopter_2'),
                'koordinat'                         => $this->request->getPost('koordinat'),
                'alamat'                            => $this->request->getPost('alamat'),
                'foto'                              => $nama_file_foto,
            ];

            // Pindahkan file ke folder tujuan
            $foto_kodam->move('Gambar/Kodam/Logo', $nama_file_foto);
            $foto_artileri->move('Gambar/Kodam/Artileri', $nama_file_foto_artileri);
            $foto_artileri_2->move('Gambar/Kodam/Artileri 2', $nama_file_foto_artileri_2);
            $foto_tank->move('Gambar/Kodam/Tank', $nama_file_foto_tank);
            $foto_tank_2->move('Gambar/Kodam/Tank 2', $nama_file_foto_tank_2);
            $foto_helikopter->move('Gambar/Kodam/Helikopter', $nama_file_foto_helikopter);
            $foto_helikopter_2->move('Gambar/Kodam/Helikopter 2', $nama_file_foto_helikopter_2);

            $this->ModelKodam->InsertDataKodam($data);
            session()->setFlashdata('insert', 'Data ' . $data['nama_kodam'] . ' Berhasil Ditambahkan!');
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
            'judul' => 'Edit Kodam',
            'menu'  => 'kodam',
            'page' => 'kodam/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kodam' => $this->ModelKodam->DetailData($id),

        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id)
    {
        if ($this->validate([
            'nama_kodam' => [
                'label' => 'Nama Kodam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_kesatuan' => [
                'label' => 'Kesatuan',
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_artileri_2' => [
                'label' => 'Nama Artileri 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_artileri' => [
                'label' => 'Deskripsi Artileri 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_artileri_2' => [
                'label' => 'Deskripsi Artileri 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_artileri' => [
                'label' => 'Foto Artileri 1',
                'rules' => 'max_size[foto_artileri,1024]|mime_in[foto_artileri,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_artileri_2' => [
                'label' => 'Foto Artileri 2',
                'rules' => 'max_size[foto_artileri_2,1024]|mime_in[foto_artileri_2,image/jpg,image/jpeg,image/png]|ext_in[foto_artileri_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_artileri' => [
                'label' => 'Jumlah Artileri 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_artileri_2' => [
                'label' => 'Jumlah Artileri 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_tank' => [
                'label' => 'Nama Tank 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_tank_2' => [
                'label' => 'Nama Tank 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_tank' => [
                'label' => 'Deskripsi Tank 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_tank_2' => [
                'label' => 'Deskripsi Tank 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_tank' => [
                'label' => 'Foto Tank 1',
                'rules' => 'max_size[foto_tank,1024]|mime_in[foto_tank,image/jpg,image/jpeg,image/png]|ext_in[foto_tank,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_tank_2' => [
                'label' => 'Foto Tank 2',
                'rules' => 'max_size[foto_tank_2,1024]|mime_in[foto_tank_2,image/jpg,image/jpeg,image/png]|ext_in[foto_tank_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_tank' => [
                'label' => 'Jumlah Tank 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_tank_2' => [
                'label' => 'Jumlah Tank 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_helikopter' => [
                'label' => 'Nama Helikopter 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_helikopter_2' => [
                'label' => 'Nama Helikopter 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_helikopter' => [
                'label' => 'Deskripsi Helikopter 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_helikopter_2' => [
                'label' => 'Deskripsi Helikopter 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_helikopter' => [
                'label' => 'Foto Helikopter 1',
                'rules' => 'max_size[foto_helikopter,1024]|mime_in[foto_helikopter,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_helikopter_2' => [
                'label' => 'Foto Helikopter 2',
                'rules' => 'max_size[foto_helikopter_2,1024]|mime_in[foto_helikopter_2,image/jpg,image/jpeg,image/png]|ext_in[foto_helikopter_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_helikopter' => [
                'label' => 'Jumlah Helikopter 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_helikopter_2' => [
                'label' => 'Jumlah Helikopter 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]|ext_in[foto,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
        ])) {
            // Ambil data lama untuk keperluan update file
            $kodam = $this->ModelKodam->DetailData($id);

            // Ambil file dari form
            $foto_kodam = $this->request->getFile('foto');
            $foto_artileri = $this->request->getFile('foto_artileri');
            $foto_artileri_2 = $this->request->getFile('foto_artileri_2');
            $foto_tank = $this->request->getFile('foto_tank');
            $foto_tank_2 = $this->request->getFile('foto_tank_2');
            $foto_helikopter = $this->request->getFile('foto_helikopter');
            $foto_helikopter_2 = $this->request->getFile('foto_helikopter_2');

            // Fungsi helper untuk handle upload dan hapus file lama
            function handleFileUpload($newFile, $oldFileName, $uploadPath)
            {
                if ($newFile->getError() == 4) {
                    return $oldFileName; // Tidak ada file baru diupload
                } else {
                    // Hapus file lama jika ada
                    if ($oldFileName && file_exists($uploadPath . $oldFileName)) {
                        unlink($uploadPath . $oldFileName);
                    }
                    // Upload file baru
                    $newFileName = $newFile->getRandomName();
                    $newFile->move($uploadPath, $newFileName);
                    return $newFileName;
                }
            }

            // Proses setiap file
            $nama_file_foto_kodam = handleFileUpload(
                $foto_kodam,
                $kodam['foto'],
                'Gambar/Kodam/Logo/'
            );

            $nama_file_foto_tank = handleFileUpload(
                $foto_tank,
                $kodam['foto_tank'],
                'Gambar/Kodam/Tank/'
            );

            $nama_file_foto_tank_2 = handleFileUpload(
                $foto_tank_2,
                $kodam['foto_tank_2'],
                'Gambar/Kodam/Tank 2/'
            );

            $nama_file_foto_artileri = handleFileUpload(
                $foto_artileri,
                $kodam['foto_artileri'],
                'Gambar/Kodam/Artileri/'
            );

            $nama_file_foto_artileri_2 = handleFileUpload(
                $foto_artileri_2,
                $kodam['foto_artileri_2'],
                'Gambar/Kodam/Artileri 2/'
            );

            $nama_file_foto_helikopter = handleFileUpload(
                $foto_helikopter,
                $kodam['foto_helikopter'],
                'Gambar/Kodam/Helikopter/'
            );

            $nama_file_foto_helikopter_2 = handleFileUpload(
                $foto_helikopter_2,
                $kodam['foto_helikopter_2'],
                'Gambar/Kodam/Helikopter 2/'
            );

            $data = [
                'id'                                => $id,
                'nama_kodam'                      => $this->request->getPost('nama_kodam'),
                'id_kesatuan'                       => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                      => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                        => $this->request->getPost('id_wilayah'),
                'jml_personel'                      => $this->request->getPost('jml_personel'),
                'nama_artileri'             => $this->request->getPost('nama_artileri'),
                'nama_artileri_2'           => $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'        => $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'      => $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'             => $nama_file_foto_artileri,
                'foto_artileri_2'           => $nama_file_foto_artileri_2,
                'jml_artileri'              => $this->request->getPost('jml_artileri'),
                'jml_artileri_2'            => $this->request->getPost('jml_artileri_2'),
                'nama_tank'                 => $this->request->getPost('nama_tank'),
                'nama_tank_2'                   => $this->request->getPost('nama_tank_2'),
                'deskripsi_tank'                => $this->request->getPost('deskripsi_tank'),
                'deskripsi_tank_2'              => $this->request->getPost('deskripsi_tank_2'),
                'foto_tank'                     => $nama_file_foto_tank,
                'foto_tank_2'                   => $nama_file_foto_tank_2,
                'jml_tank'                      => $this->request->getPost('jml_tank'),
                'jml_tank_2'                    => $this->request->getPost('jml_tank_2'),
                'nama_helikopter'           => $this->request->getPost('nama_helikopter'),
                'nama_helikopter_2'         => $this->request->getPost('nama_helikopter_2'),
                'deskripsi_helikopter'      => $this->request->getPost('deskripsi_helikopter'),
                'deskripsi_helikopter_2'    => $this->request->getPost('deskripsi_helikopter_2'),
                'foto_helikopter'           => $nama_file_foto_helikopter,
                'foto_helikopter_2'         => $nama_file_foto_helikopter_2,
                'jml_helikopter'            => $this->request->getPost('jml_helikopter'),
                'jml_helikopter_2'          => $this->request->getPost('jml_helikopter_2'),
                'koordinat'                         => $this->request->getPost('koordinat'),
                'alamat'                            => $this->request->getPost('alamat'),
                'foto'                              => $nama_file_foto_kodam,
            ];

            $this->ModelKodam->UpdateData($data);
            session()->setFlashdata('insert', 'Data ' . $kodam['nama_kodam'] . ' Berhasil Diubah!');
            return redirect()->to('Kodam');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Kodam/Edit/' . $id)->withInput('validation', \Config\Services::validation());
        }
    }

    //delete
    public function Delete($id)
    {
        $kodam = $this->ModelKodam->DetailData($id);

        // Hapus foto di folder 
        if ($kodam['foto'] <> '') {
            unlink('Gambar/Kodam/Logo/' . $kodam['foto']);
        }

        if ($kodam['foto_tank'] <> '') {
            unlink('Gambar/Kodam/Tank/' . $kodam['foto_tank']);
        }

        if ($kodam['foto_tank_2'] <> '') {
            unlink('Gambar/Kodam/Tank 2/' . $kodam['foto_tank_2']);
        }

        if ($kodam['foto_artileri'] <> '') {
            unlink('Gambar/Kodam/Artileri/' . $kodam['foto_artileri']);
        }

        if ($kodam['foto_artileri_2'] <> '') {
            unlink('Gambar/Kodam/Artileri 2/' . $kodam['foto_artileri_2']);
        }

        if ($kodam['foto_helikopter'] <> '') {
            unlink('Gambar/Kodam/Helikopter/' . $kodam['foto_helikopter']);
        }

        if ($kodam['foto_helikopter_2'] <> '') {
            unlink('Gambar/Kodam/Helikopter 2/' . $kodam['foto_helikopter_2']);
        }

        $data = [
            'id' => $id,
        ];

        $this->ModelKodam->DeleteData($data);
        session()->setFlashdata('insert', 'Data ' . $kodam['nama_kodam'] . ' Berhasil Dihapus!');
        return redirect()->to('Kodam');
    }
}
