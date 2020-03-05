<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 11:38 AM
 */
include "book.keep.php";
include "church.php";
include "member.php";
include "sms.php";

if($_SERVER['start'] === "start" && ($_COOKIE['token'] === $_SESSION['token'])){


    $action = $_REQUEST['submit'];

    switch ($action){

        case"add-profile";



            echo var_export($data);

        break;

        case"update-church";
            if($_POST['profile-tab'] == 1){
                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['church'];
                $data[] = $_POST['name'];
                $data[] = $_POST['surname'];
                $data[] = $_POST['church'];
                $data[] = $_POST['prefix'];
                $data[] = $_POST['email'];
                $data[] = $_POST['mobile'];
                $data[] = $_POST['website'];
                $data[] = $_POST['address'];

                //echo var_export($data);
                $record = church\model::add_church($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    header("location: ?_route=profile");
                }
            }elseif($_POST['profile-tab'] == 2){

                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['church'];
                $data[] = $_POST['username'];
                $data[] = $_POST['password'];

                //echo var_export($data);
                $record = church\model::add_church($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    header("location: ?_route=profile");
                }
            }
        break;

       case"delete-member";
            $data[] = $_GET['id'];
       break;

       case"add-member";
            if($_POST['profile-tab'] == 1){

                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['church'];
                $data[] = $_POST['name'];
                $data[] = $_POST['surname'];
                $data[] = $_POST['other'];
                $data[] = $_POST['gender'];
                $data[] = $_POST['dob'];
                $data[] = $_POST['occupation'];
                $data[] = $_POST['marital'];

                //echo var_export($data);
                //exit();
                $record = membership\model::add_member($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    $_SESSION['memberID'] = $record;
                    header("location: ?_route=new.member&id=".$record);
                }
            }elseif($_POST['profile-tab'] == 2){
                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['memberID'];
                $data[] = $_POST['mobile1'];
                $data[] = $_POST['mobile2'];
                $data[] = $_POST['email'];
                $data[] = $_POST['hometown'];
                $data[] = $_POST['state'];
                $data[] = $_POST['country'];
                $data[] = $_POST['address'];

                $record = membership\model::add_member($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    $record = $_SESSION['memberID'] ;
                    header("location: ?_route=new.member&id=".$record);
                }

            }elseif($_POST['profile-tab'] == 3){
                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['memberID'];
                $data[] = $_POST['position'];
                $data[] = $_POST['groups'];
                $data[] = $_POST['branch'];
                $data[] = $_POST['status'];

                $record = membership\model::add_member($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    $record = $_SESSION['memberID'] ;
                    header("location: ?_route=new.member&id=".$record);
                }
            }
       break;

       case"update-member";
            if($_POST['profile-tab'] == 1){

                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['memberID'];
                $data[] = $_POST['name'];
                $data[] = $_POST['surname'];
                $data[] = $_POST['other'];
                $data[] = $_POST['gender'];
                $data[] = $_POST['dob'];
                $data[] = $_POST['occupation'];
                $data[] = $_POST['marital'];

                $record = membership\model::update_member($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    $record = $_SESSION['memberID'];
                    header("location: ?_route=new.member&id=".$record);
                }
            }elseif($_POST['profile-tab'] == 2){
                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['memberID'];
                $data[] = $_POST['mobile1'];
                $data[] = $_POST['mobile2'];
                $data[] = $_POST['email'];
                $data[] = $_POST['hometown'];
                $data[] = $_POST['state'];
                $data[] = $_POST['country'];
                $data[] = $_POST['address'];

                $record = membership\model::update_member($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    $record = $_SESSION['memberID'] ;
                    header("location: ?_route=new.member&id=".$record);
                }

            }elseif($_POST['profile-tab'] == 3){
                $data[] = $_POST['profile-tab'];
                $data[] = $_SESSION['memberID'];
                $data[] = $_POST['position'];
                $data[] = $_POST['groups'];
                $data[] = $_POST['branch'];
                $data[] = $_POST['status'];

                $record = membership\model::update_member($conn,$data);
                if($record == 500){
                    echo"Connection Failed";
                }else{
                    $record = $_SESSION['memberID'] ;
                    header("location: ?_route=new.member&id=".$record);
                }
            }
            break;
       case "add-income";
            $data[] = 1;
            $data[] = $_POST['income'];
            $data[] = $_SESSION['church'];

            //echo var_export($data);
            $record = bookkeeping\model::add_book_keeping($conn,$data);

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                header("location: ?_route=set.book.keeping");
            }
       break;

       case"add-expenses";
            $data[] = 2;
            $data[] = $_POST['expenses'];
            $data[] = $_SESSION['church'];

            //echo var_export($data);
            $record = bookkeeping\model::add_book_keeping($conn,$data);

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                header("location: ?_route=set.book.keeping");
            }
       break;

       case"add-position";
            $data[] = 1;
            $data[] = $_POST['position'];
            $data[] = $_SESSION['church'];

           //echo var_export($data);
            $record = church\model::position($conn,$data);

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                header("location: ?_route=set.church");
            }
       break;

       case"add-groups";
            $data[] = 1;
            $data[] = $_POST['groups'];
            $data[] = $_SESSION['church'];

            //echo var_export($data);
            $record = church\model::groups($conn,$data);

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                header("location: ?_route=set.church");
            }
       break;

       case"add-branch";
            $data[] = 1;
            $data[] = $_POST['branch'];
            $data[] = $_SESSION['church'];

            //echo var_export($data);
            $record = church\model::branch($conn,$data);

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                header("location: ?_route=set.church");
            }
       break;

       case"option";

            $data[] = $_GET['option'];
            $data[] = $_GET['id'];
            $data[] = $_GET['set'];

            //echo var_export($data);

            if($_GET['set'] === "book-keeping"){
                $record = bookkeeping\model::option($conn,$data);
                $url ="?_route=set.book.keeping";
            }else{
                $record = church\model::option($conn,$data);
                $url ="?_route=set.church";
            }

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                header("location:".$url);
            }
       break;

       case"add-new-income";
            $data[] = date("Y-m-d H:i:s");
            $data[] = $_SESSION['church'];
            $data[]= $_POST['date'];
            $data[]= $_POST['ref'];
            $data[]= $_POST['category'];
            $data[]= $_POST['details'];
            $data[]= $_POST['type'];
            $data[]= $_POST['amount'];

            //echo var_export($data);

            $record = bookkeeping\model::add_income_entry($conn,$data);

            if($record == 500) {
                echo"connection failed";
                exit();
            }else{
                if($_POST['type'] == 1){
                    header("location: ?_route=cash.book");
                }else{
                    header("location: ?_route=bank.book");
                }
            }
       break;

       case "add-new-expenses";
           $data[] = date("Y-m-d H:i:s");
           $data[] = $_SESSION['church'];
           $data[]= $_POST['date'];
           $data[]= $_POST['ref'];
           $data[]= $_POST['category'];
           $data[]= $_POST['details'];
           $data[]= $_POST['type'];
           $data[]= $_POST['amount'];

           //echo var_export($data);

           $record = bookkeeping\model::add_expenses_entry($conn,$data);

           if($record == 500) {
               echo"connection failed";
               exit();
           }else{
               if($_POST['type'] == 1){
                   header("location: ?_route=cash.book");
               }else{
                   header("location: ?_route=bank.book");
               }
           }
       break;

       case"add-sms";

            $data[] = date("Y-m-d H:i:s");
            $data[] = $_SESSION['church'];
            $data[] = $_POST['to'];
            $data[] = $_POST['from'];
            $data[] = $_POST['msg'];

            //echo var_export($data);
            $record = sms\model::add_sms($conn,$data);

            if($record == 200){
                header("location: ?_route=single.sms");
            }else{
                echo"connection failed";
                exit();
            }
       break;
    }
}else{
    echo"Server session failed";
    exit();
}