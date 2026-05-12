<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        
        Book::truncate();

        
        $adjectives = ['The Silken', 'A Dark', 'The Crimson', 'A Golden', 'The Shadowed', 'A Cursed', 'The Broken', 'The Hidden', 'Midnight', 'The Secret', 'A Wicked', 'The Velvet'];
        $nouns = ['Throne', 'Crown', 'Marionette', 'Duke', 'Empire', 'Blade', 'Dragon', 'Rose', 'Heart', 'Archive', 'Villainess', 'Academy'];
        
        $genres = ['Romantasy', 'Fantasy', 'Manhwa', 'Mystery', 'Romance', 'Dark Academia'];
        
        $authors = ['Sarah J. Maas', 'Han Yi-rim', 'Rebecca Yarros', 'Julia Quinn', 'Baek Ji-yeon', 'Leigh Bardugo', 'V.E. Schwab', 'Holly Black'];

        
        for ($i = 0; $i < 30; $i++) {
            
            
            $randomTitle = $adjectives[array_rand($adjectives)] . ' ' . $nouns[array_rand($nouns)];
            $randomAuthor = $authors[array_rand($authors)];
            $randomGenre = $genres[array_rand($genres)];

            // On crée le livre
            Book::create([
                'title' => $randomTitle,
                'author' => $randomAuthor,
                'genre' => $randomGenre,
                'synopsis' => 'A mysterious tale about power, love, and destiny within the walls of the ' . $randomTitle . '...'
            ]);
        }
        
        
        Book::create(['title' => 'A Court of Thorns and Roses', 'author' => 'Sarah J. Maas', 'genre' => 'Romantasy', 'synopsis' => 'When nineteen-year-old huntress Feyre kills a wolf...']);
        Book::create(['title' => 'The Villainess is a Marionette', 'author' => 'Han Yi-rim', 'genre' => 'Manhwa', 'synopsis' => 'Princess Cayena was nothing but a doll controlled by her brother...']);
        Book::create(['title' => 'Fourth Wing', 'author' => 'Rebecca Yarros', 'genre' => 'Fantasy', 'synopsis' => 'Twenty-year-old Violet Sorrengail was supposed to enter the Scribe Quadrant...']);
    }
}