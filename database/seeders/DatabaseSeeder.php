<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::factory()->create([
      'name' => 'Demo User',
      'email' => 'test@example.com',
      'username' => 'test',
      'phone' => '081234567890',
      'password' => bcrypt('demo-password'),
    ]);


    $divisions = ['Mobile Apps', 'QA', 'Full Stack', 'Backend', 'Frontend', 'UI/UX Designer'];

    foreach ($divisions as $division) {
      Division::factory()->create([
        'name' => $division,
      ]);
    }
  }
}
