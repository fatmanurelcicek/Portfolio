<?php 

if (!empty($_GET['id'])) {

include "header.php";


$kim =$db->prepare("SELECT * FROM egitimler WHERE id = ?");
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
					<h1 class="m-0">Eğitimler Düzenle</h1>
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
							<link rel="stylesheet" type="text/css" href="menu.php">

							<form method="POST" action="">

								<div class="form-group">
									<label>Resim :</label>
									<input type="file" name="resim">
								</div>
								<div class="form-group">
									<label>Başlık :</label>
									<input type="text" name="baslik" class="form-control"value="<?php echo $kim_getir['baslik'] ?>">
								</div>
									<div class="form-group">
									<label>Açıklama :</label>
									<input type="text" name="aciklama" class="form-control"value="<?php echo $kim_getir['aciklama'] ?>">
								</div>
									<div class="form-group">
									<label>Etiket:</label>
									<input type="text" name="etiket" class="form-control"value="<?php echo $kim_getir['etiket'] ?>">
								</div>
									<div class="form-group">
									<label>Tarih :</label>
									<input type="date" name="tarih" class="form-control" value="<?php echo $kim_getir['tarih'] ?>">
								</div>
                                   	


								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="egitimguncelle" value="<?php echo $kim_getir['id']?>">GÜNCELLE</button>
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

if(isset($_POST['egitimguncelle'])) {

	$egitimsorgu = $db->prepare("UPDATE egitimler SET 

		resim=:gorsel,
		baslik=:baslik,
		aciklama=:aciklama,
		etiket=:anlatim,
		tarih=:zaman WHERE id=:id
	    ");


	$egitimler_calistir = $egitimsorgu->execute(array(
          'gorsel'=>$_POST['resim'],
		  'baslik' => $_POST['baslik'],
		  'aciklama' => $_POST['aciklama'],
		  'anlatim' => $_POST['etiket'],
		  'zaman' =>$_POST['tarih'],
		  'id' => $_POST['egitimguncelle']
		

	));

	if($egitimler_calistir){

		header("Location:egitimler.php?islem=ok");

	}else{

		header("Location:egitimler.php?islem=no");
	}

}




include "footer.php";

}else{

	echo "404 sayfa bulunamadı!";
}

?>