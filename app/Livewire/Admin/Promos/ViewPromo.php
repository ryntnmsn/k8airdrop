<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Choice;
use App\Models\Promo;
use App\Models\Question;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ViewPromo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $promo, $name, $is_visible, $is_featured, $slug, $language_id,  $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image, $promo_id, $title;
    public $platforms = [];
    public $inputs;
    public $questions;
    public $choices;
    public $question_title = '';
    public $question_id = '';
    public $getQuestion;
    public $question_type;


    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function resetFields() {
        $this->question_title = '';
        $this->question_type = '';
        $this->inputs = [];
    }

    protected $rules = [
        'question_title' => 'required',
        'question_type' => 'required',
        // 'choices.*.choice' => 'required',
    ];



    public function addInputs() {
        $this->inputs->push(['choice' => '']);
    }

    public function removeInputs($key) {
        $this->inputs->pull($key);
    }

    public function deleteChoices($key) {
        unset($this->choices[$key]);
    }

    public function storeQuestion() {
        $this->validate();

        $question = Question::create([
            'title' => $this->question_title,
            'type' => $this->question_type
        ]);

        $question->promo()->attach($this->promo_id);

        foreach($this->inputs as $input) {
            $choices = Choice::create([
                'choice' => $input['choice'],
            ]);
            $question->choices()->attach($choices->id);
        }

        session()->flash('statusAdded', 'Question successfully added.');

        $this->resetFields();
    }
    

    public function updateQuestion() {
        $this->getQuestion->update([
            'title' => $this->question_title,
            'type' => $this->question_type
        ]);
    
        $getChoices = $this->getQuestion->choices()->get();

        foreach($getChoices as $value) {
            
        }

        // $getChoiceID = $getChoices->pluck('id');

        // foreach($this->choices as $choice) {
            
        // }

        session()->flash('statusUpdated', 'Question updated successfully.');
    }



    public function editQuestion($question_id) {
        $this->getQuestion = Question::with('choices')->find($question_id);
        $this->choices = $this->getQuestion->choices()->get();
        $this->question_title = $this->getQuestion->title;
        $this->question_type = $this->getQuestion->type;
        $this->question_id = $this->getQuestion->id;
    }


    public function mount($id) {
        $this->inputs = collect();
        $getPromo = Promo::with('platforms', 'language', 'questions')->find($id);
        $this->promo = $getPromo;
        $this->promo_id = $getPromo->id;
        $this->name = $getPromo->name;
        $this->slug = env('APP_URL') . '/promos/' . $getPromo->slug;
        $this->image = $getPromo->image;
        $this->language_id = $getPromo->language;
        $this->start_date = $getPromo->start_date;
        $this->end_date = $getPromo->end_date;
        $this->is_visible = $getPromo->is_visible;
        $this->is_featured = $getPromo->is_featured;
        $this->is_banner = $getPromo->is_banner;
        $this->prize_pool = $getPromo->prize_pool;
        $this->type = $getPromo->type;
        $this->game_type = $getPromo->game_type;
        $this->button_name = $getPromo->button_name;
        $this->button_link = $getPromo->button_link;
        $this->description = $getPromo->description;
        $this->terms = $getPromo->terms;
        $this->article = $getPromo->article;
        $this->platforms = $getPromo->platforms->pluck('name');

        $this->questions = $this->promo->questions()->get();

    }


    public function render()
    {
        return view('livewire.admin.promos.view-promo')->extends('layouts.app')->section('contents');
    }
}