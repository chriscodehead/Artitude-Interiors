<?php $actova1=''; $actova2=''; $actova3=''; $actova4=''; $actova5=''; $actova6=''; $actova7=''; $actova8=''; $actova9=''; $actova91ee='active'; $actova44w='';?>
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
    $url_info = str_replace(' ', '-', $title);
    $theurl = preg_replace('/[^A-Za-z0-9\-]/', '', $url_info);


	if(!empty($title)){

              $pic_name  = $_FILES['file']['name'];
              $pic_tmp = $_FILES['file']['tmp_name'];
              $pic_size = $_FILES['file']['size'];
              $passportIn = $cal->selectFrmDB($cat_tb,'cat_cover','id',$_GET['id']);
              if(!empty($pic_name)){
                   $gen_Num = $bassic->randGenerator();
                   $extension_Name = $bassic->extentionName($pic_name);
                   $new_name = $gen_Num.uniqid().$extension_Name;
                   $path = '../../productimage/'.$new_name;
                   if($passportIn=='avatar.png'){}else{
                     $bassic->unlinkFile($passportIn,'../../productimage/');
                   }
                     $upl = $bassic->uploadImage($pic_tmp,$path);

                  $fieldup = array("title","cat_cover");
                  $valueup = array($title,$new_name);
                  $update = $cal->update($cat_tb,$fieldup,$valueup,'id',$_GET['id']);
                  if(!empty($update)){
                        $msg = $update;
                    }else{/*do nothing*/}

                }else{

                  $fieldup = array("title");
                  $valueup = array($title);
                  $update = $cal->update($cat_tb,$fieldup,$valueup,'id',$_GET['id']);
                  if(!empty($update)){
                        $msg = $update;
                    }else{/*do nothing*/}

                }

            
	}else{$msg = 'Please fill all fields';}
}


?>

<?php if(isset($_GET['done'])&&!empty($_GET['done'])){$msg = $_GET['done'];}?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Create Category';
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
					<h3 class="page-header"><i class="fa fa-laptop"></i> Edit Category</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="../host-admin/">Home</a></li></li>
      <li><i class="fa fa-laptop"></i><a href="create-category"> Create Category</a></li>  	
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
        <div id="go" class="alert alert-warning" style="text-align: center; color:#000;">NOTE: You can add category here. Thanks <i id="remove" class="fa fa-remove pull-right"></i></div>
        </div>
 </div>
    <?php }?>        
         <div class="row">
    
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
					 <form action="" method="post" enctype="multipart/form-data">  
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                    <tr>
                                    	<td><h3>Add Category</h3></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label>Category Name: (Note: Do not add special character eg: '/@ etc)</label>
                                        <input class="form-control" type="text" value="<?php echo @$cal->selectFrmDB($cat_tb,'title','id',$_GET['id'])?>" name="title" >
                                        </td>
                                    </tr>
                                    <tr>
                                         <td><label>Category Image: <img src="../../productimage/<?php echo @$cal->selectFrmDB($cat_tb,'cat_cover','id',$_GET['id']);?>" width="40px"></label>
                                         <input type="file" class="form-control" value="" name="file" >
                                         </td>
                                        </tr>
                                    <tr>
                                            <td align="right"><input class="btn btn-primary" type="submit" name="post" value="Post" /></td>
                                        </tr>    
                                    </tbody>
                            </table></form>   
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
