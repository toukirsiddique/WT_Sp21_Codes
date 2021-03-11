<?php

$unamef="";
$unamel="";
$err_unamef="";
$err_unamel="";

$pass="";
$cpass="";
$err_pass="";
$err_cpass="";

$gender="";
$err_gender="";

$saddress="";
$err_saddress="";

$city="";
$err_city="";

$state="";
$err_state="";

$postal="";
$err_postal="";
$err_postaln="";

$country="";
$err_country="";

$email="";
$err_email="";

$cont="";
$err_cont="";
$err_contn="";

$acode="";
$err_acode="";
$err_acoden="";

$dob="";
$err_dob="";



function validatePassword($pass){
    $hasUpper=false;
    $hasLower=false;
    for($i=0;$i<strlen($pass);$i++){
        if(ctype_upper($pass[$i])){
            $hasUpper = true;
        }
        else{
            $hasUpper=$hasUpper;
        }
        if(ctype_lower($pass[$i])){
            $hasLower = true;
        }
        else{
            $hasLower=$hasLower;
        }
    }
    if($hasLower==false || $hasUpper==false){
        return false;
    }
    else{
        return true;
    }
}


function validateEmail($email){
    $pos_at=strpos($email,"@");
    $pos_dot=strpos($email,".",$pos_at+1);
    if($pos_at<$pos_dot){
        return true;
    }
    return false;
}



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $unamef=$_POST["unamef"];
    $unamel=$_POST["unamel"];
    $saddress=$_POST["saddress"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $postal=$_POST["postal"];
    
    
    if(empty($unamef)){
        $err_unamef="Please enter your first name";
    }
    elseif(strlen($_POST["unamef"]) < 4){
        $err_unamef="First Name must be more than 4 characters";
    }
    elseif(strpos($_POST["unamef"]," ")){
        $err_unamef="Whitespace is not allowed";
    }


    if(empty($unamel)){
        $err_unamel="Please enter your last name";
    }
    elseif(strlen($_POST["unamel"]) < 4){
        $err_unamel="Last Name must be more than 4 characters";
    }
    elseif(strpos($_POST["unamel"]," ")){
        $err_unamel="Whitespace is not allowed";
    }


    if(empty($_POST["pass"])){
        $err_pass="Please enter your password";
    }

    if(empty($_POST["cpass"])){
        $err_pass="Please enter confirm password";
    }




if(!empty($_POST["pass"])&&!empty($_POST["cpass"])){
    if(!validatePassword($_POST["pass"])){
        $err_pass="Password must contain 1 upper and 1 lower case letter";
    }
    elseif(strlen($_POST["pass"]) < 8){
        $err_pass="Password must be atleast 8 characters long";
    }
    elseif(strpos($_POST["pass"]," ")){
        $err_pass="Whitespace is not allowed";
    }

    elseif($_POST["cpass"]!==$pass){
        $err_cpass="Password does not match";
    }
}


if(!isset($_POST["gender"])){
    $err_gender="Gender must be selected";
}
else{
    $gender=$_POST["gender"];
}


if(empty($_POST["saddress"])){
    $err_saddress="Please write your address";
}


if(empty($_POST["city"])){
    $err_city="Please enter your city name";
}


if(empty($_POST["state"])){
    $err_state="Please enter your state";
}


if(empty($_POST["postal"])){
    $err_postal="Please enter your postal";
}
elseif(!is_numeric($_POST["postal"])){
    $err_postaln="Postal code should contain only numeric values";
}


if(!isset($_POST["country"])){
    $err_country="Please select your country";
}


if(empty($_POST["email"])){
        $err_email="Email Required";
    }
    elseif(!validateEmail($_POST["email"])){
        $err_email="Insert a valid email";
    }
    else{
        $email=htmlspecialchars($_POST["email"]);
    }


if(empty($_POST["cont"])){
    $err_cont="Please fill this field";
    }    
    elseif(!is_numeric($_POST["cont"])){
        $err_contn="This field requires only numeric values";
    }


    if(empty($_POST["acode"])){
        $err_acode="Please fill this field";
        }    
        elseif(!is_numeric($_POST["acode"])){
            $err_acoden="This field requires only numeric values";
        }

if(!isset($_POST["day"]) || !isset($_POST["month"]) || !isset($_POST["year"])){
    $err_dob="Date Required";
}
else{
    $dob=$_POST["day"]."-".$_POST["month"]."-".$_POST["year"];  
}


}

?>



<html>
    <head></head>
    <body>
        <div>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><span>Full Name</span></td>
                    </tr>
                    <tr>
                        
                        <td><input type="text" name="unamef" value="<?php echo $unamef; ?>" placeholder="First Name">
                            <span style="color:red;"><?php echo $err_unamef; ?></span></br>
                            
                            <input type="text" name="unamel" value="<?php echo $unamel; ?>" placeholder="Last Name">
                            <span style="color:red;"><?php echo $err_unamel; ?></span>
                            
                        </td>
                            
                    </tr>
                    <tr>
                        <td><span>Password</span></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Password">
                        <span style="color:red;"><?php echo $err_pass; ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Confirm Password</span></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="cpass">
                            <span style="color:red;"><?php echo $err_cpass; ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Gender<span></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="gender" value="male">Male
                        <td><input type="radio" name="gender" value="female">Female
                            <span style="color:red;"><?php echo $err_gender; ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Address</span></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="saddress" value="<?php echo $saddress; ?>" placeholder="Street Address">
                            <span><?php echo $err_saddress;?></span></br>

                            <input type="text" name="city" value="<?php echo $city; ?>" placeholder="City">
                            <span><?php echo $err_city?></span>
                            
                            <input type="text" name="state" value="<?php echo $state; ?>" placeholder="State / Provience">
                            <span><?php echo $err_state;?></span></br>

                            <input type="text" name="postal" value="<?php echo $postal; ?>" placeholder="Postal / Zip Code">
                            <span><?php echo $err_postal;?></span>
                            <span><?php echo $err_postaln;?></span>

                            <select name="country">
                                <option disabled selected>Choose one</option>
                                <option>Afghanistan</option> <option>Albania</option> <option>Australia</option> <option>Bahamas</option>
                                <option>Bangladesh</option> <option>Belgium</option> <option>Brazil</option> <option>France</option>
                                <option>Canada</option>USA</option>
                            </select>
                            <span><?php echo $err_country; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><span>E-mail</span></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" value="<?php echo $email;?>">
                        <span><?php echo $err_email;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Contact Number</span></td>
                    </tr>
                    <tr>
                        <td><input tpye="text" name="acode" value="<?php echo $acode;?>" placeholder="Area Code">
                            <span><?php echo $err_acode;?></span>
                            <span><?php echo $err_acoden;?></span>
                                                        

                            <input type="text" name="cont" value="<?php echo $cont;?>" placeholder="Phone / Mobile">
                            <span><?php echo $err_cont;?></span>
                            <span><?php echo $err_contn;?></span>
                        </td>  
                    </tr>
                    <tr>
                        <td><span>Date Of Birth</span></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="day">
                                <option disabled selected>Day</option>
                                    <?php 
                                        for($i=1; $i<=31; $i++){
                                            echo "<option>$i</option>";
                                        }
                                    ?>
                            </select>

                            <select name="month">
                                <option disabled selected>Month</option>
                                    <?php 
                                        $months=array("Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                        for($i=0;$i<count($months);$i++){
                                            echo"<option>$months[$i]</option>";
                                        }
                                    ?>
                            </select>

                            <select name="year">
                                <option disabled selected>Year</option>
                                    <?php 
                                        for($i=1970;$i<=2000;$i++){
                                            echo"<option>$i</option>";
                                        }
                                    ?>
                            </select><?php echo $err_dob;?><br>
                        </td>
                    </tr>


                    <tr>
                        <td><input type="submit" name="submit" value="Signup"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

</html>