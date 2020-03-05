<?php 
namespace config;
//$data="i";

function bios(){

    $old_error_reporting = error_reporting(E_ALL ^ E_WARNING);
    $bio ="package.json";
    $json = file_get_contents($bio);
    error_reporting($old_error_reporting);
    if ($json === FALSE) {
        echo "connection failed";
        exit();
    }else {
        $config = json_decode($json,true);
        return $config;
    }

}

/**function connection($data){
    
    $old_error_reporting = error_reporting(E_ALL ^ E_WARNING);

    if(isset($_SESSION['token'])){
        $data['token'] = $_SESSION['token'];
    }else{
        $data['token'] = 0;
    }

    if(isset($_SESSION['church'])){
        $data['church_id'] = $_SESSION['church'];
    }else{
        $data['church_id'] = 0;
    }

    $post = http_build_query($data);
    //$url = $url."?".$post;

    if($_SESSION['server'] == 'local'){
        $url="http://localhost/krypton/api/?application=church-ms&".$post;
    }elseif($_SESSION['server'] == 'server'){
        $url="https://krypton-react.herokuapp.com/api/?application=church-ms&".$post;
    }else{
        header("location: ?_route=dashboard&connection=error");
    }

    $json = file_get_contents($url);
    error_reporting($old_error_reporting);
    if ($json === FALSE) {
        echo "connection failed";
        exit();
    }else {
        return $json;
    }
}***/

function connection($data){

    if(isset($_SESSION['token'])){
        $data['token'] = $_SESSION['token'];
    }else{
        $data['token'] = 0;
    }

    if(isset($_SESSION['church'])){
        $data['church_id'] = $_SESSION['church'];
    }else{
        $data['church_id'] = 0;
    }

    if($_SESSION['server'] === 'local'){
        $data['mode'] = 'offline';
    }else{
        $data['mode'] = 'online';
    }

    $post = http_build_query($data);
    //$url = $url."?".$post;

    if($_SESSION['server'] == 'local'){
        $url="http://localhost/churchms/api/?".$post;
    }elseif($_SESSION['server'] == 'server'){
        $url="http://localhost/churchms/data/?".$post;
    }else{
        header("location: ?_route=dashboard&connection=error");
    }

    $ch = curl_init();

// set url
    curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );

// $output contains the output string
    $output = curl_exec($ch);

// close curl resource to free up system resources
    curl_close($ch);

    return $output;
}

function wave($data){
    $country = ucfirst($data['country']);
    if($country == "Ghana"){
        $amt = 100;
        $curr = "GHS";
    }elseif($country == "Nigeria"){
        $amt = 500;
        $curr = "NGN";
    }else{
        $amt = 25;
        $curr = "USD";
    }
    $date =date("Ymd");
    $success =  $_SERVER['SERVER_NAME']."/?_route=successful";
    $failed =  $_SERVER['SERVER_NAME']."/?_route=failed";
    return "
    
    window.onload = function() {
		const API_publicKey = \"FLWPUBK-c49e6697062b6fd07c03cc6ff65a0f69-X\";

		function payWithRave() {
			var x = getpaidSetup({
				PBFPubKey: API_publicKey,
				customer_firstname: \"{$data['name']}\",
				customer_lastname: \"{$data['surname']}\",
				amount: {$amt},
				customer_phone: \"{$data['mobile']}\",
				customer_email: \"{$data['email']}\", 
				currency: \"{$curr}\",
				custom_title: \"Church-MS\",
				custom_logo: \"assets/img/logo.png\",
				txref: \"chr-{$date}\",
				meta: [{
					metaname: \"flightID\",
					metavalue: \"AP1234\"
				}],
				onclose: function() {},
				callback: function(response) {
					var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
					console.log(\"This is the response returned after a charge\", response);
					if (
						response.tx.chargeResponseCode == \"00\" ||
						response.tx.chargeResponseCode == \"0\"
					) {
						// redirect to a success page
						  window.location.replace(\"{$success}\"); 
					} else {
						// redirect to a failure page.
						window.location.replace(\"{$failed}\"); 
					}

					x.close(); // use this to close the modal immediately after payment.
				}
			});
		}
		
		payWithRave();
	};";
}


