<?php namespace App\Database\Seeds;

use App\Models\GalleryModel;
use Bluemmb\Faker\PicsumPhotosProvider;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class GallerySlideshowSeeder extends Seeder
{
	public function run()
	{
        $faker = Factory::create();
        $galleryModel = new GalleryModel();
        $galleries = $galleryModel->orderBy('created_at', 'DESC')->findAll();
        foreach ($galleries as $gallery) {
            if ($gallery['type'] == 'video') {
                for ($i = 1; $i <= 2; $i++) {
                    $faker->addProvider(new PicsumPhotosProvider($faker));
                    $data = [
                        'content' => '2second.mp4',
                        'gallery_id' => $gallery['id'],
                    ];
                    $this->db->table('gallery_slideshow')->insert($data);
                }
            }
            else {
                for ($i = 1; $i <= 2; $i++) {
                    $faker->addProvider(new PicsumPhotosProvider($faker));
                    $data = [
                        'content' => $faker->imageUrl(500, 500, true),
                        'gallery_id' => $gallery['id'],
                    ];
                    $this->db->table('gallery_slideshow')->insert($data);
                }
            }
        }
	}
}
