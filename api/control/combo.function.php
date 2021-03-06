<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 10:44 AM
 */

function cmbPosition($conn,$r){

    $id = $r['church_id'];
    $status = 1;

    $sql = "SELECT * FROM `get_position` where `churchID`=? and `statusID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$status);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            echo"<option value='{$r['positionID']}'>{$r['position']}</option>";
        }
    }
}

function cmbGroup($conn,$r){

    $id = $r['church_id'];
    $status = 1;

    $sql = "SELECT * FROM `get_groups` where `churchID`=? and `statusID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$status);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            echo"<option value='{$r['groupID']}'>{$r['groups']}</option>";
        }
    }
}

function cmbBranch($conn,$r){

    $id = $r['church_id'];
    $status = 1;

    $sql = "SELECT * FROM `get_branch` where `churchID`=? and `statusID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$status);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            echo"<option value='{$r['branchID']}'>{$r['branch']}</option>";
        }
    }
}

function income_category($conn,$data){

    $church = $data[0];
    $book ='1';
    $status ='1';

    $sql = "SELECT * FROM `get_book` where `churchID`=? and `bookID`=? and `statusID`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii",$church,$book,$status);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            echo"<option value='{$r['bkID']}'>{$r['book']}</option>";
        }
    }
}

function expense_category($conn,$data){

    $church = $data[0];
    $book ='2';

    $sql = "SELECT * FROM `get_book` where `churchID`=? and `bookID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$church,$book);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            echo"<option value='{$r['bkID']}'>{$r['book']}</option>";
        }
    }
}

function cmbCountry($conn){

    $sql ="SELECT * FROM `get_country`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo"<option value='{$row['countryID']}'>{$row['country']}</option>";
        }
    }
}

function cmbBranchSMS($conn){

    $id = $r['church_id'];
    $status = 1;

    $sql = "SELECT * FROM `get_branch` where `churchID`=? and `statusID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$status);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            return "<option value='{$r['branch']}'>{$r['branch']}</option>";
        }
    }
}

function data_country($conn,$country){

    $sql ="SELECT * FROM `get_country` where `countryID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$country);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['country'];
    }
}

function data_position($conn,$position){

    $sql ="SELECT * FROM `get_position` where `positionID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$position);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['position'];
    }
}

function data_branch($conn,$branch){

    $sql ="SELECT * FROM `get_branch` where `branchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$branch);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['branch'];
    }
}

function data_groups($conn,$group){

    $sql ="SELECT * FROM `get_groups` where `groupID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$group);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['groups'];
    }
}


