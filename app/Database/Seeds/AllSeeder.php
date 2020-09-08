<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
	public function run()
	{
	    $allSeeder = [
	        'GallerySeeder',
            'GallerySlideshowSeeder'
        ];
	    for ($i = 0; $i < count($allSeeder); $i++) {
            $this->call($allSeeder[$i]);
        }
	}
}
