<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 12/08/2019
 * Time: 8:39 AM
 */
?>
<!-- Invoice -->
<div class="card">
        <div class="card-header">
            <ul class="card-actions">
                <li>
                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                    <button type="button" onclick="App.initHelper( 'print-page' );"><i class="ion-printer m-r-xs"></i> Print Invoice</button>
                </li>
            </ul>
        </div>
        <div class="card-block">
            <!-- Invoice Info -->
            <div class="row">
                <!-- Company Info -->
                <div class="col-xs-6 col-sm-4 col-lg-3">
                    <p class="h3">Financial Report</p>
                    <p class="h5">Start Date:<?php echo $_GET['start'];?></p>
                    <p class="h5">End Date:<?php echo $_GET['end'];?></p>
                </div>
                <!-- End Company Info -->
            </div>
            <!-- End Invoice Info -->

            <!-- Table -->
            <div class="table-responsive m-y-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;"></th>
                        <th>Income Details</th>
                        <th class="text-center" style="width: 100px;">Books</th>
                        <th class="text-right w-10">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($income as $row):
                            if(isset($serial_i)){
                                $serial_i = $serial_i + 1;
                            }else{
                                $serial_i = 1;
                            }

                            if($row->type == 1){
                                $type = "Cash";
                            }else{
                                $type = "Bank";
                            }

                            if($row->book == 1){
                                $title = "Tithe";
                            }else{
                                $bookID = $row->book;
                                $book['endpoint'] = "books";
                                $books = config\connection($book);
                                $books = json_decode($books,true);
                                foreach($books as $bk_id){
                                    if($bk_id['book_id'] == $bookID){
                                        $title = $bk_id['title'];
                                    }
                                }
                            }

                            echo"
                                <tr>
                                    <td class='text-center'>{$serial_i}</td>
                                    <td>
                                        <p class='font-500 m-b-0'>{$title}</p>
                                    </td>
                                    <td class='text-center'>{$type}</td>
                                    <td class='text-right'>{$row->income}</td>
                                </tr>
                            ";
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive m-y-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;"></th>
                        <th>Expenses Details</th>
                        <th class="text-center" style="width: 100px;">Books</th>
                        <th class="text-right w-10">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($expenses as $row):
                        if(isset($serial_e)){
                            $serial_e = $serial_e + 1;
                        }else{
                            $serial_e = 1;
                        }

                        if($row->type == 1){
                            $type = "Cash";
                        }else{
                            $type = "Bank";
                        }

                        if($row->book == 1){
                            $title = "Tithe";
                        }else{
                            $bookID = $row->book;
                            $book['endpoint'] = "books";
                            $books = config\connection($book);
                            $books = json_decode($books,true);
                            foreach($books as $bk_id){
                                if($bk_id['book_id'] == $bookID){
                                    $title = $bk_id['title'];
                                }
                            }
                        }

                        echo"
                                <tr>
                                    <td class='text-center'>{$serial_e}</td>
                                    <td>
                                        <p class='font-500 m-b-0'>{$title}</p>
                                    </td>
                                    <td class='text-center'>{$type}</td>
                                    <td class='text-right'>{$row->expenses}</td>
                                </tr>
                            ";
                    endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <hr class="hidden-print">
            <p class="text-muted text-center"><small>Thank you very much for doing business with us. We will happy to work with you again!</small></p>
            <!-- End Footer -->
        </div>
    </div>
<!-- End Invoice -->