<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="insertFaculity" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50" id="insertIconFaculity">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Fakultas</span>
                    </button>
                </div>
                <div class="card-content py-3 px-4" id="viewDataFaculity">

                </div>
            </div>
        </div>
    </div>

    <div id="viewModalFaculity" style="display: none;"></div>

</div>

<script>
    function getFaculity() {
        $.ajax({
            url: '/faculity/getfaculity',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                $('#viewDataFaculity').html(res.data);
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }

    $(document).ready(function() {
        getFaculity();

        $('#insertFaculity').click(function() {
            $.ajax({
                url: '/faculity/insertview',
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    $('#insertIconFaculity').html(' <i class="fas fa-spin fa-spinner"></i>')
                },
                success: function(res) {
                    $('#viewModalFaculity').html(res.data).show();
                    $('#insertModal').modal('show');

                    $('#insertIconFaculity').html(' <i class="fas fa-plus"></i>')
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