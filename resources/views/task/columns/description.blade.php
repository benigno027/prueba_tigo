@if($data->ready)
    <i class="fa fa-plus mr-2" aria-hidden="true"></i> <span class="text-decoration" id="{{ $data->id }}">{{ $data->description }}</span>
@else
    <i class="fa fa-plus mr-2" aria-hidden="true"></i> <span id="{{ $data->id }}">{{ $data->description }}</span>
@endif