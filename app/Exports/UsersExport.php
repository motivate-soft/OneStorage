<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

/**
 * Class UsersExport
 * @package App\Exports
 */
class UsersExport implements FromView, WithColumnWidths
{
    /**
     * @return View
     */
    public function view(): View{
        return view('backend.exports.members', [
            'users' => User::where('role', 'user')->get()
        ]);
    }

    /**
     * @return array
     */
    public function columnWidths(): array{
        return [
            'A' => 20,
            'B' => 40,
            'C' => 30,
            'D' => 30,
            'E' => 40,
            'F' => 20,
            'G' => 20,
            'H' => 20
        ];
    }
}
