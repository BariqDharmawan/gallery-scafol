<?php namespace App\Database\Seeds;

use Bluemmb\Faker\PicsumPhotosProvider;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class GallerySlideshowSeeder extends Seeder
{
	public function run()
	{
        $faker = Factory::create();
        for ($i = 1; $i <= 30; $i++) {
            $faker->addProvider(new PicsumPhotosProvider($faker));
            $data = [
                'photo' => $faker->imageUrl(500, 500, true),
                'gallery_id' => $faker->numberBetween($min = 1, $max = 30),
            ];
            $this->db->table('gallery_slideshow')->insert($data);
        }
	}
}
