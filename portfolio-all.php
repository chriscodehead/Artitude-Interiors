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
      <h1>CheckOur. Our. Portfolio.</h1>
      <h2><div class="col-lg-12 p-1">An art and interiors design company made up of talented artists, design gurus & artisans.</div></h2>
      <div class="d-flex">
        <a href="<?php print $siteWhatsAppLink.'Hi Artitude art & interiors, i want to make enquiries about your services. My name is ....';?>" class="btn-get-started scrollto">Get Intouch</a>
        <a href="<?php print $sqli->getSettings('site_youtube');?>" class="glightbox btn-watch-video"><i class="fa fa-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section>

  <main id="main">


    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Check our Portfolio</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <!-- <li data-filter="*" class="filter-active">All</li> -->
              <!-- <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php $sql = query_sql("SELECT * FROM $news ORDER BY id DESC");
						$i=1;
						if(mysqli_num_rows($sql)>0){
							while($row = mysqli_fetch_assoc($sql)){?>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="photo/<?php print $row['post_image'];?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4 class="text-black"><?php print $bassic->reduceTextLength($row['title'],30);?></h4>
                  <p><?php print $bassic->reduceTextLength($row['news'],70);?></p>
                  <a href="photo/<?php print $row['post_image'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?php print $row['title'];?>"><i class="fa fa-plus"></i></a>
                  <a href="portfolio-details?id=<?php print $row['id'];?>" class="details-link" title="More Details"><i class="fa fa-link"></i></a>
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
  