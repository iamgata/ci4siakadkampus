<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Gedung</th>
            <th>Akronim Gedung</th>
            <th>#</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;
        foreach ($buildings as $building) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $building['name_building'] ?></td>
                <td><?php echo $building['acronim_building'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $building['id_building'] ?>')">
                        <i class="fa fa-pen-alt"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $building['id_building'] ?>')">
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
            url: '/building/updateview',
            type: 'post',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(res) {
                $('#viewModalBuilding').html(res.data).show();
                $('#updateModalBuilding').modal('show');
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
            url: '/building/remove',
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

                getBuilding();
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }
</script>