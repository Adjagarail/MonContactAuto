
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import noUiSlider from "nouislider";

var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    }
});
