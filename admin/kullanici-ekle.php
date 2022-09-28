<?php 

include "header.php";

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">

		<?php if(isset($_GET['islem'])){ ?>


			<?php if($_GET['islem'] == "ok"){ ?>

				<div class="alert alert-success">İşlem Başarılı Bir Şekilde Gerçekleştirildi.</div>

			<?php } ?>


			<?php if($_GET['islem'] == "no"){ ?>

				<div class="alert alert-danger">İşlem Başarısız! Lütfen Tekrar Deneyiniz.</div>

			<?php } ?>	

		<?php } ?>


		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Kullanıcı Ekleme</h1>
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
									<input type="text" name="kullanici_adi" class="form-control">
								</div>	

								<div class="form-group">
									<label>Şifre :</label>
									<input type="text" name="sifre" class="form-control">
								</div>

								<div class="form-group">
									<label>Ad Soyad :</label>
									<input type="text" name="adsoyad" class="form-control">
								</div>
								<div class="form-group">
									<label>Email :</label>
									<input type="text" name="email" class="form-control">
								</div>


								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="kullaniciekle">EKLE</button>
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

if(isset($_POST['kullaniciekle'])){


	/// INSERT INTO tablo_adı (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

	$kullanicisorgu = $db->prepare("INSERT INTO kullanicilar SET 
		kullanici_adi=:kullaniciadi,
		sifre=:parola,
		adsoyad=:isimsoyisim, 
		email=:eposta
		");


	$kullanici_calistir = $kullanicisorgu->execute(array(

		'kullaniciadi' => $_POST['kullanici_adi'],
		'parola' =>md5( $_POST['sifre']),
		'isimsoyisim' => $_POST['adsoyad'],
		'eposta' => $_POST['email']
	));

	if($kullanici_calistir){

		header("Location:kullanici-ekle.php?islem=ok");

	}else{

		header("Location:kullanici-ekle.php?islem=no");
	}

}



include "footer.php";

?>