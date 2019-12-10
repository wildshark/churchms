<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/07/2019
 * Time: 9:01 AM
 */

$page = $_REQUEST['_route'];

switch ($page) {

    case"success";
        require "template/success.php";
    break;

    case"failed";
        require "template/failed.php";
    break;

    case"sign-up";
        require "template/sign.up.php";
    break;

    case "logout";
        session_destroy();
        setcookie('token', "", time() + (-1), "/");
        header("location: /");
        break;

    case"profile";
        $app->dashboard = "profile";
        $content = "membership/profile.php";
        require "template/dashboard.php";
        break;

    case "dashboard";
        $template['title'] = "Dashboard";

        $cash['endpoint'] ='dashboard';
        $result = config\connection($cash);
        $dashboard = json_decode($result,true);

        $cash['endpoint'] ="monthly-cash-transaction";
        $result = config\connection($cash);
        $cash_summary = json_decode($result);

        $bank['endpoint'] ="monthly-bank-transaction";
        $result = config\connection($bank);
        $bank_summary = json_decode($result);

        $content = "dashboard.php";
        require "template/dashboard.php";
        break;

    case"new.member";

        if(!isset($_GET['member'])){

            $membership['fname']="";
            $membership['surname']="";
            $membership['other']="";
            $membership['email'] ="";
            $membership['genderID'] ="";
            $membership['gender']="";
            $membership['dob'] ='';
            $membership['marital']='';
            $membership['occupation']="";
            $membership['mobile1']="";
            $membership['mobile2']="";
            $membership['email']="";
            $membership['hometown']="";
            $membership['state']="";
            $membership['countryID']="";
            $membership['country']="";
            $membership['address']="";
            $membership['positionID']="";
            $membership['position'] ="";
            $membership['groupID']="";
            $membership['group']="";
            $membership['branchID']="";
            $membership['branch'] ="";
            $membership['statusID'] ="";
            $membership['status'] ="";

            $button="add-member";
        }else{

            $filter['endpoint'] = "filter-member";
            $filter['memberID'] = $_GET['member'];
            $result = config\connection($filter);
            $m = json_decode($result,true);

            if($m['error'] == 200){

                $membership['fname']= $m['data']['name'];
                $membership['surname'] = $m['data']['surname'];
                $membership['other']= $m['data']['other'];
                $membership['email'] = $m['data']['email'];
                $membership['genderID'] = $m['data']['genderID'];
                $membership['gender'] = $m['data']['gender'];
                $membership['dob'] = $m['data']['dob'];
                $membership['marital'] = $m['data']['marital'];
                $membership['occupation'] = $m['data']['occupation'];
                $membership['mobile1'] = $m['data']['mobile1'];
                $membership['mobile2'] = $m['data']['mobile2'];
                $membership['hometown'] = $m['data']['town'];
                $membership['state'] = $m['data']['state'];
                $membership['countryID'] = $m['data']['countryID'];
                $membership['country'] = $m['data']['country'];
                $membership['address'] = $m['data']['address'];
                $membership['positionID'] = $m['data']['positionID'];
                $membership['position'] = $m['data']['position'];
                $membership['groupID'] = $m['data']['groupID'];
                $membership['group'] = $m['data']['group'];
                $membership['branchID'] = $m['data']['branchID'];
                $membership['branch'] = $m['data']['branch'];
                $membership['statusID'] = $m['data']['statusID'];
                $membership['status'] = $m['data']['status'];

                $button="update-member";
            }
        }

        $template['title'] = "New Member";
        $content = "membership/add.member.php";
        require "template/profile.php";
        break;

    case"view-member";

        $template['title'] = "Membership Profile";
        $view['endpoint'] ="filter-member";
        $view['memberID']=$_GET['id'];

        $result = config\connection($view);
        $m = json_decode($result,true);
        //echo var_export($m);
        if($m['error'] == 200){

            $membership['fname']= $m['data']['name'];
            $membership['surname'] = $m['data']['surname'];
            $membership['other']= $m['data']['other'];
            $membership['email'] = $m['data']['email'];
            $membership['genderID'] = $m['data']['genderID'];
            $membership['gender'] = $m['data']['gender'];
            $membership['dob'] = $m['data']['dob'];
            $membership['marital'] = $m['data']['marital'];
            $membership['occupation'] = $m['data']['occupation'];
            $membership['mobile1'] = $m['data']['mobile1'];
            $membership['mobile2'] = $m['data']['mobile2'];
            $membership['hometown'] = $m['data']['town'];
            $membership['state'] = $m['data']['state'];
            $membership['countryID'] = $m['data']['countryID'];
            $membership['country'] = $m['data']['country'];
            $membership['address'] = $m['data']['address'];
            $membership['positionID'] = $m['data']['positionID'];
            $membership['position'] = $m['data']['position'];
            $membership['groupID'] = $m['data']['groupID'];
            $membership['group'] = $m['data']['group'];
            $membership['branchID'] = $m['data']['branchID'];
            $membership['branch'] = $m['data']['branch'];
            $membership['photo'] = $m['data']['photo'];
            $membership['statusID'] = $m['data']['statusID'];
            $membership['status'] = $m['data']['status'];

            $button="update-member";
        }
        //echo var_export($membership);
        $content = "membership/add.member.php";
        require "template/profile.php";
    break;

    case"list.member";
        $template['title'] = "Membership List";
        $r['endpoint'] ="list-member";
        $result = config\connection($r);
        $record = json_decode($result);

        $content = "membership/list.member.php";
        require "template/table.php";
    break;

    /**case"list.income";
        $app->table = "Income";
        $content = "membership/list.member.php";
        require "template/table.php";
    break;**/

    case"bank.book";
        $template['title'] = "Bank Book";

        $r['endpoint'] ='dashboard';
        $result = config\connection($r);
        $bank = json_decode($result,true);

        if(isset($bank['error']) && $bank['error'] == 500) {
            $dr = 0;
            $cr = 0;
            $bal = 0;
        }else{
            $dr = $bank['cash']['DR'];
            $cr = $bank['cash']['CR'];
            $bal = $bank['cash']['BAL'];
        }

        $r['endpoint'] ="bank-book";
        $result = config\connection($r);
        $record = json_decode($result);

        $content = "account_book/bank.book.php";
        require "template/table.php";
    break;

    case"cash.book";
        $template['title'] = "Cash Book";

        $r['endpoint'] ='dashboard';
        $result = config\connection($r);
        $cash = json_decode($result,true);

        if(isset($cash['error']) && $cash['error'] == 500){
            $dr = 0;
            $cr = 0;
            $bal = 0;
        }else{
            $dr = $cash['cash']['DR'];
            $cr = $cash['cash']['CR'];
            $bal = $cash['cash']['BAL'];
        }

        $r['endpoint'] ="cash-book";
        $result = config\connection($r);
        $record = json_decode($result);

        $content = "account_book/cash.book.php";
        require "template/table.php";
    break;

    //setup
    case"set.book.keeping";
        $app->profile = "Book Keeping Setup";
        $content = "setup/book.keeping.php";
        require "template/profile.php";
        break;

    case"set.church";
        $template['title'] = "Church Setup";
        $content = "setup/church.php";
        require "template/profile.php";
        break;

    case"single.sms";
        $template['title'] = "SMS Box";
        $content = "sms.php";
        require "template/profile.php";
        break;

    case"bulk.sms";
        $template['title'] = "SMS Box";
        $content = "sms.php";
        require "template/profile.php";
        break;

    case"fundraising-data";
        $template['title'] = "Fundraising";

        $r['endpoint'] ='fundraising-data';
        $result = config\connection($r);
        $record = json_decode($result);
        //var_export($record);
        //exit();
        $content = "fundraising/fundraising.php";
        require "template/table.php";
    break;

    case"fundraising-detail";

        $template['title'] = "Fundraising :". $_GET['t'] ;
        $view['endpoint'] = 'fundraising-summary';
        $view['id'] = $_REQUEST['id'];
        //summary
        $result = config\connection($view);
        $fundraising = json_decode($result,true);
        //var_export($fundraising);
        //exit();
        if((isset($fundraising['error'])) && ($fundraising['error'] == 500)){
            $expected_amt = 0;
            $raised_amt = 0;
            $paid_amt = 0;
        }else{
            $expected_amt = $fundraising[0]['expected'];
            $raised_amt = $fundraising[0]['raised'];
            $paid_amt = $fundraising[0]['payment'];
        }

        $view['endpoint'] = $_REQUEST['_route'];
        $view['id'] = $_REQUEST['id'];

        $result = config\connection($view);
        $record = json_decode($result);

        $content = "fundraising/fundraising.detail.php";
        require "template/table.php";

    break;

    case"tithe-data";
        $template['title'] = "Tithe";
        $curr_total['endpoint'] = "tithe-current-amount";
        $curr_total['date'] = date("Y-m-d");
        $result = config\connection($curr_total);
        $total = json_decode($result,true);

        $curr_cash =$total[0]['bank'];
        $curr_bank =$total[0]['cash'];
        $curr_total =$total[0]['amount'];

        $total_tithe['endpoint'] = "tithe-total";
        $result = config\connection($total_tithe);
        $total = json_decode($result,true);
        $total_tithe =$total[0]['amount'];

        $view['endpoint'] = $_REQUEST['_route'];
        $result = config\connection($view);
        $record = json_decode($result);
        //var_dump($record);
        //exit();
        $content = "account_book/tithe.book.php";
        require "template/table.php";

    break;

    case "financial-report";

        $template['title'] ="Financial-Report";
        $fin['start'] = $_REQUEST['start'];
        $fin['end'] = $_REQUEST['end'];

        $fin['endpoint'] = "income-financial-report";
        $result = config\connection($fin);
        $income = json_decode($result,true);

        $fin['endpoint'] = "expenses-financial-report";
        $result = config\connection($fin);
        $expenses = json_decode($result,true);

        $content = "account_book/financial.report.php";
        require "template/print.php";

    break;


    case"donation";
        header("location: https://rave.flutterwave.com/donate/nipqon7dxbfh");
        break;

    case"help";
        header("location: https://rave.flutterwave.com/donate/nipqon7dxbfh");
        break;

    default:
        require "template/505.php";
        exit();
}