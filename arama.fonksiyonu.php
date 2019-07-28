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
  Aranılan kelime: <input type="text" name="aranansozcuk" placeholder="Aranan Kelime" value="<?php echo $_GET["aranansozcuk"];?>">
  <input class="btn btn-success" type="submit" value="Ara !">
</form>


<?php if( isset( $_GET["aranansozcuk"] ) ) {  // Arama formu gönderilmiş ?>

  <h1 class="mt-5">Arama Sonucu</h1>

  <table class="table table-hover">
      <tr class="table-success">
        <th scope="col">Sözcük</th>
        <th scope="col">Eş Anlamlısı</th>
      </tr>

    <?php
    $SQL   = "SELECT kelime1, kelime2 FROM esanlam WHERE kelime1 LIKE '{$_GET["aranansozcuk"]}' ORDER BY kelime1 ";
    $rows  = mysqli_query($db, $SQL);

    while($row = mysqli_fetch_assoc($rows)) { // Kayıt adedince döner
        echo sprintf("
          <tr>
            <td>%s</td>
            <td>%s</td>
          </tr>",
          $row["kelime2"], $row["kelime1"] );
    }

    ?>
  </table>
<?php } // Arama formu gönderilmiş ?>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
