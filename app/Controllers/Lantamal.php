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
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelLantamal = new ModelLantamal();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Lantamal',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_index',
            'lantamal' => $this->ModelLantamal->AllData(),
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
            'judul' => 'Lantamal',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertDataLantamal()
    {
        if ($this->validate([
            'nama_lantamal' => [
                'label' => 'Nama Lantamal',
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
                'label' => 'Jumlah Personel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_armada_kapal_selam' => [
                'label' => 'Nama Armada Kapal Selam 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_armada_kapal_selam_2' => [
                'label' => 'Nama Armada Kapal Selam 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_selam' => [
                'label' => 'Deskripsi Armada Kapal Selam 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_selam_2' => [
                'label' => 'Deskripsi Armada Kapal Selam 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_armada_kapal_selam' => [
                'label' => 'Foto Kapal Selam 1',
                'rules' => 'max_size[foto_armada_kapal_selam,1024]|mime_in[foto_armada_kapal_selam,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_selam_2' => [
                'label' => 'Foto Kapal Selam 2',
                'rules' => 'max_size[foto_armada_kapal_selam_2,1024]|mime_in[foto_armada_kapal_selam_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_selam' => [
                'label' => 'Jumlah Armada Kapal Selam 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_selam_2' => [
                'label' => 'Jumlah Armada Kapal Selam 2',
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
            'nama_armada_kapal_permukaan' => [
                'label' => 'Nama Armada Kapal Permukaan 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_armada_kapal_permukaan_2' => [
                'label' => 'Nama Armada Kapal Permukaan 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_permukaan' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_permukaan_2' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_armada_kapal_permukaan' => [
                'label' => 'Foto Kapal Permukaan 1',
                'rules' => 'max_size[foto_armada_kapal_permukaan,1024]|mime_in[foto_armada_kapal_permukaan,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_permukaan_2' => [
                'label' => 'Foto Kapal Permukaan 2',
                'rules' => 'max_size[foto_armada_kapal_permukaan_2,1024]|mime_in[foto_armada_kapal_permukaan_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_permukaan' => [
                'label' => 'Jumlah Armada Kapal Permukaan 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_permukaan_2' => [
                'label' => 'Jumlah Armada Kapal Permukaan 2',
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
                'label' => 'Alamat Lantamal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Lantamal',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            // Ambil semua file foto
            $foto_lantamal = $this->request->getFile('foto');
            $foto_armada_kapal_selam = $this->request->getFile('foto_armada_kapal_selam');
            $foto_armada_kapal_selam_2 = $this->request->getFile('foto_armada_kapal_selam_2');
            $foto_artileri = $this->request->getFile('foto_artileri');
            $foto_artileri_2 = $this->request->getFile('foto_artileri_2');
            $foto_armada_kapal_permukaan = $this->request->getFile('foto_armada_kapal_permukaan');
            $foto_armada_kapal_permukaan_2 = $this->request->getFile('foto_armada_kapal_permukaan_2');

            // Generate nama random untuk setiap file
            $nama_file_foto = $foto_lantamal->getRandomName();
            $nama_file_foto_armada_kapal_selam = $foto_armada_kapal_selam->getRandomName();
            $nama_file_foto_armada_kapal_selam_2 = $foto_armada_kapal_selam_2->getRandomName();
            $nama_file_foto_artileri = $foto_artileri->getRandomName();
            $nama_file_foto_artileri_2 = $foto_artileri_2->getRandomName();
            $nama_file_foto_armada_kapal_permukaan = $foto_armada_kapal_permukaan->getRandomName();
            $nama_file_foto_armada_kapal_permukaan_2 = $foto_armada_kapal_permukaan_2->getRandomName();

            //jika validasi berhasil
            $data = [
                'nama_lantamal'                     => $this->request->getPost('nama_lantamal'),
                'id_kesatuan'                       => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                      => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                        => $this->request->getPost('id_wilayah'),
                'jml_personel'                      => $this->request->getPost('jml_personel'),
                'nama_armada_kapal_selam'           => $this->request->getPost('nama_armada_kapal_selam'),
                'nama_armada_kapal_selam_2'         => $this->request->getPost('nama_armada_kapal_selam_2'),
                'deskripsi_armada_kapal_selam'      => $this->request->getPost('deskripsi_armada_kapal_selam'),
                'deskripsi_armada_kapal_selam_2'    => $this->request->getPost('deskripsi_armada_kapal_selam_2'),
                'foto_armada_kapal_selam'           => $nama_file_foto_armada_kapal_selam,
                'foto_armada_kapal_selam_2'         => $nama_file_foto_armada_kapal_selam_2,
                'jml_armada_kapal_selam'            => $this->request->getPost('jml_armada_kapal_selam'),
                'jml_armada_kapal_selam_2'          => $this->request->getPost('jml_armada_kapal_selam_2'),
                'nama_artileri'                     => $this->request->getPost('nama_artileri'),
                'nama_artileri_2'                   => $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'                => $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'              => $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'                     => $nama_file_foto_artileri,
                'foto_artileri_2'                   => $nama_file_foto_artileri_2,
                'jml_artileri'                      => $this->request->getPost('jml_artileri'),
                'jml_artileri_2'                    => $this->request->getPost('jml_artileri_2'),
                'nama_armada_kapal_permukaan'       => $this->request->getPost('nama_armada_kapal_permukaan'),
                'nama_armada_kapal_permukaan_2'     => $this->request->getPost('nama_armada_kapal_permukaan_2'),
                'deskripsi_armada_kapal_permukaan'  => $this->request->getPost('deskripsi_armada_kapal_permukaan'),
                'deskripsi_armada_kapal_permukaan_2' => $this->request->getPost('deskripsi_armada_kapal_permukaan_2'),
                'foto_armada_kapal_permukaan'       => $nama_file_foto_armada_kapal_permukaan,
                'foto_armada_kapal_permukaan_2'     => $nama_file_foto_armada_kapal_permukaan_2,
                'jml_armada_kapal_permukaan'        => $this->request->getPost('jml_armada_kapal_permukaan'),
                'jml_armada_kapal_permukaan_2'      => $this->request->getPost('jml_armada_kapal_permukaan_2'),
                'koordinat'                         => $this->request->getPost('koordinat'),
                'alamat'                            => $this->request->getPost('alamat'),
                'foto'                              => $nama_file_foto,
            ];

            // Pindahkan file ke folder tujuan
            $foto_lantamal->move('Gambar/Lantamal/Logo', $nama_file_foto);
            $foto_armada_kapal_selam->move('Gambar/Lantamal/Kapal Selam', $nama_file_foto_armada_kapal_selam);
            $foto_armada_kapal_selam_2->move('Gambar/Lantamal/Kapal Selam 2', $nama_file_foto_armada_kapal_selam_2);
            $foto_artileri->move('Gambar/Lantamal/Artileri', $nama_file_foto_artileri);
            $foto_artileri_2->move('Gambar/Lantamal/Artileri 2', $nama_file_foto_artileri_2);
            $foto_armada_kapal_permukaan->move('Gambar/Lantamal/Kapal Permukaan', $nama_file_foto_armada_kapal_permukaan);
            $foto_armada_kapal_permukaan_2->move('Gambar/Lantamal/Kapal Permukaan 2', $nama_file_foto_armada_kapal_permukaan_2);

            $this->ModelLantamal->InsertDataLantamal($data);
            session()->setFlashdata('insert', 'Data ' . $data['nama_lantamal'] . ' Berhasil Ditambahkan!');
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
            'judul' => 'Edit Lantamal',
            'menu'  => 'lantamal',
            'page' => 'lantamal/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'lantamal' => $this->ModelLantamal->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id)
    {
        if ($this->validate([
            'nama_lantamal' => [
                'label' => 'Nama Lantamal',
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
                'label' => 'Jumlah Personel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_armada_kapal_selam' => [
                'label' => 'Nama Armada Kapal Selam 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_armada_kapal_selam_2' => [
                'label' => 'Nama Armada Kapal Selam 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_selam' => [
                'label' => 'Deskripsi Armada Kapal Selam 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_selam_2' => [
                'label' => 'Deskripsi Armada Kapal Selam 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_armada_kapal_selam' => [
                'label' => 'Foto Kapal Selam 1',
                'rules' => 'max_size[foto_armada_kapal_selam,1024]|mime_in[foto_armada_kapal_selam,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_selam_2' => [
                'label' => 'Foto Kapal Selam 2',
                'rules' => 'max_size[foto_armada_kapal_selam_2,1024]|mime_in[foto_armada_kapal_selam_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_selam_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_selam' => [
                'label' => 'Jumlah Armada Kapal Selam 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_selam_2' => [
                'label' => 'Jumlah Armada Kapal Selam 2',
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
            'nama_armada_kapal_permukaan' => [
                'label' => 'Nama Armada Kapal Permukaan 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_armada_kapal_permukaan_2' => [
                'label' => 'Nama Armada Kapal Permukaan 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_permukaan' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_armada_kapal_permukaan_2' => [
                'label' => 'Deskripsi Armada Kapal Permukaan 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_armada_kapal_permukaan' => [
                'label' => 'Foto Kapal Permukaan 1',
                'rules' => 'max_size[foto_armada_kapal_permukaan,1024]|mime_in[foto_armada_kapal_permukaan,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_armada_kapal_permukaan_2' => [
                'label' => 'Foto Kapal Permukaan 2',
                'rules' => 'max_size[foto_armada_kapal_permukaan_2,1024]|mime_in[foto_armada_kapal_permukaan_2,image/jpg,image/jpeg,image/png]|ext_in[foto_armada_kapal_permukaan_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_armada_kapal_permukaan' => [
                'label' => 'Jumlah Armada Kapal Permukaan 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_permukaan_2' => [
                'label' => 'Jumlah Armada Kapal Permukaan 2',
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
                'label' => 'Alamat Lantamal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Lantamal',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $lantamal = $this->ModelLantamal->DetailData($id);

            $foto_lantamal = $this->request->getFile('foto');
            $foto_armada_kapal_selam = $this->request->getFile('foto_armada_kapal_selam');
            $foto_armada_kapal_selam_2 = $this->request->getFile('foto_armada_kapal_selam_2');
            $foto_artileri = $this->request->getFile('foto_artileri');
            $foto_artileri_2 = $this->request->getFile('foto_artileri_2');
            $foto_armada_kapal_permukaan = $this->request->getFile('foto_armada_kapal_permukaan');
            $foto_armada_kapal_permukaan_2 = $this->request->getFile('foto_armada_kapal_permukaan_2');

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
            $nama_file_foto_lantamal = handleFileUpload(
                $foto_lantamal,
                $lantamal['foto'],
                'Gambar/Lantamal/Logo/'
            );

            $nama_file_foto_armada_kapal_selam = handleFileUpload(
                $foto_armada_kapal_selam,
                $lantamal['foto_armada_kapal_selam'],
                'Gambar/Lantamal/Kapal Selam/'
            );

            $nama_file_foto_armada_kapal_selam_2 = handleFileUpload(
                $foto_armada_kapal_selam_2,
                $lantamal['foto_armada_kapal_selam_2'],
                'Gambar/Lantamal/Kapal Selam 2/'
            );

            $nama_file_foto_artileri = handleFileUpload(
                $foto_artileri,
                $lantamal['foto_artileri'],
                'Gambar/Lantamal/Artileri/'
            );

            $nama_file_foto_artileri_2 = handleFileUpload(
                $foto_artileri_2,
                $lantamal['foto_artileri_2'],
                'Gambar/Lantamal/Artileri 2/'
            );

            $nama_file_foto_armada_kapal_permukaan = handleFileUpload(
                $foto_armada_kapal_permukaan,
                $lantamal['foto_armada_kapal_permukaan'],
                'Gambar/Lantamal/Kapal Permukaan/'
            );

            $nama_file_foto_armada_kapal_permukaan_2 = handleFileUpload(
                $foto_armada_kapal_permukaan_2,
                $lantamal['foto_armada_kapal_permukaan_2'],
                'Gambar/Lantamal/Kapal Permukaan 2/'
            );

            //jika validasi berhasil
            $data = [
                'id'                       => $id,
                'nama_lantamal'                     => $this->request->getPost('nama_lantamal'),
                'id_kesatuan'                       => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                      => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                        => $this->request->getPost('id_wilayah'),
                'jml_personel'                      => $this->request->getPost('jml_personel'),
                'nama_armada_kapal_selam'           => $this->request->getPost('nama_armada_kapal_selam'),
                'nama_armada_kapal_selam_2'         => $this->request->getPost('nama_armada_kapal_selam_2'),
                'deskripsi_armada_kapal_selam'      => $this->request->getPost('deskripsi_armada_kapal_selam'),
                'deskripsi_armada_kapal_selam_2'    => $this->request->getPost('deskripsi_armada_kapal_selam_2'),
                'foto_armada_kapal_selam'           => $nama_file_foto_armada_kapal_selam,
                'foto_armada_kapal_selam_2'         => $nama_file_foto_armada_kapal_selam_2,
                'jml_armada_kapal_selam'            => $this->request->getPost('jml_armada_kapal_selam'),
                'jml_armada_kapal_selam_2'          => $this->request->getPost('jml_armada_kapal_selam_2'),
                'nama_artileri'                     => $this->request->getPost('nama_artileri'),
                'nama_artileri_2'                   => $this->request->getPost('nama_artileri_2'),
                'deskripsi_artileri'                => $this->request->getPost('deskripsi_artileri'),
                'deskripsi_artileri_2'              => $this->request->getPost('deskripsi_artileri_2'),
                'foto_artileri'                     => $nama_file_foto_artileri,
                'foto_artileri_2'                   => $nama_file_foto_artileri_2,
                'jml_artileri'                      => $this->request->getPost('jml_artileri'),
                'jml_artileri_2'                    => $this->request->getPost('jml_artileri_2'),
                'nama_armada_kapal_permukaan'       => $this->request->getPost('nama_armada_kapal_permukaan'),
                'nama_armada_kapal_permukaan_2'     => $this->request->getPost('nama_armada_kapal_permukaan_2'),
                'deskripsi_armada_kapal_permukaan'  => $this->request->getPost('deskripsi_armada_kapal_permukaan'),
                'deskripsi_armada_kapal_permukaan_2' => $this->request->getPost('deskripsi_armada_kapal_permukaan_2'),
                'foto_armada_kapal_permukaan'       => $nama_file_foto_armada_kapal_permukaan,
                'foto_armada_kapal_permukaan_2'     => $nama_file_foto_armada_kapal_permukaan_2,
                'jml_armada_kapal_permukaan'        => $this->request->getPost('jml_armada_kapal_permukaan'),
                'jml_armada_kapal_permukaan_2'      => $this->request->getPost('jml_armada_kapal_permukaan_2'),
                'koordinat'                         => $this->request->getPost('koordinat'),
                'alamat'                            => $this->request->getPost('alamat'),
                'foto'                              => $nama_file_foto_lantamal,
            ];

            $this->ModelLantamal->UpdateData($data);
            session()->setFlashdata('insert', 'Data ' . $lantamal['nama_lantamal'] . ' Berhasil Diubah!');
            return redirect()->to('Lantamal');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Lantamal/Edit/' . $id)->withInput('validation', \Config\Services::validation());
        }
    }

    //delete
    public function Delete($id)
    {
        $lantamal = $this->ModelLantamal->DetailData($id);

        // Hapus foto di folder 
        if ($lantamal['foto'] <> '') {
            unlink('Gambar/Lantamal/Logo/' . $lantamal['foto']);
        }

        if ($lantamal['foto_armada_kapal_selam'] <> '') {
            unlink('Gambar/Lantamal/Kapal Selam/' . $lantamal['foto_armada_kapal_selam']);
        }

        if ($lantamal['foto_armada_kapal_selam_2'] <> '') {
            unlink('Gambar/Lantamal/Kapal Selam 2/' . $lantamal['foto_armada_kapal_selam_2']);
        }

        if ($lantamal['foto_artileri'] <> '') {
            unlink('Gambar/Lantamal/Artileri/' . $lantamal['foto_artileri']);
        }

        if ($lantamal['foto_artileri_2'] <> '') {
            unlink('Gambar/Lantamal/Artileri 2/' . $lantamal['foto_artileri_2']);
        }

        if ($lantamal['foto_armada_kapal_permukaan'] <> '') {
            unlink('Gambar/Lantamal/Kapal Permukaan/' . $lantamal['foto_armada_kapal_permukaan']);
        }

        if ($lantamal['foto_armada_kapal_permukaan_2'] <> '') {
            unlink('Gambar/Lantamal/Kapal Permukaan 2/' . $lantamal['foto_armada_kapal_permukaan_2']);
        }
        $data = [
            'id' => $id,
        ];

        $this->ModelLantamal->DeleteData($data);
        session()->setFlashdata('insert', 'Data ' . $lantamal['nama_lantamal'] . ' Berhasil Dihapus!');
        return redirect()->to('Lantamal');
    }
}
