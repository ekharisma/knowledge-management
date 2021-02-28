$(document).ready(function () {
    const FILE_MANAGER = "../../helper/FileManager.php";
    $('.lihat').on('click', function () {
        const id = this.id;
        $.ajax({
            type: "get",
            url: FILE_MANAGER,
            data: { lihat: id },
            success: function (response) {
                $('.container').html(response);
            }
        });
    });

    $('.detail').on('click', function () {
        const id = this.id;
        $.ajax({
            type: "get",
            url: FILE_MANAGER,
            data: { detail: id },
            success: function (response) {
                $('.container').html(response);
            }
        });
    })

    $('.unduh').on('click', function () {
        const id = this.id;
        $.ajax({
            type: 'get',
            url: FILE_MANAGER,
            data: { unduh: id },
            success: function (response) {
                $('.container').html(response);
                console.log(response);
            }
        })
    })

    $('.hapus').on('click', function () {
        const id = this.id;
        $('.hapus_btn').on('click', function () {
            $.ajax({
                type: 'get',
                url: FILE_MANAGER,
                data: { hapus: id },
                success: function (response) {
                    $('#button-modal-preview').modal('hide');
                    location.reload();
                }
            })
        })
    })

});