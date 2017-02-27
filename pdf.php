<?php
include_once('vendor/autoload.php');
use LF\db\db;
use LF\allclassfile\search;

$DB_con= db::connect();
$search = new search($DB_con);
$result = $search->getItemById();

$content2="";
    $content2 .= "<tr>
                <td>Name: </td>
                <td> ".$result['user_name']."</td>

                </tr><br/>
                <tr>
                <td>User: </td>
                <td> ".$result['user_img']."</td>

                </tr><br/>
                <tr>
                <td>Email: </td>
                <td> ".$result['user_email']."</td>
                </tr><br/>
                <tr>
                <td>Phone: </td>
                <td> ".$result['user_number']."</td>
                </tr><br/>
                <tr>
                <td>Address: </td>
                <td> ".$result['user_address']."</td>
                </tr><br/>
                <tr>
                <td>Country: </td>
                <td> ".$result['user_country']."</td>
                </tr><br/>
                <tr>
                <td>Item Name: </td>
                <td> ".$result['item_name']."</td>
                </tr><br/>
                <tr>
                <td>Your Key: </td>
                <td> ".$result['item_key']."</td>
                </tr><br/>
                <tr>
                <td>Image Img: </td>
                <td> ".$result['item_pic']."</td>
                </tr><br/>
                <tr>
                <td>Description: </td>
                <td> ".$result['item_description']."</td>
                </tr><br/>";


$content3 = "</table>";

$mpdf=new mPDF('A4');

$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
$mpdf->WriteHTML($content2,$content3);
$mpdf->Output();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>