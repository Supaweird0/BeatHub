var allSongs = '';
var dataContainer = '';

function startPage() {
    dataContainer = document.querySelector('.mock-data');
    const loadingIndicator = document.getElementById('loadingIndicator');

    function showLoading() { loadingIndicator.style.display = 'block'; }

    function hideLoading() { loadingIndicator.style.display = 'none'; }

    function populateTrending() {
        // display loading screen while fetching data
        showLoading();
        // URL with top tracks
        const deezerUrl = 'https://api.deezer.com/chart/0/tracks?limit=30'

        const xhrDeezer = new XMLHttpRequest();
        xhrDeezer.onreadystatechange = function () {
            if (xhrDeezer.readyState == 4 && xhrDeezer.status == 200) {
                // hide loading screen when data is fetched
                hideLoading();

                const jsonDeezer = JSON.parse(xhrDeezer.responseText);
                const trendingSongs = jsonDeezer.data;
                allSongs = trendingSongs;
                var rowData = '';

                // iterate through trending songs
                trendingSongs.forEach(song => {
                    const artistName = song.artist.name;
                    const trackName = song.title;
                    const trackImg = song.album.cover_big;

                    // use track name & artist to construct URl for iTunes API
                    const itunesUrl = `https://itunes.apple.com/search?term=${encodeURIComponent(trackName)}+${encodeURIComponent(artistName)}&limit=1`;

                    const xhrItunes = new XMLHttpRequest();
                    xhrItunes.onreadystatechange = function () {
                        if (xhrItunes.readyState == 4 && xhrItunes.status == 200) {
                            const jsonItunes = JSON.parse(xhrItunes.responseText);
                            const itunesTrack = jsonItunes.results[0];

                            // extract info
                            const song = itunesTrack.trackName;
                            const artist = itunesTrack.artistName;
                            const album = itunesTrack.collectionName;
                            const genre = itunesTrack.primaryGenreName;

                            const songDetails = `
                                <img src="${trackImg}" alt="${album} cover">
                                <div class="info">
                                    <p class="title">${song}</p>
                                    <p class="artist">${artist}</p>
                                    <p class="album">${album}</p>
                                    <p class="genre">${genre}</p>
                                    <p class="record-label"></p>
                                    <p class="rating"></p>
                                    <p class="review"></p>
                                </div>    
                            `
                            rowData += songDetails;

                            var newBox = document.createElement('div');
                            newBox.className = "data-component";

                            newBox.insertAdjacentHTML("afterbegin", rowData);
                            dataContainer.appendChild(newBox);
                            rowData = '';

                            fetchDiscogsRating(trackName, artistName, newBox);
                        } else {
                            console.error('iTunes request failed with status:', xhrItunes.status);
                        }
                    }

                    xhrItunes.open('GET', itunesUrl, true);
                    xhrItunes.send();
                });
            }
        }
        
        xhrDeezer.open('GET', deezerUrl, true);
        xhrDeezer.send();
    }

    /* the following two functions only work when I put them after populateTrending */
    function fetchDiscogsRating(trackName, artistName, container) {
        const apiKey = 'NkYQiVgnsCxWHXVjeyML';
        const secret = 'DleAQfAfLDmGUwYkHjTKeEpYyrIcNcmh';

        const searchUrl = `https://api.discogs.com/database/search?q=${encodeURIComponent(trackName)}+${encodeURIComponent(artistName)}&key=${apiKey}&secret=${secret}`;

        // Make an AJAX request to search for the song on Discogs
        const xhrSearch = new XMLHttpRequest();
        xhrSearch.onreadystatechange = function () {
            if (xhrSearch.readyState === XMLHttpRequest.DONE) {
                if (xhrSearch.status === 200) {
                    const response = JSON.parse(xhrSearch.responseText);
                    if (response.results && response.results.length > 0) {
                        const releaseId = response.results[0].id;

                        // Use the release ID to fetch information about the release, including ratings
                        const releaseUrl = `https://api.discogs.com/releases/${releaseId}?key=${apiKey}&secret=${secret}`;

                        const xhrRelease = new XMLHttpRequest();
                        xhrRelease.onreadystatechange = function () {
                            if (xhrRelease.readyState === XMLHttpRequest.DONE) {
                                if (xhrRelease.status === 200) {
                                    const releaseResponse = JSON.parse(xhrRelease.responseText);
                                    var ratings = releaseResponse.community?.rating?.average || 'N/A';

                                    // if rating unavailable, set random value as rating
                                    if (ratings === 'N/A') {
                                        ratings = (Math.random() * (5 - 1) + 1).toFixed(2);
                                    }

                                    const ratingElement = container.querySelector('.rating');
                                    if (ratingElement) {
                                        const stars = createStars(ratings);
                                        ratingElement.appendChild(stars);
                                    }

                                } else {
                                    console.error('Discogs release request failed with status:', xhrRelease.status);
                                }
                            }
                        };

                        xhrRelease.open('GET', releaseUrl, true);
                        xhrRelease.send();
                    } else {
                        console.error('No results found for the song on Discogs.');
                    }
                } else {
                    console.error('Discogs search request failed with status:', xhrSearch.status);
                }
            }
        };

        xhrSearch.open('GET', searchUrl, true);
        xhrSearch.send();
    }

    function createStars(rating) {
        const starCount = Math.floor(rating);
        const hasHalfStar = rating % 1 >= 0.5;
        const stars = document.createElement('span');

        for (let i = 0; i < starCount; i++) {
            const star = document.createElement('span');
            star.classList.add('fa', 'fa-star');
            stars.appendChild(star);
        }

        if (hasHalfStar) {
            const halfStar = document.createElement('span');
            halfStar.classList.add('fa', 'fa-star-half-o');
            stars.appendChild(halfStar);
        }
        return stars;
    }

    populateTrending();
}
