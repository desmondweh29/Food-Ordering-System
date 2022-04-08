<?php
include_once 'header.php';
?>
<style>
    .error {
        color: red;
    }

    .activate {
        display: block;
    }

    .deactivate {
        display: none;
    }

    textarea {
        resize: none;
    }
</style>

<form action="./include/orderCheckout_handler.php" method="post" name="checkOutForm">


        <div class="container-lg"  id="section-1">
            <div class="card mb-3" id="details">
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
                                    <input type="text" class="form-control" name="customer_name" placeholder="Zhe Kai"
                                        required>
                                    <label for="customerName">Name</label>
                                </div>
                                <!-- End of .form-floating  -->
                            </div>
                            <!-- End of .mb-3  -->

                            <div class="mb-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="telno" placeholder="012-2345679"
                                    pattern="[0-9]{2,3}-[0-9]{6,8}" required>
                                    <label for="customerContact">Contact Number (Format: xxx-xxxxxxxx)</label>
                                </div>
                                <!-- End of .form-floating  -->
                            </div>
                            <!-- End of .mb-4  -->

                            <label for="typeOption" class="form mb-2">Type</label>
                            <!-- <p class="mb-2 ">Type</p> -->
                            <div class="mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" onchange="handleChange(this);" checked
                                        value="Pick up">
                                    <label class="form-check-label" for="Pick up">Pick up</label>
                                </div>
                                <!-- End of .form-check form-check-inline  -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" onchange="handleChange(this);"
                                        value="Delivery">
                                    <label class="form-check-label" for="delivery">Delivery</label>
                                </div>
                                <!-- End of .form-check form-check-inline  -->
                            </div>

                            <div id="address_input" class="mb-4 deactivate">
                                <div class="form-floating">
                                    <input id="address_value" type="text" class="form-control" name="address" placeholder="No29">
                                    <label for="customerAddress">Address (For delivery only)</label>
                                </div>
                                <!-- End of .form-floating  -->
                            </div>
                            <!-- End of .mb-4  -->

                            <!-- End of .mb-4  -->
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="Milo Ice tak mau Ice"
                                    name="remarks"></textarea>
                                <label for="customerRemarks">Remarks</label>
                            </div>
                            <!-- End of .form-floating .mb-4  -->

                            <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "stmtfailed") {
                                    echo "<span class=\"error\">Order failed, try again!</span>";
                                }
                            }
                            else
                            {
                                echo "<br>";
                            }
                            ?>

                            <div class="d-flex justify-content-center">
                                <div class="col-8 col-lg-9">
                                    <button class="btn btn-secondary order-btn" id="left-order-btn"
                                        type="reset" onclick="document.location='menu.php'">Back</button>
                                </div>
                                <!-- End of .col-8 .col-lg-9  -->
                                <div class="col-4 col-lg-3">
                                    <button class="btn btn-primary order-btn" id="right-order-btn" name="makeOrder" type="submit">Make
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
    
    <script>
        const input = document.getElementById("address_input");
        function handleChange(src) {
                var address = document.getElementById("address_value");

                if (src.value == "Pick up") {
                    input.className = input.className.replace("activate", "deactivate");
                    address.value = "";
                    address.removeAttribute("required");
                }
                if (src.value == "Delivery") {
                    input.className = input.className.replace("deactivate", "activate");
                    address.setAttribute("required", "")
                }
            }
    </script>

<?php
include_once 'footer.php';
?>