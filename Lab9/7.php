<?php include "connect2.php" ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<form>
 Username: <input type="text" name="username"><br>
 Name: <input type="text" name="name"><br>
 Password: <input type = "text" name="password"><br>
 Address: <textarea name="address" rows="3" cols="40"></textarea><br>
 Mobile no.: <input type="number" name="mobile"><br>
 Email: <input type = "text" name= "email"><br>
 pic-><input type="file" name="file"><br>
<input type="submit" value="Add member" name="submit">
</form>
<?php
$targetDir = "./memberphoto";
    if(isset($_POST["submit"])){ 
        $txtName = $_POST["name"];
        $txtEmail = $_POST["email"];
        $txtAddress = $_POST["address"];
        $txtPhone = $_POST["moblie"];
        $txtUsername = $_POST["username"];
        $txtpassword = $_POST["password"];
        $insert = "INSERT INTO `member` (`username`, `password`, `name`, `address`, `mobile`,`email`) VALUES ('$txtUsername', '$txtpassword', '$txtName', '$txtAddress', '$txtPhone', '$txtEmail')";
        $rs = mysqli_query($con,$insert);
        $insertedId = mysqli_insert_id($con);
    if(!empty($_FILES["file"]["name"])){ 
        //get file name
        $fileName = basename($_FILES["file"]["name"]); 
        $editfilename = $insertedId . '.jpg';
        $targetFilePath = $targetDir . $editfilename;  
            // Upload file to server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                //$insert = $con->query("INSERT INTO member (username, password, name, address, mobile, email) VALUES ('$txtUsername', '$txtpassword', '$txtName', '$txtAddress', '$txtPhone', '$txtEmail')");
                if($rs){ 
                    header("location: ./lab8_8.php");
                }else{ 
                    echo "File upload failed, please try again."; 
                }  
            }else{ 
                echo "Sorry, there was an error uploading your file."; 
            } 
        
    }else{ 
        echo 'Please select a file to upload.'; 
    } 




}

?>
</body>
</html>