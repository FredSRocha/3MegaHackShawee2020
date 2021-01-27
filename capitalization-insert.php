<?php
require_once "conexao.php";

$value = $_POST['value'];
$status = $_POST['status'];

$sql = "INSERT INTO `crowdfunding` (`value`, `status`)  VALUES ('$value', '$status')";

if (mysqli_query($conn, $sql)){
    header("location: capitalization.php");
}else{
    echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_close($conn);

?>