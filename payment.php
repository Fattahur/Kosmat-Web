<?php
include './php/koneksi.php';
    session_start();
    if (!isset($_SESSION['login'])) {
        echo '<script language = "javascript">
        alert ("Silahkan Login Terlebih Dahulu"); document.location="login.html"; </script>';
        exit;
    }

    $nik = $_SESSION['nik'];
    $sql2 = "SELECT * FROM tagihan LEFT JOIN validasi ON tagihan.id_tagihan = validasi.id_tagihan join log_kepemilikan on tagihan.id_kepemilikan = log_kepemilikan.id_kepemilikan join akun on log_kepemilikan.nik = akun.nik and akun.nik = '$nik';";
    $result = mysqli_query($connection,$sql2);
    $data = mysqli_fetch_assoc($result);
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Payment </title>
    <link rel="stylesheet" href="./css/payy.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script defer src="./js/pay.js"></script>
    <div class="sidebar">
        <div class="logo-details">
            <i><img src="../Project/Aset/logo6 1.png" class="icon" /></i>
            <span class="logo_name">KosMat</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 15" fill="none">
                            <path
                                d="M8.09522 15.381V11.3334H11.3333V15.381C11.3333 15.8263 11.6976 16.1906 12.1429 16.1906H14.5714C15.0167 16.1906 15.381 15.8263 15.381 15.381V9.71434H16.7572C17.1295 9.71434 17.3076 9.25291 17.0243 9.01005L10.2567 2.91432C9.94904 2.63908 9.47952 2.63908 9.1719 2.91432L2.40425 9.01005C2.12901 9.25291 2.29901 9.71434 2.6714 9.71434H4.04759V15.381C4.04759 15.8263 4.41188 16.1906 4.85712 16.1906H7.2857C7.73094 16.1906 8.09522 15.8263 8.09522 15.381Z"
                                fill="white" />
                        </svg></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="payment.php" class="active">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="-2 0 20 8" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.00015 2.32143L1 10.6411L2.18445 11.0099C4.11001 11.6095 6.19181 11.6095 8.11737 11.0099C10.2223 10.3544 12.5077 10.4172 14.5678 11.187C14.6978 11.2356 14.8364 11.1394 14.8364 11.0006L14.8366 1.72718L14.5679 1.6268C12.5079 0.856994 10.2224 0.794251 8.11755 1.44972C6.19199 2.04935 4.11019 2.04935 2.18463 1.44972C1.5969 1.2667 1.00017 1.70586 1.00015 2.32143ZM8 9C9.65685 9 11 7.65686 11 6C11 4.34315 9.65685 3 8 3C6.34315 3 5 4.34315 5 6C5 7.65686 6.34315 9 8 9Z"
                                fill="white" />
                            <path
                                d="M1 10.6411L0.5 10.641C0.499996 10.8599 0.642357 11.0534 0.851339 11.1184L1 10.6411ZM1.00015 2.32143L0.500154 2.32142L1.00015 2.32143ZM2.18445 11.0099L2.03579 11.4873H2.03579L2.18445 11.0099ZM8.11737 11.0099L8.26603 11.4873L8.11737 11.0099ZM14.5678 11.187L14.7428 10.7186L14.7428 10.7186L14.5678 11.187ZM14.8364 11.0006L15.3364 11.0006V11.0006L14.8364 11.0006ZM14.8366 1.72718L15.3366 1.72719C15.3366 1.51856 15.207 1.33185 15.0116 1.25882L14.8366 1.72718ZM14.5679 1.6268L14.3929 2.09517V2.09517L14.5679 1.6268ZM8.11755 1.44972L7.96889 0.972332V0.972332L8.11755 1.44972ZM2.18463 1.44972L2.33329 0.972332V0.972332L2.18463 1.44972ZM1.5 10.6411L1.50015 2.32144L0.500154 2.32142L0.5 10.641L1.5 10.6411ZM2.33311 10.5325L1.14866 10.1637L0.851339 11.1184L2.03579 11.4873L2.33311 10.5325ZM7.96871 10.5325C6.13997 11.102 4.16186 11.102 2.33311 10.5325L2.03579 11.4873C4.05817 12.1171 6.24366 12.1171 8.26603 11.4873L7.96871 10.5325ZM14.7428 10.7186C12.5785 9.90987 10.1792 9.84414 7.96871 10.5325L8.26603 11.4873C10.2653 10.8647 12.4369 10.9245 14.3927 11.6553L14.7428 10.7186ZM14.3364 11.0006C14.3364 10.7906 14.546 10.6451 14.7428 10.7186L14.3927 11.6553C14.8496 11.8261 15.3364 11.4883 15.3364 11.0006L14.3364 11.0006ZM14.3366 1.72717L14.3364 11.0006L15.3364 11.0006L15.3366 1.72719L14.3366 1.72717ZM14.3929 2.09517L14.6615 2.19555L15.0116 1.25882L14.743 1.15844L14.3929 2.09517ZM8.26621 1.92711C10.2655 1.30453 12.437 1.36429 14.3929 2.09517L14.743 1.15844C12.5787 0.349695 10.1794 0.28397 7.96889 0.972332L8.26621 1.92711ZM2.03597 1.92711C4.05835 2.55689 6.24384 2.55689 8.26621 1.92711L7.96889 0.972332C6.14014 1.54181 4.16204 1.54181 2.33329 0.972332L2.03597 1.92711ZM1.50015 2.32144C1.50016 2.04298 1.7701 1.84432 2.03597 1.92711L2.33329 0.972332C1.4237 0.689081 0.500172 1.36875 0.500154 2.32142L1.50015 2.32144ZM10.5 6C10.5 7.38071 9.38071 8.5 8 8.5V9.5C9.933 9.5 11.5 7.933 11.5 6H10.5ZM8 3.5C9.38071 3.5 10.5 4.61929 10.5 6H11.5C11.5 4.067 9.933 2.5 8 2.5V3.5ZM5.5 6C5.5 4.61929 6.61929 3.5 8 3.5V2.5C6.067 2.5 4.5 4.067 4.5 6H5.5ZM8 8.5C6.61929 8.5 5.5 7.38071 5.5 6H4.5C4.5 7.933 6.067 9.5 8 9.5V8.5Z"
                                fill="white" />
                        </svg></i>
                    <span class="links_name">Payment</span>
                </a>
            </li>
            <li>
                <a href="message.php">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 18 11" fill="none">
                            <path
                                d="M14.3602 1.85291H3.24261C2.47827 1.85291 1.85985 2.47827 1.85985 3.24261L1.85291 15.7499L4.63231 12.9705H14.3602C15.1245 12.9705 15.7499 12.3451 15.7499 11.5808V3.24261C15.7499 2.47827 15.1245 1.85291 14.3602 1.85291ZM12.2757 10.1911H5.32716C4.94499 10.1911 4.63231 9.87843 4.63231 9.49626C4.63231 9.11409 4.94499 8.80141 5.32716 8.80141H12.2757C12.6578 8.80141 12.9705 9.11409 12.9705 9.49626C12.9705 9.87843 12.6578 10.1911 12.2757 10.1911ZM12.2757 8.10656H5.32716C4.94499 8.10656 4.63231 7.79388 4.63231 7.41171C4.63231 7.02954 4.94499 6.71686 5.32716 6.71686H12.2757C12.6578 6.71686 12.9705 7.02954 12.9705 7.41171C12.9705 7.79388 12.6578 8.10656 12.2757 8.10656ZM12.2757 6.02201H5.32716C4.94499 6.02201 4.63231 5.70933 4.63231 5.32716C4.63231 4.94499 4.94499 4.63231 5.32716 4.63231H12.2757C12.6578 4.63231 12.9705 4.94499 12.9705 5.32716C12.9705 5.70933 12.6578 6.02201 12.2757 6.02201Z"
                                fill="white" />
                        </svg></i>
                    <span class="links_name">Message</span>
                </a>
            </li>
            <li>
                <a href="profil.php">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" viewBox="0 -2 14 14" fill="none">
                            <path
                                d="M6.71431 6.71437C8.50337 6.71437 9.95242 5.26532 9.95242 3.47627C9.95242 1.68721 8.50337 0.238159 6.71431 0.238159C4.92526 0.238159 3.4762 1.68721 3.4762 3.47627C3.4762 5.26532 4.92526 6.71437 6.71431 6.71437ZM6.71431 8.33343C4.55288 8.33343 0.238098 9.41819 0.238098 11.5715V13.1906H13.1905V11.5715C13.1905 9.41819 8.87575 8.33343 6.71431 8.33343Z"
                                fill="white" />
                        </svg></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
            <li class="log_out">
                <a href="./php/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">KAMAR
                    <?php echo $_SESSION['id_kamar'] ?>
                </span>
            </div>
            <div class="profile-details">
                <img src="./img/<?php echo $_SESSION['image'] ?>" alt="">
                <span class="admin_name">
                    <?php echo $_SESSION['nama'] ?>
                </span>
            </div>
        </nav>

        <div class="home-content">
            <div class="sales-boxes">
                <form class="bayar" action="./php/pay.php" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="recent-sales box">
                        <p class="judul">Bayar Kos</p>
                        <div class="select-menu">
                            <div class="select-btn">
                                <span class="sBtn-text">Pilih Bulan</span>
                                <i class="bx bx-chevron-down"></i>
                            </div>
                            <?php 
                        $nik = $_SESSION['nik'];
                        $sql3 = "SELECT tagihan.id_tagihan, MONTHNAME(tagihan.tenggat) AS tenggat FROM tagihan join log_kepemilikan on tagihan.id_kepemilikan = log_kepemilikan.id_kepemilikan join akun on log_kepemilikan.nik = akun.nik and akun.nik = '$nik';";
                        $result2 = mysqli_query($connection,$sql3);
                        ?>
                            <?php
                        while ($tagihan = mysqli_fetch_assoc($result2)) {
                        ?>
                            <ul class="options">
                                <li class="option">
                                    <input value="<?php echo $tagihan['id_tagihan'] ?>" name="idtagihan"></input>
                                    <span class="option-text">
                                        <?php echo $tagihan['tenggat'] ?>
                                    </span>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                        </div>
                        <p class="harga">RP. 400.000</p>
                        <input type="file" name="image" id="imagepay">
                        <a> Priview Bukti Pembayaran</a>
                        <img src="./img/" alt="" id="showimgpay">
                        <input type="submit" name="bayar" id="bayar" class="btn_input" value="Bayar"></input>
                </form>
            </div>
        </div>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
</body>

</html>