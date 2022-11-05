<head>
    <script>
        function getOrdId() {
            if (sessionStorage.getID)
            {
                const ordid_input = document.getElementById("ordid");
                ordid_input.value = sessionStorage.getID;
                sessionStorage.clear(); // clear the session storage 
                document.getElementById('deleteForm').submit(); // auto SUBMIT FORM
            }
            else
            {
                alert("Please choose a order record to be deleted.");
                window.location.replace("/orders.php"); // redirect to users when there is no member id
            }
        }
        window.onload = getOrdId;
    </script>
</head>
<body>
    <form action = "delete-order.php" method = "post" id = "deleteForm">
        <input type='hidden' name = 'ordid' id='ordid'/> 
    </form>
<?php
// remove all session variables
session_unset();
?>