// Send a page view to the server 

function sendPageView() {

    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'track.php', true);

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('page=' + encodeURIComponent(window.location.href));

}



// Track a click event and send it to the server 

function trackClick(element) {

    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'track.php', true);

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('page=' + encodeURIComponent(window.location.href) + '&element=' + encodeURIComponent(element));

}



// Send a page view on load 

sendPageView();

// Track clicks on links and buttons 

const links = document.getElementsByTagName('a');

for (let i = 0; i < links.length; i++) {

    links[i].addEventListener('click', function () {

        trackClick('link: ' + this.href);

    });

}

const buttons = document.getElementsByTagName('button');

for (let i = 0; i < buttons.length; i++) {

    buttons[i].addEventListener('click', function () {

        trackClick('button: ' + this.textContent);

    });

} 