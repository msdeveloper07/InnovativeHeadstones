// const audioElements = document.querySelectorAll('.audio-element');

// audioElements.forEach(audio => {
//     const radio = audio.parentElement.nextElementSibling.querySelector('input[type="radio"]');
//     radio.addEventListener('click', () => {
//         if (radio.checked) {
//             if (audio.paused || audio.currentTime === 0) {
//                 audio.play();
//             } else {
//                 audio.pause();
//                 audio.currentTime = 0;
//             }
//         }
//     });
// });


// const audioElements = document.querySelectorAll('.audio-element');
// const audioContainers = document.querySelectorAll('.audio-container');

// audioElements.forEach((audio, index) => {
//     const radio = audio.parentElement.nextElementSibling.querySelector('input[type="radio"]');
//     radio.addEventListener('click', () => {
//         if (radio.checked) {
//             if (audio.paused || audio.currentTime === 0) {
//                 audio.play();
//             } else {
//                 audio.pause();
//                 audio.currentTime = 0;
//             }

//             // Toggle animation class for the active audio container
//             audioContainers.forEach((container, containerIndex) => {
//                 if (containerIndex === index) {
//                     container.classList.add('active');
//                 } else {
//                     container.classList.remove('active');
//                 }
//             });
//         }
//     });
// });





let currentAudio = null;

const radioContainers = document.querySelectorAll('.radio-container');
radioContainers.forEach(container => {
    const audio = container.querySelector('audio');
    const radioButton = container.querySelector('input[type="radio"]');

    radioButton.addEventListener('click', () => {
        if (currentAudio && currentAudio !== audio) {
            currentAudio.pause();
            currentAudio.currentTime = 0;
        }

        if (audio.paused) {
            audio.play();
            currentAudio = audio;
        } else {
            audio.pause();
            audio.currentTime = 0;
            currentAudio = null;
        }
    });
});