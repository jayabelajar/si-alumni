<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddApplicationLinkToJobsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('jobs', [
            'application_link' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'salary_range',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('jobs', 'application_link');
    }
}
