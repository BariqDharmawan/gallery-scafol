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
            $data = [
                'cover' => $faker->randomElement(['jembatan.jpg', 'tol1.jpg', 'underpass.jpg']),
                'category' => $faker->randomElement(['jalan-tol', 'jembatan', 'underpass']),
                'caption' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'pemilik' => $faker->firstName . ' ' . $faker->lastName,
                'type' => $faker->randomElement(['foto', 'video'])
            ];
            $this->db->table('gallery')->insert($data);
        }
    }
}
