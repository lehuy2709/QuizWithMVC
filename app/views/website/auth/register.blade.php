<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Đăng ký</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/temp-website/css/main-reg.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="warning alert-danger" style="padding:10px; margin-bottom:10px;">
                            <strong>Lỗi !</strong> <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']) ?>
                    <?php } ?>
                    <h2 class="title">Đăng Ký Thành Viên</h2>
                    <form action="<?= BASE_URL . '/luu-dang-ky' ?>" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Họ Và Tên</label>
                                    <input class="input--style-4" type="text" name="fullName">
                                </div>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="text" name="email">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Mật Khẩu</label>
                                <input class="input--style-4" type="password" name="passWord">
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit">Đăng ký</button>
                            </div>
                            <div class="text-reg" style="padding-top: 25px; font-size:20px;">
                              Hoặc
                            </div>
                            <div class="p-t-15">
                            <a href="dang-nhap" class="btn btn--radius-2 btn--green" style="text-decoration: none; color:white;">Đăng nhập</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<!-- end document-->