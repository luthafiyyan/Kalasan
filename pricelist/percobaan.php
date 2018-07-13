<?php
include("../phplogin/koneksi.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pencarian Berdasarkan Kategori di PHP</title>
<script src=""></script>
</head>
<body>
<form method="POST" action="">
Search: <input type="text" name="txtsearch">
<select name="id_kategori">
 <option value="nama_obat">Nama Obat</option>
 <option value="produk">Produk</option>
 <option value="indikasi">Indikasi</option>
 <option value="golongan_obat">Golongan Obat</option>
</select>
<input type="submit" value="Search" name="submit"/>

<?php
  if (isset($_POST['submit'])) {
   $search = $_POST['txtsearch'];
   $kategoriobat = $_POST['id_kategori'];
   
   
   $result = $conn->query("SELECT * FROM products_list WHERE $kategoriobat LIKE '%$search%'");
    
   if (mysqli_num_rows($result) == 0) {
    echo '<p></p><p>Pencarian tidak ditemukan</p>';
   } else {
    echo '<p></p>';
    while ($row = mysqli_fetch_array($result)) {
     extract($row);
      
     echo '<p>Nama Obat: '.$product_name.'</p>';
     echo '<p>Produk: '.$product_speck.'</p>';
     echo '<p>Indikasi: '.$product_price.'</p>';
     echo '<p>Golongan Obat: '.$golongan_obat.'</p>';
     echo '<p></p>';
    }
   }
  }
?>
</form>
</body>
</html>