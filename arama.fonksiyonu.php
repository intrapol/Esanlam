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

// Oluşabilecek Türkçe karakter gösterimi sorunlarını giderelim...
mysqli_query($db, "set names 'utf8'");
?>

<div class="alert alert-success" role="alert">
  Arama sırasında bilmediğiniz harfler için <b>alt çizgi</b> karakterini kullanın
</div>

<form method="get">
  Aranılan sözcük: <input type="text" name="aranansozcuk" placeholder="Aranan Sözcük" value="<?php echo $_GET["aranansozcuk"];?>">
  <input class="btn btn-success" type="submit" value="Ara !">
</form>


<?php if( isset( $_GET["aranansozcuk"] ) ) {  // Arama formu gönderilmiş ?>

  <h1 class="mt-5">Arama Sonucu</h1>

  <table class="table table-hover">
      <tr class="table-success">
        <th scope="col">Sözcük</th>
        <th scope="col">Açıklaması</th>
      </tr>

    <?php
    $SQL   = "SELECT soru, cevap FROM bulmaca WHERE cevap LIKE '{$_GET["aranansozcuk"]}' ORDER BY soru ";
    $rows  = mysqli_query($db, $SQL);

    while($row = mysqli_fetch_assoc($rows)) { // Kayıt adedince döner
        echo sprintf("
          <tr>
            <td>%s</td>
            <td>%s</td>
          </tr>",
          $row["cevap"], $row["soru"] );
    }

    ?>
  </table>
<?php } // Arama formu gönderilmiş ?>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
