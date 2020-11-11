<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $errors = [];

    if (empty($_POST['first_name'])) {
        $errors['first_name'] = 'First name is required';
    }

    if (empty($_POST['last_name'])) {
        $errors['last_name'] = 'Last name is required';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    }

    if (empty($_POST['password2'])) {
        $errors['password2'] = 'Password Confirmation is required';
    }

    if (!empty($_POST['password']) && !empty($_POST['password2'])) {
        if (($_POST['password'] != $_POST['password2'])) {
            $errors['password2'] = 'Passwords don\'t match';
        }
    }

    
    if (empty($_POST['experience'])) {
        $errors['experience'] = 'Undefined Work Experience';
    }

    if ($_POST['Military_Status'] == "-") {
        $errors['Military_Status'] = 'Undefined military status';
    }

    if (empty($_POST['qualifications'])) {
        $errors['qualifications'] = 'You must have at least one qualification';
    }
    
    if (count($errors) == 0) {
        $success = "Registration complete";   # This will be passed to the frontend.
        unset($_POST);  # after everything works, reset input fields again.
    }


    ###################### 
    # Enforce that we do not retype same data after errors by passing the variables to the "value" parameter in the input tag

    if (!empty($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    }

    if (!empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    }

    if (!empty($_POST['password2'])) {
        $password2 = $_POST['password2'];
    }

    if (!empty($_POST['password']) && !empty($_POST['password2'])) {
        if (($_POST['password'] == $_POST['password2'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
        }
        else{
            $password = "";
            $password2 = "";
        }
    }

    if (!empty($_POST['experience'])) {
        $experience = $_POST['experience'];
    }

    if (!empty($_POST['Military_Status'])) {
        $Military_Status = $_POST['Military_Status'];
    }

        
    if (!empty($_POST['qualifications'])) {
        $qualifications = $_POST['qualifications'];
    }




}

#############################################3


?>



<html>
    <form method = "POST">
    <body>

        <h1>Job Search Registration Form</h1>
        

        <label>First Name</label>
        <input name = "first_name" value="<?= isset($first_name) ? $first_name : '' ?>">
        <span style="color: red"><?= isset($errors['first_name']) ? $errors['first_name'] : '' ?></span>


        <br><br>

        <label>Last Name</label>
        <input name = "last_name" value="<?= isset($last_name) ? $last_name : '' ?>">
        <span style="color: red"><?= isset($errors['last_name']) ? $errors['last_name'] : '' ?></span>


        <br><br>

        <label>Email</label>
        <input name="email" type="email" value="<?= isset($email) ? $email : '' ?>">
        <span style="color: red"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>


        <br><br>

        <label>Password</label>
        <input name="password" type="password" value="<?= isset($password) ? $password : '' ?>">
        <span style="color: red"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>


        <br><br>

        <label>Password Confirmation</label>
        <input name="password2" type="password" value="<?= isset($password2) ? $password2 : '' ?>">
        <span style="color: red"><?= isset($errors['password2']) ? $errors['password2'] : '' ?></span>


        <br><br>

        <label>Work Experience</label>
        <span style="color: red"><?= isset($errors['experience']) ? $errors['experience'] : '' ?></span>


        <br>

        <label>0-1</label>
        <input type="radio" value = "0-1" <?php echo (isset($_POST['experience'])) ? (($_POST['experience'] == "0-1")? "checked":"" ): ""; ?> name="experience" >

        <label>1-5</label>
        <input type="radio" value = "1-5" <?php echo (isset($_POST['experience'])) ? (($_POST['experience'] == "1-5")? "checked":"" ): ""; ?> name="experience">

        <label>5+</label>
        <input type="radio" value = "5+" <?php echo (isset($_POST['experience'])) ? (($_POST['experience'] == "5+")? "checked":"" ): ""; ?>name="experience">

        <br><br>

        <label>Military Status</label>

        <select name="Military_Status">
                <option value="-" <?php echo (isset($POST['Military_Status'])) ? (($_POST['Military_Status'] == "")?  "selected":"" ): ""; ?>>Please pick an option</option>
                <option value="done" <?php echo (isset($_POST['Military_Status'])) ? (($_POST['Military_Status'] == "done")? "selected":"" ): ""; ?>>I finished my military service</option>
                <option value="exempt" <?php echo (isset($_POST['Military_Status'])) ? (($_POST['Military_Status'] == "exempt")? "selected":"" ): ""; ?>>I am exempt from military service</option>
                <option value="not done" <?php echo (isset($_POST['Military_Status'])) ? (($_POST['Military_Status'] == "not done")? "selected":"" ): ""; ?>>I did not finish my military service yet</option>
        </select>

        <span style="color: red"><?= isset($errors['Military_Status']) ? $errors['Military_Status'] : '' ?></span>


        
        <br><br>

        <label>Qualification(s)</label>
        

        <input type="checkbox" name="qualifications[]" value="bsc"<?php echo (isset($_POST['qualifications'])) ? ((in_array("bsc", $_POST['qualifications']))?  "checked":"" ): ""; ?> >
        <label> BSc</label>

        <input type="checkbox" name="qualifications[]" value="msc"<?php echo (isset($_POST['qualifications'])) ? ((in_array("msc", $_POST['qualifications']))?  "checked":"" ): ""; ?>>
        <label> MSc</label>

        <input type="checkbox" name="qualifications[]" value="phd"<?php echo (isset($_POST['qualifications'])) ? ((in_array("phd", $_POST['qualifications']))?  "checked":"" ): ""; ?>>
        <label> phD</label>

        <span style="color: red"><?= isset($errors['qualifications']) ? $errors['qualifications'] : '' ?></span>

        <br><br>
        <button type = "submit">Sign Up</button>

        <span style="color: blue"><?= isset($success) ? $success : '' ?></span>

    </body>
    </form>



</html>

