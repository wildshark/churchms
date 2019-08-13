<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/06/2019
 * Time: 3:20 AM
 */
?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <ul class="nav nav-tabs nav-stacked">
                <li class="active">
                    <a href="#profile-tab1" data-toggle="tab">Income</a>
                </li>
                <li>
                    <a href="#profile-tab2" data-toggle="tab">Expense</a>
                </li>
            </ul>
            <!-- .nav-tabs -->
        </div>
        <!-- .card -->
    </div>
    <!-- .col-md-4 -->

    <div class="col-md-8">
        <div class="card">
            <div class="card-block tab-content">
                <!-- Profile tab 1 -->
                <div class="tab-pane fade in active" id="profile-tab1">
                    <form class="fieldset" method="post" action="index.php" enctype="multipart/form-data">
                        <h4 class="m-t-sm m-b">Income Categories</h4>
                        <div class="form-group row">
                            <div class="col-xs-8">
                                <input type="text" name="income"  class="form-control" id="exampleInputName1" />
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-success" type="submit" name="submit" value="add-income" data-toggle="tooltip" title="Enter income type">Add</button>
                            </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-block">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Name</th>
                                    <th class="hidden-xs w-15">Account</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($income as $row):
                                    if(isset($n)){$n=$n+1;}else{$n=1;}?>
                                    <tr>
                                        <td class='text-center'><?php echo $n;?></td>
                                        <td class='text-left'><?php echo $row->book;?></td>
                                        <td class='text-left'><?php $status = $row->statusID; if($status == 1){ echo $status ="Enable";}else{ echo $status ="Disable";}?></td>
                                        <td class='text-center'>
                                            <div class='btn-group'>
                                                <a href='?_route=application&id=<?php echo $row->bkID;?>' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                                <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- .card-block -->
                    </div>
                </div>
                <!-- End profile tab 1 -->

                <!-- Profile tab 2 -->
                <div class="tab-pane fade" id="profile-tab2">
                    <div class="tab-pane fade in active" id="profile-tab1">
                        <form class="fieldset" method="post" action="index.php" enctype="multipart/form-data">
                            <h4 class="m-t-sm m-b">Expense Categories</h4>
                            <div class="form-group row">
                                <div class="col-xs-8">
                                    <input type="text" name="expenses"  class="form-control" id="exampleInputName1" />
                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-success" type="submit" name="submit" value="add-expenses" data-toggle="tooltip" title="Enter expenses type">Add</button>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-block">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Name</th>
                                        <th class="hidden-xs w-15">Account</th>
                                        <th class="text-center" style="width: 100px;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($expenses as $row):
                                        if(isset($n)){$n=$n+1;}else{$n=1;}?>
                                        <tr>
                                            <td class='text-center'><?php echo $n;?></td>
                                            <td class='text-left'><?php echo $row->book;?></td>
                                            <td class='text-left'><?php $status = $row->statusID; if($status == 1){echo $status ="Enable";}else{echo $status ="Disable";}?></td>
                                            <td class='text-center'>
                                                <div class='btn-group'>
                                                    <a href='?_route=application&id=<?php echo $row->bkID;?>' class='btn btn-xs btn-default' data-toggle='tooltip' title='Edit Client'><i class='ion-edit'></i></a>
                                                    <button class='btn btn-xs btn-default' type='button' data-toggle='tooltip' title='Remove Client'><i class='ion-close'></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- .card-block -->
                        </div>
                    </div>
                </div>
                <!-- End profile tab 2 -->
            </div>
            <!-- .card-block .tab-content -->
        </div>
        <!-- .card -->
    </div>
    <!-- .col-md-8 -->
</div>
<!-- .row -->

