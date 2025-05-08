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
    public $choices;

    public Promo $promo;

    protected $rules = [
        'question_title' => 'required',
        'question_type' => 'required',
    ];

    public function addInputRow() {
        // $this->choices[] = 1;
        $this->choices->push(['choice' => '']);
    }

    public function removeInputRow($key) {
        // unset($this->choices[$key]);
        $this->choices->pull($key);
    }

    public function resetFields() {
        $this->question_title = '';
        $this->question_title = '';
        $this->choices[] = '';
    }

    public function storeQuestion() {
        $this->validate();
        $question = Question::create([
            'question_title' => $this->question_title,
            'question_type' => $this->question_type,
            'promo_id' => $this->promo_id
        ]);

        $question->promo()->attach($this->promo_id);

        if($this->question_type != 'comment') {
            foreach($this->choices as $choice) {
                // $choices[] = $this->choices[$key];
                $choices = Choice::create([
                    'choice' => $choice['choice'],
                    'question_id' => $question->id
                ]);
                // $question->choices()->attach($choices->id);
            }
        }

        $this->dispatch('created', [
            'title' => 'Created',
            'text' => 'Question created successfully.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $this->resetFields();
    }


    public function mount(Promo $promo) {
        $this->promo_id = $promo->id;
        $this->choices = collect();
    }


    public function render()
    {
        return view('livewire.admin.question.create-question')
            ->extends('layouts.admin.app')->section('contents');
    }
}
