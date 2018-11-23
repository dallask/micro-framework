<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 23-Nov-18
 * Time: 11:00
 */

use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    public function run(): void
    {
        $this->table('posts')->truncate();

        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title' => trim($faker->sentence, '.'),
                'date' => $faker->date('Y-m-d H:i:s'),
                'content' => $faker->text(500),
            ];
        }

        $this->insert('posts', $data);
    }
}
