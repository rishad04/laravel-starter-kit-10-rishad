"use strict";

$("#search").on("input", function () {
    $.ajax({
        type: "post",
        url: $(this).data("url"),
        data: { search: $(this).val() },
        dataType: "json",
        success: function (response) {
            console.log(response);

            let options = "";
            for (let route of response) {
                options += `<option>${route.title}</option>`;
            }
            $("#route_list").html(options);
        },
    });
});

$("#search").on("change", function () {
    // Submit the form when an option is selected from the datalist
    $(this).closest("form").submit();
});

// window.scrollTo({ top: 900, behavior: 'smooth' })

// Sibear Scroll on half expand start
let interSectedLastItemOfElement = false;

let sidebarOffsetTop = $(".quixnav-scroll").offset().top;
let scrollTop = sidebarOffsetTop;

$(".quixnav").on("wheel", function (event) {
    let direction = event.originalEvent.deltaY;

    if (direction > 0) {
        scrollTop = scrollTop - 10;

        if (!interSectedLastItemOfElement) {
            $(".quixnav-scroll").css("top", `${scrollTop}px`);
        }
    } else {
        if (sidebarOffsetTop > scrollTop) {
            interSectedLastItemOfElement = false;
            scrollTop = scrollTop + 10;
            $(".quixnav-scroll").css("top", `${scrollTop}px`);
        }
    }
});
