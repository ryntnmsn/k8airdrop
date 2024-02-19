<?php

namespace App\Livewire\Admin\Question;

use App\Models\Promo;
use App\Models\Question;
use Livewire\Component;

class EditQuestion extends Component
{
    public $promo_id;
    public $question_id;
    public $question_title;
    public $question_type;
    public $choices;

    public Promo $promo;
    public Question $question;

    protected $rules = [
        'choices.*.choice' => 'required'
    ];

    public function updateQuestion() {

    }

    public function addInputRow() {
        // $this->choices[] = 1;
        $this->choices->push(['choice' => '']);
    }

    public function mount(Promo $promo, Question $question){

        $questionGet = Question::with('choices')->find($question->id);

        $this->choices = collect();

        $this->question_title = $questionGet->question_title;
        $this->question_type = $questionGet->question_type;

        foreach($questionGet->choices as $choice) {
            $this->choices->push(['choice' => $choice]);
        }

        // dd($questionGet->choices);
    }

    public function render()
    {
        return view('livewire.admin.question.edit-question')
            ->extends('layouts.app')->section('contents');
    }
}
