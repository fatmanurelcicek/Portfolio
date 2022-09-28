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
					<h1 class="m-0">Slider Ekleme</h1>
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
									<input type="file" name="resim">
								</div>	


								<div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="sliderekle">EKLE</button>
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

	$slidesorgu = $db->prepare("INSERT INTO slider SET 
		resim=:gorsel,
	
		");


	$slider_calistir = $slidesorgu->execute(array(

		'gorsel' => $_POST['resim']
		

	));

	if($slider_calistir){

		header("Location:slider-ekle.php?islem=ok");

	}else{

		header("Location:slider-ekle.php?islem=no");
	}

}


include "footer.php";

?>