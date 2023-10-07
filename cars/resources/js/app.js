import './bootstrap';
import 'jquery';
import Swiper from 'swiper';
import $ from 'jquery';
window.$ = $;
$(document).ready(function () {
    $('#admin-pagination-tables').DataTable();
});
import 'jquery';

$(document).ready(function () {
    // Handle the click event of the "Show Description" button
    $(".toggle-description-btn").on("click", function () {
      // Get the target content element using the "description-content" class
      var descriptionContent = $(".description-content");
      descriptionContent.fadeToggle();
    });
});

window.Swiper = Swiper;