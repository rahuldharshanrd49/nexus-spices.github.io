<?php
if(isset($_POST['name'],$_POST['number'],$_POST['address'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
}
    $conn = new mysqli('localhost','root','','contactinfo');
    if($conn->connect_error){
        die('Connection Failed :' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contacts(name,number,address)
        values(?,?,?)");
        $stmt -> bind_param("sis",$name,$name,$address);
        $execval = $stmt->execute();
        echo $execval;
        echo "will contact you soon";
        $stmt->close();
}
?>