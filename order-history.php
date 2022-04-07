<?php
    include_once 'header.php';
    include_once './include/db_handler.php';
?>
    <style>
        <?php include 'styles/order-history.css' ?>
    </style>

    <div class="container-lg">
        <h2>Order History</h2>
        <div id="btnContainer">
            <button class="orderhistory_btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
            <button class="orderhistory_btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
        </div>
        <br>






    </div>


    <script>
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
        var btns = container.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

<?php
    include_once 'footer.php';
?>