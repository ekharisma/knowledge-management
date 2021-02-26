<?php

class FileManager
{
    public static function lihat($id)
    {
    }

    public static function detail($id)
    {
        require_once('../config/db_sql.php');
        $sql = 'SELECT tb_berkas.nama, tb_berkas.file, tb_berkas.deskripsi, tb_berkas.ukuran, tb_berkas.jam, tb_jenis.jenis FROM tb_berkas, tb_jenis WHERE tb_berkas.id_jenis = tb_jenis.id_jenis AND tb_berkas.id_berkas = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $detail = $stmt->get_result()->fetch_assoc();
        foreach($detail as $row) {
            echo "
            <div class='overflow-x-auto'>
            <table class='table'>
                <tbody>
                    <tr class='bg-gray-200 dark:bg-dark-1'>
                        <td class='border-b dark:border-dark-5'>1</td>
                        <td class='border-b dark:border-dark-5'>Angelina</td>
                    </tr>
                    <tr>
                        <td class='border-b dark:border-dark-5'>2</td>
                        <td class='border-b dark:border-dark-5'>Brad</td>
                    </tr>
                    <tr class='bg-gray-200 dark:bg-dark-1'>
                        <td class='border-b dark:border-dark-5'>3</td>
                        <td class='border-b dark:border-dark-5'>Charlie</td>
                    </tr>
                </tbody>
            </table>
        </div>
            ";
        }
    }

    public static function unduh($id)
    {
    }

    public static function hapus($id)
    {
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

if ($_GET['unduh']) {
    FileManager::unduh($_GET['unduh']);
    unset($_GET['unduh']);
}

if ($_GET['hapus']) {
    FileManager::hapus($_GET['hapus']);
    unset($_GET['hapus']);
}
