<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 7:45 PM
 */
/**if(is_array(cashDASHBROAD($conn))){
    $cash = cashDASHBROAD($conn);
}

if(is_array(cashDASHBROAD($conn))){
    $bank = bankDASHBROAD($conn);
}

if(!isset($balance)){
    $balance = $bank['BAL'] + $cash['BAL'];
}**/

$cash_bal = $dashboard['cash']['BAL'];
$bank_bal = $dashboard['bank']['BAL'];
$income = ($dashboard['bank']['DR']) + ($dashboard['cash']['DR']);
$expenses = ($dashboard['bank']['CR']) + ($dashboard['cash']['CR']);
$dashboard['available'] = $cash_bal + $bank_bal;
?>
<!-- Stats -->
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <a class="card" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Population</p>
                    <p class="h3 text-blue m-t-sm m-b-0"><?php echo $dashboard['population'];?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-blue bg-inverse"><i class="ion-ios-people fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-green bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Male</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $dashboard['male'];?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="ion-man fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-blue bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Female</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $dashboard['female'];?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="ion-woman fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-purple bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Kids</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $dashboard['kids'];?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class=" fa fa-users fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->
</div>
<!-- .row -->
<!-- Stats -->
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <a class="card" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Available Cash</p>
                    <p class="h3 text-blue m-t-sm m-b-0"><?php echo $dashboard['available'];?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-blue bg-inverse"><i class="ion-cash fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-green bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Total Income</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $income;?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="ion-chevron-up fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-blue bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Total Expenses</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $expenses;?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="ion-chevron-down fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-purple bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Messages</p>
                    <p class="h3 m-t-sm m-b-0">0<?php //data_count_sms($conn);?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="ion-ios-email fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-md-6">
        <!-- Card Tabs Animated Fade -->
        <div class="card">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active">
                    <a href="#btabs-animated-fade-home">Cash Book Summary</a>
                </li>
                <li>
                    <a href="#btabs-animated-fade-profile">Bank Book Summary</a>
                </li>
                <li class="pull-right">
                    <a href="#btabs-animated-fade-settings" data-toggle="tooltip" title="Settings"><i class="ion-ios-gear-outline"></i></a>
                </li>
            </ul>
            <div class="card-block tab-content">
                <div class="tab-pane fade in active" id="btabs-animated-fade-home">
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-right w-15">Income</th>
                                    <th class="text-right">Expenses</th>
                                    <th class="text-right">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php //foreach ($cash_summary as $row):?>
                                <tr>
                                    <td class="text-center"><?php //echo $cash_summary->serial;?></td>
                                    <td class="text-center"><?php //echo /$cash_summary->date;?></td>
                                    <td class="text-right"><?php //echo $cash_summary->dr;?></td>
                                    <td class="text-right"><?php //echo $cash_summary->cr;?></td>
                                    <td class="text-right"><?php //echo $cash_summary->bal;?></td>
                                </tr>
                            <?php //endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="btabs-animated-fade-profile">
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-right w-15">Deposit</th>
                                    <th class="text-right">Withdraw</th>
                                    <th class="text-right">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php //foreach ($cash_summary as $row):?>
                            <tr>
                                <td class="text-center"><?php //echo //$bank_summary->serial;?></td>
                                <td class="text-center"><?php //echo //$bank_summary->date;?></td>
                                <td class="text-right"><?php //echo $bank_summary->dr;?></td>
                                <td class="text-right"><?php //echo $bank_summary->cr;?></td>
                                <td class="text-right"><?php //echo $bank_summary->bal;?></td>
                            </tr>
                            <?php //endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="btabs-animated-fade-settings">
                    <p>Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                        banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu
                        synth chambray yr.</p>
                </div>
            </div>
        </div>
        <!-- End Card Tabs Animated Fade -->
    </div>

        <!-- Card Tabs Animated Slide Left -->
    <div class="col-md-6">
        <div class="card">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active">
                    <a href="#btabs-animated-slideleft-home">Income Summary</a>
                </li>
                <li>
                    <a href="#btabs-animated-slideleft-profile">Expenses Summary</a>
                </li>
                <li class="pull-right">
                    <a href="#btabs-animated-slideleft-settings" data-toggle="tooltip" title="Settings"><i class="ion-ios-gear-outline"></i></a>
                </li>
            </ul>
            <div class="card-block tab-content">
                <div class="tab-pane fade fade-left in active" id="btabs-animated-slideleft-home">
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th class="text-center">Date</th>
                                <th class="text-right w-15">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $dash['endpoint'] ="monthly-income";
                                $result = config\connection($dash);
                                $monthly_income = json_decode($result);
                                foreach ($monthly_income as $row):
                                echo"
                                    <tr>
                                        <td class='text-center'>{$monthly_income->serial}</td>
                                        <td class='text-center'>{$monthly_income->date}</td>
                                        <td class='text-right'>{$monthly_income->amount}</td>
                                    </tr>
                                ";

                             endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade fade-left" id="btabs-animated-slideleft-profile">
                    <div class="card-block">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th class="text-center">Date</th>
                                <th class="text-right w-15">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $r['endpoint'] ="monthly-expenses";
                                $result = config\connection($r);
                                $expenses = json_decode($result);
                            //foreach ($cash_summary as $row):?>
                            <tr>
                                <td class="text-center"><?php echo $expenses->serial;?></td>
                                <td class="text-center"><?php echo $expenses->date;?></td>
                                <td class="text-right"><?php echo $expenses->amount;?></td>
                            </tr>
                            <?php //endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade fade-left" id="btabs-animated-slideleft-settings">
                    <p>Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                        banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu
                        synth chambray yr.</p>
                </div>
            </div>
        </div>
        <!-- End Card Tabs Animated Slide Left -->
    </div>
</div>