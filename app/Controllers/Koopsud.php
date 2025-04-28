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
                'label' => 'Jumlah Personil',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'foto_pesawat_terbang_2' => [
                'label' => 'Foto Pesawat Terbang 2',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'foto_amunisi_2' => [
                'label' => 'Foto Amunisi 2',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'foto_pertahanan_udara_2' => [
                'label' => 'Foto Pertahanan Udara 2',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
            $foto_pesawat_terbang->move('Gambar/Koopsud/Kapal Selam', $nama_file_foto_pesawat_terbang);
            $foto_pesawat_terbang_2->move('Gambar/Koopsud/Kapal Selam 2', $nama_file_foto_pesawat_terbang_2);
            $foto_amunisi->move('Gambar/Koopsud/Amunisi', $nama_file_foto_amunisi);
            $foto_amunisi_2->move('Gambar/Koopsud/Amunisi 2', $nama_file_foto_amunisi_2);
            $foto_pertahanan_udara->move('Gambar/Koopsud/Pertahanan Udara', $nama_file_foto_pertahanan_udara);
            $foto_pertahanan_udara_2->move('Gambar/Koopsud/Pertahanan Udara 2', $nama_file_foto_pertahanan_udara_2);

            $this->ModelKoopsud->InsertDataKoopsud($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Koopsud');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Koopsud/Input')->withInput('validation', \Config\Services::validation());
        }
    }

    public function Edit($id_batalyon)
    {
        $data = [
            'judul' => 'Edit Batalyon',
            'menu'  => 'batalyon',
            'page' => 'batalyon/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'provinsi' => $this->ModelBatalyon->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'komando' => $this->ModelKomando->AllData(),
            'batalyon' => $this->ModelBatalyon->DetailData($id_batalyon),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_batalyon)
    {
        if ($this->validate([
            'nama_batalyon' => [
                'label' => 'Nama Batalyon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'thn_dibentuk' => [
                'label' => 'Tahun dibentuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'cabang' => [
                'label' => 'Cabang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_komando' => [
                'label' => 'Komando',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'coordinate' => [
                'label' => 'Coordinate',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_wilayah' => [
                'label' => 'Wilayah Administrasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto Batalyon',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
        ])) {
            $batalyon = $this->ModelBatalyon->DetailData($id_batalyon);
            $foto = $this->request->getFile('foto');


            if ($foto->getError() == 4) {
                $nama_file_foto = $batalyon['foto'];
            } else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('foto', $nama_file_foto);
            }
            //jika validasi berhasil
            $data = [
                'id_batalyon' => $id_batalyon,
                'nama_batalyon' => $this->request->getPost('nama_batalyon'),
                'thn_dibentuk' => $this->request->getPost('thn_dibentuk'),
                'cabang' => $this->request->getPost('cabang'),
                'coordinate' => $this->request->getPost('coordinate'),
                'id_komando' => $this->request->getPost('id_komando'),
                'id_provinsi' => $this->request->getPost('id_provinsi'),
                'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                'alamat' => $this->request->getPost('alamat'),
                'id_wilayah' => $this->request->getPost('id_wilayah'),
                'id_wilayah' => $this->request->getPost('id_wilayah'),
                'foto' => $nama_file_foto,
            ];

            $this->ModelBatalyon->UpdateData($data);
            session()->setFlashdata('insert', 'Data Berhasil Diupdate !!');
            return redirect()->to('Batalyon');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Batalyon/Edit/' . $id_batalyon)->withInput('validation', \Config\Services::validation());
        }
    }

    //delete
    public function Delete($id_batalyon)
    {
        //delete foto
        $batalyon = $this->ModelBatalyon->DetailData($id_batalyon);
        if ($batalyon['foto'] <> '') {
            unlink('foto/' . $batalyon['foto']);
        }
        $data = [
            'id_batalyon' => $id_batalyon,
        ];
        $this->ModelBatalyon->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete !!');
        return redirect()->to('Batalyon');
    }

    public function Detail($id_batalyon)
    {
        $data = [
            'judul' => 'Detail Batalyon',
            'menu'  => 'batalyon',
            'page' => 'batalyon/v_detail',
            'web' => $this->ModelSetting->DataWeb(),
            'batalyon' => $this->ModelBatalyon->DetailData($id_batalyon),
        ];
        return view('v_template_back_end', $data);
    }

    public function Kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->ModelBatalyon->allKabupaten($id_provinsi);
        echo ' <option value="">--Pilih Kabupaten---</option>';
        foreach ($kab as $key => $value) {
            echo '<option value=' . $value['id_kabupaten'] . '>' . $value['nama_kabupaten'] . '</option>';
        }
    }
    public function Kecamatan()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kec = $this->ModelBatalyon->allKecamatan($id_kabupaten);
        echo ' <option value="">--Pilih Kecamatan---</option>';
        foreach ($kec as $key => $value) {
            echo '<option value=' . $value['id_kecamatan'] . '>' . $value['nama_kecamatan'] . '</option>';
        }
    }
}
