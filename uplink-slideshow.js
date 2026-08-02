const uplinkBox = document.querySelector('.uplink-box');
const images = [
  "https://projectradio.org/artists/box1.png",
  "https://projectradio.org/artists/box2.png",
  "https://projectradio.org/artists/box3.png"
];
let index = 0;

function changeBackground() {
  uplinkBox.style.setProperty('--uplink-bg', `url(${images[index]}) center/cover no-repeat`);
  index = (index + 1) % images.length;
}

changeBackground(); // show first image immediately
setInterval(changeBackground, 4000); // change every 4 seconds
