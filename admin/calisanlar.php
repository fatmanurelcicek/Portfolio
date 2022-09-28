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
					<h1 class="m-0">Çalışanlar</h1>
				</div><!-- /.col -->

			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Çalışanlar</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Resim</th>
										<th>Ad Soyad</th>
										<th>Başlık</th>
										<th>İşlemler</th>
										
									</tr>
								</thead>
								<tbody>

									<?php 

									$calisansorgu = $db->prepare("SELECT * FROM calisanlar");
									$calisansorgu->execute();

									while($calisan_getir = $calisansorgu->fetch(PDO::FETCH_ASSOC)){

										?>

										<tr>
											<td><?php echo $calisan_getir['id']; ?></td>
											<td><?php echo $calisan_getir['resim']; ?></td>
											<td><?php echo $calisan_getir['adsoyad']; ?></td>
											<td><?php echo $calisan_getir['baslik']; ?></td>
											<td>
												<a href="calisan-duzenle.php?id=<?php echo $calisan_getir['id']; ?>"><button class="btn btn-success" type="submit">DÜZENLE</button></a>
												<a href="calisanlar.php?islem=sil&id=<?php echo $calisan_getir['id']; ?>"><button class="btn btn-danger" type="submit">SİL</button></a>
											</td>

										</tr>

									<?php } ?>


								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
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

if(isset($_GET['islem']) AND $_GET['islem'] == "sil"){

	if(!empty($_GET['id'])){


		$delete = $db->prepare("DELETE FROM calisanlar WHERE id=:id");
		$delete_calistir = $delete->execute(array('id' => $_GET['id']));


		if($delete_calistir){
			header("Location:calisanlar.php?islem=ok");

		}else{

			header("Location:calisanlar.php?islem=no");

		}

	}else{

		header("Location:calisanlar.php?islem=no");

	}



}


include "footer.php";

?>