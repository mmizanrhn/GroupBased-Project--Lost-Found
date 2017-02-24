<?php include_once("header.php")?>
	<link rel = "stylesheet" media = "screen" href="css/timepicker.css" charset="utf-8" />
	<link rel = "stylesheet" media = "screen" href="css/jquery-ui-1.9.0.custom.min.css" charset="utf-8" />

<!--	<style>-->
<!--		input{width: 80%!important;}-->
<!--		select{width:80%!important}-->
<!--		textarea{width:80%!important }-->
<!--	</style>-->


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Profile</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">Edit Profile</li>
			</ol>
		</div>
	</div>
</div>



<div class="container">
	<div class="row ">

		<?php include_once ("side_menu.php")?>
		<div class="col-md-9">
			<div class="">
				<div class="panel-default border">
					<div class="panel-heading">Add-Item</div>
					<div class="panel-body">
						<form action="" method="" class="form-horizontal" >
							<div class="form-group">
								<label class="control-label col-sm-3" >Name:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="name" value="" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Email:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="email" value="" placeholder="Enter Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Mobile:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="mobile" value="" placeholder="Enter Mobile" type="number">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Address:</label>
								<div class="col-sm-9">
									<input class="form-control width80" name="address" value="" placeholder="Enter EAddress" type="email">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Select City:</label>
								<div class="col-sm-9">
									<select class="form-control width80" >
										<optgroup label="Central Time Zone">
											<option value="Dhaka">Dhaka</option>
											<option value="Borishal">Borishal</option>
											<option value="Khulna">Khulna</option>
											<option value="Sylhet">Sylhet</option>
											<option value="Pabna">Pabna</option>
										</optgroup>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">DateTime:</label>
								<div class="col-sm-9">

									<input class="form-control datetimepicker width80" id="end_time" name="address" value="" placeholder="Date time">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3">About You:</label>
								<div class="col-sm-9">
									<textarea class="form-control width80" rows="5" id="comment"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Upload Image:</label>
								<div class="col-sm-9">
									<input type="file" class="form-control width50" name="image"></input>
								</div>
							</div>


							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-success">Submit</button>
									<button type="reset" class="btn btn-info">Submit</button>
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

