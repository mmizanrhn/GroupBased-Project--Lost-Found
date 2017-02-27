<?php
session_start();
include_once('vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\user;
if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){

    header("Location:index.php");
}


/*include_once("src/allinclude.php");*/
// create Object of item Class

$DB_con= db::connect();

$user = new user(db::$DB_con);

$user_profile = $user->profileData($_GET);


if(isset($user_profile['user_img']) AND isset($user_profile['user_name'])) {

    $_SESSION['user_name'] = $user_profile['user_name'];
    $_SESSION['user_img'] = $user_profile['user_img'];
}

include_once("header.php")

?>
<link rel = "stylesheet" media = "screen" href="css/timepicker.css" charset="utf-8" />
<link rel = "stylesheet" media = "screen" href="css/jquery-ui-1.9.0.custom.min.css" charset="utf-8" />


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Profile Setting</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">Profile Setting</li>
			</ol>
		</div>
	</div>
</div>



<div class="container">
	<div class="row ">
		<?php include_once("side_menu.php")?>
		<div class="col-md-9">

            <?php
            if(array_key_exists('error',$_GET)){
                echo '<div class="alert alert-danger">';
                foreach ($_GET['error'] as $err){
                    echo '<ul><li>'.$err.'</ul></li>';
                }
                echo '</div>';
            }else if(array_key_exists("mess",$_GET) AND $_GET['mess']=='success') {

                echo '<div class="alert alert-success">
                        <strong>Your Profile Info Update Successfully.</strong>
                    </div>';

            }

            ?>
			<div class="">
				<div class="panel-default border">
					<div class="panel-heading">Profile Setting</div>
					<div class="panel-body">
						<form action="src/action/user_data_insert.php" method="post" enctype="multipart/form-data" class="form-horizontal" >
							<div class="form-group">
								<label class="control-label col-sm-3" >Name:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="user_name" value="<?php echo $user_profile['user_name'] ; ?>" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Email:</label>
								<div class="col-sm-9">
									<input class="form-control width80"  name="user_email" value="<?php echo $user_profile['user_email'];  ?>" placeholder="Enter Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Mobile:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="user_number" value="<?php echo $user_profile['user_number'];  ?>" placeholder="Enter Mobile" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Address:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="user_address" value="<?php echo $user_profile['user_address']; ?>" placeholder="Enter EAddress" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Select City:</label>
								<div class="col-sm-9">
									<select name="user_country" class="form-control width80" >
										<optgroup label="District">
											<option value="Dhaka"<?php if($user_profile['user_country'] == 'Dhaka'): ?> selected="selected"<?php endif; ?>>Dhaka</option>
											<option value="Borishal"<?php if($user_profile['user_country'] == 'Borishal'): ?> selected="selected"<?php endif; ?>>Borishal</option>
											<option value="Khulna"<?php if($user_profile['user_country'] == 'Khulna'): ?> selected="selected"<?php endif; ?>>Khulna</option>
											<option value="Sylhet"<?php if($user_profile['user_country'] == 'Sylhet'): ?> selected="selected"<?php endif; ?>>Sylhet</option>
											<option value="Pabna"<?php if($user_profile['user_country'] == 'Pabna'): ?> selected="selected"<?php endif; ?>>Pabna</option>
										</optgroup>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Date Of Birth:</label>
								<div class="col-sm-9">

									<input class="form-control width80 datepicker" id="end_time" name="user_dob" value="<?php echo $user_profile['user_dob'];  ?>" placeholder="Date time">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3">About You:</label>
								<div class="col-sm-9">
									<textarea class="form-control width80" rows="5" name="user_des" id="comment"><?php echo $user_profile['user_des'];  ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Upload File:</label>

								<div class="col-sm-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"><img id="img" width="150px" height="140px"  src="profileimg/<?php echo $user_profile['user_img']; ?>"/> </div>

                                        <input type="hidden" class="form-control width50" value="<?php echo $user_profile['user_img']; ?>" name ="user_img">
                                        <input type="hidden" class="form-control width50" value="<?php echo $user_profile['id']; ?>" name ="user_id">
										<input type="file" class="form-control width50" name ="user_img">

                                        <div>
								</div>
							</div>


							<div class="form-group" style="margin-top:20px">
							<label class="ol-sm-3"></label>
								<div class="col-sm-9">
									<button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
									<button type="reset" class="btn btn-info">Reset</button>
									<button type="button" class="btn btn-danger">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
</div>
</div>


<?php include_once("footer.php")?>

<script src="js/jquery-ui-1.9.0.custom.min.js"></script>
<script src="js/timepicker.js"></script>

<script>
	$(document).ready(function (e) {
		$("#start_time").datepicker({yearRange: 'c-20:c+10', dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, timeFormat: "HH:mm:ss"});
		$("#end_time").datepicker({yearRange: 'c-20:c+10', dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, timeFormat: "HH:mm:ss"});
	});
</script>
<script type="text/javascript">
	$(function(){
		$('.column').equalHeight();
	});


	var matched, browser;

	jQuery.uaMatch = function( ua ) {
		ua = ua.toLowerCase();

		var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
				/(webkit)[ \/]([\w.]+)/.exec( ua ) ||
				/(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
				/(msie) ([\w.]+)/.exec( ua ) ||
				ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
				[];

		return {
			browser: match[ 1 ] || "",
			version: match[ 2 ] || "0"
		};
	};

	matched = jQuery.uaMatch( navigator.userAgent );
	browser = {};

	if ( matched.browser ) {
		browser[ matched.browser ] = true;
		browser.version = matched.version;
	}

	// Chrome is Webkit, but Webkit is also Safari.
	if ( browser.chrome ) {
		browser.webkit = true;
	} else if ( browser.webkit ) {
		browser.safari = true;
	}

	jQuery.browser = browser;


</script>

