<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
<h2>สิทธิ์ <?=$_SESSION["pevi"]?></h2>

<table border="1">
        
        <tr id="tr1">
        </tr>

    <?php
    include "./connect.php";
		$stmt = $pdo->prepare("SELECT product.pname,SUM(item.quantity)AS quantity FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username WHERE member.username=? GROUP BY product.pname" );
		$stmt->bindParam(1, $_SESSION["username"]);
        $stmt->execute();
        if($_SESSION["pevi"]==='member'){
		while ($row = $stmt->fetch()) { 
	?>
        <script> 
                let th1 =document.createElement("th");
                let th2 =document.createElement("th");
                let th3 =document.createElement("th");
                let tr1 =document.getElementById("tr1");
                th1.innerHTML = "Product";
                th2.innerHTML = "Quantity";
                tr1.appendChild(th1);
                tr1.appendChild(th2);
                </script>
		<tr>
            <td><?=$row["pname"]?></td>
            <td><?=$row["quantity"]?></td>
        </tr>
	<?php }}?>
    <?php 
        $stmt2 = $pdo->prepare("SELECT orders.ord_id,member.username,product.pname,SUM(item.quantity)AS quantity,product.pid,product.price FROM product JOIN item ON product.pid = item.pid JOIN orders ON orders.ord_id = item.ord_id JOIN member ON member.username = orders.username  GROUP BY orders.ord_id;" );
        $stmt2->execute();
        if ($_SESSION["pevi"]==='admin') {    
        while ($row2 = $stmt2->fetch()) { 
            $_SESSION["ord_id"] = $row2["ord_id"];
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
            ?>
                <script> 
                let th4 =document.createElement("th");
                let th7 =document.createElement("th");
                let tr2 =document.getElementById("tr1");
                th7.innerHTML = "OrderID";
                th4.innerHTML = "Username";
                
                tr2.appendChild(th7);
                tr2.appendChild(th4);  
            </script>
                <tr>
                    <td><a href="../cart/cart.php?action=&ord_id=<?=$row2["ord_id"]?>"><?=$row2["ord_id"]?></a></td>
                    <td><?=$row2["username"]?></td>
                    
                </tr>
            <?php } 
                
        }
        
    ?>
</table>
<?php 
    if ($_SESSION["pevi"]==='admin') {
?>
    <a href="../cart/stock.php">หน้าคงคลัง</a><br>
<?php } ?>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>