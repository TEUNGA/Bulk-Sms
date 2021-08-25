<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\User;
use Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::create([
            'name' => $row['name'],
            'role' => 'Client',
            'phone' => $row['telephone'],
            'email' => $row['name'].'@bulk-sms.com',
            'password' => Hash::make('586324gif')
        ]);
        return new Contact([
            'users_name'     => $row['name'],
            'users_phone'    => $row['telephone'],
            'users_id'        => $user->id
         ]);
    }
}
