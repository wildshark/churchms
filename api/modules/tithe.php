<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11/08/2019
 * Time: 7:21 AM
 */

namespace tithe;

class account{

    public static function add($conn,$data){

        $church_id = $data['church_id'];
        $book_id = 1;
        $time = date("Y-m-d H:i:s");
        $date = $data['date'];
        $ref = $data['ref'];
        $detail = $data['name']. "paid tithe amount#". $data['amt'];
        $type = $data['type'];
        $amount = $data['amt'];

        if($type == 1){
            $sql ="INSERT INTO `tbl_transaction` (`churchID`, `tranDate`, `postDate`, `bookID`, `detail`, `ref`, `tranTypeID`, `cash_dr`) VALUES (?,?,?,?,?,?,?,?)";
        }else{
            $sql ="INSERT INTO `tbl_transaction` (`churchID`, `tranDate`, `postDate`, `bookID`, `detail`, `ref`, `tranTypeID`, `bank_dr`) VALUES (?,?,?,?,?,?,?,?)";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss",$church_id,$time,$date,$book_id,$detail,$ref,$type,$amount);

        if(true == $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function data($conn,$data){

        $churchID = $data['church_id'];
        $id = 1;
        $sql="SELECT * FROM `tbl_transaction` where `churchID`=? and `bookID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$churchID,$id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['id'] = null;
            $d['date'] = null;
            $d['detail'] = null;
            $d['ref'] = null;
            $d['type'] = null;
            $d['amount'] = null;

            $response[] = $d;
            return $response;
        }else{
            while($r = $result->fetch_assoc()) {
                if($r['tranTypeID'] == 1){
                    $t = "Cash";
                }else{
                    $t = "Book";
                }

                $d['id'] = $r['tranID'];
                $d['date'] = $r['postDate'];
                $d['detail'] = $r['detail'];
                $d['ref'] = $r['ref'];
                $d['type'] = $t;
                $d['amount'] = $r['cash_dr'] + $r['bank_dr'];

                $response[] = $d;
            }
            return $response;
        }
    }

    public static function system_tithe_payment($conn,$data){

        $churchID = $data['church_id'];
        $date = $data['date'];
        //$date = mktime($d);
        //$date = date_format("Y-m-d",$date);

        $sql ="SELECT * FROM `get_system_tithe_payment` WHERE `churchID`=? AND `date`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$churchID,$date);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['bank'] = 0;
            $d['cash'] = 0;
            $d['amount'] = 0;

            $response[] = $d;
            return $response;
        }else{
            $r = $result->fetch_assoc();
            $d['bank'] = $r['bank'];
            $d['cash'] = $r['cash'];
            $d['amount'] = $r['cash'] + $r['bank'];
            $response[] = $d;
            return $response;
        }

    }

    public static function system_tithe($conn,$data){

        $churchID = $data['church_id'];

        $sql ="SELECT * FROM `get_system_tithe_payment` WHERE `churchID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$churchID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['amount'] = 0;

            $response[] = $d;
            return $response;
        }else{
            $r = $result->fetch_assoc();

            $d['amount'] = $r['cash'] + $r['bank'];
            $response[] = $d;
            return $response;
        }

    }
}