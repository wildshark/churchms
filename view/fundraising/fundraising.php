<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 05/08/2019
 * Time: 7:37 PM
 */


?>
<div class="card">
    <div class="card-block">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th class="text-center"></th>
                <th>Date</th>
                <th>Purpose</th>
                <th class="hidden-xs">Expected Amount</th>
                <th class="hidden-xs">Raise Amount</th>
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
                            <td class='text-center'>
                                <div class='btn-group'>
                                    <a href='#' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                    <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                                </div>
                            </td>
                        </tr>
                     ";
                }else{
                    foreach ($record as $row):
                    if(isset($serial)){
                        $serial = $serial + 1;
                    }else{
                        $serial = 1;
                    }

                    echo"
                        <tr>
                            <td class='text-center'>{$serial}</td>
                            <td class='text-left'>{$row->date}</td>
                            <td class='hidden-xs'>{$row->purpose}</td>
                            <td class='hidden-xs'>{$row->amount}</td>
                            <td class='hidden-xs'>0</td>
                            <td class='text-center'>
                                <div class='btn-group'>
                                    <a href='?_route=fundraising-detail&id={$row->id}&t={$row->purpose}' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
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
