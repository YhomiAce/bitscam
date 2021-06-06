<?php
    header("Access-Control-Allow-Origin: *");
    function fetchTransactions() {
        $curl = curl_init();
        $url = "https://api.whale-alert.io/v1/transaction/ethereum/0x0015286d8642f0e0553b7fefa1c168787ae71173cbf82ec2f2a1b2e0ffee72b2?api_key=KpEf8AfgCDv5Tylzjr0pMInnKipPQ6pa";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);

        if($e = curl_error($curl)){
            echo $e;
        }else{
            $decoded = json_decode($res,true);
            print_r($decoded);
        }
        curl_close($curl);
    }
    if(isset($_POST['action']) && $_POST['action'] == "CallAPI"){
        // echo "connect";
        fetchTransactions();

    }

?>