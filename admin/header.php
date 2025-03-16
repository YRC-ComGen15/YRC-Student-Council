<?php

if ($_SESSION['role'] == 'โสตทัศนูปกรณ์') {
    $HealthCare = "nav-item";
    $LearnTogether = "nav-item";
    $FunFest = "nav-item";
    $Subso = "nav-item";
    $Green = "nav-item";

    $admin = "";
} else {
    $admin = "d-none";
}

?>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasExampleLabel">ผู้ดูแลระบบ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex">
            <img src="../img/logo.png" class="w-50 m-auto" alt="">
        </div>

        <ul class="navbar-nav">

            <li class="nav-item">
                <b class="nav-link">ฝ่าย : <?php echo $_SESSION['role'] ?></b>
            </li>
            <li class="nav-item">
                <b class="nav-link">โครงการ : <?php echo $_SESSION['project'] ?></b>
            </li>
            <hr>

            <li class="nav-item">
                <a href="./index.php" class="nav-link"><i class="fa-solid fa-house"></i> หน้าแรก</a>
            </li>
            <li class="nav-item">
                <a href="./status.php" class="nav-link"><i class="fa-solid fa-chart-simple"></i> ข้อมูลทางสถิติ</a>
            </li>
            <li class="nav-item <?= $admin ?>">
                <a href="./announce.php" class="nav-link"><i class="fa-solid fa-bullhorn"></i> ประชาสัมพันธ์</a>
            </li>
            <li class="nav-item">
                <a href="./summarize.php" class="nav-link"><i class="fa-solid fa-note-sticky"></i> สรุปการประชุม</a>
            </li>

            <?php

            if ($_SESSION['project'] == "HealthCare") {
                $HealthCare = "nav-item";
                $LearnTogether = "d-none";
                $FunFest = "d-none";
                $Subso = "d-none";
                $Green = "d-none";
            } else if ($_SESSION['project'] == "LearnTogether") {
                $HealthCare = "d-none";
                $LearnTogether = "nav-item";
                $FunFest = "d-none";
                $Subso = "d-none";
                $Green = "d-none";
            } else if ($_SESSION['project'] == "FunFest") {
                $HealthCare = "d-none";
                $LearnTogether = "d-none";
                $FunFest = "nav-link";
                $Subso = "d-none";
                $Green = "d-none";
            } else if ($_SESSION['project'] == "Subso") {
                $HealthCare = "d-none";
                $LearnTogether = "d-none";
                $FunFest = "d-none";
                $Subso = "nav-link";
                $Green = "d-none";
            } else if ($_SESSION['project'] == "GreenToGrow") {
                $HealthCare = "d-none";
                $LearnTogether = "d-none";
                $FunFest = "d-none";
                $Subso = "d-none";
                $Green = "nav-link";
            }

            if ($_SESSION['role'] == 'โสตทัศนูปกรณ์') {
                $HealthCare = "nav-item";
                $LearnTogether = "nav-item";
                $FunFest = "nav-item";
                $Subso = "nav-item";
                $Green = "nav-item";
            }

            ?>

            <hr class="text-dark">

            <li class="<?= $HealthCare ?>">
                <a href="./project.php" class="nav-link"> จัดการโครงการ</a>
            </li>
            <!-- <li class="<?= $HealthCare ?>">
                <a href="./WeHealthCare/index.php" class="nav-link"> YRC We HealthCare</a>
            </li>
            <li class="<?= $LearnTogether ?>">
                <a href="./LearnTogether/index.php" class="nav-link"> YRC WE LEARNTOGET(HER)</a>
            </li>
            <li class="<?= $FunFest ?>">
                <a href="./FunFestival/index.php" class="nav-link"> YRC Fun Festival SS.3</a>
            </li>
            <li class="<?= $Subso ?>">
                <a href="./WeSupportSocial/index.php" class="nav-link"> YRC WE SUP(PORT) SOCIAL</a>
            </li>
            <li class="<?= $Green ?>">
                <a href="./GreenToGrow/index.php" class="nav-link"> YRC Green to Grow</a>
            </li> -->

            <hr class="text-dark">
            <li class="nav-item <?= $admin ?>">
                <a href="./studentcouncial.php" class="nav-link"><i class="fa-solid fa-users"></i> หน้าสภานักเรียน</a>
                <a href="./setting.php" class="nav-link"><i class="fa-solid fa-gear"></i> ตั้งค่าเว็บไซต์</a>
                <a href="./menu.php" class="nav-link"><i class="fa-solid fa-toggle-on"></i> ปุ่มเมนู</a>
                <a href="./user.php" class="nav-link"><i class="fa-solid fa-user"></i> จัดการผู้ใช้</a>
                <a href="./files.php" class="nav-link"><i class="fa-solid fa-file-pdf"></i> จัดการไฟล์</a>
            </li>
            <hr class="text-dark">
            <li class="nav-item">
                <a href="./profile.php" class="nav-link"><i class="fa-solid fa-user"></i> บัญชีของฉัน</a>
            </li>
            <hr class="text-dark">
            <li class="nav-item">
                <a href="./process/logout.php" class="nav-link text-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> ออกจากระบบ</a>
            </li>
        </ul>
    </div>
</div>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-brand" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"><i class="fa-solid fa-bars"></i></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php"><i class="fa-solid fa-house"></i> หน้าแรก</a>
                </li>
                <li class="nav-item <?= $admin ?>">
                    <a class="nav-link" href="./setting.php"><i class="fa-solid fa-gear"></i> ตั้งค่าเว็บไซต์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./profile.php"><i class="fa-solid fa-user"></i> บัญชีของฉัน</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-chalkboard"></i> โครงการ
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">YRC We HealthCare</a></li>
                        <li><a class="dropdown-item" href="#">YRC WE LEARNTOGET(HER)</a></li>
                        <li><a class="dropdown-item" href="#">YRC Fun Festival SS.3</a></li>
                        <li><a class="dropdown-item" href="#">YRC WE SUP(PORT) SOCIAL</a></li>
                        <li><a class="dropdown-item" href="#">YRC Green to Grow</a></li>
                    </ul>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> -->

            </ul>
        </div>
    </div>
</nav>