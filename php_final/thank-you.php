<?php ob_start();

session_start();

include_once('connect.php'); 


?>


	<?php

		$urunler = serialize($_SESSION['urun']);

		$query = $db->prepare("INSERT INTO siparisler SET siparis_kullanici = :siparis_kullanici, adi_soyadi = :ad, adres = :adres, telefon = :tel, email = :mail, urunler = :urunler, toplam = :total"); 

		$update = $query->execute(array(
			 "ad" => $_POST['adiniz_soyadiniz'],
			 "tel" => $_POST['telefon_numaraniz'],
			 "mail" => $_POST['mail_adresiniz'],
			 "total" => $_POST['total'],
			 "adres" => $_POST['adres'],
			 "siparis_kullanici" => $_POST['user_id'],
			 "urunler" => $urunler,
		));

		unset($_SESSION['urun']);

	?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
            integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="css/style3.css" />
        <title>SepetuX | Teşekkürler</title>
									<link rel="icon" href="./resimler/ikon.png" type="image/x-icon" />

    </head>
    <body>
        <div class="cık">
									<img src="./resimler/logo.png" height="90" width="350"> 
			<p></p>

                <div class="title"><h1>Şiparişiniz başarıyla gerçekleştirilmiştir.</h1></div>
                <div class="title2"><h4>Bizi tercih ettiğiniz için teşekkür ederiz. Mailinizi kontrol ediniz.</h4></div>
                <div class="btn">
                    <a href="alim.php" class="bg-light text-dark">Alışverişe Geri Dön</a>
                </div>
			<div class="btn">
                    <a href="logout.php" class="bg-light text-dark">Çıkış</a>
                </div>
				<div class="icon">
				<i class="bi bi-cart-check"></i>
				</div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
