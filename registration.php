<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css"/>
    <script>
        function validation() {
    var name =
        document.forms.Register.name.value;
    var email =
        document.forms.Register.email.value;
    var phone =
        document.forms.Register.mobileno.value;
    var password =
        document.forms.Register.password.value;

    var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
    var regPhone=/^\d{10}$/;									 // Javascript reGex for Phone Number validation.
    var regName = /\d+$/g;								 // Javascript reGex for Name validation

    if (name == "" || regName.test(name)) {
        alert("Please enter your name properly.");
        return false;
        name.focus();
       
    }

    if (email == "" || !regEmail.test(email)) {
        alert("Please enter a valid e-mail address.");
        return false;
        email.focus();
       
    }
    
    if (password == "") {
        alert("Please enter your password");
        return false;
        password.focus();
    }

    if(password.length <6){
        alert("Password should be atleast 6 character long");
        return false;
        password.focus();

    }
    if (phone == "" || !regPhone.test(phone)) {
        alert("Please enter valid phone number.");
        return false;
        phone.focus();
    }
}
    
    </script>
</head>
<body>
<?php
require('db.php');
if(isset($_REQUEST['username'])){
 echo "I am calling";
 $name = stripslashes($_REQUEST['name']);
 $name = mysqli_real_escape_string($db_con, $name);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($db_con, $email);
 $mobileno = stripslashes($_REQUEST['mobileno']);
 $mobileno = mysqli_real_escape_string($db_con, $mobileno);
 $username = stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($db_con, $username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($db_con, $password);
 $query    = "SELECT * FROM `users` where username='$username'";
 $result = mysqli_query($db_con, $query);
 $rows = mysqli_num_rows($result);  
 if ($rows>=1){
    echo "<div class='form'>
    <h3>User already existed with this username. Please try with new username</h3><br/>
    <p class='link'><a href='index.php'>Login</a></p>
    </div>";
}
else{
    echo "I am calling 3";
 $query = "INSERT into heroku_0a22cdb987db64a.users (name, email, mobileno,username,password)
            VALUES ('$name','$email','$mobileno','$username','$password')";
 $result =mysqli_query($db_con, $query);
 if ($result){
    echo "<div class='form'>
          <h3> Registered successfully</h3><br/>
          <p class='link'><a href='index.php'>Login</a></p>
          </div>";
 }
 else{
    echo "<div class='form'>
          <h3>Registration not completed</h3></br>
          <p class='link'><a href='registration.php'>Registration</a></p>
          </div>";
 }
}
}
else {
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Pupils Community</h1>
    <form class="form" onsubmit="return validation()"  method="post" name="Register">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" require/>
        <input type="text" class="login-input" name="email" placeholder="Email" require/>
        <input type="text" class="login-input" name="mobileno" placeholder="Mobile No" require/>
        <input type="text" class="login-input" name="username" placeholder="Username" require/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>  
        <input type="submit" value="Register" name="Register" class="login-button"/>
        <p class="link"><a href="index.php">Click here to login</a></p>
  </form>
  <?php
}
?>
</body>
</html>
