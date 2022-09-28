<?php 


if(!empty($_GET['id'])){

	
include "header.php";

	$kim = $db->prepare("SELECT * FROM slider WHERE id = ?");
	$kim->execute(array($_GET['id']));
	$kim_getir = $kim->fetch(PDO::FETCH_ASSOC);
	



?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">

		<
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Slider Güncelle</h1>
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
									<label>Resim :</label>
									<input type="file" name="resim" value="<?php echo $kim_getir['resim'] ?>">
								</div>	


								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="sliderguncelle"value="<?php echo $kim_getir['id'] ?>">GÜNCELLE</button>
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
if(isset($_POST['sliderekle'])){


	/// INSERT INTO tablo_adı (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

	$slidesorgu = $db->prepare("UPDATE slider SET 
		resim=:gorsel,WHERE id=:id
	
		");


	$slider_calistir = $slidesorgu->execute(array(

		'gorsel' => $_POST['resim'],
		'id' => $_POST['sliderguncelle']

	));

	if($slider_calistir){

		header("Location:slider.php?islem=ok");

	}else{

		header("Location:slider.php?islem=no");
	}

}


include "footer.php";

}else{


	echo "404 sayfa bulunamadı!";


}


?>