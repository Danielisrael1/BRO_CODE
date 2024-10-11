
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    
    <div class="container">

        <form action="tryconn.php" class="form" method="post">
            <h1>Registration Form</h1>
            <div class="input-box">
                <label>FULL NAME</label>
                <input type="text" placeholder="Name" required>
            </div>

            <div class="input-box">
                <label>USERNAME</label>
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-box">
                <label>EMAIL</label>
                <input type="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <label>PASSWORD</label>
                <input type="password" placeholder="password" required>
                <p>Confirm your password:</p>
                <input type="password" placeholder="Confirm password" required>
            </div>
            <div class="Column">
                <div class="input-box">
                    <label>PHONE CONTACT</label>
                    <input type="tel" placeholder="Enter phone number" required>

                </div>
                <div class="input-box">
                    <label>BIRTH DATE</label>
                    <input type="date" placeholder="Enter birth date" required>

                </div>
            </div>
            <h3>GENDER</h3>
            <div class="Gender-options">
                <div class="gender">
                    <input type="radio" id="check-male" name="gender" checked>
                    <label> Male</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-female" name="gender" checked>
                    <label> Female</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-other" name="gender" checked>
                    <label> Other</label>
                </div>


            </div>
            <h3>ADDRESS</h3>
            <div class="Address-list-1">
                <div class="input-box"><label>COUNTRY</label>
                    <input type="text" placeholder="Country"required>
                     
                </div>
                <div class="input-box"><label>CITY</label> 
                    <input type="text" placeholder="City"required>
                    
                </div>
            </div>
            <div class="Address-list-2">
                <div class="input-box">
                    <label>PARISH</label>
                    <input type="text" placeholder="Parish"required>
                     
                </div>
                <div class="input-box">
                    <label>VILLAGE</label>
                    <input type="text" placeholder="Village"required>
                     
                </div>
            </div>






            <button type="submit" name="submit" class="btn">Submit</button>



        </form>


    </div>

</body>

</html>

<?php



//CREATE A CONNECTION
include("db.php");


//CHECK CONNECTION



//handle form subz
//if($_SERVER['REQUEST_METHOD']=='POST'){

if(isset($_POST["submit"])){

    $NAME=$_POST['NAME'];
    $USERNAME=$_POST['USERNAME'];
    $EMAIL=$_POST['EMAIL'];
    $PASSWORD=$_POST['PASSWORD'];
    $CONFIRMPASSWORD=$_POST['CONFIRM PASSWORD'];
    $CONTACT=$_POST['PHONE CONTACT'];
    $BIRTHDATE=$_POST['BIRTH DATE'];
    $GENDER=$_POST['GENDER'];
    $COUNTRY=$_POST['COUNTRY'];
    $CITY=$_POST['CITY'];
    $PARISH=$_POST['PARISH'];
    $VILLAGE=$_POST['VILLAGE'];
    if($PASSWORD!=$CONFIRMPASSWORD){
        echo"passwords dont match!";
        exit();
    }

//SANITIZE INPUT
$NAME=mysqli_real_escape_string($NEWCONN, $NAME);
$PASSWORD=password_hash($PASSWORD,PASSWORD_DEFAULT);

//inserting data
/*$sql= "INSERT INTO Login 
(NAME, USERNAME, EMAIL, PASSWORD, CONFIRMPASSWORD, CONTACT, BIRTHDATE, GENDER, COUNTRY, CITY, PARISH, VILLAGE) 
VALUES ($NAME, $USERNAME, $EMAIL, $PASSWORD, $CONFIRMPASSWORD, $CONTACT, $BIRTHDATE, $GENDER, $COUNTRY, $CITY, $PARISH, $VILLAGE)";
mysqli_query($NEWCONN,$sql);*/
$stmt = $NEWCONN->prepare("INSERT INTO Login 
(NAME, USERNAME, EMAIL, PASSWORD, CONFIRMPASSWORD, CONTACT, BIRTHDATE, GENDER, COUNTRY, CITY, PARISH, VILLAGE) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $NAME, $USERNAME, $EMAIL, $PASSWORD, $CONFIRMPASSWORD, 
$CONTACT, $BIRTHDATE, $GENDER, $COUNTRY, $CITY, $PARISH, $VILLAGE);
if($stmt->execute()){
    echo "Data inserted successfully";
}else{
    echo "Data insertion failed";
}
$stmt->close();
}


mysqli_close($NEWCONN);
?>