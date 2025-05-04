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
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelKoopsud = new ModelKoopsud();
        $this->ModelKesatuan = new ModelKesatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Koopsud',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_index',
            'koopsud' => $this->ModelKoopsud->AllData(),
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
            'judul' => 'Koopsud',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertDataKoopsud()
    {
        if ($this->validate([
            'nama_koopsud' => [
                'label' => 'Nama Koopsud',
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
            'nama_amunisi' => [
                'label' => 'Nama Amunisi 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_amunisi_2' => [
                'label' => 'Nama Amunisi 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_amunisi' => [
                'label' => 'Deskripsi Amunisi 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_amunisi_2' => [
                'label' => 'Deskripsi Amunisi 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_amunisi' => [
                'label' => 'Foto Amunisi 1',
                'rules' => 'max_size[foto_amunisi,1024]|mime_in[foto_amunisi,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_amunisi_2' => [
                'label' => 'Foto Amunisi 2',
                'rules' => 'max_size[foto_amunisi_2,1024]|mime_in[foto_amunisi_2,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_amunisi' => [
                'label' => 'Jumlah Amunisi 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_amunisi_2' => [
                'label' => 'Jumlah Amunisi 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pertahanan_udara' => [
                'label' => 'Nama Pertahanan Udara 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pertahanan_udara_2' => [
                'label' => 'Nama Pertahanan Udara 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pertahanan_udara' => [
                'label' => 'Deskripsi Pertahanan Udara 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pertahanan_udara_2' => [
                'label' => 'Deskripsi Pertahanan Udara 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_pertahanan_udara' => [
                'label' => 'Foto Pertahanan Udara 1',
                'rules' => 'max_size[foto_pertahanan_udara,1024]|mime_in[foto_pertahanan_udara,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pertahanan_udara_2' => [
                'label' => 'Foto Pertahanan Udara 2',
                'rules' => 'max_size[foto_pertahanan_udara_2,1024]|mime_in[foto_pertahanan_udara_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pertahanan_udara' => [
                'label' => 'Jumlah Pertahanan Udara 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_pertahanan_udara_2' => [
                'label' => 'Jumlah Pertahanan Udara 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pesawat_terbang' => [
                'label' => 'Nama Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pesawat_terbang_2' => [
                'label' => 'Nama Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pesawat_terbang' => [
                'label' => 'Deskripsi Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pesawat_terbang_2' => [
                'label' => 'Deskripsi Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_pesawat_terbang' => [
                'label' => 'Foto Pesawat Terbang 1',
                'rules' => 'max_size[foto_pesawat_terbang,1024]|mime_in[foto_pesawat_terbang,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pesawat_terbang_2' => [
                'label' => 'Foto Pesawat Terbang 2',
                'rules' => 'max_size[foto_pesawat_terbang_2,1024]|mime_in[foto_pesawat_terbang_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pesawat_terbang' => [
                'label' => 'Jumlah Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_pesawat_terbang_2' => [
                'label' => 'Jumlah Pesawat Terbang 2',
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
                'label' => 'Alamat Koopsud',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Koopsud',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            // Ambil semua file foto
            $foto_koopsud = $this->request->getFile('foto');
            $foto_pesawat_terbang = $this->request->getFile('foto_pesawat_terbang');
            $foto_pesawat_terbang_2 = $this->request->getFile('foto_pesawat_terbang_2');
            $foto_amunisi = $this->request->getFile('foto_amunisi');
            $foto_amunisi_2 = $this->request->getFile('foto_amunisi_2');
            $foto_pertahanan_udara = $this->request->getFile('foto_pertahanan_udara');
            $foto_pertahanan_udara_2 = $this->request->getFile('foto_pertahanan_udara_2');

            // Generate nama random untuk setiap file
            $nama_file_foto = $foto_koopsud->getRandomName();
            $nama_file_foto_pesawat_terbang = $foto_pesawat_terbang->getRandomName();
            $nama_file_foto_pesawat_terbang_2 = $foto_pesawat_terbang_2->getRandomName();
            $nama_file_foto_amunisi = $foto_amunisi->getRandomName();
            $nama_file_foto_amunisi_2 = $foto_amunisi_2->getRandomName();
            $nama_file_foto_pertahanan_udara = $foto_pertahanan_udara->getRandomName();
            $nama_file_foto_pertahanan_udara_2 = $foto_pertahanan_udara_2->getRandomName();
            //jika validasi berhasil
            $data = [
                'nama_koopsud'                     => $this->request->getPost('nama_koopsud'),
                'id_kesatuan'                       => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                      => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                        => $this->request->getPost('id_wilayah'),
                'jml_personel'                      => $this->request->getPost('jml_personel'),
                'nama_pesawat_terbang'           => $this->request->getPost('nama_pesawat_terbang'),
                'nama_pesawat_terbang_2'         => $this->request->getPost('nama_pesawat_terbang_2'),
                'deskripsi_pesawat_terbang'      => $this->request->getPost('deskripsi_pesawat_terbang'),
                'deskripsi_pesawat_terbang_2'    => $this->request->getPost('deskripsi_pesawat_terbang_2'),
                'foto_pesawat_terbang'           => $nama_file_foto_pesawat_terbang,
                'foto_pesawat_terbang_2'         => $nama_file_foto_pesawat_terbang_2,
                'jml_pesawat_terbang'            => $this->request->getPost('jml_pesawat_terbang'),
                'jml_pesawat_terbang_2'          => $this->request->getPost('jml_pesawat_terbang_2'),
                'nama_amunisi'                     => $this->request->getPost('nama_amunisi'),
                'nama_amunisi_2'                   => $this->request->getPost('nama_amunisi_2'),
                'deskripsi_amunisi'                => $this->request->getPost('deskripsi_amunisi'),
                'deskripsi_amunisi_2'              => $this->request->getPost('deskripsi_amunisi_2'),
                'foto_amunisi'                     => $nama_file_foto_amunisi,
                'foto_amunisi_2'                   => $nama_file_foto_amunisi_2,
                'jml_amunisi'                      => $this->request->getPost('jml_amunisi'),
                'jml_amunisi_2'                    => $this->request->getPost('jml_amunisi_2'),
                'nama_pertahanan_udara'       => $this->request->getPost('nama_pertahanan_udara'),
                'nama_pertahanan_udara_2'     => $this->request->getPost('nama_pertahanan_udara_2'),
                'deskripsi_pertahanan_udara'  => $this->request->getPost('deskripsi_pertahanan_udara'),
                'deskripsi_pertahanan_udara_2' => $this->request->getPost('deskripsi_pertahanan_udara_2'),
                'foto_pertahanan_udara'       => $nama_file_foto_pertahanan_udara,
                'foto_pertahanan_udara_2'     => $nama_file_foto_pertahanan_udara_2,
                'jml_pertahanan_udara'        => $this->request->getPost('jml_pertahanan_udara'),
                'jml_pertahanan_udara_2'      => $this->request->getPost('jml_pertahanan_udara_2'),
                'koordinat'                         => $this->request->getPost('koordinat'),
                'alamat'                            => $this->request->getPost('alamat'),
                'foto'                              => $nama_file_foto,
            ];

            // Pindahkan file ke folder tujuan
            $foto_koopsud->move('Gambar/Koopsud/Logo', $nama_file_foto);
            $foto_pesawat_terbang->move('Gambar/Koopsud/Pesawat Terbang', $nama_file_foto_pesawat_terbang);
            $foto_pesawat_terbang_2->move('Gambar/Koopsud/Pesawat Terbang 2', $nama_file_foto_pesawat_terbang_2);
            $foto_amunisi->move('Gambar/Koopsud/Amunisi', $nama_file_foto_amunisi);
            $foto_amunisi_2->move('Gambar/Koopsud/Amunisi 2', $nama_file_foto_amunisi_2);
            $foto_pertahanan_udara->move('Gambar/Koopsud/Pertahanan Udara', $nama_file_foto_pertahanan_udara);
            $foto_pertahanan_udara_2->move('Gambar/Koopsud/Pertahanan Udara 2', $nama_file_foto_pertahanan_udara_2);

            $this->ModelKoopsud->InsertDataKoopsud($data);
            session()->setFlashdata('insert', 'Data ' . $data['nama_koopsud'] . ' Berhasil Ditambahkan!');
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
            'judul' => 'Edit Koopsud',
            'menu'  => 'koopsud',
            'page' => 'koopsud/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kesatuan' => $this->ModelKesatuan->AllData(),
            'koopsud' => $this->ModelKoopsud->DetailData($id),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id)
    {
        if ($this->validate([
            'nama_koopsud' => [
                'label' => 'Nama Koopsud',
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
            'nama_amunisi' => [
                'label' => 'Nama Amunisi 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_amunisi_2' => [
                'label' => 'Nama Amunisi 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_amunisi' => [
                'label' => 'Deskripsi Amunisi 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_amunisi_2' => [
                'label' => 'Deskripsi Amunisi 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_amunisi' => [
                'label' => 'Foto Amunisi 1',
                'rules' => 'max_size[foto_amunisi,1024]|mime_in[foto_amunisi,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_amunisi_2' => [
                'label' => 'Foto Amunisi 2',
                'rules' => 'max_size[foto_amunisi_2,1024]|mime_in[foto_amunisi_2,image/jpg,image/jpeg,image/png]|ext_in[foto_amunisi_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_amunisi' => [
                'label' => 'Jumlah Amunisi 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_amunisi_2' => [
                'label' => 'Jumlah Amunisi 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pertahanan_udara' => [
                'label' => 'Nama Pertahanan Udara 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pertahanan_udara_2' => [
                'label' => 'Nama Pertahanan Udara 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pertahanan_udara' => [
                'label' => 'Deskripsi Pertahanan Udara 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pertahanan_udara_2' => [
                'label' => 'Deskripsi Pertahanan Udara 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_pertahanan_udara' => [
                'label' => 'Foto Pertahanan Udara 1',
                'rules' => 'max_size[foto_pertahanan_udara,1024]|mime_in[foto_pertahanan_udara,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pertahanan_udara_2' => [
                'label' => 'Foto Pertahanan Udara 2',
                'rules' => 'max_size[foto_pertahanan_udara_2,1024]|mime_in[foto_pertahanan_udara_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pertahanan_udara_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pertahanan_udara' => [
                'label' => 'Jumlah Pertahanan Udara 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_pertahanan_udara_2' => [
                'label' => 'Jumlah Pertahanan Udara 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pesawat_terbang' => [
                'label' => 'Nama Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_pesawat_terbang_2' => [
                'label' => 'Nama Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pesawat_terbang' => [
                'label' => 'Deskripsi Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_pesawat_terbang_2' => [
                'label' => 'Deskripsi Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_pesawat_terbang' => [
                'label' => 'Foto Pesawat Terbang 1',
                'rules' => 'max_size[foto_pesawat_terbang,1024]|mime_in[foto_pesawat_terbang,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'foto_pesawat_terbang_2' => [
                'label' => 'Foto Pesawat Terbang 2',
                'rules' => 'max_size[foto_pesawat_terbang_2,1024]|mime_in[foto_pesawat_terbang_2,image/jpg,image/jpeg,image/png]|ext_in[foto_pesawat_terbang_2,jpg,jpeg,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus JPG, JPEG, atau PNG',
                    'ext_in' => 'Format {field} harus berekstensi .jpg, .jpeg, atau .png'
                ]
            ],
            'jml_pesawat_terbang' => [
                'label' => 'Jumlah Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_pesawat_terbang_2' => [
                'label' => 'Jumlah Pesawat Terbang 2',
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
                'label' => 'Alamat Koopsud',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Koopsud',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png]|ext_in[foto,png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1MB',
                    'mime_in' => 'Format {field} harus PNG',
                    'ext_in' => 'Format {field} harus berekstensi .png'
                ]
            ],
        ])) {
            $koopsud = $this->ModelKoopsud->DetailData($id);

            $foto_koopsud = $this->request->getFile('foto');
            $foto_amunisi = $this->request->getFile('foto_amunisi');
            $foto_amunisi_2 = $this->request->getFile('foto_amunisi_2');
            $foto_pertahanan_udara = $this->request->getFile('foto_pertahanan_udara');
            $foto_pertahanan_udara_2 = $this->request->getFile('foto_pertahanan_udara_2');
            $foto_pesawat_terbang = $this->request->getFile('foto_pesawat_terbang');
            $foto_pesawat_terbang_2 = $this->request->getFile('foto_pesawat_terbang_2');

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
            $nama_file_foto_koopsud = handleFileUpload(
                $foto_koopsud,
                $koopsud['foto'],
                'Gambar/Koopsud/Logo/'
            );

            $nama_file_foto_amunisi = handleFileUpload(
                $foto_amunisi,
                $koopsud['foto_amunisi'],
                'Gambar/Koopsud/Amunisi/'
            );

            $nama_file_foto_amunisi_2 = handleFileUpload(
                $foto_amunisi_2,
                $koopsud['foto_amunisi_2'],
                'Gambar/Koopsud/Amunisi 2/'
            );

            $nama_file_foto_pertahanan_udara = handleFileUpload(
                $foto_pertahanan_udara,
                $koopsud['foto_pertahanan_udara'],
                'Gambar/Koopsud/Pertahanan Udara/'
            );

            $nama_file_foto_pertahanan_udara_2 = handleFileUpload(
                $foto_pertahanan_udara_2,
                $koopsud['foto_pertahanan_udara_2'],
                'Gambar/Koopsud/Pertahanan Udara 2/'
            );

            $nama_file_foto_pesawat_terbang = handleFileUpload(
                $foto_pesawat_terbang,
                $koopsud['foto_pesawat_terbang'],
                'Gambar/Koopsud/Pesawat Terbang/'
            );

            $nama_file_foto_pesawat_terbang_2 = handleFileUpload(
                $foto_pesawat_terbang_2,
                $koopsud['foto_pesawat_terbang_2'],
                'Gambar/Koopsud/Pesawat Terbang 2/'
            );

            //jika validasi berhasil
            $data = [
                'id'                       => $id,
                'nama_koopsud'                     => $this->request->getPost('nama_koopsud'),
                'id_kesatuan'                       => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                      => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                        => $this->request->getPost('id_wilayah'),
                'jml_personel'                      => $this->request->getPost('jml_personel'),
                'nama_amunisi'           => $this->request->getPost('nama_amunisi'),
                'nama_amunisi_2'         => $this->request->getPost('nama_amunisi_2'),
                'deskripsi_amunisi'      => $this->request->getPost('deskripsi_amunisi'),
                'deskripsi_amunisi_2'    => $this->request->getPost('deskripsi_amunisi_2'),
                'foto_amunisi'           => $nama_file_foto_amunisi,
                'foto_amunisi_2'         => $nama_file_foto_amunisi_2,
                'jml_amunisi'            => $this->request->getPost('jml_amunisi'),
                'jml_amunisi_2'          => $this->request->getPost('jml_amunisi_2'),
                'nama_pertahanan_udara'                     => $this->request->getPost('nama_pertahanan_udara'),
                'nama_pertahanan_udara_2'                   => $this->request->getPost('nama_pertahanan_udara_2'),
                'deskripsi_pertahanan_udara'                => $this->request->getPost('deskripsi_pertahanan_udara'),
                'deskripsi_pertahanan_udara_2'              => $this->request->getPost('deskripsi_pertahanan_udara_2'),
                'foto_pertahanan_udara'                     => $nama_file_foto_pertahanan_udara,
                'foto_pertahanan_udara_2'                   => $nama_file_foto_pertahanan_udara_2,
                'jml_pertahanan_udara'                      => $this->request->getPost('jml_pertahanan_udara'),
                'jml_pertahanan_udara_2'                    => $this->request->getPost('jml_pertahanan_udara_2'),
                'nama_pesawat_terbang'       => $this->request->getPost('nama_pesawat_terbang'),
                'nama_pesawat_terbang_2'     => $this->request->getPost('nama_pesawat_terbang_2'),
                'deskripsi_pesawat_terbang'  => $this->request->getPost('deskripsi_pesawat_terbang'),
                'deskripsi_pesawat_terbang_2' => $this->request->getPost('deskripsi_pesawat_terbang_2'),
                'foto_pesawat_terbang'       => $nama_file_foto_pesawat_terbang,
                'foto_pesawat_terbang_2'     => $nama_file_foto_pesawat_terbang_2,
                'jml_pesawat_terbang'        => $this->request->getPost('jml_pesawat_terbang'),
                'jml_pesawat_terbang_2'      => $this->request->getPost('jml_pesawat_terbang_2'),
                'koordinat'                         => $this->request->getPost('koordinat'),
                'alamat'                            => $this->request->getPost('alamat'),
                'foto'                              => $nama_file_foto_koopsud,
            ];

            $this->ModelKoopsud->UpdateData($data);
            session()->setFlashdata('insert', 'Data ' . $koopsud['nama_koopsud'] . ' Berhasil Diubah!');
            return redirect()->to('Koopsud');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Koopsud/Edit/' . $id)->withInput('validation', \Config\Services::validation());
        }
    }

    //delete
    public function Delete($id)
    {
        $koopsud = $this->ModelKoopsud->DetailData($id);

        // Hapus foto di folder 
        if ($koopsud['foto'] <> '') {
            unlink('Gambar/Koopsud/Logo/' . $koopsud['foto']);
        }

        if ($koopsud['foto_amunisi'] <> '') {
            unlink('Gambar/Koopsud/Amunisi/' . $koopsud['foto_amunisi']);
        }

        if ($koopsud['foto_amunisi_2'] <> '') {
            unlink('Gambar/Koopsud/Amunisi 2/' . $koopsud['foto_amunisi_2']);
        }

        if ($koopsud['foto_pertahanan_udara'] <> '') {
            unlink('Gambar/Koopsud/Pertahanan Udara/' . $koopsud['foto_pertahanan_udara']);
        }

        if ($koopsud['foto_pertahanan_udara_2'] <> '') {
            unlink('Gambar/Koopsud/Pertahanan Udara 2/' . $koopsud['foto_pertahanan_udara_2']);
        }

        if ($koopsud['foto_pesawat_terbang'] <> '') {
            unlink('Gambar/Koopsud/Pesawat Terbang/' . $koopsud['foto_pesawat_terbang']);
        }

        if ($koopsud['foto_pesawat_terbang_2'] <> '') {
            unlink('Gambar/Koopsud/Pesawat Terbang 2/' . $koopsud['foto_pesawat_terbang_2']);
        }

        $data = [
            'id' => $id,
        ];

        $this->ModelKoopsud->DeleteData($data);
        session()->setFlashdata('insert', 'Data ' . $koopsud['nama_koopsud'] . ' Berhasil Dihapus!');
        return redirect()->to('Koopsud');
    }
}
