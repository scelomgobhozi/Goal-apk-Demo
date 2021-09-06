<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Are you sure you want to delete this goal</h1>   
<button ><a href="index.php">Cancel</a> </button>

<form action="index.php?id_delete=<?php echo $row['id'] ?>" method="post">
<input type="submit" value="" name="delete">
</form>

</body>
</html>