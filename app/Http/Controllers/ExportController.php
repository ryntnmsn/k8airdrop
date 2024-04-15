<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantsExport;
use Illuminate\Http\Request;
use Excel;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function exportPromoParticipants($id) {
        return Excel::download(new ParticipantsExport($id), 'Participants_' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }
}
