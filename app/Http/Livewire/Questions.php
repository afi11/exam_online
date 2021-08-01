<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;

class Questions extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['destroy'];
    public $search, $question_name, $option_1, $option_2, $option_3, $option_4, $answer_key, $skor, $idQuestion;
    public $isEdit = false, $title, $isModal = false;

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        $questions = Question::where('question_name','like','%'.$searchTerm.'%')->paginate(10);
        return view('livewire.questions', ['questions' => $questions]);
    }

    public function openModal($tipe){
        $this->isModal = true;
        $this->isEdit = false;
        if($tipe == "add") $this->title = "Add Questions";
        else $this->title = "Edit Questions";
    }

    public function closeModal(){
        $this->isModal = false;
        $this->isEdit = false;
    }

    public function resetFields()
    {
        $this->idQuestion = '';
        $this->question_name = '';
        $this->option_1 = '';
        $this->option_2 = '';
        $this->option_3 = '';
        $this->option_4 = '';
        $this->answer_key = '';
        $this->skor = '';
    }

    public function alertSuccess($message)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Successfully!', 
            'text' => $message
        ]);
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',  
            'message' => 'Are you sure?', 
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'id' => $id
        ]);
    }

    public function store()
    {
        $validateData = $this->validate([
            'question_name' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'answer_key' => 'required',
            'skor' => 'required|numeric',
        ]); 
        Question::create($validateData);
        $this->resetFields();
        $this->closeModal();
        $this->alertSuccess('Successfully to add new record');
    }

    public function edit($id)
    {
        $this->openModal('edit');
        $this->isEdit = true;
        $question = Question::find($id);
        $this->idQuestion = $question->id;
        $this->question_name = $question->question_name;
        $this->option_1 = $question->option_1;
        $this->option_2 = $question->option_2;
        $this->option_3 = $question->option_3;
        $this->option_4 = $question->option_4;
        $this->answer_key = $question->answer_key;
        $this->skor = $question->skor;
    }

    public function update($id)
    {
        $question = Question::find($id);
        $question->question_name = $this->question_name;
        $question->option_1 = $this->option_1;
        $question->option_2 = $this->option_2;
        $question->option_3 = $this->option_3;
        $question->option_4 = $this->option_4;
        $question->answer_key = $this->answer_key;
        $question->skor = $this->skor;
        $question->save();
        $this->resetFields();
        $this->closeModal();
        $this->alertSuccess('Successfully to edit new record');
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        $this->alertSuccess('Successfully to delete record');
    }

}
