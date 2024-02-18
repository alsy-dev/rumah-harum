<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge;

class AddNamaAlamatTelponUnitJenisToUsers extends Migration
{
    /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
        $fields = [
            'nama_lengkap' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'mobile_number' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'id_unit' => ['type' => 'INT', 'null' => true],
            'jenis_nasabah' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true]
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $fields = [
            'nama_lengkap',
            'mobile_number',
            'id_unit',
            'jenis_nasabah'
        ];
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
