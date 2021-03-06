<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Parents as ParentModel;
use App\Models\ParentsAttatchments;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
class ShowForm extends Component
{
    use WithFileUploads;
    public
    $totalPages = 3,
    $currentPage = 1,
    $email,
    $password,
    $ar_babaname,
    $en_babaname,
    $ar_babajob,
    $en_babajob,
    $baba_id,
    $baba_passport,
    $baba_phone,
    $baba_nationality,
    $baba_bloodType,
    $baba_religions,
    $baba_address,
    $ar_mamaname,
    $en_mamaname,
    $ar_mamajob,
    $en_mamajob,
    $mama_id,
    $mama_passport,
    $mama_phone,
    $mama_nationality,
    $mama_bloodType,
    $mama_religions,
    $mama_address,
    $photos,
    $parent_id,
    $show_table = true,
    $updated_form = false;
    public function mount()
    {
        $this->currentPage = 1;
    }
    public function next()
    {
        if($this->currentPage == 1){
            $this->validate([
                'email'             => 'required|email|unique:parents,email,',
                'password'          => 'required|min:6',
                'ar_babaname'       => 'required|max:30',
                'en_babaname'       => 'required',
                'ar_babajob'        => 'required',
                'en_babajob'        => 'required',
                'baba_address'      => 'required',
                'baba_id'           => 'required|min:14|regex:/[0-9]{9}/|unique:parents,father_id,',
                'baba_passport'     => 'required|min:9|max:9|unique:parents,father_passport,',
                'baba_phone'        => 'required|min:11|max:11|regex:/[0-9]{9}/|unique:parents,father_phone,',
                'baba_religions'    => 'required',
                'baba_nationality'  => 'required',
                'baba_bloodType'    => 'required',
            ]);
        }
        if($this->currentPage == 2){

            $this->validate([
                'ar_mamaname'       => 'required',
                'en_mamaname'       => 'required',
                'ar_mamajob'        => 'required',
                'en_mamajob'        => 'required',
                'mama_address'      => 'required',
                'mama_id'           => 'required|min:14|regex:/[0-9]{9}/|unique:parents,mother_id,',
                'mama_passport'     => 'required|min:8|unique:parents,mother_passport,',
                'mama_phone'        => 'required|min:11|regex:/[0-9]{9}/|unique:parents,mother_phone,',
                'mama_religions'    => 'required',
                'mama_nationality'  => 'required',
                'mama_bloodType'    => 'required',
            ]);
        }

        $this->currentPage += 1;
    }
    public function previous()
    {
        $this->currentPage -= 1;
    }
    public function render()
    {
        return view('livewire.show-form', [
            'nationalities' => Nationality::all(),
            'bloodTypes' => BloodType::all(),
            'religions' => Religion::all(),
            'parents' => ParentModel::all()
        ]);
    }

    public function showFormadd() {
        $this->show_table = false;
    }

    protected $rules = [
        'baba_id'           => 'required|min:14|regex:/[0-9]{9}/',
        'baba_passport'     => 'required|min:9|max:9',
        'baba_phone'        => 'required|min:11|max:11|regex:/[0-9]{9}/',
        'mama_id'           => 'required|min:14|regex:/[0-9]{9}/',
        'mama_passport'     => 'required|min:8',
        'mama_phone'        => 'required|min:11|regex:/[0-9]{9}/',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function clearForm(){

        $this->email = '';
        $this->password = '';
        $this->ar_babaname = '';
        $this->en_babaname = '';
        $this->ar_babajob = '';
        $this->en_babajob = '';
        $this->ar_mamaname = '';
        $this->en_mamaname = '';
        $this->ar_mamajob = '';
        $this->en_mamajob = '';
        $this->baba_id = '';
        $this->baba_phone = '';
        $this->baba_passport = '';
        $this->mama_id = '';
        $this->mama_phone = '';
        $this->mama_passport = '';
        $this->baba_nationality = '';
        $this->baba_bloodType = '';
        $this->baba_religions = '';
        $this->mama_nationality = '';
        $this->mama_bloodType = '';
        $this->mama_religions = '';
        $this->baba_address = '';
        $this->mama_address = '';
    }
    public function submitForm()
    {
        $this->validate();
        $parent = new ParentModel();
        $parent->email = $this->email;
        $parent->password = Hash::make($this->password);
        $parent->father_name = ['ar' => $this->ar_babaname, 'en' => $this->en_babaname];
        $parent->father_job = ['ar' => $this->ar_babajob, 'en' => $this->en_babajob];
        $parent->mother_name = ['ar' => $this->ar_mamaname, 'en' => $this->en_mamaname];
        $parent->mother_job = ['ar' => $this->ar_mamajob, 'en' => $this->en_mamajob];
        $parent->father_id = $this->baba_id;
        $parent->father_phone = $this->baba_phone;
        $parent->father_passport = $this->baba_passport;
        $parent->mother_id = $this->mama_id;
        $parent->mother_phone = $this->mama_phone;
        $parent->mother_passport = $this->mama_passport;
        $parent->father_nationality_id = $this->baba_nationality;
        $parent->father_bloodType_id  = $this->baba_bloodType;
        $parent->father_religion_id  = $this->baba_religions;
        $parent->mother_nationality_id = $this->mama_nationality;
        $parent->mother_bloodType_id  = $this->mama_bloodType;
        $parent->mother_religion_id  = $this->mama_religions;
        $parent->father_address  = $this->baba_address;
        $parent->mother_address  = $this->mama_address;
        $parent->save();
        if(!empty($this->photos)){
            foreach($this->photos as $photo){
                $photo->storeAs($this->baba_id, $photo->getClientOriginalName(), $disk = 'parent_attachements');
                ParentsAttatchments::create([
                    'file_name' => $photo->getClientOriginalName(),
                    'parent_id' => $parent->id
                ]);
            }
        }
        $this->successMsg = trans('site.added_successfully');
        $this->clearForm();
        $this->currentPage = 1;
    }

    public function edit($id) {
        $this->show_table = false;
        $this->updated_form = true;
        $parent = ParentModel::find($id);
        $this->email = $parent->email;
        $this->parent_id = $id;
        $this->password = $parent->password;
        $this->ar_babaname = $parent->setLocale('ar')->father_name;
        $this->en_babaname =  $parent->setLocale('en')->father_name;
        $this->ar_babajob =  $parent->setLocale('ar')->father_job;
        $this->en_babajob =  $parent->setLocale('en')->father_job;
        $this->ar_mamaname = $parent->setLocale('ar')->mother_name;
        $this->en_mamaname =  $parent->setLocale('en')->mother_name;
        $this->ar_mamajob = $parent->setLocale('ar')->mother_job;
        $this->en_mamajob = $parent->setLocale('en')->mother_job;
        $this->baba_id = $parent->father_id;
        $this->baba_phone = $parent->father_phone;
        $this->baba_passport = $parent->father_passport;
        $this->mama_id = $parent->mother_id;
        $this->mama_phone = $parent->mother_phone;
        $this->mama_passport = $parent->mother_passport;
        $this->baba_nationality = $parent->father_nationality_id ;
        $this->baba_bloodType = $parent->father_bloodType_id ;
        $this->baba_religions = $parent->father_religion_id ;
        $this->mama_nationality = $parent->mother_nationality_id ;
        $this->mama_bloodType = $parent->mother_bloodType_id ;
        $this->mama_religions = $parent->mother_religion_id ;
        $this->baba_address = $parent->father_address;
        $this->mama_address = $parent->mother_address;
        if(!empty($this->photos)){
            foreach($this->photos as $photo){
                $photo->storeAs($this->baba_id, $photo->getClientOriginalName(), $disk = 'parent_attachements');
                ParentsAttatchments::create([
                    'file_name' => $photo->getClientOriginalName(),
                    'parent_id' => $parent->id
                ]);
            }
        }
        $this->validate();

    }


    public function nextEdit()
    {
        $this->updateMode = true;
        $this->currentPage += 1;
    }
    public function previousEdit()
    {
        $this->updateMode = true;
        $this->currentPage -= 1;
    }
    public function submitFormEdit()
    {
        if($this->parent_id){
            $parent = ParentModel::find($this->parent_id);
            $parent->update([
                'email' => $this->email,
                'father_name' => ['ar' => $this->ar_babaname, 'en' => $this->en_babaname],
                'father_job' => ['ar' => $this->ar_babajob, 'en' => $this->en_babajob],
                'mother_name' => ['ar' => $this->ar_mamaname, 'en' => $this->en_mamaname],
                'mother_job' => ['ar' => $this->ar_mamajob, 'en' => $this->en_mamajob],
                'password' => Hash::make($this->password),
                'father_id' => $this->baba_id,
                'father_phone' => $this->baba_phone,
                'father_passport' => $this->baba_passport,
                'mother_id' => $this->mama_id,
                'mother_phone' => $this->mama_phone,
                'mother_passport' => $this->mama_passport,
                'father_nationality_id' => $this->baba_nationality,
                'father_bloodType_id' => $this->baba_bloodType,
                'father_religion_id' => $this->baba_religions,
                'mother_nationality_id' => $this->mama_nationality,
                'mother_bloodType_id' => $this->mama_bloodType,
                'mother_religion_id' => $this->mama_religions,
                'father_address' => $this->baba_address,
                'mother_address' => $this->mama_address,
            ]);
        }
        $this->successMsg = trans('site.updated_successfully');
        return redirect()->to('/parents');
    }

    public function delete($id) {
        $parent = ParentModel::find($id)->delete();
        return redirect()->to('/parents');
    }
}
