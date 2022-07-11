<?php 
require_once('./conn.php');

if(isset($_POST['submit'])){

    if($stmt = $conn -> prepare('INSERT INTO users (fullname, dateofbirth, address, idnumber,
    age, gender, pnumber, district, divisional, medication, allergies, symptome, 1dose,
    1location, 1date, 2dose, 2location, 2date, 3dose, 3location, 3date, email, username, password)
    VALUES (?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?)'))
    {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $stmt -> bind_param('sssiisisssssssssssssssss',$_POST['fullname'],$_POST['dateofbirth'],
        $_POST['address'],$_POST['idnumber'],$_POST['age'],$_POST['gender'],$_POST['pnumber'],
        $_POST['district'],$_POST['divisional'],$_POST['medication'],$_POST['allergies'],
        $_POST['symptome'],$_POST['1dose'],$_POST['1location'],$_POST['1date'],$_POST['2dose'],
        $_POST['2location'],$_POST['2date'],$_POST['3dose'],$_POST['3location'],$_POST['3date'],
        $_POST['email'],$_POST['username'],$_POST['password']);
    
        $stmt ->execute();
        echo "Sucsessfully Registerd.";
    
    }
    else{
        echo "Error required!";
    }
    $stmt ->close();
}


?>



