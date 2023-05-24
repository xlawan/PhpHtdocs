<?php
    if (isset($_POST["add"])) 
    {
        $isbn = $_POST["isbn"];
        $title = $_POST["title"];
        $copywrite = $_POST["copywrite"];
        $edition = $_POST["edition"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $con = mysqli_connect("localhost","root","","book");
        if ($con)
        {
            $query = "INSERT INTO books (isbn,title,copywrite,edition,price,quantity)
                        VALUES
                            ('".$isbn."','".$title."','".$copywrite."','".$edition."','".$price."','".$quantity."')";
            mysqli_query($con,$query);
            header("location: index.php?message=Added");
        }
        else
        {
            echo "databse error!";
        }
        mysqli_close($con);
    }
?>

<body>
    <form action="add.php" method="POST">
        ISBN: <input type="number" name="isbn" /><br /> 
        title: <input type="text" name="title" /><br /> 
        copywrite: <input type="text" name="copywrite" /><br /> 
        edition: <input type="number" name="edition" /><br /> 
        price: <input type="number" step="0.01" name="price" /><br /> 
        quantity: <input type="number" name="quantity" /><br /> 
        <input type="submit" name="add" value="add" />
    </form>
    
</body>