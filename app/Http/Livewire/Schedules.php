<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use Livewire\WithPagination;

class Schedules extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['destroy'];
    public $search, $day, $time_start, $duration, $desc, $idSchedule;
    public $isEdit = false, $title, $isModal = false;

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        $schedules = Schedule::where('day','like',$searchTerm)->paginate(5);
        return view('livewire.schedules',['schedules' => $schedules]);
    }


    public function openModal($tipe){
        $this->isModal = true;
        $this->isEdit = false;
        if($tipe == "add") $this->title = "Add Schedule";
        else $this->title = "Edit Schedule";
    }

    public function closeAlert()
    {
        $this->isAlert = false;
    }

    public function closeModal(){
        $this->isModal = false;
        $this->isEdit = false;
    }

    public function resetFields()
    {
        $this->idSchedule = '';
        $this->day = '';
        $this->time_start = '';
        $this->duration = '';
        $this->desc = '';
    }

    public function store()
    {
        $validateData = $this->validate([
            'day' => 'required',
            'time_start' => 'required',
            'duration' => 'required',
            'desc' => 'required'
        ]);
        Schedule::create($validateData);
        $this->resetFields();
        $this->closeModal();
        $this->alertSuccess('Successfully to add new record');
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $this->idSchedule = $schedule->id;
        $this->day = $schedule->day;
        $this->time_start = $schedule->time_start;
        $this->duration = $schedule->duration;
        $this->desc = $schedule->desc;
        $this->openModal('edit');
        $this->isEdit = true;
    }

    public function update($id)
    {
        $schedule = Schedule::find($id);
        $schedule->day = $this->day ;
        $schedule->time_start = $this->time_start;
        $schedule->duration = $this->duration;
        $schedule->desc = $this->desc;
        $schedule->save();
        $this->resetFields();
        $this->closeModal();
        $this->alertSuccess('Successfully to edit new record');
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

    public function alertSuccess($message)
    {
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Successfully!', 
                'text' => $message
            ]);
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        $this->alertSuccess('Successfully to delete record');
    }
}
