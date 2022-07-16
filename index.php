<?php
$insert = false;
if(isset($_POST['cno'])){
  
$servername = "localhost";
$username = "root";
$password = "tejalpkhed@12_2001";
$dbname="studentdata";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

//$cno=mysqli_real_escape_string($conn,$_POST['cno']);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

    $cno=$_POST['cno'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
   
    
    $sql = "INSERT INTO studentform (cno,name,year,contactno,email) VALUES ('$cno','$name','$year','$contactno','$email');";

    // Execute the query
    if($conn->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else
    {
       // echo "ERROR: $sql <br> $conn->error";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>Cummins College</h3>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
          <input type="text" name="cno" id="cno" placeholder="Enter your C Number">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="year" id="year" placeholder="Enter your year">
            <input type="phone" name="contactno" id="contactno" placeholder="Enter your Contact No">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <!-- <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea> -->
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
