<?php
namespace LF\allclassfile;


class search
{
    private $db;
    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    function getSpecificKeyItem($key)
    {
        $error = [];
        $search_keyword = '';
        if(isset($key['submit']) AND !empty($key['search']))
        {
            $search_keyword = $_POST['search'];
        }else{
            $error[] = "Please Input Item Key for Getting Search Result";
        }
        if(!$error)
        {
            $error = [];
            $query = "SELECT u.user_name,u.user_email,u.user_number,u.user_address,u.user_country,u.user_img,i.item_name,i.item_category,i.item_description,i.item_pic,i.item_key 
                  FROM user_profile u LEFT JOIN items i ON u.id = i.user_id WHERE i.item_key LIKE :keyword ";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':keyword', '%' . $search_keyword . '%', \PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $row;
            }else{
                $error[] = "Sorry  No Recode Found Our Database ! Please Try Againg";
                return  $error;
            }
        } else {
            return $error;
        }
    }

    public function getItemById()
    {
        $search_keyword  = $_GET['search'];
        $query = "SELECT u.user_name,u.user_email,u.user_number,u.user_address,u.user_country,u.user_img,i.item_name,i.item_category,i.item_description,i.item_pic,i.item_key
                  FROM user_profile u LEFT JOIN items i ON u.id = i.user_id WHERE i.item_key LIKE :keyword ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':keyword', '%' . $search_keyword . '%', \PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $row;
        }else{
            $error[] = "Sorry  No Recode Found Our Database ! Please Try Againg";
            return  $error;
        }
    }
}