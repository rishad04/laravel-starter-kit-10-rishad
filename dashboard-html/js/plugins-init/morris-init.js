(function ($) {
    "use strict";

    Morris.Donut({
        element: "morris_donught",
        data: [
            {
                label: "\xa0 \xa0 Download Sales \xa0 \xa0",
                value: 20,
            },
            {
                label: "\xa0 \xa0 In-Store Sales \xa0 \xa0",
                value: 30,
            },
            {
                label: "\xa0 \xa0 Mail-Order Sales \xa0 \xa0",
                value: 12,
            },
            {
                label: "\xa0 \xa0 Text sales  \xa0 \xa0",
                value: 15,
            },
        ],
        resize: true,
        colors: ["#0d6efd", "#0CAF60", "#FF3B3B", "#ff006e"],
    });

    //donught chart
    Morris.Donut({
        element: "morris_donught_2",
        data: [
            {
                label: "\xa0 \xa0 Download Sales \xa0 \xa0",
                value: 12,
            },
            {
                label: "\xa0 \xa0 In-Store Sales \xa0 \xa0",
                value: 30,
            },
            {
                label: "\xa0 \xa0 Mail-Order Sales \xa0 \xa0",
                value: 20,
            },
        ],
        resize: true,
        colors: ["#0d6efd", "#0CAF60", "#FF3B3B"],
    });

    //line chart
    let line = new Morris.Line({
        element: "morris_line",
        resize: true,
        data: [
            {
                y: "2011 Q1",
                item1: 2666,
            },
            {
                y: "2011 Q2",
                item1: 2778,
            },
            {
                y: "2011 Q3",
                item1: 4912,
            },
            {
                y: "2011 Q4",
                item1: 3767,
            },
            {
                y: "2012 Q1",
                item1: 6810,
            },
            {
                y: "2012 Q2",
                item1: 5670,
            },
            {
                y: "2012 Q3",
                item1: 4820,
            },
            {
                y: "2012 Q4",
                item1: 15073,
            },
            {
                y: "2013 Q1",
                item1: 10687,
            },
            {
                y: "2013 Q2",
                item1: 8432,
            },
        ],
        xkey: "y",
        ykeys: ["item1"],
        labels: ["Item 1"],
        gridLineColor: "transparent",
        lineColors: ["rgb(192, 10, 39)"], //here
        lineWidth: 1,
        hideHover: "auto",
        pointSize: 0,
        axes: false,
    });

    //line chart
    Morris.Area({
        element: "line_chart_2",
        data: [
            {
                period: "2001",
                smartphone: 0,
                windows: 0,
                mac: 0,
            },
            {
                period: "2002",
                smartphone: 90,
                windows: 60,
                mac: 25,
            },
            {
                period: "2003",
                smartphone: 40,
                windows: 80,
                mac: 35,
            },
            {
                period: "2004",
                smartphone: 30,
                windows: 47,
                mac: 17,
            },
            {
                period: "2005",
                smartphone: 150,
                windows: 40,
                mac: 120,
            },
            {
                period: "2006",
                smartphone: 25,
                windows: 80,
                mac: 40,
            },
            {
                period: "2007",
                smartphone: 10,
                windows: 10,
                mac: 10,
            },
        ],
        xkey: "period",
        ykeys: ["smartphone", "windows", "mac"],
        labels: ["Phone", "Windows", "Mac"],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors: ["#DCDCDC", "#34C73B", "#0000FF"],
        behaveLikeLine: true,
        gridLineColor: "transparent",
        lineWidth: 3,
        hideHover: "auto",
        lineColors: ["rgb(192, 10, 39)", "rgb(0, 171, 197)", "#75B432"],
        resize: true,
    });

    //bar chart
    Morris.Bar({
        element: "morris_bar",
        data: [
            {
                y: "Sat",
                a: 100,
                b: 90,
            },
            {
                y: "Sun",
                a: 75,
                b: 65,
            },
            {
                y: "Mon",
                a: 50,
                b: 40,
            },
            {
                y: "Tue",
                a: 75,
                b: 65,
            },
            {
                y: "Wed",
                a: 50,
                b: 40,
            },
            {
                y: "Thu",
                a: 75,
                b: 65,
            },
            {
                y: "Fri",
                a: 100,
                b: 90,
            },
        ],
        xkey: "y",
        ykeys: ["a", "b"],
        labels: ["A", "B"],
        barColors: ["#06C270", "#0D6EFD"],
        hideHover: "auto",
        gridLineColor: "transparent",
        resize: true,
        barSizeRatio: 0.25,
    });

    //bar chart

    Morris.Bar({
        element: "morris_bar_stalked",
        data: [
            {
                y: "S",
                a: 66,
                b: 34,
            },
            {
                y: "M",
                a: 75,
                b: 25,
            },
            {
                y: "T",
                a: 50,
                b: 50,
            },
            {
                y: "W",
                a: 75,
                b: 25,
            },
            {
                y: "T",
                a: 50,
                b: 50,
            },
            {
                y: "F",
                a: 16,
                b: 84,
            },
            {
                y: "S",
                a: 70,
                b: 30,
            },
            {
                y: "S",
                a: 30,
                b: 70,
            },
            {
                y: "M",
                a: 40,
                b: 60,
            },
            {
                y: "T",
                a: 29,
                b: 71,
            },
            {
                y: "W",
                a: 44,
                b: 56,
            },
            {
                y: "T",
                a: 30,
                b: 70,
            },
            {
                y: "F",
                a: 60,
                b: 40,
            },
            {
                y: "G",
                a: 40,
                b: 60,
            },
            {
                y: "S",
                a: 46,
                b: 54,
            },
        ],
        xkey: "y",
        ykeys: ["a", "b"],
        labels: ["A", "B"],
        barColors: ["#f21780", "#F1F3F7"],
        hideHover: "auto",
        gridLineColor: "transparent",
        resize: true,
        barSizeRatio: 0.25,
        stacked: true,
        behaveLikeLine: true,
        // barRadius: [6, 6, 0, 0]
    });

    //area chart

    Morris.Area({
        element: "morris_area",
        data: [
            {
                period: "2001",
                smartphone: 0,
                windows: 0,
                mac: 0,
            },
            {
                period: "2002",
                smartphone: 90,
                windows: 60,
                mac: 25,
            },
            {
                period: "2003",
                smartphone: 40,
                windows: 80,
                mac: 35,
            },
            {
                period: "2004",
                smartphone: 30,
                windows: 47,
                mac: 17,
            },
            {
                period: "2005",
                smartphone: 150,
                windows: 40,
                mac: 120,
            },
            {
                period: "2006",
                smartphone: 25,
                windows: 80,
                mac: 40,
            },
            {
                period: "2007",
                smartphone: 10,
                windows: 10,
                mac: 10,
            },
        ],
        lineColors: ["#75B432", "rgb(0, 171, 197)", "rgb(0, 0, 128)"],
        xkey: "period",
        ykeys: ["smartphone", "windows", "mac"],
        labels: ["Phone", "Windows", "Mac"],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: "transparent",
        hideHover: "auto",
    });

    //area chart
    Morris.Area({
        element: "morris_area_2",
        data: [
            {
                period: "2010",
                SiteA: 0,
                SiteB: 0,
            },
            {
                period: "2011",
                SiteA: 130,
                SiteB: 100,
            },
            {
                period: "2012",
                SiteA: 80,
                SiteB: 60,
            },
            {
                period: "2013",
                SiteA: 70,
                SiteB: 200,
            },
            {
                period: "2014",
                SiteA: 180,
                SiteB: 150,
            },
            {
                period: "2015",
                SiteA: 105,
                SiteB: 90,
            },
            {
                period: "2016",
                SiteA: 250,
                SiteB: 150,
            },
        ],
        xkey: "period",
        ykeys: ["SiteA", "SiteB"],
        labels: ["Site A", "Site B"],
        pointSize: 0,
        fillOpacity: 0.6,
        pointStrokeColors: ["#b4becb", "#00A2FF"], //here
        behaveLikeLine: true,
        gridLineColor: "transparent",
        lineWidth: 0,
        smooth: false,
        hideHover: "auto",
        lineColors: ["rgb(0, 171, 197)", "rgb(0, 0, 128)"],
        resize: true,
    });

    //bar chart stalked

    Morris.Bar.prototype.fillForSeries = function (i) {
        var color;
        return "0-#f00-#f00:20-#f00";
    };

    Morris.Bar({
        element: "morris_bar_2",
        data: [
            { y: "2006", a: 100, b: 90, c: 80 },
            { y: "2007", a: 75, b: 65, c: 75 },
            { y: "2007", a: 75, b: 65, c: 75 },
            { y: "2007", a: 75, b: 65, c: 75 },
            { y: "2008", a: 50, b: 40, c: 45 },
            { y: "2009", a: 75, b: 65, c: 85 },
            { y: "2009", a: 79, b: 35, c: 45 },
            { y: "2009", a: 60, b: 20, c: 60 },
            { y: "2009", a: 66, b: 30, c: 50 },
            { y: "2009", a: 46, b: 60, c: 90 },
            { y: "2009", a: 35, b: 80, c: 60 },
        ],
        xkey: "y",
        ykeys: ["a", "b", "c"],
        labels: ["Series A", "Series B", "Series C"],
        barColors: ["rgb(0, 0, 128)", "rgb(0, 171, 197)", "#75B432"],
        stacked: true,
        gridTextSize: 11,
        hideHover: "auto",
        resize: true,
    });
})(jQuery);
