<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Maker - by Tour India</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body style="padding-top: 60px;">
    <!-- Navbar -->
    <nav class="navbar glass" style="height: 70px">
        <span><a href="index.html" style="display: flex; align-items: center"><img class="img2"
                    src="./img/Tour-india-logo.jpg" width="40" style="margin: -25px -10px -25px -20px" />
                <h1 class="logo">&nbsp;TOUR-INDIA</h1>
            </a></span>
        <ul class="nav-links">
            <li><a href="index.html" id="pri" class="cir_border">Home</a></li>
            <li><a href="#" id="pri" class="cir_border">About</a></li>
            <li><a href="#" id="pri" class="cir_border">help</a></li>            
        </ul>
        <img src="./img/menu-btn.png" alt="" class="menu-btn" />
    </nav>

    <!-- Main Content Wrapper -->
    <?php
include("connection.php");


// Query to fetch all tour plans
$sql = "SELECT * FROM tour_plans";
$result = $conn->query($sql);
?>


    <style>
        body {
            color: black;
            font-family: Arial, sans-serif;
            background:rgb(0, 0, 0);
            margin: 20px;
        }
        table {
            font-family:Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            background:rgb(144, 160, 165);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        th {
            background: #1f5566;
            color: white;
        }
        h2 {
            text-align: center;
            color:rgb(255, 255, 255);
        }
        tr:hover {
            background:rgb(168, 192, 190);
        }
        pre {
            white-space: pre-wrap;
            font-family: inherit;
        }
    </style>
</head>
<body>
<h2>Explore Tour Plans Across India</h2>

<table>
    <tr>
        <th>SR NO.</th>
        <th>Place Name</th>
        <th>Cost (INR)</th>
        <th>Tour Plan</th>
        <th>Let's Go</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM `tour_plans`");
    $n1 = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $modalId = "viewmodal_" . $row['destination']; // Unique modal ID
            ?>

            <tr>
                <td><?= $n1; ?></td>
                <td><?= htmlspecialchars($row["destination"]); ?></td>
                <td>₹<?= number_format($row["estimated_cost"]); ?></td>
                <td><pre><?= htmlspecialchars($row["tour_plan"]); ?></pre></td>
                <td>
                    <a href="login.php?tour_id=<?= $row['id'] ?>"> 
                        <button type="button" class="ctn">
                           Book Tour
                        </button>
                    </a>
                </td>                          

            <?php
            $n1++;
        }
    } else {
        echo "<tr><td colspan='5'>No tour plans available.</td></tr>";
    }
    $conn->close();
    ?>
</table>




    <!-- End of Main Content -->
    
    <!-- Footer -->
    <section class="footer" style="margin-bottom: 0% ;">
        <span>Created By Pratham Bhatt | © 2025</span>
        <div class="social">
            <ul>
                <li><a href="https://x.com/Pratham000987" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/pratham__987" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>
                <li><a href="https://www.linkedin.com/in/pratham-bhatt-211a8822a" target="_blank"><i
                            class="fa fa-linkedin"></i></a></li>
                <li><a href="https://github.com/Bhatt135" target="_blank"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
    </section>


    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const menuBtn = document.querySelector(".menu-btn");
        const navLinks = document.querySelector(".nav-links");

        menuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("mobile-menu");
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>
<!-- chatbot -->
<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/03/04/09/20250304095305-F4CIKGZ8.js"></script>

</body>

</html>