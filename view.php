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
$item = new item($DB_con);

if(array_key_exists('view_id',$_GET)) {

    $view_item = $item->getEditItemRow($_GET);

}

include_once("header.php")

?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Item View</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">All User</li>
			</ol>
		</div>
	</div>
</div>



<div class="container">
	<div class="row ">
		<?php include_once("side_menu.php")?>
		<div class="col-md-9">
			<div class="">
				<div class="panel-default border">
					<div class="panel-heading">View Item</div>
					<div class="panel-body">

						<div class="row">
							<div class="col-md-3 ">
								<h4>Item-Img: </h4>
							</div>
							<div class="col-md-9">
								<img  src="itemimg/<?php echo $view_item['item_pic']; ?>" alt="" class="pull-left prof-img p-img" style="margin: 0 20px 20px 0" >
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<h4>Item Name: </h4>
							</div>
							<div class="col-md-9">
								<p class="p1"><?php echo $view_item['item_name']; ?><p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<h4>Item Create Date: </h4>
							</div>
							<div class="col-md-9">
								<p class="p1"><?php echo $view_item['item_create_dt']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<h4>Item Key </h4>
							</div>
							<div class="col-md-9">
								<p class="p1"><?php echo $view_item['item_key']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<h4>Item Description: </h4>
							</div>
							<div class="col-md-9">
								<p class="p2"><?php echo $view_item['item_description']; ?></p>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php include_once("footer.php")?>