<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Groups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'group_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'group_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('group_id', true);
        // $this->forge->
        $this->forge->createTable('groups');
    }

    public function down()
    {
        $this->forge->dropTable('groups');
    }
}
