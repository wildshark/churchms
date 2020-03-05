<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 11:13 AM
 */
namespace pos;

class model{

    function add_user_account($conn,$data){

        $name = $data[0];
        $surname = $data[1];
        $church = $data[2];
        $prefix = $data[3];
        $email = $data[4];
        $mobile = $data[5];
        $website = $data[6];
        $address = $data[7];
        $username = $data[8];
        $password = $data[9];
        $currency = $data[10];
        $amount = $data[11];

        if(!isset($token)){
            $token = md5(md5($name.$surname.$username.$password,true));
        }

        $sql ="INSERT INTO `tbl_church` (`fname`, `surname`, `church`, `prefix`, `mobile`, `email`, `website`, `address`, `username`, `password`, `token`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss",$name,$surname,$church,$prefix,$mobile,$email,$website,$address,$username,$password,$token);

        if($stmt->execute()){

            $response['status'] = 200;
            $response['church'] = $church;
            $response['token'] = $token;
            $response['mobile'] = $mobile;
            $response['email'] = $email;
            $response['currency'] = $currency;
            $response['amount'] = $amount;

            if ((!isset($amount)) && (empty($amount))){
                $amount ="0.00";
            }
            return $response;
        }else{
            return 500;
        }
    }

    function pos_paid($conn,$data){

        $churchID = $data['payID'];
        $pos = $data['pay'];

        $sql="UPDATE `tbl_church` SET `donation`=? WHERE (`churchID`=?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$pos,$churchID);

        if($stmt->execute()){
            return 200;
        }else{
            return 500;
        }
    }

    function payment_page($data){

        $invoice = "MSF-".date("Ymdhis");
        $date = date("M d, Y");

        if(($data['currency'] ==="GHS") ||($data['currency'] ==="USD")){
            $country ="GH";
        }else{
            $country ="NG";
        }
        echo"
            <!doctype html>
            <html>
            <head>
                <meta charset='utf-8'>
                <title>Invoice</title>
                <style>
                .invoice-box {
                    max-width: 800px;
                    margin: auto;
                    padding: 30px;
                    border: 1px solid #eee;
                    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                    font-size: 16px;
                    line-height: 24px;
                    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                    color: #555;
                }
                
                .invoice-box table {
                    width: 100%;
                    line-height: inherit;
                    text-align: left;
                }
                
                .invoice-box table td {
                    padding: 5px;
                    vertical-align: top;
                }
                
                .invoice-box table tr td:nth-child(2) {
                    text-align: right;
                }
                
                .invoice-box table tr.top table td {
                    padding-bottom: 20px;
                }
                
                .invoice-box table tr.top table td.title {
                    font-size: 45px;
                    line-height: 45px;
                    color: #333;
                }
                
                .invoice-box table tr.information table td {
                    padding-bottom: 40px;
                }
                
                .invoice-box table tr.heading td {
                    background: #eee;
                    border-bottom: 1px solid #ddd;
                    font-weight: bold;
                }
                
                .invoice-box table tr.details td {
                    padding-bottom: 20px;
                }
                
                .invoice-box table tr.item td{
                    border-bottom: 1px solid #eee;
                }
                
                .invoice-box table tr.item.last td {
                    border-bottom: none;
                }
                
                .invoice-box table tr.total td:nth-child(2) {
                    border-top: 2px solid #eee;
                    font-weight: bold;
                }
                
                @media only screen and (max-width: 600px) {
                    .invoice-box table tr.top table td {
                        width: 100%;
                        display: block;
                        text-align: center;
                    }
                    
                    .invoice-box table tr.information table td {
                        width: 100%;
                        display: block;
                        text-align: center;
                    }
                }
                
                /** RTL **/
                .rtl {
                    direction: rtl;
                    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                }
                
                .rtl table {
                    text-align: right;
                }
                
                .rtl table tr td:nth-child(2) {
                    text-align: left;
                }
                </style>
            </head>
            
            <body>
                <div class='invoice-box'>
                    <table cellpadding='0' cellspacing='0'>
                        <tr class='top'>
                            <td colspan='2'>
                                <table>
                                    <tr>
                                        <td class='title'>
                                            <img src='assets/img/logo2.png' style='width:50%; max-width:300px;'>
                                        </td>
                                        
                                        <td>
                                            Invoice #: {$invoice}<br>
                                            Created: {$date}<br>
                                            Due: {$date}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <tr class='information'>
                            <td colspan='2'>
                                <table>
                                    <tr>
                                        <td>
                                            {$data['church']}.<br>
                                            {$data['mobile']}<br>
                                            {$data['email']}
                                        </td>
                                        
                                        <td>
                                            iQuipe Digital.<br>
                                            +233 548263738<br>
                                            iquipe@outlook.com<br>
                                            www.iquipe.com
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <tr class='heading'>
                            <td>
                                Payment Method
                            </td>
                            
                            <td>
                                Check #
                            </td>
                        </tr>
                        
                        <tr class='details'>
                            <td>
                               Online Payment
                            </td>
                            
                            <td>
                                Donation
                            </td>
                        </tr>
                        
                        <tr class='heading'>
                            <td>
                                Item
                            </td>
                            
                            <td>
                                Price
                            </td>
                        </tr>
                        
                        <tr class='item'>
                            <td>
                               ChurchMS - Meridio
                            </td>
                            
                            <td>
                                {$data['amount']}{$data['currency']}
                            </td>
                        </tr>
                        <tr class='total'>
                            <td></td>
                            
                            <td>
                               Total: {$data['amount']}{$data['currency']}<br/>
                               <form>
                                    <script src='https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js'></script>
                                    <button type='button' onClick='payWithRave()'>Pay Now</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                    
                    <script>
                    const API_publicKey = 'FLWPUBK-401524737b76a414e04e074bcdec0761-X';
                
                    function payWithRave() {
                        var x = getpaidSetup({
                            PBFPubKey: API_publicKey,
                            customer_email: '{$data['email']}',
                            amount: '{$data['amount']}',
                            customer_phone: '{$data['mobile']}',// An Mpesa mobile number is required when collecting Mpesa payment.
                            currency: '{$data['currency']}',
                            country: '{$country}',
                            txref: '{$invoice}',
                            meta: [{
                                metaname: 'flightID',
                                metavalue: 'AP1234'
                            }],
                            onclose: function() {},
                            callback: function(response) {
                                var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                                console.log('This is the response returned after a charge', response);
                                if (response.tx.chargeResponseCode == '00' || response.tx.chargeResponseCode == '0') {
                                    // redirect to a success page
                                    window.location.href = '{$_SERVER['HTTP_HOST']}/?_route=success&pay={$invoice}';
                                } else {
                                    // redirect to a failure page.
                                    window.location.href = '{$_SERVER['HTTP_HOST']}/?_route=failed&pay={$invoice}';
                                }
                
                                x.close(); // use this to close the modal immediately after payment.
                            }
                        });
                    }
                </script>
            </body>
            </html>
        ";
    }
}