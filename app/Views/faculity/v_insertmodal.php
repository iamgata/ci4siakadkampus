<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open('faculity/insertsave', ['id'   => 'insertSaveFaculity']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nameFaculity">Nama Fakultas</label>
                    <input type="text" class="form-control" id="nameFaculity" name="name_faculity">
                    <div class="invalid-feedback" id="nameFaculityFeedback"></div>
                </div>
                <div class="form-group">
                    <label for="acronimFaculity">Akronim Fakultas</label>
                    <input type="text" class="form-control" id="acronimFaculity" name="acronim_faculity">
                    <div class="invalid-feedback" id="acronimFaculityFeedback"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="insertSaveFaculityBtn">Tambah Fakultas</button>
            </div>
            <?php form_close() ?>

        </div>
    </div>
</div>

<script>
    $('#insertSaveFaculity').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#insertSaveFaculityBtn').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function() {
                $('#insertSaveFaculityBtn').html('Tambah Fakultas')
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire(
                        'Berhasil!',
                        res.success,
                        'success'
                    );

                    $('#insertModal').modal('hide');
                    getFaculity();

                } else if (res.errors) {
                    if (res.errors.name_faculity) {
                        $('#nameFaculity').addClass('is-invalid');
                        $('#nameFaculityFeedback').html(res.errors.name_faculity)
                    }
                    if (res.errors.acronim_faculity) {
                        $('#acronimFaculity').addClass('is-invalid');
                        $('#acronimFaculityFeedback').html(res.errors.acronim_faculity)
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