<!doctype html>

<html>

<head>
    <title> World Tour China, Inc.- Tours of Scotland</title>
  <!-- loading jQuery from a CDN (Google) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
  
    <script type="text/javascript">
        function runjQuery0()
        {
      
        //reading the selected country from the select element below
                var selectedTour=document.getElementById("tourList").value;
      
      
      //let's communicate with the database via jQuery
      $.ajax({
        //we need parameters to communicate
        url: "tourList.php",
        type: "POST",
        data: "tourKey=" + selectedTour, 
        dataType: "text",
        success: function(serverdata)
        {
         
                        //testing if the server connects and sends
                        //it does!
                        //the server's response (serverData) is a string
                        //of values (capital,mildistance,kmdistance) separated by comma
                    /*    var tourname=serverdata.split(",")[0];
                        var tourguide=serverdata.split(",")[1];
                        var email=serverdata.split(",")[2]; */
                        
         document.getElementById("displayhere").innerHTML = serverdata;
         
        }
      });

        }
    //end of runjQuery0()
  

    </script>
    
    <style>
      html {
      background: url(background.jpg) no-repeat center center fixed;
     background-size: cover;
     background-repeat: no-repeat;
    background-position: center top; 
     
         }

     .a {

        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: black;
        background-color: white;
        margin: 50px;
        padding: 20px;
        width:300px;
        margin-right:auto;
        margin-left:auto;
      }
      
      .b {
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        color: black;
        background-color: #c8a1b1;
        margin: 50px;
        padding: 20px;
        width:600px;
        margin-right:auto;
        margin-left:auto;
        font-size:20px;
      }

      h1 {
       font-family: Verdana, Geneva, sans-serif;
       text-align:center;
       
         }


      table {
       border: none;
        margin-right:auto;
        margin-left:auto;
       padding: 20px;
        width:800px;
             }

     th,
     td {
       border: none;
      background-color: #dddddd;
      padding: 5px;
      width: 100px;
         }
         
         img
         {
    display: block;
    margin-left: auto;
    margin-right: auto
    }
    </style>
       
</head>


    <body>

<h1 style = "font-size:60px; color:#89d0ff;   font-style: italic;
line-height:50px;">World Tour China, Inc.</h1>

     <img src="logo.png" alt="Logo" align="middle">       

       <h1 style="color: #8b8dda; font-size:30px;  font-style: italic;
       line-height:10px;">Scottish Summer Tours</h1>
       <div class="a">
        <select id="tourList" onchange="runjQuery0()">
            <option value="">Select a Tour</option>
           <!-- <option value="All">All</option>
            <option value="castles">Castles of Scotland</option>
            <option value="hebrides">The Hebrides</option>
            <option value="highlands">The Highlands</option>
            <option value="lakes">The Lake District</option>

        </select>
       </div> -->
            
            <!--populating select element using PHP -->
            <?php
                //access database, i.e.,connecting to the database
                //one needs 4 parameters
                $server="localhost";
                $user="root";
                $password="";
                $database="tours";
                
                //connection is done by creating a variable
                $conn = mysqli_connect($server,$user,$password,$database) or die("No connection");
                
                //creating a SQL select  command
                $SQLselect="select * from tours_table";
                
                print($tourname);
                
                //running the above SQLselect
                $result = mysqli_query($conn,$SQLselect) or die("SQLselect did not run");
                
                $foundrecs = false;
                
                if($row=mysqli_fetch_array($result))
                {
                    $foundrecs = true;
                    
                    //we need to move the pointer(logical) back to the first record
                    mysqli_data_seek($result,0);
                    
                    //looping around all the records
                    while($row=mysqli_fetch_array($result))
                    {
                        //getting the field country value
                        $tourname = $row["tourname"];
                        print ("<option value='".$tourname."'>".$tourname."</option>");
                    }
                }
                
                if ($foundrecs == false) print("alert('No records')");
            
            
            ?>
                    </select>

       </div>

        <br/>
        <br/>
        
        <div id="displayhere" ><p></p></div>
        </br>
        </br>
<img style="bottom: 0px;     position:fixed;
 display:block; margin-left:auto; margin-right:auto;" src="logo.png" width="7%" alt="Logo">
    </body>
</html>
