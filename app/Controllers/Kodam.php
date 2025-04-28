<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelWilayah;
use App\Models\ModelSetting;
use App\Models\ModelKodam;
use App\Models\ModelKesatuan;



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
                'label' => 'Nama Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_artileri_2' => [
                'label' => 'Nama Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_artileri' => [
                'label' => 'Deskripsi Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'deskripsi_artileri_2' => [
                'label' => 'Deskripsi Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto_artileri' => [
                'label' => 'Foto Pesawat Terbang 1',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'foto_artileri_2' => [
                'label' => 'Foto Pesawat Terbang 2',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'jml_artileri' => [
                'label' => 'Jumlah Pesawat Terbang 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_artileri_2' => [
                'label' => 'Jumlah Pesawat Terbang 2',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_tank' => [
                'label' => 'Nama Artileri 1',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'nama_tank_2' => [
                'label' => 'Nama Artileri 2',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'foto_tank_2' => [
                'label' => 'Foto Tank 2',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            'foto_helikopter_2' => [
                'label' => 'Foto Helikopter 2',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
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
            $foto_artileri->move('Gambar/Kodam/Kapal Selam', $nama_file_foto_artileri);
            $foto_artileri_2->move('Gambar/Kodam/Kapal Selam 2', $nama_file_foto_artileri_2);
            $foto_tank->move('Gambar/Kodam/Tank', $nama_file_foto_tank);
            $foto_tank_2->move('Gambar/Kodam/Tank 2', $nama_file_foto_tank_2);
            $foto_helikopter->move('Gambar/Kodam/Helikopter', $nama_file_foto_helikopter);
            $foto_helikopter_2->move('Gambar/Kodam/Helikopter 2', $nama_file_foto_helikopter_2);

            $this->ModelKodam->InsertDataKodam($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Kodam');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Kodam/Input')->withInput('validation', \Config\Services::validation());
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
