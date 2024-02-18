<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge;

class AddAlamatToUsers extends Migration
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
            'alamat' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true]
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $fields = [
            'alamat'
        ];
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
