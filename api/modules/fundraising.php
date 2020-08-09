<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 05/08/2019
 * Time: 6:37 PM
 */

namespace fundraising;

class account{

    public static function add_purpose($conn,$data){

        $churchID = $data['church_id'];
        $date = $data['date'];
        $purpose = $data['purpose'];
        $amount = $data['expected'];

        $sql="INSERT INTO `tbl_fundraising_main` (`churchID`, `cDate`, `purpose`, `expected`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss",$churchID,$date,$purpose,$amount);

        if($stmt->execute()){
            return $data;
        }else{
            return false;
        }
    }

    public static function edit_purpose($conn,$data){

        $churchID = $data['church_id'];
        $id = $data['member_id'];
        $date = $data['date'];
        $purpose = $data['purpose'];
        $amount = $data['expected'];

        $sql="UPDATE `tbl_fundraising_main` SET `cDate`='2019-08-06', `purpose`='11', `expected`='11' WHERE (`fundID`='$id')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss",$churchID,$date,$purpose,$amount,$id);

        if($stmt->execute()){
            return $data;
        }else{
            return false;
        }
    }

    public static function fundraising_data($conn,$data){

        $churchID = $data['church_id'];

        $sql="SELECT * FROM `get_fundraising_main` where `churchID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$churchID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $response[] = null;
        }else{
            while($r = $result->fetch_assoc()) {
                $d['id'] = $r['fundID'];
                $d['date'] = $r['cDate'];
                $d['purpose'] = $r['purpose'];
                $d['amount'] = $r['expected'];

                $response[] = $d;

            }
            return $response;
        }

    }

    public static function fundraising_data_detail($conn,$data){

        $churchID = $data['church_id'];
        $id = $data['id'];

        $sql="SELECT * FROM `get_fundraising_detail` where `churchID`=? and `fundID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$churchID,$id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $response[] = false;
        }else{
            while($r = $result->fetch_assoc()) {
                $d['id'] = $r['detailID'];
                $d['fund_id'] = $r['fundID'];
                $d['time'] = $r['f_time'];
                $d['date'] = $r['f_date'];
                $d['name'] = $r['m_name'];
                $d['mobile'] = $r['m_mobile'];
                $d['ref'] = $r['ref'];
                $d['type'] = $r['typeID'];
                $d['amount'] = $r['amount'];
                $d['paid'] = $r['paid'];

                $response[] = $d;
            }
            return $response;
        }

    }

    public static function fundraising_summary($conn,$data){

        $churchID = $data['church_id'];
        $id = $data['id'];

        $sql="SELECT * FROM `get_fundraising_summary` where `churchID`=? and `fundID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$churchID,$id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['id'] = null;
            $d['church_id'] = null;
            $d['expected'] = null;
            $d['raise'] = null;
            $d['payment'] = null;

            $response[] = $d;
        }else{
            while($r = $result->fetch_assoc()) {
                $d['id'] = $r['fundID'];
                $d['church_id'] = $r['churchID'];
                $d['expected'] = $r['expected'];
                $d['raise'] = $r['raise'];
                $d['payment'] = $r['paid'];

                $response[] = $d;
            }
            return $response;
        }
    }

    public static function add_raise_payment_fundraising($conn,$data){

        $id = $data['church_id'];
        $time = date("Y-m-d H:i:s");
        $date = $data['date'];
        $ref = $data['ref'];
        $purpose = $data['purpose'];
        $name = $data['name'];
        $type = $data['type'];
        $amt = $data['amt'];

        if($type == 1){
            $sql ="INSERT INTO `tbl_fundraising_detail` (`churchID`, `fundID`, `m_name`, `f_time`, `f_date`, `ref`, `amount`,`typeID`) VALUES (?,?,?,?,?,?,?,?)";
        }elseif ($type == 2){
            $sql ="INSERT INTO `tbl_fundraising_detail` (`churchID`, `fundID`, `m_name`, `f_time`, `f_date`, `ref`, `paid`, `typeID`) VALUES (?,?,?,?,?,?,?,?)";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss",$id,$purpose,$name,$time,$date,$ref,$amt,$type);

        if(true == $stmt->execute()){
            return true;
        }else{
            return $data;
        }
    }
}