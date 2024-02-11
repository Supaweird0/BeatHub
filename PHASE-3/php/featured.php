
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/featured.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Featured</title>
</head>
<body>
    <?php 
        $currentPage = 'featured';
        include_once 'header.php';
    ?>
    <h1>On Tour</h1>
    <div class="mock-data">
        <div class="data-component">
            <div class="metadata">
                <img src="../img/cruel-summer.jpg" alt="">
                <div class="info">
                    <p class="title">Cruel Summer</p>
                    <p class="artist">Taylor Swift</p>
                    <p class="genre">Pop</p>
                    <p class="record-label">Republic</p>
                    <p class="duration">02:58</p>  
                </div>
            </div>
            <div class="song-clip">
                <iframe src="https://open.spotify.com/embed/track/1BxfuPKGuaTgP7aM0Bbdwr?utm_source=generator" width="100%" height="142" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
        <div class="data-component">
            <div class="metadata">
                <img src="../img/scorpion.jpg" alt="">
                <div class="info">
                    <p class="title">I'm Upset</p>
                    <p class="artist">Drake</p>
                    <p class="genre">Hip-Hop/Rap</p>
                    <p class="record-label">OVO</p>
                    <p class="duration">03:34</p>  
                </div>
            </div>
            <div class="song-clip">
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/3qN5qMTKyEEmiTZD38BNTT?utm_source=generator" width="100%" height="142" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
        <div class="data-component">
            <div class="metadata">
                <img src="../img/anti.jpg" alt="">
                <div class="info">
                    <p class="title">Needed Me</p>
                    <p class="artist">Rihanna</p>
                    <p class="genre">R&B/Soul</p>
                    <p class="record-label">Roc. Nation Records</p>
                    <p class="duration">03:34</p>  
                </div>
            </div>
            <div class="song-clip">
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/4pAl7FkDMNBsjykPXo91B3?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
        <div class="data-component">
            <div class="metadata">
                <img src="../img/sos.jpg" alt="sos album art">
                <div class="info">
                    <p class="title">Snooze</p>
                    <p class="artist">SZA</p>
                    <p class="genre">R&B/Soul</p>
                    <p class="record-label">TDE</p>
                    <p class="duration">03:34</p>  
                </div>
            </div>
            <div class="song-clip">
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/4iZ4pt7kvcaH6Yo8UoZ4s2?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php' ?>
</body>
</html>