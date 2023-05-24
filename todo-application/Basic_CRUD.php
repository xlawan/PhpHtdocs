<?php
    require_once('vendor\thingengineer\mysqli-database-class\MysqliDb.php');

    //basic configurations
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "basic_crud";

    //Connect to database
    $db = new MySQLiDb($hostname, $username, $password, $database);

    //check for connection errors
    if ($db) {
        echo "Connected to Database Successfully <br /><br />";
    } else {
        echo "error connecting to database. Error: " . $db->connect_error.  "<br />";
    }

    //create table using mysql
    $sqlCreateTable = "CREATE TABLE users (
        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        gender VARCHAR(10) NOT NULL
    )";

    //if (mysqli_query($con, $sqlCreateTable)) {
    //    echo "New table created successfully!";
    //} else {
    //    echo "Error creating table: " . mysqli_error($conn);
    //}
    
    //Insert data into table (CREATE)
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];

        $data = array(
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
        );

        if ($db->insert('users', $data)) {
            echo "<h2>Record inserted successfully!</h2> <br />";
        } else {
            echo "ERROR: " . $db->getLastError . "<br />";
        }
    }

    //Update data into table (UPDATE)
    if (isset($_POST["update"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];

        $data = array(
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
        );

        $db->where('id',$id);

        if ($db->update('users',$data)) {
            echo "<h2>Record updated successfully! </h2> <br />";
        } else {
            echo "Error: " . $db->getLastError() . "<br />";
        }
        
    }
    
    //Delete data from the table (DELETE)
    if (isset($_POST["delete"])) {
        $id = $_POST["id"];

        $db->where('id',$id);

        if ($db->delete('users')) {
            echo "<h2>Record deleted successfully! </h2> <br />";
        } else {
            echo "Error: " . $db->getLastError();
        }
    }

    //Retrieve data from the database (READ)
    $result = $db->get('users');

    if ($result) {
        foreach ($result as $row) {
            echo "ID:" . $row["id"] . "<br />";
            echo "NAME:" . $row["name"] . "<br />";
            echo "EMAIL:" . $row["email"] . "<br />";
            echo "GENDER:" . $row["gender"] . "<br /><br />";
        }
    }
    else {
        echo "Error: " . $db->getLastError() . "<br />";
    }

    //closing the database connection
    $db->disconnect();
?>

<html lang="en">
    <head>
        <title>BASIC CRUD</title>
    </head>
    <body>
        <!--Insertion form-->
        <form method="POST" action="Basic_CRUD.php">
            <h3>Insert Data:</h3>
            Name: <input type="text" name="name" value="" placeholder="Type your name here..." /> <br />
            Email: <input type="email" name="email" value="" placeholder="Type your email here..." /> <br />
            Gender: <input type="text" name="gender" value="" placeholder="Type your gender (MALE/FEMALE) here..." /> <br />
            <button type="submit" name="submit">Insert Data</button>
        </form>	

        <!--Update form-->
        <form method="POST" action="Basic_CRUD.php">
            <h3>Update Data using ID:</h3>
            ID: <input type="number" name="id" value="" placeholder="Type the ID here..." /> <br />
            Name: <input type="text" name="name" value="" placeholder="Type your name here..." /> <br />
            Email: <input type="email" name="email" value="" placeholder="Type your email here..." /> <br />
            Gender: <input type="text" name="gender" value="" placeholder="Type your gender (MALE/FEMALE) here..." /> <br />
            <button type="submit" name="update">Update Data</button>
        </form>

        <!--Delete form-->
        <form method="POST" action="Basic_CRUD.php">
            <h3>Delete Data using ID:</h3>
            ID: <input type="number" name="id" value="" placeholder="Type the ID here..." /> <br />
            <button type="submit" name="delete">Delete Data</button>
        </form>
    </body>
</html>