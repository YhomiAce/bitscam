<?php

    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }

        // Message 
        function displayMessage($type,$msg){
            return '<div class="alert alert-'.$type.' alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong class="text-center">'.$msg.'</strong>
            </div>';
        }

    function saveScam($conn,$scam,$address,$description)
    {
        $sql = "INSERT INTO scams(scam,address,description) VALUES(:scam,:address,:description)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['scam'=>$scam, 'address'=>$address, 'description'=>$description]);
        return true;
    }

    function getAllScams($conn) {
        $scam = "SELECT * FROM scams";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function searchForScam($conn, $query) {
        $sql = "SELECT * FROM scams where address LIKE '%$query%'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>