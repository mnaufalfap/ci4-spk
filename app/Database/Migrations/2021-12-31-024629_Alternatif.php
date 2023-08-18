<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_alternatif INT UNSIGNED AUTO_INCREMENT',
      'id_user INT UNSIGNED',
      'nama VARCHAR(255)',
      'kode VARCHAR(64)',
    ]);
    $this->forge->addKey('id_alternatif', true);
    $this->forge->createTable('alternatif');
  }

  public function down()
  {
    $this->forge->dropTable('alternatif');
  }
}
