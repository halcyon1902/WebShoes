<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'blocks/head.php'; ?>
</head>


<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
        <?php include 'blocks/header.php'; ?>
    </header>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCustomer = $cs->insert_customer($_POST);
    }
    ?>
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
            <input type="datetime-local" name="ngaysinh" id="ngaysinh" required>
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