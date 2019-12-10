<?php 


function total_cash_dr($conn,$data){

    $id = $data['id'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        $r = $result->fetch_assoc();
        return $r['cDR'];
    }
}

function total_cash_cr($conn,$data){

    $id = $data['id'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        $r = $result->fetch_assoc();
        return $r['cCR'];
    }
}

function total_bank_dr($conn,$data){

    $id = $data['id'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        $r = $result->fetch_assoc();
        return $r['bDR'];
    }
}

function total_bank_cr($conn,$data){

    $id = $data['id'];
    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return 0.00;
    }else{
        $r = $result->fetch_assoc();
        return $r['bCR'];
    }
}

function totalPOPULATION($conn,$data){

    $id = $data['id'];

    $sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        return $r['total'];
    }else{
        return 0;
    }
}

function totalMale($conn,$data){

    $id = $data['id'];
    $grander = 1;
    $age = 17;

    $sql =  $sql ="SELECT * FROM `get_gender` where churchID=? and genderID=?";
    //$sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? and age>? and genderID=? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$grander);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        return $r['total'];
    }else{
        return 0;
    }
}

function totalFemale($conn,$data)
{

    $id = $data['id'];
    $grander = 2;
    $age = 17;

    $sql ="SELECT * FROM `get_gender` where churchID=? and genderID=?";
    //$sql = "SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? and age>? and genderID=? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id,$grander);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        return $r['total'];
    }else{
        return 0;
    }
}

function totalKIDS($conn,$data){

    $id = $data['id'];
    $age = 17;

    $sql="SELECT Count(total)as total,churchID FROM get_population_summary  WHERE churchID=? and age<? GROUP BY churchID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$age);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        return $r['total'];
    }else{
        return 0;
    }
}

function cashDASHBROAD($conn,$data){

    $id = $data['id'];

    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        $dr = $r['cDR'];
        $cr = $r['cCR'];
        $bal = $r['cTotal'];
    }else{
        $dr = 0;
        $cr = 0;
        $bal = 0;
    }

    return array("DR"=>$dr,"CR"=>$cr,"BAL"=>$bal);
}

function bankDASHBROAD($conn,$data){

    $id = $data['id'];

    $sql="SELECT * FROM `get_transaction_total` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $r = $result->fetch_assoc();
        $dr = $r['bDR'];
        $cr = $r['bCR'];
        $bal = $r['bTotal'];
    }else{
        $dr =0;
        $cr =0;
        $bal = 0;
    }

    return array("DR"=>$dr,"CR"=>$cr,"BAL"=>$bal);
}

function monthlyTRANSCTION_CASH($conn,$data){

    $id = $data['id'];
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
            $data = array(
                "serial"=>$n,
                "date"=>$date,
                "dr"=>$dr,
                "cr"=>$cr,
                "bal"=>$bal
            );

            $row[] = $data;
        }
        return $row;
    }else{
        $data = array(
            "serial"=>null,
            "date"=>null,
            "dr"=>0,
            "cr"=>0,
            "bal"=>0
        );

        $row[] = $data;
        return $row;
    }
}

function monthlyTRANSCTION_BANK($conn,$data){

    $id = $data['id'];
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

            $data = array(
                "serial"=>$n,
                "date"=>$date,
                "dr"=>$dr,
                "cr"=>$cr,
                "bal"=>$bal
            );

            $row[] = $data;
        }
        return $row;
    }else{
        $data = array(
            "serial"=>null,
            "date"=>null,
            "dr"=>0,
            "cr"=>0,
            "bal"=>0
        );

        $row[] = $data;
        return $row;
    }
}

function monthlyTRANSCTION_INCOME($conn,$data){

    $id = $data['id'];

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

            $row = array(
                "serial"=>$n,
                "date"=>$date,
                "amount"=>$amount
            );
        }
        return $row;
    }else{
        $row = array(
            "serial"=>null,
            "date"=>null,
            "amount"=>0
        );

        return $row;
    }
}

function monthlyTRANSCTION_EXPENSES($conn,$data){

    $id = $data['id'];

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

            $row = array(
                "serial"=>$n,
                "date"=>$date,
                "amount"=>$amount
            );
        }
        return $row;
    }else{

        $row = array(
            "serial"=>null,
            "date"=>null,
            "amount"=>0
        );
        return $row;
    }
}

function data_count_sms($conn,$data){

    $date= date("Y-m");
    $id = $data['id'];
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