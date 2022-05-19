<?php

namespace App\Controllers;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginController
{
    public function registerForm()
    {
        return view_home("auth.register");
    }
    public function createAccount()
    {
        $user = user::all();

        foreach ($user as $value) {
            if ($_POST["email"] == $value->email) {
                $_SESSION["error"] = "Email này đã tồn tại";
                header("Location:" . BASE_URL . "/dang-ky");
                die;
            }
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Email không hợp lệ";
            header("Location:" . BASE_URL . "/dang-ky");
            die;
        }
        if ($_POST["fullName"] == "" || $_POST["passWord"] == "") {
            $_SESSION['error'] = "Các trường không được để trống";
            header("Location:" . BASE_URL . "/dang-ky");
            die;
        }
        if (strlen($_POST["passWord"]) < 6) {
            $_SESSION['error'] = "Mật khẩu phải từ 6 kí tự trở lên";
            header("Location:" . BASE_URL . "/dang-ky");
            die;
        }
        User::create([
            "name" => $_POST["fullName"],
            "email" => $_POST["email"],
            "password" => password_hash($_POST["passWord"], PASSWORD_DEFAULT)
        ]);
        header("Location:" . BASE_URL . "/dang-nhap");
        die;
    }

    public function loginForm()
    {
        return view_home("auth.login");
    }

    public function saveLogin()
    {
        // $email = $_POST['email'];
        $user = User::where("email",$_POST["email"])->first();
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Email không hợp lệ";
            header("Location:" . BASE_URL . "/dang-nhap");
            die;
        }
        if (password_verify($_POST["passWord"], $user->password)) {
            if ($user->role_id == 1) {
                $_SESSION["teacher_id"] = $user->id;
                $_SESSION["teacher_name"] = $user->name;
                $_SESSION["teacher_email"] = $user->email;
                header("Location:" . BASE_URL . "/dashboard");
                die;
            } else if ($user->role_id == 2) {
                $_SESSION["student_id"] = $user->id;
                $_SESSION["student_name"] = $user->name;
                $_SESSION["student_email"] = $user->email;
                header("Location:" . ADMIN_URL . "trang-chu");
                die;
            }

        } else {
            $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác";
            header("Location:" . BASE_URL . "/dang-nhap");
            die;
        }

    }
    public function logOut()
    {
        session_destroy();
        header("Location:" . BASE_URL . "/dang-nhap");
        die;
    }
}
