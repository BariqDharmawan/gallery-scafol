<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGallerySlideshowMigration extends Migration
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
            'content' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'gallery_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery_slideshow');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('gallery_slideshow');
	}
}
