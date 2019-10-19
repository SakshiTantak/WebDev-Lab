<!DOCTYPE HTML>
<html>

<head>
  <title>PHP Form</title>
</head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

header h{
    color: #111;
}

.footer{
    
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#111;
   color: white;
   text-align: left;
   opacity:0.65;
   
   padding-left: 10px;
   padding-right: 10px;
}

.footerFont{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 50px;
}

.bg {
    background-image: url("3000534.jpg");
    filter: alpha(opacity=50);
}

shadow{
    text-shadow:3px 2px grey;
}

.quote{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size:50px;
    font-weight:bolder;
    text-align:center;
    background-color:grey;
    opacity: 0.65;
}

.icon{
    height: 40px;
    width:40px;
}

.corner{
    border:2px white;
    padding:10px;
    border-radius:40px;
    height:30px;
    width:400px;
    opacity:0.6;
}

label{
    font-size:18px;
    width: 200px;
    font-weight:bold;
    color: white;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.button{
    border:1px solid wheat;
    padding-top:10px;
    padding-bottom:10px;
    border-radius: 40px;
    height:40px;
    width:200px;
    opacity:0.8;
}

.button:hover {background-color: #fdd4e0}

.button:active {
  background-color: #fdd4e0;
  box-shadow: 0 5px rgb(250, 160, 160);
  transform: translateY(4px);
}

.box{
    border:5px solid white;
    padding-top:30px;
    padding-bottom:30px;
    padding-right:30px;
    padding-left:30px;
    border-radius: 20px;
    width:500px;
}

.radiobtn{
    border:1px white;
    border-radius:5px;
    height:15px;
    width:35px;
    opacity:0.6;
}
</style>


<body>
<center>
  <?php
  // define variables and set to empty values
  $nameErr = $emailErr = $websiteErr = "";
  $name = $email =  $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["website"])) {
      $website = "";
    } else {
      $website = test_input($_POST["website"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        $websiteErr = "Invalid URL";
      }
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

<div class="bg">
            <center><ul><header style="font-size:50px; color:aliceblue; padding-top:20px; padding-bottom:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;">Alumni Network</header></ul></center>
    </div>

    <br><br><br><br>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="box">
  <legend style="font-size:50px; font-weight:bolder;color: white;">Sign Up</legend>
  <br>
            <table>
                <tr>
                    <td>
                        <input class="corner" type="text" name="name" value="<?php echo $name; ?>" placeholder="Full Name">
                        <span class="error">* <br><?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                        <input class="corner" type="date" required="required" placeholder="Date of Birth">
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    
                    <td>
                            <input class="radiobtn" type="radio" selected="selected" name="female" style="font-family: serif;"><label>Female</label>
                 
                            <input class="radiobtn" type="radio" name="male"><label>Male</label>
                    
                            <input class="radiobtn" type="radio" name="other"><label>Other</label>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                            <input class="corner" type="email" required="required" placeholder="Email Id">
                            <span class="error">* <br><?php echo $emailErr; ?></span>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                            <input class="corner" type="tel" required="required" placeholder="Contact Number">
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                            <input class="corner" type="text" name="website" value="<?php echo $website; ?>" placeholder="LinkedIn">
                            <span class="error"><?php echo $websiteErr; ?></span>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                            <input class="radiobtn" type="radio" selected="selected" name="comp style="color:white;"><label>Computer Science</label>
                            <input class="radiobtn" type="radio" name="it"><label>IT</label>
                            <input class="radiobtn" type="radio" name="entc"><label>ENTC</label>
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>
                            <input class="corner" type="password" required="required" placeholder="Password">
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                        <td>
                                <input class="corner" type="password" required="required" placeholder="Confirm Password">
                        </td>
                    </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
            </table>
            <br><br>
            <button class="button" name="submit" type="submit" style="align-self: auto; color:black; font-weight:bold;">Sign Up</button>
        <br><br>







    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <br><?php echo $nameErr; ?></span>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <br><?php echo $emailErr; ?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $website; ?>">
    <span class="error"><?php echo $websiteErr; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
  echo "<h2>Inputs:</h2>";
  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $website;

  ?>
</center>
</body>


</html>
