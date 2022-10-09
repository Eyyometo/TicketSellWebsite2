<?php

session_start();

include_once('connect.php'); 

if(!isset($_SESSION['kullanici_id'])) {
	
	header("location:login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style2.css"/>
	<title>SepetuX | Ürünler</title>
					<link rel="icon" href="./resimler/ikon.png" type="image/x-icon" />

</head>
<body>
	<div class="top-header">
	<div class="container">
	<ul class="topnav">
  		<li><a class="active" href="alim.php">Anasayfa</a></li>
		<?php if(!isset($_SESSION['kullanici_id'])) { ?>
  		<li><a href="login.php">Giriş Yap</a></li>
		<?php } ?>
		<?php if(!isset($_SESSION['urun'])) { ?>
		<li><a href="basket.php">Sepetim (0)</a></li>
		<?php } else { ?>
		<li><a href="basket.php">Sepetim (<?php echo count($_SESSION['urun']); ?>)</a></li>
		<?php } ?>
  		<li><a href="logout.php">Çıkış Yap</a></li>
	</ul>
</div>
</div>
<div class="container mt-3">
	<div class="row">
		<div class="bas-baslik"><h5>ÜRÜN SAYFASI</h5></div>
	<?php

	$query = $db->prepare("SELECT * FROM urunler");
	$query->execute();
	$result = $query->fetchAll();

	if($_POST) {
		
		$id = $_POST['product_id']; 
		$adet = $_POST['quality']; 
		$_SESSION['urun'][$id] = array('id' => $id, 'adet' => $adet) ;	
		
		echo '<div class="alert alert-success">Sepete Eklendi.</div>';
		
		header("refresh:1");

		
	}
	
	?>
	
	<?php foreach($result as $urunler) { ?>
		<div class="col-md-3 mb-4">
			<div class="product-cnt" >
				<div class="product-img">
					<img src="<?php echo $urunler['urun_resmi']; ?>"  />
				</div>
				<form method="post">
					<div class="prod-det">
						<div class="row">
						<div class="col-md-12">
							<div class="product-name mt5"></div>
						</div>
						<div class="col-md-12">
							<div class="product-price  mt5"><?php echo $urunler['urun_adi']; ?></div>
						</div>
						<div class="col-md-12">
							<div class="product-stok mt5">$<?php echo number_format($urunler['urun_fiyati'], 2, ',', '.'); ?></div>
						</div>
						</div>
					</div>
					<div class="product-quality mt-2">
						<input type="number" name="quality" value="1">
						<div class="clearfix" ></div>
					</div>
					<div class="ekle-btn mt-2 "><input type="submit" value="Ekle"></div>
					<input type="hidden" id="product_id" name="product_id" value="<?php echo $urunler['id']; ?>">
				</form> 
				<div class="clearfix" ></div>
			</div>
		</div>
	<?php } ?>
	
	</div>
</div>	
	
<footer class="bg-dark text-center text-white">
    
    <div class="container p-4">
     
      <section class="mb-4">
        
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"target="_blank">
            <i class="bi bi-facebook"></i>  </a>
      
  
        
        <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/" role="button"target="_blank">
        <i class="bi bi-twitter"></i></a>
        
  
       
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com.tr/" role="button"target="_blank">
            <i class="bi bi-google"></i></a>
        
  
        
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"target="_blank">
        <i class="bi bi-instagram"></i></a>
       
  
       
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/" role="button"target="_blank" >
        <i class="bi bi-linkedin"></i></a>
        
  
      
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/" role="button"target="_blank">
        <i class="bi bi-github"></i></a>
       
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
                <input type="email" id="form5Example2" class="form-control" placeholder="Email adress"/>
                
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
  
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <span class="text-white">SepetuX</span>
    </div>
  </footer>
	
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	
</body>
</html>