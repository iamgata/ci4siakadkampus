<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ruangan</th>
            <th>Nama Gedung</th>
            <th>#</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;
        // dd($rooms);
        foreach ($rooms as $room) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $room['name_room'] ?></td>
                <td><?php echo $room['name_building'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $room['id_room'] ?>')">
                        <i class="fa fa-pen-alt"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $room['id_room'] ?>')">
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
            url: '/room/updateview',
            type: 'post',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(res) {
                $('#viewModalRoom').html(res.data).show();
                $('#updateModalRoom').modal('show');
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
            url: '/room/remove',
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

                getRoom();
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
        })
    }
</script>