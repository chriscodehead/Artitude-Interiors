<?php $actova1=''; $actova2=''; $actova3=''; $actova4=''; $actova5=''; $actova6=''; $actova7=''; $actova8=''; $actova9=''; $actova10=''; $actova44ww='active';?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php require_once('../../emails_lib.php');
?>
<?php $bassic->checkLogedINAdmin('login');?>
 <?php
$msg='';$coin='';
?>

<?php 
if(isset($_POST['post'])){
	$title = mysqli_real_escape_string($link,$_POST['title']);
	$des = mysqli_real_escape_string($link,$_POST['des']);
    $url_info = str_replace(' ', '-', $title);
    $blog_id = preg_replace('/[^A-Za-z0-9\-]/', '', $url_info);
    $file = $_FILES['file'];
    $fileType = $file['type'];
    $pic_name  = $_FILES['file']['name'];
    $pic_tmp = $_FILES['file']['tmp_name'];
    $pic_size = $_FILES['file']['size'];

	if(!empty($title)&&!empty($des)&&!empty($pic_name)){

    $gen_Num = $bassic->randGenerator();
    $extension_Name = $bassic->extentionName($pic_name);
    $new_name = $blog_id.$gen_Num.uniqid().$extension_Name;
    $path = '../../productimage/'.$new_name;
    $picvalidation = $bassic->picVlidator($pic_name,$pic_size);
    if(empty($picvalidation)) {
        $upl = $bassic->uploadImage($pic_tmp,$path);

        $watermark = '../../watermark.png';
        $imageSize = getimagesize($path);
        $width = $imageSize[0];
        $height = $imageSize[1];

        // Create a new image from the uploaded file
        if($fileType == 'image/jpeg'){
            $image = imagecreatefromjpeg($path);
        } elseif($fileType == 'image/png'){
            $image = imagecreatefrompng($path);
        }else{
            $image = imagecreatefromjpeg($path);
        }

        // Create a new image from the watermark file
        $watermarkImg = imagecreatefrompng($watermark);

        // Set the position of the watermark image
        $watermarkImgX = ($width / 2) - (imagesx($watermarkImg) / 2);
        $watermarkImgY = ($height / 2) - (imagesy($watermarkImg) / 2);

        // Apply the watermark to the uploaded image
        imagecopy($image, $watermarkImg, $watermarkImgX, $watermarkImgY, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg));

        // Save the modified image to a file
        if($fileType == 'image/jpeg'){
            imagejpeg($image, $path);
        } elseif($fileType == 'image/png'){
            imagepng($image, $path);
        }else{
            imagejpeg($image, $path);
        }

        // Free up memory
        imagedestroy($image);
        imagedestroy($watermarkImg);

        if(empty($upl)) {

        if(query_sql("INSERT INTO $services_tb VALUES(null,'".$title."','".$des."','".$new_name."','".$bassic->getDate()."' )")){
       $msg = 'Insert successfully!';
      }else{
       $msg = 'Action Failed!';
      }
     }else{$msg =  $upl;}
    }else{$msg =  $picvalidation;}
			}else{$msg = 'Please fill all fields';}
}

if(isset($_GET['id'])&&!empty($_GET['id'])){
	   $getid = $_GET['id'];
	   $getst = $_GET['st'];
	   if($getst==1){
		   $sats = 0;
	   }else{
		   $sats = 1;
	   }
	   if(!empty($getid)){
			$fields = array('status');
			$values = array($sats);
			$msg = $cal->update($services_tb,$fields,$values,'id',$getid);	
			header("location:services?done=".$msg);
	   }
	 }
?>
<?php 
if(isset($_GET['iddel'])&&!empty($_GET['iddel'])){
   $p_id = $_GET['iddel'];
   $passportIn = $cal->selectFrmDB($services_tb,'image','id',$p_id);
   if (!empty($passportIn)){
     $bassic->unlinkFile($passportIn, '../../productimage/'); 
    if(query_sql("DELETE FROM $services_tb WHERE `id`='".$_GET['iddel']."' LIMIT 1")){
     $msg = 'Delete process was successful!';
     header("location:services?done=".$msg);
    }else{
     $msg = 'Info Faild to delete!';
     header("location:services?done=".$msg);
    }
   }
}
?>
<?php if(isset($_GET['done'])&&!empty($_GET['done'])){$msg = $_GET['done'];}?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Services';
 require_once('head.php')?>
  <body>
  <!-- container section start -->
  <section id="container" class="" style="margin-bottom:100px;">
  <?php require_once('header.php')?>
<?php require_once('sidebar.php')?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Clients Review</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li></li>						  	
					</ol>
				</div>
			</div>

 <?php if(!empty($msg)){?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-success" style="text-align: center; color:#333;"><?php print @$msg;?> <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
<?php }else{?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-warning" style="text-align: center; color:#000;">NOTE: You can also add review from here. Thanks <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
    <?php }?>        
         <div class="row">
    
          	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
					 <form action="" method="post" enctype="multipart/form-data">  
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                    <tr>
                                    	<td><h3>Upload Services</h3></td>
                                    </tr>
                                    <tr>
                                            <td>
                                            <label>Enter Title:</label>
                                            <input class="form-control" type="text" value="" id="title" name="title" >
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                            <label>Description:</label>
                                            <textarea class="form-control" id="des" name="des"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                         <td><label>Services Image(800 X 800):</label>
                                         <input type="file" class="form-control" value="" name="file" >
                                         </td>
                                        </tr>
                                        <tr>
                                            <td align="right"><input class="btn btn-primary" type="submit" name="post" value="Post" /></td>
                                        </tr>
                                    </tbody>
                            </table></form>   
              </div>
    
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="panel">
                            <div class="panel-heading">Recent Manipulation</div>
                            <div class="table-responsive">
                                <table class="table table-hover manage-u-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;" class="text-center">#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th> Image</th>
                                            <th> Date</th>
                                            <th> Remove</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                  <?php $sql = query_sql("SELECT * FROM $services_tb ORDER BY id DESC");
										$i=1;
						if(mysqli_num_rows($sql)>0){
							while($row = mysqli_fetch_assoc($sql)){?>
									<tr>
									    <th class="text-center"><?php print $i;?></th>
										<th><i class="fa fa-dot-circle-o complete"></i> <?php print $row['title'];?></th>
										<td><?php print $bassic->reduceTextLength($row['description'],50);?></td>
										<td><a target="_blank" href="../../productimage/<?php print $row['image'];?>"><img src="../../productimage/<?php print $row['image'];?>" width="50" height="50"></a></td>
										<td><?php print $row['date'];?></td>
										<td><a data-toggle="modal" href="#myModalWWW<?php print $row['id'];?>"><i class="btn btn-danger fa fa-trash-o"></i></a></td>
				
                                   
                                   <!-- Modal -->
		    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalWWW<?php print $row['id'];?>" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Delete Services ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Are you sure you want to delete this item</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <a href="services?iddel=<?php print $row['id'];?>">
								  <span class="btn btn-danger">Delete</span>
								  </a>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
                                    </tr>
                          <?php $i++; }}else{?><tr><td colspan="5">
                                          <h3>No data found!</h3>
										 </td></tr>
                                           <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
               
                

			
		</section>
   
      <!--main content end-->
  </section>
  <!-- container section start -->
</section>
 
  	

    <!-- javascripts -->
  <?php require_once('jsfiles.php')?>
    <!-- charts scripts -->
  </body>
</html>
