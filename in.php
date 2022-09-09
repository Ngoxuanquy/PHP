<?php
        require_once("db.php"); 

        $sql = "SELECT * FROM sql_vay";
        $query = mysqli_query($connet , $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $i =1;
        while($row = mysqli_fetch_assoc($query)) {?>
            <?php echo $i++; ?>
            <?php echo $row['TenVay'] ?>
            <img src =
            <?php echo $row['img'] ?>
        />

        <?php } 
    ?>
</body>
</html>