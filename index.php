<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";
//connecting php with mysql

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die ("connection error" . $conn->connect_error);
}

//  $sql = "CREATE TABLE mycustomer(
    //  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    // name VARCHAR(30) NOT NULL,
    // email VARCHAR(50) NOT NULL,
    // number VARCHAR(30) NOT NULL
    //  )";
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $num = $_POST["number"];
    $age = $_POST["age"];
    $bio = $_POST["bio"];
    $acc = $_POST["account"];
    $ref = $_POST["referrer"];
    $terms = $_POST["terms"];
    
    $sql = "INSERT INTO mycustomer(name, email, number, age, bio, account, referrer, terms) VALUES 
    ('$name', '$email', '$num', '$age', '$bio', '$acc', '$ref', '$terms')";
    


   
    
$sql = "SELECT * FROM mycustomer";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>" . "<br>";
        echo "<td>" . $row["name"] . "</td>" . "<br>";
        echo "<td>" . $row["number"] . "</td>" . "<br>";
        echo "<td>" . $row["age"] . "</td>" . "<br>";
        echo "<td>" . $row["account"] . "</td>" . "<br>";
        echo "<td>" . $row["referrer"] . "</td>" . "<br>";
        echo "</tr>";
    }
} else {
    echo "No results found";
}

    }
$conn->close();

    
      
    

?>