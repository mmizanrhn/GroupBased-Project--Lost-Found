<?php
session_start();
if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){

    header("Location:index.php");
}
include_once("header.php")

?>
<link rel = "stylesheet" media = "screen" href="css/timepicker.css" charset="utf-8" />
<link rel = "stylesheet" media = "screen" href="css/jquery-ui-1.9.0.custom.min.css" charset="utf-8" />


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Update Item</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">Update Item</li>
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
					<div class="panel-heading">Update Item</div>
					<div class="panel-body">
						<form action="" method="" class="form-horizontal" >
							<div class="form-group">
								<label class="control-label col-sm-3" >Item Name:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="item_name" value="" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Category:</label>
								<div class="col-sm-9">
									<select class="form-control width80">
										<optgroup label="Select Category">
											<option value="Bag">Bag</option>
											<option value="Dress">Dress</option>
											<option value="Watch">Watch</option>
											<option value="Vehicle">Vehicle</option>
										</optgroup>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Update Date-time:</label>
								<div class="col-sm-9">

									<input class="form-control width80 datetimepicker" id="end_time" name="address" value="" placeholder="Date time">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3">About Item:</label>
								<div class="col-sm-9">
									<textarea class="form-control width80" rows="5" id="comment"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Upload File:</label>
								<div class="col-sm-9">
									<input type="file" class="form-control width50"></input>
								</div>
							</div>


							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-success">Update</button>
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
		$("#start_time").datetimepicker({yearRange: 'c-20:c+10', dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, timeFormat: "HH:mm:ss"});
		$("#end_time").datetimepicker({yearRange: 'c-20:c+10', dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, timeFormat: "HH:mm:ss"});
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

