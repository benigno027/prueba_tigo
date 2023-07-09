<form id="editForm" name="editForm" class="form-horizontal">
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Descripción</label>
        <div class="col-sm-12">
            <textarea class="form-control" id="description" name="description" rows="5">{{ $task->description }}</textarea>
        </div>
    </div>

</form>

<div class="col-sm-offset-2 col-sm-12 d-flex flex-row justify-content-end">
    
    <button type="button" class="btn btn-success mr-2" id="editBtn">
        <i class="fa fa-save"></i> Guardar
    </button>

    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fa fa-times"></i> Cancelar
    </button>

</div>

<script>
    $('#editBtn').click(function (e) {
        
        $.ajax({
            data: $('#editForm').serialize(),
            url: "{{ route('tasks.update', ['id' => $task->id]) }}",
            type: "PATCH",
            dataType: 'json',
        }).done(function(data, textStatus, jqXHR)
        {
            $('#editForm').trigger("reset");

            $('#crudModal').modal('hide');

            displayMessage('center', 'success', 'Tarea actualizada correctamente', 2000);

            $('.data-table').DataTable().ajax.reload(null, false);

        }).fail(function(result, textStatus, errorThrown) 
        {
            let errors = 'No ha sido posible cargar la información. Por favor intentelo en unos mintutos.';
            
            if (result.responseJSON.message) 
            {
                errors = result.responseJSON.message;
            }

            // Display warning message
            displayMessage('center', 'warning', errors, 2000);
        });
    });
</script>