<?php
include_once('vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\search;
/*include_once("src/allinclude.php");*/
// create Object of item Class

$DB_con= db::connect();
$search = new search($DB_con);

$result = $search->getSpecificKeyItem($_POST);


include_once('header.php')


?>

<?php

if(isset($_POST["submit"])){
/*echo '<script> popupOpen(); </script>'*/
   if($result) {
       echo '<style> body .modal {
           display: block ;}</style>';
   }


} ?>

    <style>
        /* The Modal (background) */

            /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 999; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
           /*background-color: #ddd;*!*/
            color: #666!important;
            min-height: 40px;
        }
.close{ color: #666}
        .modal-body {padding: 2px 16px;}

        .modal-footer {
            padding: 2px 16px;
            /*background-color: #ddd;*/
            color: white;
        }

        .print .btn{
            float:right;
        }

    </style>






    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
<?php if(isset($result['item_key']) AND isset($_POST['submit'])) {?>
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title pull-left">Search Result !</h4>
                        <button onclick="printDiv('printArea')" class="btn btn btn-default btn-sm pull-left" style="margin-left:20px;">Print-1</button>
                         <a href="pdf.php?search=<?=$result['item_key']?>" class="btn btn btn-default btn-sm pull-left" style="margin-left:20px;">Print-2</a>
                    </div>


                    <div class="modal-body" >
                        <div class="panel-body" id="printArea">
                        <div class="print">




                    </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Item Owner Name: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <h2><?php echo $result['user_name']; ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <h5>Item Owner Imgage: </h5>
                                </div>
                                <div class="col-md-8">
                                    <img src="profileimg/<?php echo $result['user_img']; ?>" alt="" class="pull-left prof-img p-img" style="margin: 0 20px 20px 0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Owner Email: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <span><strong><?php echo $result['user_email']; ?></strong></span>
                                    <button class="btn default btn-ms">Send Email</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Owner Number: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <span><strong><?php echo $result['user_number']; ?></strong></span>
                                    <button class="btn btn-ms">Call Now</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Owner Distric: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <p><?php echo $result['user_country']; ?></p>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Owner Address: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <p><?php echo $result['user_address']; ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Item Name: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <p><?php echo $result['item_name']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Category: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <p ><?php echo $result['item_category']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Description: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <p><?php echo $result['item_description']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Item Key: </h5>
                                </div>
                                <div class="col-md-8" style="margin-top:8px;">
                                    <p><?php echo $result['item_key']; ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 ">
                                    <h5>Item Owner Imgage: </h5>
                                </div>
                                <div class="col-md-8">
                                    <img src="itemimg/<?php echo $result['item_pic']; ?>" alt="" class="pull-left prof-img p-img" style="margin: 0 20px 20px 0">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        <?php } else if(!isset($result['item_key']) AND isset($_POST['submit'])) {

    foreach ($result as $err) {

     echo '<div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Search Result !</h4>
                    </div>

 <strong><ul><li>' . $err . '</li></ul></strong>
 </div>
 </div> ';
    }

}?>



        </div>



        <script>


        function printDiv(divName) {
              var printContents = document.getElementById(divName).innerHTML;
               var originalContents = document.body.innerHTML;
               document.body.innerHTML = printContents;
               window.print();
               document.body.innerHTML = originalContents;

               console.log('s');

           }
</script>









    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
         function popupOpen(){
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none ";

        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";

            }
        }
    </script>


    <div class="container-fluid">
       <div class="row">
            <div id="wowslider-container1">
	<div class="ws_images"><ul>
		<li><img src="images/slide_img/1.jpg" alt="Modern Business - A Bootstrap 3 Template" title="LOST & FOUND, Batch-40" id="wows1_0"/></li>
		<li><a href="http://wowslider.net"><img src="images/slide_img/2.jpg" alt="http://wowslider.net/" title="LOST & FOUND, Batch-40" id="wows1_1"/></a></li>

	</ul></div>
	<div class="ws_bullets">
    <div>
		<a href="#" title="Modern Business - A Bootstrap 3 Template"><span><img src="images/slide_img/thumb/1.jpg" alt="Modern Business - A Bootstrap 3 Template"/>1</span></a>
		<a href="#" title="Ready to Style & Add Content"><span><img src="images/slide_img/thumb/2.jpg" alt="Ready to Style & Add Content"/>2</span></a>

	</div>
    </div>
    
	
	</div>
       </div>
    </div>

    <div class="section-colored">
        <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="text-center">
                       <div class="text-center">
                           <h2 class="" style="margin-top:0px">Search Your Item</h2>
                           <p class="">Lost and found information including the most comprehensive database </p>
                           <hr/>
                       </div>
                      <form  method="post" >
                          <div id="custom-search-input">
                              <div class="input-group col-md-8 col-md-offset-2">
                                  <input style="width: 100%" type="text" class="form-control input-lg" name="search" placeholder="Insert You Key" />
                    <span class="input-group-btn">
                        <input class="btn btn-info btn-lg"  name="submit" type="submit" value="submit">
                            <i class="glyphicon glyphicon-search"></i>

                    </span>
                              </div>
                          </div>
                      </form>
                   </div>
               </div>
           </div>

            </div>
            <!-- /.row -->
        </div>    <!-- /.section -->
        <!-- /.container -->
    <!-- The Modal -->

		

    <!-- /.section-colored -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="" style="margin-top:0px">About Us</h2>
                        <p class="">Lost and found information including the most comprehensive database </p>
                        <hr/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="images/report_lost2.jpg" alt="" class="pull-left prof-img2" style="margin: 0 20px 20px 0">

                    <p>LostAndFound.com (The Internet Lost and Found (ILF)) offers visitors a convenient, one-stop source for the exchange of lost and found information including the most comprehensive online database of lost and found pet and property listings, photos, resources, advice, and support tools, on the internet. LostAndFound.com offers this information on a local, national and international basis. It features a variety of categories and services that aim to provide users with the necessary tools (some of which are uniquely suited to the Internet) for the effective communication of lost and found information.</p>
                    <p>LostAndFound.com offers a venue page for public locations to effectively create an "online lost and found box". Rather than have searchers peruse listings for a whole city or country, the Venue Page allows individual locations to set up their own lost and found information online. This information is blended with the main database for all universal searches, however, only data specific to the venue is listed on the venue page. Venues can direct and report lost and found information quickly and efficiently using this tool.</p>
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->

    <div class="section-colored">

        <div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h2 class="" style="margin-top:0px">Meet Our Team</h2>
            <p class="">Lost and found information including the most comprehensive database </p>
            <hr/>
        </div>
    </div>
</div>
            <div class="row">
                <div class="col-sm-2 col-md-2 custom">
                    <div class="thumbnail " style="padding: 7px;">
                        <img src="images/1.jpg" alt="...">
                        <div class="caption">
                            <h4>Ariful Islam</h4>

                            <p style="color:#666">Master Developer</p>
                            <a href="#" class="" >Next <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 custom">
                    <div class="thumbnail " style="padding: 7px;">
                        <img src="images/2.jpg" alt="...">
                        <div class="caption">
                            <h4>Murad</h4>
                            <p style="color:#666"> Asst. Developer</p>
                            <a href="#" class="" >Next <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                    </div>
                <div class="col-sm-2 col-md-2 custom">
                    <div class="thumbnail " style="padding: 7px;">
                        <img src="images/3.jpg" alt="...">
                        <div class="caption">
                            <h4>A Reaz Mahmud</h4>
                            <p style="color:#666"> Asst. Developer</p>
                            <a href="#" class="" >Next <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 custom">
                    <div class="thumbnail " style="padding: 7px;">
                        <img src="images/4.jpg" alt="...">
                        <div class="caption">
                            <h4>Meezan</h4>
                            <p style="color:#666"> Asst. Developer</p>
                            <a href="#" class="" >Next <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 custom">
                    <div class="thumbnail " style="padding: 7px;">
                        <img src="images/5.jpg" alt="...">
                        <div class="caption">
                            <h4>Abdur Rahman</h4>
                            <p style="color:#666"> Asst. Developer</p>
                            <a href="#" class="" >Next <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->

<div class="section" style="padding-bottom: 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="" style="margin-top:0px">Contact Us</h2>
                    <p class="">Lost and found information including the most comprehensive database </p>
                    <hr/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="map-canvas" style="height: 380px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9038475537873!2d90.39145431460736!3d23.750807984589194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQ1JzAyLjkiTiA5MMKwMjMnMzcuMSJF!5e0!3m2!1sen!2sbd!4v1485938443468" style="border:0" allowfullscreen="" width="100%" height="300" frameborder="0"></iframe>

                </div>
            </div>
            <div class="col-md-6">
                <h4 style="margin-top: -8px;">Group-4</h4>
                <table class="table table-hover" style="border: none !important;">

                    <tbody><tr>
                        <td><i class="fa fa-map-marker"></i></td>
                        <td> BDBL Bhaban (5th Floor - West), 12, Kazi Nazrul Islam Ave, Dhaka 1215, Bangladesh</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-envelope"></i></td>
                        <td>mdarman780@gmail.com, a.reazmahmud@gmail.com, </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-phone"></i></td>
                        <td>01713 787679, 01911 299513, 01822 150986</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-globe"></i></td>
                        <td><a href="http://ithelpbd.com/">www.ithelpbd.com</a> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
    <!-- /.section -->
<?php include_once('footer.php')?>