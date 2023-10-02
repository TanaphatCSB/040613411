<?php include "connect.php" ?>

<html>
    <head><meta charset="utf-8">
</head>
    <body>
        <form>
        Username :<input type="text" name="username">
        <input type="submit" value="Go">
        </form>
    
   
<?php
    $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
    $stmt->bindParam(1, $_GET["keyword"]); // ก าหนดค่าลงในต าแหน่ง ?
    if ($stmt->execute()){ // เริ่มลบข้อมูล
    header("location: 8.php"); // กลับไปแสดงผลหน้าข้อมูล
}
?>
</div>
        </div>
        
</html>  
    