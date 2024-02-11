
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/new-releases.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>New Releases</title>
</head>
<body>
    <?php 
        $currentPage = 'new-releases';
        include_once 'header.php'; 
    ?>
    <div class="mock-data">
        <div class="data-component">
            <img src="../img/kurhula.jpg" alt="Kurhula album cover">
            <div class="info">
                <p class="title">Amalobolo</p>
                <p class="artist">Kelvin Momo</p>
                <p class="genre">Amapiano</p>
                <p class="record-label">Kelvin Momo Productions</p>
                <span class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                </span>
                <div class="review-tooltip">
                    Review
                    <span>The album “Kurhula” is a testament to Kelvin Momo's incredible musical prowess and creativity.</span>
                </div>
            </div>
        </div>
        <div class="data-component">
            <img src="../img/red-moon.jpg" alt="red moon album cover">
            <div class="info">
                <p class="title">I Wish You Roses</p>
                <p class="artist">Kali Uchis</p>
                <p class="genre">R&B/Soul</p>
                <p class="record-label">Geffen Records</p>
                <span class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>
                <div class="review-tooltip">
                    Review
                    <span>The song slows down at the end, pushing forward calming ocean waves through the listener's ears. The creative workings of this track gain Kali Uchis a 9/10 on the Intersect Rating Scale</span>
                </div>
            </div>
        </div>
        <div class="data-component">
            <img src="../img/fukumean.jpg" alt="fukumean cover">
            <div class="info">
                <p class="title">fukumean</p>
                <p class="artist">Gunna</p>
                <p class="genre">Hip-Hop/Rap</p>
                <p class="record-label">YSL 300</p>
                <span class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>
                <div class="review-tooltip">
                    Review
                    <span>fukumean shines a light on the rapper's mastery of melodic rap. This high-energy track takes those who listen on a journey through Gunna's life.</span>
                </div>
            </div>
        </div>
        <div class="data-component">
            <img src="../img/her-loss.jpg" alt="her loss album cover">
            <div class="info">
                <p class="title">Spin 'Bout U</p>
                <p class="artist">Drake · 21 Savage</p>
                <p class="genre">Hip-Hop/Rap</p>
                <p class="record-label">OVO</p>
                <span class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>
                <div class="review-tooltip">
                    Review
                    <span>Drake is giving us a little bit of everything, with a smooth and melodic hook that flows naturally into a ridiculous rap pocket</span>
                </div>
            </div>
        </div>
        <div class="data-component">
            <img src="../img/pink-friday-2.jpg" alt="Pink Friday 2 album cover">
            <div class="info">
                <p class="title">FTCU</p>
                <p class="artist">Nicki Minaj</p>
                <p class="genre">Hip-Hop/Rap</p>
                <p class="record-label">Young Money</p>
                <span class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>
                <div class="review-tooltip">
                    Review
                    <span>High heels on my tippies</span>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>