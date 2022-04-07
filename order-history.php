<?php
    include_once 'header.php';
    include_once './include/db_handler.php';
    $accountID = $_SESSION["accountID"];

    // build the query to display all data from table food_order
    $query = "SELECT * FROM food_order WHERE accountID = $accountID;";

    // execute the query
    if(!($result = mysqli_query($conn, $query)))
    {
        echo "<p>Could not execute query</p>";
        die(mysqli_error($conn) . "</body></html>");
    }
?>
    <style>
        <?php include 'styles/order-history.css' ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="container-lg">
        <div class="title">
            <h2>Order History</h2>
        </div>

        <?php
            if (mysqli_num_rows($result) == 0) {
                echo "<h3 class=\"error\">You have not make any order.<br>Come back again when you have ordered some yummy food!</h3>";
            } else {
        ?>

        <div id="btnContainer">
            <button class="orderhistory_btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
            <button class="orderhistory_btn orderhistory_btn_active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
        </div>
        <br>

        <?php
            }
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) 
            {
                if ($count%2 != 0) {
                    echo "<div class=\"row\">";
                }

                echo "
                <div class=\"column\">
                <h2>Order $count</h2>
                <table>
                    <tr>
                        <th>Order ID: </th>
                        <td>" . $row["orderID"] . "</td>
                    </tr>

                    <tr>
                        <th>Email: </th>
                        <td>" . $row["email"] . "</td>
                    </tr>

                    <tr>
                        <th>Name: </th>
                        <td>" . $row["customer_name"] . "</td>
                    </tr>

                    <tr>
                        <th>Contact number: </th>
                        <td>" . $row["telno"] . "</td>
                    </tr>

                    <tr>
                        <th>Type: </th>
                        <td>" . $row["type"] . "</td>
                    </tr>

                    <tr>
                        <th>Address: </th>
                        <td>" . $row["address"] . "</td>
                    </tr>

                    <tr>
                        <th>Date & Time: </th>
                        <td>". date_format(date_create($row["date"]),"d F Y") . ", " . date_format(date_create($row["time"]),"g:i a"). "</td>
                    </tr>

                    <tr>
                        <th>Food: </th>
                        <td>" . $row["food"] . "</td>
                    </tr>

                    <tr>
                        <th>Price (RM): </th>
                        <td>" . $row["price"] . "</td>
                    </tr>

                    <tr>
                        <th>Remarks: </th>
                        <td>" . $row["remarks"] . "</td>
                    </tr>
                </table>
                </div>
                ";

                if ($count%2 == 0) {
                    echo "</div>";
                }
                $count = $count + 1;
            }
        ?>
    </div>


    <script>
        // FORMATE DATES
        const monthnames = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        function formatDate(dateString) {
            let date = new Date(dateString);
            return `${date.getDate()} ${monthnames[date.getMonth()]}`;
        }

        // Get the elements with class="column"
        var elements = document.getElementsByClassName("column");

        // Declare a loop variable
        var i;

        // List View
        function listView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "100%";
            }
        }

        // Grid View
        function gridView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "50%";
            }
        }

        /* Optional: Add active class to the current button (highlight it) */
        var container = document.getElementById("btnContainer");
        var btns = container.getElementsByClassName("orderhistory_btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("orderhistory_btn_active");
                current[0].className = current[0].className.replace(" orderhistory_btn_active", "");
                this.className += " orderhistory_btn_active";
            });
        }
    </script>

<?php
    include_once 'footer.php';
?>