<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 10:45 AM
 */
namespace data;

function data_empty(){

    $data['fname']="";
    $data['surname']="";
    $data['other']="";
    $data['genderID']="";
    $data['dob']="";
    $data['marital']="";
    $data['occupation']="";
    $data['mobile1']="";
    $data['mobile2']="";
    $data['email']="";
    $data['hometown']="";
    $data['state']="";
    $data['countryID']="";
    $data['address']="";
    $data['positionID']="";
    $data['groupID']="";
    $data['branchID']="";
    $data['statusID']="";

    return $data;

}

function option_income($conn){

    $id = $_SESSION['church'];
    $book =1;
    $sql= "SELECT * FROM `get_book` where `churchID`=? and `bookID`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$book);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
       echo "<tr>
                <td></td>
                <td>No Record</td>
            </tr>";
    }else{
        while($r = $result->fetch_assoc()) {

            if($r['statusID'] == 1){
                $status = "Enable";
                $href ="?submit=option&option=2&set=book-keeping&id=".$r['bkID'];
                $icon ="ion-close";
                $title="Remove from category";

            }else{
                $status ="Disable";
                $href ="?submit=option&option=1&set=book-keeping&id=".$r['bkID'];
                $icon = "ion-android-add";
                $title="Add to category";
            }

            if(isset($n)){
                $n = $n+1;
            }else{
                $n=1;
            }

            echo "
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td>{$r['book']}</td>
                    <td class='hidden-xs'>{$status}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Edit'><i class='ion-edit'></i></button>
                            <a href='{$href}' class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='{$title}'><i class='{$icon}'></i></a>
                        </div>
                    </td>
                </tr>
            ";
        }

    }
}

function option_expenses($conn){

    $id = $_SESSION['church'];
    $book =2;

    $sql= "SELECT * FROM `get_book` where `churchID`=? and `bookID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$book);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<tr>
                <td></td>
                <td>No Record</td>
            </tr>";
    }else{
        while($r = $result->fetch_assoc()) {

            if($r['statusID'] == 1){
                $status = "Enable";
                $href ="?submit=option&option=2&set=book-keeping&id=".$r['bkID'];
                $icon ="ion-close";
                $title="Remove from category";

            }else{
                $status ="Disable";
                $href ="?submit=option&option=1&set=book-keeping&id=".$r['bkID'];
                $icon = "ion-android-add";
                $title="Add to category";
            }

            if(isset($n)){
                $n = $n+1;
            }else{
                $n=1;
            }

            echo "
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td>{$r['book']}</td>
                    <td class='hidden-xs'>{$status}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Edit client'><i class='ion-edit'></i></button>
                            <a href='{$href}' class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='{$title}'><i class='{$icon}'></i></a>
                        </div>
                    </td>
                </tr>
            ";
        }

    }
}

function option_membership($conn){

    $id = $_SESSION['church'];

    $sql= "SELECT * FROM `get_position` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<tr>
                <td></td>
                <td>No Record</td>
            </tr>";
    }else{
        while($r = $result->fetch_assoc()) {

            if($r['statusID'] == 1){
                $status = "Enable";
                $href ="?submit=option&option=2&set=position&id=".$r['positionID'];
                $icon ="ion-close";
                $title="Remove from category";

            }else{
                $status ="Disable";
                $href ="?submit=option&option=1&set=position&id=".$r['positionID'];
                $icon = "ion-android-add";
                $title="Add to category";
            }

            if(isset($n)){
                $n = $n+1;
            }else{
                $n=1;
            }

            echo "
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td>{$r['position']}</td>
                    <td class='hidden-xs'>{$status}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Edit client'><i class='ion-edit'></i></button>
                            <a href='{$href}' class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='{$title}'><i class='{$icon}'></i></a>
                        </div>
                    </td>
                </tr>
            ";
        }

    }
}

function option_groups($conn){

    $id = $_SESSION['church'];

    $sql= "SELECT * FROM `get_groups` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<tr>
                <td></td>
                <td>No Record</td>
            </tr>";
    }else{
        while($r = $result->fetch_assoc()) {

            if($r['statusID'] == 1){
                $status = "Enable";
                $href ="?submit=option&option=2&set=groups&id=".$r['groupID'];
                $icon ="ion-close";
                $title="Remove from category";

            }else{
                $status ="Disable";
                $href ="?submit=option&option=1&set=groups&id=".$r['groupID'];
                $icon = "ion-android-add";
                $title="Add to category";
            }

            if(isset($n)){
                $n = $n+1;
            }else{
                $n=1;
            }

            echo "
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td>{$r['groups']}</td>
                    <td class='hidden-xs'>{$status}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Edit client'><i class='ion-edit'></i></button>
                            <a href='{$href}' class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='{$title}'><i class='{$icon}'></i></a>
                        </div>
                    </td>
                </tr>
            ";
        }

    }
}

function option_branch($conn){

    $id = $_SESSION['church'];

    $sql= "SELECT * FROM `get_branch` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<tr>
                <td></td>
                <td>No Record</td>
            </tr>";
    }else{
        while($r = $result->fetch_assoc()) {

            if($r['statusID'] == 1){
                $status = "Enable";
                $href ="?submit=option&option=2&set=branch&id=".$r['branchID'];
                $icon ="ion-close";
                $title="Remove from category";

            }else{
                $status ="Disable";
                $href ="?submit=option&option=1&set=branch&id=".$r['branchID'];
                $icon = "ion-android-add";
                $title="Add to category";
            }

            if(isset($n)){
                $n = $n+1;
            }else{
                $n=1;
            }

            echo "
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td>{$r['branch']}</td>
                    <td class='hidden-xs'>{$status}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Edit client'><i class='ion-edit'></i></button>
                            <a href='{$href}' class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='{$title}'><i class='{$icon}'></i></a>
                        </div>
                    </td>
                </tr>
            ";
        }

    }
}

function data_cash_book($conn){

    $id = $_SESSION['church'];
    $tranType = 1;

    $sql ="SELECT * FROM `get_transaction` where `churchID`=? and `tranTypeID`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$tranType);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
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

            if(isset($n)){
                $n=$n+1;
            }else{
                $n = 1;
            }

            echo"
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td class='text-left'>{$postDate}</td>
                    <td class='hidden-xs'>{$detail}</td>
                    <td class='hidden-xs'>{$category}</td>
                    <td class='hidden-xs'>{$ref}</td>
                    <td class='hidden-xs'>{$dr}</td>
                    <td class='hidden-xs'>{$cr}</td>
                    <td class='hidden-xs'>{$balance}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <a href='?_route=application&id={$id}' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                        </div>
                    </td>
                </tr>
            ";
        }
    }
}

function data_bank_book($conn){

    $id = $_SESSION['church'];
    $tranType = 2;

    $sql ="SELECT * FROM `get_transaction` where `churchID`=? and `tranTypeID`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$id,$tranType);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
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

            if(isset($n)){
                $n=$n+1;
            }else{
                $n = 1;
            }

            echo"
                <tr>
                    <td class='text-center'>{$n}</td>
                    <td class='text-left'>{$postDate}</td>
                    <td class='hidden-xs'>{$detail}</td>
                    <td class='hidden-xs'>{$category}</td>
                    <td class='hidden-xs'>{$ref}</td>
                    <td class='hidden-xs'>{$dr}</td>
                    <td class='hidden-xs'>{$cr}</td>
                    <td class='hidden-xs'>{$balance}</td>
                    <td class='text-center'>
                        <div class='btn-group'>
                            <a href='?_route=application&id={$id}' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                            <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                        </div>
                    </td>
                </tr>
            ";
        }
    }
}

function data_member($conn){

    $id = $_SESSION['church'];

    $sql ="SELECT * FROM `get_membership` where `churchID`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo"
            <tr>
                <td class='text-center'>NuLL</td>
                <td class='text-left'>NuLL</td>
                <td class='font-500'>NuLL</td>
                <td class='hidden-xs'>NuLL</td>
                <td class='hidden-xs'>NuLL</td>
                <td class='hidden-xs'>NuLL</td>
                <td class='hidden-xs'>NuLL</td>
                <td class='text-center'>
                    <div class='btn-group'>
                        <a href='?_route=new.member&id=#' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                        <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                    </div>
                </td>
            </tr>         
        ";
    }else{
        // output data of each row
        while($r = $result->fetch_assoc()) {

            $id = $r['memberID'];
            $name = $r['fname'];
            $surname = $r['surname'];
            $other = $r['other'];
            $gender = $r['genderID'];
            $dob = $r['dob'];
            $occupation = $r['occupation'];
            $marital = $r['marital'];
            $mobile1 = $r['mobile1'];
            $mobile2 = $r['mobile2'];

            if($gender = 1){
                $gender ="Male";
            }else{
                $gender ="Female";
            }

            if(isset($n)){
                $n=$n+1;
            }else{
                $n = 1;
            }

            echo"
                    <tr>
                        <td class='text-center'>{$n}</td>
                        <td class='text-left'>{$name} {$surname} {$other}</td>
                        <td class='font-500'>{$gender}</td>
                        <td class='hidden-xs'>{$marital}</td>
                        <td class='hidden-xs'>{$occupation}</td>
                        <td class='hidden-xs'>{$mobile1}</td>
                        <td class='hidden-xs'>{$mobile2}</td>
                        <td class='text-center'>
                            <div class='btn-group'>
                                <a href='?_route=new.member&id={$id}' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                            </div>
                        </td>
                    </tr>
                ";
        }
    }

}

function data_sms($conn){

    $id = $_SESSION['church'];

    $sql ="SELECT * FROM `get_sms` where `churchID`=? LIMIT 0, 9";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo"
            <tr>
                <td class='text-center'>Null</td>
                <td class='text-left'>Null</td>
                <td class='font-500'>Null</td>
                <td class='text-center'>
                    <div class='btn-group'>
                        <a href='?_route=new.member&id=#' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                        <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                    </div>
                </td>
            </tr>
                ";
    }else{
       while ($r = $result->fetch_assoc()){

        $id = $r['sms_id'];
        $date = $r['smsDate'];
        $to = $r['to'];
        $msg = $r['sms'];
        if(isset($n)){
            $n = $n + 1;
        }else{
            $n = 1;
        }

        if(($r['status'] == 1)||($r['status']) == null){
            $status = "failed";
        }else{
            $status = "Successful";
        }

        echo"
            <tr>
                <td class='text-center'>{$n}</td>
                <td class='text-left'>{$date}</td>
                <td class='font-500'>{$to}</td>
                <td class='hidden-xs'>{$status}</td>
                <td class='text-center'>
                    <div class='btn-group'>
                        <a href='?_route=new.member&id=#' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                        <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                    </div>
                </td>
            </tr>";
        }
    }
}

function profileGENDERID($genderID){

    if($genderID == 1){
        return "Male";
    }else{
        return "Female";
    }
}

function data_profile($conn){

    $id = $_SESSION['church'];
    //$id =1;
    $sql ="SELECT * FROM `get_church` where `churchID`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);

    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row;
}

function data_membership_profile($conn,$churchID,$memberID){

    $sql ="SELECT * FROM `get_membership` WHERE `churchID`=? and `memberID`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$churchID,$memberID);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>
