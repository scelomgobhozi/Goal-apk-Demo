<?php 

include "db.php"; 
session_start();

// $bno = 11;
// $idset = [];


// if(isset($_GET['id_edit'])){
    

$idget = $_GET['id_edit'];
$_SESSION['id'] = $idget;
// print_r($id);
// array_push($idset,$idget);



if(isset($_POST['update']) ){


print_r($_SESSION['id']);

echo "The real id is";

$newHeader = $_POST['header2'];
$newBody = $_POST['description2'];
$newDate = $_POST['date2'];

// echo $newHeader."<br>".$newBody."<br>".$newDate;

try{
$id = $_GET['id'];
$dns = 'mysql:host='.$host.';dbname'.$dbname;
$pdo = new PDO($dns,$username,$password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE  $dbname.goal_list SET header = :newHeader body = :newBody due_date = :newDate WHERE id = :id ";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=> $_SESSION['id'] , 'header'=>$newHeader , 'body'=>$newBody , 'due_date'=>$newDate]);

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
    
}


//}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    

<form action="edit.php" method="POST">

<div> 
<label for="">Header</label>
<input type="text" name="header2" placeholder="header">
</div>  

<div>

<label for="">Description</label>

</div>
<textarea name="description2" id="" cols="30" rows="10" placeholder=""></textarea>

<div>
<label for="">Due date</label>
<input type="date" name="date2" id="">


</div>

<input type="submit" value="Submit" name="update">
</form>


</body>
</html>