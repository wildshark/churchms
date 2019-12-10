<html>
<head>
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Dosis'>
    <style>
        #loading{
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #fff
            url('https://loading.io/spinners/vortex/lg.vortex-spiral-spinner.gif')
            no-repeat center center;
            z-index: 99999;
        }
    </style>
</head>
<body onload="myFunction()">
<div id="loading"></div>
</body>

<script>
    // $(document).ready(function(){
    // 	$('div#loading').removeAttr('id');
    // });
    var preloader = document.getElementById("loading");
    // window.addEventListener('load', function(){
    // 	preloader.style.display = 'none';
    // 	})

    function myFunction(){
        preloader.style.display = 'none';
    };
</script>
</html>
<?php
session_start();

include "global/config.php";
include "control/function.php";
include "model/img.resize.php";
$result = new stdClass();
//start bio
$bio = config\bios();

$_SESSION['token'] = $bio['terminal_key'];
//choose there url connection for the server
$_SESSION['server'] = 'server';
$_SESSION['church'] = '1';

if(isset($_REQUEST['submit'])){
    $endpoint = $_REQUEST['submit'];

    switch ($endpoint){

        case"login";

            $user['endpoint']="login";
            $user['username'] = $_POST['username'];
            $user['password'] = $_POST['password'];
            $result = config\connection($user);
            $result = json_decode($result,true);


            if($result['error']==  200){
               $_SESSION['church'] = $result['data']['churchID'];
               $_SESSION['access'] = $result['data']['access'];

               if(isset($_SESSION['church'] ) && isset( $_SESSION['access'])){
                   $_SESSION['username'] =  $user['username'];
                   header("location: ?_route=dashboard");
               }
            }else{
                require "template/login.php";
                session_destroy();
                exit();
            }
        break;

        case"sign-up";

            $sign_up['endpoint'] = $_POST['submit'];
            $sign_up['name'] = $_POST['first-name'];
            $sign_up['surname'] = $_POST['last-name'];
            $sign_up['church'] = $_POST['church'];
            $sign_up['prefix'] = $_POST['prefix'];
            $sign_up['mobile'] = $_POST['mobile'];
            $sign_up['email'] = $_POST['email'];
            $sign_up['country'] = $_POST['country'];
            $sign_up['website'] = $_POST['website'];
            $sign_up['address'] = $_POST['address'];
            $sign_up['username'] = $_POST['username'];
            $sign_up['password'] = $_POST['password'];

            $result = config\connection($sign_up);
            $result = json_decode($result, true);

            if ($result['error'] == 200){
                echo"
                <script src=\"https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js\"></script>
                <script type='text/javascript'>".config\wave($sign_up)."</script>";
            }else{
                echo "server error try again";
            }

        break;

        case"add-member";

            $_POST['endpoint']="add-member";
            if($_POST['profile-tab'] ==1){
                $image = upload_picture();

                if($image['status'] == true){
                    $picture = $image['file'];
                    $resizeObj = new resize($picture);
                    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                    $resizeObj -> resizeImage(277, 277, 'crop');
                    // *** 3) Save image
                    $resizeObj -> saveImage($picture, 1000);
                    $_POST['photo'] = $picture;
                    $result = config\connection($_POST);
                    $result = json_decode($result, true);
                    if($result['error'] == 200){
                        $_SESSION['memberID'] = $result['data'];
                        header("location: ?_route=view-member&id={$result['data']}&status=success");
                    }else{
                        header("location: ?_route=view-member&status=false");
                    }
                }else{
                    header("location: ?_route=view-member&status=image-error");
                }
            }elseif($_POST['profile-tab'] ==2){

                $result = config\connection($_POST);
            }elseif($_POST['profile-tab'] ==3){
                $result = config\connection($_POST);
            }
        break;

       case"update-member";

           $member['endpoint']="update-member";

           if($_POST['profile-tab'] == 1){

               $member['memberID'] = $_SESSION['memberID'];
               $member['profile-tab'] = $_POST['profile-tab'];
               $member['name'] = $_POST['name'];
               $member['surname'] = $_POST['surname'];
               $member['other'] = $_POST['other'];
               $member['gender'] = $_POST['gender'];
               $member['dob'] = $_POST['dob'];
               $member['occupation'] = $_POST['occupation'];
               $member['marital'] = $_POST['marital'];

               $result = config\connection($member);
               $result = json_decode($result, true);
               if($result['error'] == 200){
                   $_SESSION['memberID'] = $result['data']['member_id'];
                   $id = $_SESSION['memberID'];
                   header("location: ?_route=view-member&id={$id}&status=success");
               }else{
                   header("location: ?_route=view-member&status=false");
               }
           }elseif($_POST['profile-tab'] == 2){

               $member['memberID'] = $_SESSION['memberID'];
               $member['profile-tab'] = $_POST['profile-tab'];
               $member['mobile1'] = $_POST['mobile1'];
               $member['mobile2'] = $_POST['mobile2'];
               $member['email'] = $_POST['email'];
               $member['hometown'] = $_POST['hometown'];
               $member['state'] = $_POST['state'];
               $member['country'] = $_POST['country'];
               $member['address'] = $_POST['address'];

               $result = config\connection($member);
               $result = json_decode($result, true);
               if($result['error'] == 200){
                   $_SESSION['memberID'] = $result['data']['member_id'];
                   $id = $_SESSION['memberID'];
                   header("location: ?_route=view-member&id={$id}&status=success");
               }else{
                   header("location: ?_route=view-member&status=false");
               }
           }elseif($_POST['profile-tab'] == 3){

               $member['memberID'] = $_SESSION['memberID'];
               $member['profile-tab'] = $_POST['profile-tab'];
               $member['position'] = $_POST['position'];
               $member['groups'] = $_POST['groups'];
               $member['branch'] = $_POST['branch'];
               $member['status'] = $_POST['status'];
               //var_export($r);
               $result = config\connection($member);
               $result = json_decode($result, true);
               //echo var_export($result);
               if($result['error'] == 200){
                    $_SESSION['memberID'] = $result['data']['member_id'];
                    $id = $_SESSION['memberID'];
                   header("location: ?_route=view-member&id={$id}&status=success");
               }else{
                   header("location: ?_route=view-member&status=false");
               }
           }
       break;

       case"delete-member";

            $member['endpoint'] = $_GET['submit'];
            $member['memberID'] = $_GET['id'];
            $result = config\connection($member);
            $result = json_decode($result, true);

            if ($result['error'] == 200){
                header("location: ?_route=list.member&status=success");
            }else{
                header("location: ?_route=list.member&status=false");
            }
       break;

       case"add-groups";

           $church['endpoint']=$_POST['submit'];
           $church['groups']=$_POST['groups'];

           $result = config\connection($church);
           $result = json_decode($result, true);

           if ($result['error'] == 200){
               header("location: ?_route=set.church&status=success");
           }else{
               header("location: ?_route=set.church&status=false");
           }
       break;

       case"add-branch";
           $church['endpoint']=$_POST['submit'];
           $church['branch']=$_POST['branch'];
           $result = config\connection($church);
           $result = json_decode($result, true);

           if ($result['error'] == 200){
               header("location: ?_route=set.church&status=success");
           }else{
               header("location: ?_route=set.church&status=false");
           }
       break;

       case"add-position";
           $church['endpoint']=$_POST['submit'];
           $church['position']=$_POST['position'];
           $result = config\connection($church);
           $result = json_decode($result, true);

           if ($result['error'] == 200){
               header("location: ?_route=set.church&status=success");
           }else{
               header("location: ?_route=set.church&status=false");
           }
       break;

       default:
           require "model\account.php";
    }

}elseif(isset($_REQUEST['_route'])){
    require_once "control/json.php";
    require "global/navigate.php";
}else{
    require "template/login.php";
    session_destroy();
    exit();
}

?>

