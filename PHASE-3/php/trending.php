<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/trending.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Trending</title>
</head>

<body>
    <?php
        $currentPage = 'trending';
        include_once 'header.php';
    ?>
    <div class="search-filter">
        <div class="search-container">
            <form id="search" action="">
                <i class="fas fa-search"></i>
                <input type="search" name="search-bar" id="search-bar">
                <button type="submit" onclick="toggleSearchBtn()" class="search-btn">Search</button>
            </form>
            <div id="search-results"></div>
            <div class="filter-container">
                <div class="filter-bar">
                    <label for="genre">Genre:</label>
                    <select name="genre" id="genre">
                        <option value="All">All</option>
                    </select>
                </div>
                <div class="filter-bar">
                    <label for="year">Year:</label>
                    <select name="year" id="year">
                        <option value="All">All</option>
                    </select>
                </div>
                <div class="filter-bar">
                    <label for="rating">Rating:</label>
                    <select name="rating" id="rating">
                        <option value="All">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Loading indicator for API calls -->
        <div id="loadingIndicator" style="display: none;">
            <img src="../img/rolling-loader.svg" alt="Loading...">
        </div>

        <div class="data-container">
        </div>

        <?php include_once 'footer.php'; ?>
        <script src="../js/trending.js"></script>
</body>

</html>