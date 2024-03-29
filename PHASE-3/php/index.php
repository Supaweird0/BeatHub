
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>BeatHub</title>
</head>
<body>

    <?php
        $currentPage = '';
        include_once 'header.php';
    ?>
    
    <h1 class="artists-headline">Artists of The Week</h1>
    <div class="img-container">
        <div class="images-div">
            <a class="artist-link" href="https://kehlani.fandom.com/wiki/Kehlani">
                <div class="artist-img" id="slide-1">
                    <img src="../img/kehlani.jfif" alt="" id="img1">
                    <div class="overlay" id="overlay-1">
                        <h4 class="artist-name">Kehlani</h4>
                        <p>Oakland, CA, United States</p>
                        <p>April, 1995</p>
                        <p>R&B/Soul</p>
                    </div>
                </div>
            </a>
            <a  class="artist-link" href="https://excellentmusic.miraheze.org/wiki/Kendrick_Lamar">
                <div class="artist-img" id="slide-2">
                    <img src="../img/kendrick.jfif" alt="" id="img2">
                    <div class="overlay" id="overlay-2">
                        <h4>Kendrick Lamar</h4>
                        <p>Compton, CA, United States</p>
                        <p>June 17, 1987</p>
                        <p>Hip-Hop/Rap</p>
                    </div>
                </div>
            </a>
            <a class="artist-link" href="https://snl.fandom.com/wiki/Tame_Impala">
                <div class="artist-img" id="slide-3">
                    <img src="../img/tame-impala.jfif" alt="" id="img3">
                    <div class="overlay" id="overlay-3">
                        <h4 class="artist-name">Tame Impala</h4>
                        <p>Perth, Australia</p>
                        <p>February 20, 2007</p>
                        <p>Alternative</p>
                        <p></p>
                    </div>
                </div>
            </a>  
            <a class="artist-link" href="https://snl.fandom.com/wiki/Tame_Impala">
                <div class="artist-img" id="slide-3">
                    <img src="../img/martin-garrix.jfif" alt="" id="img3">
                    <div class="overlay" id="overlay-3">
                        <h4 class="artist-name">Martin Garrix</h4>
                        <p>Perth, Australia</p>
                        <p>February 20, 2007</p>
                        <p>EDM</p>
                        <p></p>
                    </div>
                </div>
            </a>  
        </div>
    </div>
    <div class="article">
        <aside>
            <div class="info">
                <h1>Tyler, The Creator: </h1>
                <h2>Shaping Waves of Creativity</h2>
                <p>Tyler, the Creator, born Tyler Gregory Okonma, is a multi-talented 
                    artist known for pushing boundaries musically and creatively. From his early days 
                    with Odd Future to his solo career, Tyler has carved a unique path
                    in the music industry that's left an indelible mark.
                </p>
                <blockquote>Tell these black kids they can be who they are. Dye your hair blue, shit, I'll do it too.</blockquote>
                <a href="https://tylerthecreator.com">Read more</a>
            </div>
            <img src="../img/ttc.jfif" alt="tyler the creator">
        </aside>
    </div>

    <?php
        include_once 'footer.php';
    ?>
    
</body>
</html>