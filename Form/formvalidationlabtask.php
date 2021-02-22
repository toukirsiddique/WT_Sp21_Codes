<?php

    $name="";
    $err_name="";
    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $cpass="";
    $err_cpass="";
    $email="";
    $err_email="";
    $code="";
    $err_code="";
    $number="";
    $err_number="";
    $address="";
    $err_address="";
    $gender="";
    $err_gender="";
    $cb="";
    $err_cb="";
    $bio="";
    $err_bio="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //if(isset($_POST["submit"])){
            if(empty($_POST["name"])){
                $err_name = "Please enter your name";
            }
            else{
                $name = htmlspecialchars($_POST["name"]);
            }

            if(empty($_POST["uname"])){
                $err_uname = "Please enter your Username";
            }
            elseif(strlen($_POST["uname"]) < 6){
                $err_uname="Username should be minimum 6 characters long";
            }
            elseif(strpos($_POST["uname"]," ")){
                $err_uname="Whitespace is not accepted";
            }
            else{
                $uname = htmlspecialchars($_POST["uname"]);
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
            elseif(strpos($_POST["pass"],"#")){
                $err_pass = "Must contain # or ?";
            }
            elseif(strpos($_POST["pass"],"?")){
                $err_pass = "Must contain # or ?";
            }
            elseif(!ctype_upper($_POST["pass"])){
                $err_pass="Password should contain uppercase letters";
            }
            elseif(!ctype_lower($_POST["pass"])){
                $err_pass="Password should contain lower letters";
            }
            else{
                $pass = htmlspecialchars($_POST["pass"]);
            }

            if(empty($_POST["pass"])){
                $err_cpass="Enter pass again";
            }
            elseif($_POST["cpass"]!=$pass){
                $err_cpass="Password does not match";
            }

            if(empty($_POST["email"])){
                $err_email="E-mail is required here";
            }
            elseif(!strpos($_POST["email"],"@")){
                $err_email="This field should contain @ sign";
            }
            else{
                $email=htmlspecialchars($_POST["email"]);
            }

            if(!is_numeric($_POST["code"])||!is_numeric($_POST["phone"])){
                $err_phone="Phone number should contain only numeric values";
            }

            if(!isset($_POST["gender"])){
                $err_gender="gedner must be selected";
            }
            else{
                $gender=$_POST["gender"];
            }

            if(!isset($_POST["cb[]"])){
                $err_hobbies= "Please select your hobby";
            }
            else{
                $hobbies=$_POST["cb[]"];
            }

           

            if(empty($_POST["bio"])){
                $err_bio=htmlspecialchars($_POST["bio"]);
            }

            
    }
?>
<html>
<head></head>
<body>
    <fieldset>
        <legend><h1>User Registration</h1></legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td><span>Name:</span></td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name">
                        <span><?php echo $err_name; ?></span></td>
                </tr>
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
                    <td><span>Confirm Password:</span></td>
                    <td><input type="password" name="cpass" value="<?php echo $cpass; ?>" placeholder="Confirm Password">
                        <span><?php echo $err_cpass; ?></span></td>
                </tr>

                <tr>
                    <td><span>Email:</span></td>
                    <td><input type="text" name="email" placeholder="E-mail">
                        <span><?php echo $err_email; ?></span></td>
                </tr>

                <tr>
                    <td><span>Phone:</span></td>
                    <td><input type="text" size="3" name="code" placeholder="code"> - <input type="text" size="11" name="number" placeholder="number">
                    <td><?php echo $err_phone; ?></span></td>
                </tr>

                <tr>
                    <td><span>Address:</span></td>
                    <td><input type="text" name="city" placeholder="City"> - <input type="text" name="state" placeholder="State"></br>
                        <input type="text" name="zip" placeholder="Postal/Zip code"> 
                        <span><?php echo $err_address; ?></span></td>
                </tr>

                <tr>
                    <td><span>Birth Date:</span></td>
                    <td><select name="day">
                        <option disabled selected>Day</option>
                            <?php for($i=1; $i<=31; $i++){
                                echo "<option>$i</option>";
                            } ?></br>
                    <td><select name="month">
                        <option disabled selected>Month</option>
                            <?php for($i=1; $i<=12; $i++){
                                echo "<option>$i</option>";
                            } ?>
                    <td><select name="year">
                        <option disabled selected>Year</option>
                            <?php for($i=1985; $i<=2000; $i++){
                                echo "<option>$i</option>";
                            } ?>

                        

                    

                <tr>
                    <td><span>Gender:</span></td>
                    <td><input type="radio" name="gender" value="Male"><span>Male</span>
                        <input type="radio" name="gender" value="Female">Female<br>
                        <span><?php echo $err_gender; ?></span></td>
                </tr>

                <tr>
                    <td><span>Where did you head about us?:</span></td>
                    <td><input type="checkbox" name="cb[]" value="A Friend or Collegue">A Friend or Collegue</br>
                        <input type="checkbox" name="cb[]" value="Google">Google</br>
                        <input type="checkbox" name="cb[]" value="Blog Post">Blog Post</br>
                        <input type="checkbox" name="cb[]" value="News Article">News Article</br>
                        <span><?php echo $err_cb; ?></span></td>
                </tr>

                <tr>
                    <td><span>Bio:</span></td>
                    <td><textarea name="bio"><?php echo $bio; ?></textarea>
                    <span><?php echo $err_bio;?></span></td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Register"></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>