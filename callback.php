<?php
  include 'execute.php';

    if (isset($_GET['status']) && $_GET['status'] == 'success'){
        $result_data = execute($_GET['paymentID']);
        $response = json_decode($result_data, true);
        
        if(isset($response['transactionStatus']) && $response['transactionStatus'] != 'Completed'){
            // Error case
            //echo $response['statusMessage'];
            header("Location: fail.php?statusMessage=".$response['statusMessage']); 
            exit;
        }else{
            // db insert operation save $response data  
        header("Location: success.php?trxID=".$response['trxID']); 
        exit;
        }
    }else{
        header("Location: fail.php");  
        exit;
    }


?>
