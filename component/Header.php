<script src="./Framework/bootstrap/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="./asset/css/header.css">
<nav class="navbar navbar-dark bg-pink fixed-top d-block d-lg-none">
    <div class="container-fluid">
        <img src="./img/logo.png" class="logo" alt="โลโก้สภานักเรียนโรงเรียนยุพราชวิทยาลัย">
        <a class="navbar-brand" href="./index.php">YRC Student Council</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end navbar-dark  bg-pink " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">YRC Student Council</h5>
                <button type="button" class="btn-close btn-close-white  text-reset " data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./comment.php">แสดงความคิดเห็น</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./project.php">โครงการ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./all_announce.php">ประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./student-council.php">เกี่ยวกับเรา</a>
                    </li>

                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/Yupparaj.Committee">ติดต่อเรา</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-pink d-none d-lg-block ">
    <div class="container">
        <img src="./img/logo.png" class="logo" alt>&nbsp;&nbsp;
        <a class="navbar-brand" href="./index.php">YRC Student Council</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="./index.php" aria-current="page"><i class="fa-solid fa-house"></i> หน้าแรก <span class="visually-hidden">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./comment.php"><i class="fa-solid fa-comment"></i> แสดงความคิดเห็น</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="dropdown-toggle header-a nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-chalkboard"></i> โครงการ
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $sql = "SELECT * FROM project";
                            $stmt = $pdo->query($sql);
                            ?>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <li><a class="dropdown-item" href="<?= $row['link'] ?>"><?= $row['title'] ?></a></li>
                            <?php } ?>
                        </ul>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./all_announce.php"><i class="fa-solid fa-bullhorn"></i> ประชาสัมพันธ์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./student-council.php">เกี่ยวกับเรา</a>
                </li>
            </ul>
            <form action="./search.php" method="get" class="d-flex my-2 my-lg-0">

                <div class="box-search">
                    <form name="search">
                        <input type="text" class="input" name="txt" onmouseout="this.value = ''; this.blur();" required>
                    </form>
                    <i class="fas fa-search box-search-i"></i>
                </div>

            </form>
        </div>
    </div>
</nav>