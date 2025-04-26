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

    public function Input()
    {
        $data = [
            'judul' => 'Input Lantamal',
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
            'jml_personil' => [
                'label' => 'Jumlah Personil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_selam' => [
                'label' => 'Jumlah Armada Kapal Selam',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_permukaan' => [
                'label' => 'Jumlah Armada Kapal Permukaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_artileri' => [
                'label' => 'Jumlah Artileri',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jml_armada_kapal_patroli' => [
                'label' => 'Jumlah Armada Kapal Patroli',
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
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();
            //jika validasi berhasil
            $data = [
                'nama_lantamal'               => $this->request->getPost('nama_lantamal'),
                'id_kesatuan'                 => $this->request->getPost('id_kesatuan'),
                'tgl_dibentuk'                => $this->request->getPost('tgl_dibentuk'),
                'id_wilayah'                  => $this->request->getPost('id_wilayah'),
                'jml_personil'                => $this->request->getPost('jml_personil'),
                'jml_armada_kapal_selam'      => $this->request->getPost('jml_armada_kapal_selam'),
                'jml_armada_kapal_permukaan'  => $this->request->getPost('jml_armada_kapal_permukaan'),
                'jml_artileri'                => $this->request->getPost('jml_artileri'),
                'jml_armada_kapal_patroli'    => $this->request->getPost('jml_armada_kapal_patroli'),
                'koordinat'                   => $this->request->getPost('koordinat'),
                'alamat'                      => $this->request->getPost('alamat'),
                'foto'                        => $nama_file_foto,
            ];

            $foto->move('foto', $nama_file_foto);
            $this->ModelLantamal->InsertDataLantamal($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('Lantamal');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Lantamal/Input')->withInput('validation', \Config\Services::validation());
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
