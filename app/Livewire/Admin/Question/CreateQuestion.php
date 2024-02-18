<?php

namespace App\Livewire\Admin\Question;

use App\Models\Choice;
use App\Models\Promo;
use App\Models\Question;
use Livewire\Component;

class CreateQuestion extends Component
{
    public $promo_id;
    public $question_title;
    public $question_type;
    public $choices = [];

    public Promo $promo;

    protected $rules = [
        'question_title' => 'required',
        'question_type' => 'required'
    ];

    public function addInputRow() {
        $this->choices[] = 1;
    }

    public function removeInputRow($key) {
        unset($this->choices[$key]);
    }

    public function storeQuestion() {
        $this->validate();
        $question = Question::create([
            'question_title' => $this->question_title,
            'question_type' => $this->question_type
        ]);

        $question->promo()->attach($this->promo_id);

        foreach($this->choices as $key => $choice) {
            $choices = Choice::create([
                'choice' => $this->choices[$key]
            ]);
        }
        dd($choices);
    }


    public function mount(Promo $promo) {
        $this->promo_id = $promo->id;
    }


    public function render()
    {
        return view('livewire.admin.question.create-question')
            ->extends('layouts.app')->section('contents');
    }
}
