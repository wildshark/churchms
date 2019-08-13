<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 9:01 PM
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
                <th class="hidden-xs">Gender</th>
                <th class="hidden-xs">Marital</th>
                <th class="hidden-xs">Occupation</th>
                <th class="hidden-xs">Mobile 1</th>
                <th class="hidden-xs">Mobile 2</th>
                <th class="text-center" style="width: 10%;">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php bookkeeping\model::add_book_keeping($conn,$data);?>
            </tbody>
        </table>
    </div>
    <!-- .card-block -->
</div>
