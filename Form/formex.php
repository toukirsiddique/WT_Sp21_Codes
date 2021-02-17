<?php
    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $gender="";
    $err_gender="";
    $profession="";
    $err_profession="";
    $hobbies="";
    $err_hobbies="";
    $bio="";
    $err_bio="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["uname"])){
        $err_uname="User name required";
    }
    else if(strlen($_POST["uname"]) < 6){
        $err_uname="Username must be 6 characters long";
    }
    else if(strpos($_POST["uname"]," ")){
        $err_uname="Username should not contain whitespaces";
    }
    else{
        $uname=$_POST["uname"];
    }

    if(empty($_POST["pass"])){
        $err_pass="Password is Required";
    }
    else if(strlen($_POST["pass"]) < 6){
        $err_pass="Password must be at least 6 characters long";
        $pass="";
        //$pass=$_POST["pass"];
    }
    else if(strpos($_POST["pass"]," ")){
        $err_pass="Password should not contain any whitespaces";
    }
    else{
        $pass=$_POST["pass"];
    }

    if(empty($_POST["gender"])){
        $err_gender="Please select gender";
    }
    else{
        $gender=$_POST["gender"];
    }
    
    if(empty($_POST["profession"])){
        $err_profession="Please select your profession";
    }
    else{
        $profession=$_POST["profession"];
    }

    if(isset($_POST["hobbies[]"])){
        $err_hobbies="Please select your hobbies";
    }
    else{
        $hobbies=$_POST["hobbies[]"];
    }
    if(empty($_POST["txtarea"])){
        $err_bio="Bio must be filled in";
    }
    else{
        $bio=$_POST["txtarea"];
    }
}
?>

<html>
<head></head>
<body>
    <form action="" method="post">
    <table>
        <tr>
            <td><span>User Name:</span></td>
            <td><input type="text" name="uname" placeholder="Username">
                <span><?php echo $err_uname;?></span></td>
        </tr>
        
        <tr>
            <td><span>Password:</span></td>
            <td><input type="password" name="pass" placeholder="Password">
                <span><?php echo $err_pass;?></span></td>
        </tr>

        <tr>
            <td><span>Gender</span></td>
            <td><input type="radio" name="gender" value="make">Male
                <input type="radio" name="gender" value="female">Female
                <span><?php echo $err_gender;?></span></td>
        </tr>

        <tr>
            <td><span>Hobbies</span></td>
            <td>:<input type="checkbox" value="Movies" name="hobbies[]">Movies
                <input type="checkbox" value="Sports" name="hobbies[]">Sports
                <input type="checkbox" value="Reading Books" name="hobbies[]">Reading Books
                <input type="checkbox" vlaue="Gardening" name="hobbies[]">Gardening
                <span><?php echo $err_hobbies;?></span></td>
        </tr>

        <tr>
            <td><span>Profession:</span></td>
            <td><select name="profession">
                <option disabled selected> Choose any</option>
                <option>Teacher</optiuon>
                <option>Engineer</optiuon>
                <option>Business</optiuon>
                <option>Football Player</optiuon>
                </select>
                <span><?php echo $err_profession;?></span></td>
        </tr>

        <tr>
            <td><span>Bio:</span></td>
            <td><textarea name="txtarea"></textarea><br>
            <input type="submit" value="submit">
            <span><?php echo $err_bio;?></span></td>
        </tr>
    </table>
    </form>
</body>
</html>