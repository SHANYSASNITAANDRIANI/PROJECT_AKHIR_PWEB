<?php
  include 'KONEKSI.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman</title>
      <style type="text/css">
    body{
      background-image: url(./bg/cd.jpg);
      background-size: 100%;
    }
    *{
      margin: 0;
      padding: 0;
      font-family: serif;  
    }
    a{
      text-decoration: none;
      color: white;
    }
    header{
      width: 100%;
      height: 55px;
      border: 0px solid black;
      background: black;
      color: white;
    }
    header ul li{
      width: 10%;
      height: 50px;
      border: 1px solid black;
      float: left;
      list-style: none;
      text-align: center;
      line-height: 50px;
    }
    a:hover{
      color: yellow;
    }
    table{
      font-family: sans-serif;
      position: absolute;
      top: 15%;
      left: 40%;
      line-height: 50px;
    }
    h2{
      position: absolute;
      top: 10%;
      left: 45%;
    }
    input[type="submit"]{
     text-align: center;
     margin-bottom: 25px;
     width: 100px;
     height: 30px ;
     background: green;
     border-radius: 2px;
     border : none;
     color: white;
     font-family: serif;
     text-transform: uppercase;
     transition: 0,2s ease;
     cursor: pointer;
    }
    button[type="button"] {
    margin-bottom: 25px;
    width: 100px;
    height: 30px ;
    background: red;
    border-radius: 2px;
    border : none;
    color: white;
    font-family: serif;
    text-transform: uppercase;
    transition: 0,2s ease;
    cursor: pointer;
    }
  </style>
  </head>
  <body>
    <header>
  <ul>
    <li><a href="GALERY.php">Galery</a></li>
    <li><a href="PROFIL.html">Profile</a></li>
  </ul>
</header>
    <h2>Silahkan masukkan data : </h2>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td></td>
          <td><input type="text" name="nama"/></td>
        </tr>

        <tr>
          <td>File</td>
          <td>:</td>
          <td></td>
          <td><input type=file name="gambar"/></td>
        </tr>

        <tr>
          <td></td>
          <td></td>
          <td><input type="submit" name="kirim" value="kirim"/></td>
          <td><a href="GALERY.php"><button type="button" name="back">Back</button></a></td>
        </tr>
      </table>
    </form>
    <?php
      if(isset($_POST['kirim'])){
        $nama= $_POST['nama'];
        $nama_file= $_FILES['gambar']['name'];
        $source=$_FILES['gambar']['tmp_name'];
        $folder='./gambar/';

        move_uploaded_file($source, $folder.$nama_file);
        $insert= mysqli_query($conn,"INSERT INTO tb_gambar VALUES(
          NULL,
          '$nama',
          '$nama_file')");

          if($insert){
            echo 'Gambar Berhasil di Upload';
          }else{
            'Gambar Gagal di Upload';
          }
      }
    ?>
  </body>
</html>
