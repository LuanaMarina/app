document.addEventListener('load', function() {
    var preloader = document.getElementById('loadHeart');
    if (preloader) {
        preloader.style.display = 'none';
    }
}, true);

document.addEventListener("DOMContentLoaded", function () {
    const timeContainer = document.getElementById("TimeHourglass");
    const displayElement = document.getElementById("displayRuntime");
    const toggleButton = document.getElementById("toggleFormat");

    const runtimeInMinutes = parseInt(timeContainer.getAttribute("data-runtime"), 10);
    const prettyRuntime = timeContainer.getAttribute("data-runtime-pretty");

    let isPrettyFormat = true;

    toggleButton.addEventListener("click", function () {
        if (isPrettyFormat) {
            displayElement.textContent = `${runtimeInMinutes} minute${runtimeInMinutes > 1 ? "s" : ""}`;
        } else {
            displayElement.textContent = prettyRuntime;
        }
        isPrettyFormat = !isPrettyFormat;
    });
});

let secondsSpent = 0;
let alertDisplayed = false;
function updateCounter() {
    secondsSpent++;

    if (secondsSpent >= 60 && !alertDisplayed) {
        const userConfirmed = confirm("Ai petrecut mai mult de un minut pe această pagină! Dacă nu găsești informațiile necesare, te rugăm să ne contactezi.");

        if (userConfirmed) {
            window.location.href = "http://luana-marina.local/contact";
        }

        alertDisplayed = true;
    }
}
setInterval(updateCounter, 1000);

document.getElementById("toggleFormat").addEventListener("click", function() {
    var icon = document.getElementById("unicodeIcon");
    icon.classList.toggle("rotated");
});