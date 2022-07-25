<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Logins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'login_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'uname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'upass' => [
                'type'       => 'text',
            ],
            'user_id' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->addKey('login_id', true);
        // $this->forge->addForeignKey('user_id', 'Users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Logins');
    }

    public function down()
    {
        $this->forge->dropTable('Logins');
    }
}
