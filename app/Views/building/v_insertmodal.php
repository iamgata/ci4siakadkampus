<div class="modal fade" id="insertModalBuilding" tabindex="-1" aria-labelledby="insertModalBuildingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gedung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open('building/insertsave', ['id'   => 'insertSaveBuilding']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nameBuilding">Nama Gedung</label>
                    <input type="text" class="form-control" id="nameBuilding" name="name_building">
                    <div class="invalid-feedback" id="nameBuildingFeedback"></div>
                </div>
                <div class="form-group">
                    <label for="acronimBuilding">Akronim Gedung</label>
                    <input type="text" class="form-control" id="acronimBuilding" name="acronim_building">
                    <div class="invalid-feedback" id="acronimBuildingFeedback"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="insertSaveBuildingBtn">Tambah Gedung</button>
            </div>
            <?php form_close() ?>

        </div>
    </div>
</div>

<script>
    $('#insertSaveBuilding').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#insertSaveBuildingBtn').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function() {
                $('#insertSaveBuildingBtn').html('Tambah Gedung')
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire(
                        'Berhasil!',
                        res.success,
                        'success'
                    );

                    $('#insertModalBuilding').modal('hide');
                    getBuilding();
                } else if (res.errors) {
                    if (res.errors.name_building) {
                        $('#nameBuilding').addClass('is-invalid');
                        $('#nameBuildingFeedback').html(res.errors.name_building)
                    }

                    if (res.errors.acronim_building) {
                        $('#acronimBuilding').addClass('is-invalid');
                        $('#acronimBuildingFeedback').html(res.errors.acronim_building)
                    }
                }
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }

        })

    })
</script>