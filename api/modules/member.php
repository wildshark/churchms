<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 8:14 PM
 */
namespace membership;

class model{

    public static function add_member($conn,$data){

        if($data['tab'] == 1){

            $churchID = $data['id'];
            $fname = $data['name'];
            $surname = $data['surname'];
            $other = $data['other'];
            $genderID = $data['gender'];
            $dob = $data['dob'];
            $occupation = $data['occupation'];
            $marital = $data['marital'];
            $photo = $data['photo'];

            $sql = "INSERT INTO `tbl_membership` (`churchID`, `fname`, `surname`, `other`, `genderID`, `dob`, `occupation`, `marital`,`photo`) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssssss",$churchID,$fname,$surname,$other,$genderID,$dob,$occupation,$marital,$photo);

            if($stmt->execute()){
                return $conn->insert_id;
            }else{
                return false;
            }

        }elseif ($data['tab'] == 2){

            $id = $data['member_id'];
            $mobile1 = $data['mobile1'];
            $mobile2 = $data['mobile2'];
            $email = $data['email'];
            $hometown = $data['hometown'];
            $state = $data['state'];
            $countryID = $data['country'];
            $address = $data['address'];

            $sql="UPDATE `tbl_membership` SET `mobile1`=?, `mobile2`=?, `email`=?, `hometown`=?, `state`=?, `countryID`=?, `address`=? WHERE (`memberID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss",$mobile1,$mobile2,$email,$hometown,$state,$countryID,$address,$id);

            if($stmt->execute()){
                return $data;
            }else{
                return false;
            }

        }elseif ($data['tab'] == 3){

            $id = $data['member_id'];
            $positionID = $data['position'];
            $groupID = $data['group'];
            $branch = $data['branch'];
            $status = $data['status'];

            $sql ="UPDATE `tbl_membership` SET `positionID`=?, `groupID`=?,`branchID`=?,`statusID`=? WHERE (`memberID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss",$positionID,$groupID,$branch,$status,$id);

            if(TRUE == $stmt->execute()){
                return $data;
            }else {
                return false;
            }
        }
    }

    public static function update_member($conn,$data){

        if($data['tab'] == 1){

            $memberID = $data['member_id'];
            $fname = $data['name'];
            $surname = $data['surname'];
            $other = $data['other'];
            $genderID = $data['gender'];
            $dob = $data['dob'];
            $occupation = $data['occupation'];
            $marital = $data['marital'];

            $sql ="UPDATE `tbl_membership` SET `fname`=?, `surname`=?, `other`=?, `genderID`=?, `dob`=?, `occupation`=?, `marital`=? WHERE (`memberID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss",$fname,$surname,$other,$genderID,$dob,$occupation,$marital,$memberID);

            if($stmt->execute()){
                return $data;
            }else{
                return false;
            }

        }elseif ($data['tab'] == 2){
            
            $id = $data['member_id'];
            $mobile1 = $data['mobile1'];
            $mobile2 = $data['mobile2'];
            $email = $data['email'];
            $hometown = $data['hometown'];
            $state = $data['state'];
            $countryID = $data['country'];
            $address = $data['address'];

            $sql="UPDATE `tbl_membership` SET `mobile1`=?, `mobile2`=?, `email`=?, `hometown`=?, `state`=?, `countryID`=?, `address`=? WHERE (`memberID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss",$mobile1,$mobile2,$email,$hometown,$state,$countryID,$address,$id);

            if($stmt->execute()){
                return $data;
            }else{
                return false;
            }

        }elseif ($data['tab'] == 3){
            
            $id = $data['member_id'];
            $positionID = $data['position'];
            $groupID = $data['group'];
            $branch = $data['branch'];
            $status = $data['status'];

            $sql ="UPDATE `tbl_membership` SET `positionID`=?, `groupID`=?,`branchID`=?,`statusID`=? WHERE (`memberID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss",$positionID,$groupID,$branch,$status,$id);

            if(TRUE == $stmt->execute()){
                return $data;
            }else {
                return false;
            }
        }
    }

    public static function view_member($conn,$data){

        $id = $data['id'];
        
        $sql ="SELECT * FROM `get_membership` where `churchID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return false;
        }else{
            // output data of each row
            while($r = $result->fetch_assoc()) {
                $record[] = $r;
            }
        }

        return $record;
    }

    public static function filter_member($conn,$data){

        $churchID = $data['church_id'];
        $memberID = $data['member_id'];

        $sql ="SELECT * FROM `get_membership` where `churchID`=? and `memberID`=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$churchID,$memberID);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return false;
        }else{
            // output data of each row
            while($r = $result->fetch_assoc()) {

                $id = $r['memberID'];
                $name = $r['fname'];
                $surname = $r['surname'];
                $other = $r['other'];
                $genderID = $r['genderID'];
                $dob = $r['dob'];
                $occupation = $r['occupation'];
                $marital = $r['marital'];
                $mobile1 = $r['mobile1'];
                $mobile2 = $r['mobile2'];
                $email = $r['email'];
                $hometown = $r['hometown'];
                $address =$r['address'];
                $state = $r['state'];
                $countryID = $r['countryID'];
                $positionID = $r['positionID'];
                $groupID = $r['groupID'];
                $branchID = $r['branchID'];
                $statusID = $r['statusID'];
                $photo = $r['photo'];

                if($statusID == 1){
                    $status ="Present";
                }elseif($statusID == 2){
                    $status ="Left Church";
                }elseif($statusID == 3){
                    $status ="Missing";
                }elseif($statusID == 4){
                    $status ="Late";
                }else{
                    $status = null;
                }
                
                if($genderID == 1){
                    $gender ="Male";
                }elseif($genderID == 2){
                    $gender ="Female";
                }else{
                    $gender = null;
                }

                if(isset($n)){
                    $n=$n+1;
                }else{
                    $n = 1;
                }
            }
        }

        if(!is_null($positionID)){
            $p ="SELECT * FROM `get_position` where `positionID`=?";
            $stmt = $conn->prepare($p);
            $stmt->bind_param("s",$positionID);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $position = $row['position'];
            }else{
                $position = null;
            }
        }else{
            $position = null;
        }
        
        if(!is_null($branchID)){
            $l ="SELECT * FROM `get_branch` where `branchID`=?";
            $stmt = $conn->prepare($l);
            $stmt->bind_param("s",$branchID);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $branch = $row['branch'];
            }else{
                $branch = null;
            }
        }else{
            $branch = null;
        }

        if(!is_null($groupID)){
            $g ="SELECT * FROM `get_groups` where `groupID`=?";
            $stmt = $conn->prepare($g);
            $stmt->bind_param("s",$groupID);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $group = $row['groups'];
            }else{
                $group = null;
            }
        }else{
            $group = null;
        }

        if(!is_null($countryID)){
            $c ="SELECT * FROM `get_country` where `countryID`=?";
            $stmt = $conn->prepare($c);
            $stmt->bind_param("s",$countryID);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $country = $row['country'];
            }else{
                $country = null;
            }
        }else{
            $country = null;
        }


        $data = array(
            "serial"=>$n,
            "memberID"=>$id,
            "name"=>$name,
            "surname"=>$surname,
            "other"=>$other,
            "dob"=>$dob,
            "genderID"=>$genderID,
            "gender"=>$gender,
            "marital"=>$marital,
            "occupation"=>$occupation,
            "mobile1"=>$mobile1,
            "mobile2"=>$mobile2,
            "address"=>$address,
            "email"=>$email,
            "town"=>$hometown,
            "countryID"=>$countryID,
            "country"=>$country,
            "state"=>$state,
            "positionID"=>$positionID,
            "position"=>$position,
            "groupID"=>$groupID,
            "group"=>$group,
            "branchID"=>$branchID,
            "branch"=>$branch,
            "photo"=>$photo,
            "statusID"=>$statusID,
            "status"=>$status  
        );

        return $data;
    }

    public static function delete_member($conn,$data){

        $id = $data['member_id'];

        $sql ="DELETE FROM `tbl_membership` WHERE (`memberID`=?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$id);

       if(true == $stmt->execute()){
            return true;
       }else{
           return false;
       }
    }

}