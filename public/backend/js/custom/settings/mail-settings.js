"use strict";

$(document).ready(function () {
    driverSettings();

    $("#mail_driver").change(driverSettings);
});

function driverSettings() {
    var mail_driver = $("#mail_driver").val();
    if (mail_driver == "smtp") {
        $(".smtp").show();
        $(".sendmail").hide();
    } else if (mail_driver == "sendmail") {
        $(".sendmail").show();
        $(".smtp").hide();
    } else {
        $(".sendmail").hide();
        $(".smtp").hide();
    }
}
