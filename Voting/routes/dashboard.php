<?php
session_start();

if (!isset($_SESSION['userdata'])) {
    header("location: ../index.html");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red">Not Voted</b>';
}
else{
    $status = '<b style="color:green">Voted</b>';
}

    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <style>
        #backbtn {
            padding: 5px;
            border-radius: 5px;
            background-color: blanchedalmond;
            color: rgb(24, 23, 22);
            border-radius: 5px;
            float: left;
            margin: 10px;
        }

        #logoutbtn {
            padding: 5px;
            border-radius: 5px;
            background-color: beige;
            color: rgb(24, 23, 22);
            border-radius: 5px;
            float: right;
            margin: 10px;
        }

        #profile {
            background-color: white;
            width: 30%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            padding: 20px;
            float: left;
        }

        #group {
            background-color: white;
            width: 60%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            padding: 20px;
            float: right;
        }

        #votebtn {
            padding: 5px;
            border-radius: 5px;
            background-color: skyblue;
            color: rgb(24, 23, 22);
            border-radius: 5px;
            float: left;
        }
        #mainpanel {
            padding: 10px;

        }
       #voted{
          padding: 5px;
            border-radius: 5px;
            background-color: green;
            color: rgb(219, 214, 209);
            border-radius: 5px;
            float: left;
       }
    </style>

    <div id="mainsector">
        <center>
            <div id="headersection">
                <a href="../"><button id="backbtn">Back</button></a> 
                <a href="logout.php"><button id="logoutbtn">Log Out</button></a>
                <h3>Online Voting System</h3>
            </div>
        </center>
        <hr>
        <div id="mainpanel">
            <div id="Profile">
                <center> <img src="../upload/<?php echo $userdata['photo']; ?>" height="120" width="100"><br><br>
                </center>
                <b>Name:</b>
                <?php echo $userdata['name']; ?><br><br>
                <b>Mobile:</b>
                <?php echo $userdata['mobile']; ?><br><br>
                <b>Address:</b>
                <?php echo $userdata['address']; ?><br><br>
                <b>Status:</b>
                <?php echo $status ?><br><br>
            </div>


            <div id="Group">
                <?php
                if ($_SESSION['groupsdata']) {
                    for ($i = 0; $i < count($groupsdata); $i++) {
                        ?>
                        <div>
                            <img style="float:right" src="../upload/<?php echo $groupsdata[$i]['photo'] ?>" alt="" height="100"
                                width="100"><br><br>
                            <b>Group Name: </b>
                            <?php echo $groupsdata[$i]['name'] ?> <br><br>
                            <b>Votes: </b>
                            <?php echo $groupsdata[$i]['votes'] ?> <br><br>
                            <form action="/PROJECT1/api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <?php 
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                <input type="submit" name="votebtn" value="vote" id="votebtn">
                                        <?php
                                    }
                                    else{
                                             ?>
                                <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button> 
                                        <?php   
                                    }
                                ?>
                                
                            </form>
                            
                        </div>
                       <hr>
                        <?php
                        
                    }
                } else {

                }
                ?>
                
            </div>
        </div>


    </div>




</body>

</html>