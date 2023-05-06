<?php 
require_once('include.php');
$title = 'Portfolio | An art & interiors design company made up of talented artists,design gurus & artisans';
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
            $numbers = array(2, 4, 6);  // create an array of numbers
            $length = count($numbers);  // get the length of the array
            $counter = 0;
						if(mysqli_num_rows($sql)>0){
							while($row = mysqli_fetch_assoc($sql)){ 
                $random_index = rand(0, $length - 1);  
                $random_number = $numbers[$random_index];

                 if($i==1){?>

<div class="col-12 col-md-12 col-lg-12" data-aos="fade-up">
<a href="single?id=<?php print $row['p_id'];?>" class="d-block photo-item">
<img src="productimage/<?php print $row['cat_cover']?>" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading"><?php print $row['title']?></h3>
<span class="meta"><?php print $sqli->countCate($row['p_id']);?> Photos</span>
</div>
</div>
</a>
</div>
              <?php }else{?>
              
<div class="col-6 col-md-6 col-lg-<?php print $random_number;?>" data-aos="fade-up">
<a href="single?id=<?php print $row['p_id'];?>" class="d-block photo-item">
<img src="productimage/<?php print $row['cat_cover']?>" alt="Image" class="img-fluid">
<div class="photo-text-more">
<div class="photo-text-more">
<h3 class="heading"><?php print $row['title']?></h3>
<span class="meta"><?php print $sqli->countCate($row['p_id']);?> Photos</span>
</div>
</div>
</a>
</div>
<?php }?>

<?php $counter++; $i++; $a++; }}else{?>
           <center> <h3 class="text-white">
              <div style="padding: 40px;">No data found!</div></h3></center>
              <?php }?>

</div>
<?php require_once('footer2.php');?>