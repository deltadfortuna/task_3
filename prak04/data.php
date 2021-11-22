<?php
    include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data </title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <center>
    <table border='1'>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Angkatan</th>
            <th>Resume Webinar</th>
            <th colspan="2"></th>
        </tr>

    <?php
    $sql=$conn->query("select * from mahasiswa");
    while($mhs=$sql->fetch_object()){
    ?>

        <tr>
            <td><?php echo $mhs->nim; ?></td>
            <td><?php echo $mhs->nama; ?></td>
            <td><?php echo $mhs->prodi; ?></td>
            <td><?php echo $mhs->angkatan; ?></td>
            <td><?php echo $mhs->upload; ?></td>
            <td><a href="javascript:void()" onclick="update('<?php echo $mhs->nim; ?>')">EDIT</a></td>
            <td><a href="javascript:void()" onclick="del('<?php echo $mhs->nim; ?>')">DELETE</a></td>
        </tr>

    <?php } ?>
    </table>
    </center>
    <script>
    function update(nim){
        $.get("update.php", {nim},function(data) {
            $("#content").html(data);
        });
    }

    function del(nim){
        $.get("delete.php", {nim}, function(data) {
            showData()
        });
    }
    </script>
</body>
</html>