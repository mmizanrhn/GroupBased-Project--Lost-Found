<?php
session_start();
include_once('vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\item;

if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){

    header("Location:index.php");
}
/*include_once("src/allinclude.php");*/
// create Object of item Class
$DB_con= db::connect();
$get_items = new item($DB_con);

$items = $get_items->getAllItems($_SESSION['user_id']);

include_once("header.php")
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">All Item</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">All User</li>
			</ol>
		</div>
	</div>
</div>



<div class="container">
	<div class="row ">
		<?php include_once('side_menu.php')?>
		<div class="col-md-9">
			<div class="">
                <?php

                if(array_key_exists("mess",$_GET) AND $_GET['mess']=='success'){
                   // echo '<div class="alert alert-danger"> <strong>You Doing Something Wrong !!!! </strong></div>' ;

                    echo  '<div class="alert alert-success">
                        <strong>Your Item Add Successfully</strong>
                    </div>';

                }else if (array_key_exists("mess",$_GET) AND $_GET['mess']=='success'){
                    echo  '<div class="alert alert-success">
                        <strong>Your Item Info Update Successfully.</strong>
                    </div>';

                }else if(array_key_exists("mess",$_GET) AND $_GET['mess']=='delete'){
                    echo  '<div class="alert alert-success">
                        <strong>Your Item Delete Successfully.</strong>
                    </div>';
                }else if(array_key_exists("mess",$_GET) AND $_GET['mess']=='update'){
                    echo  '<div class="alert alert-success">
                        <strong>Item Data Update Successfully.</strong>
                    </div>';
                } else {

                }

                ?>

                <?php

                if($items == 'true') {
                    ?>
                    <div class="alert alert-success center-block" role="alert"><h1>You Don't have any item please add</h1></div>
                  <a class="btn btn-lg btn-success marginbottom20 center-block"  href="insert_item.php"><i class="glyphicon glyphicon-plus"></i>Add Item</a>

<?php }else if($items){?>
                    <div class="panel-default border">


                        <div class="panel-heading">Add-Item</div>
                        <div class="panel-body">
                            <a class="btn btn-success marginbottom20"  href="insert_item.php"><i class="glyphicon glyphicon-plus"></i>Add Item</a>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item Category</th>
                                    <th>Item Key</th>
                                    <th>Create Date</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                <tr>

                                    <?php  foreach($items as $item){   ?>
                                    <td><?php echo $item['item_name']; ?></td>
                                    <td><?php echo $item['item_category']; ?></td>
                                    <td><?php echo $item['item_key']; ?></td>
                                    <td><?php echo $item['item_create_dt']; ?></td>
                                    <td><img src="itemimg/<?php echo $item['item_pic']; ?>" width="60px"/> </td>
                                    <td class="center">

                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Go Action  <span class="caret"></span></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="view.php?view_id=<?php echo $item['id']; ?>"><i class="fa fa-eye"></i> View </a></li>
                                                <li><a href="insert_item.php?edit_item=<?php echo $item['id']; ?>"><i class="fa fa-pencil"></i>Edit</a></li>
                                                <li><a href="src/action/item_delete.php?dl_id=<?php echo $item['id']; ?>"><i class="fa fa-times"></i>Delete</a></li>
                                                <li><a href="#"><i class="fa fa-file-pdf-o"></i> Pdf</a></li>

                                            </ul>
                                        </div>
                                    </td>


                                </tr>

                                <?php }   ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

    <?php }?>

			</div>
		</div>
	</div>
</div>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br/>
        </div>
        <div class="modal-body">
          <p>Are You Shure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>







<?php include_once("footer.php")?>