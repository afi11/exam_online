<div>
<div class="page-heading">
    <h1 class="page-title">Question</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Manage your exam questions</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Questions</div>
        </div>
        <div class="ibox-body">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <button class="btn btn-success mb-3" wire:click="openModal('add')">Add  <i class="fa fa-plus"></i> </button>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder="Search by date" wire:model="search" class="form-control" />
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Question Name</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>Option 4</th>
                        <th>Answer Key</th>
                        <th>Skor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 0; @endphp
                    @foreach($questions as $row)  @php $no++; @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $row->question_name }}</td>
                        <td>{{ $row->option_1 }}</td>
                        <td>{{ $row->option_2 }}</td>
                        <td>{{ $row->option_3 }}</td>
                        <td>{{ $row->option_4 }}</td>
                        <td>{{ $row->answer_key }}</td>
                        <td>{{ $row->skor }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="edit({{ $row->id }})"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger" wire:click="deleteConfirm({{ $row->id }})" ><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-between ml-2 mr-2">
                <div class="mt-1 mr-2">Showing {{($questions->currentpage()-1)*$questions->perpage()+1}} to {{$questions->currentpage()*$questions->perpage()}}
                    of  {{$questions->total()}} entries
                </div>
                {{ $questions->links() }}
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
                    <label>Question Name</label>
                    <input class="form-control" type="text" wire:model="question_name" />
                    @error('question_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Option 1</label>
                    <input class="form-control" type="text" wire:model="option_1" />
                    @error('option_1') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Option 2</label>
                    <input class="form-control" type="text" wire:model="option_2" />
                    @error('option_2') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Option 3</label>
                    <input class="form-control" type="text" wire:model="option_3" />
                    @error('option_3') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Option 4</label>
                    <input class="form-control" type="text" wire:model="option_4" />
                    @error('option_4') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Answer Key</label>
                    <select class="custom-select" wire:model="answer_key">
                        <option value="a">Option 1</option>
                        <option value="b">Option 2</option>
                        <option value="c">Option 3</option>
                        <option value="d">Option 4</option>
                    </select>
                    @error('answer_key') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Skor</label>
                    <input class="form-control" type="number" wire:model="skor" />
                    @error('skor') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal()">Close</button>
                @if($isEdit)
                    <button type="button" wire:click.prevent="update({{ $idQuestion }})" class="btn btn-primary">Save</button>
                @else
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
                @endif
            </div>
        </form>
    </div>
</div>
@endif
</div>