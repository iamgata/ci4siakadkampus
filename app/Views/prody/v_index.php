<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="insertPrody" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50" id="insertIconPrody">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Prodi</span>
                    </button>
                </div>
                <div class="card-content py-3 px-4" id="viewDataPrody">

                </div>
            </div>
        </div>
    </div>

    <div id="viewModalPrody" style="display: none;"></div>

</div>


<script>
    function getPrody() {
        $.ajax({
            url: '/prody/getprody',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                $('#viewDataPrody').html(res.data);
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }

    $(document).ready(function() {
        getPrody();

        $('#insertPrody').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/prody/insertview',
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    $('#insertIconPrody').html(' <i class="fas fa-spin fa-spinner"></i>')
                },
                success: function(res) {
                    $('#viewModalPrody').html(res.data).show();
                    $('#insertModalPrody').modal('show');

                    $('#insertIconPrody').html(' <i class="fas fa-plus"></i>')
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