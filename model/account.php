<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17/07/2019
 * Time: 2:54 PM
 */


$endpoint = $_REQUEST['submit'];

switch ($endpoint){

    case "add-income";
        $income['endpoint'] ="add-accounting-book";
        $income['book_id']=1;
        $income['book'] = $_POST['income'];

        $result = config\connection($income);
        $result = json_decode($result, true);

        if ($result['error'] == 200){
            header("location: ?_route=set.book.keeping&status=success");
        }else{
            header("location: ?_route=set.book.keeping&status=failed");
        }
    break;

   case"add-expenses";
       $expenses['endpoint'] ="add-accounting-book";
       $expenses['book_id']=2;
       $expenses['book'] = $_POST['expenses'];

       $result = config\connection($expenses);
       $result = json_decode($result, true);

       if ($result['error'] == 200){
           header("location: ?_route=set.book.keeping&status=success");
       }else{
           header("location: ?_route=set.book.keeping&status=failed");
       }
   break;

   case"add-new-income";

        $in['endpoint'] = "add-income-entry";
        $in['date'] = $_POST['date'];
        $in['ref'] = $_POST['ref'];
        $in['category'] = $_POST['category'];
        $in['details'] = $_POST['details'];
        $in['type'] = $_POST['type'];
        $in['amount'] = $_POST['amount'];
        //echo var_export($in);

       $result = config\connection($in);
       $result = json_decode($result, true);

       if ($result['error'] == 200){
           if($_POST['type'] == 1){
               header("location: ?_route=cash.book&status=success");
           }else{
               header("location: ?_route=bank.book&status=success");
           }

       }else{
           if($_POST['type'] == 1){
               header("location: ?_route=cash.book&status=failed");
           }else{
               header("location: ?_route=bank.book&status=success");
           }
       }
   break;

    case"add-new-expenses";

        $exp['endpoint'] = "add-expenses-entry";
        $exp['date'] = $_POST['date'];
        $exp['ref'] = $_POST['ref'];
        $exp['category'] = $_POST['category'];
        $exp['details'] = $_POST['details'];
        $exp['type'] = $_POST['type'];
        $exp['amount'] = $_POST['amount'];

        $result = config\connection($exp);
        $result = json_decode($result, true);

        if ($result['error'] == 200){
            if($_POST['type'] == 1){
                header("location: ?_route=cash.book&status=success");
            }else{
                header("location: ?_route=bank.book&status=success");
            }

        }else{
            if($_POST['type'] == 1){
                header("location: ?_route=cash.book&status=failed");
            }else{
                header("location: ?_route=bank.book&status=success");
            }
        }

    break;

    case"add-fundraising";

        $fund['endpoint'] = $_POST['submit'];
        $fund['date'] = $_POST['date'];
        $fund['purpose'] = $_POST['purpose'];
        $fund['expected'] = $_POST['expected'];

        $result = config\connection($fund);
        $result = json_decode($result, true);

        if ($result['error'] == 200){
            header("location: ?_route=fundraising-data&status=success");
        }else{
            header("location: ?_route=fundraising-data&status=false");
        }

    break;

   case "add-raise-payment";
        $raise['endpoint'] = $_POST['submit'];
        $raise['date'] = $_POST['date'];
        $raise['ref'] = $_POST['ref'];
        $raise['purpose'] = $_POST['purpose'];
        $raise['name'] = $_POST['name'];
        $raise['type'] = $_POST['type'];
        $raise['amt'] = $_POST['amount'];

       // var_export($raise);
       $result = config\connection($raise);
       $result = json_decode($result, true);

       if ($result['error'] == 200){
           header("location: ?_route=fundraising-data&status=success");
       }else{
           header("location: ?_route=fundraising-data&status=false");
       }

       break;

   case"add-tithe-payment";

       $tithe['endpoint'] = $_POST['submit'];
       $tithe['date'] = $_POST['date'];
       $tithe['ref'] = $_POST['ref'];
       $tithe['name'] = $_POST['name'];
       $tithe['type'] = $_POST['type'];
       $tithe['amount'] = $_POST['amount'];

       //var_export($tithe);
        //exit();
       $result = config\connection($tithe);
       $result = json_decode($result, true);

       if ($result['error'] == 200){
           header("location: ?_route=tithe-data&status=success");
       }else{
           header("location: ?_route=tithe-data&status=false");
       }

       break;

   case"financial-report";
        $fin['_route'] = $_POST['submit'];
        $fin['start'] = $_POST['start-date'];
        $fin['end'] = $_POST['end-date'];

        $url = http_build_query($fin);
        header("location: ?".$url);

    break;
}