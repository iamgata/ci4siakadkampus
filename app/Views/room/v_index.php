<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="insertRoom" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50" id="insertIconRoom">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Ruangan</span>
                    </button>
                </div>
                <div class="card-content py-3 px-4" id="viewDataRoom">

                </div>
            </div>
        </div>
    </div>

    <div id="viewModalRoom" style="display: none;"></div>

</div>

<script>
    function getRoom() {
        $.ajax({
            url: '/room/getroom',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                $('#viewDataRoom').html(res.data)
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }

    $(document).ready(function() {
        getRoom();

        $('#insertRoom').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/room/insertview',
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    $('#insertIconRoom').html(' <i class="fas fa-spin fa-spinner"></i>')
                },
                success: function(res) {
                    $('#viewModalRoom').html(res.data).show();
                    $('#insertModalRoom').modal('show');

                    $('#insertIconRoom').html(' <i class="fas fa-plus"></i>')
                },
                error: function(xhr, ajaxOption, throwError) {
                    alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
                }
            })

        })
    })
</script>

<?php echo $this->endSection() ?>