<?php namespace App\Database\Seeds;

use Bluemmb\Faker\PicsumPhotosProvider;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class GallerySeeder extends Seeder
{
	public function run()
	{
        $faker = Factory::create();
        for ($i = 1; $i <= 30; $i++) {
            $faker->addProvider(new PicsumPhotosProvider($faker));
            $data = [
                'photo' => $faker->imageUrl(500, 500, true),
                'category_id' => $faker->numberBetween($min = 1, $max = 4),
                'caption' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'pemilik' => $faker->firstName . $faker->lastName
            ];
            $this->db->table('gallery')->insert($data);
        }
    }
}
