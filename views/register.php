<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'blocks/head.php';
    require_once '../lib/session.php';
    Session::init();
    require_once '../classes/customer.php';
    require_once '../classes/admin/brand.php';
    require_once '../classes/admin/category.php';
    $br = new brand();
    $cat = new category();
    $cs = new customer();
    ?>
</head>


<body class="animsition">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCustomer = $cs->insert_customer($_POST);
    }
    ?>
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Shop Giày Độc Lạ Bình Dương
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="contact.php" class="flex-c-m trans-04 p-lr-25">
                        Liên Hệ
                    </a>
                    <?php
                    if (isset($_GET['customer_id'])) {
                        $delCart = $ct->del_all_data_cart();
                        Session::destroy();
                    }
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '<a href="../views/login.php" class="flex-c-m trans-04 p-lr-25"> Tài Khoản</a>';
                    } else {
                        echo '<a href="#" class="flex-c-m trans-04 p-lr-25">Xin Chào' . " " . Session::get('customer_name') . ' </a>';
                        echo '<a href="?customer_id=' . Session::get('customer_id') . '" class="flex-c-m trans-04 p-lr-25">Đăng Xuất</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="container-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="index.php" class="logo">
                    <img src="../public/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <a href="product.php">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="about.php">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="contact.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <a href="shoping-cart.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                </div>
            </nav>
        </div>
        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="../public/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" action="productSearch.php?timkiem" method="post">
                    <button class="flex-c-m trans-04" name="timkiem">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="tukhoa" placeholder="Nhập tên sản phẩm tìm kiếm..">
                </form>
            </div>
        </div>
    </div>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Tài khoản
        </h2>
    </section>
    <!-- Login -->

    <div class="container">
        <br>
        <h1>Đăng ký</h1>
        <p>Nhập đầy đủ thông tin để đăng ký tài khoản.</p>
        <hr>
        <?php
        if (isset($insertCustomer)) {
            echo $insertCustomer;
        }
        ?>
        <br>
        <form action="" method="POST">

            <label for="tentk"><b>Tên tài khoản</b></label>
            <input type="text" placeholder="Nhập tên tài khoản" name="tentk" id="tentk" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="psw" id="psw" required>

            <label for="pswrepeat"><b>Nhập lại mật khẩu</b></label>
            <input type="password" placeholder="Nhập lại mật khẩu" name="pswrepeat" id="pswrepeat" required>

            <label for="hoten"><b>Họ tên</b></label>
            <input type="text" placeholder="Nhập họ tên" name="hoten" id="hoten" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Nhập Email" name="email" id="email" required>

            <label for="diachi"><b>Địa chỉ</b></label>
            <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>

            <label for="sdt"><b>Số điện thoại</b></label>
            <input type="tel" placeholder="Nhập số điện thoại" name="sdt" id="sdt" required>

            <label for="ngaysinh"><b>Chọn ngày sinh</b></label>
            <input type="date" name="ngaysinh" id="ngaysinh" required>
            <hr>
            <button type="submit" name="submit" class="registerbtn">Đăng ký</button>
        </form>
    </div>

    <div class="container signin">
        <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a>.</p>
    </div>
    <br>
    <!-- Footer -->
    <?php include 'blocks/footer.php'; ?>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="../public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/bootstrap/js/popper.js"></script>
    <script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="../public/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function () {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function () {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="../public/js/main.js"></script>

</body>

</html>
<style>
    * {
        box-sizing: border-box
    }

    /* Full-width input fields */

    input[type=text],
    input[type=password],
    input[type=email],
    input[type=datetime-local],
    input[type=tel] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus,
    input[type=email]:focus,
    input[type=datetime-local]:focus,
    input[type=tel]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        text-align: center;
    }
</style>
<script>
    const pswInput = document.getElementById("psw");
    const pswRepeatInput = document.getElementById("pswrepeat");

    // Thêm sự kiện nghe khi người dùng nhập vào cả hai trường mật khẩu
    pswInput.addEventListener("input", checkPasswordsMatch);
    pswRepeatInput.addEventListener("input", checkPasswordsMatch);

    function checkPasswordsMatch() {
        const pswValue = pswInput.value;
        const pswRepeatValue = pswRepeatInput.value;

        if (pswValue === pswRepeatValue) {
            // Mật khẩu khớp nhau, không có lỗi
            pswInput.setCustomValidity("");
        } else {
            // Mật khẩu không khớp nhau, hiển thị thông báo lỗi
            pswInput.setCustomValidity("Mật khẩu không khớp");
        }
    }

</script>
<script>
    function validatePhoneNumber() {
        var phoneNumber = document.getElementById("sdt").value;
        if (phoneNumber.length != 12) {
            alert("Số điện thoại phải có chính xác 12 chữ số");
        }
    }
</script>