<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
  protected $table            = 'kriteria';
  protected $primaryKey       = 'id_kriteria';
  protected $allowedFields    = ['kode_kriteria', 'nama', 'jenis'];

  protected $validationRules = [
    'kode_kriteria' => 'required|is_unique[kriteria.kode_kriteria, id_kriteria, {id_kriteria}]',
    'nama' => 'required|is_unique[kriteria.nama, id_kriteria, {id_kriteria}]',
    'jenis' => 'required',
  ];

  public function getBenefitCriteria()
  {
    return $this->db->query(
      "SELECT * FROM " . $this->table . " WHERE jenis = 'bc'"
    );
  }

  public function getCriteria()
  {
    return $this->db->query(
      "SELECT id_kriteria, kode_kriteria, nama FROM " . $this->table . ""
    );
  }

  public function getCountCriteria()
  {
    return $this->db->query(
      "SELECT id_kriteria, nama FROM " . $this->table . ""
    )->getResultArray();
  }
}
