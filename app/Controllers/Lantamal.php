<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelWilayah;
use App\Models\ModelSetting;
use App\Models\ModelLantamal;
use App\Models\ModelKesatuan;



class Lantamal extends BaseController
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
        $this->ModelLantamal = new ModelLantamal();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Daftar Lantamal',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_index',
            'lantamal' => $this->ModelLantamal->AllDataPerAlutsista(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Detail($id)
    {
        $data = [
            'judul' => 'Detail Lantamal',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_detail',
            'web' => $this->ModelSetting->DataWeb(),
            'lantamal' => $this->ModelLantamal->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input Lantamal dan Alutsista',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Insert()
    {
        if ($this->validate([
            'nama_lantamal' => [
                'label' => 'Nama Lantamal',
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
            'nama_armada_kapal_selam' => [
                'label' => 'Nama Armada Kapal Selam 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_armada_kapal_selam_2' => [
                'label' => 'Nama Armada Kapal Selam 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_selam' => [
                'label' => 'Deskripsi Armada Kapal Selam 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_selam_2' => [
                'label' => 'Deskripsi Armada Kapal Selam 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_armada_kapal_selam' => [
                'label' => 'Foto Kapal Selam 1',
                'rules' => 'max_size[foto_armada_kapal_selam,3072]|mime_in[foto_armada_kapal_selam,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_selam_2' => [
                'label' => 'Foto Kapal Selam 2',
                'rules' => 'max_size[foto_armada_kapal_selam_2,3072]|mime_in[foto_armada_kapal_selam_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_selam' => [
                'label' => 'Jumlah Armada Kapal Selam 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_armada_kapal_selam_2' => [
                'label' => 'Jumlah Armada Kapal Selam 2',
                'rules' => 'permit_empty',
                'errors' => []
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
            'nama_armada_kapal_permukaan' => [
                'label' => 'Nama Armada Kapal Permukaan 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_armada_kapal_permukaan_2' => [
                'label' => 'Nama Armada Kapal Permukaan 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_permukaan' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_permukaan_2' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_armada_kapal_permukaan' => [
                'label' => 'Foto Kapal Permukaan 1',
                'rules' => 'max_size[foto_armada_kapal_permukaan,3072]|mime_in[foto_armada_kapal_permukaan,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_permukaan_2' => [
                'label' => 'Foto Kapal Permukaan 2',
                'rules' => 'max_size[foto_armada_kapal_permukaan_2,3072]|mime_in[foto_armada_kapal_permukaan_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_permukaan' => [
                'label' => 'Jumlah Armada Kapal Permukaan 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_armada_kapal_permukaan_2' => [
                'label' => 'Jumlah Armada Kapal Permukaan 2',
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
                'label' => 'Alamat Lantamal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Lantamal',
                'rules' => 'max_size[foto,3072]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $foto_lantamal = $this->request->getFile('foto');
            if ($foto_lantamal->isValid()) {
                $nama_file_foto_lantamal = $foto_lantamal->getRandomName();
                $foto_lantamal->move('Gambar/Lantamal/Logo', $nama_file_foto_lantamal);
            }

            $foto_artileri = $this->request->getFile('foto_artileri');
            $nama_file_foto_artileri = '-';
            if ($foto_artileri->isValid()) {
                $nama_file_foto_artileri = $foto_artileri->getRandomName();
                $foto_artileri->move('Gambar/Lantamal/Artileri', $nama_file_foto_artileri);
            }

            $foto_artileri_2 = $this->request->getFile('foto_artileri_2');
            $nama_file_foto_artileri_2 = '-';
            if ($foto_artileri_2->isValid()) {
                $nama_file_foto_artileri_2 = $foto_artileri_2->getRandomName();
                $foto_artileri_2->move('Gambar/Lantamal/Artileri 2', $nama_file_foto_artileri_2);
            }

            $foto_armada_kapal_selam = $this->request->getFile('foto_armada_kapal_selam');
            $nama_file_foto_armada_kapal_selam = '-';
            if ($foto_armada_kapal_selam->isValid()) {
                $nama_file_foto_armada_kapal_selam = $foto_armada_kapal_selam->getRandomName();
                $foto_armada_kapal_selam->move('Gambar/Lantamal/Kapal Selam', $nama_file_foto_armada_kapal_selam);
            }

            $foto_armada_kapal_selam_2 = $this->request->getFile('foto_armada_kapal_selam_2');
            $nama_file_foto_armada_kapal_selam_2 = '-';
            if ($foto_armada_kapal_selam_2->isValid()) {
                $nama_file_foto_armada_kapal_selam_2 = $foto_armada_kapal_selam_2->getRandomName();
                $foto_armada_kapal_selam_2->move('Gambar/Lantamal/Kapal Selam 2', $nama_file_foto_armada_kapal_selam_2);
            }

            $foto_armada_kapal_permukaan = $this->request->getFile('foto_armada_kapal_permukaan');
            $nama_file_foto_armada_kapal_permukaan = '-';
            if ($foto_armada_kapal_permukaan->isValid()) {
                $nama_file_foto_armada_kapal_permukaan = $foto_armada_kapal_permukaan->getRandomName();
                $foto_armada_kapal_permukaan->move('Gambar/Lantamal/Kapal Permukaan', $nama_file_foto_armada_kapal_permukaan);
            }

            $foto_armada_kapal_permukaan_2 = $this->request->getFile('foto_armada_kapal_permukaan_2');
            $nama_file_foto_armada_kapal_permukaan_2 = '-';
            if ($foto_armada_kapal_permukaan_2->isValid()) {
                $nama_file_foto_armada_kapal_permukaan_2 = $foto_armada_kapal_permukaan_2->getRandomName();
                $foto_armada_kapal_permukaan_2->move('Gambar/Lantamal/Kapal Permukaan 2', $nama_file_foto_armada_kapal_permukaan_2);
            }

            //jika validasi berhasil
            $data = [
                'nama_lantamal'                      => $this->request->getPost('nama_lantamal'),
                'tgl_dibentuk'                       => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                         => $this->request->getPost('id_wilayah'),
                'jml_personel'                       => (int)$this->request->getPost('jml_personel'),
                'nama_artileri'                      => empty($this->request->getPost('nama_artileri')) ? '-' : $this->request->getPost('nama_artileri'),
                'nama_artileri_2'                    => empty($this->request->getPost('nama_artileri_2')) ? '-' : $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'                 => empty($this->request->getPost('deskripsi_artileri')) ? '-' : $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'               => empty($this->request->getPost('deskripsi_artileri_2')) ? '-' : $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'                      => $nama_file_foto_artileri,
                'foto_artileri_2'                    => $nama_file_foto_artileri_2,
                'jml_artileri'                       => empty($this->request->getPost('jml_artileri')) ? 0 : (int)$this->request->getPost('jml_artileri'),
                'jml_artileri_2'                     => empty($this->request->getPost('jml_artileri_2')) ? 0 : (int)$this->request->getPost('jml_artileri_2'),
                'nama_armada_kapal_selam'            => empty($this->request->getPost('nama_armada_kapal_selam')) ? '-' : $this->request->getPost('nama_armada_kapal_selam'),
                'nama_armada_kapal_selam_2'          => empty($this->request->getPost('nama_armada_kapal_selam_2')) ? '-' : $this->request->getPost('nama_armada_kapal_selam_2'),
                'deskripsi_armada_kapal_selam'       => empty($this->request->getPost('deskripsi_armada_kapal_selam')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_selam'),
                'deskripsi_armada_kapal_selam_2'     => empty($this->request->getPost('deskripsi_armada_kapal_selam_2')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_selam_2'),
                'foto_armada_kapal_selam'            => $nama_file_foto_armada_kapal_selam,
                'foto_armada_kapal_selam_2'          => $nama_file_foto_armada_kapal_selam_2,
                'jml_armada_kapal_selam'             => empty($this->request->getPost('jml_armada_kapal_selam')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_selam'),
                'jml_armada_kapal_selam_2'           => empty($this->request->getPost('jml_armada_kapal_selam_2')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_selam_2'),
                'nama_armada_kapal_permukaan'        => empty($this->request->getPost('nama_armada_kapal_permukaan')) ? '-' : $this->request->getPost('nama_armada_kapal_permukaan'),
                'nama_armada_kapal_permukaan_2'      => empty($this->request->getPost('nama_armada_kapal_permukaan_2')) ? '-' : $this->request->getPost('nama_armada_kapal_permukaan_2'),
                'deskripsi_armada_kapal_permukaan'   => empty($this->request->getPost('deskripsi_armada_kapal_permukaan')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_permukaan'),
                'deskripsi_armada_kapal_permukaan_2' => empty($this->request->getPost('deskripsi_armada_kapal_permukaan_2')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_permukaan_2'),
                'foto_armada_kapal_permukaan'        => $nama_file_foto_armada_kapal_permukaan,
                'foto_armada_kapal_permukaan_2'      => $nama_file_foto_armada_kapal_permukaan_2,
                'jml_armada_kapal_permukaan'         => empty($this->request->getPost('jml_armada_kapal_permukaan')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_permukaan'),
                'jml_armada_kapal_permukaan_2'       => empty($this->request->getPost('jml_armada_kapal_permukaan_2')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_permukaan_2'),
                'koordinat'                          => $this->request->getPost('koordinat'),
                'alamat'                             => $this->request->getPost('alamat'),
                'foto'                               => $nama_file_foto_lantamal,
            ];

            $this->ModelLantamal->InsertData($data);
            session()->setFlashdata('success', 'Data ' . $data['nama_lantamal'] . ' Berhasil Ditambahkan!');
            return redirect()->to('Lantamal');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Lantamal/Input')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Edit($id)
    {
        $data = [
            'judul' => 'Edit Lantamal dan Alutsista',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'lantamal' => $this->ModelLantamal->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function Update($id)
    {
        if ($this->validate([
            'nama_lantamal' => [
                'label' => 'Nama Lantamal',
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
            'nama_armada_kapal_selam' => [
                'label' => 'Nama Armada Kapal Selam 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_armada_kapal_selam_2' => [
                'label' => 'Nama Armada Kapal Selam 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_selam' => [
                'label' => 'Deskripsi Armada Kapal Selam 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_selam_2' => [
                'label' => 'Deskripsi Armada Kapal Selam 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_armada_kapal_selam' => [
                'label' => 'Foto Kapal Selam 1',
                'rules' => 'max_size[foto_armada_kapal_selam,3072]|mime_in[foto_armada_kapal_selam,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_selam_2' => [
                'label' => 'Foto Kapal Selam 2',
                'rules' => 'max_size[foto_armada_kapal_selam_2,3072]|mime_in[foto_armada_kapal_selam_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_selam' => [
                'label' => 'Jumlah Armada Kapal Selam 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_armada_kapal_selam_2' => [
                'label' => 'Jumlah Armada Kapal Selam 2',
                'rules' => 'permit_empty',
                'errors' => []
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
            'nama_armada_kapal_permukaan' => [
                'label' => 'Nama Armada Kapal Permukaan 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'nama_armada_kapal_permukaan_2' => [
                'label' => 'Nama Armada Kapal Permukaan 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_permukaan' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'deskripsi_armada_kapal_permukaan_2' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 2',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'foto_armada_kapal_permukaan' => [
                'label' => 'Foto Kapal Permukaan 1',
                'rules' => 'max_size[foto_armada_kapal_permukaan,3072]|mime_in[foto_armada_kapal_permukaan,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_permukaan_2' => [
                'label' => 'Foto Kapal Permukaan 2',
                'rules' => 'max_size[foto_armada_kapal_permukaan_2,3072]|mime_in[foto_armada_kapal_permukaan_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 3 MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_permukaan' => [
                'label' => 'Jumlah Armada Kapal Permukaan 1',
                'rules' => 'permit_empty',
                'errors' => []
            ],
            'jml_armada_kapal_permukaan_2' => [
                'label' => 'Jumlah Armada Kapal Permukaan 2',
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
                'label' => 'Alamat Lantamal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Lantamal',
                'rules' => 'max_size[foto,3072]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $lantamal = $this->ModelLantamal->DetailData($id);

            // Handle file uploads
            $fileFields = [
                'foto' => ['path' => 'Gambar/Lantamal/Logo/', 'current' => $lantamal['foto']],
                'foto_artileri' => ['path' => 'Gambar/Lantamal/Artileri/', 'current' => $lantamal['foto_artileri']],
                'foto_artileri_2' => ['path' => 'Gambar/Lantamal/Artileri 2/', 'current' => $lantamal['foto_artileri_2']],
                'foto_armada_kapal_selam' => ['path' => 'Gambar/Lantamal/Kapal Selam/', 'current' => $lantamal['foto_armada_kapal_selam']],
                'foto_armada_kapal_selam_2' => ['path' => 'Gambar/Lantamal/Kapal Selam 2/', 'current' => $lantamal['foto_armada_kapal_selam_2']],
                'foto_armada_kapal_permukaan' => ['path' => 'Gambar/Lantamal/Kapal Permukaan/', 'current' => $lantamal['foto_armada_kapal_permukaan']],
                'foto_armada_kapal_permukaan_2' => ['path' => 'Gambar/Lantamal/Kapal Permukaan 2/', 'current' => $lantamal['foto_armada_kapal_permukaan_2']]
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
                'nama_lantamal'                      => $this->request->getPost('nama_lantamal'),
                'tgl_dibentuk'                       => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                         => $this->request->getPost('id_wilayah'),
                'jml_personel'                       => (int)$this->request->getPost('jml_personel'),
                'nama_artileri'                      => empty($this->request->getPost('nama_artileri')) ? '-' : $this->request->getPost('nama_artileri'),
                'nama_artileri_2'                    => empty($this->request->getPost('nama_artileri_2')) ? '-' : $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'                 => empty($this->request->getPost('deskripsi_artileri')) ? '-' : $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'               => empty($this->request->getPost('deskripsi_artileri_2')) ? '-' : $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'                      => $uploadedFiles['foto_artileri'],
                'foto_artileri_2'                    => $uploadedFiles['foto_artileri_2'],
                'jml_artileri'                       => empty($this->request->getPost('jml_artileri')) ? 0 : (int)$this->request->getPost('jml_artileri'),
                'jml_artileri_2'                     => empty($this->request->getPost('jml_artileri_2')) ? 0 : (int)$this->request->getPost('jml_artileri_2'),
                'nama_armada_kapal_selam'            => empty($this->request->getPost('nama_armada_kapal_selam')) ? '-' : $this->request->getPost('nama_armada_kapal_selam'),
                'nama_armada_kapal_selam_2'          => empty($this->request->getPost('nama_armada_kapal_selam_2')) ? '-' : $this->request->getPost('nama_armada_kapal_selam_2'),
                'deskripsi_armada_kapal_selam'       => empty($this->request->getPost('deskripsi_armada_kapal_selam')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_selam'),
                'deskripsi_armada_kapal_selam_2'     => empty($this->request->getPost('deskripsi_armada_kapal_selam_2')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_selam_2'),
                'foto_armada_kapal_selam'            => $uploadedFiles['foto_armada_kapal_selam'],
                'foto_armada_kapal_selam_2'          => $uploadedFiles['foto_armada_kapal_selam_2'],
                'jml_armada_kapal_selam'             => empty($this->request->getPost('jml_armada_kapal_selam')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_selam'),
                'jml_armada_kapal_selam_2'           => empty($this->request->getPost('jml_armada_kapal_selam_2')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_selam_2'),
                'nama_armada_kapal_permukaan'        => empty($this->request->getPost('nama_armada_kapal_permukaan')) ? '-' : $this->request->getPost('nama_armada_kapal_permukaan'),
                'nama_armada_kapal_permukaan_2'      => empty($this->request->getPost('nama_armada_kapal_permukaan_2')) ? '-' : $this->request->getPost('nama_armada_kapal_permukaan_2'),
                'deskripsi_armada_kapal_permukaan'   => empty($this->request->getPost('deskripsi_armada_kapal_permukaan')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_permukaan'),
                'deskripsi_armada_kapal_permukaan_2' => empty($this->request->getPost('deskripsi_armada_kapal_permukaan_2')) ? '-' : $this->request->getPost('deskripsi_armada_kapal_permukaan_2'),
                'foto_armada_kapal_permukaan'        => $uploadedFiles['foto_armada_kapal_permukaan'],
                'foto_armada_kapal_permukaan_2'      => $uploadedFiles['foto_armada_kapal_permukaan_2'],
                'jml_armada_kapal_permukaan'         => empty($this->request->getPost('jml_armada_kapal_permukaan')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_permukaan'),
                'jml_armada_kapal_permukaan_2'       => empty($this->request->getPost('jml_armada_kapal_permukaan_2')) ? 0 : (int)$this->request->getPost('jml_armada_kapal_permukaan_2'),
                'koordinat'                          => $this->request->getPost('koordinat'),
                'alamat'                             => $this->request->getPost('alamat'),
                'foto'                               => $uploadedFiles['foto'],
            ];

            $this->ModelLantamal->UpdateData($data);
            session()->setFlashdata('success', 'Data ' . $lantamal['nama_lantamal'] . ' Berhasil Diubah!');
            return redirect()->to('Lantamal');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Lantamal/Edit/' . $id)->withInput('validation', \Config\Services::validation());
        }
    }

    public function Delete($id)
    {
        $lantamal = $this->ModelLantamal->DetailData($id);

        // Daftar file dan path yang perlu dihapus
        $filesToDelete = [
            'foto' => 'Gambar/Lantamal/Logo/' . $lantamal['foto'],
            'foto_armada_kapal_selam' => 'Gambar/Lantamal/Kapal Selam/' . $lantamal['foto_armada_kapal_selam'],
            'foto_armada_kapal_selam_2' => 'Gambar/Lantamal/Kapal Selam 2/' . $lantamal['foto_armada_kapal_selam_2'],
            'foto_artileri' => 'Gambar/Lantamal/Artileri/' . $lantamal['foto_artileri'],
            'foto_artileri_2' => 'Gambar/Lantamal/Artileri 2/' . $lantamal['foto_artileri_2'],
            'foto_armada_kapal_permukaan' => 'Gambar/Lantamal/Kapal Permukaan/' . $lantamal['foto_armada_kapal_permukaan'],
            'foto_armada_kapal_permukaan_2' => 'Gambar/Lantamal/Kapal Permukaan 2/' . $lantamal['foto_armada_kapal_permukaan_2']
        ];

        foreach ($filesToDelete as $field => $filePath) {
            try {
                // Skip jika file tidak ada atau default value '-'
                if ($lantamal[$field] == '-' || empty($lantamal[$field]) || !file_exists($filePath)) {
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
        $this->ModelLantamal->DeleteData($data);

        session()->setFlashdata('success', 'Data ' . $lantamal['nama_lantamal'] . ' Berhasil Dihapus!');
        return redirect()->to('Lantamal');
    }
}
