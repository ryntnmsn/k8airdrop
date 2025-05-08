<?php

namespace App\Exports;

use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EnglishSubscribersExport  implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $id;

    public function __construct($id = null) {
        $this->id = $id;
    }

    public function view() : View {
        $users = Subscription::where('code', '!=', 'jp')->get();
        return view('exports.export-english-subscribers', [
            'users' => $users
        ]);
    }
}
