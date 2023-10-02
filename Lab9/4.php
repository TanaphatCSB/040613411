<?php include "connect.php" ?>

<html>
    <head><meta charset="utf-8"></head>
    <body>
        <form>
            <input type = "text" name = "keyword">
            <input type = "submit" value = "ค้นหา">
</form>
    
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM product WHERE pid LIKE ?");
            if(!empty($_GET)){
                $value = '%' .$_GET["keyword"]. '%';
            }
            $stmt->bindParam(1,$value);
            $stmt->execute();
    ?>

            <?php while ($row = $stmt->fetch()) : ?>
    <div style="padding: 15px; text-align: center">
    <img src='product_photo/product_photo/<?=$row["pid"]?>.jpg' width='200'><br>
    id:<?=$row["pid"]?><br><?=$row ["pname"]?><br><?=$row ["price"]?> บาท
</div>
<?php endwhile; ?>
</div>
        </div>
        
</html>  
    