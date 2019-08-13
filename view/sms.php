<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 22/06/2019
 * Time: 4:14 PM
 */

?>
<div class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-sm-5">
                <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-xs-12" for="example-text-input">Sent to</label>
                        <div class="col-sm-9">
                            <?php foreach ($group as $row):?>
                                <option value="<?php echo $row->groupID;?>"><?php echo $row->groups;?></option>
                            <?php endforeach;?>
                            <div class="help-block">eg 233548263738,23480263738</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12" for="example-textarea-input">Short Text</label>
                        <div class="col-xs-12">
                            <textarea class="form-control" id="example-textarea-input" name="msg" rows="6" placeholder="Content.."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12" for="example-select">From</label>
                        <div class="col-sm-9">
                            <?php foreach ($group as $row):?>
                                <option value="<?php echo $row->groupID;?>"><?php echo $row->groups;?></option>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-xs-12">
                            <button class="btn btn-app" type="submit" name="submit" value="add-sms">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-7">
                <h4>SMS Sent</h4>
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Date</th>
                        <th class="hidden-xs w-15">SMS To</th>
                        <th class="hidden-xs w-15">Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php //data\data_sms($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
