<?php
    class API {
        //full name as the parameter of it.
        public function printName($name) {
            echo "Full Name: $name<br /><br />";
        }

        //an Array Value of hobbies as the parameter of it.
        public function printHobbies($hobbies) {
            echo "Hobbies: <br />";
            //for ($i = 1; $i < count($hobbies); $i++) {
            //    echo "<p>$hobbies</p><br />";
            //}
            foreach ($hobbies as $hob) {
                echo "\t $hob <br>";
            }
            echo "<br />";
        }

        //Object Value of Age, email address and Birthday as the parameter of it.
        public function printOtherInfo($otherInfo) {
            echo "Age: ".$otherInfo->age."<br />";
            echo "Email: ".$otherInfo->email."<br />";
            echo "Birthday: ".$otherInfo->birthday."<br />";
        }
    }

    $api = new API();

    //Input for Full Name
    $api->printName("Alixander D. Lawan");

    //Input for Hobbies
    $hobbies = array("Playing Computer Games", "Reading Books", "Listening Music", "Learning to code");
    $api->printHobbies($hobbies);

    //Input for otherInfo
    $otherInfo = new stdClass();
    $otherInfo->age = 23;
    $otherInfo->email = "alixander.lawan.pixel8@gmail.com";
    $otherInfo->birthday = "December 2, 1999";
    $api->printOtherInfo($otherInfo);
?>