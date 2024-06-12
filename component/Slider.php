<link rel="stylesheet" href="./asset/css/imgslide.css">
<div class="body">
    <div class="container">
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button material-symbols-rounded">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <?php
            $sql = "SELECT * FROM announce";
            $stmt = $pdo->query($sql);
            ?>
            <ul class="image-list">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <img class="image-item" src="./img/post/<?php echo $row['img'] ?>" alt="img-<?php echo $row['id'] ?>" />
                <?php } ?>
            </ul>
            <button id="next-slide" class="slide-button material-symbols-rounded">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>
</div>


<script src="./asset/js/slider.js"></script>