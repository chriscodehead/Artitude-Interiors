<?php $actova1=''; $actova2=''; $actova3=''; $actova4=''; $actova5=''; $actova6=''; $actova7=''; $actova8=''; $actova9='active'; $actova10='';?>
<?php require_once('../../con-cot/conn_sqli.php'); ?>
<?php require_once('../../lib/basic-functions.php'); ?>
<?php require_once('../../library.php'); ?>
<?php require_once('../../select-library.php'); ?>
<?php require_once('../../emails_lib.php'); ?>
<?php $bassic->checkLogedINAdmin('login');?>
  <?php 
$msg=''; $img_error2=''; $img_error='';

if(isset($_POST['post'])){
			$msg = $_POST['msg'];
			$name = $_POST['name'];
			$title = $_POST['title'];
			$category = $_POST['category'];
      $url_info = str_replace(' ', '-', $title);
      $blog_id = preg_replace('/[^A-Za-z0-9\-]/', '', $url_info);
      

			if(!empty($msg )&&!empty($name)&&!empty($title)){
                      $file = $_FILES['file'];
                      $fileType = $file['type'];
                      $pic_name  = $_FILES['file']['name'];
                      $pic_tmp = $_FILES['file']['tmp_name'];
                      $pic_size = $_FILES['file']['size'];
                     
                      
                      if(!empty($pic_name)){
                        $gen_Num = $bassic->randGenerator();
                        $extension_Name = $bassic->extentionName($pic_name);
                        $new_name = $blog_id.$gen_Num.uniqid().$extension_Name;
                        $path = '../../photo/'.$new_name;
                        $file = $site.'/photo/'.$new_name;
                        //$picvalidation = $bassic->picVlidator($pic_name,$pic_size);
                        //if(empty($picvalidation)){
                        $upl = $bassic->uploadImage($pic_tmp,$path);
                          //}else{$img_error = $picvalidation;}
                          // Set the path and name of the watermark image
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

                        }else{$img_error2 =  'Please browse a file!';}

										  $fieldup = array("id","blog_id","title","news","admin_name","date_post","top_massage","post_image","category");
										  $valueup = array(null,$blog_id,$title,$msg,$name,$bassic->getDate2(),'0',$new_name,$category);
										  $update = $cal->insertDataB($news,$fieldup,$valueup);
											if(!empty($update)){
												$sel =mysqli_query($link,"SELECT * FROM user_tb ");
												while($row = mysqli_fetch_array($sel)){
													 $email_call->MailDispatcha($row['email'],$msg,$title,$file);
													}
												//$msg = $update;
												if($update == 'Registration was successful. Proceed to login!'){
													$msg ='Message was post successfully! '.$img_error.' '.$img_error2;
													}else{
														$msg = $update;
														}
											  }else{/*do nothing*/}
			}else{$msg = 'Please fill all fields';}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Portfolio | ';
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
					<h3 class="page-header"><i class="fa fa-laptop"></i> Portfolio</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li>
						<li><i class="fa fa-laptop"></i> Post Portfolio</li>	
                        <li><i class="fa fa-laptop"></i><a href="new-view"> View Post Portfolio</a></li>						  	
					</ol>
				</div>
			</div>

 <?php if(!empty($msg)){?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-warning" style="text-align: center; color:#FFF;"><?php print @$msg;?> <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
<?php }else{?>
 <div class="row">
         <div id="go" class=" col-lg-12">
        <div id="go" class="alert alert-warning" style="text-align: center; color:#000;"><!-- NOTE: Portfolio Post here will automatically be forwarded to all registered members email in this site ensure you handle with all accuracy. --> <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
    <?php }?>        
         <div class="row">
         
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
					 <form action="" method="post" enctype="multipart/form-data">  
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                     <tr>
                                        	<td>Portfolio Title</td>
                                            <td><input class="form-control" value="" name="title" >
                                            </td>
                                        </tr>
                                        <tr>
                                        <td> Portfolio Category</td>
                                        <td> <select class="form-control" name="category">
                                          <option value="">Select Category</option>
                                          <?php $sql = query_sql("SELECT * FROM $cat_tb ORDER BY id DESC");
                                                $i=1;
                                            if(mysqli_num_rows($sql)>0){
                                              while($row = mysqli_fetch_assoc($sql)){?>

                                                  <option value="<?php print $row['p_id'];?>"><?php print $row['title'];?></option>

                                                  <?php }}?>

                                              </select>
                                              <a href="create-category">Create New Category</a>
                                        </td>
                                    </tr>
                                        <tr>
                                        	<td>Portfolio Description</td>
                                            <td>
                                            
                                            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
                                          
                                            <script>tinymce.init({selector:'textarea'});</script>
                                            
                                            <textarea class="form-control" value="" name="msg" ></textarea>
                            
                                            </td>
                                        </tr>

                                        <tr>
                                        <td> Admin Name</td>
                                        <td> <input  name="name" type="text" class="form-control" id="" /></td>
                                        </tr>
                                        <tr>
                                        <td> Attach File</td>
                                        <td> <input  name="file" type="file" class="form-control" id="" /></td>
                                        </tr>
                                        <tr>
                                        	<td></td>
                                            <td><input class="btn btn-primary" type="submit" name="post" value="Post" /></td>
                                        </tr>
                                    </tbody>
                            </table></form>   
              </div>
         </div><!--/.row-->
              
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