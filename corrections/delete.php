<?php 
include "db.php";


if(isset($_POST['delete'])){
 echo $id_del =  $_GET['del_id'];

echo $id_del;



try{

    $dns = 'mysql:host='.$host.';dbname'.$dbname;
    $pdo = new PDO($dns,$username,$password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql2 ="DELETE FROM $dbname.goal_list WHERE id = ?";

    $stmt2 = $pdo->prepare($sql2);
    //echo  gettype($stmt2);
    $stmt2->execute([$id_del]);


//    $info = $stmt2->fetch();
//    $id = $info['id'];
  
    
    
    
    } catch(PDOException $e) {
      
        echo $e->getMessage();
      }
      header('location:index.php');


}