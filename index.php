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
      <h1>Artitude. Interiors. Cretivity.</h1>
      <h2><div class="col-lg-12 p-1">An art & interiors design company made up of talented artists, design gurus & artisans.</div></h2>
      <div class="d-flex">
        <a href="<?php print $siteWhatsAppLink.'Hi Artitude art and interiors, i want to make enquiries about your services. My name is ....';?>" class="btn-get-started scrollto">Get Intouch</a>
        <a href="<?php print $sqli->getSettings('site_youtube');?>" class="glightbox btn-watch-video"><i class="fa fa-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section>

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="fa fa-smile" style="color: #d7cb32;"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php print $sqli->getSettings('happy_client');?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Happy Clients</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="fa fa-newspaper" style="color: #d7cb32;"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php print $sqli->getSettings('projects');?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Projects</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="fa fa-clock" style="color: #d7cb32;"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php print $sqli->getSettings('years_of_experience');?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Years of experience</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="fa fa-award" style="color: #d7cb32;"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php print $sqli->getSettings('awards');?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Awards</p>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
            <img src="img/hero-bg1.jpg" class="img-fluid" alt="">
            <a href="<?php print $sqli->getSettings('site_youtube');?>" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>About Us.</h3>
            <span>
              <?php print $sqli->getSettings('about');?>
            </span>
          </div>

        </div>

      </div>
    </section>

    <!-- <section id="features" class="features" style="background: black; color: white;">
      <div class="container" data-aos="fade-up">

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>About Us</h3>
                <p>
                 We are a design firm specializing in art, interiors, and designs. With years of experience in the industry, we have built a reputation for delivering exceptional results that exceed our clients' expectations. Our team is composed of skilled designers, artists, and craftsmen who are passionate about their work and dedicated to creating unique and inspiring spaces.
                </p>
                <p>
              At our company, we believe that design is not just about aesthetics, but also about function, sustainability, and the human experience. We work closely with our clients to understand their needs, preferences, and style, and use this information to create customized solutions that reflect their personality and enhance their quality of life. Whether it's a residential or commercial project, we approach each one with the same level of attention to detail, creativity, and professionalism.
              </p>
               <p>
                Our services range from conceptualization to execution, including space planning, furniture selection, color schemes, lighting, and accessories. We use the latest technology and tools to provide our clients with realistic 3D visualizations of their spaces, so they can have a clear idea of what the final result will look like.
                </p>
                <p>
                We are committed to sustainability and environmental responsibility, and we strive to use eco-friendly materials and techniques in our designs whenever possible. We also collaborate with local artists and artisans to incorporate unique and handmade elements into our projects, adding a personal touch and supporting the local community.
                </p>
                <p>
                  At our company, we are passionate about what we do, and we take pride in our ability to transform spaces into works of art. Contact us today to discuss your project and see how we can bring your vision to life.
                </p> 
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="img/hero-bg1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>


        </div>

      </div>
    </section> -->


    <section id="about-boxes" class="about-boxes">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="img/gate1.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="fa fa-brush"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Mission</a></h5>
                <p class="card-text" style="text-align: justify;">
                  <?php print $sqli->getSettings('mission');?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="img/gate2.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="fa fa-calendar"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Plan</a></h5>
                <p class="card-text" style="text-align: justify;">
                  <?php print $sqli->getSettings('plan');?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="img/gate3.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="fa fa-magnet"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Vision</a></h5>
                <p class="card-text" style="text-align: justify;">
                  <?php print $sqli->getSettings('vision');?>
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


     <section id="services" class="services section-bg bg-black">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p class="text-white">Check our Services</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">

    <?php $sql = query_sql("SELECT * FROM $services_tb ORDER BY id DESC LIMIT 4");
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

          <?php $sql = query_sql("SELECT * FROM $news ORDER BY id DESC LIMIT 6");
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
            <h3 class="text-dark">No data found!</h3>
              <?php }?>


        </div>

      </div>
      <div class="row" style="margin-top: 50px;">
          <center><div class="col-lg-12">
                  <a href="portfolio"><button style="background-color: #d7cb32; paddding:10px;" class="btn btn-block">Gallery</button></a>
                  <a href="portfolio-all"><button style="background-color: #d7cb32; paddding:10px;" class="btn btn-block">See All</button></a>
              </div>
          </center>
        </div>
    </section>

  </main>

  <?php require_once('footer.php');?>
  