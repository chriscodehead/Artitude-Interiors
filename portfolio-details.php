<?php 
require_once('include.php');
$title = 'Artitude art & interiors | An art & interiors design company made up of talented artists,design gurus & artisans';
require_once('head2.php');
if(isset($_GET['id'])&&!empty($_GET['id'])){}else{header("Location:portfolio");}
?>
<body>
<?php require_once('header2.php');?>
<main class="main-content">
<div class="container-fluid photos">
<div class="row pt-4 text-center">
<div class="col-12">
<h2 class="text-white mb-4"><?php print $sqli->getSingleSettings('title', $_GET['id']);?></h2>
</div>
</div>
<div class="row align-items-stretch">


<?php $sql = query_sql("SELECT * FROM $news WHERE `id`='".$_GET['id']."' ORDER BY id DESC");
						$i=1;
						if(mysqli_num_rows($sql)>0){
							while($row = mysqli_fetch_assoc($sql)){?>

            <div class="col-12 col-md-12 col-lg-12" data-aos="fade-up">
            <a href="photo/<?php print $row['post_image'];?>" class="d-block photo-item" data-fancybox="gallery">
            <img src="photo/<?php print $row['post_image'];?>" alt="Image" class="img-fluid">
            <div class="photo-text-more">
            <span class="icon icon-search"></span>
            </div>
            </a>
            <center>
              <?php print $row['news'];?>
            </center>
            </div>

      <?php $i++; }}else{?>
    <h3 class="text-white">No data found!</h3>
  <?php }?>


</div>

<?php require_once('footer2.php');?>