<html>
    <head>
        <title>Session 3 Assignment</title>
    </head>
    <body>
        <h1>Miscellaneous Input Types</h1>
        <form action="Retrieve_Data.php" method="POST">

            <label for="first-name">First Name</label>
            <input type="text" name="first_name">

            <label for="last-name">Last Name</label>
            <input name="last_name">

            <br><br>

            <label for="email">Email</label>
            <input type="email" name="email">
            
            <label for="password">Password</label>
            <input type="password" name="password">

            <br><br>

            <label for="Gender">Male</label>
            <input type="radio" name="Gender">

            <label for="Gender">Female</label>
            <input type="radio" name="Gender">

            <br><br>

            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday">

            <br><br>

            <label for="Search Bar">Find:</label>
            <input type="search" name="search">

            <br><br>

            <label for="Study">SQL</label>
            <input type="checkbox" name="study">

            <label for="Study">PHP</label>
            <input type="checkbox" name="study">

            <label for="Study">React</label>
            <input type="checkbox" name="study">

            <label for="Study">Laravel</label>
            <input type="checkbox" name="study">

            <br><br>

            <label for="link">Link</label>
            <input type="url" name="link">

            <br><br>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </body>
</html>