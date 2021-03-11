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
    $phone="";
    $err_phone="";
    $code="";
    $number="";
    $err_code="";
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

          

            $up=$_POST["pass"];
            for($i=0;$i<strlen($up);$i++){
                if(ctype_upper($up[$i])){
                    $upt=true;
                    break;
                }
                else{
                    $upt=false;
                }
            }
            $low=$_POST["pass"];
            for($i=0;$i<strlen($up);$i++){
                if(ctype_lower($up[$i])){
                    $lowt=true;
                    break;
                }
                else{
                    $lowt=false;
                }
            }
            $low=$_POST["pass"];
            for($i=0;$i<strlen($up);$i++){
                if(is_numeric($up[$i])){
                    $numt=true;
                    break;
                }
                else{
                    $numt=false;
                }
            }
        
            if(strpos($_POST["pass"],"?")||strpos($_POST["pass"],"#")){
                    $sp=true;
            }
            else{
                $sp=false;
            }


            if(empty($_POST["pass"])){
                $err_pass="Enter pass";
                
            }
            else if(strlen($_POST["pass"])<8){
                $err_pass="Password must be more than 6 characters long";
            }
            else if(strpos($_POST["pass"]," ")){
                $err_pass="Password should not contain whitespace";
            }
            
            else if($upt==false){
                $err_upass="Must contain Uppercase letter";
            }
            else if($lowt==false){
                $err_lpass="Must contain Lowerrcase letter";
            }
            else if($numt==false){
                $err_npass="Must contain Number";
            }
            else if($sp==false){
                $err_spass="Must contain special character # or ?";
            }

            else{   
                $pass=htmlspecialchars($_POST["pass"]);

            }
               

                if(empty($_POST["pass"])){
                    $err_cpass="Please check pass again";
                }
                elseif($_POST["cpass"]!=$pass){
                    $err_cpass="Password does not match";
                }

                if(empty($_POST["email"])){
                    $err_email="E-mail is required here";
                }
                else{
                        if(!strpos($_POST["email"],"@") || !strpos($_POST["email"],".")){
                            $err_email="Email field should contain both @ and .(dot)sign";
                }
            else{
                $email=htmlspecialchars($_POST["email"]);
            }
            }

            if(empty($_POST["code"]) && empty($_POST["number"])){
                $err_phone= "Please enter your code number";
            }
            else{
                    if(!is_numeric($_POST["code"]) || !is_numeric($_POST["number"])){
                        $err_phone="Phone number should contain only numeric values";
                    }
                else{
                    $phone= $_POST["code"].$_POST["number"];
            }
            }

            if(empty($_POST["staddress"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["zip"])){
                $err_address="Please type your address";
            }
            else{
                $address=htmlspecialchars($_POST["staddress"].$_POST["city"].$_POST["state"].$_POST["zip"]);
            }

            if(!isset($_POST["gender"])){
                $err_gender="gender must be selected";
            }
            else{
                $gender=$_POST["gender"];
            }

            if(!isset($_POST["cb"])){
                $err_cb= "Please answer this question";
            }
            else{
                $cb=$_POST["cb"];
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
        <legend><h1>Club Member Registration</h1></legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td><span>Name:</span></td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>">
                        <span><?php echo $err_name; ?></span></td>
                </tr>
                <tr>
                    <td><span>Username:</span></td>
                    <td><input type="text" name="uname" value="<?php echo $uname; ?>">
                        <span><?php echo $err_uname; ?></span></td>
                </tr>

                <tr>
                    <td><span>Password:</span></td>
                    <td><input type="password" name="pass" value="<?php echo $pass; ?>">
                        <span><?php echo $err_pass; ?></span></td>
                </tr>

                <tr>
                    <td><span>Confirm Password:</span></td>
                    <td><input type="password" name="cpass" value="<?php echo $cpass; ?>">
                        <span><?php echo $err_cpass; ?></span></td>
                </tr>

                <tr>
                    <td><span>Email:</span></td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>" placeholder="E-mail">
                        <span><?php echo $err_email; ?></span></td>
                </tr>

                <tr>
                    <td><span>Phone:</span></td>
                    <td><input type="text" size="3" name="code" value="<?php echo $code; ?>" placeholder="code"> - <input type="text" size="10" name="number" value ="<?php echo $number; ?>" placeholder="Number">
                        <span><?php echo $err_phone; ?></span></td>
                    
                </tr>

                <tr>
                    <td><span>Address:</span></td>
                    <td><input type="text" name="staddress" placeholder="Street Address"></br>
                        <input type="text" name="city" placeholder="City"> - <input type="text" name="state" placeholder="State"></br>
                        <input type="text" name="zip" placeholder="Postal/Zip code"> 
                        <span><?php echo $err_address; ?></span></td>
                </tr>

                <tr>
                    <td><span>Birth Date:</span></td>
                        <td><select name="day">
                            <option disabled selected>Day</option>
                                <?php for($i=1; $i<=31; $i++){
                                 echo "<option>$i</option>";
                            } ?></select>

                        <select name="month">
                            <option disabled selected>Month</option>
                                <?php for($i=1; $i<=12; $i++){
                                    echo "<option>$i</option>";
                            } ?></select>
                            
                        <select name="year">
                            <option disabled selected>Year</option>
                                <?php for($i=1985; $i<=2000; $i++){
                                    echo "<option>$i</option>";
                            } ?> </select></td>

                        

                    

                <tr>
                    <td><span>Gender:</span></td>
                    <td><input type="radio" name="gender" value="male"><span>Male</span>
                        <input type="radio" name="gender" value="female">Female<br>
                        <span><?php echo $err_gender; ?></span></td>
                </tr>

                <tr>
                    <td><span>Where did you hear about us?:</span></td>
                    <td><input type="checkbox" name="cb[]" value="A Friend or Collegue">A Friend or Collegue</br>
                        <input type="checkbox" name="cb[]" value="Google">Google</br>
                        <input type="checkbox" name="cb[]" value="Blog Post">Blog Post</br>
                        <input type="checkbox" name="cb[]" value="News Article">News Article</br>
                        <span><?php echo $err_cb; ?></span></td>
                </tr>

                <tr>
                    <td><span>Bio:</span></td>
                    <td><textarea name="bio"><?php echo $bio; ?></textarea></br>
                    
                    <input type="submit" name="submit" value="Register" >

                    <span><?php echo $err_bio; ?></span></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>