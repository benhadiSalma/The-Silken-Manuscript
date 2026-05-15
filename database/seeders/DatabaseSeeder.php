<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faq;
use App\Models\News;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Default users
        |--------------------------------------------------------------------------
        */

        $admin = User::create([
            'name' => 'Admin EHB',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'birthday' => '1995-01-01',
            'bio' => 'Official curator of The Silken Manuscript.',
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Salma',
            'username' => 'SilkenCurator',
            'email' => 'salma@test.com',
            'password' => 'Password!321',
            'birthday' => '2000-05-14',
            'bio' => 'Keeper of velvet records and forgotten books.',
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Demo Reader',
            'username' => 'VelvetReader',
            'email' => 'reader@test.com',
            'password' => 'Password!321',
            'birthday' => '2001-08-22',
            'bio' => 'A demo reader account used to test public profiles, favorites, chronicles, FAQ and contact access.',
            'is_admin' => false,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Books
        |--------------------------------------------------------------------------
        */

        $this->call([
            BookSeeder::class,
        ]);

        /*
        |--------------------------------------------------------------------------
        | FAQ items
        |--------------------------------------------------------------------------
        */

        Faq::create([
            'category' => 'Account',
            'question' => 'Do I need an account to explore the archive?',
            'answer' => 'No. Visitors can browse the archive, read chronicles, consult the rules, and open the FAQ without an account. Creating an account allows readers to save favorite manuscripts and personalize their public profile.',
        ]);

        Faq::create([
            'category' => 'Profile',
            'question' => 'What information appears on my public profile?',
            'answer' => 'Your public profile may show your archive pseudonym, profile picture, birthday, biography, and favorite manuscripts. These fields help other readers recognize your presence in the archive.',
        ]);

        Faq::create([
            'category' => 'Chronicles',
            'question' => 'Who can publish new chronicles?',
            'answer' => 'Only appointed curators can publish, edit, or delete chronicles. Regular readers and visitors can read the chronicles, but they cannot modify official announcements.',
        ]);

        Faq::create([
            'category' => 'Favorites',
            'question' => 'What happens when I save a manuscript as a favorite?',
            'answer' => 'When you save a manuscript as a favorite, it is added to your personal archive. You can return to it later from your profile, even after logging out and coming back.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | News / Chronicles
        |--------------------------------------------------------------------------
        */

        News::create([
            'user_id' => $admin->id,
            'title' => 'The Archive Opens Its Gates',
            'content' => 'The Silken Manuscript is now open to all readers, wanderers, and seekers of forgotten stories. Within these halls, visitors may explore the archives, discover new manuscripts, follow official chronicles, and preserve their favorite books in their personal collection.',
            'published_at' => now(),
        ]);

        News::create([
            'user_id' => $admin->id,
            'title' => 'A New Chapter Has Been Sealed',
            'content' => 'A new chronicle has been added to The Silken Manuscript. This decree marks another step in the expansion of the archive, where every manuscript carries a secret, every reader leaves a trace, and every page waits to be uncovered.',
            'published_at' => now()->subDays(2),
        ]);

        News::create([
            'user_id' => $admin->id,
            'title' => 'Readers May Now Preserve Favorites',
            'content' => 'The archive now allows readers to mark beloved manuscripts and preserve them in their personal collection. Every saved record becomes part of the reader’s visible journey through the halls.',
            'published_at' => now()->subDays(5),
        ]);
    }
}