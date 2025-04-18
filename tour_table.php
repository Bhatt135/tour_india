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

    <!-- FontAwesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <style>
    body {
        color: #ffffff;
        font-family: 'Poppins', Arial, sans-serif;
        background: linear-gradient(135deg, #000000, #1a1a1a);
        margin: 20px;
    }

    h2 {
        text-align: center;
        color: #00ffff;
        margin-bottom: 30px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    }

    th, td {
        padding: 15px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
    }

    th {
        background: rgba(0, 255, 255, 0.2);
        color: #00ffff;
        font-size: 16px;
        font-weight: 700;
    }

    td {
        color: #e0e0e0;
        font-size: 15px;
    }

    tr:hover {
        background: rgba(0, 255, 255, 0.1);
        transition: 0.3s;
    }

    pre {
        white-space: pre-wrap;
        font-family: inherit;
        color: #ccc;
    }

    /* Button inside table */
    .ctn {
        background: #00ffff;
        color: #000;
        border: none;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .ctn:hover {
        background: #00cccc;
        color: #fff;
    }

    /* Navbar fixes */
    nav.navbar {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-links li a {
        color: #00ffff;
        font-weight: 500;
        transition: color 0.3s;
    }

    .nav-links li a:hover {
        color: #00cccc;
    }

    /* Footer */
    section.footer {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        color: #00ffff;
        text-align: center;
        padding: 20px 0;
        font-size: 14px;
        margin-top: 50px;
    }

    .footer .social ul {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 10px;
    }
    input[type="text"], select, textarea {
    width: 30%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    }
    .footer .social ul li a {
        color: #00ffff;
        font-size: 20px;
        transition: color 0.3s;
    }

    .footer .social ul li a:hover {
        color: #00cccc;
    }
</style>

</head>

<body style="padding-top: 60px;">

    <!-- Navbar -->
    <nav class="navbar glass" style="height: 70px">
        <span>
            <a href="index.html" style="display: flex; align-items: center">
                <img class="img2" src="./img/Tour-india-logo.jpg" width="40" style="margin: -25px -10px -25px -20px" />
                <h1 class="logo">&nbsp;TOUR-INDIA</h1>
            </a>
        </span>
        <ul class="nav-links">
            <li><a href="index.html" id="pri" class="cir_border">Home</a></li>
        </ul>
        <img src="./img/menu-btn.png" alt="" class="menu-btn" />
    </nav>

    <!-- Main Content Wrapper -->
    <h2>Explore Tour Plans Across India</h2>

    <?php
    include("connection.php");

    $result = mysqli_query($conn, "SELECT * FROM tour_plans");
    ?>

    <table id="tourTable">
        <thead>
            <tr>
                <th>SR NO.</th>
                <th>Place Name</th>
                <th>Cost (INR)</th>
                <th>Tour Plan</th>
                <th>Let's Go</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n1 = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $n1; ?></td>
                        <td><?= htmlspecialchars($row["destination"]); ?></td>
                        <td>₹<?= number_format($row["estimated_cost"]); ?></td>
                        <td><pre><?= htmlspecialchars($row["tour_plan"]); ?></pre></td>
                        <td>
                            <a href="login.php?tour_id=<?= $row['id'] ?>">
                                <button type="button" class="ctn">+</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $n1++;
                }
            } else {
                echo "<tr><td colspan='5'>No tour plans available.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Footer -->
    <section class="footer" style="margin-bottom: 0%;">
        <span>Created By Pratham Bhatt | © 2025</span>
        <div class="social">
            <ul>
                <li><a href="https://x.com/Pratham000987" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/pratham__987" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/in/pratham-bhatt-211a8822a" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://github.com/Bhatt135" target="_blank"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#tourTable').DataTable();
        });

        // Mobile Menu Toggle
        const menuBtn = document.querySelector(".menu-btn");
        const navLinks = document.querySelector(".nav-links");

        menuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("mobile-menu");
        });
    </script>

    <!-- Chatbot -->
    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/03/04/09/20250304095305-F4CIKGZ8.js"></script>

</body>

</html>