<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= BASE_URL?>/">HQUIZZ</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-text" style="color:white"> Hello <?php if(isset($_SESSION["student_id"])) {
                        echo $_SESSION["student_name"];
                    } ?></p>
                </li>
                <li class="dropdown">
                    
                    <a href=" <?php if(isset($_SESSION["student_id"])) { echo  ADMIN_URL . 'dang-xuat';  } else{ echo  ADMIN_URL . 'dang-nhap';} ?> " class="dropdown-toggle" data-toggle="dropdown"><b><?php if(isset($_SESSION["student_id"])) { echo 'Đăng xuất';  } else{ echo  'Đăng nhập';} ?></b> <span class="caret"></span></a> 
                </li>
            </ul>
        </div>
</nav>