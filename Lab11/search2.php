<?php
    $username = $_GET["user"];
   
    $con = mysqli_connect('localhost', 'root', '', 'workshopLab');

    $sql = "SELECT * FROM member WHERE username LIKE '%$username%'";
    $result = mysqli_query($con,$sql);

?>
<table border="1">
    <?php while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><img src="./img/<?php echo $row["id"]?>.jpg" width="100"></td>
            <td><?php echo $row["username"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["address"]?></td>
        </tr>
        <?php endwhile;?>
    
</table>