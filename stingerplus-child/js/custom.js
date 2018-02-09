$(document).ready(function(){
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