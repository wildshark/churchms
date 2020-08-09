<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 8:54 PM
 */
namespace bookkeeping;

class model{

    //200 successful
    //500 connection fail

    public static function all_book($conn,$data){

        $church = $data['id'];

        $sql="SELECT * FROM `get_book` where `churchID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$church);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['church']  = null;
            $d['book_id'] = null;
            $d['title'] = null;
            return $row[] =$d;
        }else{
            while($r = $result->fetch_assoc()) {

                $row[] =$r;
            }
            return $row;
        }
    }

    public static function add_book_keeping($conn,$data){

        $church = $data['church_id'];
        $bookID = $data['book_id'];
        $book = $data['book'];
        $status = 1;

        $sql="INSERT INTO `tbl_book` (`churchID`, `bookID`, `book`, `statusID`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss",$church,$bookID,$book,$status);

        if(TRUE == $stmt->execute()){
            return $data;
        }else {
            return false;
        }
    }

    public static function add_income_entry($conn,$data){

        $time = $data['time'];
        $church = $data['church_id'];
        $date= $data['date'];
        $ref= $data['ref'];
        $category= $data['category'];
        $details= $data['details'];
        $type= $data['type'];
        $amount= $data['amount'];

        if((!isset($ref)) || (empty($ref))){
            $ref= "AI".date("ymdhis");
        }

        if($type == 1){
            $sql="INSERT INTO `tbl_transaction` (`churchID`, `tranDate`, `postDate`, `bookID`,`detail`, `ref`, `tranTypeID`, `cash_dr`) VALUES (?,?,?,?,?,?,?,?)";
        }elseif($type ==2){
            $sql="INSERT INTO `tbl_transaction` (`churchID`, `tranDate`, `postDate`, `bookID`,`detail`, `ref`, `tranTypeID`, `bank_dr`) VALUES (?,?,?,?,?,?,?,?)";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss",$church,$time,$date,$category,$details,$ref,$type,$amount);

        if(TRUE == $stmt->execute()){
            return $data;
        }else {
            return false;
        }
    }

    public static function add_expenses_entry($conn,$data){

        $time = $data['time'];
        $church = $data['church_id'];
        $date= $data['date'];
        $ref= $data['ref'];
        $category= $data['category'];
        $details= $data['details'];
        $type= $data['type'];
        $amount= $data['amount'];

        if((!isset($ref)) || (empty($ref))){
            $ref= "AE".date("ymdhis");
        }

        if($type == 1){
            $sql="INSERT INTO `tbl_transaction` (`churchID`, `tranDate`, `postDate`, `bookID`,`detail`, `ref`, `tranTypeID`, `cash_cr`) VALUES (?,?,?,?,?,?,?,?)";
        }elseif($type ==2){
            $sql="INSERT INTO `tbl_transaction` (`churchID`, `tranDate`, `postDate`, `bookID`,`detail`, `ref`, `tranTypeID`, `bank_cr`) VALUES (?,?,?,?,?,?,?,?)";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss",$church,$time,$date,$category,$details,$ref,$type,$amount);

        if(TRUE == $stmt->execute()){
            return $data;
        }else {
            return false;
        }
    }

    public static function option($conn,$data){

        $option = $data[0];
        $id = $data[1];
        $set = $data[2];

        if($set === "book-keeping") {

            $sql = "UPDATE `tbl_book` SET `statusID`=? WHERE (`bkID`=?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $option, $id);

            if (TRUE == $stmt->execute()) {
                return 200;
            } else {
                return 500;
            }
        }
    }

    public static function data_cash_book($conn,$data){

        $id = $data['id'];
        $tranType = 1;
    
        $sql ="SELECT * FROM `get_transaction` where `churchID`=? and `tranTypeID`=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$id,$tranType);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result->num_rows == 0) {
            $row = false;
        }else{
            while($r = $result->fetch_assoc()) {

                $id = $r['tranID'];
                $tranDate = $r['tranDate'];
                $postDate = $r['postDate'];
                $category = $r['book'];
                $book =$r['bookType'];
                $detail = $r['detail'];
                $ref = $r['ref'];
                $tranType = $r['tranTypeID'];
                $dr = $r['cash_dr'];
                $cr = $r['cash_cr'];

                if(isset($balance)){
                    $balance = (($balance + $dr) - $cr);
                }else{
                    $balance = $dr - $cr;
                }

                if($book == 1){
                    $book = 'Income';
                }else{
                    $book = 'Expenses';
                }

                if($tranType == 1){
                    $tranType = 'Cash';
                }else{
                    $tranType = 'Bank';
                }

                $d['id']=$id;
                $d['date']=$postDate;
                $d['detail']=$detail;
                $d['category']=$category;
                $d['ref']=$ref;
                $d['dr']=$dr;
                $d['cr']=$cr;
                $d['bal']=$balance;

                $row[] =$d;

            }

        }

        return $row;
    }
    
    
    public static function data_bank_book($conn,$data){

        $id = $data['id'];
        $tranType = 2;

        $sql ="SELECT * FROM `get_transaction` where `churchID`=? and `tranTypeID`=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$id,$tranType);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $row = false;
        }else{
            while($r = $result->fetch_assoc()) {

                $id = $r['tranID'];
                $tranDate = $r['tranDate'];
                $postDate = $r['postDate'];
                $category = $r['book'];
                $book =$r['bookType'];
                $detail = $r['detail'];
                $ref = $r['ref'];
                $tranType = $r['tranTypeID'];
                $dr = $r['bank_dr'];
                $cr = $r['bank_cr'];

                if(isset($balance)){
                    $balance = (($balance + $dr) - $cr);
                }else{
                    $balance = $dr - $cr;
                }

                if($book == 1){
                    $book = 'Income';
                }else{
                    $book = 'Expenses';
                }

                if($tranType == 1){
                    $tranType = 'Cash';
                }else{
                    $tranType = 'Bank';
                }

                $d['id']=$id;
                $d['date']=$postDate;
                $d['detail']=$detail;
                $d['category']=$category;
                $d['ref']=$ref;
                $d['dr']=$dr;
                $d['cr']=$cr;
                $d['bal']=$balance;

                $row[] =$d;
            }
        }

        return $row;
    }

    public static function income_financial_report($conn,$data){

        $id = $data['church_id'];
        $start = $data['start'];
        $end = $data['end'];

        $sql="SELECT * FROM `get_financial_report` WHERE `postDate` BETWEEN ? AND ? And `churchID`=? and `book_transaction_id`=1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$start,$end,$id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['date']  = null;
            $d['book'] = null;
            $d['type'] = null;
            $d['cdr']  = 0;
            $d['bdr']  = 0;
            $d['income']  = 0;
            $row[] =$d;
            return $row;
        }else{
            while($r = $result->fetch_assoc()) {

                $row[] =$r;
            }

            return $row;
        }
    }

    public static function expenses_financial_report($conn,$data){

        $id = $data['church_id'];
        $start = $data['start'];
        $end = $data['end'];

        $sql="SELECT * FROM `get_financial_report` WHERE `postDate` BETWEEN ? AND ? And `churchID`=? and `book_transaction_id`=2";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$start,$end,$id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $d['date']  = null;
            $d['book'] = null;
            $d['type'] = null;
            $d['ccr']  = 0;
            $d['bcr']  = 0;
            $d['expenses']  = 0;
            return $row[] =$d;
        }else{
            while($r = $result->fetch_assoc()) {

                $row[] =$r;
            }

            return $row;
        }
    }
}