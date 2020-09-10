<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor = new Instructor();

    $instructor->setFirstName($_POST['first_name']);
    $instructor->setLastName($_POST['last_name']);
    $instructor->setEmail($_POST['email']);
    $instructor->setPhone($_POST['phone']);
    $instructor->setOccupation($_POST['occupation']);
    $instructor->setPosition($_POST['position']);

    $instructor->store();

    header('Location: ./index.php?p=instructors');

}

?>

<html>
    <body>
        <h1>Create New Instructor</h1>

            <div class="card p-3">

            <form method="POST">
                <div class="form-group">
                    <label>First Name</label>
                    <input name="first_name" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Last Name</label>
                    <input name="last_name" class="form-control">
                </div>

          
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input name="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label>Occupation</label>
                    <input name="occupation" class="form-control">
                </div>

                <div class="form-group">
                    <label>Position</label>
                    <input name="position" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                </div>

            </form>
            </div>
    </body>
</html>