<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 10:45 AM
 */

function total_cash_dr($conn){

    $id = $_SESSION['church'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        while($r = $result->fetch_assoc()) {

            return $r['cDR'];
        }
    }
}

function total_cash_cr($conn){

    $id = $_SESSION['church'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        while($r = $result->fetch_assoc()) {

            return $r['cCR'];
        }
    }
}

function total_bank_dr($conn){

    $id = $_SESSION['church'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        while($r = $result->fetch_assoc()) {

            return $r['bDR'];
        }
    }
}

function total_bank_cr($conn){

    $id = $_SESSION['church'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        while($r = $result->fetch_assoc()) {

            return $r['bCR'];
        }
    }
}

function totalPOPULATION($conn){

    $id = $_SESSION['church'];

    $sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            return $r['total'];
        }
    }
}

function totalMale($conn){

    $id = $_SESSION['church'];
    $grander = 1;
    $age = 17;

    $sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? and age>? and genderID=? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii",$id,$age,$grander);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            return $r['total'];
        }
    }
}

function totalFemale($conn){

    $id = $_SESSION['church'];
    $grander = 2;
    $age = 17;

    $sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? and age>? and genderID=? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii",$id,$age,$grander);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            return $r['total'];
        }
    }
}

function totalKIDS($conn){

    $id = $_SESSION['church'];
    $age = 17;

    $sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? and age<? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$age);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            return $r['total'];
        }
    }
}

function cashDASHBROAD($conn){

    $id = $_SESSION['church'];

    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            $dr = $r['cDR'];
            $cr = $r['cCR'];
            $bal = $r['cTotal'];

        }
    }

    return array("DR"=>$dr,"CR"=>$cr,"BAL"=>$bal);
}

function bankDASHBROAD($conn){

    $id = $_SESSION['church'];

    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            $dr = $r['bDR'];
            $cr = $r['bCR'];
            $bal = $r['bTotal'];

        }
    }

    return array("DR"=>$dr,"CR"=>$cr,"BAL"=>$bal);
}

function monthlyTRANSCTION_CASH($conn){

    $id = $_SESSION['church'];
    $type = 1;

    //$sql="SELECT * FROM `get_monthly_transaction` where `churchID`=? and tranTYpeID=? LIMIT 0, 7";
    $sql ="SELECT
        get_monthly_transaction.churchID,
        get_monthly_transaction.cDate,
        get_monthly_transaction.tranTypeID,
        Sum(get_monthly_transaction.cDR) as cDR,
        Sum(get_monthly_transaction.cCR) as cCR
        FROM
        get_monthly_transaction
        where `churchID`=? and tranTYpeID=? 
        GROUP BY
        get_monthly_transaction.churchID,
        get_monthly_transaction.cDate,
        get_monthly_transaction.tranTypeID
        LIMIT 0, 7";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$id,$type);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            $date = $r['cDate'];
            $dr = $r['cDR'];
            $cr = $r['cCR'];

            if(isset($bal)){
                $bal = (($bal + $dr) - $cr);
            }else{
                $bal = ($dr - $cr);
            }

            if(isset($n)){
                $n = $n + 1;
            }else{
                $n=1;
            }

            echo"
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td class='text-center'>{$date}</td>
                    <td class='text-right'>{$dr}</td>
                    <td class='text-right'>{$cr}</td>
                    <td class='text-right'>{$bal}</td>
                </tr>
            ";
        }
    }
}

function monthlyTRANSCTION_BANK($conn){

    $id = $_SESSION['church'];
    $type = 2;


    $sql ="SELECT
        get_monthly_transaction.churchID,
        get_monthly_transaction.cDate,
        get_monthly_transaction.tranTypeID,
        Sum(get_monthly_transaction.bDR) as bDR,
        Sum(get_monthly_transaction.bCR) as bCR
        FROM
        get_monthly_transaction
        where `churchID`=? and tranTYpeID=? 
        GROUP BY
        get_monthly_transaction.churchID,
        get_monthly_transaction.cDate,
        get_monthly_transaction.tranTypeID
        LIMIT 0, 7";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$type);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            $date = $r['cDate'];
            $dr = $r['bDR'];
            $cr = $r['bCR'];

            if(isset($bal)){
                $bal = (($bal + $dr) - $cr);
            }else{
                $bal = ($dr - $cr);
            }

            if(isset($n)){
                $n = $n + 1;
            }else{
                $n=1;
            }

            echo"
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td class='text-center'>{$date}</td>
                    <td class='text-right'>{$dr}</td>
                    <td class='text-right'>{$cr}</td>
                    <td class='text-right'>{$bal}</td>
                </tr>
            ";
        }
    }
}

function monthlyTRANSCTION_INCOME($conn){

    $id = $_SESSION['church'];

    $sql="SELECT churchID, cDate, Sum(income) AS total FROM get_income_exp where churchID=? GROUP BY churchID,cDate LIMIT 0, 7";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            $date = $r['cDate'];
            $amount = $r['total'];

            if(isset($n)){
                $n = $n + 1;
            }else{
                $n=1;
            }

            echo"
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td class='text-center'>{$date}</td>
                    <td class='text-right'>{$amount}</td>
                </tr>
            ";
        }
    }
}

function monthlyTRANSCTION_EXPENSES($conn){

    $id = $_SESSION['church'];

    $sql="SELECT churchID, cDate, Sum(expense) AS total FROM get_income_exp where churchID=? GROUP BY churchID,cDate LIMIT 0, 7";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($r = $result->fetch_assoc()) {
            $date = $r['cDate'];
            $amount = $r['total'];

            if(isset($n)){
                $n = $n + 1;
            }else{
                $n=1;
            }

            echo"
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td class='text-center'>{$date}</td>
                    <td class='text-right'>{$amount}</td>
                </tr>
            ";
        }
    }
}

function data_count_sms($conn){

    $date= date("Y-m");
    $id = $_SESSION['church'];
    $sql ="SELECT * FROM `get_count_sms_total` where `churchID`=? LIMIT 0, 1000";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['total'];
    }
}

?>