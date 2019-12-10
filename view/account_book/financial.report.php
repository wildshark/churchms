<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 12/08/2019
 * Time: 8:39 AM
 */
?>
<!-- Invoice -->
<div class="card">
        <div class="card-header">
            <ul class="card-actions">
                <li>
                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                    <button type="button" onclick="App.initHelper( 'print-page' );"><i class="ion-printer m-r-xs"></i> Print Invoice</button>
                </li>
            </ul>
        </div>
        <div class="card-block">
            <!-- Invoice Info -->
            <div class="row">
                <!-- Company Info -->
                <div class="col-xs-6 col-sm-4 col-lg-3">
                    <p class="h3">Financial Report</p>
                    <p class="h5">Start Date:<?php echo $_GET['start'];?></p>
                    <p class="h5">End Date:<?php echo $_GET['end'];?></p>
                </div>
                <!-- End Company Info -->
            </div>
            <!-- End Invoice Info -->

            <!-- Table -->
            <div class="table-responsive m-y-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;"></th>
                        <th>Income Details</th>
                        <th class="text-center" style="width: 100px;">Books</th>
                        <th class="text-right w-10">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($income)){
                            foreach($income as $r){
                                if(isset($serial_i)){
                                    $serial_i = $serial_i + 1;
                                }else{
                                    $serial_i = 1;
                                }

                                if($r['tranTypeID'] == 1){
                                    $type = "Cash";
                                }else{
                                    $type = "Bank";
                                }

                                $amount = number_format($r['income'],2);
                                echo"
                                   <tr>
                                        <td class='text-center'>{$serial_i}</td>
                                        <td>
                                            <p class='font-500 m-b-0'>{$r['book']}</p>
                                        </td>
                                        <td class='text-center'>{$type}</td>
                                        <td class='text-right'>{$amount}</td>
                                    </tr>
                                ";
                            }
                        }else{
                            echo"
                                <tr>
                                    <td class='text-center'>Null</td>
                                    <td>
                                        <p class='font-500 m-b-0'>Null</p>
                                    </td>
                                    <td class='text-center'>Null</td>
                                    <td class='text-right'>Null</td>
                                </tr>
                            ";
                        }

                        ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive m-y-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;"></th>
                        <th>Expenses Details</th>
                        <th class="text-center" style="width: 100px;">Books</th>
                        <th class="text-right w-10">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($expenses)){
                        foreach($expenses as $r){
                            if(isset($serial_e)){
                                $serial_e = $serial_e + 1;
                            }else{
                                $serial_e = 1;
                            }

                            if($r['tranTypeID'] == 1){
                                $type = "Cash";
                            }else{
                                $type = "Bank";
                            }

                            $amount = number_format($r['expenses'],2);

                            echo"
                                <tr>
                                    <td class='text-center'>{$serial_e}</td>
                                    <td>
                                        <p class='font-500 m-b-0'>{$r['book']}</p>
                                    </td>
                                    <td class='text-center'>{$type}</td>
                                    <td class='text-right'>{$amount}</td>
                                </tr>
                            ";
                        }
                    }else{
                        echo"
                                <tr>
                                    <td class='text-center'>Null</td>
                                    <td>
                                        <p class='font-500 m-b-0'>Null</p>
                                    </td>
                                    <td class='text-center'>Null</td>
                                    <td class='text-right'>Null</td>
                                </tr>
                            ";
                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <hr class="hidden-print">
            <p class="text-muted text-center"><small>Thank you very much for doing business with us. We will happy to work with you again!</small></p>
            <!-- End Footer -->
        </div>
    </div>
<!-- End Invoice -->