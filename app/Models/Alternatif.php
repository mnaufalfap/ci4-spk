<?php

namespace App\Models;

use CodeIgniter\Model;

class Alternatif extends Model
{
  protected $table          = 'alternatif';
  protected $primaryKey     = 'id_alternatif';
  protected $allowedFields  = ['id_user', 'kode', 'nama', 'kondisi_keluarga', 'tempat_tinggal', 'usia_lansia', 'kesehatan', 'makanan', 'makanan_protein', 'pakaian', 'sekolah'];

  protected $validationRules = [
    'kode' => 'required|is_unique[alternatif.kode, id_alternatif, {id_alternatif}]',
    'nama' => 'required',
    'kondisi_keluarga' => 'required',
    'tempat_tinggal' => 'required',
    'usia_lansia' => 'required',
    'kesehatan' => 'required',
    'makanan' => 'required',
    'makanan_protein' => 'required',
    'pakaian' => 'required',
    'sekolah' => 'required',
  ];

  public function getAlternatifCriteria()
  {
    return $this->db->query("
      SELECT id_alternatif, 'kondisi_keluarga', 'tempat_tinggal', 'usia_lansia', 'kesehatan', 'makanan', 'makanan_protein', 'pakaian', 'sekolah' FROM " . $this->table . " WHERE id_user = " . session('id_user') . "
    ")->getResultArray();
  }

  public function getKodeAlternatif()
  {
    return $this->db->query("
      SELECT id_alternatif, kode FROM " . $this->table . " WHERE id_user = " . session('id_user') . " ORDER BY id_alternatif
    ")->getResultArray();
  }

  public function countAlternatifByUser($id_user)
  {
    return $this->where('id_user', $id_user)->countAllResults();
  }
}
