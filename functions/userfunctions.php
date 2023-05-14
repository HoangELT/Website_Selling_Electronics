<?php
include("./config/dbcon.php");

function getAllActive($table)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE status='0'";
    return $query_run= mysqli_query($conn, $query);
}
function getIDActive($table,$id)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE id='$id' AND status='0'";
    return $query_run= mysqli_query($conn, $query);
}
function getByID($table,$id)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE id='$id'";
    return $query_run= mysqli_query($conn, $query);
}
function getAll($table)
{
    global $conn;
    $query= "SELECT * FROM $table";
    return $query_run= mysqli_query($conn, $query);
}
function getBySlug($table,$slug)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE slug='$slug'";
    return $query_run= mysqli_query($conn, $query);
}
function totalValue($table){
    global $conn;
    $query= "SELECT COUNT(*) as `number` FROM $table";
    $totalValue = mysqli_query($conn, $query);
    $totalValue = mysqli_fetch_array($totalValue);
    return $totalValue['number'];
}
function getBestSelling($numberGet){
    global $conn;
    $query =    "SELECT `products`.*, COUNT(`order_detail`.id) as total_buy FROM `products` 
                LEFT JOIN `order_detail` ON `products`.`id` = `order_detail`.`product_id`
                GROUP BY `products`.`id`
                ORDER BY `total_buy` DESC
                LIMIT $numberGet";
    return mysqli_query($conn, $query);
}
function getLatestProducts($numberGet,$page = 0,$type = "",$search=""){
    global $conn;
    $page_extra = $numberGet * $page;

    if ($type != ""){
        $categoryId     = getBySlug("categories", $type);
        $categoryId     = mysqli_fetch_array($categoryId)['id'];
        $query =    "SELECT * FROM `products` 
                WHERE `name` LIKE '%$search%' AND `category_id` = '$categoryId'
                ORDER BY `id` DESC 
                LIMIT $numberGet OFFSET $page_extra";
    }else{
        $query =    "SELECT * FROM `products` 
                WHERE `name` LIKE '%$search%'
                ORDER BY `id` DESC 
                LIMIT $numberGet OFFSET $page_extra";
    }
    
    return mysqli_query($conn, $query);
}
function getBlogs($page, $keyWold){
    global $conn;
    $page_extra = 10 * $page;
    $query =    "SELECT * FROM `blog` 
                WHERE `title` LIKE '%$keyWold%'
                ORDER BY `id` DESC
                LIMIT 10 OFFSET $page_extra";
    return mysqli_query($conn, $query);
}

// order
function checkOrder($id_product){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];   
    $query  =   "SELECT `status` FROM `order_detail` 
                WHERE `product_id` = '$id_product' AND `user_id` = '$user_id' AND `status` != 0 
                ORDER BY `status`";
    $checkOrsder = mysqli_query($conn, $query);
    if(mysqli_num_rows($checkOrsder)){
        $checkOrsder = mysqli_fetch_array($checkOrsder)['status'];
        return $checkOrsder;
    }else{
        return 0;
    }
}

function getMyOrders(){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];   
    $query =    "SELECT `order_detail`.*, `products`.`name`, `products`.`slug` FROM `order_detail` 
                JOIN `products` on `order_detail`.`product_id` = `products`.`id`
                WHERE `order_detail`.`user_id` = '$user_id' AND `order_detail`.`status` = 1";
    return mysqli_query($conn, $query);
}

function getMyOrderVote($id){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];   
    $query =    "SELECT `order_detail`.*, `products`.`name`,`products`.`description`,`products`.`small_description`,`products`.`image`,`products`.`slug` FROM `order_detail` 
                JOIN `products` on `order_detail`.`product_id` = `products`.`id`
                WHERE `order_detail`.`id` = '$id' AND `order_detail`.`status` = 4 AND `order_detail`.`user_id` = $user_id";
    return mysqli_query($conn, $query);
}

function getOrderWasBuy(){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];   
    $query =    "SELECT `order_detail`.*, `products`.`name`, `products`.`slug` FROM `order_detail` 
                JOIN `products` on `order_detail`.`product_id` = `products`.`id`
                WHERE `order_detail`.`user_id` = '$user_id' AND `order_detail`.`status` NOT IN (0,1)
                ORDER BY `order_detail`.`id` DESC";
    return mysqli_query($conn, $query);
}

function getRate($product_id){
    global $conn;
    $query = "SELECT `order_detail`.*, `users`.`name` FROM `order_detail` 
            JOIN `users` ON `order_detail`.`user_id` = `users`.`id`
            WHERE `order_detail`.`product_id` = '$product_id' AND `order_detail`.`status` = 4 AND `order_detail`.`rate` > 0";

    return mysqli_query($conn, $query);
}

function avgRate($product_id){
    global $conn;
    $query = "SELECT AVG(`rate`) as `avg_rate` FROM `order_detail` WHERE `product_id` = '$product_id' AND `status` = 4 AND `rate` > 0";
    $rate = mysqli_query($conn, $query);
    $rate = mysqli_fetch_array($rate);
    return round($rate['avg_rate'],1);
}

function redirect($url, $message)
 {
     $_SESSION['message']= $message;
     header('Location:'.$url);
     exit();
 }



?>