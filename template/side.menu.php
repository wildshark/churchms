<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 09/05/2019
 * Time: 12:31 AM
 */
?>
<li class="nav-item nav-drawer-header">Memu</li>

<li class="nav-item active">
    <a href="?_route=dashboard"><i class="ion-ios-speedometer-outline"></i> Dashboard</a>
</li>

<li class="nav-item">
    <a href="?_route=new.member"><i class="ion-android-person-add"></i>New Member</a>
</li>

<li class="nav-item nav-drawer-header">Components</li>

<li class="nav-item">
    <a href="?_route=list.member"><i class="ion-android-people"></i>Member List</a>
</li>

<li class="nav-item nav-item-has-subnav">
    <a href="javascript:void(0)"><i class="ion-ios-compose-outline"></i>Tithe </a>
    <ul class="nav nav-subnav">

        <li>
            <a href="#" data-toggle="modal" data-target="#tithe">Tithe Payment</a>
        </li>

        <li>
            <a href="?_route=tithe-data">Tithe Sheet</a>
        </li>

    </ul>
</li>

<li class="nav-item nav-item-has-subnav">
    <a href="javascript:void(0)"><i class="ion-ios-compose-outline"></i>Fundraising</a>
    <ul class="nav nav-subnav">

        <li>
            <a href="#" data-toggle="modal" data-target="#fundraising">Fundraising Entry</a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#add-raise-payment">Payment Entry</a>
        </li>
        <li>
            <a href="?_route=fundraising-data">Fundraising Book</a>
        </li>

    </ul>
</li>

<li class="nav-item nav-item-has-subnav">
    <a href="javascript:void(0)"><i class="ion-ios-compose-outline"></i>Book Keeping</a>
    <ul class="nav nav-subnav">

        <li>
            <a href="#" data-toggle="modal" data-target="#income">Income Entry</a>
        </li>

        <li>
            <a href="#" data-toggle="modal" data-target="#expense">Expense Entry</a>
        </li>

        <li>
            <a href="?_route=cash.book">Cash Book</a>
        </li>

        <li>
            <a href="?_route=bank.book">Bank Book</a>
        </li>

        <li>
            <a href="#" data-toggle="modal" data-target="#financial-report">Financial Report</a>
        </li>

    </ul>
</li>

<li class="nav-item nav-item-has-subnav">
    <a href="javascript:void(0)"><i class="ion-ios-list-outline"></i> Messenger</a>
    <ul class="nav nav-subnav">

        <li>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#sms-modal">SMS</a>
        </li>

        <li>
            <a href="?_route=email">Email</a>
        </li>
    </ul>
</li>

<li class="nav-item nav-item-has-subnav">
    <a href="javascript:void(0)"><i class="ion-android-settings"></i> setup</a>
    <ul class="nav nav-subnav">

        <li>
            <a href="?_route=set.book.keeping">Book-keeping</a>
        </li>

        <li>
            <a href="?_route=set.church">Church</a>
        </li>

        <li>
            <a href="?_route=set.sms">Purchase SMS</a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="?_route=donation"><i class="ion-ios-home"></i>Donate</a>
</li>