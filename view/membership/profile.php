<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 7:57 PM
 */

?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <ul class="nav nav-tabs nav-stacked">
                <li class="active">
                    <a href="#profile-tab1" data-toggle="tab">Church Profile</a>
                </li>
                <li>
                    <a href="#profile-tab2" data-toggle="tab">Account Details</a>
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
                    <form class="fieldset" method="post" action="index.php" enctype="application/x-www-form-urlencoded">
                        <h4 class="m-t-sm m-b">User Account info</h4>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Church Name</label>
                                <input type="text" name="name" value="<?php echo $profile['fname'];?>" class="form-control" id="exampleInputName1" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Church Prefix</label>
                                <input type="text" name="surname" value="<?php echo $profile['surname'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Church Name</label>
                                <input type="text" name="church" value="<?php echo $profile['church'];?>" class="form-control" id="exampleInputName1" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Church Prefix</label>
                                <input type="text" name="prefix" value="<?php echo $profile['prefix'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Mobile</label>
                                <input type="text" name="mobile" value="<?php echo $profile['mobile'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Email</label>
                                <input type="text" name="email" value="<?php echo $profile['email'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="exampleInputName2">Website</label>
                                <input type="text" name="website" value="<?php echo $profile['website'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="exampleInputName2">Address</label>
                                <input type="text" name="address" value="<?php echo $profile['address'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>

                        <div class="row narrow-gutter">
                            <input type="hidden" name="profile-tab" value="1">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-block">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" name="submit" value="update-church" class="btn btn-app btn-block">Save<span class="hidden-xs"> changes</span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End profile tab 1 -->

                <!-- Profile tab 2 -->
                <div class="tab-pane fade" id="profile-tab2">
                    <form class="fieldset" method="post" action="index.php" enctype="application/x-www-form-urlencoded">
                        <h4 class="m-t-sm m-b">Login Details</h4>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">Username</label>
                                <input type="text" name="username" value="<?php echo $profile['username'];?>" class="form-control" id="exampleInputName1" />
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputName2">Password</label>
                                <input type="password" name="password" value="<?php echo $profile['password'];?>" class="form-control" id="exampleInputName2" />
                            </div>
                        </div>

                        <div class="row narrow-gutter">
                            <input type="hidden" name="profile-tab" value="2">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-block">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" name="submit" value="update-church" class="btn btn-app btn-block">Save<span class="hidden-xs"> changes</span></button>
                            </div>
                        </div>
                    </form>
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
