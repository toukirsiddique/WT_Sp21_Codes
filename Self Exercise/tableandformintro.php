<!--<html>
    <head>Practice</head>
    <body>
            <table border="1">
            <tr>
                <th>Group ID</th>
                <th>Name</th>
                <th>CGPA</th>
                <th>Department</th>
            </tr>
            <tr>
                <td rowspan="2">1</td>
                <td>Toukir</td>
                <td>3.47</td>
                <td>CSE</td>
            </tr>
            <tr>
                <td>Rahat</td>
                <td>3.8</td>
                <td>CSE</td>
            </tr>
            <tr>
                <td colspan="4" align="center">Group 1</td>
            </tr>
            <tr>
                <td rowspan="2">2</td>
                <td>Raad</td>
                <td>2.9</td>
                <td>CSE</td>
            </tr>
            <tr>
                <td>Labib</td>
                <td>3.4</td>
                <td>CSE</td>
            </tr>
            <tr>
                <td colspan="4" align="center">Group 2</td>
            </tr>
        </table>  
    </body>
</html> 
(1st table Code)-->

<!--
<html>
    <head></head>
    <body>
        <form>
            <table>
                <tr>
                    <td><span>Username<span>:</td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td><span>Password:</span></td>
                    <td><input type="password"></td>
                </tr>
                <tr>
                    <td><span>Gender:</span></td>
                    <td><input type="radio" name="gender"><span>Male</span>
                        <input type="radio" name="gender"><span>Female</span></td>  
                </tr>
                <tr>
                    <td><span>Skills:<span></td>
                    <td><input type="checkbox"><span>C<span></td>
                    <td><input type="checkbox"><span>Java<span></td>
                    <td><input type="checkbox"><span>C#<span></td>
                    <td><input type="checkbox"><span>HTML<span></td>
                </tr>
                <tr>
                    <td><span>Department</span></td>
                    <td><select>
                            <option disabled selected>Choose one</option>
                            <option>CSE</option>
                            <option>CS</option>
                            <option>EEE</option>
                            <option>BBA</option>
                        </select>
                </tr>
            </table>
        </form>
    </body>
</html>
-->

<html>
    <head></head>
    <body>
        <form action="WT_Sp21_Html/submitdemo.php" method="post">
            <span>Username:</span><input type="text" name="uname"><br>
            <span>Password:</span><input type="password" name="pass"><br>
            <span>Gender:</span>
                <input type="radio" name="gender" value="Male"><span>Male</span>
                <input type="radio" name="gender" value="Female"><span>Female</span><br>
            <span>Skills:</span>
                <input type="checkbox"><span>C</span>
                <input type="checkbox"><span>C#</span>
                <input type="checkbox"><span>Java</span>
                <input type="checkbox"><span>HTML</span><br>
            <span>Department:</span>
                <select name="department">
                    <option disabled selected>Select one</option>
                    <option>CSE</option>
                    <option>CS</option>
                    <option>EEE</option>
                    <option>BBA</option> 
                </select><br>
            <span>Comment:</span><textarea name="comment"></textarea><br> 
            <input type="submit" value="submit">
        </form>
    </body>
</html>