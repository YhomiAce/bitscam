<?php
    require_once "actions.php";
    require_once "db.php";

    if (isset($_POST['action']) && $_POST['action'] == "submit_scam_report") {
        $scamType = testInput($_POST['scam_type']);
        $address = testInput($_POST['address']);
        $description = testInput($_POST['description']);
        $save = saveScam($conn, $scamType, $address, $description);
        if($save) {
            echo "success";
        }else{
            echo "fail";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == "CallAPI") {
        // print_r($_POST);
        $query = testInput($_POST['query']);
        $results = searchForScam($conn, $query);
        echo json_encode($results);
    }

?>