<?php 


if(!empty($_GET['id'])){

	
include "header.php";

	$kim = $db->prepare("SELECT * FROM hizmetler WHERE id = ?");
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
					<h1 class="m-0">Hizmetler Düzenle</h1>
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
									<label>Başlık :</label>
									<input type="text" name="baslik" class="form-control"value="<?php echo $kim_getir['baslik'] ?>">
								</div>
									<div class="form-group">
									<label>Açıklama :</label>
									<input type="text" name="aciklama" class="form-control"value="<?php echo $kim_getir['aciklama'] ?>">
								</div>
								  <div class="form-group">
									<label>Resim :</label>
									<input type="file" name="resim">
								</div>
									<div class="form-group">
									<label>Tarih :</label>
									<input type="text" name="tarih" class="form-control"value="<?php echo $kim_getir['tarih'] ?>">
								</div>
                                 

								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="hizmetguncelle"value="<?php echo $kim_getir['id'] ?>">GÜNCELLE</button>
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

if(isset($_POST['hizmetguncelle'])){


	/// INSERT INTO tablo_adı (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

	$hizmetsorgu = $db->prepare("UPDATE hizmetler SET 
		
		baslik=:baslik,
		aciklama=:aciklama,
		resim=:gorsel,
		tarih=:zaman
	WHERE id=:id	");


	$hizmetler_calistir = $hizmetsorgu->execute(array(

		
		'baslik' => $_POST['baslik'],
		'aciklama' => $_POST['aciklama'],
		'gorsel' => $_POST['resim'],
		'zaman' => $_POST['tarih'],
		'id' => $_POST['hizmetguncelle']

	));
if($hizmetler_calistir){

		header("Location:hizmetler.php?islem=ok");

	}else{

		header("Location:hizmetlerr.php?islem=no");
	}

}



include "footer.php";

}else{


	echo "404 sayfa bulunamadı!";


}

?>