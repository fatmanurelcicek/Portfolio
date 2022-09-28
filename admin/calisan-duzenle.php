<?php 


if(!empty($_GET['id'])){

	
include "header.php";

	$kim = $db->prepare("SELECT * FROM calisanlar WHERE id = ?");
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
					<h1 class="m-0">Çalışan Düzenle</h1>
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
									<label>Ad Soyad :</label>
									<input type="text" name="adsoyad" class="form-control" value="<?php echo $kim_getir['adsoyad'] ?>">
								</div>	

								<div class="form-group">
									<label>Başlık :</label>
									<input type="text" name="baslik" class="form-control" value="<?php echo $kim_getir['baslik'] ?>">
								</div>

								<div class="form-group">
									<label>Resim :</label>
									<input type="file" name="resim">
								</div>

								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="calisanguncelle" value="<?php echo $kim_getir['id'] ?>">GÜNCELLE</button>
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

if(isset($_POST['calisanguncelle'])){


	/// INSERT INTO tablo_adı (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

	$calisansorgu = $db->prepare("UPDATE calisanlar SET 
		resim=:gorsel,
		adsoyad=:isimsoyisim,
		baslik=:baslik WHERE id=:id
		");


	$calisan_calistir = $calisansorgu->execute(array(

		'gorsel' => $_POST['resim'],
		'isimsoyisim' => $_POST['adsoyad'],
		'baslik' => $_POST['baslik'],
		'id' => $_POST['calisanguncelle']

	));

	if($calisan_calistir){

		header("Location:calisanlar.php?islem=ok");

	}else{

		header("Location:calisanlar.php?islem=no");
	}

}



include "footer.php";

}else{


	echo "404 sayfa bulunamadı!";


}

?>