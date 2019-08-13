<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 09/05/2019
 * Time: 12:43 PM
 */

?>

<!-- Fade In Modal Cash Book -->
<div class="modal fade" id="income" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header bg-green bg-inverse">
                <h4>New Income Entry</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName2">Ref #</label>
                            <input type="text" name="ref" class="form-control" id="exampleInputName2" />
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPhone1">Category</label>
                            <select class="form-control" name="category" id="exampleInput1">
                                <option value="1">Tithe</option>
                                <?php foreach ($income as $row):?>
                                    <option value="<?php echo $row->bkID;?>"><?php echo $row->book;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="exampleInputAddress">Details</label>
                            <input type="text" name="details" class="form-control" id="exampleInputAddress" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputPassword1">Type</label>
                            <select class="form-control" name="type" id="exampleInput1">
                                <option value="1">Cash</option>
                                <option value="2">Bank</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Amount</label>
                            <input type="text" name="amount" class="form-control" id="exampleInputPassword2" placeholder="0.00" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="submit" name="submit" value="add-new-income"><i class="ion-checkmark"></i> Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Fade In Modal -->

<!-- Fade In Modal -->
<div class="modal fade" id="expense" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header bg-green bg-inverse">
                <h4>New Expenses Entry</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName2">Ref #</label>
                            <input type="text" name="ref" class="form-control" id="exampleInputName2" />
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPhone1">Category</label>
                            <select class="form-control" name="category" id="exampleInput1">
                                <?php foreach ($expenses as $row):?>
                                    <option value="<?php echo $row->bkID;?>"><?php echo $row->book;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="exampleInputAddress">Details</label>
                            <input type="text" name="details" class="form-control" id="exampleInputAddress" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputPassword1">Type</label>
                            <select class="form-control" name="type" id="exampleInput1">
                                <option value="1">Cash</option>
                                <option value="2">Bank</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Amount</label>
                            <input type="text" name="amount" class="form-control" id="exampleInputPassword2" placeholder="0.00" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="submit" name="submit" value="add-new-expenses"><i class="ion-checkmark"></i> Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Fade In Modal -->

<!-- Fade Sms Modal -->
<div id="sms-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-md modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps card -->
            <div class="card m-b-0">
                <div class="card-header bg-app bg-inverse">
                    <h4>SMS: Short Message Service</h4>
                    <ul class="card-actions">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="?_route=single.sms">
                                <i class="ion-ios-person fa-4x"></i>
                                <p>Single SMS</p>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="?_route=bulk.sms">
                                <i class="ion-ios-people fa-4x"></i>
                                <p>BulK SMS</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- .card-block -->
            </div>
            <!-- End Apps card -->
        </div>
    </div>
</div>
<!-- Fade End Sms Modal -->

<!-- Fade In Modal -->
<div class="modal fade" id="fundraising" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header bg-green bg-inverse">
                <h4>New Fundraising Entry</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Time</label>
                            <input class="form-control" type="text" readonly name="time" value="<?php echo date("H:i:s")?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="exampleInputAddress">Fundraising Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="exampleInputAddress" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Expected Amount</label>
                            <input type="text" name="expected" class="form-control" id="exampleInputPassword2" placeholder="0.00" />
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Raised Amount</label>
                            <input type="text" name="raised" class="form-control" id="exampleInputPassword2" placeholder="0.00" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="submit" name="submit" value="add-fundraising"><i class="ion-checkmark"></i> Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Fade In Modal -->


<!-- Fade In Modal -->
<div class="modal fade" id="add-raise-payment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header bg-green bg-inverse">
                <h4>New Fundraising Entry</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Ref</label>
                            <input class="form-control" type="text"  name="ref" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="exampleInputAddress">Fundraising Purpose</label>
                            <select name="purpose" class="form-control">
                                <?php fundraising_combo()?>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <label for="exampleInputPassword2">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword2" placeholder="Name" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Type</label>
                            <select name="type" class="form-control" id="exampleInputPassword2">
                                <option value="1">Raise</option>
                                <option value="2">Payment</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Amount</label>
                            <input type="text" name="amount" class="form-control" id="exampleInputPassword2" placeholder="0.00" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="submit" name="submit" value="add-raise-payment"><i class="ion-checkmark"></i>save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Fade In Modal -->

<!-- Fade In Modal -->
<div class="modal fade" id="tithe" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header bg-green bg-inverse">
                <h4>New Tithe Payment</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Ref</label>
                            <input class="form-control" type="text"  name="ref" value="<?php echo str_shuffle(date("Ymd"))?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="exampleInputPassword2">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword2" placeholder="Name" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Type</label>
                            <select name="type" class="form-control" id="exampleInputPassword2">
                                <option value="1">Cash</option>
                                <option value="2">Bank</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputPassword2">Amount</label>
                            <input type="text" name="amount" class="form-control" id="exampleInputPassword2" placeholder="0.00" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="submit" name="submit" value="add-tithe-payment"><i class="ion-checkmark"></i>save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Fade In Modal -->

<!-- Fade In Modal -->
<div class="modal fade" id="financial-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header bg-green bg-inverse">
                <h4>Financial Report</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <div class="card-block">
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="exampleInputName1">Start Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="start-date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                        <div class="col-xs-6">
                            <label for="exampleInputName1">End Date</label>
                            <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="end-date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-app" type="submit" name="submit" value="financial-report">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Fade In Modal -->