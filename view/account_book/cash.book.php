<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/06/2019
 * Time: 3:49 AM
 */

?>
<!-- Stats -->
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <a class="card" href="javascript:void(0)">
            <!--div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Revenue</p>
                    <p class="h3 text-blue m-t-sm m-b-0">$120.9k</p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-blue bg-inverse"><i class="ion-ios-bell fa-1-5x"></i></span>
                </div>
            </div-->
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-green bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Total Income</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $dr;?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="fa fa-angle-down fa-1-5x"></i></span>
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
                    <p class="h3 m-t-sm m-b-0"><?php echo $cr;?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="fa fa-angle-up fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <a class="card bg-purple bg-inverse" href="javascript:void(0)">
            <div class="card-block clearfix">
                <div class="pull-right">
                    <p class="h6 text-muted m-t-0 m-b-xs">Balance</p>
                    <p class="h3 m-t-sm m-b-0"><?php echo $bal;?></p>
                </div>
                <div class="pull-left m-r">
                    <span class="img-avatar img-avatar-48 bg-gray-light-o"><i class="ion-cash fa-1-5x"></i></span>
                </div>
            </div>
        </a>
    </div>
    <!-- .col-sm-6 -->
</div>
<!-- .row -->
<!-- End stats -->

<div class="card">
    <div class="card-block">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th class="text-center"></th>
                <th>Date</th>
                <th>Details</th>
                <th class="hidden-xs">Transaction</th>
                <th class="hidden-xs">Ref</th>
                <th class="hidden-xs">Income</th>
                <th class="hidden-xs">Expense</th>
                <th class="hidden-xs">Balance</th>
                <th class="text-center" style="width: 10%;">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if((isset($record->error)) && ($record->error == 500)){
                    echo"
                            <tr>
                                <td class='text-center'>null</td>
                                <td class='text-left'>null</td>
                                <td class='hidden-xs'>null</td>
                                <td class='hidden-xs'>null</td>
                                <td class='hidden-xs'>null</td>
                                <td class='hidden-xs'>null</td>
                                <td class='hidden-xs'>null</td>
                                <td class='hidden-xs'>null</td>
                                <td class='text-center'>
                                    <div class='btn-group'>
                                        <a href='#' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                        <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                                    </div>
                                </td>
                            </tr>
                       ";
                }else{
                    foreach($record as $row):
                        if(isset($serial)){
                            $serial = $serial + 1;
                        }else{
                            $serial = 1;
                        }
                        echo"
                            <tr>
                                <td class='text-center'>{$serial}</td>
                                <td class='text-left'>{$row->date}</td>
                                <td class='hidden-xs'>{$row->detail}</td>
                                <td class='hidden-xs'>{$row->category}</td>
                                <td class='hidden-xs'>{$row->ref}</td>
                                <td class='hidden-xs'>{$row->dr}</td>
                                <td class='hidden-xs'>{$row->cr}</td>
                                <td class='hidden-xs'>{$row->bal}</td>
                                <td class='text-center'>
                                    <div class='btn-group'>
                                        <a href='?_route=application&id={$row->id}' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                        <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                                    </div>
                                </td>
                            </tr>
                        ";
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- .card-block -->
</div>