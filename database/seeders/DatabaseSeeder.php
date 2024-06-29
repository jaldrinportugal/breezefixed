<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Patientlist;
use App\Models\PaymentInfo;
use App\Models\Record;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'usertype' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        
        User::create([
            'usertype' => 'patient',
            'name' => 'Patient',
            'email' => 'patient@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'usertype' => 'dentistrystudent',
            'name' => 'Dentistry Student',
            'email' => 'dentistrystudent@example.com',
            'password' => Hash::make('password'),
        ]);

        Record::truncate();
        Record::create([
            'file' => 'Check up result'
        ]);
        Record::create([
            'file' => 'Dental X-Ray resut'
        ]);
        Record::create([
            'file' => 'Medical Prescription'
        ]);
        Record::create([
            'file' => 'Checkup result 2'
        ]);
        Record::create([
            'file' => 'Checkup result 3'
        ]);
        
        Patientlist::truncate();

        Patientlist::create([
            'name' => 'John Smith',
            'gender' => 'Male',
            'age' => 25,
            'phone' => '09123456789',
            'address' => '123 Maple Street',
        ]);

        Patientlist::create([
            'name' => 'Emily Johnson',
            'gender' => 'Female',
            'age' => 21,
            'phone' => '09123456789',
            'address' => '456 El Street',
        ]);

        Patientlist::create([
            'name' => 'Michael Rodriguez',
            'gender' => 'Male',
            'age' => 18,
            'phone' => '09123456789',
            'address' => '789 Oak Avenue',
        ]);

        Patientlist::create([
            'name' => 'Sophia Brown',
            'gender' => 'Female',
            'age' => 23,
            'phone' => '09123456789',
            'address' => '101 Pine Lane',
        ]);

        Patientlist::create([
            'name' => 'Liam Williams',
            'gender' => 'Male',
            'age' => 36,
            'phone' => '09123456789',
            'address' => '234 Birch Road',
        ]);

        Patientlist::create([
            'name' => 'Emma Johnson',
            'gender' => 'Female',
            'age' => 29,
            'phone' => '09123456789',
            'address' => '123 Maple St, Springfield, IL',
        ]);

        Patientlist::create([
            'name' => 'Alexander Lee',
            'gender' => 'Male',
            'age' => 41,
            'phone' => '09123456789',
            'address' => '789 Oak Ave, Charleston, SC',
        ]);

        Patientlist::create([
            'name' => 'Sophia Martinez',
            'gender' => 'Female',
            'age' => 21,
            'phone' => '09123456789',
            'address' => '456 Pine Rd, Portland, OR',
        ]);

        Patientlist::create([
            'name' => 'Noah Taylor',
            'gender' => 'Male',
            'age' => 33,
            'phone' => '09123456789',
            'address' => '567 Cedar Ln, Denver, CO',
        ]);

        Patientlist::create([
            'name' => ' Olivia Brown',
            'gender' => 'Female',
            'age' => 27,
            'phone' => '09123456789',
            'address' => ' 890 Elm Blvd, Austin, TX',
        ]);

        Patientlist::create([
            'name' => 'William Garcia',
            'gender' => 'Male',
            'age' => 39,
            'phone' => '09123456789',
            'address' => '234 Birch Dr, Nashville, TN',
        ]);

        Patientlist::create([
            'name' => 'Ava Miller',
            'gender' => 'Female',
            'age' => 18,
            'phone' => '09123456789',
            'address' => '678 Aspen Way, Raleigh, NC',
        ]);

        Patientlist::create([
            'name' => 'James Rodriguez',
            'gender' => 'Male',
            'age' => 24,
            'phone' => '09123456789',
            'address' => '345 Pinecrest Ave, Miami, FL',
        ]);

        Patientlist::create([
            'name' => 'Isabella Wilson',
            'gender' => 'Male',
            'age' => 31,
            'phone' => '09123456789',
            'address' => '901 Magnolia Cir, Seattle, WA',
        ]);

        Patientlist::create([
            'name' => 'Benjamin Thompson',
            'gender' => 'Male',
            'age' => 36,
            'phone' => '09123456789',
            'address' => '543 Willow St, San Francisco, CA',
        ]);

        Patientlist::create([
            'name' => 'Mia Thomas',
            'gender' => 'Female',
            'age' => 24,
            'phone' => '09123456789',
            'address' => '789 Juniper Rd, Chicago, IL',
        ]);

        Patientlist::create([
            'name' => 'Lucas Harris',
            'gender' => 'Male',
            'age' => 29,
            'phone' => '09123456789',
            'address' => '234 Spruce Ave, Boston, MA',
        ]);

        Patientlist::create([
            'name' => 'Charlotte Davis',
            'gender' => 'Female',
            'age' => 28,
            'phone' => '09123456789',
            'address' => '456 Oakwood Blvd, Atlanta, GA',
        ]);

        Patientlist::create([
            'name' => 'Mason Martinez',
            'gender' => 'Male',
            'age' => 20,
            'phone' => '09123456789',
            'address' => '678 Elmwood Dr, Houston, TX',
        ]);

        Patientlist::create([
            'name' => 'Amelia Clark',
            'gender' => 'Male',
            'age' => 37,
            'phone' => '09123456789',
            'address' => '890 Maple Ave, Philadelphia, PA',
        ]);

        Patientlist::create([
            'name' => 'Ethan White',
            'gender' => 'Male',
            'age' => 23,
            'phone' => '09123456789',
            'address' => '123 Birchwood Ln, Dallas, TX',
        ]);

        Patientlist::create([
            'name' => 'Harper Robinson',
            'gender' => 'Male',
            'age' => 30,
            'phone' => '09123456789',
            'address' => '567 Cedar Rd, Los Angeles, CA',
        ]);
        
        PaymentInfo::truncate();

        PaymentInfo::create([
            'patient' => 'Emily',
            'description' => 'Cleaning',
            'amount' => 11000,
            'balance' => 2000,
            'date' => '2024-02-28',
        ]);
        PaymentInfo::create([
            'patient' => 'Liam',
            'description' => 'Fillings',
            'amount' => 20500,
            'balance' => 6500,
            'date' => '2024-01-06',
        ]);
        PaymentInfo::create([
            'patient' => 'Sophia',
            'description' => 'Crowns',
            'amount' => 13000,
            'balance' => 4000,
            'date' => '2024-12-12',
        ]);
        PaymentInfo::create([
            'patient' => 'Noah',
            'description' => 'Dental Implants',
            'amount' => 40500,
            'balance' => 20500,
            'date' => '2024-11-26',
        ]);
        PaymentInfo::create([
            'patient' => 'Olivia',
            'description' => 'Orthodontic Treatment',
            'amount' => 25000,
            'balance' => 11000,
            'date' => '2024-02-10',
        ]);
    }
}
