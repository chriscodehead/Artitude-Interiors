<?php 
require_once('include.php');
$title = 'Artitude art & interiors | An art & interiors design company made up of talented artists,design gurus & artisans';
require_once('head.php');
?>
<style>
.bi-x::before {
    content: "";
}
a {
  color: #d7cb32;
}
</style>
<body>

  <?php require_once('header.php');?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
      <h1>Check. Our. Services.</h1>
      <h2><div class="col-lg-12 p-1">An art & interiors design company made up of talented artists, design gurus & artisans.</div></h2>
      <div class="d-flex">
        <a href="<?php print $siteWhatsAppLink.'Hi Artitude art & interiors, i want to make enquiries about your services. My name is ....';?>" class="btn-get-started scrollto">Get Intouch</a>
        <a href="<?php print $sqli->getSettings('site_youtube');?>" class="glightbox btn-watch-video"><i class="fa fa-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section>

  <main id="main">


     <section id="services" class="services section-bg bg-black">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p class="text-white"></p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">

    <?php $sql = query_sql("SELECT * FROM $services_tb ORDER BY id DESC");
						$i=1;
						if(mysqli_num_rows($sql)>0){
							while($row = mysqli_fetch_assoc($sql)){?>

          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class=""><img src="productimage/<?php print $row['image'];?>" width="50" height="50"></i>
              <h4><a href="#"><?php print $row['title'];?></a></h4>
              <p><?php print $row['description'];?></p>
            </div>
          </div>

          <?php $i++; }}else{?>
            <h3 class="text-white">No data found!</h3>
              <?php }?>


        </div>

      </div>
    </section>

   

  </main>

  <?php require_once('footer.php');?>
  