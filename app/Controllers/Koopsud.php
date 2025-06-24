<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelWilayah;
use App\Models\ModelSetting;
use App\Models\ModelKoopsud;
use App\Models\ModelKesatuan;



class Koopsud extends BaseController
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
        $this->ModelKoopsud = new ModelKoopsud();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Daftar Koopsud',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_index',
            'koopsud' => $this->ModelKoopsud->AllDataPerAlutsista(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Detail($id)
    {
        $data = [
            'judul' => 'Detail Koopsud',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_detail',
            'web' => $this->ModelSetting->DataWeb(),
            'koopsud' => $this->ModelKoopsud->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input Koopsud dan Alutsista',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Insert()
    {
        if ($this->validate([
            'nama_koopsud' => [
                'label' => 'Nama Koopsud',
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
                'label' => 'Jumlah Personel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pertahanan_udara' => [
                'label' => 'Nama Pertahanan Udara 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_pertahanan_udara_2' => [
                'label' => 'Nama Pertahanan Udara 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pertahanan_udara' => [
                'label' => 'Deskripsi Pertahanan Udara 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pertahanan_udara_2' => [
                'label' => 'Deskripsi Pertahanan Udara 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_pertahanan_udara' => [
                'label' => 'Foto Pertahanan Udara 1',
                'rules' => 'max_size[foto_pertahanan_udara,3072]|mime_in[foto_pertahanan_udara,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pertahanan_udara_2' => [
                'label' => 'Foto Pertahanan Udara 2',
                'rules' => 'max_size[foto_pertahanan_udara_2,3072]|mime_in[foto_pertahanan_udara_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pertahanan_udara' => [
                'label' => 'Jumlah Pertahanan Udara 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_pertahanan_udara_2' => [
                'label' => 'Jumlah Pertahanan Udara 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_amunisi' => [
                'label' => 'Nama Amunisi 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_amunisi_2' => [
                'label' => 'Nama Amunisi 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_amunisi' => [
                'label' => 'Deskripsi Amunisi 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_amunisi_2' => [
                'label' => 'Deskripsi Amunisi 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_amunisi' => [
                'label' => 'Foto Amunisi 1',
                'rules' => 'max_size[foto_amunisi,3072]|mime_in[foto_amunisi,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_amunisi_2' => [
                'label' => 'Foto Amunisi 2',
                'rules' => 'max_size[foto_amunisi_2,3072]|mime_in[foto_amunisi_2,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_amunisi' => [
                'label' => 'Jumlah Amunisi 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_amunisi_2' => [
                'label' => 'Jumlah Amunisi 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_pesawat_terbang' => [
                'label' => 'Nama Pesawat Terbang 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_pesawat_terbang_2' => [
                'label' => 'Nama Pesawat Terbang 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pesawat_terbang' => [
                'label' => 'Deskripsi Pesawat Terbang 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pesawat_terbang_2' => [
                'label' => 'Deskripsi Pesawat Terbang 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_pesawat_terbang' => [
                'label' => 'Foto Pesawat Terbang 1',
                'rules' => 'max_size[foto_pesawat_terbang,3072]|mime_in[foto_pesawat_terbang,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pesawat_terbang_2' => [
                'label' => 'Foto Pesawat Terbang 2',
                'rules' => 'max_size[foto_pesawat_terbang_2,3072]|mime_in[foto_pesawat_terbang_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pesawat_terbang' => [
                'label' => 'Jumlah Pesawat Terbang 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_pesawat_terbang_2' => [
                'label' => 'Jumlah Pesawat Terbang 2',
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
                'label' => 'Alamat Koopsud',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Koopsud',
                'rules' => 'max_size[foto,3072]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $foto_koopsud = $this->request->getFile('foto');
            if ($foto_koopsud->isValid()) {
                $nama_file_foto_koopsud = $foto_koopsud->getRandomName();
                $foto_koopsud->move('Gambar/Koopsud/Logo', $nama_file_foto_koopsud);
            }

            $foto_amunisi = $this->request->getFile('foto_amunisi');
            $nama_file_foto_amunisi = '-';
            if ($foto_amunisi->isValid()) {
                $nama_file_foto_amunisi = $foto_amunisi->getRandomName();
                $foto_amunisi->move('Gambar/Koopsud/Amunisi', $nama_file_foto_amunisi);
            }

            $foto_amunisi_2 = $this->request->getFile('foto_amunisi_2');
            $nama_file_foto_amunisi_2 = '-';
            if ($foto_amunisi_2->isValid()) {
                $nama_file_foto_amunisi_2 = $foto_amunisi_2->getRandomName();
                $foto_amunisi_2->move('Gambar/Koopsud/Amunisi 2', $nama_file_foto_amunisi_2);
            }

            $foto_pertahanan_udara = $this->request->getFile('foto_pertahanan_udara');
            $nama_file_foto_pertahanan_udara = '-';
            if ($foto_pertahanan_udara->isValid()) {
                $nama_file_foto_pertahanan_udara = $foto_pertahanan_udara->getRandomName();
                $foto_pertahanan_udara->move('Gambar/Koopsud/Pertahanan Udara', $nama_file_foto_pertahanan_udara);
            }

            $foto_pertahanan_udara_2 = $this->request->getFile('foto_pertahanan_udara_2');
            $nama_file_foto_pertahanan_udara_2 = '-';
            if ($foto_pertahanan_udara_2->isValid()) {
                $nama_file_foto_pertahanan_udara_2 = $foto_pertahanan_udara_2->getRandomName();
                $foto_pertahanan_udara_2->move('Gambar/Koopsud/Pertahanan Udara 2', $nama_file_foto_pertahanan_udara_2);
            }

            $foto_pesawat_terbang = $this->request->getFile('foto_pesawat_terbang');
            $nama_file_foto_pesawat_terbang = '-';
            if ($foto_pesawat_terbang->isValid()) {
                $nama_file_foto_pesawat_terbang = $foto_pesawat_terbang->getRandomName();
                $foto_pesawat_terbang->move('Gambar/Koopsud/Pesawat Terbang', $nama_file_foto_pesawat_terbang);
            }

            $foto_pesawat_terbang_2 = $this->request->getFile('foto_pesawat_terbang_2');
            $nama_file_foto_pesawat_terbang_2 = '-';
            if ($foto_pesawat_terbang_2->isValid()) {
                $nama_file_foto_pesawat_terbang_2 = $foto_pesawat_terbang_2->getRandomName();
                $foto_pesawat_terbang_2->move('Gambar/Koopsud/Pesawat Terbang 2', $nama_file_foto_pesawat_terbang_2);
            }

            //jika validasi berhasil
            $data = [
                'nama_koopsud'                      => $this->request->getPost('nama_koopsud'),
                'tgl_dibentuk'                       => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                         => $this->request->getPost('id_wilayah'),
                'jml_personel'                       => (int)$this->request->getPost('jml_personel'),
                'nama_amunisi'                      => empty($this->request->getPost('nama_amunisi')) ? '-' : $this->request->getPost('nama_amunisi'),
                'nama_amunisi_2'                    => empty($this->request->getPost('nama_amunisi_2')) ? '-' : $this->request->getPost('nama_amunisi_2'),
                'deskripsi_amunisi'                 => empty($this->request->getPost('deskripsi_amunisi')) ? '-' : $this->request->getPost('deskripsi_amunisi'),
                'deskripsi_amunisi_2'               => empty($this->request->getPost('deskripsi_amunisi_2')) ? '-' : $this->request->getPost('deskripsi_amunisi_2'),
                'foto_amunisi'                      => $nama_file_foto_amunisi,
                'foto_amunisi_2'                    => $nama_file_foto_amunisi_2,
                'jml_amunisi'                       => empty($this->request->getPost('jml_amunisi')) ? 0 : (int)$this->request->getPost('jml_amunisi'),
                'jml_amunisi_2'                     => empty($this->request->getPost('jml_amunisi_2')) ? 0 : (int)$this->request->getPost('jml_amunisi_2'),
                'nama_pertahanan_udara'            => empty($this->request->getPost('nama_pertahanan_udara')) ? '-' : $this->request->getPost('nama_pertahanan_udara'),
                'nama_pertahanan_udara_2'          => empty($this->request->getPost('nama_pertahanan_udara_2')) ? '-' : $this->request->getPost('nama_pertahanan_udara_2'),
                'deskripsi_pertahanan_udara'       => empty($this->request->getPost('deskripsi_pertahanan_udara')) ? '-' : $this->request->getPost('deskripsi_pertahanan_udara'),
                'deskripsi_pertahanan_udara_2'     => empty($this->request->getPost('deskripsi_pertahanan_udara_2')) ? '-' : $this->request->getPost('deskripsi_pertahanan_udara_2'),
                'foto_pertahanan_udara'            => $nama_file_foto_pertahanan_udara,
                'foto_pertahanan_udara_2'          => $nama_file_foto_pertahanan_udara_2,
                'jml_pertahanan_udara'             => empty($this->request->getPost('jml_pertahanan_udara')) ? 0 : (int)$this->request->getPost('jml_pertahanan_udara'),
                'jml_pertahanan_udara_2'           => empty($this->request->getPost('jml_pertahanan_udara_2')) ? 0 : (int)$this->request->getPost('jml_pertahanan_udara_2'),
                'nama_pesawat_terbang'        => empty($this->request->getPost('nama_pesawat_terbang')) ? '-' : $this->request->getPost('nama_pesawat_terbang'),
                'nama_pesawat_terbang_2'      => empty($this->request->getPost('nama_pesawat_terbang_2')) ? '-' : $this->request->getPost('nama_pesawat_terbang_2'),
                'deskripsi_pesawat_terbang'   => empty($this->request->getPost('deskripsi_pesawat_terbang')) ? '-' : $this->request->getPost('deskripsi_pesawat_terbang'),
                'deskripsi_pesawat_terbang_2' => empty($this->request->getPost('deskripsi_pesawat_terbang_2')) ? '-' : $this->request->getPost('deskripsi_pesawat_terbang_2'),
                'foto_pesawat_terbang'        => $nama_file_foto_pesawat_terbang,
                'foto_pesawat_terbang_2'      => $nama_file_foto_pesawat_terbang_2,
                'jml_pesawat_terbang'         => empty($this->request->getPost('jml_pesawat_terbang')) ? 0 : (int)$this->request->getPost('jml_pesawat_terbang'),
                'jml_pesawat_terbang_2'       => empty($this->request->getPost('jml_pesawat_terbang_2')) ? 0 : (int)$this->request->getPost('jml_pesawat_terbang_2'),
                'koordinat'                          => $this->request->getPost('koordinat'),
                'alamat'                             => $this->request->getPost('alamat'),
                'foto'                               => $nama_file_foto_koopsud,
            ];

            $this->ModelKoopsud->InsertData($data);
            session()->setFlashdata('success', 'Data ' . $data['nama_koopsud'] . ' Berhasil Ditambahkan!');
            return redirect()->to('Koopsud');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Koopsud/Input')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Edit($id)
    {
        $data = [
            'judul' => 'Edit Koopsud dan Alutsista',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'koopsud' => $this->ModelKoopsud->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function Update($id)
    {
        if ($this->validate([
            'nama_koopsud' => [
                'label' => 'Nama Koopsud',
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
                'label' => 'Jumlah Personel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pertahanan_udara' => [
                'label' => 'Nama Pertahanan Udara 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_pertahanan_udara_2' => [
                'label' => 'Nama Pertahanan Udara 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pertahanan_udara' => [
                'label' => 'Deskripsi Pertahanan Udara 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pertahanan_udara_2' => [
                'label' => 'Deskripsi Pertahanan Udara 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_pertahanan_udara' => [
                'label' => 'Foto Pertahanan Udara 1',
                'rules' => 'max_size[foto_pertahanan_udara,3072]|mime_in[foto_pertahanan_udara,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pertahanan_udara_2' => [
                'label' => 'Foto Pertahanan Udara 2',
                'rules' => 'max_size[foto_pertahanan_udara_2,3072]|mime_in[foto_pertahanan_udara_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pertahanan_udara' => [
                'label' => 'Jumlah Pertahanan Udara 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_pertahanan_udara_2' => [
                'label' => 'Jumlah Pertahanan Udara 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_amunisi' => [
                'label' => 'Nama Amunisi 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_amunisi_2' => [
                'label' => 'Nama Amunisi 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_amunisi' => [
                'label' => 'Deskripsi Amunisi 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_amunisi_2' => [
                'label' => 'Deskripsi Amunisi 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_amunisi' => [
                'label' => 'Foto Amunisi 1',
                'rules' => 'max_size[foto_amunisi,3072]|mime_in[foto_amunisi,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_amunisi_2' => [
                'label' => 'Foto Amunisi 2',
                'rules' => 'max_size[foto_amunisi_2,3072]|mime_in[foto_amunisi_2,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_amunisi' => [
                'label' => 'Jumlah Amunisi 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_amunisi_2' => [
                'label' => 'Jumlah Amunisi 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_pesawat_terbang' => [
                'label' => 'Nama Pesawat Terbang 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_pesawat_terbang_2' => [
                'label' => 'Nama Pesawat Terbang 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pesawat_terbang' => [
                'label' => 'Deskripsi Pesawat Terbang 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_pesawat_terbang_2' => [
                'label' => 'Deskripsi Pesawat Terbang 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_pesawat_terbang' => [
                'label' => 'Foto Pesawat Terbang 1',
                'rules' => 'max_size[foto_pesawat_terbang,3072]|mime_in[foto_pesawat_terbang,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pesawat_terbang_2' => [
                'label' => 'Foto Pesawat Terbang 2',
                'rules' => 'max_size[foto_pesawat_terbang_2,3072]|mime_in[foto_pesawat_terbang_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pesawat_terbang' => [
                'label' => 'Jumlah Pesawat Terbang 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_pesawat_terbang_2' => [
                'label' => 'Jumlah Pesawat Terbang 2',
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
                'label' => 'Alamat Koopsud',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Koopsud',
                'rules' => 'max_size[foto,3072]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $koopsud = $this->ModelKoopsud->DetailData($id);

            // Handle file uploads
            $fileFields = [
                'foto' => ['path' => 'Gambar/Koopsud/Logo/', 'current' => $koopsud['foto']],
                'foto_amunisi' => ['path' => 'Gambar/Koopsud/Amunisi/', 'current' => $koopsud['foto_amunisi']],
                'foto_amunisi_2' => ['path' => 'Gambar/Koopsud/Amunisi 2/', 'current' => $koopsud['foto_amunisi_2']],
                'foto_pertahanan_udara' => ['path' => 'Gambar/Koopsud/Pertahanan Udara/', 'current' => $koopsud['foto_pertahanan_udara']],
                'foto_pertahanan_udara_2' => ['path' => 'Gambar/Koopsud/Pertahanan Udara 2/', 'current' => $koopsud['foto_pertahanan_udara_2']],
                'foto_pesawat_terbang' => ['path' => 'Gambar/Koopsud/Pesawat Terbang/', 'current' => $koopsud['foto_pesawat_terbang']],
                'foto_pesawat_terbang_2' => ['path' => 'Gambar/Koopsud/Pesawat Terbang 2/', 'current' => $koopsud['foto_pesawat_terbang_2']]
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

            //jika validasi berhasil
            $data = [
                'id'                                 => $id,
                'nama_koopsud'                      => $this->request->getPost('nama_koopsud'),
                'tgl_dibentuk'                       => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                         => $this->request->getPost('id_wilayah'),
                'jml_personel'                       => (int)$this->request->getPost('jml_personel'),
                'nama_amunisi'                      => empty($this->request->getPost('nama_amunisi')) ? '-' : $this->request->getPost('nama_amunisi'),
                'nama_amunisi_2'                    => empty($this->request->getPost('nama_amunisi_2')) ? '-' : $this->request->getPost('nama_amunisi_2'),
                'deskripsi_amunisi'                 => empty($this->request->getPost('deskripsi_amunisi')) ? '-' : $this->request->getPost('deskripsi_amunisi'),
                'deskripsi_amunisi_2'               => empty($this->request->getPost('deskripsi_amunisi_2')) ? '-' : $this->request->getPost('deskripsi_amunisi_2'),
                'foto_amunisi'                      => $uploadedFiles['foto_amunisi'],
                'foto_amunisi_2'                    => $uploadedFiles['foto_amunisi_2'],
                'jml_amunisi'                       => empty($this->request->getPost('jml_amunisi')) ? 0 : (int)$this->request->getPost('jml_amunisi'),
                'jml_amunisi_2'                     => empty($this->request->getPost('jml_amunisi_2')) ? 0 : (int)$this->request->getPost('jml_amunisi_2'),
                'nama_pertahanan_udara'            => empty($this->request->getPost('nama_pertahanan_udara')) ? '-' : $this->request->getPost('nama_pertahanan_udara'),
                'nama_pertahanan_udara_2'          => empty($this->request->getPost('nama_pertahanan_udara_2')) ? '-' : $this->request->getPost('nama_pertahanan_udara_2'),
                'deskripsi_pertahanan_udara'       => empty($this->request->getPost('deskripsi_pertahanan_udara')) ? '-' : $this->request->getPost('deskripsi_pertahanan_udara'),
                'deskripsi_pertahanan_udara_2'     => empty($this->request->getPost('deskripsi_pertahanan_udara_2')) ? '-' : $this->request->getPost('deskripsi_pertahanan_udara_2'),
                'foto_pertahanan_udara'            => $uploadedFiles['foto_pertahanan_udara'],
                'foto_pertahanan_udara_2'          => $uploadedFiles['foto_pertahanan_udara_2'],
                'jml_pertahanan_udara'             => empty($this->request->getPost('jml_pertahanan_udara')) ? 0 : (int)$this->request->getPost('jml_pertahanan_udara'),
                'jml_pertahanan_udara_2'           => empty($this->request->getPost('jml_pertahanan_udara_2')) ? 0 : (int)$this->request->getPost('jml_pertahanan_udara_2'),
                'nama_pesawat_terbang'        => empty($this->request->getPost('nama_pesawat_terbang')) ? '-' : $this->request->getPost('nama_pesawat_terbang'),
                'nama_pesawat_terbang_2'      => empty($this->request->getPost('nama_pesawat_terbang_2')) ? '-' : $this->request->getPost('nama_pesawat_terbang_2'),
                'deskripsi_pesawat_terbang'   => empty($this->request->getPost('deskripsi_pesawat_terbang')) ? '-' : $this->request->getPost('deskripsi_pesawat_terbang'),
                'deskripsi_pesawat_terbang_2' => empty($this->request->getPost('deskripsi_pesawat_terbang_2')) ? '-' : $this->request->getPost('deskripsi_pesawat_terbang_2'),
                'foto_pesawat_terbang'        => $uploadedFiles['foto_pesawat_terbang'],
                'foto_pesawat_terbang_2'      => $uploadedFiles['foto_pesawat_terbang_2'],
                'jml_pesawat_terbang'         => empty($this->request->getPost('jml_pesawat_terbang')) ? 0 : (int)$this->request->getPost('jml_pesawat_terbang'),
                'jml_pesawat_terbang_2'       => empty($this->request->getPost('jml_pesawat_terbang_2')) ? 0 : (int)$this->request->getPost('jml_pesawat_terbang_2'),
                'koordinat'                          => $this->request->getPost('koordinat'),
                'alamat'                             => $this->request->getPost('alamat'),
                'foto'                               => $uploadedFiles['foto'],
            ];

            $this->ModelKoopsud->UpdateData($data);
            session()->setFlashdata('success', 'Data ' . $koopsud['nama_koopsud'] . ' Berhasil Diubah!');
            return redirect()->to('Koopsud');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Koopsud/Edit/' . $id)->withInput('validation', \Config\Services::validation());
        }
    }

    public function Delete($id)
    {
        $koopsud = $this->ModelKoopsud->DetailData($id);

        // Daftar file dan path yang perlu dihapus
        $filesToDelete = [
            'foto' => 'Gambar/Koopsud/Logo/' . $koopsud['foto'],
            'foto_pertahanan_udara' => 'Gambar/Koopsud/Pertahanan Udara/' . $koopsud['foto_pertahanan_udara'],
            'foto_pertahanan_udara_2' => 'Gambar/Koopsud/Pertahanan Udara 2/' . $koopsud['foto_pertahanan_udara_2'],
            'foto_amunisi' => 'Gambar/Koopsud/Amunisi/' . $koopsud['foto_amunisi'],
            'foto_amunisi_2' => 'Gambar/Koopsud/Amunisi 2/' . $koopsud['foto_amunisi_2'],
            'foto_pesawat_terbang' => 'Gambar/Koopsud/Pesawat Terbang/' . $koopsud['foto_pesawat_terbang'],
            'foto_pesawat_terbang_2' => 'Gambar/Koopsud/Pesawat Terbang 2/' . $koopsud['foto_pesawat_terbang_2']
        ];

        foreach ($filesToDelete as $field => $filePath) {
            try {
                // Skip jika file tidak ada atau default value '-'
                if ($koopsud[$field] == '-' || empty($koopsud[$field]) || !file_exists($filePath)) {
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
        $this->ModelKoopsud->DeleteData($data);

        session()->setFlashdata('success', 'Data ' . $koopsud['nama_koopsud'] . ' Berhasil Dihapus!');
        return redirect()->to('Koopsud');
    }
}
