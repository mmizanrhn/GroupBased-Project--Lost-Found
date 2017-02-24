<?php
session_start();

if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){

    header("Location:index.php");
}


include_once("src/allinclude.php");
// create Object of item Class
$user = new user($DB_con);

$user_profile = $user->profileData($_GET);


include_once("header.php")
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Profile View</h1>
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
					<div class="panel-heading">Profile</div>
					<div class="panel-body">

						<div class="row">
							<div class="col-md-12">
								<img  src="profileimg/<?php echo $user_profile['user_img']; ?>" alt="" class="pull-left prof-img" style="margin: 0 20px 20px 0">
								<div class="pro-desc pull-right">
									<h3><strong><?php echo $user_profile['user_name'] ; ?></strong></h3>

									<table class="table table-striped">
										<tbody>
																				<tr>
											<td>Email</td>
											<td><a><?php echo $user_profile['user_email'];  ?></a></td>
										</tr>
										<tr>
											<td>Phone</td>
											<td><?php echo $user_profile['user_number'];  ?></td>
										</tr>
										<tr>
											<td>Location</td>
											<td><?php echo $user_profile['user_country']; ?></td>
										</tr>
										<tr>
											<td>Address</td>
											<td><?php echo $user_profile['user_address']; ?></td>
										</tr>
										<tr>
											<td>Date of Birth</td>
											<td>
                                                <?php echo $user_profile['user_dob'];  ?>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
					</div>
						<div class="row">
							<div class="col-md-12 ">
								<h3>About Me</h3>
                                <p><?php echo $user_profile['user_des'];  ?></p>
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