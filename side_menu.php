<?php

if(!isset($_SESSION['login']) AND empty($_SESSION['login'])){
    header("Location:index.php");
}

?>
<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">

            <img src="<?php if(isset($_SESSION['user_img']) AND !empty($_SESSION['user_img'])) {echo "profileimg/".$_SESSION['user_img'];}else{
                echo "images/default.jpg";
            } ?>" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo $_SESSION['user_name']; ?>
            </div>
            <div class="profile-usertitle-job">
                Developer
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-success btn-sm">Follow</button>
            <button type="button" class="btn btn-danger btn-sm">Message</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="active"><a href="dashboard.php"><i class="glyphicon glyphicon-th-large"></i>Dashboard</a></li>
                <li class=""><a href="index.php"><i class="glyphicon glyphicon-home"></i>Home</a></li>
                <li class=""><a href="profile.php?user_id=<?php if(isset($_SESSION['user_id']) AND !empty($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>"><i class="glyphicon glyphicon-book"></i>Profile</a></li>
                <li><a href="profile_setting.php?user_id=<?php if(isset($_SESSION['user_id']) AND !empty($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>"><i class=""></i>Acount Setting</a></li>
                <li><a  href="all_item.php"><i class="glyphicon glyphicon-cloud-upload"></i><b>Product Item</b></a></li>
                <li><a  href="insert_item.php"><i class="glyphicon glyphicon-open-file"></i>Add Item</a></li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>