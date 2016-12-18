/* list.js */
$(document).ready(function () {


    var select = document.getElementById('starters_dropdown');
    var items = select.getElementsByTagName('option');
    var index= Math.floor(Math.random() * items.length);

    select.selectedIndex = index;


});
