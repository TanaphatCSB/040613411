<?php include "connect.php"?>
<html>
    <head><meta charset = "utf-8"></head>
    <body>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while($row = $stmt->fetch()){
            ?>

            ขื่อสมาชิก <?=$row["name"]?><br>
            ที่อยู่ <?=$row["address"]?><br>
            อีเมล์<?=$row["email"]?><br>
            <img src='member_photo/<?=$row["id"]?>.jpg' width="100">
        
            <hr>
        <?php }?>
</body>
</html>