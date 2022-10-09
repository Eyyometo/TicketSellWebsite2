<?php

session_start();

include_once('connect.php'); 

if(!isset($_SESSION['kullanici_id'])) {
	
	header("location:login.php");

}


if(isset($_GET['remove'])) {
	unset($_SESSION['urun'][$_GET['remove']]);
	header('Location: basket.php');
}

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
        <link rel="stylesheet" href="css/style4.css" />
        <title>SepetuX | Sepet</title>
							<link rel="icon" href="./resimler/ikon.png" type="image/x-icon" />

		
    </head>
    <body>
        <div class="top-header">
            <div class="container">
                <ul class="topnav">
                    <li><a href="alim.php">Anasayfa</a></li>
                    <?php if(!isset($_SESSION['kullanici_id'])) { ?>
                    <li><a href="login.php">Giriş Yap</a></li>
                    <?php } ?>
                    <?php if(!isset($_SESSION['urun'])) { ?>
                    <li><a class="active" href="basket.php">Sepetim (0)</a></li>
                    <?php } else { ?>
                    <li>
                        <a href="basket.php">Sepetim (<?php echo count($_SESSION['urun']); ?>)</a>
                    </li>
                    <?php } ?>
                    <li><a href="logout.php">Çıkış Yap</a></li>
                </ul>
            </div>
        </div>

        <main class="basket-height">
            <h1 class="text-center mb-5 mt-5">Sipariş Detayları</h1>
            <div class="container mt-2">
                <div class="resim">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="basket">
                                <div class="row">
                                    <div class="col-md-5"><div class="tittle">ÜRÜNLER</div></div>
                                    <div class="col-md-3"><div class="tittle2">FİYAT</div></div>
                                    <div class="col-md-2 mb-2"><div class="tittle3">ADET</div></div>
                                    <div class="col-md-2 mb-2"><div class="tittle3"></div></div>
                                </div>
                            </div>

                            <?php if(isset($_SESSION['urun'])) { ?>
                            <?php $total = '0'; ?>

                            <?php foreach($_SESSION['urun'] as $key =>
                            $urunler) { ?>

                            <?php
						
						$id = $urunler['id'];					
						$query = $db->prepare("SELECT * FROM urunler where id = '$id' "); $query->execute(); $result = $query->fetch(); ?>

                            <div class="basket2">
                                <div class="row">
                                    <div class="col-md-5 text-left">
                                        <div class="row">
                                            <div class="col-md-5"><img src="<?php echo $result['urun_resmi']; ?>" class="img-fluid" /></div>
                                            <div class="col-md-7"><?php echo $result['urun_adi']; ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">$<?php echo number_format($result['urun_fiyati'], 2, ',', '.'); ?></div>
                                    <div class="col-md-2"><?php echo $urunler['adet']; ?></div>
                                    <div class="col-md-2">
                                        <a href="?remove=<?php echo $key; ?>"><i class="iicon bi-bag-x"></i></a>
                                    </div>
                                </div>
                            </div>

                            <?php $total = $total + ($result['urun_fiyati'] * $urunler['adet']); ?>

                            <?php } ?>

                            <?php } else { ?>

                            <div class="alert alert-warning mt-3">Sepetinizde Ürün Bulunmamaktadır.</div>

                            <?php } ?>
                        </div>
                        <div class="col-md-3">
                            <div class="send-price">
                                <div class="send-tittle">Ödenecek Tutar</div>
                                <?php if(isset($_SESSION['urun'])) { ?>
                                <div class="send-tutar">
                                    <h2>$<?php echo number_format($total, 2, ',', '.'); ?></h2>
                                </div>
                                <?php } else { ?>
                                <div class="send-tutar"><h2>$0</h2></div>

                                <?php } ?>
                                <div class="button"><a href="#satinal" class="btn btn-warning complete-shopping">Alışverişi Tamamla</a></div>
                                <div class="alt-çizgi"></div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="kargo">Kargo ücreti</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="kargo-ucreti">Ücretsiz</div>
                                    </div>
                                </div>
                            </div>
                            <div class="button2"><a href="alim.php" type="button" class="btn btn-success">Siparişi Güncelle</a></div>
                        </div>
                    </div>
                </div>

                <div id="satinal" class="satin-alma-formu">
                    <div class="toplam-form">
                        <form action="thank-you.php" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="form-baslık text-center mb-3 mt-3"><h5>SATIN ALMA FORMU</h5></div>
                                    <div class="col-md-12 mb-2">
                                        <div class="satin-alma-input">
                                            <div class="ad">
                                                <input type="text" name="adiniz_soyadiniz" placeholder="Adınız Soyadınız" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="tel">
                                            <input type="text" name="telefon_numaraniz" placeholder="Telefon Numaranız" required />
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="mail">
                                            <input type="email" name="mail_adresiniz" placeholder="Mail Adresiniz" required />
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="adres">
                                            <textarea placeholder="Adresiniz" name="adres" required></textarea>
                                        </div>
                                    </div>

                                    <input type="hidden" name="total" value="<?php echo $total; ?>" />
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['kullanici_id']; ?>" />

                                    <div class="col-md-12 mb-2">
                                        <button class="btn btn-warning">Alışverişi Tamamla</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-dark text-center text-white">
            <div class="container p-4">
                <section class="mb-4">
                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"target="_blank"> <i class="bi bi-facebook"></i> </a>

                    <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/" role="button"target="_blank"> <i class="bi bi-twitter"></i></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com.tr/" role="button" target="_blank"> <i class="bi bi-google"></i></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"target="_blank"> <i class="bi bi-instagram"></i></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/" role="button"target="_blank"> <i class="bi bi-linkedin"></i></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/" role="button"target="_blank"> <i class="bi bi-github"></i></a>
                </section>

                <section class="mail">
                    <form action="">
                        <div class="row d-flex justify-content-center">
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong>E-mail Adresinizi Giriniz:</strong>
                                </p>
                            </div>

                            <div class="col-md-5 col-12">
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="form5Example2" class="form-control" placeholder="Email adress" />
                                </div>
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-light mb-4">
                                    Gönder
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div class="text-center p-3" style="color: white; background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <span class="text-white">SepetuX</span>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"
            integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script>
            $(".complete-shopping").click(function () {
                $(".satin-alma-formu").show();
            });
        </script>
    </body>
</html>
