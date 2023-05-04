<?php 
require_once('include.php');
$title = 'Artitude art & interiors | An art & interiors design company made up of talented artists,design gurus & artisans';
require_once('head2.php');
?>
<body>
<?php require_once('header2.php');?>
<main class="main-content">
<div class="container-fluid photos">
<div class="row align-items-stretch">

  <?php $sql = query_sql("SELECT * FROM $cat_tb ORDER BY id DESC");
						$i=1;
            $a=0;
            $numbers = array(12, 8, 6, 4, 3, 2);  // create an array of numbers
            $length = count($numbers);  // get the length of the array
            $counter = 0;
						if(mysqli_num_rows($sql)>0){
							while($row = mysqli_fetch_assoc($sql)){ 
                $random_index = rand(0, $length - 1);  
                $random_number = $numbers[$random_index];

                 if($i==1){?>

<div class="col-12 col-md-12 col-lg-12" data-aos="fade-up">
<a href="single.html" class="d-block photo-item">
<img src="images/img_4.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>
              <?php }else{?>
              
<div class="col-6 col-md-6 col-lg-<?php print $random_number;?>" data-aos="fade-up">
<a href="single.html" class="d-block photo-item">
<img src="images/img_4.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>
<?php }?>

<?php $counter++; $i++; $a++; }}else{?>
            <h3 class="text-white">No data found!</h3>
              <?php }?>

<div style="display: none;" class="col-6 col-md-6 col-lg-8" data-aos="fade-up">
<a href="single.html" class="d-block photo-item">
<img src="images/img_4.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_5.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
<a href="single.html" class="d-block photo-item">
<img src="images/img_1.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</a>
 </div>

<div style="display: none;" class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
<a href="single.html" class="d-block photo-item">
<img src="images/img_2.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
<a href="single.html" class="d-block photo-item">
<img src="images/img_3.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="">
<a href="single.html" class="d-block photo-item">
<img src="images/img_6.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_7.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
<a href="single.html" class="d-block photo-item">
<img src="images/img_8.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_9.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
<a href="single.html" class="d-block photo-item">
<img src="images/img_10.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="">
<a href="single.html" class="d-block photo-item">
<img src="images/img_1.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_2.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
<a href="single.html" class="d-block photo-item">
<img src="images/img_3.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-8" data-aos="fade-up" data-aos-delay="">
<a href="single.html" class="d-block photo-item">
<img src="images/img_4.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_5.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="">
<a href="single.html" class="d-block photo-item">
<img src="images/img_6.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_7.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
<a href="single.html" class="d-block photo-item">
<img src="images/img_8.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>

<div style="display: none;" class="col-6 col-md-6 col-lg-8" data-aos="fade-up" data-aos-delay="100">
<a href="single.html" class="d-block photo-item">
<img src="images/img_9.jpg" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading">Photos Title Here</h3>
<span class="meta">42 Photos</span>
</div>
</div>
</a>
</div>



</div>
<?php require_once('footer2.php');?>