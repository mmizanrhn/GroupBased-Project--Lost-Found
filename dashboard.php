<?php
session_start();

if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){

   header("Location:index.php");

}
    include_once("src/allinclude.php");

$user = new user($DB_con);

$user_profile = $user->profileData($_SESSION);

if(isset($user_profile['user_name'])) {
    $_SESSION['user_name'] = $user_profile['user_name'];
    $_SESSION['user_img'] = $user_profile['user_img'];
}


include_once("header.php")


?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">All User</h1>
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
			<div class="row">
				<div class="col-md-6" style="margin-bottom: 30px;">
				<div class="panel panel-info">
					<!-- Default panel contents -->
					<div class="panel-heading">Panel heading</div>
					<div class="panel-body">
						<p>...</p>
					</div>
				</div>
			</div>

				<div class="col-md-6" style="margin-bottom: 30px;">
					<div class="panel panel-info">
						<!-- Default panel contents -->
						<div class="panel-heading">Panel heading</div>
						<div class="panel-body">
							<p>...</p>
						</div>
					</div>
				</div>

				<div class="col-md-6" style="margin-bottom: 30px;">
					<div class="panel panel-info">
						<!-- Default panel contents -->
						<div class="panel-heading">Panel heading</div>
						<div class="panel-body">
							<p>...</p>
						</div>
					</div>
				</div>

				<div class="col-md-6" style="margin-bottom: 30px;">
					<div class="panel panel-info">
						<!-- Default panel contents -->
						<div class="panel-heading">Panel heading</div>
						<div class="panel-body">
							<p>...</p>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>
</div>
</div>








<div class="container-fluid footer">
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p class="text-center">Copyright &copy; Company 2013</p>
			</div>
		</div>
	</div>
</div>
</div>


<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js">
</script>
<script src="js/modern-business.js"></script>
<script type="text/javascript" src="js/wowslider.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" class="init">

	$(document).ready(function() {
		$('#example').DataTable();
	} );

</script>
</body>

</html>
