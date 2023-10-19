"use strict";

$(document).ready(function () {
    $("#shopID").select2({ placeholder: "Select Pickup Points" });
    $("#product_category").select2({ placeholder: "Select Product Category" });
    $("#service_type").select2({ placeholder: "Select Service Type" });
    $("#customer_district").select2({ placeholder: "Select District" });
    $("#vas").select2({ placeholder: "Select Value Added Services" });

    $(".hideShowVAS, .hideShowCOD, .hideShowLiquidFragile").hide();

    // initiate default calculation
    totalSum();
});

$(
    "#shopID, #cash_collection, #customer_district, #vas,#product_category, #service_type, #quantity, #charge"
).on("change", () => totalSum());

$("#shopID").on("change", () => shopDetails());

$("#area,#product_category").on("change", () => serviceType());

$("#service_type").on("change", () => charge());

$("#cash_collection,#charge").on("input", () => totalSum());

$("#quantity").on("input", () => charge());

// $("#coupon").on("blur", () => applyCoupon());
$("#couponApply").on("click", () => applyCoupon());

// ========================================================= Ajax Calls ================================================

function shopDetails() {
    const url = $("#shopID").data("url");
    const shopID = $("#shopID").val();
    $.ajax({
        type: "POST",
        url: url,
        data: { id: shopID },
        dataType: "json",
        success: function (shop) {
            $("#pickup_phone").val(shop.contact_no);
            $("#pickup_address").val(shop.address);
            $("#pickup").val(shop.coverage_id);

            serviceType();
            totalSum();
        },
    });
}

async function parentID(childID) {
    const url = $("#destination").data("url");

    try {
        const response = await $.ajax({
            type: "POST",
            url: url,
            data: { id: childID },
            dataType: "json",
        });

        return response.parent_id;
    } catch (error) {
        return null;
    }
}

async function chargeArea() {
    let pickup = $("#pickup").val();

    let destination = $("#destination").val();

    if (!pickup || !destination) {
        console.log("pickup or destination not set.");
        return;
    }

    let area = $("#area").data("outside");

    if (pickup == destination) {
        area = $("#area").data("inside");
    }

    let pickupParentId = await parentID(pickup);
    let destinationParentId = await parentID(destination);

    if ((pickup != destination) & (pickupParentId == destinationParentId)) {
        area = $("#area").data("subcity");
    }

    console.log("pickup or destination is set. and area is " + area);

    $("#area").val(area);
    return area;
}

// function chargeArea() {
//     let pickup_district = $("#pickup_district").val();

//     let customer_district = $("#customer_district").val();

//     let dhaka = $("#customer_district option:contains('Dhaka')").val();

//     let narayanganj = $(
//         "#customer_district option:contains('Narayanganj')"
//     ).val();

//     let gazipur = $("#customer_district option:contains('Gazipur')").val();

//     if (!pickup_district || !customer_district) {
//         return;
//     }

//     let area = $("#area").data("outside");

//     if (pickup_district == customer_district) {
//         area = $("#area").data("inside");
//     }

//     if (
//         pickup_district == dhaka &&
//         (customer_district == narayanganj || customer_district == gazipur)
//     ) {
//         area = $("#area").data("subCity");
//     }

//     $("#area").val(area);

//     return area;
// }

async function serviceType() {
    const url = $("#service_type").data("url");
    const pcID = $("#product_category").val();
    $.ajax({
        type: "POST",
        url: url,
        data: { product_category_id: pcID, area: await chargeArea() },
        dataType: "html",
        success: function (data) {
            $("#service_type").html(data);
        },
        error: function () {
            Swal.fire("Error!", xhr.responseText, "error"); // Display the error message
        },
    });
    charge();
}

async function charge() {
    const url = $("#charge").data("url");
    const pcID = $("select#product_category option").filter(":selected").val(); //product_category_id
    const stID = $("select#service_type option").filter(":selected").val(); // service_type_id

    const shouldCalculate = pcID && stID;

    if (!shouldCalculate) {
        return;
    }

    $.ajax({
        type: "POST",
        url: url,
        data: {
            product_category_id: pcID,
            service_type_id: stID,
            area: await chargeArea(),
        },
        dataType: "json",
        success: function (data) {
            const quantity = parseFloat($("#quantity").val()); // Convert to a floating-point number
            let charge = parseFloat(data.charge);

            if (!isNaN(quantity) && quantity > 1) {
                charge += (quantity - 1) * parseFloat(data.additional_charge);
            }

            $("#charge").val(charge);
        },
        error: function (xhr, status, error) {
            $("#charge").val(null);
        },
    }).always(() => totalSum());
}

function cashCollection() {
    let amount = $("#cash_collection").val()
        ? parseFloat($("#cash_collection").val())
        : 0;

    $("#totalCashCollection").text(amount.toFixed(2));

    return amount;
}

function liquidFragileCharge() {
    let amount = 0;

    if ($("#fragileLiquid").is(":checked")) {
        amount = parseFloat($("#fragileLiquid").data("amount"));
        $(".hideShowLiquidFragile").show();
    } else {
        $(".hideShowLiquidFragile").hide();
    }

    $("#liquidFragileAmount").text(amount.toFixed(2));

    return amount;
}

async function codCharge() {
    let cash = parseFloat($("#cash_collection").val());
    let amount =
        cash > 0 ? parseFloat($("#cod_charge").data(await chargeArea())) : 0;

    if (cash > 0 && !isNaN(amount)) {
        $(".hideShowCOD").show();
    } else {
        $(".hideShowCOD").hide();
    }

    // $("#cod_charge").val(amount.toFixed(2));
    $("#codAmount").text(amount.toFixed(2));

    if (isNaN(amount)) {
        amount = 0;
    }

    return amount;
}

function vasCharge() {
    var totalAmount = 0;
    var selectedOptions = $("select#vas option:selected");

    selectedOptions.each(function () {
        var amount = parseFloat($(this).data("price"));
        if (!isNaN(amount)) {
            totalAmount += amount;
        }
    });

    if (totalAmount > 0) {
        $(".hideShowVAS").show();
    } else {
        $(".hideShowVAS").hide();
    }

    $("#vasAmount").text(totalAmount.toFixed(2));

    if (isNaN(totalAmount)) {
        totalAmount = 0;
    }

    return totalAmount;
}

function vatCalculate(totalAmount) {
    let vatRate = parseFloat($("#vatRate").val());
    let vat = totalAmount * (vatRate / 100);

    if (isNaN(vat)) {
        vat = 0;
    }

    return vat;
}

$(".hideShowDiscount").hide();
function applyCoupon() {
    const coupon = $("#coupon").val();
    const charge = parseFloat($("#totalCharge").text()) ?? 0;
    const url = $("#coupon").data("url");

    if (coupon == "") {
        $("#coupon_error_text").addClass("d-none"); // Add the d-none class
        totalSum();
        return;
    }

    $.ajax({
        type: "POST",
        url: url,
        data: { coupon: coupon, charge: charge },
        dataType: "json",
        success: function (response) {
            if (response.verify) {
                // Display the discount
                $(".hideShowDiscount").show();
                $("#discount").text(parseFloat(response.discount).toFixed(2));
                $("#coupon_error_text").addClass("d-none"); // Add the d-none class
            } else {
                // Handle an invalid coupon
                $("#coupon_error_text").removeClass("d-none"); // Remove the d-none class
                $("#coupon_error_text").text(response.error);
                $(".hideShowDiscount").hide();
                $("#discount").text("0.00"); // Set the discount to 0.00
            }
        },
        error: function (response) {
            $("#coupon_error_text").removeClass("d-none"); // Remove the d-none class
            $("#coupon_error_text").text(
                JSON.parse(response.responseText).message
            );
            $(".hideShowDiscount").hide();
            $("#discount").text("0.00"); // Set the discount to 0.00
        },
    }).always(() => totalSum());
}

async function totalSum() {
    let cash = cashCollection();

    let liquidFragile = liquidFragileCharge();

    let cod = await codCharge();

    let vas = vasCharge();

    let charge = parseFloat($("#charge").val());
    if (isNaN(charge)) {
        charge = 0;
    }

    let discount = parseFloat($("#discount").text());
    if (isNaN(discount)) {
        discount = 0;
    }

    let allCharge = charge + cod + liquidFragile + vas - discount;

    let vat = vatCalculate(allCharge);

    let totalCharge = allCharge + vat;

    let currentPayable = cash - totalCharge;

    $("#chargeAmount").text(charge.toFixed(2));

    $("#VatAmount").text(vat.toFixed(2));

    $("#totalCharge").text(totalCharge.toFixed(2));

    $("#currentPayable").text(currentPayable.toFixed(2));
}
