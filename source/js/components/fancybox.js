import { Fancybox } from "@fancyapps/ui";

document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll('[data-fancybox]'); 
    const players = document.querySelectorAll('[data-player]');

    if(items){
        Fancybox.bind('[data-fancybox]', {});
    }

    if(players){
        Fancybox.bind('[data-player]', {});
    }

});
