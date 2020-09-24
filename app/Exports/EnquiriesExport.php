<?php

namespace App\Exports;

use App\Enquiry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class EnquiriesExport implements FromView, WithColumnWidths
{
    public function view(): View
    {
        return view('backend.exports.enquiries', [
            'enquiries' => Enquiry::all()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 30,            
            'C' => 30,
            'D' => 30,
            'E' => 40,
            'F' => 20,
            'G' => 20,
            'H' => 20
        ];
    }
}
