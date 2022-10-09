<?php

session_start();

include_once('connect.php'); 

if(isset($_SESSION['kullanici_id'])) {
	
	header("location:alim.php");

}	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="css/style.css" />
        <title>SepetuX | Giriş</title>
				<link rel="icon" href="./resimler/ikon.png" type="image/x-icon" />

    </head>
    <body>

	
        <div class="custom-space">
			<div class="container">
				<div class="row dikey-ort">
					<div class="col-md-8">
									<img src="./resimler/logo.png" height="90" width="350"> 
						
<p></p>

						<div class="sol-title">ALIŞVERİŞ</div>
						<div class="sol-title-2">SAYFAMIZA HOŞGELDİNİZ.</div>
						<div class="sol-title-3">Güveli alışveriş yapmak için Lütfen giriş bilgilerinizi giriniz.</div>
					</div>
					<div class="col-md-4">
						<div class="form">
							
							<?php
							
								if($_POST) {
								
									if(!empty($_POST['kullanici_adi'])&& !empty($_POST['kullanici_sifresi'])) {
										
										$kullanici_adi = $_POST['kullanici_adi'];
										$kullanici_sifresi = $_POST['kullanici_sifresi'];
										
										$records = $db->prepare('SELECT * FROM kullanicilar WHERE kullanici_adi = :kullanici_adi && sifre = :kullanici_sifresi');
										$records->bindParam(':kullanici_adi', $kullanici_adi);
										$records->bindParam(':kullanici_sifresi', $kullanici_sifresi);
										$records->execute();
										$results = $records->fetch(PDO::FETCH_ASSOC);
										
										if($results == true) {
											
											$_SESSION['kullanici_id'] = $results['id'];
											header("location:alim.php");

										} else {
										
											echo '<div class="alert alert-danger">Kullanıcı Adınız veya Şifreniz Hatalı</div>';
										
										}
										
									} else {
									
										echo 'Hata oluştu.';
										
									}
									
								}
								
							?>
							
							<form method="POST">
								<div class="tittle">GİRİŞ</div>
								<div class="kullanıcı">
									<input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" required>
								</div>
								<div class="sifre">
									<input type="password" name="kullanici_sifresi" placeholder="Şifre" required>
								</div>
								<div class="check-button">
									<input type="checkbox" placeholder="Beni hatırla" />
									<label class="form-check-label" for="exampleCheck1">Beni Hatırla</label>
								</div>
								<div class="login-button">
									<input type="submit">
								</div>
							</form>


	
						</div>
						
					</div>
				</div>
			</div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
