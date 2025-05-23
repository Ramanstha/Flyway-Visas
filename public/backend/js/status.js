$(function () {
    $(".sitesetting").change(function () {
        var sitesettingstatus = $(this).prop("checked") == true ? 1 : 0;
        var sitesetting_id = $(this).data("id");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/sitesetting-status",
            data: { sitesettingstatus: sitesettingstatus, sitesetting_id: sitesetting_id },
            success: function (data) {
                window.location.reload();
            },
        });
    });
});

$(function () {
    $(".service").change(function () {
        var servicestatus = $(this).prop("checked") == true ? 1 : 0;
        var service_id = $(this).data("id");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/service-status",
            data: { servicestatus: servicestatus, service_id: service_id },
            success: function (data) {
                window.location.reload();
            },
        });
    });
});

$(function () {
    $(".testimonial").change(function () {
        var testimonialstatus = $(this).prop("checked") == true ? 1 : 0;
        var testimonial_id = $(this).data("id");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/testimonial-status",
            data: { testimonialstatus: testimonialstatus, testimonial_id: testimonial_id },
            success: function (data) {
                window.location.reload();
            },
        });
    });
});