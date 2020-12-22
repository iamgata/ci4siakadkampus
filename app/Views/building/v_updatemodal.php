<div class="modal fade" id="updateModalBuilding" tabindex="-1" aria-labelledby="updateModalBuildingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gedung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open('building/updatesave', ['id'   => 'updatesaveBuilding']) ?>
            <input type="hidden" name="id_building" value="<?php echo $buildingUpdate['id_building'] ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nameBuilding">Nama Gedung</label>
                    <input type="text" class="form-control" id="nameBuilding" name="name_building" value="<?php echo $buildingUpdate['name_building'] ?>">
                    <div class="invalid-feedback" id="nameBuildingFeedback"></div>
                </div>
                <div class="form-group">
                    <label for="acronimBuilding">Akronim Gedung</label>
                    <input type="text" class="form-control" id="acronimBuilding" name="acronim_building" value="<?php echo $buildingUpdate['acronim_building'] ?>">
                    <div class="invalid-feedback" id="acronimBuildingFeedback"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="updatesaveBuildingBtn">Update Gedung</button>
            </div>
            <?php form_close() ?>

        </div>
    </div>
</div>

<script>
    $('#updatesaveBuilding').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#updatesaveBuildingBtn').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function() {
                $('#updatesaveBuildingBtn').html('Update Gedung')
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire(
                        'Berhasil!',
                        res.success,
                        'success'
                    );

                    $('#updateModalBuilding').modal('hide');
                    getBuilding();
                } else if (res.errors) {
                    if (res.errors.name_building) {
                        $('#nameBuilding').addClass('is-invalid');
                        $('#nameBuildingFeedback').html(res.errors.name_building)
                    }
                    if (res.errors.acronim_building) {
                        $('#nameBuilding').addClass('is-invalid');
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