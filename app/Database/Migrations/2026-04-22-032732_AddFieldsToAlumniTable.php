<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToAlumniTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('alumni', [
            'bio' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'status'
            ],
            'skills' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'bio'
            ],
            'linkedin_url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'skills'
            ],
            'portfolio_url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'linkedin_url'
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'portfolio_url'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('alumni', ['bio', 'skills', 'linkedin_url', 'portfolio_url', 'avatar']);
    }
}
