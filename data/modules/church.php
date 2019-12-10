<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 16/06/2019
 * Time: 7:22 PM
 */
namespace church;

class model{

    function groups($conn,$data){
        
        $status = 1;
        $group = $data['groups'];
        $church = $data['church_id'];

        $sql="INSERT INTO `tbl_group` (`churchID`, `groups`,`statusID`) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$church,$group,$status);

        if(TRUE == $stmt->execute()){
            return $data;
        }else {
            return false;
        }
    }

    function position($conn,$data){

        $status= 1;
        $position = $data['position'];
        $church = $data['church_id'];


        $sql="INSERT INTO `tbl_position` (`churchID`, `position`,`statusID`) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$church,$position,$status);

        if(TRUE == $stmt->execute()){
            return $data;
        }else {
            return false;
        }
    }

    function branch($conn,$data){

        $status = 1;
        $branch = $data['branch'];
        $church = $data['church_id'];


        $sql="INSERT INTO `tbl_branch` (`churchID`, `branch`,`statusID`) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$church,$branch,$status);

        if(TRUE == $stmt->execute()){
            return $data;
        }else {
            return false;
        }
    }

    function add_church($conn,$data){

        $tab = $data[0];

        if($tab == 1){
            $id = $data[1];
            $name = $data[2];
            $surname = $data[3];
            $church = $data[4];
            $prefix = $data[5];
            $email = $data[6];
            $mobile = $data[7];
            $website = $data[8];
            $address = $data[9];

            $sql="UPDATE `tbl_church` SET `fname`=?, `surname`=?, `church`=?, `prefix`=?, `mobile`=?, `email`=?, `website`=?, `address`=? WHERE (`churchID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss",$name,$surname,$church,$prefix,$mobile,$email,$website,$address,$id);

        }elseif ($tab == 2){

            $id = $data[1];
            $username = $data[2];
            $password = $data[3];

            $sql="UPDATE `tbl_church` SET `username`=?, `password`=? WHERE (`churchID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss",$username,$password,$id);

        }

        if(TRUE == $stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

    function option($conn,$data){

        $option = $data[0];
        $id = $data[1];
        $set = $data[2];

        if ($set === "position") {

            $sql = "UPDATE `tbl_position` SET `statusID`=? WHERE (`positionID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $option, $id);

            if (TRUE == $stmt->execute()) {
                return true;
            } else {
                return false;
            }

        }elseif ($set === "groups") {
         
            $sql = "UPDATE `tbl_group` SET `statusID`=? WHERE (`groupID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $option, $id);

            if (TRUE == $stmt->execute()) {
                return true;
            } else {
                return false;
            }

        }elseif ($set ==="branch"){
            
            $sql = "UPDATE `tbl_branch` SET `statusID`=? WHERE (`branchID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $option, $id);

            if (TRUE == $stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
}