<form id="createForm" name="createForm" class="form-horizontal">
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Descripción</label>
        <div class="col-sm-12">
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
    </div>
    
</form>

<div class="col-sm-offset-2 col-sm-12 d-flex flex-row justify-content-end">
    
    <button type="button" class="btn btn-success mr-2" id="saveBtn">
        <i class="fa fa-save"></i> Guardar
    </button>

    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fa fa-times"></i> Cancelar
    </button>

</div>

<script>
    $('#saveBtn').click(function (e) {
        
        $.ajax({
            data: $('#createForm').serialize(),
            url: "{{ route('tasks.store') }}",
            type: "POST",
            dataType: 'json',
        }).done(function(data, textStatus, jqXHR)
        {
            $('#createForm').trigger("reset");

            $('#crudModal').modal('hide');

            displayMessage('center', 'success', 'Tarea agregada correctamente', 2000);

            // Reload table
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