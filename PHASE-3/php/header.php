<?php
    include_once ('config.php'); 
?>
<header>
    <nav>
        <a href="index.php" id="logo">BeatHub</a>
        <ul>
            <li><a href="trending.php"<?php echo ($currentPage == 'trending') ? 'class="active"' : ''; ?>>Trending</a></li>
            <li><a href="new-releases.php" <?php echo ($currentPage == 'new-releases') ? 'class="active"' : ''; ?>>New Releases</a></li>
            <li><a href="top-rated.php" <?php echo ($currentPage == 'top-rated') ? 'class="active"' : ''; ?>>Top Rated</a></li>
            <li><a href="featured.php" <?php echo ($currentPage == 'featured') ? 'class="active"' : ''; ?>>Featured</a></li>
            <li><a href="tour.php" <?php echo ($currentPage == 'tour') ? 'class="active"' : ''; ?>>Tour</a></li>

            <?php if ($in = false) { ?>
                <li><a href="index.php" onclick="logout()">Logout</a></li>
            <?php } else { ?>
                <li><button class="login-btn"><a href="login.php">Login</a></button></li>
                <li><button class="signup-btn"><a href="signup.php">Sign Up</a></button></li>
            <?php } ?>
        </ul>
    </nav>
</header>