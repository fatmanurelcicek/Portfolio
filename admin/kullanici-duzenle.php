<?php 


if(!empty($_GET['id'])){

	
include "header.php";

	$kim = $db->prepare("SELECT * FROM kullanicilar WHERE id = ?");
	$kim->execute(array($_GET['id']));
	$kim_getir = $kim->fetch(PDO::FETCH_ASSOC);
	



?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">

		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Kullanıcı Düzenle</h1>
				</div><!-- /.col -->



			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							

							<form method="POST" action="">

								<div class="form-group">
									<label>Kullanıcı Adı :</label>
									<input type="text" name="kullaniciadi" class="form-control" value="<?php echo $kim_getir['kullanici_adi'] ?>">
								</div>	

								<div class="form-group">
									<label>Şifre :</label>
									<input type="text" name="sifre" class="form-control" value="<?php echo $kim_getir['sifre'] ?>">
								</div>

								<div class="form-group">
									<label>Ad Soyad:</label>
									<input type="text" name="adsoyad"class="form-control" value="<?php echo $kim_getir['adsoyad'] ?>">
								</div>

								<div class="form-group">
									<label>Email:</label>
									<input type="text" name="email"class="form-control" value="<?php echo $kim_getir['email'] ?>">
								</div>


								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="kullaniciguncelle" value="<?php echo $kim_getir['id'] ?>">GÜNCELLE</button>
								</div>

							</form>

						</div>
					</div>


				</div>

			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php 

if(isset($_POST['kullaniciguncelle"'])){


	/// INSERT INTO tablo_adı (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

	$kullanicisorgu = $db->prepare("UPDATE kullanicilar SET 
		kullanici_adi=:kullaniciadi,
		sifre=:parola,
		adsoyad=:isimsoyisim, 
		email=:eposta WHERE id=:id
		");


	$kullanici_calistir = $kullanicisorgu->execute(array(

		'kullaniciadi' => $_POST['kullanici_adi'],
		'parola' => $_POST['sifre'],
		'isimsoyisim' => $_POST['adsoyad'],
		'eposta' => $_POST['email'],
		'id' => $_POST['kullaniciguncelle']

	));

	if($kullanici_calistir){

		header("Location:kullanicilar.php?islem=ok");

	}else{

		header("Location:kullanicilar.php?islem=no");
	}

}



include "footer.php";

}else{


	echo "404 sayfa bulunamadı!";


}

?>