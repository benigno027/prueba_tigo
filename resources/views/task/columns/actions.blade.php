<div class="d-flex align-items-center">
    
    <button class="deleteTask btn btn-danger" data-id="{{ $data->id }}">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>

    <button id="" class="editTask btn btn-warning ml-3 mr-3" data-id="{{ $data->id }}">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>

    <div class="d-flex align-items-center">
        @if($data->ready)
            <input style="zoom:1.5;" class="checkboxTaskTeady" type="checkbox" checked data-id="{{ $data->id }}">
        @else
            <input style="zoom:1.5;" class="checkboxTaskTeady" type="checkbox" data-id="{{ $data->id }}">
        @endif
    </div>

</div>
