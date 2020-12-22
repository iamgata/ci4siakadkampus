<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="insertBuilding" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50" id="insertIconBuilding">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Gedung</span>
                    </button>
                </div>
                <div class="card-content py-3 px-4" id="viewDataBuilding">

                </div>
            </div>
        </div>
    </div>

    <div id="viewModalBuilding" style="display: none;"></div>

</div>
<script>
    function getBuilding() {
        $.ajax({
            url: '/building/getbuilding',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                $('#viewDataBuilding').html(res.data)
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }

    $(document).ready(function() {
        getBuilding();

        $('#insertBuilding').click(function() {
            $.ajax({
                url: '/building/insertview',
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    $('#insertIconBuilding').html(' <i class="fas fa-spin fa-spinner"></i>')
                },
                success: function(res) {
                    $('#viewModalBuilding').html(res.data).show();
                    $('#insertModalBuilding').modal('show');

                    $('#insertIconBuilding').html('<i class="fas fa-plus"></i> ');
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