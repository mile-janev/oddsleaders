$(document).ready(function() {
console.log('da');
// load login and register popups 
    $(document).ready(function() {

        $("#loginColorbox").colorbox({
            inline: true,
            width: '450px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#loginColorboxInside").colorbox({
            inline: true,
            width: '450px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#registerColorbox").colorbox({
            inline: true,
            width: '300px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#registerColorboxInside").colorbox({
            inline: true,
            width: '300px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });

    });

})