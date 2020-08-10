<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "connection.php";
include "modules/user.account.php";
include "modules/dashboard.php";
include "modules/combo.php";
include "modules/church.php";
include "modules/member.php";
include "modules/book.keep.php";
include "modules/fundraising.php";
include "modules/tithe.php";

if((!$_REQUEST)|| (!$_REQUEST['endpoint'])){
    $data["error"]=500;
    $data["msg"]='missing peremeter';
}else{
    
    $endpoint = $_REQUEST['endpoint'];
    $post_data = $_REQUEST;
    switch ($endpoint){

        case"login";
            
            $result = user\modal::login($church_db,$post_data);
            if($result == false){
                $data['error'] = 500;
                $data['msg'] = "invalid username and password";
            }else{
                $data['error'] = 200;
                $data['msg'] = "successful";
                $data['data'] = array(
                    "churchID"=> $result['church'],
                    "access"=> $result['token']
                );
            }
        break;

        case "sign-up-church";

            $result = user\modal::sign_up($church_db,$post_data);
            if($result == false){
                $data['error'] = 500;
                $data['msg'] = "invalid username and password";
            }else {
                $data['error'] = 200;
                $data['msg'] = "successful";
                $data['data']= $result;
            }
        break;

        case"update-church-profile";
            $result = user\modal::update_church_profile($church_db,$_REQUEST);
            if($result == false){
                $data['error'] = 500;
                $data['msg'] = "invalid username and password";
            }else {
                $data['error'] = 200;
                $data['msg'] = "successful";
            }
        break;

        case"update-profile-login";
            $result = user\modal::update_profile_login($church_db,$_REQUEST);
            if($result == false){
                $data['error'] = 500;
                $data['msg'] = "invalid username and password";
            }else {
                $data['error'] = 200;
                $data['msg'] = "successful";
                $data = $result;
            }
        break;

        case"church-profile";
            $request['id'] = $_REQUEST['church_id'];
            $result = user\modal::get_church_profile($church_db,$request);
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['msg']="successful";
                $data = $result;
            }

        break;

        case"dashboard";
            $request['id'] = $_REQUEST['church_id'];
            
            $data['total_cash_dr'] = total_cash_dr($church_db,$request);
            $data['total_cash_cr'] = total_cash_cr($church_db,$request);
            $data['total_bank_dr'] = total_bank_dr($church_db,$request);
            $data['total_bank_cr'] = total_bank_cr($church_db,$request);
            $data['population'] = totalPOPULATION($church_db,$request);
            $data['male'] = totalMale($church_db,$request);
            $data['female'] = totalFemale($church_db,$request);
            $data['kids'] =totalKIDS($church_db,$request);
            $data['cash']= cashDASHBROAD($church_db,$request);
            $data['bank'] = bankDASHBROAD($church_db,$request);

        break;

        case"monthly-cash-transaction";
            $request['id'] = $_REQUEST['church_id'];
            $data = monthlyTRANSCTION_CASH($church_db,$request);
        break;

        case"monthly-bank-transaction";
            $request['id'] = $_REQUEST['church_id'];
            $data = monthlyTRANSCTION_BANK($church_db,$request);
        break;

        case"monthly-income";
            $request['id'] = $_REQUEST['church_id'];
            $data = monthlyTRANSCTION_INCOME($church_db,$request);
        break;

        case"monthly-expenses";
            $request['id'] = $_REQUEST['church_id'];
            $data = monthlyTRANSCTION_EXPENSES($church_db,$request);
        break;

        case "list-member";
            $request['id'] = $_REQUEST['church_id'];
            $result = membership\model::view_member($church_db,$request);
            if($result == false ){
                $data['error'] = 202;
                $data['msg'] = "no record";
            }else{
                $data['error'] = 200;
                $data['msg'] = "successful";
                $data = $result;
            }
        break;

        case"books";
            $request['id'] = $_REQUEST['church_id'];
            $result = bookkeeping\model::all_book($church_db,$request);
            if($result == false ){
                $data['error'] = 202;
                $data['msg'] = "no record";
            }else{
                $data['error'] = 200;
                $data['msg'] = "successful";
                $data = $result;
            }
        break;

        case"add-member";
            
            if($_REQUEST['profile-tab'] == 1){
                
                $request['tab'] = $_REQUEST['profile-tab'];
                $request['id'] = $_REQUEST['church_id'];
                $request['name'] = $_REQUEST['name'];
                $request['surname'] = $_REQUEST['surname'];
                $request['other'] = $_REQUEST['other'];
                $request['gender'] = $_REQUEST['gender'];
                $request['dob'] = $_REQUEST['dob'];
                $request['occupation'] = $_REQUEST['occupation'];
                $request['marital'] = $_REQUEST['marital'];
                $request['photo'] = $_REQUEST['photo'];
                //echo var_export($request);
                //exit();
                $record = membership\model::add_member($church_db,$request);
                if($record == false){
                    $data['error'] = 500;
                    $data['msg']="Connection Failed";
                }else{
                    $data['error'] = 200;
                    $data['status'] = "successful";
                    $data['data'] = $record;
                }
            }elseif($_REQUEST['profile-tab'] == 2){

                $request['tab'] = $_REQUEST['profile-tab'];
                $request['member_id'] = $_REQUEST['memberID'];
                $request['mobile1'] = $_REQUEST['mobile1'];
                $request['mobile2'] = $_REQUEST['mobile2'];
                $request['email'] = $_REQUEST['email'];
                $request['hometown'] = $_REQUEST['hometown'];
                $request['state'] = $_REQUEST['state'];
                $request['country'] = $_REQUEST['country'];
                $request['address'] = $_REQUEST['address'];

                $record = membership\model::add_member($church_db,$request);
                if($record == false){
                    $data['error'] = 500;
                    $data['msg']="Connection Failed";
                }else{
                    $data['error'] = 200;
                    $data['status'] = "successful";
                    $data['memberID'] = $record;
                }

            }elseif($_REQUEST['profile-tab'] == 3){
                $request['tab'] = $_REQUEST['profile-tab'];
                $request['member_id'] = $_REQUEST['memberID'];
                $request['position'] = $_REQUEST['position'];
                $request['groups'] = $_REQUEST['groups'];
                $request['branch'] = $_REQUEST['branch'];
                $request['status'] = $_REQUEST['status'];

                $record = membership\model::add_member($church_db,$request);
                if($record == false){
                    $data['error'] = 500;
                    $data['msg']="Connection Failed";
                }else{
                    $data['error'] = 200;
                    $data['status'] = "successful";
                    $data['memberID'] = $record;
                }
            }
        break;

        case"update-member";

            if($_REQUEST['profile-tab'] == 1){

                $request['tab'] = $_REQUEST['profile-tab'];
                $request['member_id'] = $_REQUEST['memberID'];
                $request['name'] = $_REQUEST['name'];
                $request['surname'] = $_REQUEST['surname'];
                $request['other'] = $_REQUEST['other'];
                $request['gender'] = $_REQUEST['gender'];
                $request['dob'] = $_REQUEST['dob'];
                $request['occupation'] = $_REQUEST['occupation'];
                $request['marital'] = $_REQUEST['marital'];

                //echo var_export($request);
                $record = membership\model::update_member($church_db,$request);
                    if($record == false){
                        $data['error'] = 500;
                        $data['msg']="Connection Failed";
                    }else{
                        $data['error'] = 200;
                        $data['status'] = "successful";
                        $data['data'] = $record;
                    }
            }elseif($_REQUEST['profile-tab'] == 2){
                
                $request['tab'] = $_REQUEST['profile-tab'];
                $request['member_id'] = $_REQUEST['memberID'];
                $request['mobile1'] = $_REQUEST['mobile1'];
                $request['mobile2'] = $_REQUEST['mobile2'];
                $request['email'] = $_REQUEST['email'];
                $request['hometown'] = $_REQUEST['hometown'];
                $request['state'] = $_REQUEST['state'];
                $request['country'] = $_REQUEST['country'];
                $request['address'] = $_REQUEST['address'];

                $record = membership\model::update_member($church_db,$request);
                if($record == false){
                    $data['error'] = 500;
                    $data['msg']="Connection Failed";
                }else{
                    $data['error'] = 200;
                    $data['status'] = "successful";
                    $data['data'] = $record;
                }

            }elseif($_REQUEST['profile-tab'] == 3){
                
                $request['tab'] = $_REQUEST['profile-tab'];
                $request['member_id'] = $_REQUEST['memberID'];
                $request['position'] = $_REQUEST['position'];
                $request['group'] = $_REQUEST['groups'];
                $request['branch'] = $_REQUEST['branch'];
                $request['status'] = $_REQUEST['status'];

                $record = membership\model::update_member($church_db,$request);
                if($record == false){
                    $data['error'] = 500;
                    $data['msg']="Connection Failed";
                }else{
                    $data['error'] = 200;
                    $data['status'] = "successful";
                    $data['data'] = $record;
                }
            }
        break;

        case"filter-member";

            $request['member_id'] = $_REQUEST['memberID'];
            $request['church_id'] = $_REQUEST['church_id'];

            $record = membership\model::filter_member($church_db,$request);
            if($record == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $record;
            }

        break;

        case"delete-member";

            $request['member_id'] = $_REQUEST['memberID'];

            $record = membership\model::delete_member($church_db,$request);
            if ($record == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
            }
        break;

        case"cash-book";

            $request['id'] = $_REQUEST['church_id'];
            $request['book'] = 1;
            $result = bookkeeping\model::data_cash_book($church_db,$request);
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data = $result;
            }

        break;

        case"bank-book";

            $request['id'] = $_REQUEST['church_id'];
            $request['book'] = 2;
            $result = bookkeeping\model::data_bank_book($church_db,$request);
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data = $result;
            }
        break;

        case"combo";
            $request['id'] = $_REQUEST['church_id'];
            $request['combo'] = $_REQUEST['combo'];
            
            if($request['combo'] === 'position'){
                if(isset( $_REQUEST['position'])){
                    $request['position'] = $_REQUEST['position'];
                }
                $d = cmbPosition($church_db,$request);
            }elseif($request['combo'] === 'group'){
                if(isset( $_REQUEST['group'])){
                    $request['group'] = $_REQUEST['group'];
                }
                $d = cmbGroup($church_db,$request);
            }elseif($request['combo'] === 'branch'){
                if(isset( $_REQUEST['branch'])){
                    $request['branch'] = $_REQUEST['branch'];
                }
                $d = cmbBranch($church_db,$request);
            }elseif($request['combo'] === 'income'){
                if(isset( $_REQUEST['income'])){
                    $request['income'] = $_REQUEST['income'];
                }
                $d = income_category($church_db,$request);
            }elseif($request['combo'] === 'expenses'){
                if(isset( $_REQUEST['expenses'])){
                    $request['expenses'] = $_REQUEST['expenses'];
                }
                $d = expense_category($church_db,$request);
            }elseif($request['combo'] === 'country'){
                if(isset( $_REQUEST['country'])){
                    $request['country'] = $_REQUEST['country'];
                }
                $d = cmbCountry($church_db);
            }elseif($request['combo'] === 'xxxincome'){
                if(isset( $_REQUEST['xxxincome'])){
                    $request['xxxincome'] = $_REQUEST['xxxincome'];
                }
                $d = cmbBranchSMS($church_db,$request);
            }

            $data = $d;
            
        break;

        case"combo-filter";
            $request['combo'] = $_REQUEST['combo'];
            
            if($request['combo'] === 'position'){
                
                $position = $_REQUEST['position'];
                $d = data_position($church_db,$position);

            }elseif($request['combo'] === 'group'){

                $group = $_REQUEST['group'];
                $d = data_branch($church_db,$branch);

            }elseif($request['combo'] === 'branch'){

                $branch = $_REQUEST['branch'];
                $d = data_branch($church_db,$branch);
            }

            $data = $d;
            
        break;

        case"add-accounting-book";
            
            $request['church_id'] = $_REQUEST['church_id'];
            $request['book_id'] = $_REQUEST['book_id'];
            $request['book'] = $_REQUEST['book'];

            //$data = $request;

            $result = bookkeeping\model::add_book_keeping($church_db,$request);
           // $data = $result;
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }
        break;

        case"add-income-entry";
            
            $request['time'] = date("Y-m-d H:i:s");
            $request['church_id'] = $_REQUEST['church_id'];
            $request['date'] = $_REQUEST['date'];
            $request['ref'] = $_REQUEST['ref'];
            $request['category'] = $_REQUEST['category'];
            $request['details'] = $_REQUEST['details'];
            $request['type'] = $_REQUEST['type'];
            $request['amount'] = $_REQUEST['amount'];

            //$data = $request;

            $result = bookkeeping\model::add_income_entry($church_db,$request);
            // $data = $result;
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }
        break;

        case"add-expenses-entry";
            
            $request['time'] = date("Y-m-d H:i:s");
            $request['church_id'] = $_REQUEST['church_id'];
            $request['date'] = $_REQUEST['date'];
            $request['ref'] = $_REQUEST['ref'];
            $request['category'] = $_REQUEST['category'];
            $request['details'] = $_REQUEST['details'];
            $request['type'] = $_REQUEST['type'];
            $request['amount'] = $_REQUEST['amount'];

            //$data = $request;

            $result = bookkeeping\model::add_expenses_entry($church_db,$request);
            // $data = $result;
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }
        break;

        case"add-groups";
            
            $request['groups'] = $_REQUEST['groups'];
            $request['church_id'] = $_REQUEST['church_id'];
            //$data = $request;
            $result = church\model::groups($church_db,$request);            
            
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }

        break;

        case"add-branch";
            
            $request['branch'] = $_REQUEST['branch'];
            $request['church_id'] = $_REQUEST['church_id'];
            
            $result = church\model::branch($church_db,$request);
            
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }
        break;

        case"add-position";
            
            $request['position'] = $_REQUEST['position'];
            $request['church_id'] = $_REQUEST['church_id'];
            
            $result = church\model::position($church_db,$request);
            
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }
        break;

       case"add-fundraising";

           $request['date'] = $_REQUEST['date'];
           $request['purpose'] = $_REQUEST['purpose'];
           $request['expected'] = $_REQUEST['expected'];
           $request['church_id'] = $_REQUEST['church_id'];

           $result = fundraising\account::add_purpose($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data['error'] = 200;
               $data['status'] = "successful";
               $data['data'] = $result;
           }
       break;

       case"edit-fundraising";
            $request['date'] = $_REQUEST['date'];
            $request['purpose'] = $_REQUEST['purpose'];
            $request['expected'] = $_REQUEST['expected'];
            $request['church_id'] = $_REQUEST['church_id'];

            $result = fundraising\account::edit_fundraising($church_db,$request);
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['status'] = "successful";
                $data['data'] = $result;
            }
        break;

       case "fundraising-data";
           $request['church_id'] = $_REQUEST['church_id'];

           $result = fundraising\account::fundraising_data($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data = $result;
           }

       break;

        case "fundraising-detail";
            $request['church_id'] = $_REQUEST['church_id'];
            $request['id'] = $_REQUEST['id'];

            $result = fundraising\account::fundraising_data_detail($church_db,$request);
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
                $data['data'] = array(
                    "id" => null,
                    "fund_id" => null,
                    "time" => null,
                    "date" => null,
                    "name" => null,
                    "mobile" => null,
                    "ref" => null,
                    "type" => null,
                    "amount" => null,
                    "paid" => null
                );
            }else{
                $data = $result;
            }

        break;

        case "fundraising-summary";
           $request['church_id'] = $_REQUEST['church_id'];
           $request['id'] = $_REQUEST['id'];

           $result = fundraising\account::fundraising_summary($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data = $result;
           }

       break;

       case "add-raise-payment";
           $request['church_id'] = $_REQUEST['church_id'];
           $request['date'] = $_REQUEST['date'];
           $request['ref'] = $_REQUEST['ref'];
           $request['purpose'] = $_REQUEST['purpose'];
           $request['name'] = $_REQUEST['name'];
           $request['type'] = $_REQUEST['type'];
           $request['amt'] = $_REQUEST['amt'];

           $result = fundraising\account::add_raise_payment_fundraising($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data['error'] = 200;
               $data['msg']="successful";
               $data = $result;
           }

       break;

       case"add-tithe-payment";
           $request['church_id'] = $_REQUEST['church_id'];
           $request['date'] = $_REQUEST['date'];
           $request['ref'] = $_REQUEST['ref'];
           $request['name'] = $_REQUEST['name'];
           $request['type'] = $_REQUEST['type'];
           $request['amt'] = $_REQUEST['amount'];

           $result = tithe\account::add($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data['error'] = 200;
               $data['msg']="successful";
               //$data = $result;
           }

       break;

       case"tithe-data";
           $request['church_id'] = $_REQUEST['church_id'];
           $result = tithe\account::data($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               //$data['error'] = 200;
               //$data['msg']="successful";
               $data = $result;
           }
       break;

       case"tithe-current-amount";

           $request['church_id'] = $_REQUEST['church_id'];
           $request['date'] = $_REQUEST['date'];
           $result = tithe\account::system_tithe_payment($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data['error'] = 200;
               $data['msg']="successful";
               $data = $result;
           }
       break;

       case"tithe-total";
           $request['church_id'] = $_REQUEST['church_id'];
           $result = tithe\account::system_tithe($church_db,$request);
           if ($result == false){
               $data['error'] = 500;
               $data['msg']="Connection Failed";
           }else{
               $data['error'] = 200;
               $data['msg']="successful";
               $data = $result;
           }
       break;

       case"income-financial-report";
          $request['church_id'] = $_REQUEST['church_id'];
          $request['start'] = $_REQUEST['start'];
          $request['end'] = $_REQUEST['end'];

          $result = bookkeeping\model::income_financial_report($church_db,$request);
          if ($result == false){
              $data['error'] = 500;
              $data['msg']="Connection Failed";
          }else{
              $data['error'] = 200;
              $data['msg']="successful";
              $data = $result;
          }
       break;

       case"expenses-financial-report";
            $request['church_id'] = $_REQUEST['church_id'];
            $request['start'] = $_REQUEST['start'];
            $request['end'] = $_REQUEST['end'];

            $result = bookkeeping\model::expenses_financial_report($church_db,$request);
            if ($result == false){
                $data['error'] = 500;
                $data['msg']="Connection Failed";
            }else{
                $data['error'] = 200;
                $data['msg']="successful";
                $data = $result;
            }
       break;


        default:
            $data['error'] = 600;
            $data['msg']="missing endpoint";
    }
}

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
echo json_encode($data);
?>