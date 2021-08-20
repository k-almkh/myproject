/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

// import { Popover } from 'bootstrap';
import $ from "jquery";
global.$ = global.jQuery = $;

require('bootstrap');
// start the Stimulus application
import '../js/bootstrap';

// import * as mdb from 'mdb-ui-kit'; // lib
// import { Input } from 'mdb-ui-kit'; // module
// var popover = new Popover(document.querySelector('.popover-dismiss'), {
//     trigger: 'focus'
//   })