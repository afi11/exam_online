<div>
    <div class="page-heading">
        <h1 class="page-title">Schedules</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Manage your exam schedule</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Schedules</div>
            </div>
            <div class="ibox-body">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <button class="btn btn-success mb-3" wire:click="openModal('add')">Add <i class="fa fa-plus"></i> </button>
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="Search by date" wire:model="search" class="form-control" />
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Time Start</th>
                            <th>Duration (minute)</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0; @endphp
                        @foreach($schedules as $row)  @php $no++; @endphp
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $row->day }}</td>
                            <td>{{ $row->time_start }}</td>
                            <td>{{ $row->duration }}</td>
                            <td>{{ $row->desc }}</td>
                            <td>
                                <button class="btn btn-primary" wire:click="edit({{ $row->id }})"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger" wire:click="deleteConfirm({{ $row->id }})" ><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-between ml-2 mr-2">
                    <div class="mt-1 mr-2">Showing {{($schedules->currentpage()-1)*$schedules->perpage()+1}} to {{$schedules->currentpage()*$schedules->perpage()}}
                        of  {{$schedules->total()}} entries
                    </div>
                    {{ $schedules->links() }}
                </div>
            </div>
        </div>
    </div>
  
    <!-- Modal -->
    @if($isModal)
    <div class="modal-crud">
        <div class="modal-crud-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">{{ $title }}</h5>
            <button type="button" class="close" wire:click="closeModal()">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="submit">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Date</label>
                        <input class="form-control" type="date" wire:model="day" />
                        @error('day') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Time Start</label>
                        <input class="form-control" type="time" wire:model="time_start" />
                        @error('time_start') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input class="form-control" type="text" wire:model="duration" />
                        @error('duration') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" wire:model="desc" />
                        @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()">Close</button>
                    @if($isEdit)
                        <button type="button" wire:click.prevent="update({{ $idSchedule }})" class="btn btn-primary">Save</button>
                    @else
                        <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    @endif
</div>