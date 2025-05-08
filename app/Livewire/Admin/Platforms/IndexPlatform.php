<?php

namespace App\Livewire\Admin\Platforms;

use App\Models\Platform;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPlatform extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search;
    public $pagination = 10;
    public $platform_id;

    public function deletePlatform(int $platform_id) {
        $this->platform_id = $platform_id;
    }

    public function destroyPlatform() {
        Platform::find($this->platform_id)->delete();

        $this->dispatch('deleted', [
            'title' => 'Deleted',
            'text' => 'Record deleted successfully',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        if(!$this->search) {
            $platforms = Platform::orderBy('created_at', 'desc')->paginate($this->pagination);
        } else {
            $platforms = Platform::where('name', 'like' , '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.admin.platforms.index-platform', compact('platforms'))
            ->extends('layouts.admin.app')->section('contents');
    }

}
