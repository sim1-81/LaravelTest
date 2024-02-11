<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds by typing 
     * php artisan db:seed --class=BookSeeder
     *
     * @return void
     */
    public function run()
    {
        // Examples
        Book::create([
            'title' => 'Il Signore degli Anelli',
            'author' => 'J.R.R. Tolkien',
            'active' => true,
            'deleted' => false,
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'active' => true,
            'deleted' => false,
        ]);

        Book::create([
            'title' => 'Moby Dick',
            'author' => 'Herman Melville',
            'active' => true,
            'deleted' => false,
        ]);

        Book::create([
            'title' => 'Orgoglio e Pregiudizio',
            'author' => 'Jane Austen',
            'active' => true,
            'deleted' => false,
        ]);
    }
}
