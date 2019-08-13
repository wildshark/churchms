<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 7:57 PM
 */
if(isset($_GET['id'])){
    $_SESSION['memberID'] = $_GET['id'];
    $button = "update-member";
}else{
    $_SESSION['memberID'] = null;
    $button = "add-member";
}

?>
<div class="card card-profile">
    <div class="card-profile-img bg-img" style="background-image: url(assets/img/misc/base_pages_profile_header_bg.jpg);">
    </div>
    <div class="card-block card-profile-block text-xs-center text-sm-left">
        <img class="img-avatar img-avatar-96" src="<?php echo photo($membership);?>" alt="" />
        <div class="profile-info font-500"><?php echo $membership['fname']." ". $membership['surname']." ".$membership['other'];?>
            <div class="small text-muted m-t-xs"><?php echo $membership['email'];?></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <ul class="nav nav-tabs nav-stacked">
                <li class="active">
                    <a href="#profile-tab1" data-toggle="tab">Member Profile</a>
                </li>
                <li>
                    <a href="#profile-tab2" data-toggle="tab">Contact</a>
                </li>
                <li>
                    <a href="#profile-tab3" data-toggle="tab">Association</a>
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
                        <h4 class="m-t-sm m-b">Member info</h4>
                        <div class="form-group row">
                            <div class="col-xs-4">
                                <label for="exampleInputName1">First name</label>
                                <input type="text" name="name" value="<?php echo $membership['fname'];?>" class="form-control" id="exampleInputName1" />
                            </div>
                            <div class="col-xs-4">
                                <label for="exampleInputName2">Last name</label>
                                <input type="text" name="surname" value="<?php echo $membership['surname'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                            <div class="col-xs-4">
                                <label for="exampleInputName2">Other name</label>
                                <input type="text" name="other" value="<?php echo $membership['other'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="<?php echo $membership['genderID'];?>"><?php echo $membership['gender'];?></option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Birth Date</label>
                                <input class="js-datepicker form-control" type="text" id="example-datepicker3" name="dob" value="<?php echo $membership['dob'];?>" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Marital</label>
                                <select name="marital" class="form-control">
                                    <option value="<?php echo $membership['marital'];?>"><?php echo $membership['marital'];?></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Occupation</label>
                                <input type="text" name="occupation" value="<?php echo $membership['occupation'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Picture</label>
                                <input type="file" name="fileToUpload" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="row narrow-gutter">
                            <input type="hidden" name="profile-tab" value="1">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-block">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" name="submit" value="<?php echo $button;?>" class="btn btn-app btn-block">Save<span class="hidden-xs"> changes</span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End profile tab 1 -->

                <!-- Profile tab 2 -->
                <div class="tab-pane fade" id="profile-tab2">
                    <form class="fieldset" method="post" action="index.php" enctype="application/x-www-form-urlencoded">
                        <h4 class="m-t-sm m-b">Contact info</h4>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Mobile 1</label>
                                <input type="text" name="mobile1" value="<?php echo $membership['mobile1'];?>" class="form-control" id="exampleInputName1" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Mobile 2</label>
                                <input type="text" name="mobile2" value="<?php echo $membership['mobile2'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputPhone1">Email</label>
                                <input type="email" name="email" value="<?php echo $membership['email'];?>" class="form-control" id="exampleInputPhone1" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone2">Home Town</label>
                                <input type="text" name="hometown" value="<?php echo $membership['hometown'];?>" class="form-control" id="exampleInputPhone2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputPhone1">State</label>
                                <input type="text" name="state" value="<?php echo $membership['state'];?>" class="form-control" id="exampleInputPhone1" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone2">Country</label>
                                <select name="country" class="form-control">
                                    <option value="<?php echo $membership['countryID'];?>"><?php echo $membership['country'];?></option>
                                    <?php foreach ($country as $r):?>
                                        <option value="<?php echo $r->countryID;?>"><?php echo $r->country;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <input type="text" name="address" value="<?php echo $membership['address'];?>" class="form-control" id="exampleInputAddress" />
                        </div>

                        <div class="row narrow-gutter">
                            <input type="hidden" name="profile-tab" value="2">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-block">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" name="submit" value="<?php echo $button;?>" class="btn btn-app btn-block">Save<span class="hidden-xs"> changes</span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End profile tab 2 -->

                <!-- Profile tab 3 -->
                <div class="tab-pane fade" id="profile-tab3">
                    <form class="fieldset" method="post" action="index.php" enctype="application/x-www-form-urlencoded">
                        <h4 class="m-t-sm m-b">Association info</h4>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Position</label>
                                <select name="position" required class="form-control">
                                    <option value="<?php echo $membership['positionID'];?>"><?php echo $membership['position'];?></option>
                                    <?php foreach ($position as $r):?>
                                    <option value="<?php echo $r->positionID;?>"><?php echo $r->position;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Groups</label>
                                <select name="groups" required class="form-control">
                                    <option value="<?php echo $membership['groupID'];?>"><?php echo $membership['group'];?></option>
                                    <?php foreach ($group as $r):?>
                                        <option value="<?php echo $r->groupID;?>"><?php echo $r->groups;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputPhone1">Branch</label>
                                <select name="branch" required class="form-control">
                                    <option value="<?php echo $membership['branchID'];?>"><?php echo $membership['branch'];?></option>
                                    <?php foreach ($branch as $r):?>
                                        <option value="<?php echo $r->branchID;?>"><?php echo  $r->branch;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputPhone2">Status</label>
                                <select name="status" required class="form-control">
                                    <option value="<?php echo $membership['statusID'];?>"><?php echo $membership['status'];?></option>
                                    <option value="1">Present</option>
                                    <option value="2">Left Church</option>
                                    <option value="3">Missing</option>
                                    <option value="4">Late</option>
                                </select>
                            </div>
                        </div>

                        <div class="row narrow-gutter">
                            <input type="hidden" name="profile-tab" value="3">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-block">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" name="submit" value="<?php echo $button;?>" class="btn btn-app btn-block">Save<span class="hidden-xs"> changes</span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End profile tab 3 -->
            </div>
            <!-- .card-block .tab-content -->
        </div>
        <!-- .card -->
    </div>
    <!-- .col-md-8 -->
</div>
<!-- .row -->