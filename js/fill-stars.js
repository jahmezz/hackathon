/*global $*/
'use strict';

$(document).ready(function () {
    console.log(document.getElementById('avg-rating').innerHTML);
    var stars = parseInt(document.getElementById('avg-rating').innerHTML);
    stars = Math.round(stars);
    var id = 'rating' + stars;
    console.log(id);
    document.getElementById(id).checked = true;

    document.getElementById('avg-rating').innerHTML = '';
});