const dataContainer = document.querySelector(".data-container");
const apiKey = 'NkYQiVgnsCxWHXVjeyML';
const secret = 'DleAQfAfLDmGUwYkHjTKeEpYyrIcNcmh';
var trendingSongs;
var allSongs = [];

// pevent default submit
document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault();
});

document.addEventListener('DOMContentLoaded', function () {
    fetchTrendingSongs();
    activateFilters();
    showLoading();
})

function showLoading() { loadingIndicator.style.display = 'block'; }
function hideLoading() { loadingIndicator.style.display = 'none'; }

function fetchTrendingSongs() {
    var deezerReq = new XMLHttpRequest();
    deezerReq.open('GET', 'https://api.deezer.com/chart/0/tracks?limit=20', true);

    deezerReq.onreadystatechange = () => {
        if (deezerReq.readyState == 4 && deezerReq.status == 200) {
            const response = JSON.parse(deezerReq.responseText);
            trendingSongs = response.data;
            extractSongDetails(trendingSongs);
        } else {
            console.error('Error fetching data from Deezer API:', deezerReq.status);
        }
    }
    deezerReq.send();
}

function extractSongDetails(tracks) {
    for (var i = 0; i < tracks.length; i++) {
        var songTitle = tracks[i].title;
        var artistName = tracks[i].artist.name;
        var albumName = tracks[i].album.title;
        makeDiscogsRequest(songTitle, artistName, albumName); // Call the function to make Discogs API requests
    }
}

function makeDiscogsRequest(songTitle, artistName, albumName) {
    const searchUrl = `https://api.discogs.com/database/search?q=${encodeURIComponent(songTitle)}+${encodeURIComponent(artistName)}&key=${apiKey}&secret=${secret}&type=release`;
    var discogsReq = new XMLHttpRequest();
    discogsReq.open('GET', searchUrl, true);

    discogsReq.onload = function () {
        if (discogsReq.status >= 200 && discogsReq.status < 300) {
            hideLoading();
            const response = JSON.parse(discogsReq.responseText);

            if (response.results[0] === undefined) return;

            const releaseUrl = `https://api.discogs.com/releases/${response.results[0].id}?key=${apiKey}&secret=${secret}`;
            if (releaseUrl) {
                const xhrRelease = new XMLHttpRequest();
                xhrRelease.open('GET', releaseUrl, true);
                xhrRelease.onload = function () {
                    if (xhrRelease.status >= 200 && xhrRelease.status < 300) {
                        const releaseDetails = JSON.parse(xhrRelease.responseText);
                        releaseDetails.albumName = albumName;
                        createSongCard(releaseDetails);

                        allSongs.push(releaseDetails);
                    } else {
                        console.error('Error fetching data from Discogs API:', xhrRelease.status);
                    }
                }
                xhrRelease.send();
            }
        } else {
            console.error('Error fetching data from Discogs API:', discogsReq.status);
        }
    }
    discogsReq.send();
}

const createSongCard = (details) => {
    const { title, artists, albumName, community,
        genres, year, labels, images } = details;

    const rating = community.rating.average;

    var card = document.createElement("div");
    card.className = "data-component";
    card.innerHTML = `
        <img src="${images[0].uri}" alt="${albumName} cover">
        <div class="info">
            <p class="title">${title}</p>
            <p class="artist">${artists[0].name}</p>
            <p class="album">${albumName}</p>
            <p class="release-date">${year}</p>
            <p class="genre">${genres[0]}</p>
            <p class="record-label">${labels[0].name}</p>
            <p class="rating"></p>
        </div>    
    `;

    var ratingElement = card.querySelector('.rating');
    var ratingValue = parseFloat(rating);
    // Create a function to generate star icons based on the rating value
    function generateStars(rating) {
        var stars = '';
        for (var i = 0; i < Math.floor(rating); i++) {
            if (i < rating) {
                if (ratingValue - 1 > 0.5) {
                    stars += '<i class="fa fa-star"></i>'; // Full star
                    ratingValue--;
                } else {
                    stars += '<i class="fa fa-star-half"></i>'; // Half star
                }
            }
        }
        return stars;
    }
    // Update the innerHTML of the rating element with the generated star icons
    ratingElement.innerHTML = generateStars(ratingValue);
    dataContainer.appendChild(card);
}

/****** FILTER ******/
const resetCards = () => {
    dataContainer.innerHTML = "";
}

const restoreAllCards = () => {
    for (var i = 0; i < allSongs.length; i++) {
        createSongCard(allSongs[i]);
    }
}

const genreSelect = document.getElementById("genre");
const yearSelect = document.getElementById("year");
const ratingSelect = document.getElementById("rating");

function populateGenreFilter() {
    const genreSet = new Set(); // Set to store unique genres
    for (var i = 0; i < allSongs.length; i++) {
        genreSet.add(allSongs[i].genres[0]);
    }
    genreSet.forEach((genre) => {
        var option = document.createElement("option");
        option.value = genre;
        option.innerHTML = genre;
        genreSelect.appendChild(option);
    });
}

function populateYearFilter() {
    var yearSet = new Set(); // Set to store unique years
    for (var i = 0; i < allSongs.length; i++) {
        yearSet.add(allSongs[i].year);
    }
    yearSet = Array.from(yearSet).sort((a, b) => a - b); // sort years
    yearSet.forEach((year) => {
        var option = document.createElement("option");
        option.value = year;
        option.innerHTML = year;
        yearSelect.appendChild(option);
    });
}

function handleFiltering() {
    var genreValue = genreSelect.value;
    var yearValue = yearSelect.value;

    if (genreValue == "All" && yearValue == "All") {
        filterGenre("All");
        filterYear("All");
    } else if (genreValue != "All" && yearValue == "All") {
        filterGenre(genreValue);
    } else if (genreValue == "All" && yearValue != "All") {
        filterYear(yearValue);
    } else if (genreValue != "All" && yearValue != "All") {
        filterBoth(genreValue, yearValue);
    }
}

function filterYear(yearValue) {
    resetCards();
    if (yearValue == "All") {
        restoreAllCards();
    } else {
        for (var i = 0; i < allSongs.length; i++) {
            if (allSongs[i].year == yearValue) {
                createSongCard(allSongs[i]);
            }
        }
    }
}

function filterGenre(genreValue) {
    resetCards();
    if (genreValue == "All") {
        restoreAllCards();
    } else {
        for (var i = 0; i < allSongs.length; i++) {
            if (allSongs[i].genres[0].includes(genreValue)) {
                createSongCard(allSongs[i]);
            }
        }
    }
}

function filterBoth(genreValue, yearValue) {
    resetCards();
    for (var i = 0; i < allSongs.length; i++) {
        if (allSongs[i].genres[0].includes(genreValue) && allSongs[i].year == yearValue) {
            createSongCard(allSongs[i]);
        }
    }
}

function filterRating() {
    resetCards();
    var ratingValue = ratingSelect.value;
    if (ratingValue == "All") {
        restoreAllCards();
    } else {
        for (var i = 0; i < allSongs.length; i++) {
            if (Math.floor(allSongs[i].community.rating.average) == ratingValue) {
                createSongCard(allSongs[i]);
            }
        }
    }
}

function activateFilters() {
    genreSelect.addEventListener('change', handleFiltering);
    yearSelect.addEventListener('change', handleFiltering);
    ratingSelect.addEventListener('change', filterRating);
    setTimeout(populateGenreFilter, 3000);
    setTimeout(populateYearFilter, 3000);
}

/****** SEARCH ******/

const searchInput = document.getElementById('search-bar');
const suggestionsDiv = document.getElementById('search-results');
searchInput.addEventListener('input', handleSearchInput);

function handleSearchInput() {
    const searchQuery = searchInput.value.trim();

    if (searchQuery.length == 0) { clearSuggestions(); }

    if (searchQuery.length > 1) {
        const searchUrl = `https://itunes.apple.com/search?term=${encodeURIComponent(searchQuery)}&entity=song`;

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);
                displaySuggestions(response.results);
            } else {
                console.error('iTunes search request failed with status:', xhr.status);
            }
        };
        xhr.open('GET', searchUrl, true);
        xhr.send();
    }
}

function displaySuggestions(results) {
    clearSuggestions();
    const searchResultsDiv = document.getElementById('search-results');
    searchResultsDiv.innerHTML = '';

    results.slice(0, 5).forEach(song => {
        const { artistName, trackName } = song;

        const suggestionDiv = document.createElement('div');
        suggestionDiv.textContent = `${trackName} by ${artistName}`;
        suggestionDiv.classList.add('suggestion');
        suggestionDiv.addEventListener('click', function () {
            searchInput.value = `${trackName} by ${artistName}`;
            clearSuggestions();
        });
        suggestionsDiv.appendChild(suggestionDiv);
    });
}

function clearSuggestions() {
    suggestionsDiv.innerHTML = '';
}

function toggleSearchBtn() {
    var searchBtn = document.querySelector('.search-btn');
    if (searchBtn.textContent === 'Search') {
        displaySearchResults();
        searchBtn.textContent = 'Close Search';
    } else {
        searchBtn.textContent = 'Search';
        resetCards();
        restoreAllCards();
    }
}

function displaySearchResults() {
    const searchQuery = searchInput.value.trim();
    const searchUrl = `https://itunes.apple.com/search?term=${encodeURIComponent(searchQuery)}&entity=song`;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText);
            // following code is similar to createSongCard, but we wanna exclude some info from the results
            if (response.results[0] === undefined) return;
            resetCards();

            response.results.slice(0, 12).forEach(song => {
                const { artistName, trackName, artworkUrl100, releaseDate, primaryGenreName} = song;
                const year = releaseDate.substring(0, 4);
                var card = document.createElement("div");
                card.className = "data-component";
                card.innerHTML = `
                    <img src="${artworkUrl100}" alt="${trackName} album art">
                    <div class="info">
                        <p class="title">${trackName}</p>
                        <p class="artist">${artistName}</p>
                        <p class="release-date">${year}</p>
                        <p class="genre">${primaryGenreName}</p>
                    </div>    
                `;
                dataContainer.appendChild(card);
           });
        } else {
            console.error('Discogs search request failed with status:', xhr.status);
        }
    };
    xhr.open('GET', searchUrl, true);
    xhr.send();
}