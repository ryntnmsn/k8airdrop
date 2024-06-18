<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::orderBy('role', 'desc')->orderBy('created_at', 'desc')->paginate(30);
        return view('livewire.admin.users.users-index', [
            'users' => $users
        ])->extends('layouts.admin.app')->section('contents');
    }
}
