<?php

namespace App\Http\Controllers;

use App\Exports\EnglishSubscribersExport;
use App\Exports\JapanSubscribersExport;
use App\Exports\ParticipantsExport;
use Illuminate\Http\Request;
use Excel;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function exportPromoParticipants($id) {
        return Excel::download(new ParticipantsExport($id), 'Participants_' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }

    public function exportEnglishSubscribers() {
        return Excel::download(new EnglishSubscribersExport, 'EN_Subscribers_' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }

    public function exportJapanSubscribers() {
        return Excel::download(new JapanSubscribersExport, 'JP_Subscribers_' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }
}
