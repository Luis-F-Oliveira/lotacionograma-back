<?php

namespace App\Exports;

use App\Models\Staffing;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServantsExport implements FromCollection
{
    public function collection()
    {
        return Staffing::all();
    }
}