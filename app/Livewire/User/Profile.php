<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $name;
    public $email;
    public $password_lama;
    public $password_baru;
    public $password_baru_confirmation;

    protected $rules = [
        'name'                      => 'required|max:255',
        'email'                     => 'required|email|max:255',
        'password_lama'             => 'nullable',
        'password_baru'             => 'nullable|min:8|confirmed',
    ];

    public function mount()
    {
        $user = auth()->user();
        $this->name  = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $this->validate();

        $user = auth()->user();

        if ($this->password_baru) {
            if (!Hash::check($this->password_lama, $user->password)) {
                $this->addError('password_lama', 'Password lama tidak sesuai.');
                return;
            }
        }

        $data = [
            'name'  => $this->name,
            'email' => $this->email,
        ];

        if ($this->password_baru) {
            $data['password'] = Hash::make($this->password_baru);
        }

        User::whereId($user->id)->update($data);

        $this->reset(['password_lama', 'password_baru', 'password_baru_confirmation']);
        session()->flash('success', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
