<?php
$servername = "localhost";
$username   = "root";
$password   = "123456";
$dbname     = "bilgiler";

// Veritabanı bağlantısının oluşturulması
$db = mysqli_connect($servername, $username, $password, $dbname);
// Varsa, bağlantı hatasının ekrana yazdırılarak programın sonlandırılması
if (!$db) { die("Hata oluştu: " . mysqli_connect_error()); }
//echo "Bağlantı tamam!";

// Oluşabilecek Türkçe karakter gösterimi kelime1nlarını giderelim...
mysqli_query($db, "set names 'utf8'");
?>
<form method="get">
  Eklenen kelime: <input type="text" name="eklenenkelime" placeholder="Eklenen Kelime" value="<?php echo $_GET["eklenenkelime"];?>">
  Eş Anlamlısı: <input type="text" name="esanlamlısı" placeholder="Es Anlamlısı" value="<?php echo $_GET["esanlamlısı"];?>">
  <input class="btn btn-success" type="submit" value="EKLE !">
</form>
  <?php
        if(isset($_GET(eklenenkelime)))
   ?>
