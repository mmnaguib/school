<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowForm extends Component
{
    public $email,
    $password,
    $ar_mamaname,
    $en_mamaname,
    $ar_babaname,
    $en_babaname,
    $ar_babajob,
    $en_babajob,
    $ar_mamajob,
    $en_mamajob,
    $mama_id,
    $mama_passport,
    $mama_phone,
    $mama_nationality,
    $mama_bloodType,
    $mama_religions,
    $mama_address,
    $baba_id,
    $baba_passport,
    $baba_phone,
    $baba_nationality,
    $baba_bloodType,
    $baba_religions,
    $baba_address,
    $totalPages = 3,
    $currentPage = 1;
    public function mount()
    {
        $this->currentPage = 1;
    }
    public function next()
    {
        $this->currentPage += 1;
    }
    public function previous()
    {
        $this->currentPage -= 1;
    }
    public function render()
    {
        return view('livewire.show-form');
    }
}
