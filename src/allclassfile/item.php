<?php

class item
{

    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

// generate Random Key for Item
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(8, $charactersLength - 1)];
        }
        return $randomString;
    }
// Store Your Item Into Database
    function store($data){

        if(isset($data['submit']) && !empty($data['submit'])) {
            $error = [];
            //check if item_name field empty
            if (!empty($data['item_name'])) {
                $item_name = htmlspecialchars($data['item_name']);

            } else {
                $error[] = "Your Item Name Empty";
            }


            $item_category = $data['item_category'];
            //check if item_description field empty
            if (!empty($data['item_description'])) {
                $item_description = htmlspecialchars($data['item_description']);

            } else {
                $error[] = "You Must Write Description About Your Item !";
            }

            //Set Defult item_create_dt if user not Select
            if (!empty($data['item_create_dt'])) {
                $item_create_dt = htmlspecialchars($data['item_create_dt']);

            } else {
                $item_create_dt = date("Y-m-d");
                var_dump($item_create_dt);
            }

            if (!empty($data['user_id'])) {
                $user_id = $data['user_id'];
            }else{
                $user_id = "";
            }

            $item_key = $this->generateRandomString(7);
            $item_update_dt = date("F j, Y, g:i a");




        if (isset($_FILES['item_pic']['tmp_name'])){

            $picture_tmp = $_FILES['item_pic']['tmp_name'];
            $picture_name = $_FILES['item_pic']['name'];
            $picture_type = $_FILES['item_pic']['type'];

            $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

            if (in_array($picture_type, $allowed_type)) {
                $path = '../../itemimg/' . $picture_name; //change this to your liking
            } else {
                $error[] = 'File type not allowed';
            }

        }else {

            $error[]="Please Add A Item Picture";
        }


            if(!empty($error)) {

                return $error;

            } else if(empty($error)) {

                move_uploaded_file($picture_tmp,$path);



try {
    //$result = mysqli_query($con, $insert);
    $stmt = $this->db->prepare("INSERT INTO items (user_id,item_name,item_category,item_description,item_pic,item_key,item_create_dt,item_update_dt)
                          VALUES(:user_id,:item_name,:item_category,:item_description,:picture_name,:item_key,:item_create_dt,:item_update_dt)");

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":item_name", $item_name);
    $stmt->bindParam(":item_category", $item_category);
    $stmt->bindParam(":item_description", $item_description);
    $stmt->bindParam(":picture_name", $picture_name);
    $stmt->bindParam(":item_key", $item_key);
    $stmt->bindParam(":item_create_dt", $item_create_dt);
    $stmt->bindParam(":item_update_dt", $item_create_dt);

    $stmt->execute();
    return true;
} catch (PDOException $e){

    $e->getMessage();
}

            }


        }


    }

    function getAllItems($id){

        $query = "SELECT * FROM items WHERE user_id=".$id;

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $items =[];

        if($stmt->rowCount()>0)
        {
            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){

                $items[] = $row;
            }
            return $items;
        }else{

            return true;
        }

    }

function updateItem($data){

    if(isset($data['update']) && !empty($data['update'])) {
        $error = [];
        //check if item_name field empty
        if (!empty($data['item_id'])) {
            $item_id= $data['item_id'];
        }


        if (!empty($data['item_name'])) {
            $item_name = htmlspecialchars($data['item_name']);

        } else {
            $error[] = "You Can't Empty Your Item Name";
        }


        $item_category = $data['item_category'];
        //check if item_description field empty
        if (!empty($data['item_description'])) {
            $item_description = htmlspecialchars($data['item_description']);

        } else {
            $error[] = "You Must Write Description About Your Item !";
        }

        //Set Defult item_create_dt if user not Select
        if (!empty($data['item_create_dt'])) {
            $item_create_dt = htmlspecialchars($data['item_create_dt']);

        } else {
            $item_create_dt = date("Y-m-d");
            var_dump($item_create_dt);
        }

        if (!empty($data['user_id'])) {
            $user_id = $data['user_id'];
        }else{
            $user_id = "";
        }

        if (!empty($data['edit_image'])) {
            $item_img = $data['edit_image'];
        }else{
            $item_img = "";
        }

        $item_update_dt = date("F j, Y, g:i a");




        if ($_FILES['item_pic']['name']){



            $picture_tmp = $_FILES['item_pic']['tmp_name'];
            $picture_name = $_FILES['item_pic']['name'];
            $picture_type = $_FILES['item_pic']['type'];

            $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

            if (in_array($picture_type, $allowed_type)) {
                $path = '../../itemimg/' . $picture_name; //change this to your liking

                unlink('../../itemimg/' . $item_img);

                move_uploaded_file($picture_tmp,$path);
            } else {
                $error[] = 'File type not allowed';
            }

        }else {

            $picture_name=  $item_img;



        }


        if(!empty($error)) {

            return $error;

        } else if(empty($error)) {





            try {
                $query ="UPDATE items SET item_name=:item_name, item_category=:item_category, item_description=:item_description, 
            item_pic=:picture_name,item_create_dt=:item_create_dt,item_update_dt=:item_update_dt WHERE id=".$item_id;

                $stmt = $this->db->prepare($query);

                $stmt->bindParam(":item_name", $item_name);
                $stmt->bindParam(":item_category", $item_category);
                $stmt->bindParam(":item_description", $item_description);
                $stmt->bindParam(":picture_name", $picture_name);
                $stmt->bindParam(":item_create_dt", $item_create_dt);
                $stmt->bindParam(":item_update_dt", $item_create_dt);

                $stmt->execute();
                return true;
            } catch (PDOException $e){

                $e->getMessage();
            }

        }

        //var_dump($result);
    }


}
    function getEditItemRow($data){
        if(isset($data['edit_item'])) {
            $item_id = $data['edit_item'];

        }else if(isset($data['view_id'])){
            $item_id = $data['view_id'];
        }
        $query = 'SELECT * FROM items WHERE id='.$item_id;

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                return $row;


            }
        }catch (PDOException $e){

            $e->getMessage();
        }


    }


    function deleteItem($data){
        if(isset($data['dl_id'])) {
            $item_id = $data['dl_id'];

        }

        $query = 'DELETE FROM items WHERE id='.$item_id;

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();


            return true;
        }catch (PDOException $e){

            $e->getMessage();
        }


    }


}