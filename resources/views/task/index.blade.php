@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="ml-2">Lista de Tareas</h4>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary float-right" id="createNewTask"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <table id="tableTasks" class="table table-borderless data-table">
                        <tbody id="tablaBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="crudModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="motalTitle"></h4>
            </div>
            <div id="ModalBody" class="modal-body">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteMotalTitle">Borrar registro</h4>
            </div>
            <div id="ModalBody" class="modal-body">
                <p>¿Está seguro que desea borrar el registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelete">Borrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<style>
.table td {
    font-size: 18px;
}

#tableTasks td:nth-child(2) {
    width: 10%;
}

.text-decoration {
    text-decoration: line-through;
}
</style>

@endsection

@push('js')
<script type="text/javascript">
$(function() {
    
    $('.data-table').DataTable({
        dom: 'rt',
        processing: true,
        serverSide: true,
        searching: false,
        info: false,
        ordering: false,
        bFilter: false,
        bInfo: false,
        ajax: {
            url: "{{ route('tasks.fetch-data') }}",
            type: "POST"
        },
        method: 'POST',
        columns: [{
                data: 'description',
                name: 'description'
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            },
        ],
        drawCallback: function(settings) {

            $('.editTask').on('click', function(e) {
                
                const url = "{{ route('tasks.edit', ['id' => ':id']) }}".replace(':id', $(
                    this).data('id'));
                const method = 'GET';

                const crudModal = $('#crudModal');
                const addContentSelector = $("#ModalBody");
                const modalTitle = $('#motalTitle');

                $.ajax({
                    url: url,
                    method: method,
                }).done(function(data, textStatus, jqXHR) {
                    modalTitle.html('Editar tarea');

                    toggleModal(crudModal);

                    // Clear selector 
                    addContentSelector.html('');

                    // Load html into selector
                    addContentSelector.html(data.html);

                }).fail(function(result, textStatus, errorThrown) {
                    let errors =
                        'No ha sido posible cargar la información. Por favor intentelo en unos mintutos.';

                    if (result.responseJSON.message) {
                        errors = result.responseJSON.message;
                    }

                    // Display warning message
                    displayMessage('center', 'warning', errors, 2000);
                });
            });

            $('.deleteTask').on('click', function(e) {
                const url = "{{ route('tasks.delete', ['id' => ':id']) }}".replace(':id', $(
                    this).data('id'));
                const method = 'DELETE';

                const deleteModal = $('#deleteModal');
                const deleteModalTitle = $('#deleteMotalTitle');
                const btnDelete = $('#btnDelete');

                deleteModalTitle.html('Borrar tarea');

                toggleModal(deleteModal);

                btnDelete.on('click', function(e) {
                    $.ajax({
                        url: url,
                        method: method,
                    }).done(function(data, textStatus, jqXHR) {
                        // Display success message
                        displayMessage('center', 'success', data.message, 2000);

                        // Reload data table
                        $('.data-table').DataTable().ajax.reload();

                        // Close modal
                        toggleModal(deleteModal);

                    }).fail(function(result, textStatus, errorThrown) {
                        let errors =
                            'No ha sido posible cargar la información. Por favor intentelo en unos mintutos.';

                        if (result.responseJSON.message) {
                            errors = result.responseJSON.message;
                        }

                        // Display warning message
                        displayMessage('center', 'warning', errors, 2000);
                    });
                });
            });

            $('.checkboxTaskTeady').on('click', function(e){
                const idTaks = $(this).data('id');
                
                if($(this).is(':checked')){
                    $(`#${idTaks}`).addClass('text-decoration');
                }else{
                    $(`#${idTaks}`).removeClass('text-decoration');
                }

                const url = "{{ route('tasks.ready-task', ['id' => ':id']) }}".replace(':id', idTaks);
                const method = 'POST';

                $.ajax({
                    url: url,
                    method: method,
                }).done(function(data, textStatus, jqXHR) {
                    // Display success message
                    displayMessage('center', 'success', data.message, 2000);

                    // Reload data table
                    $('.data-table').DataTable().ajax.reload();

                }).fail(function(result, textStatus, errorThrown) {
                    let errors =
                        'No ha sido posible cargar la información. Por favor intentelo en unos mintutos.';

                    if (result.responseJSON.message) {
                        errors = result.responseJSON.message;
                    }

                    // Display warning message
                    displayMessage('center', 'warning', errors, 2000);
                });

            });
        }
    });

    $('#createNewTask').on('click', function(e) {
        const url = "{{ route('tasks.create') }}";
        const method = 'GET';

        const crudModal = $('#crudModal');
        const addContentSelector = $("#ModalBody");
        const modalTitle = $('#motalTitle');

        $.ajax({
            url: url,
            method: method,
        }).done(function(data, textStatus, jqXHR) {
            modalTitle.html('Nueva tarea');

            toggleModal(crudModal);

            // Clear selector 
            addContentSelector.html('');

            // Load html into selector
            addContentSelector.html(data.html);

        }).fail(function(result, textStatus, errorThrown) {
            let errors =
                'No ha sido posible cargar la información. Por favor intentelo en unos mintutos.';

            if (result.responseJSON.message) {
                errors = result.responseJSON.message;
            }

            // Display warning message
            displayMessage('center', 'warning', errors, 2000);
        });
    });

});
</script>
@endpush
