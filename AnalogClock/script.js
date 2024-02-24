const secondHand = document.getElementById('sec-hand');
const minuteHand = document.getElementById('min-hand');
const hourHand = document.getElementById('hr-hand');

function clockTick() {
    const date = new Date();
    const seconds = date.getSeconds() / 60;
    const minutes = (seconds + date.getMinutes()) / 60;
    const hours = date.getHours() / 12;

    rotateClockHand(secondHand, seconds);
    rotateClockHand(minuteHand, minutes);
    rotateClockHand(hourHand, hours);
}

function rotateClockHand(element, rotation) {
    element.style.transform = `translate(-50%) rotate(${rotation * 360}deg)`;
}

setInterval(clockTick, 1000);
