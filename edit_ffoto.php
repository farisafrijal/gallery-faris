<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Album</title>
</head>

<body>
    <h1>Halaman Edit Foto</h1>
    <p>Selamat datang <b><?= $_SESSION['namalengkap'] ?></b></p>

    <ul>
        <li><a href="album.php">Album</a> </li>
        <li><a href="foto.php">Foto</a> </li>
        <li><a href="logout.php">logout</a> </li>
    </ul>

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
        include "koneksi.php";
        $fotoid = $_GET['fotoid'];
        $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {


        ?>
            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
            <table>
                <tr>
                    <td>Judul </td>
                    <td><input type="text" name="judulalbum" value="<?= $data['judulalbum'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="Deskripsifoto" value="<?= $data['deskripsifoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Lokasi File</td>
                    <td><input type="text" name="lokasifile"></td>
                </tr>
                <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php
                        $userid = $SESSION['userid'];
                        $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                        while ($data2 = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?=$data2['albumid']?>"<?php if($data2['albumid']=$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                        <?php
                        }
                        ?>

                    </select>

                </td>
            </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="ubah"></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </form>



</body>

</html>