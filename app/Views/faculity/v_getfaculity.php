<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Fakultas</th>
            <th>Akronim Fakultas</th>
            <th>#</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;
        foreach ($faculities as $faculity) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $faculity['name_faculity'] ?></td>
                <td><?php echo $faculity['acronim_faculity'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $faculity['id_faculity'] ?>')">
                        <i class="fa fa-pen-alt"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $faculity['id_faculity'] ?>')">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    function update(id) {
        $.ajax({
            url: '/faculity/updateview',
            type: 'post',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(res) {
                $('#viewModalFaculity').html(res.data).show();
                $('#updateModal').modal('show');
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }

    function remove(id) {
        $.ajax({
            url: '/faculity/remove',
            type: 'post',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire(
                        'Berhasil!',
                        res.success,
                        'success'
                    );
                }

                getFaculity();
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }
</script>