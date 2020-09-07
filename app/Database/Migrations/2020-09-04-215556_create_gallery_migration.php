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
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'caption' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => false,
            ],
            'pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
