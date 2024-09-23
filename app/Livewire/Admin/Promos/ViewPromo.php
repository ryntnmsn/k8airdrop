<?php

namespace App\Livewire\Admin\Promos;

use App\Models\Choice;
use App\Models\Participant;
use App\Models\Promo;
use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class ViewPromo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $name, $is_visible, $is_featured, $slug, $language_id,  $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image, $promo_id, $title;
    public $question_title = '', $question_type, $question_id;
    public $platforms = [];
    public $choices = [];
    public $choice;
    public $questions;
    public $inputs;
    public $participants;
    public $participant_id;
    public $k8_username = '';
    public $is_winner;
    public $uploadedImage;

    public Promo $promo;

    public function addInput() {
        $this->inputs->push(['choice' => '']);
    }

    public function removeInput($key) {
        $this->inputs->pull($key);
    }

    protected $rules = [
        // 'question.question' => 'required',
        'question_title' => 'required',
        'question_type' => 'required',
        'inputs.*.choice' => 'required'
    ];


    // public function addRowForChoice() {
    //     $this->choices[] = 1;
    // }

    public function deleteRowForChoice($key) {
        unset($this->choices[$key]);
        // $this->choices->pull($key);
    }

    public function storeQuestion() {
        $this->validate();
        $question = Question::create([
            'question_title' => $this->question_title,
            'question_type' => $this->question_type
        ]);

        $question->promo()->attach($this->promo_id);

        foreach($this->inputs as $input) {
            $choice = Choice::create([
                'choice' => $input['choice']
            ]);
            $question->choices()->attach($choice->id);
        }

        session()->flash('statusAdded', 'Question successfully added.');
    }

    // public function close() {
    //     $this->reset();
    // }

    public function editQuestion(Question $question) {
        $this->question_id = $question->id;
        $this->question_title = $question->question_title;
        $this->question_type = $question->question_type;

        $this->choices = $question->choices()->get();

        foreach($question->choices as $input) {
            $this->inputs->push(['choice' => $input]); //increment field by default
            // $this->choices[$key] = $input; //get value from the database
        }

        // dd($this->choices);
    }

    public function deleteQuestion(Question $question) {
       $this->question_id = $question->id;
    }

    public function destroyQuestion() {
        $question = Question::findOrFail($this->question_id);
        $question->delete();
        $this->js('window.location.reload()'); 
    }

    // public function addInputs() {
    //     $this->inputs->push(['choice' => '']);
    // }

    // public function removeInputs($key) {
    //     $this->inputs->pull($key);
    // }

    // public function deleteChoices($key) {
    //     unset($this->choices[$key]);
    // }

    // public function editQuestion($question_id) {
    //     $this->getQuestion = Question::with('choices')->find($question_id);
    //     $this->choices = $this->getQuestion->choices()->get();
    //     $this->question_title = $this->getQuestion->title;
    //     $this->question_type = $this->getQuestion->type;
    //     $this->question_id = $this->getQuestion->id;
    // }

    // public function updated($propertyName){
    //     $this->validateOnly($propertyName);
    // }

    public function resetFields() {
        // $this->question_title = '';
        // $this->question_type = '';
        // $this->inputs = [];
    }

    // protected $rules = [
    //     'question_title' => 'required',
    //     'question_type' => 'required',
    // ];

    // public function storeQuestion() {
    //     $this->validate();

    //     $question = Question::create([
    //         'title' => $this->question_title,
    //         'type' => $this->question_type
    //     ]);

    //     $question->promo()->attach($this->promo_id);

    //     foreach($this->inputs as $input) {
    //         $choices = Choice::create([
    //             'choice' => $input['choice'],
    //         ]);
    //         $question->choices()->attach($choices->id);
    //     }

    //     session()->flash('statusAdded', 'Question successfully added.');

    //     $this->resetFields();
    // }

    public function storeParticipant() {
        $this->validate([
            'k8_username' => 'required|alpha_dash',
        ]);

        $is_winner = false;
        if($this->is_winner == 'true') {
            $is_winner = true;
        } else {
            $is_winner = false;
        }

        $participant = Participant::where('k8_username', $this->k8_username)->where('promo_id', $this->promo_id)->exists();

        if($participant == null) {
            Participant::create([
                'name' => 'Dummy',
                'promo_id' => $this->promo_id,
                'k8_username' => $this->k8_username,
                'email' => 'Dummy',
                'ip' => 'Dummy',
                'is_winner' => $is_winner
            ]);

            $this->js('window.location.reload()');

        } else {
            session()->flash('errorParticipant', 'Already exists');
        }

    }

    public function resetUploadedImage() {
        $this->uploadedImage = null;
    }

    public function editParticipant($id) {
        $participant = Participant::where('id', $id)->first();
        $this->participant_id = $participant->id;
        $this->k8_username = $participant->k8_username;
        $this->is_winner = $participant->is_winner;
        $this->uploadedImage = $participant->image;
    }

    public function updateParticipant() {
        $this->validate([
            'k8_username' => 'required|alpha_dash',
        ]);

        $participant = Participant::where('id', $this->participant_id)->first();

        $is_winner = false;
        if($this->is_winner == 'true') {
            $is_winner = true;
        } else {
            $is_winner = false;
        }

        if($participant->email == 'Dummy') {
            $participant->update([
                'k8_username' => $this->k8_username,
                'is_winner' => $is_winner
            ]);
        } else {
            $participant->update([
                'is_winner' => $is_winner
            ]);
        }

        $this->js('window.location.reload()');
    }

    public function mount($id) {

        $promo = Promo::with('language', 'platforms', 'questions')->find($id);

        $this->promo_id = $promo->id;
        $this->name = $promo->name;
        $this->slug = env('APP_URL') . '/promo/' . $promo->slug;
        $this->image = $promo->image;
        $this->language_id = $promo->language->name ?? 'No language';
        $this->start_date = $promo->start_date;
        $this->end_date = $promo->end_date;
        $this->is_visible = $promo->is_visible;
        $this->is_featured = $promo->is_featured;
        $this->is_banner = $promo->is_banner;
        $this->prize_pool = $promo->prize_pool;
        $this->type = $promo->type;
        $this->game_type = $promo->game_type;
        $this->button_name = $promo->button_name;
        $this->button_link = $promo->button_link;
        $this->description = $promo->description;
        $this->terms = $promo->terms;
        $this->article = $promo->article;
        $this->platforms = $promo->platforms->pluck('name');

        $this->questions = $promo->questions()->get();

        $this->fill([
            'inputs' => collect([['choice' => '']])
        ]);
        // $this->inputs = collect();

    }

    public function render()
    {
        $getParticipants = Participant::where('promo_id', $this->promo_id)->orderBy('is_winner', 'desc')->get();

        return view('livewire.admin.promos.view-promo', [
            'getParticipants' => $getParticipants
        ])->extends('layouts.admin.app')->section('contents');
    }
}
