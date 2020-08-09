<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 11:39 AM
 */

namespace user;

class modal{

    public static function login($conn,$login){

        $username = $login['username'];
        $password = $login['password'];

        $pwd = "pwd".md5("pwd/".$username.$password."-x")."-X";

        $sql="SELECT * FROM `get_church` where `username`=? and `password`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$username,$pwd);

        $stmt->execute();

        $result = $stmt->get_result();
        if($result->num_rows == 0){
            return false;
        }else {
            $row = $result->fetch_assoc();
            if($row['username'] == $username && $row['password'] == $pwd){

                //$key = md5(md5($row['token'],true));
                return array(
                    'church'=> $row['churchID'],
                    'username' =>$username,
                    'token'=>$row['token'],
                    'donation'=>$row['donation'],
                    'checked'=>'200'
                );
            }
        }
    }

    public static function sign_up($conn,$data){

        $id = $data['church_id'];
        $name = $data['name'];
        $surname = $data['surname'];
        $church = $data['church'];
        $prefix = $data['prefix'];
        $mobile = $data['mobile'];
        $email = $data['email'];
        $website = $data['website'];
        $address =$data['address'];
        $username = $data['username'];
        $password =$data['password'];

        $password = "pwd".md5("pwd/".$username.$password."-x")."-X";
        $token =$email.$mobile.$username.$password;
        $token = md5(md5($token,true));
        //$token = password_hash($token);

        $sql="INSERT INTO `tbl_church` (`fname`, `surname`, `church`, `prefix`, `mobile`, `email`, `website`, `address`, `username`, `password`, `token`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss",$name,$surname,$church,$prefix,$mobile,$email,$website,$address,$username,$password,$token);

        if(true == $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}

