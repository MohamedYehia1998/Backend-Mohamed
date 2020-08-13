
<html>
    <form method = "POST" action = "task3_ex1_backend.php">

        <body>
            <h1>User Registration Form</h1>
        

            <label>User Name</label>
            <input name = "user_name" value="<?= isset($user_name) ? $user_name : '' ?>">

            
            <br><br>

            <label>Email</label>
            <input name="email" type="email" value="<?= isset($email) ? $email : '' ?>">


            <br><br>

            <label>Password</label>
            <input name="password" type="password" value="<?= isset($password) ? $password : '' ?>">

            <br><br>

            <label>Password Confirmation</label>
            <input name="password2" type="password" value="<?= isset($password2) ? $password2 : '' ?>">
                   
            <br><br>

            <label>Phone</label>
            <input name="phone" type="tel" value="<?= isset($phone) ? $phone : '' ?>">

            <br><br>

            <label>Gender</label>

            <br>

            <label>Male</label>
            <input type="radio" value = "Male" name="gender" >

            <label>Female</label>
            <input type="radio" value = "Female" name="gender">

        
            <br><br>
            <button type = "submit">Register</button>
        </body>
    </form>

</html>

