<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data)
    {
        $TaiKhoanKH = mysqli_real_escape_string($this->db->link, $data['tentk']);
        $MatKhau = mysqli_real_escape_string($this->db->link, md5($data['psw']));
        $pswrepeat = mysqli_real_escape_string($this->db->link, md5($data['pswrepeat']));
        $HoTen = mysqli_real_escape_string($this->db->link, $data['hoten']);
        $EmailKH = mysqli_real_escape_string($this->db->link, $data['email']);
        $DiaChiKH = mysqli_real_escape_string($this->db->link, $data['diachi']);
        $DienThoaiKH = mysqli_real_escape_string($this->db->link, $data['sdt']);
        $NgaySinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
        $TrangThai = '1';
        if ($TaiKhoanKH == "" || $MatKhau == "" || $pswrepeat == "" || $HoTen == "" || $EmailKH == "" || $DiaChiKH == "" || $DienThoaiKH == "" || $NgaySinh == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;

        } else {
            $check_email = "SELECT * FROM khachhang WHERE  EmailKH ='$EmailKH' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'> Email này đã tồn tại! vui lòng nhập email khác! </span>";
                return $alert;
            } else {
                $query = "INSERT INTO khachhang(TaiKhoanKH,MatKhau,HoTen,EmailKH,DiaChiKH,DienThoaiKH,NgaySinh,TrangThai) VALUES ('$TaiKhoanKH','$MatKhau','$HoTen','$EmailKH','$DiaChiKH','$DienThoaiKH','$NgaySinh', '$TrangThai')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'> Đăng ký tài khoản thành công </span>";
                    header("Location:login.php");
                } else {
                    $alert = "<span class='error'> Đăng ký tài khoản thất bại </span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customer($data)
    {
        $EmailKH = mysqli_real_escape_string($this->db->link, $data['email']);
        $MatKhau = mysqli_real_escape_string($this->db->link, md5($data['psw']));
        if ($EmailKH == "" || $MatKhau == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $check_login = "SELECT * FROM khachhang WHERE  EmailKH ='$EmailKH' AND  MatKhau = '$MatKhau' AND TrangThai = '1' LIMIT 1";
            $result_check = $this->db->select($check_login);
            if ($result_check != false) {
                $value = $result_check->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['MaKH']);
                Session::set('customer_name', $value['TaiKhoanKH']);
                header('Location:shoping-cart.php');
            } else {
                $alert = "<span class='error'> Email hoặc mật khẩu không đúng! Vui lòng nhập lại! </span>";
                $check_lock_account = "SELECT * FROM khachhang WHERE  EmailKH ='$EmailKH' AND TrangThai <> '1' LIMIT 1";
                $result_lock_account = $this->db->select($check_lock_account);
                if ($result_lock_account != false) {
                    $alert = "<span class='error'> Tài khoản đã bị khóa! Vui lòng liên hệ với quản trị viên để biết thêm thông tin! </span>";
                }
                return $alert;
            }
        }
    }

    public function insert_ykien($data)
    {
        $Email = mysqli_real_escape_string($this->db->link, $data['email']);
        $NoiDung = mysqli_real_escape_string($this->db->link, $data['mes']);
        $NgayGui = date('Y-m-d H:i:s');
        if ($Email == "" || $NoiDung == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "INSERT INTO ykienkhachhang(Email,NoiDung,NgayGui) VALUES ('$Email','$NoiDung','$NgayGui')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Cảm ơn bạn đã đóng góp ý kiến <3 </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Error </span>";
                return $alert;
            }
        }
    }
    public function show_customers($id)
    {
        $query = "SELECT * FROM khachhang WHERE MaKH='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_customers($data, $id)
    {
        $HoTen = mysqli_real_escape_string($this->db->link, $data['hoten']);
        $DiaChiKH = mysqli_real_escape_string($this->db->link, $data['diachi']);
        $DienThoaiKH = mysqli_real_escape_string($this->db->link, $data['sdt']);
        $NgaySinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
        if ($HoTen == "" || $DiaChiKH == "" || $DienThoaiKH == "" || $NgaySinh == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "UPDATE khachhang SET HoTen='$HoTen',DiaChiKH='$DiaChiKH',DienThoaiKH='$DienThoaiKH',NgaySinh='$NgaySinh' WHERE MaKH = '$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Cập nhật thông tin tài khoản thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Cập nhật thông tin tài khoản thất bại </span>";
                return $alert;
            }
        }
    }
    public function show_bill_oderby_user($id)
    {
        $query = "SELECT * FROM dondathang WHERE MaKH='$id' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
}
?>