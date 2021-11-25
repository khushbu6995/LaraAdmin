<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{

    public function headings():array
    {
       return [
           'id',
           'name',
           'email',
           'password',
           'phone',
           'address',
           'image',
           'created_date',
           'modified_date',
       ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
