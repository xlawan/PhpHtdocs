<html>
    <header>
        <title>Activity 3</title>
        <style>
			* {
                padding: 0;
            }
            th, td {
				padding-top: 10px;
				padding-bottom: 20px;
				padding-left: 30px;
				padding-right: 40px;
			}
            
		</style>
    </header>
    <body>
        <?php
            if(isset($_GET["calculate"]) == true) 
            {
                $rows = 0;
                $cols = 0;
                $var3 = 0;

                $rows = $_GET["rows"];
                $cols = $_GET["columns"];
                echo "<table border =\"1\" style='border-collapse: collapse'>";
                for ($i = 1; $i <= $cols; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= $rows; $j++){
                        echo "<td>" .$j * $i . "</td> ";
                    }
                    echo "</tr>";
                    echo "<br />";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>