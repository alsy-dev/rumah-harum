<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;

class AddProfilePictureAndPenanggungJawabToUsers extends Migration
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
            'profile_picture' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'penanggung_jawab' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $fields = [
            'profile_picture',
            'penanggung_jawab'
        ];
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
