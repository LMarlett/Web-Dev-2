<?php
 //reading the passing variable: program code (progCode)
$passVar=$_POST["tourKey"];

 //accessing(connecting) the database newspapers
 //we need 4 parameters
 $server="localhost";
 $user="root";
 $password="";
 $database="tours";
 //$table="tours_table";

 //connection means to store the connection to a variable
 $conn=mysqli_connect($server,$user,$password,$database) or die("No connection");
    
    //creating a SQL select command to retrieve records with tour name value
    //equals to $passCountry
    $SQLselect="select * from tours_table where tourname='" . $passVar . "'";
    
    //running the above SQlselect
    $result = mysqli_query($conn,$SQLselect) or die("SQLselect did not run");
    
    //getting the records
    while($row=mysqli_fetch_array($result))
    {
        //getting the fields' values
        $tourname = $row["tourname"];
        $photo = $row["tourphoto"];
        $tourguide = $row["tourguide"];
        $email = $row["email"];
        $desc0 = $row["description0"];
        $desc1 = $row["description1"];
        $desc2 = $row["description2"];
        $desc3 = $row["description3"];
        
        $start = $row["tourstart"];
        $end = $row["tourend"];
        $day1 = $row["day1"];
        $day2 = $row["day2"];
        $day3 = $row["day3"];
        $day4 = $row["day4"];
        $day5 = $row["day5"];
        $day6 = $row["day6"];
        $day7 = $row["day7"];
        $day8 = $row["day8"];
        $day9 = $row["day9"];
        $day10 = $row["day10"];
        $day11 = $row["day11"];
        $day12 = $row["day12"];
        $day13 = $row["day13"];
        $day14 = $row["day14"];

       $itin1 = $row["itinerary1"];
        $itin2 = $row["itinerary2"];
        $itin3 = $row["itinerary3"];
        $itin4 = $row["itinerary4"];
        $itin5 = $row["itinerary5"];
        $itin6 = $row["itinerary6"];
        $itin7 = $row["itinerary7"];
        $itin8 = $row["itinerary8"];
        $itin9 = $row["itinerary9"];
        $itin10 = $row["itinerary10"];
        $itin11 = $row["itinerary11"];
        $itin12 = $row["itinerary12"];
        $itin13 = $row["itinerary13"];
        $itin14 = $row["itinerary14"]; 


        
        //send back the fields' values 
        $data = "<h1 style='color:#89d0ff; font-size:50px;'>".$tourname."</h1></br>
        <img src='".$photo."' alt='".$tourname."'/></br>
        <h1 style='color: purple;'>TourGuide: ".$tourguide."</h1><br>
        <p class='b'>".$desc0."</p>
        <p class='b'>".$desc1."</p>
        <p class='b'>".$desc2."</p>
        <p class='b'>".$desc3."</p>
        <h1 class = 'b'><a href='".$email."'>".$email."</a></h1></br>";
        
        
        
        $tourtable = "<h1 style='color:#89d0ff; font-size:50px;'>
        Itinerary</h1><table  align= 'center'><tr><th>Day Number</th><th>".
        "Itinerary</th></tr><tr><td>".$day1."</td><td>".$itin1."</td></tr>
        </th></tr><tr><td>".$day2."</td><td>".$itin2."</td></tr>
        </th></tr><tr><td>".$day3."</td><td>".$itin3."</td></tr>
        </th></tr><tr><td>".$day4."</td><td>".$itin4."</td></tr>
        </th></tr><tr><td>".$day5."</td><td>".$itin5."</td></tr>
        </th></tr><tr><td>".$day6."</td><td>".$itin6."</td></tr>
        </th></tr><tr><td>".$day7."</td><td>".$itin7."</td></tr>
        </th></tr><tr><td>".$day8."</td><td>".$itin8."</td></tr>
        </th></tr><tr><td>".$day9."</td><td>".$itin9."</td></tr>
        </th></tr><tr><td>".$day10."</td><td>".$itin10."</td></tr>
        </th></tr><tr><td>".$day11."</td><td>".$itin11."</td></tr>
        </th></tr><tr><td>".$day12."</td><td>".$itin12."</td></tr>
        </th></tr><tr><td>".$day13."</td><td>".$itin13."</td></tr>
        </th></tr><tr><td>".$day14."</td><td>".$itin14."</td></tr>
        </table";
        print($data);
        print($tourtable);
    }
    
    ?>