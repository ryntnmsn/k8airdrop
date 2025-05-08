<?php

namespace App\Livewire\Home;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Participant;
use App\Models\Platform;
use App\Models\Promo;
use App\Models\Question;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Stevebauman\Location\Facades\Location;

class SinglePromo extends Component
{

    use WithFileUploads;

    public $promo_id, $next_record, $previous_record, $days_left, $name, $slug, $language_id, $is_visible, $is_featured, $description, $is_banner, $terms, $article, $prize_pool, $start_date, $end_date, $type, $game_type, $button_name, $button_link, $image;
    public $platforms;
    public $userUploadImage;
    public $sns_id;
    public $paste_retweet_url;
    public $comment;
    public $questions;
    public $choices = [];
    public $checkbox = [];
    // public $comments = [];
    public $messages = [];
    public $promoStatus = true;
    public $joinPromo = true;
    public $participants;
    public $promo;




    public function nextRecord() {
        $lang = app()->getLocale();
        $next_record = Promo::where('id', '>' , $this->promo_id)
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
        })->first();

        if($next_record == null) {
            $loop_record = Promo::orderBy('id', 'asc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->redirectRoute('single.promo', ['slug' => $loop_record->slug]);
        } else {
            $this->redirectRoute('single.promo', ['slug' => $next_record->slug]);
        }
    }

    public function previousRecord() {
        $lang = app()->getLocale();
        $previous_record = Promo::where('id', '<' , $this->promo_id)->orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
        })->first();

        if($previous_record == null) {
            $loop_record = Promo::orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->redirectRoute('single.promo', ['slug' => $loop_record->slug]);
        } else {
            $this->redirectRoute('single.promo', ['slug' => $previous_record->slug]);
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function mount($slug) { 
        $lang = app()->getLocale();
        $promo = Promo::with('platforms')->where('slug', $slug)->first();
        $this->promo = $promo;
        $this->platforms = $promo->platforms()->get();

        // $parseStartDate = Carbon::parse($promo->start_date);
        $parseEndDate = Carbon::parse($promo->end_date);
        $this->days_left = Carbon::parse(Carbon::now())->diffInDays($parseEndDate ,false) + 1;

        // If promo ends
        if($promo->end_date >= Carbon::now()->format('Y-m-d')) {
            $this->promoStatus = true;
        } else {
            $this->promoStatus = false;
        }

        //If promo not yet started
        if($promo->start_date > Carbon::now()->format('Y-m-d')) {
            return abort(404);
        }

        // dd($this->platforms);
        $this->promo_id = $promo->id;
        $this->name = $promo->name;
        $this->image = $promo->image;
        $this->start_date = $promo->start_date;
        $this->end_date = $promo->end_date;
        $this->prize_pool = $promo->prize_pool;
        $this->type = $promo->type;
        $this->game_type = $promo->game_type;
        $this->description = $promo->description;
        $this->terms = $promo->terms;
        $this->article = $promo->article;
        $this->button_name = $promo->button_name;
        $this->button_link = $promo->button_link;

        $this->questions = Question::with('choices')->where('promo_id', $this->promo_id)->get();

        //Next record
        $nextRecord = Promo::where('id', '>' , $this->promo_id)
        ->whereHas('language', function ($query) use ($lang) {
            return $query->where('code', $lang);
        })->first();

        if($nextRecord == null) {
            $nextRecordLoop = Promo::orderBy('id', 'asc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->next_record = $nextRecordLoop->name;
        } else {
            $this->next_record = $nextRecord->name;
        }

        //Previous record
        $previousRecord = Promo::where('id', '<' , $this->promo_id)->orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
        })->first();

        if($previousRecord == null) {
            $previousRecordLoop = Promo::orderBy('id', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->first();
            $this->previous_record = $previousRecordLoop->name;
        } else {
            $this->previous_record = $previousRecord->name;
        }

        
        $userId = auth()->user()->id ?? '';
        $promoId = $this->promo_id;
        // $getPromoId = Participant::with('user')->where('promo_id', $promoId)
        //     ->whereHas('user', function ($query) use ($userId)  {
        //         return $query->where('id', $userId);
        //         })->value('promo_id');
    
        $getPromoId = Participant::where('promo_id', $promoId)->where('user_id', $userId)->exists();

        //Check if user already joined promo
        if(auth()->user()) {
            // dd($getPromoId);
            if($getPromoId != null) {
                $this->joinPromo = false;
            } else {
                $this->joinPromo = true;
            }
        }

        //Get all paticipants of this promo
        // $promo = Promo::with('users')->where('id', $this->promo_id)->first();
        $this->participants = Participant::where('promo_id', $this->promo_id)->get();
        
        views($promo)->record();

    }


    //Click to Join Upload Image function
    public function uploadImage() {

        $this->validate([
            'userUploadImage' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $userID = auth()->user()->id;
        $userK8Username = auth()->user()->k8_username;
        $userName = auth()->user()->name;
        $userEmail = auth()->user()->email;
        $user = User::where('id', $userID)->first();
        
        $imageName = $this->userUploadImage->store('/', 'user');
        Participant::create([
            'user_id' => $userID,
            'promo_id' => $this->promo_id,
            'name' => $userName,
            'email' => $userEmail,
            'k8_username' => $userK8Username,
            'image' => $imageName,
            'ip' => \Request::ip(),
        ]);
        
        $user->promos()->attach($this->promo_id);

        $this->js('window.location.reload()');
        
    }



    //Click to Join Multiple Choice
    public function multipleChoice() {
        $promo = Promo::with('questions')->where('id', $this->promo_id)->first();
        $questions = $promo->questions()->pluck('question_type')->toArray();

        if(in_array('single_select',  $questions ?? []) && in_array('multiple_select',  $questions ?? [])) {
            $validate_array = ['choices' => 'required', 'sns_id' => 'required', 'checkbox' => 'required'];
            for($x=0; $x<=0; $x++) {
                $validate_array['choices.'. $x] = 'required';
            }
        }elseif(in_array('single_select', $questions ?? [])) {
            $validate_array = ['choices' => 'required', 'sns_id' => 'required'];
            if(count($questions) == 1 ) {
                $validate_array = ['choices' => 'required','sns_id' => 'required'];
            } else { 
                for($x=0; $x<=1; $x++) {
                    $validate_array['choices.'. $x] = 'required';
                }
            }
        }elseif(in_array('multiple_select', $questions ?? [])) {
            $validate_array = ['checkbox' => 'required','sns_id' => 'required'];
        }else{
            $validate_array = ['sns_id' => 'required'];
        }

        // dd($validate_array);

        $this->validate($validate_array);
        
        $userID = auth()->user()->id;
        $userName = auth()->user()->name;
        $userEmail = auth()->user()->email;
        $user = User::where('id', $userID)->first();
        
        $participant = Participant::create([
            'user_id' => auth()->user()->id,
            'promo_id' => $this->promo_id,
            'name' => $userName,
            'email' => $userEmail,
            'k8_username' => auth()->user()->k8_username,
            'sns_id' => $this->sns_id,
            'ip' => \Request::ip(),
        ]);

        foreach($this->choices as $choice) {
            $participant->choices()->attach($choice);
            // $user->choices()->attach($choice);
        }

        foreach($this->checkbox as $checkbox) {
            $participant->choices()->attach($checkbox);
        }

        if(is_array($this->messages)) {
            foreach($this->messages as $message) {
                Message::create([
                    'user_id' => auth()->user()->id,
                    'promo_id' => $this->promo_id,
                    'message' => $message
                ]);
            }
        } else {
            Message::create([
                'user_id' => auth()->user()->id,
                'promo_id' => $this->promo_id,
                'message' => $this->messages
            ]);
        }

        $user->promos()->attach($this->promo_id);

        $this->js('window.location.reload()');
    }

    //Click to Join Paste Retweet URL ////////////////////////////////////////////////////////////////////////////////////
    public function pasteRetweetURL() {
        $validate_array = [
            'sns_id' => 'required|max:255',
            'paste_retweet_url' => 'required|max:255',
        ];
        $this->validate($validate_array);

        $userID = auth()->user()->id;
        $userName = auth()->user()->name;
        $userEmail = auth()->user()->email;

        $user = User::where('id', $userID)->first();
        
        Participant::create([
            'user_id' => auth()->user()->id,
            'promo_id' => $this->promo_id,
            'name' => $userName,
            'email' => $userEmail,
            'ip' => \Request::ip(),
            'k8_username' => auth()->user()->k8_username,
            'sns_id' => $this->sns_id,
            'retweet_url' => $this->paste_retweet_url,
            'comment' => $this->comment,
        ]);
        $user->promos()->attach($this->promo_id);
        $this->js('window.location.reload()');
    }


    public function render()
    {
        $lang = app()->getLocale();

        $getPromos = Promo::where('is_visible', '1')->orderBy('created_at', 'desc')
            ->whereHas('language', function ($query) use ($lang) {
                return $query->where('code', $lang);
            })->limit(6);

        $getPlatforms = Platform::where('is_visible', '1');

        return view('livewire.home.single-promo', [
            'getPromos' => $getPromos->get(),
            'getPlatforms' => $getPlatforms->get(),
        ])->extends('layouts.home.app')->section('contents');
    }
}
