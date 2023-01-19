import './bootstrap';

import Alpine from 'alpinejs';

// Chart JS
import Chart from 'chart.js/auto';
window.Chart = Chart;

global.$ = global.jQuery = require('jquery');

window.Alpine = Alpine;

Alpine.start();
