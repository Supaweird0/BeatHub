# BeatHub: Music Database Showcase Site 🎵
 Website to view music releases and trending music

The site can be viewed here: https://supaweird0.github.io/BeatHub/

This project is a showcase website for a Music Database, similar to [ALLMUSIC](https://www.allmusic.com). It allows users to explore trending music, new releases, top-rated albums, featured songs, and information about ongoing tours. The website is designed to be user-friendly, aesthetically pleasing, and compliant with HTML5 and CSS standards.

# PHASE 1

## Technologies Used 💻
- `HTML5`
- `CSS3`
- `JavaScript` (for future functionality)
- `jQuery` (if needed in the future)

## Features  🚀
1. **Navbar**: Provides navigation to different sections of the website, including Trending, New Releases, Top Rated, Featured, and Tour pages.
2. **Trending Page**: Displays trending songs/albums with details such as artwork, title, artist, release date, rating, genre, and record label.
3. **New Releases Page**: Features newly released songs/albums with details like artwork, artist, rating, genre, and record label.
4. **Top Rated Page**: Showcases top-rated songs/albums based on Billboard Chart ranking, including artwork, title, artist, genre, ranking, and record label.
5. **Featured Page**: Highlights featured songs/albums with details like artwork, title, artist, release date, duration, genre, and a sample clip of the song/album.

## How to Run the Project
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Open the `index.html` file in your web browser.

Alternatively, you can deploy the project to a web server and access it using the provided URL.

## Usage
1. Explore the different sections of the website using the navbar.
2. Discover trending music, new releases, top-rated albums, and featured songs.
3. Learn about ongoing tours and events related to the music industry.

## Future Enhancements 🔍
- Implement search functionality to allow users to search for specific songs or artists.
- Add user authentication and profiles to personalize the experience.
- Incorporate dynamic content loading using AJAX for smoother user interaction.
- Integrate APIs to fetch real-time data and improve the accuracy of information.


# PHASE 2
  
## New Changes and Features Added in Phase 2 🆕
- Populate from APIs: Implemented data population from various APIs, replacing mock data from phase 1.
- Utilized JavaScript AJAX XMLHttpRequest for API calls.
- Showed loading screens during data retrieval to enhance user experience.
- Implemented search functionality in the Trending Page for users to search for specific music titles.
- Integrated filter functionality in the Trending Page based on chosen filters from Part 1, such as year of release.


# Phase 3

## How to Run the Project 🚀
- Clone the repository to your local machine.
- Set up a web server environment with PHP support.
- Navigate to the project directory.
- Configure the config.php file with database credentials and API keys.
- Open the project in your web browser.

## Usage 🎶
Explore different sections using the navbar.
Discover trending music, new releases, top-rated albums, and featured songs.
Learn about ongoing tours and events related to the music industry.
Register an account to access additional features.
New Changes and Features Added in Part 3 🆕
User Registration: Implemented user registration functionality with client-side and server-side validation.

1. **Created a signup form with fields for name, surname, email, and password.**
Utilized JavaScript for client-side validation to ensure correct form submission.
Implemented PHP validation to check for duplicate email addresses and secure password storage using hashing algorithms.
Generated an API key for registered users and displayed it upon successful registration.
Create a PHP API: Developed a PHP API for the Music listing website using Object-Oriented principles.

2. **Created the api.php file to handle API requests and responses.**
Implemented methods to consume data from external APIs (e.g., LastFM, Spotify, Deezer) using cURL library.
Incorporated API key authentication to prevent unauthorized access and ensure data security.
Structured JSON data for consistent data exchange between the frontend and backend.
Handled various API request parameters (e.g., title, ranking, return) to retrieve specific music information.
Future Enhancements 🚀
Implement additional API endpoints for user preferences, settings, and user authentication.
Enhance data retrieval and processing efficiency for improved performance.
Implement error handling and logging mechanisms for better debugging and maintenance.

Feel free to contribute to the project by submitting pull requests with new features or bug fixes.

Thank you for exploring our Music Database Showcase Website! 🎵🎸🎶
