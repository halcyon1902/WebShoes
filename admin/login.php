<!-- 
    //                       _oo0oo_
    //                      o8888888o
    //                      88" . "88
    //                      (| -_- |)
    //                      0\  =  /0
    //                    ___/`---'\___
    //                  .' \\|     |// '.
    //                 / \\|||  :  |||// \
    //                / _||||| -:- |||||- \
    //               |   | \\\  -  /// |   |
    //               | \_|  ''\---/''  |_/ |
    //               \  .-\__  '-'  ___/-. /
    //             ___'. .'  /--.--\  `. .'___
    //          ."" '<  `.___\_<|>_/___.' >' "".
    //         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
    //         \  \ `_.   \_ __\ /__ _/   .-` /  /
    //     =====`-.____`.___ \_____/___.-`___.-'=====
    //                       `=---='
    //
    //  KHÔNG BUG!        KHÔNG CRASH!        TỐT NGHIỆP!  
    //
    //                    A DI ĐÀ PHẬT!                    
    //     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<?php include '../classes/admin/adminlogin.php'; ?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $adminUser = $_POST['adminUser'];
  $adminPass = md5($_POST['adminPass']);
  $login_check = $class->login_admin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
  h1 {
    margin-bottom: -10px;
  }

  body {
    display: flex;
    justify-content: center;
  }

  form {
    margin-top: 20px;
    margin: auto;
    display: flex;
    flex-direction: column;
  }

  .input-field {
    position: relative;
    margin-top: 2rem;
  }

  .input-field input {
    padding: 0.8rem;
  }

  form .input-field:first-child {
    margin-bottom: 1.5rem;
  }

  form input[type="submit"] {
    background: linear-gradient(to left, #4776e6, #8e54e9);
    color: white;
    border-radius: 4px;
    margin-top: 2rem;
    padding: 0.4rem;
  }
</style>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Admin</title>
  <link rel="icon" type="image/x-icon" href="public/img/icon.ico">
</head>

<body>
  <form action="login.php" method="post">
    <h1>Administrator</h1>
    <?php
    if (isset($login_check)) {
    ?>
      <script>
        alert("<?php echo $login_check; ?>");
      </script>
    <?php
    }
    ?>

    <div class="input-field">
      <input type="text" name="adminUser" required="" placeholder="Nhập Username" />
    </div>
    <div class="input-field">
      <input type="password" name="adminPass" required="" placeholder="Nhập Password" />
    </div>
    <input type="submit" value="Log In" />
  </form>
</body>

</html>