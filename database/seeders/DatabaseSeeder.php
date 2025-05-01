<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory(10)->create();

        $this->makeFather();
        $this->makeBot();
        $this->makeSuperAdmin();
        $this->makeAdmin();
        $this->makeSupport();
        $this->makeFamiliar();
    }
    public function makeFather(){
        $users = User::all()->where('role', 1);
        $fatherUser = $users->random();
        $fatherUser->update([
            'role' => 6,
            'email' => 'fathericus@example.com'
        ]);
        echo "Father user: " . $fatherUser->name . " (ID: " . $fatherUser->id . ", MAIL: " . $fatherUser->email . ")\n";
    }

    public function makeBot(){
        $users = User::all()->where('role', 1);
        $botUser = $users->random();
        $botUser->update([
            'role' => 5,
            'email' => 'botino@example.com'
        ]);
        echo "Bot user: " . $botUser->name . " (ID: " . $botUser->id . ", MAIL: " . $botUser->email . ")\n";
    }

    public function makeSuperAdmin(){
        $users = User::all()->where('role', 1);
        $superAdminUser = $users->random();
        $superAdminUser->update(['role' => 5]);
        echo "Super Admin user: " . $superAdminUser->name . " (ID: " . $superAdminUser->id . ", MAIL: " . $superAdminUser->email . ")\n";
    }

    public function makeAdmin(){
        $users = User::all()->where('role', 1);
        $adminUser = $users->random();
        $adminUser->update(['role' => 4]);
        echo "Admin user: " . $adminUser->name . " (ID: " . $adminUser->id . ", MAIL: " . $adminUser->email . ")\n";
    }

    public function makeSupport(){
        $users = User::all()->where('role', 1);
        $supportUser = $users->random();
        $supportUser->update(['role' => 3]);
        echo "Support user: " . $supportUser->name . " (ID: " . $supportUser->id . ", MAIL: " . $supportUser->email . ")\n";
    }

    public function makeFamiliar(){
        $users = User::all()->where('role', 1);
        $familiarUser = $users->random();
        $familiarUser->update(['role' => 2]);
        $users = User::all()->where('role', 1);
        $sonUser = $users->random();
        $familiarUser->update(['taking_care_of' => $sonUser->id]);
        echo "Familiar user: " . $familiarUser->name . " (ID: " . $familiarUser->id . ", MAIL: " . $familiarUser->email . ") taking care of son: " . $sonUser->name . " (ID: " . $sonUser->id . ", MAIL: " . $sonUser->email . ")\n";
    }
}
