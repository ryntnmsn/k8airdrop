<?php

namespace App\Exports;

use App\Models\Choice;
use App\Models\Message;
use App\Models\Participant;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ParticipantsExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $id;

    public function __construct($id = null) {
        $this->id = $id;
    }

    public function view() : View {
        $participants = Participant::with('choices')->where('promo_id', $this->id)->get();
        $questions = Question::with('questionChoices')->where('promo_id', $this->id)->get();
        $messages = Message::with('participant')->where('promo_id', $this->id)->get();

        return view('exports.export-promo-participants', [
            'participants' => $participants,
            'questions' => $questions,
            'messages' => $messages
        ]);
    }
}
