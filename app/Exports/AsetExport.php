<?php

namespace App\Exports;

use App\Models\DataAset;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AsetExport implements FromView, ShouldAutoSize
{
 
    public function view(): View
    {
        return view('admin.manajemen_aset.eksporAset', [
            'asets' => DataAset::all()
        ]);
    }
}
