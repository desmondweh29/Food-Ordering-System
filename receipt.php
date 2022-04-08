<?php
    include_once 'header.php';
    include_once './include/db_handler.php';
?>

<div id="section-1" class="container-lg">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-lg-5 col-md-6">
                <img src="images/receipt-bg1.jpg" id="receipt-bg" class="img-fluid rounded-start" alt="bg.png">
            </div>
            <!-- End of .col-lg-5 col-md-6 -->
            <div class="col-lg-7 col-md-6">
                <div class="card-body">
                    <h4 class="text-center mt-5 mb-5 text-capitalize">Thank You! <br> Your yummy order has been received
                        by
                        our kitchen!</h4>
                    <?php
                        if (isset($_GET["orderID"])) {
                            $orderID = $_GET["orderID"];
                            // build the query to display all data from table food_order
                            $query = "SELECT * FROM food_order WHERE orderID = $orderID";

                            // execute the query
                            if(!($result = mysqli_query($conn, $query)))
                            {
                                echo "<p>Could not execute query</p>";
                                die(mysqli_error($conn) . "</body></html>");
                            }
                            $row = mysqli_fetch_assoc($result)
                    ?>
                    <h5 class="card-title fw-bold fs-2 mb-5 text-center">Order Receipt</h5>

                    <table class="table table-borderless mx-auto w-auto fs-6">
                        <tbody>
                            <tr>
                                <th scope="col">Order ID</th>
                                <td>:</td>
                                <td><?php echo $row["orderID"]?></td>
                            </tr>
                            <tr>
                                <th scope="col">Name</th>
                                <td>:</td>
                                <td><?php echo $row["customer_name"]?></td>
                            </tr>
                            <tr>
                                <th scope="col">Contact Number</th>
                                <td>:</td>
                                <td><?php echo $row["telno"]?></td>
                            </tr>
                            <tr>
                                <th scope="col">Food</th>
                                <td>:</td>
                                <td><?php echo $row["food"]?></td>
                            </tr>
                            <tr>
                                <th scope="col">Date</th>
                                <td>:</td>
                                <td><?php echo date_format(date_create($row["date"]),"d F Y")?></td>
                            </tr>
                            <tr>
                                <th scope="col">Time</th>
                                <td>:</td>
                                <td><?php echo date_format(date_create($row["time"]),"g:i a")?></td>
                            </tr>
                            <tr>
                                <th scope="col">Price (RM)</th>
                                <td>:</td>
                                <td><?php echo $row["price"]?></td>
                            </tr>
                            <tr>
                                <th scope="col">Type</th>
                                <td>:</td>
                                <td><?php echo $row["type"]?></td>
                            </tr>
                            <tr>
                                <th scope="col">Address</th>
                                <td>:</td>
                                <td><?php echo $row["address"]?></td>
                            </tr>

                            <tr>
                                <th scope="col">Remarks</th>
                                <td>:</td>
                                <td><?php echo $row["remarks"]?></td>
                            </tr>
                        </tbody>
                        <!-- End of tbody  -->
                    </table>
                    <div class="text-center mt-5">
                        <button type="button" class="btn btn-primary" onclick="document.location='menu.php'">Order Again</button>
                        <button type="button" class="btn btn-primary offset-lg-1" onclick="document.location='index.php'">Return Home</button>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- End of .table .table-borderless mx-auto w-auto  -->
                </div>
                <!-- End of .card-body  -->
            </div>
            <!-- End of .col-lg-7 .col-md-6  -->
        </div>
        <!-- End of .row .g-0  -->
    </div>
    <!-- End of .card .mb-3  -->
</div>
<!-- End of #section-1.container-lg  -->

<?php
include_once 'footer.php';
?>