<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Together</title>

    <link rel="shortcut icon" href="../img/learn-logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./main.css">
</head>

<body>
    <div class="bg">
        <div class="m-auto">

            <div class="d-flex">
                <div class="m-auto">
                    <img src="./Imge/5.png" class="w-100">
                </div>
            </div>

            <div class="mb-5 row w-100">
                <div class="col-12 col-lg-6">
                    <img src="./Imge/share.png" id="share" class="w-100" style="cursor: pointer;">
                </div>
                <div class="col-12 col-lg-6">
                    <a href="./activity.php">
                        <img src="./Imge/10.png" class="w-100">
                    </a>
                </div>
                <div class="col-12">
                    <a href="https://www.youtube.com/@SCA_YRC_Official" class="d-flex">
                        <div class="d-none d-lg-flex">
                            <img src="./Imge/11.png" class="w-50 m-auto">
                        </div>
                        <div class="d-flex d-lg-none">
                            <img src="./Imge/11.png" class="w-100 m-auto">
                        </div>

                    </a>
                </div>
            </div>


            <img src="./Imge/3.png" class="w-100" alt="">
        </div>
    </div>

    <script src="../Framework/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../Framework/jq/jq.js"></script>
    <script>
        $(document).ready(function() {
            $("#share").click(function() {
                Swal.fire({
                    title: "คุณจะไปที่ไหน",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "ชั้นหนังสือ",
                    denyButtonText: `แบ่งปันหนังสือ`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href = './bookshelf.php';
                    } else if (result.isDenied) {
                        window.location.href = './YRC-Sharing.php';
                    }
                });
            });
        });
    </script>
</body>

</html>