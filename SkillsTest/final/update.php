<?php
    $isbn = $_GET["rec0"];
    $title = $_GET["rec1"];
    $copywrite = $_GET["rec2"];
    $edition = $_GET["rec3"];
    $price = $_GET["rec4"];
    $quantity = $_GET["rec5"];

    if (isset($_GET['update']))
    {
        $isbn = $_GET["isbn"];
        $title = $_GET["title"];
        $copywrite = $_GET["copywrite"];
        $edition = $_GET["edition"];
        $price = $_GET["price"];
        $quantity = $_GET["quantity"];

        $con = mysqli_connect("localhost","root","","book");
        if ($con)
        {
            $query  = "UPDATE 
                            books
                        SET
                            title = '".$title."',
                            copywrite = '".$copywrite."',
                            edition = '".$edition."',
                            price = '".$price."',
                            quantity = '".$quantity."'
                        WHERE
                            isbn = '".$isbn."'";
            mysqli_query($con,$query);
            header("location: search.php?message=updated successfully");
        }
        else
        {
            echo "Erorr!";
        }
        mysqli_close($con);
    }
?>

<body>
    <form action="update.php" method="GET">
        ISBN: <input type="number" name="isbn" value="<?php echo $isbn?>" /><br /> 
        title: <input type="text" name="title" value="<?php echo $title?>" /><br /> 
        copywrite: <input type="text" name="copywrite" value="<?php echo $copywrite?>" /><br /> 
        edition: <input type="number" name="edition" value="<?php echo $edition?>" /><br /> 
        price: <input type="number" step="0.01" name="price" value="<?php echo $price?>" /><br /> 
        quantity: <input type="number" name="quantity" value="<?php echo $quantity?>" /><br /> 
        <input type="submit" name="update" value="update" />
    </form>
    <br />
    <button onclick="window.location.href='search.php'">Go Back</button>
</body>