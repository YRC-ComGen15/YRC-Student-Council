<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Together</title>

    <link rel="shortcut icon" href="../img/learntogether logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Framework/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="./main.css">
</head>

<body>

    <div class="d-flex mt-5 mt-6">
        <button id="share" class="m-auto mt-5 button">
            <h1>SHARE หนังสือ</h1>
        </button>

    </div>

    <div class="d-flex">
        <a href="" class="m-auto mt-5 button">
            <h1>SHARE กิจกรรม</h1>
        </a>

    </div>

    <div class="d-flex">
        <a href="https://www.youtube.com/@SCA_YRC_Official" class="m-auto mt-5 buttonn">
            <h1>Youtube</h1>
        </a>

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