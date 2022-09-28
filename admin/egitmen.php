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
					<h1 class="m-0">Eğitmenler</h1>
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
							<h3 class="card-title">Eğitmenler</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Resim</th>
										<th>Başlık</th>
										<th>Açıklama</th>
										<th>tarih</th>
										<th>İşlemler</th>
									</tr>
								</thead>
								<tbody>

									<?php 

									$egitmensorgu = $db->prepare("SELECT * FROM egitmenler");
									$egitmensorgu->execute();

									while($egitmen_getir = $egitmensorgu->fetch(PDO::FETCH_ASSOC)){

									 ?>

									 <tr>
									 	<td><?php echo $egitmen_getir['id']; ?></td>
									 	<td><?php echo $egitmen_getir['resim']; ?></td>
									 	<td><?php echo $egitmen_getir['baslik']; ?></td>
									 	<td><?php echo $egitmen_getir['aciklama']; ?></td>
									 	<td><?php echo $egitmen_getir['tarih']; ?></td>
									 	<td>
												<a href="egitmen-duzenle.php?id=<?php echo $egitmen_getir['id']; ?>"><button class="btn btn-success" type="submit">DÜZENLE</button></a>
												<a href="egitmen.php?islem=sil&id=<?php echo $egitmen_getir['id']; ?>"><button class="btn btn-danger" type="submit">SİL</button></a>
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


		$delete = $db->prepare("DELETE FROM egitmenler WHERE id=:id");
		$delete_calistir = $delete->execute(array('id' => $_GET['id']));


		if($delete_calistir){
			header("Location:egitmen.php?islem=ok");

		}else{

			header("Location:egitmen.php?islem=no");

		}

	}else{

		header("Location:egitmen.php?islem=no");

	}



}



include "footer.php"

?>	











































