<?php
session_start();
include_once("src/allinclude.php");

if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){
    header("Location:index.php");
}

// create Object of item Class
$edit_item = new item($DB_con);

if(array_key_exists('edit_item',$_GET)) {

    $item = $edit_item->getEditItemRow($_GET);

}



include_once("header.php")

?>


<link rel = "stylesheet" media = "screen" href="css/timepicker.css" charset="utf-8" />
<link rel = "stylesheet" media = "screen" href="css/jquery-ui-1.9.0.custom.min.css" charset="utf-8" />




<?php if(!isset($_GET['edit_item'])){ ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Insert Item</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Insert Item</li>
                </ol>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row ">

            <?php include_once('side_menu.php')?>

            <div class="col-md-9">

                <?php
                if(array_key_exists('error',$_GET)){
                    echo '<div class="alert alert-danger">';
                    foreach ($_GET['error'] as $err){
                        echo '<ul><li>'.$err.'</ul></li>';
                    }
                    echo '</div>';
                }
                ?>
                <div class="">
                    <div class="panel-default border">
                        <div class="panel-heading">Add-Item</div>
                        <div class="panel-body">
                            <form action="src/action/store.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Item Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="item_name" value="" class="form-control width80">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Item Categogory</label>
                                    <div class="col-sm-9">
                                        <select name="item_category" class="form-control width80" id="source">

                                            <optgroup label="Select Item Category">
                                                <option value="Personal">Personal</option>
                                                <option value="Household">Household</option>
                                                <option value="Business">Business</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Animal">Animal</option>
                                                <option value="Excesorice">Excesorice</option>
                                                <option value="Others">Others</option>
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Create Date-time:</label>
                                    <div class="col-sm-9">

                                        <input name='item_create_dt' type='text' value='' maxlength='19' id ="start_time" class='datepicker form-control width80' />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">About Item:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control width80" name='item_description' rows="5" id="comment"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Upload File:</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="item_pic" class="form-control width80"></input>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" class="form-control width80"></input>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
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


<?php }else if(isset($_GET['edit_item'])){ ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Item</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Edit Item</li>
                </ol>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row ">

            <?php include_once('side_menu.php')?>

            <div class="col-md-9">

                <?php
                if(array_key_exists('error',$_GET)){
                    echo '<div class="alert alert-danger">';
                    foreach ($_GET['error'] as $err){
                        echo '<ul><li>'.$err.'</ul></li>';
                    }
                    echo '</div>';
                }
                ?>
                <div class="">
                    <div class="panel-default border">
                        <div class="panel-heading">Add-Item</div>
                        <div class="panel-body">
                            <form action="src/action/item_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Item Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="item_name" value="<?php echo $item['item_name']; ?>" class="form-control width80">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Item Categogory</label>
                                    <div class="col-sm-9">
                                        <select name="item_category" class="form-control width80" id="source">

                                            <optgroup label="Select Item Category">
                                                <option value="Personal" <?php if($item['item_category'] == 'Personal'): ?> selected="selected"<?php endif; ?>>Personal</option>
                                                <option value="Household" <?php if($item['item_category'] == 'Household'): ?> selected="selected"<?php endif; ?>>Household</option>
                                                <option value="Business"<?php if($item['item_category'] == 'Business'): ?> selected="selected"<?php endif; ?>>Business</option>
                                                <option value="Electric"<?php if($item['item_category'] == 'Electric'): ?> selected="selected"<?php endif; ?>>Electric</option>
                                                <option value="Animal"<?php if($item['item_category'] == 'Animal'): ?> selected="selected"<?php endif; ?>>Animal</option>
                                                <option value="Excesorice"<?php if($item['item_category'] == 'Excesorice'): ?> selected="selected"<?php endif; ?>>Excesorice</option>
                                                <option value="Others"<?php if($item['item_category'] == 'Others'): ?> selected="selected"<?php endif; ?>>Others</option>
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Create Date-time:</label>
                                    <div class="col-sm-9">

                                        <input name='item_create_dt' type='text' value='<?php echo $item['item_create_dt']; ?>' maxlength='19' id ="start_time" class='datepicker form-control width80' />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">About Item:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control width80" name='item_description' rows="5" id="comment"><?php echo $item['item_description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Upload File:</label>
                                    <div class="col-sm-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"><img id="img" width="150px" height="140px"  src="itemimg/<?php echo $item['item_pic']; ?>"/> </div>
                                            <div>
                                                <div>

                                                    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                                <input type="hidden" name="edit_image" value="<?php echo $item['item_pic']; ?>">
                                                <input type="file" name="item_pic" class="form-control width80">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" name="update" value="update" class="btn btn-success">Update</button>
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

<?php } ?>







<?php include_once("footer.php")?>

<script src="js/jquery-ui-1.9.0.custom.min.js"></script>
<script src="js/timepicker.js"></script>

<script>
	$(document).ready(function (e) {
		$("#start_time").datepicker({yearRange: 'c-20:c+10', dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, timeFormat: "HH:mm:ss"});
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

