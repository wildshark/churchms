<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 7:59 PM
 */

?>
<div class="card">
    <div class="card-block">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th class="text-center"></th>
                <th>Name</th>
                <th>Surname</th>
                <th class="hidden-xs">Gender</th>
                <th class="hidden-xs">Marital</th>
                <th class="hidden-xs">Occupation</th>
                <th class="hidden-xs">Mobile 1</th>
                <th class="hidden-xs">Mobile 2</th>
                <th class="text-center" style="width: 10%;">Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($record as $row):if(isset($n)){$n = $n + 1;}else{$n = 1;}?>
                    <tr>
                        <td class="text-center"><?php echo $n;?></td>
                        <td class="text-center"><?php echo ucfirst(strtolower($row->fname));?></td>
                        <td class="text-center"><?php echo ucfirst(strtolower($row->surname));?></td>
                        <td class="text-left"><?php if($row->genderID == 1){echo $fm = "Male";}elseif($row->genderID == 2){echo $fm ="Female";}else{echo "null";};?></td>
                        <td class="text-left"><?php echo ucfirst(strtolower($row->marital));?></td>
                        <td class="text-left"><?php echo ucfirst(strtolower($row->occupation));?></td>
                        <td class="text-left"><?php echo $row->mobile1;?></td>
                        <td class="text-left"><?php echo $row->mobile2;?></td>
                        <td class='text-center'>
                            <div class='btn-group'>
                                <a href='?_route=view-member&id=<?php echo $row->memberID;?>' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                <a href="?submit=delete-member&id=<?php echo $row->memberID;?>" class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- .card-block -->
</div>