<?php

class FileManager
{
    public static function lihat($id)
    {
        require_once('../config/db_sql.php');
        $sql = "SELECT tb_berkas.file FROM tb_berkas, tb_jenis WHERE tb_berkas.id_jenis = tb_jenis.id_jenis AND tb_berkas.id_berkas = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $lihat = $stmt->get_result()->fetch_assoc();
        echo "<iframe width=480 height=480 src=../../uploads/" . $lihat['file'] . " frameborder=0 allowfullscreen></iframe>";
        $stmt->close();
        $mysqli->close();
    }

    public static function detail($id)
    {
        require_once('../config/db_sql.php');
        $sql = 'SELECT tb_berkas.nama, tb_berkas.file, tb_berkas.deskripsi, tb_berkas.ukuran, tb_berkas.jam, tb_jenis.jenis FROM tb_berkas, tb_jenis WHERE tb_berkas.id_jenis = tb_jenis.id_jenis AND tb_berkas.id_berkas = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $detail = $stmt->get_result()->fetch_assoc();
        echo "
        <div class='overflow-x-auto'>
        <table class='table'>
            <tbody>
                <tr class='bg-gray-200 dark:bg-dark-1'>
                    <td class='border-b dark:border-dark-5'>Nama</td>
                    <td class='border-b dark:border-dark-5'>" . $detail['nama'] . "</td>
                </tr>
                <tr>
                    <td class='border-b dark:border-dark-5'>Nama File</td>
                    <td class='border-b dark:border-dark-5'>" . $detail['file'] . "</td>
                </tr>
                <tr class='bg-gray-200 dark:bg-dark-1'>
                    <td class='border-b dark:border-dark-5'>Deskripsi</td>
                    <td class='border-b dark:border-dark-5'>" . $detail['deskripsi'] . "</td>
                </tr>
                <tr class='bg-gray-200 dark:bg-dark-1'>
                    <td class='border-b dark:border-dark-5'>Tanggal Upload</td>
                    <td class='border-b dark:border-dark-5'>" . $detail['jam'] . "</td>
                </tr>              
            </tbody>
        </table>
        <a href = '/uploads/" . $file ." download>Download disini</a>
    </div>
        ";
        $stmt->close();
        $mysqli->close();
    }

    public static function hapus($id)
    {
        require_once('../config/db_sql.php');
        $sql = "DELETE FROM tb_berkas WHERE id_berkas = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        echo "
        <div class='p-5 text-center'> <i data-feather='check-circle' class='w-16 h-16 text-theme-9 mx-auto mt-3'></i>
            <div class='text-3xl mt-5'>Sukses</div>
            <div class='text-gray-600 mt-2'>File telah terhapus</div>
        </div>
        <div class='px-5 pb-8 text-center'> <button type='button' data-dismiss='modal' class='button w-24 bg-theme-1 text-white'>Tutup</button> </div>
        ";

    }
}

if ($_GET['lihat']) {
    FileManager::lihat($_GET['lihat']);
    unset($_GET['lihat']);
}

if ($_GET['detail']) {
    FileManager::detail($_GET['detail']);
    unset($_GET['detail']);
}


if ($_GET['hapus']) {
    FileManager::hapus($_GET['hapus']);
    unset($_GET['hapus']);
}
