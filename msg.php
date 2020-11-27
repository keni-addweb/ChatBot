<?php
    //database Connection
    $conn = mysqli_connect("mysql","root","root","bot") or die("Database Error");
    
    //get user msg throw ajax
    $getmsg = mysqli_real_escape_string($conn, $_POST['text']);

    //check query
    $check_query = "SELECT replies FROM chatbot WHERE queries LIKE '%$getmsg%'";
    $run_query = mysqli_query($conn,$check_query) or die("Error");

    if(mysqli_num_rows($run_query)>0){
        //fetch reply from database
        $fetch_data = mysqli_fetch_assoc($run_query);
        $replay = $fetch_data['replies'];
        echo $replay;
    }
    else{
        echo "Sorry not able to get your message";
    }

?>