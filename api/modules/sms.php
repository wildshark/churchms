<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/06/2019
 * Time: 10:25 AM
 */
namespace sms;

class model{

    function add_sms($conn,$data){

        $date = $data[0];
        $churchID = $data[1];
        $to=$data[2];
        $form = $data[3];
        $msg = $data[4];

        $sql = "INSERT INTO `tbl_sms` (`churchID`, `smsDate`, `to`,`form`, `sms`) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",$churchID,$date,$to,$form,$msg);

        if($stmt->execute()){
            return 200;
        }else{
            return 500;
        }
    }
}

