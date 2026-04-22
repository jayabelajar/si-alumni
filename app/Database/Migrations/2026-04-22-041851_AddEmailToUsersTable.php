<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'after'      => 'username',
                'unique'     => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'email');
    }
}
