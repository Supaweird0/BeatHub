
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/top-rated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Top Rated</title>
</head>
<body>
    <?php 
        $currentPage = 'top-rated';
        include_once 'header.php'; 
    ?>
    <div class="chart">
        <h1>BeatHub 100</h1>
        <div class="chart-item">
            <img src="../img/funk-wav-bounces.jpg" alt="funk wav bounces album art">
            <div>
                <p class="number">1</p>
            </div>
            <div class="info">
                <p class="title">Hard To Love</p>
                <p class="artist">Calvin Harris · Jessie Reyez</p>
                <p class="genre">Funk</p>
                <p class="record-label">Columbia Records</p>
            </div>
        </div>
        <div class="chart-item">
            <img src="../img/baduizm.jpg" alt="badiuzm album art">
            <div>
                <p class="number">2</p>
            </div>
            <div class="info">
                <p class="title">Appletree</p>
                <p class="artist">Erykah Badu</p>
                <p class="genre">Soul</p>
                <p class="record-label">Kedar Records </p>
            </div>
        </div>
        <div class="chart-item">
            <img src="../img/ctrl.jpg" alt="">
            <div>
                <p class="number">3</p>
            </div>
            <div class="info">
                <p class="title">20 Something</p>
                <p class="artist">SZA</p>
                <p class="genre">R&B/Soul</p>
                <p class="record-label">TDE</p>
            </div>
        </div>
        <div class="chart-item">
            <img src="../img/over-it.jpg" alt="">
            <div>
                <p class="number">4</p>
            </div>
            <div class="info">
                <p class="title">Potential</p>
                <p class="artist">Summer Walker</p>
                <p class="genre">R&B/Soul</p>
                <p class="record-label">TDE</p>
            </div>
        </div>
        <div class="chart-item">
            <img src="../img/starboy.jpg" alt="">
            <div>
                <p class="number">5</p>
            </div>
            <div class="info">
                <p class="title">Starboy</p>
                <p class="artist">SZA</p>
                <p class="genre"></p>
                <p class="record-label">XO · Republic Records</p>
            </div>
        </div>
        <div class="chart-item">
            <img src="../img/currents.jpg" alt="">
            <div>
                <p class="number">6</p>
            </div>
            <div class="info">
                <p class="title">The Less I Know, The Better</p>
                <p class="artist">Tame Implala</p>
                <p class="genre">Psychedelic Pop</p>
                <p class="record-label">Modular Fiction Interscope</p>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>