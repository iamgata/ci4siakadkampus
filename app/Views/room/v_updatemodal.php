<div class="modal fade" id="updateModalRoom" tabindex="-1" aria-labelledby="updateModalRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open('room/updatesave', ['id'   => 'updateSaveRoom']) ?>

            <input type="hidden" name="id_room" value="<?php echo $roomUpdate['id_room'] ?>">

            <div class="modal-body">
                <div class="form-group">
                    <label for="nameRoom">Nama Ruangan</label>
                    <input type="text" class="form-control" id="nameRoom" name="name_room" value="<?php echo $roomUpdate['name_room'] ?>">
                    <div class="invalid-feedback" id="nameRoomFeedback"></div>
                </div>

                <div class="form-group">
                    <label for="idBuilding">Nama Gedung</label>
                    <select class="form-control" id="idBuilding" name="id_building">
                        <option value="<?php echo $roomUpdate['id_building'] ?>"><?php echo $roomUpdate['name_building'] ?></option>
                        <?php foreach ($buildingroomsUpdate as $buildingroomUpdate) : ?>
                            <option value="<?php echo $buildingroomUpdate['id_building'] ?>"><?php echo $buildingroomUpdate['name_building'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback" id="idBuildingFeedback"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="updateSaveRoomBtn">Update Ruangan</button>
            </div>
            <?php form_close() ?>

        </div>
    </div>
</div>

<script>
    $('#updateSaveRoom').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#updateSaveRoomBtn').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function() {
                $('#updateSaveRoomBtn').html('Update Ruangan')
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire(
                        'Berhasil!',
                        res.success,
                        'success'
                    );

                    $('#updateModalRoom').modal('hide');
                    getRoom();
                } else if (res.errors) {
                    if (res.errors.name_room) {
                        $('#nameRoom').addClass('is-invalid');
                        $('#nameRoomFeedback').html(res.errors.name_room)
                    }
                    if (res.errors.id_building) {
                        $('#idBuilding').addClass('is-invalid');
                        $('#idBuildingFeedback').html(res.errors.id_building)
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