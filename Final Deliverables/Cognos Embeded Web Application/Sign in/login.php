<?php
$username = $_POST['username'];
$password = $_POST['password'];
$conn = new mysqli('localhost','root','','ibm');
if($conn->connect_error){
echo "$conn->connect_error";
die("Connection Failed : ". $conn->connect_error);
} 
else {
$stmt = $conn->prepare("select * from signup where username= ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0 ){
    $data = $stmt_result->fetch_assoc();
                if ($password ==$data['password']) {
            
                header("Location: dashboard.html");
                }
                else{
                echo '<script>alert("invalid password or username")</script>';
                }
            }
else {
    echo "invald details" ;
}
}

?>