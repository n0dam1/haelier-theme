$(document).ready(function(){
    $('header .inner').css({"width": window.innerWidth + "px"});


    $("#toc_container .toc_title").click(function () {
        $(".toc_list").toggle("fast");
    });

    $(".accordion-menu label").click(function() {
       $(this).next().toggle("fast");
        if($(this).children().hasClass("open")) {
            $(this).children().removeClass("open");

        } else {
            $(this).children().addClass("open");
        }
    });
});