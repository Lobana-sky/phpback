<?php

namespace Application\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostTagsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'tag_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
        ]);

        // Adding foreign keys
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');

        // Optional: Add primary key as composite of post_id and tag_id
        $this->forge->addKey(['post_id', 'tag_id'], true);

        $this->forge->createTable('post_tags');
    }

    public function down()
    {
        $this->forge->dropTable('post_tags');
    }
}
