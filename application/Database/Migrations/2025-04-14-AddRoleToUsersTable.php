<?php

namespace App\Database\Migrations;


class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
                'default'    => 'user',
                'after'      => 'email', // Adjust this to place the column after a specific column
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'role');
    }
}