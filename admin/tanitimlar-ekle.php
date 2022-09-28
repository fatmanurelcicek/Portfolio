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
					<h1 class="m-0">Tanıtımlar Ekleme</h1>
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
									<input type="text" name="baslik" class="form-control">
								</div>
									<div class="form-group">
									<label>Açıklama :</label>
									<input type="text" name="aciklama" class="form-control">
								</div>
								
                               <div class="form-group">
									<button class="btn btn-success form-control" type="submit" name="tanitimekle">EKLE</button>
								</div>

							</form>

						</div>
					</div>


				</div>

			</div>
		
		</div>
	</div>

</div>



<?php 

if(isset($_POST['tanitimekle'])){


	/// INSERT INTO tablo_adı (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

	$tanitimsorgu = $db->prepare("INSERT INTO tanitimlar SET 
	
		baslik=:baslik,
		aciklama=aciklama
		");


	$tanitimlar_calistir = $tanitimsorgu->execute(array(

		'baslik' => $_POST['baslik'],
		'aciklama' => $_POST['aciklama']

	));

	if($tanitimlar_calistir){

		header("Location:tanitimlar-ekle.php?islem=ok");

	}else{

		header("Location:tanitimlar-ekle.php?islem=no");
	}

}

include "footer.php";

?>