<?php

include_once("src/allinclude.php");

$user = new user($DB_con);

$log = $user->signIn();

if(isset($log['id'])AND !empty($log['id'])){
    session_start();
    $_SESSION['user_id'] = $log['id'];
    $_SESSION['login'] = 'true';



    echo "SUCCESSFULLY LOGIN";

   header("Location:dashboard.php");
}

 if(!isset($_GET['error'])) {

    $log_display = "block";
    $reg_display ="none";
}else {

    $log_display = "none";
    $reg_display ="block";
}



include_once("header.php")


?>

<style>
    body{background-color:#ddd;}
	.box{ min-height: 700px;}
	
</style>

    <div class="container">
       <div class="box">



	       <div id="loginbox" style="margin-top:150px; display: <?php echo $log_display; ?>" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
               <?php
               if($log !== NULL AND $log !=="true") {
                   echo '<div class="alert alert-danger">';
                   foreach ($log as $err) {
                       echo ' <strong><ul><li>' . $err . '</li></ul></strong>';
                   }
                   echo '</div>';
               }
               ?>

            <div class="panel panel-default" >


                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>


                    <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form action="" method="post" id="loginform" class="form-horizontal" role="form">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="email" class="form-control" name="user_email" value="" placeholder="Your Email">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="user_pass" placeholder="Password">
                        </div>



                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-signup" type="submit" name="log" value="log" class="btn btn-info"><i class="icon-hand-right"></i> Log In</button>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account!
                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>


           <div id="signupbox" style="display:<?php echo $reg_display; ?>; margin-top:150px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">


               <?php
               if(array_key_exists("error",$_GET) AND !empty($_GET['error'])) {
                   echo '<div class="alert alert-danger">';
                   foreach ($_GET['error'] as $err) {
                       echo ' <strong><ul><li>' . $err . '</li></ul></strong>';
                   }
                   echo '</div>';
               }

               ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                </div>



                <div class="panel-body" >
                    <form action="verify.php" method="post" id="signupform" class="form-horizontal" role="form">

                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>



                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Name: </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="user_name" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">E mail</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="user_email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="user_pass" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="user_confirm_pass" placeholder="Confirm Password">
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" name="submit" value="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                <!--<span style="margin-left:8px;">or</span>-->
                            </div>
                        </div>

                       <!-- <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                            </div>

                        </div>-->



                    </form>
                </div>


            </div>

            </div>




        </div>
	   </div>
    </div>

<?php include_once("footer.php")?>
