<?php
  include 'koneksi.php';

  $data=mysqli_query($conn, "SELECT * FROM tb_gambar WHERE id_gambar = '".$_GET['id']."'");
  $r = mysqli_fetch_array($data);

  $nama= $r['nama'];
  $file= $r['file'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Edit</title>
    <style type="text/css">
    body{
      background-image: url(cd.jpg);
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
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
    h2{
      position: absolute;
      top: 15%;
      left: 40%;
      color: black;
      font-size: 25px;
    }
    table{
      font-family: sans-serif;
      position: absolute;
      top: 20%;
      left: 40%;
      line-height: 50px;
    }
    tr{
      color: black;
    }
    td{
      color: black;
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
      img{
      width: 250px;
      }
  </style>
  </head>
  <body>
    <header>
  <ul>
    <li><a href="galery.php">Galery</a></li>
    <li><a href="contak.html">Concact</a></li>
  </ul>
</header>
    <h2>Silahkan Edit Data : </h2>
    <br><br>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" value="<?php echo $nama ?>"/></td>
        </tr>
        <tr>
          <td>File</td>
          <td>:</td>
          <td>
            <input type="hidden" name="img" value="<?php echo $file ?>">
            <input type=file name="gambar"/></td>
        </tr>
        <tr>
          <td colspan="3"><img src="gambar/<?php echo $file ?>"/></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="kirim" value="update"/> <a href="galery.php"><button type="button" name="back">Back</button></a></td>
        </tr>
      </table>
    </form>
    <?php
      if(isset($_POST['kirim'])){
        $nama= $_POST['nama'];
        $nama_file= $_FILES['gambar']['name'];
        $source=$_FILES['gambar']['tmp_name'];
        $folder='./gambar/';

        if($nama_file!=''){
          move_uploaded_file($source, $folder.$nama_file);
          $update=mysqli_query($conn, "UPDATE tb_gambar SET
            nama= '".$nama."',
            file= '".$nama_file."'
            WHERE id_gambar= '".$_GET['id']."'
          ");
          if($update){
            echo 'Berhasil update';
          }
          else{
            echo 'Gagal update';
          }
        }
        else{
          move_uploaded_file($source, $folder.$nama_file);
          $update=mysqli_query($conn, "UPDATE tb_gambar SET
            nama= '".$nama."'
            WHERE id_gambar= '".$_GET['id']."'
          ");
          if($update){
            echo 'Berhasil update';
          }
          else{
            echo 'Gagal update';
          }
        }
      }
    ?>
  </body>
</html>
