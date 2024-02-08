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

    public $promo, $questionsCollect, $name, $is_visible, $is_featured, $slug, $language_id,  $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image, $promo_id, $title;
    public $platforms = [];
    public $inputs;
    public $question_title = '';
    public $question_type = '';

    public function addInputs() {
        $this->inputs->push(['choice' => '']);
    }

    public function removeInputs($key) {
        $this->inputs->pull($key);
    }

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
    ];

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

        $this->reset();
    }
    
    public function mount($id) {
        $this->inputs = collect();
        $getPromo = Promo::with('platforms', 'language', 'questions')->find($id);
        $this->promo = $getPromo;
        $this->questionsCollect = $getPromo;
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
    }

    public function render()
    {

        $questions = $this->promo->questions();

        return view('livewire.admin.promos.view-promo', [
            'questions' => $questions->paginate(10)
        ])->extends('layouts.app')->section('contents');
    }
}
