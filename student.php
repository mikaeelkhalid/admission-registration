<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<p><a href="logout.php"></a></p>
<?php
require('db.php');

if (isset($_POST['Register'])){

    $fullname = $_POST['fullname'];
    $nationality = $_POST['nationality'];
    $CNIC = $_POST['CNIC'];
    $mobile = $_POST['mobile'];
    $applyingFor = $_POST['applyingFor'];

    $query = "INSERT into `student_info` (fullname, nationality, CNIC, mobile, applyingFor)
        VALUES ('$fullname', '$nationality', '$CNIC', '$mobile', '$applyingFor')";

    $result = mysqli_query($con,$query);

    if($result){
        echo "<div class='form'>
<h3>You are successfully registered for <?php echo $applyingFor; ?> program.</h3>
</div>";
    }
}else{
    ?>
    <div class="form">
        <h1>Enter Your Record</h1>
        <form name="registration" action="" method="post">

            <input type="text" name="fullname" placeholder="Full Name" required />

            <input type="number" name="CNIC" placeholder="CNIC" required />
            <input type="number" name="mobile" placeholder="Mobile" maxlength="11" required />
            <br>
            <br>
            <label for="nationality">Nationality:</label>
            <select name="nationality" id="nationality">
                <option value="Pakkistan">Pakkistan</option>
                <option value="Turkey">Turkey</option>
                <option value="Spain">Spain</option>
            </select>
            <br>
            <br>
            <label for="applyingFor">Applied For:</label>
            <select name="applyingFor" id="applyingFor">
                <option value="BS CS">BS CS</option>
                <option value="MS CS">MS CS</option>
                <option value="phd CS">phd CS</option>
            </select>

            <br>
            <br>
            <input type="submit" name="Register" value="Register" />
        </form>
    </div>
<?php } ?>
</body>
</html>