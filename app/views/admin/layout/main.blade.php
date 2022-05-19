<?php


if (!isset($_SESSION["teacher_id"])) {
  header("Location:" . BASE_URL . "/dang-nhap");
  die;
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Quản Trị Website</title>
  @include('layout._style')

</head>

<body class="bg-theme bg-theme1">

  <!--  wrapper-->
  <div id="wrapper">

    <!--Bắt đầu  wrapper-->
    @include('layout._wrapper')
    <!--Kết thúc-wrapper-->

    <!-- Bắt đầu topbar header-->
    @include('layout._topbar-nav')

        @yield('main-content')


    <footer class="footer">
        <div class="container">
          <div class="text-center">
            Copyright © HQUIZZ
          </div>
        </div>
      </footer>
      </div>
    @include('layout._script')


</body>

</html>
