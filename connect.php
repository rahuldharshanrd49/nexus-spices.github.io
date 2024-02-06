<?php
if(isset($_POST['fname'],$_POST['fmail'],$_POST['fpassword'])) {
    $fname = $_POST['fname'];
    $fmail = $_POST['fmail'];
    $fpassword = $_POST['fpassword'];
}
    $conn = new mysqli('localhost','root','','rahul');
    if($conn->connect_error){
        die('Connection Failed :' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(fname,fmail,fpassword)
        values(?,?,?)");
        $stmt -> bind_param("sss",$fname,$fmail,$fpassword);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registered successfully";
        $stmt->close();
}
?>