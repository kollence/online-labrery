<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::factory(10)->create();

        foreach ($authors as $author) {
            Book::factory(rand(3, 5))->create([
                'author_id' => $author->id
            ]);
        }
    }
}
