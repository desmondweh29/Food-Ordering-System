<?php
include_once 'header.php';
?>

<form action="" method="post">
        <div class="container-lg">
            <div class=card mb-3" id="details">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-6">
                        <img src="images/checkout-bg2.jpg" class="img-fluid rounded-start" id="order-bg" alt="bg.png">
                    </div>
                    <!-- End of .col-md-6 .col-lg-6  -->

                    <div class="col-md-6 col-lg-6 p-3">
                        <div class="card-body">
                            <h5 class="card-title h3 mb-5 fw-bold">Order Details</h5>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="customerName" placeholder="Zhe Kai"
                                        required>
                                    <label for="customerName">Name</label>
                                </div>
                                <!-- End of .form-floating  -->
                            </div>
                            <!-- End of .mb-3  -->

                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="customerContact"
                                        placeholder="0123456789" required>
                                    <label for="customerContact">Contact Number</label>
                                </div>
                                <!-- End of .form-floating  -->
                            </div>
                            <!-- End of .mb-4  -->

                            <label for="typeOption" class="form mb-2">Type</label>
                            <!-- <p class="mb-2 ">Type</p> -->
                            <div class="mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="typeOption" id="takeAway"
                                        value="takeAway" checked>
                                    <label class="form-check-label" for="takeAway">Take Away</label>
                                </div>
                                <!-- End of .form-check form-check-inline  -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="typeOption" id="delivery"
                                        value="delivery">
                                    <label class="form-check-label" for="delivery">Delivery</label>
                                </div>
                                <!-- End of .form-check form-check-inline  -->
                            </div>
                            <!-- End of .mb-4  -->
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="Milo Ice tak mau Ice"
                                    id="customerRemarks"></textarea>
                                <label for="customerRemarks">Remarks</label>
                            </div>
                            <!-- End of .form-floating .mb-4  -->

                            <div class="d-flex justify-content-center">
                                <div class="col-8 col-lg-9">
                                    <button class="btn btn-secondary order-btn" id="left-order-btn"
                                        type="reset">Back</button>
                                </div>
                                <!-- End of .col-8 .col-lg-9  -->
                                <div class="col-4 col-lg-3">
                                    <button class="btn btn-primary order-btn" id="right-order-btn" type="submit">Make
                                        Order</button>
                                </div>
                                <!-- End of .col-4 .col-lg-3  -->
                            </div>
                            <!-- End of .d-flex .justify-content-center -->
                        </div>
                        <!-- End of .card-body -->
                    </div>
                    <!-- End of .col-md-6 .col-lg-6 .p-3  -->
                </div>
                <!-- End of .row .g-0  -->
            </div>
            <!-- End of #details .card .mb-3  -->
        </div>
        <!-- End of .container-lg  -->
    </form>
    <!-- End of form  -->

<?php
include_once 'footer.php';
?>