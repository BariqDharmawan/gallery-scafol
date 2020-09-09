<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGalleryMigration extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'cover' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'caption' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('gallery');
	}
}
