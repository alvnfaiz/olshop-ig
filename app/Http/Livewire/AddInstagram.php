<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddInstagram extends Component
{
    public function render()
    {
        return view('livewire.add-instagram');
    }
    
    public $username;
    public $password;
    public $state;
 
    protected $rules = [
        'username' => 'required|min:6',
        'password' => 'required|password',
    ];
 
    public function submitInstagramAccount($value)
    {
        InstagramUser::create([
            'username' => $this->username,
            'password' => $this->password,
        ]);
    }

}
