<?php
    if (isset($_POST["login"]))
    {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $con = mysqli_connect("localhost","root","","student");
        if ($con)
        {
            $query = "SELECT 
                            username, password
                        FROM
                            login
                        WHERE
                            username = '".$user."' and
                            password = '".$pass."'";
            $record = mysqli_query($con,$query);
            if (mysqli_num_rows($record)>0)
            {
                while (mysqli_fetch_row($record))
                {
                    header("location: search_students.php?message=Logged in successfully!");
                    exit;
                }
            }
            else
            {
                echo "<h3>Wrong Username or Password</h3>";
            }
        }
        else
        {
            echo "Database error!";
        }
        mysqli_close($con);
    }
?>

<body>
    <h1>LOGIN</h1>
    <form action="login.php" method="POST">
        Username: <input type="text" name="username" /> <br />
        Password: <input type="password" name="password" /> <br />
        <input type="submit" name="login" value="Login" />
    </form>
</body>