<?php

/**
 * Shen mouth1_probation 
 * 
 * 功能1： Select category
 *
 * @category None
 * @package  None
 * @author   Shen Huang <shen.huang@104.com.tw>
 * @license  http://www.php.net/license/3_01.txt  PHP License 5.6.31 
 * @link     http://www.xxxx.com/
 * @return   vategory
 */

 $servername = "localhost";
 $username = "piggy";
 $password = "";
 $dbname = "ncc";

 $num = $_POST["ind_cat_no"];

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ind_cat_no,cnt,max_month,min_month,avg_month,std_month
            FROM expjob_indcat_month_group_view
            WHERE ind_cat_no = :num
            ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":num", $num);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
}catch(PDOException $e) {
    $result = $e . "QAQ";
}
echo json_encode($result);