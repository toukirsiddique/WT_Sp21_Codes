<?php

    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $gender="";
    $err_gender="";
    $hobbies="";
    $err_hobbies="";
    $profession="";
    $err_profession="";
    $bio="";
    $err_bio="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //if(isset($_POST["submit"])){
            if(empty($_POST["uname"])){
                $err_uname = "Please enter your name";
            }
            elseif(strlen($_POST["uname"]) < 6){
                $err_uname="Username should be minimum 6 characters long";
            }
            elseif(strpos($_POST["uname"]," ")){
                $err_uname="Whitespace is not accepted";
            }
            else{
                $uname = $_POST["uname"];
            }

            if(empty($_POST["pass"])){
                $err_pass = "Please enter your password";
            }
            elseif(strlen($_POST["pass"]) < 6){
                $err_pass = "Password should be minimum 6 characters long";
            }
            elseif(strpos($_POST["pass"]," ")){
                $err_pass = "Whitespace is not accepted";
            }
            else{
                $pass = $_POST["pass"];
            }

            if(!isset($_POST["gender"])){
                $err_gender="gedner must be selected";
            }
            else{
                $gender=$_POST["gender"];
            }

            if(!isset($_POST["hobbies"])){
                $err_hobbies= "Please select your hobby";
            }
            else{
                $hobbies=$_POST["hobbies"];
            }

            if(!isset($_POST["profession"])){
                $err_profession="Please select your profession";
            }
            else{
                $profession=$_POST["profession"];
            }

            if(empty($_POST["bio"])){
                $err_bio=$_POST["bio"];
            }

            if(empty($_POST))
        echo "Name: ". $_POST["uname"]."<br>";
        echo "Password: ". $_POST["pass"]."<br>";
        echo "Gender: ". $_POST["gender"]."<br>";
        echo "Profession: ". $_POST["profession"]."<br>";
        //echo "Submit: ".$_POST["submit"]."<br>"; 
        echo "Bio: ".$_POST["bio"]."<br>";
        $var = $_POST["hobbies"];
        for($i=0;$i<count($var);$i++){
            echo $var[$i]."<br>";
        }
    }
?>

<html>
<head></head>
<body>
    <h1>User Registration<h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><span>Username:</span></td>
                <td><input type="text" name="uname" value="<?php echo $uname; ?>" placeholder="Username">
                    <span><?php echo $err_uname; ?></span></td>
            </tr>

            <tr>
                <td><span>Password:</span></td>
                <td><input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Password">
                    <span><?php echo $err_pass; ?></span></td>
            </tr>

            <tr>
                <td><span>Gender:</span></td>
                <td><input type="radio" name="gender" value="Male"><span>Male</span>
                    <input type="radio" name="gender" value="Female">Female<br>
                    <span><?php echo $err_gender; ?></span></td>
            </tr>

            <tr>
                <td><span>Hobbies:</span></td>
                <td><input type="checkbox" name="hobbies[]" value="Movies">Movies
                    <input type="checkbox" name="hobbies[]" value="Sports">Sports
                    <input type="checkbox" name="hobbies[]" value="Reading Books">Reading Books
                    <input type="checkbox" name="hobbies[]" value="Travelling">Travelling</br>
                    <span><?php echo $err_hobbies; ?></span></td>
            </tr>

            <tr>
                <td><span>Profession:</span></td>
                <td>
                    <select name="profession">
                        <option disabled selected>Choose one</option>
                        <option>Engineer</option>
                        <option>Businessman</option>
                        <option>Teacher</option>
                        <option>Banker</option>
                    </select>
                    <span><?php echo $err_profession; ?></span>
                </td>
            </tr>

            <tr>
                <td><span>Bio:</span></td>
                <td><textarea name="bio"><?php echo $bio; ?></textarea>
                <span><?php echo $err_bio;?></span></td>
            </tr>

            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>


