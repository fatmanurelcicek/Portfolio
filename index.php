<?php include "header.php"; ?>


<div class="row">
  <div class="col-12">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">


        <?php 

        $slider = $db->prepare("SELECT * FROM slider");
        $slider->execute();

        while ($slide = $slider->fetch(PDO::FETCH_ASSOC)) {
        ?> <div class="carousel-item active">
          <img src="img/<?php echo $slide['resim'] ?>" class="d-block w-100" alt="...">

        </div>
        <?php
      }

      ?>


      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container-fluid mt-3">
    <div class="row p-4">
      <div class="col-md-12 teklif d-flex justify-content-around align-items-center">
        <p class="imza">
          <i class="fa-solid fa-quote-left tirnak"></i>
          BU YIL<span class="tirnak">8000</span> 'DEN FAZLA<span class="tirnak">PROJE ÇALIŞMASINA</span>  İMZA ATTIK
        </p>
        <button class="btn btn-warning">HEMEN TEKLİF AL</button>

      </div>
    </div>
  </div>

  <hr>

  <div class="container hizmetlerimiz p-5">
    <div class="row text-center">
      <h4 class="display-4 text-center"> HİZMETLERİMİZ</h4>

      <?php 

      $hizmetler = $db->prepare("SELECT * FROM hizmetler");
      $hizmetler->execute();

      while ($hizmet = $hizmetler->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="col-md-4">
          <img src="img/laptop.png" class="img-fluid-center-left"alt=""/>
          <p class="text-black-50 fw-bolder mt-2"><?php echo $hizmet['baslik'] ?></p>
          <p>
            <?php echo $hizmet['aciklama'] ?>
          </p>
        </div>



        <?php
      }

      ?>
    </div>
  </div>
  <h2 class="text-center">EGİTMENLER</h2>


  <div class="container">
   <div class="row">
    <div class="col-12">
      <div class="card-group">
       <?php 

       $egitmenler = $db->prepare("SELECT * FROM egitmenler");
       $egitmenler->execute();

       while ($egitmen = $egitmenler->fetch(PDO::FETCH_ASSOC)) { ?>


         <div class="card">
           <img src="img/resim3.png" class="img-fluid cardgroup" alt=".../">
           <link rel="stylesheet" type="text/css" href="stil.css">
           <div class="card-body">

             <h5 class="card-title"><?php echo $egitmen['baslik']?>
           </h5>
           <p class="card-text"><?php echo $egitmen['aciklama']?>
         </p>
         <p class="card-text"><small class="text-muted"><?php $egitmen['tarih']?>
       </small></p>

     </div>
   </div>


 <?php }

 ?>
 <div class="container py-3">

  <div class="row">
    <div class="col-md-12 text-center">
      <?php 

      $tanitimlar = $db->prepare("SELECT * FROM tanitimlar");
      $tanitimlar->execute();

      while ($tanitim = $tanitimlar->fetch(PDO::FETCH_ASSOC)) { ?>

        <h3><?php echo $tanitim ['baslik']?></h3>

        <P>
          <?php echo $tanitim ['aciklama']?>
        </P> 

      <?php } ?>
    </div>                       
  </div>
</div>
<hr>
<div class="row mt-5">
  <h2 class="text-center">CALİSANLAR</h2>
  <div class="col-md-12 text-center" style="display: inline-flex;">
    <?php 


    $calisanlar = $db->prepare("SELECT * FROM calisanlar");
    $calisanlar->execute();

    while ($calisan = $calisanlar->fetch(PDO::FETCH_ASSOC)) { ?>


      <div class="col-md-3">
        <div class="display: block; margin: auto;"><img src="img/ahmet.png" class="img-fluid" alt=""/></div>
        <h4 class="text-black"><?php echo $calisan ['adsoyad']?></h4>
        <h5 class="text-black-50"><?php echo $calisan ['baslik']?></h5>
      </div>
    <?php } 


    ?>

  </div>
</div>

<div class="row">
  <div class="col-md-12">

    <div class="card-group col-md-12">
     <?php 
     $egitimler = $db->prepare("SELECT * FROM egitimler");
     $egitimler->execute();

     while ($egitim = $egitimler->fetch(PDO::FETCH_ASSOC)) { ?>



      <div class="card col-md-4">
        <div class="card-header col-md-12">

         <img src="img/resim50.png" class="card-img-top" alt=".../">

         <div class="card-body">
          <h5 class="card-title"><?php echo $egitim['baslik']?></h5>
          <p class="card-text"><?php echo $egitim['aciklama']?></p>
          <ul class="list-group-flush">

           <li class="list-group-item"><?php echo $egitim['etiket']?> </li>

         </ul>


       </div>
       <div class="card-footer">
        <small class="text-muted"><?php echo $egitim['tarih']?></small>
      </div>
    </div>
  </div>

<?php }

?> 
</div>
</div>  
</div>




<?php include "footer.php"; ?>