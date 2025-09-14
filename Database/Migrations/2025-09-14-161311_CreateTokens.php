<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTokens extends Migration
{
    public function up()
    {

        $this->forge->addField([
        'id'           => ['type' => 'INT', 'auto_increment' => true],
        'token_number' => ['type' => 'VARCHAR', 'constraint' => 20],
        'status'       => ['type' => 'ENUM', 'constraint' => ['Waiting','Ongoing','Ended'], 'default' => 'Waiting'],
        'created_at'   => ['type' => 'DATETIME', 'null' => true],
        'updated_at'   => ['type' => 'DATETIME', 'null' => true],
    ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tokens');
    }

    public function down()
    {
        //$this->forge->dropTable('tokens');
    }
}
