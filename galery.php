<?php
  include 'KONEKSI.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Gallery</title>
    <style type="text/css">
    body{
      background-image: url(./bg/cd.jpg);
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    *{
      margin: 0;
      padding: 0;
      font-family:serif;  
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
      font-family: serif;
    }
    header ul li{
      width: 10%;
      height: 50px;
      border: 1px solid black;
      float: left;
      list-style: none;
      text-align: center;
      line-height: 50px;
      font-family: serif;
    }
    .sosmed ul li{
      float: right;
    }
    a:hover{
      color: yellow;
    }
    h2{
      position: absolute;
      top: 13%;
      left: 45%;
      color: black;
      font-size: 30px;
      font-family: serif;
    }
    table{
      position: absolute;
      top: 20%;
      left: 10%;
      border: 2px solid;
      height: auto;
      width: 80%;
      text-align: center;
      background-color: rgb(0,0,0,0.5);
      font-family: serif;
    }
    tr{
      color: black;
      height: 25%;
    }
    td{
      color: white;
    }
    button[type="button"] {
      position: absolute;
      top: 10%;
      left: 90%;
      margin-bottom: 25px;
      width: 100px;
      height: 30px ;
      background: rgb(0,0,0,0.5);
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
    .sosmed img{
      margin: 10px;
      display: inline-block;
      width: 20px;
    }
  </style>
  </head>
  <header>
  <ul>
    <li><a href="GALERY.php">Galery</a></li>
    <li><a href="PROFIL.html">Profile</a></li>
  </ul>
    <ul class="sosmed">
    <li><a href="https://www.instagram.com/"><img src="./bg/instagram.png"></a></li>
    <li><a href="https://twitter.com/twitter"><img src="./bg/twitter.png"></a></li>
    <li><a href="https://www.facebook.com/"><img src="./bg/facebook.png"></a></li>
    <li><a href="https://www.youtube.com/"><img src="./bg/youtube.png"></a></li>
  </ul>
</header>
  <body>
    <h2>Tampilan</h2><br>
    <table border="1">
      <tr>
        <td>NAMA</td>
        <td>GAMBAR</td>
        <td>KETERANGAN</td>
      </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_gambar");
        while($row=mysqli_fetch_array($query)){
        ?>
      <tr>
        <td><?php echo $row['nama'] ?></td>
        <td><img src="gambar/<?php echo $row['file'] ?>"></td>
        <td>
            <a href="EDIT.php?id=<?php echo $row['id_gambar'] ?>">Edit</a> |
            <a href="HAPUS.php?id=<?php echo $row['id_gambar'] ?>">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </table><br><br>
    <a href="UPLOAD.php"><button type="button" name="upload">upload</button></a>
  </body>
</html>
