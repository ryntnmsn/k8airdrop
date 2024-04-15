<?php

namespace App\Livewire\Admin\Question;

use App\Models\Choice;
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
    public $choice_id;

    public Promo $promo;
    public Question $question;

    protected $rules = [
        'question_title' => 'required',
        'question_type' => 'required'
        // 'choices.*.choice' => 'required'
    ];

    public function updateQuestion() {
        $this->validate();
        // dd($this->question_id);
        $question = Question::where('id', $this->question_id);
        $question->update([
            'question_title' => $this->question_title,
            'question_type' => $this->question_type
        ]);

        foreach($this->choices as $key => $choice) {
            $ids = $this->choices[$key]['id'] ?? false;
           Choice::findOrFail($ids)->update([
                'choice' => $this->choices[$key]['choice']
            ]);
        }
        // dd($choiceValues);
    }

    public function removeInputRow($key) {
        $this->choices->pull($key);
    }

    public function removeChoiceRow($id) {
        $choice = Choice::findOrFail($id);
        $choice->delete();
        $this->dispatch('refresh-page');
    }

    public function addInputRow() {
        $this->choices->push(['choice' => '']);
    }

    public function mount(Promo $promo, Question $question){

        $questionGet = Question::with('choices')->find($question->id);

        $this->choices = collect();

        $this->question_id = $questionGet->id;
        $this->question_title = $questionGet->question_title;
        $this->question_type = $questionGet->question_type;

        foreach($questionGet->choices as $choice) {
            $this->choices->push(['choice' => $choice->choice, 'id' => $choice->id]);
        }
    }

    public function render()
    {
        return view('livewire.admin.question.edit-question')
            ->extends('layouts.admin.app')->section('contents');
    }
}
