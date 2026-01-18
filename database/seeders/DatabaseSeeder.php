<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Broker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Create 10 random users
        // User::factory(10)->create();

        // // Create admin user
        // $adminUser = User::create([
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123123123'),
        //     'email_verified_at' => now(),
        // ]);

        // // Create admin record linked to the user
        // Admin::create([
        //     'user_id' => $adminUser->id,
        //     'name' => 'Admin',
        //     'phone_number' => '0000000000',
        //     'address' => 'Admin Address',
        //     'sex' => 'Male',
        //     'birthdate' => '1990-01-01',
        // ]);

        // Create 2 brokers
        $brokerUsers = [];
        $brokers = [];
        for ($i = 1; $i <= 2; $i++) {
            $brokerUser = User::create([
                'email' => "broker{$i}@gmail.com",
                'password' => Hash::make('123123123'),
                'email_verified_at' => now(),
            ]);
            $brokerUsers[] = $brokerUser;

            $broker = Broker::create([
                'user_id' => $brokerUser->id,
                'name' => "Broker {$i}",
                'phone_number' => "090000000{$i}",
                'address' => "Broker {$i} Address",
                'sex' => $i % 2 == 0 ? 'Female' : 'Male',
                'birthdate' => '1985-01-0' . $i,
            ]);
            $brokers[] = $broker;
        }

        // Create 3 agents (assigned to brokers)
        for ($i = 1; $i <= 3; $i++) {
            $agentUser = User::create([
                'email' => "agent{$i}@gmail.com",
                'password' => Hash::make('123123123'),
                'email_verified_at' => now(),
            ]);

            Agent::create([
                'user_id' => $agentUser->id,
                'broker_id' => $brokers[($i - 1) % 2]->id, // Distribute agents between brokers
                'name' => "Agent {$i}",
                'phone_number' => "080000000{$i}",
                'address' => "Agent {$i} Address",
                'sex' => $i % 2 == 0 ? 'Female' : 'Male',
                'birthdate' => '1990-01-0' . $i,
            ]);
        }
    }
}
