<?php include "connect.php" ?>
<html>
<head><meta charset = "utf-8"></head>
    <body>

<?php

    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while($row = $stmt->fetch()){
?>

    ชื่อ: <?=$row["name"]?><br>
    ที่อยู่ <?=$row["address"]?><br>
    Email <?=$row["email"]?><br> 
    <img src = "member_photo/<?=$row["id"]?>.jpg" width="200"><br>

    <a href = "6.php?username=<?=$row["username"]?>">Delete</a><br>

    <?php }?>
</body>
</html>