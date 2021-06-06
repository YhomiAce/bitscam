<?php
    header("Access-Control-Allow-Origin: *");
    function fetchTransactions($q) {
        $curl = curl_init();
        $url = "https://api.whale-alert.io/v1/transaction/ethereum/$q?api_key=KpEf8AfgCDv5Tylzjr0pMInnKipPQ6pa";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);

        if($e = curl_error($curl)){
            echo $e;
        }else{
            $decoded = json_decode($res,true);
            echo json_encode($res);
        }
        curl_close($curl);
    }
    if(isset($_POST['action']) && $_POST['action'] == "CallAPI"){
        // echo "connect";
        $query =  $_GET['q'];
        fetchTransactions($query);

    }
    // fetchTransactions("6274840b6450ae79d528472b9ecc78862e2bdc74c6130f39757ccdcabbd8da82")
    
    
?>