<?php
    include_once 'header.php';
    include_once './include/db_handler.php';

    if (isset($_SESSION["accountID"]))
    {
        $accountID = $_SESSION["accountID"];
    }
?>

<style>
        <?php include 'styles/menu.css' ?>
</style>


<div class="container-lg position-relative">
    <div class="row g-2" id="spacer-2">
        <?php
            // build the query to display all data from table food_order
            $query = "SELECT * FROM food WHERE category = 'Culinary'";

            // execute the query
            if(!($result = mysqli_query($conn, $query)))
            {
                echo "<p>Could not execute query</p>";
                die(mysqli_error($conn) . "</body></html>");
            }
            $count = 0; 
            while ($row = mysqli_fetch_assoc($result)) 
            {
        ?>
        <div class="col-lg-4 col-md-5 mx-4 filterDiv culinary"> 
            <form action="./include/menu-addcart.handler.php" method="POST">
            <div class="card menu-card">
                <div class="card-img-top">
                    <img class="food-img" src="images/<?php echo $row["image"]?>"  alt="...">
                </div>
                <div class="card-body">
                    <input type="test" name="name" value="<?php echo $row["name"]?>" hidden/>
                    <input type="test" name="category" value="<?php echo $row["category"]?>" hidden/>
                    <input type="test" name="price" value="<?php echo $row["price"]?>" hidden/>                 <h5 class="card-title"><?php echo $row["name"]?></h5>
                    <h6><b><span>Price: RM</span><span class="price-font"><?php echo $row["price"]?></span></b></h6>
                    <div class="food-desc">
                        <p class="card-text"><?php echo $row["description"]?></p>
                    </div>

                    <?php
                        if (isset($_SESSION["accountID"])) {
                    ?>
                    
                    
                        <span class="col-6">
                            <div class="btn-group position-static bottom-0 start-50 translate-x">
                                <!-- <button type="button" class="btn bi-dash-circle" onclick="decrementValue()" value="-" data-type="minus"></button> -->
                                <input type="number" class="form-control input-number" name="quantity" value="1" maxlength="2" min="1" max="10" size="1">
                                <!-- <button type="button" class="btn bi-plus-circle" onclick="incrementValue()" value="+" data-type="plus"></button> -->
                            </div>
                            <!-- End of .btn-group  -->
                        </span>
                        <!-- End of .col-6  -->
                        <span class="addtoorder-btn">
                            <button type="submit" class="btn btn-primary" name="addtoorder">Add to Order</button>
                        </span>
                        <!-- End of .col-6  -->
                    

                    <?php
                        }
                    ?>
                </div>
                <!-- End of .card-body  -->
            </div>
            </form>
            <!-- End of .card  -->
        </div>
        
        <?php
                $count = $count + 1;
                if ($count%2 == 0) {
                    echo "<div class=\"w-100 filterDiv culinary\"></div>";
                }
            }
        ?>

        <?php
            // build the query to display all data from table food_order
            $query = "SELECT * FROM food WHERE category = 'Beverage'";

            // execute the query
            if(!($result = mysqli_query($conn, $query)))
            {
                echo "<p>Could not execute query</p>";
                die(mysqli_error($conn) . "</body></html>");
            }

            $count = 0; 
            while ($row = mysqli_fetch_assoc($result)) 
            {
        ?>
                <div class="col-lg-4 col-md-5 mx-4 filterDiv beverages">
                    <form action="./include/menu-addcart.handler.php" method="POST"> 
                    <div class="card menu-card">
                        <div class="card-img-top">
                            <img class="food-img" src="images/<?php echo $row["image"]?>"  alt="...">
                        </div>
                        <div class="card-body">
                          <input type="test" name="name" value="<?php echo $row["name"]?>" hidden/>
                          <input type="test" name="category" value="<?php echo $row["category"]?>" hidden/>
                           <input type="test" name="price" value="<?php echo $row["price"]?>" hidden/>
                            <h5 class="card-title"><?php echo $row["name"]?></h5>
                            <h6><b><span>Price: RM</span><span class="price-font"><?php echo $row["price"]?></span></b></h6>
                            <div class="food-desc">
                                <p class="card-text"><?php echo $row["description"]?></p>
                            </div>
                            

                            <?php
                                if (isset($_SESSION["accountID"])) {
                            ?>
                            
                            
                                <span class="col-6">
                                    <div class="btn-group position-static bottom-0 start-50 translate-x">
                                        <!-- <button type="button" class="btn bi-dash-circle" onclick="decrementValue()" value="-" data-type="minus"></button> -->
                                        <input type="number" class="form-control input-number" name="quantity" value="1" maxlength="2" min="1" max="10" size="1">
                                        <!-- <button type="button" class="btn bi-plus-circle" onclick="incrementValue()" value="+" data-type="plus"></button> -->
                                    </div>
                                    <!-- End of .btn-group  -->
                                </span>
                                <!-- End of .col-6  -->
                                <span class="addtoorder-btn">
                                    <button type="submit" class="btn btn-primary" name="addtoorder">Add to Order</button>
                                </span>
                                <!-- End of .col-6  -->
                            

                            <?php
                                }
                            ?>
                        </div>
                        <!-- End of .card-body  -->
                    </div>
                    <!-- End of .card  -->
                    </form>
                </div>
        
        <?php
                $count = $count + 1;
                if ($count%2 == 0) {
                    echo "<div class=\"w-100 filterDiv beverages\"></div>";
                }
            }
        ?>

        <?php
            // build the query to display all data from table food_order
            $query = "SELECT * FROM food WHERE category = 'Snacks'";

            // execute the query
            if(!($result = mysqli_query($conn, $query)))
            {
                echo "<p>Could not execute query</p>";
                die(mysqli_error($conn) . "</body></html>");
            }
            $count = 0; 
            while ($row = mysqli_fetch_assoc($result)) 
            {
        ?>
        <div class="col-lg-4 col-md-5 mx-4 filterDiv snacks"> 
            <form action="./include/menu-addcart.handler.php" method="POST">
            <div class="card menu-card">
                <div class="card-img-top">
                    <img class="food-img" src="images/<?php echo $row["image"]?>"  alt="...">
                </div>
                <div class="card-body">
                    <input type="test" name="name" value="<?php echo $row["name"]?>" hidden/>
                    <input type="test" name="category" value="<?php echo $row["category"]?>" hidden/>
                    <input type="test" name="price" value="<?php echo $row["price"]?>" hidden/>
                    <h5 class="card-title"><?php echo $row["name"]?></h5>
                    <h6><b><span>Price: RM</span><span class="price-font"><?php echo $row["price"]?></span></b></h6>
                    <div class="food-desc">
                        <p class="card-text"><?php echo $row["description"]?></p>
                    </div>

                    <?php
                        if (isset($_SESSION["accountID"])) {
                    ?>
                    
                    
                        <span class="col-6">
                            <div class="btn-group position-static bottom-0 start-50 translate-x">
                                <!-- <button type="button" class="btn bi-dash-circle" onclick="decrementValue()" value="-" data-type="minus"></button> -->
                                <input type="number" class="form-control input-number" name="quantity" value="1" maxlength="2" min="1" max="10" size="1">
                                <!-- <button type="button" class="btn bi-plus-circle" onclick="incrementValue()" value="+" data-type="plus"></button> -->
                            </div>
                            <!-- End of .btn-group  -->
                        </span>
                        <!-- End of .col-6  -->
                        <span class="addtoorder-btn">
                            <button type="submit" class="btn btn-primary" name="addtoorder">Add to Order</button>
                        </span>
                        <!-- End of .col-6  -->
                    

                    <?php
                        }
                    ?>
                </div>
                <!-- End of .card-body  -->
            </div>
            </form>
            <!-- End of .card  -->
        </div>
        
        <?php
                $count = $count + 1;
                if ($count%2 == 0) {
                    echo "<div class=\"w-100 filterDiv snacks\"></div>";
                }
            }
        ?>
      

    <div class="position-absolute float-end top-0 end-0" id ="menu-rightbar-container">
        <div class="col-12 col-lg-12 ">
            <div id="menu-nav">
                <div id="menufilter" class="list-group">
                    <button class="list-group-item list-group-item-action filterbtn" onclick="filterSelection('all')">Show all</button>
                    <button class="list-group-item list-group-item-action filterbtn" onclick="filterSelection('culinary')">Culinary</button>
                    <button class="list-group-item list-group-item-action filterbtn" onclick="filterSelection('beverages')">Beverages</button>
                    <button class="list-group-item list-group-item-action filterbtn" onclick="filterSelection('snacks')">Snacks</button>
                </div>
                <!-- End of .list-group  -->
            </div>
            <!-- End of #menu-nav -->

            <?php
                if (isset($_SESSION["accountID"])) {
            ?>

            <div class="card" id="order-list">
                <div class="checkout-body">
                    <h5 class="card-title">Your Order</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk
                        of
                        the card's content.</p>
                    <!-- <br> -->
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <!-- End of thead  -->
                        <tbody>
                            <?php
                            require_once './include/db_handler.php';
                            $email = $_SESSION["email"];
                            $userID = $_SESSION['accountID'];

                            $cartArray = array();//2d array 
                            $rowKey = 0;
                            $totalPrice =0;
                            $cartQuery="SELECT * FROM cart where accountID = '$userID'";

                            //if statement
                            $cartResult=mysqli_query($conn,$cartQuery);
                            $cartArray = mysqli_fetch_all($cartResult,MYSQLI_ASSOC);
                            if(!$cartResult){
                                header("location: ./ordercart.php?error=didnotwork");
                                exit();
                            }

                            foreach ($cartArray as $key => $value) {
                                echo "<tr>";
                                echo "<th scope='row'>1</th>";
                                echo "<td>".$cartArray[$key]['M_Name']."</td>";
                                echo "<td>".$cartArray[$key]['M_Quantity']."</td>";
                                echo "<td>".$cartArray[$key]['M_Price']."</td>";
                                $totalPrice = $totalPrice + $cartArray[$key]['M_Price']*$cartArray[$key]['M_Quantity'];
                                //echo "<td id=''>  ".$totalPrice." </td>";
                                echo "</tr>";

                            }
                            $totalPrice = number_format($totalPrice,2);
                            $_SESSION["totalPrice"]= $totalPrice;
                            ?>

                        </tbody>
                        <!-- End of tbody  -->
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3">Total (RM) :</th>
                                <?php echo "<th> $totalPrice </th>"?>
                            </tr>
                            <tr>
                                <form action="./include/orderCart_handler.php" method="POST">
                                <th colspan="2"><button type="submit" name="orderNow" class="btn btn-primary order-btn1">Order Now</button>
                                </th>
                                <th colspan="2"><button type="submit" name="clearList" class="btn btn-danger order-btn1">Clear List</button>
                                </th>
                                </form>     
                            </tr>
                        </tfoot>
                        <!-- End of tfoot  -->
                    </table>
                    <!-- End of .table .table-borderless -->
                </div>
                <!-- End of .card-body -->
            </div>
            <!-- End of #order-list .card  -->
            <?php
                } else {
            ?>

                <div class="card" id="spacer-1">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-4">Login or Register</h5>
                        <h7 class="card-text mb-4">Looks like you are not logged in.</h7>
                        <p class="card-text mb-4">Do <a href="login.php">login</a> or <a href="register.php">register</a> now to start ordering our yummy food!</p>
                        
                    </div>
                    <!-- End of .card-body -->
                </div>
                <!-- End of #spacer-1 .card  -->

            <?php
                }
            ?>


        </div>
        <!-- End of .col-12 .col-lg-12  -->
    </div>
    <!-- End of .position-absolute .float-end .top-0 .end-0 -->
</div>
<!-- End of .container-lg .position-relative -->

<script>
    <?php include 'scripts/menu.js' ?>
</script>

<?php
include_once 'footer.php';
?>