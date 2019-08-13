<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/07/2019
 * Time: 2:06 PM
 */

function admin_profile_button(){

    echo "
        <li class=\"dropdown-header\">
            Pages
        </li>
        <li>
            <a href=\"?_route=profile\">Profile</a>
        </li>
        <li>
            <a href=\"base_pages_profile.html\"><span class=\"badge badge-success pull-right\">3</span> Blog</a>
        </li>
        <li>
            <a href='?_route=logout'>Logout</a>
        </li>
    ";
}

function gender($genderID){

    if($genderID == 1){
        $g = "Male";
    }else{
        $g = "Female";
    }
    return $g;
}

function status($status){

    if ($status == 1){
        $s = "Present";
    }elseif ($status == 2){
        $s = "left Church";
    }elseif($status == 3){
        $s = "Missing";
    }elseif ($status == 4){
        $s = "Late";
    }else{
        $s = "unknown";
    }

    return $s;
}

function photo($membership){

    if(isset($membership['photo'])){
        return $membership['photo'];
    }else{
        return "assets/img/avatars/avatar3.jpg";
    }
}

function upload_picture(){

    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $img['error'] = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $img['error'] = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $file = md5($target_file."/". uniqid());
        $target_file ="assets/uploads/". $file.".jpeg";
        //echo "Sorry, file already exists.";
        $uploadOk = 1;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $img['error'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $img['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $img['error'] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            if (file_exists($target_file)) {
                $img['file'] = $target_file;
                $img['status'] = true;
            }
        } else {
            $img['error'] = "Sorry, there was an error uploading your file.";
            $img['status'] = false;
        }

    }

    return $img;

}

function fundraising_combo(){

    $r['endpoint'] ='fundraising-data';
    $result = config\connection($r);
    $record = json_decode($result);

    if($record->error == 500){
        echo "<option value=''></option>";
    }else{
        foreach ($record as $opt):
            echo "<option value='{$opt->id}'>{$opt->purpose}</option>";
        endforeach;
    }
}
