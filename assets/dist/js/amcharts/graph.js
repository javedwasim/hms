$(document).ready(function () {
    var site_base_url = $('#base').val();
    var startDate;
    var endDate;
    var startDatePreview;
    var endDatePreview;
    var generateParam;
    var monthdate;
    var yeardate;

    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#daterange-btn span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');
            startDatePreview = start.format('DD-MM-YYYY');
            endDatePreview = end.format('DD-MM-YYYY');
            generateParam = 'range';
        }
    );
    $('#generate-btn').click(function () {
        console.debug(startDate + endDate + generateParam + startDatePreview + endDatePreview);
        if (startDate != undefined && endDate != undefined && generateParam != undefined && startDatePreview != undefined && endDatePreview != undefined) {
            console.debug(startDate + endDate + generateParam + startDatePreview + endDatePreview);
            generateGraph(startDate, endDate, generateParam, startDatePreview, endDatePreview);
        }
        else {
            alert("Please select a valid date range from the Date Picker");
        }
    });
    $('#otg-daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#otg-daterange-btn span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');
            startDatePreview = start.format('DD-MM-YYYY');
            endDatePreview = end.format('DD-MM-YYYY');
            generateParam = 'range';
        }
    );

// Code to generate graph by Month starts from here
    $('#generate-month-btn').click(function () {
        var startMonthDate = moment().startOf('year').format('YYYY-MM');
        var endMonthDate = moment().format('YYYY-MM');
        var startMonthDateParam = moment().startOf('year').format('MM-YYYY');
        var endMonthDateParam = moment().format('MM-YYYY');
        if (startMonthDate != undefined && endMonthDate != undefined) {

            generateGraph(startMonthDate, endMonthDate, 'monthly', startMonthDateParam, endMonthDateParam);
        }

    });
// Code to generate graph by Month ends here
//Code to generate graph by Year starts here
    $('#generate-year-btn').click(function () {
        var startMonthDate = '2018-01-01';
        var endMonthDate = moment().format('YYYY-MM-DD');
        var startMonthDateParam = '2018';
        var endMonthDateParam = moment().format('YYYY');
        if (startMonthDate != undefined && endMonthDate != undefined) {
            generateGraph(startMonthDate, endMonthDate, 'yearly', startMonthDateParam, endMonthDateParam);
        }
    });
//Code to generate graph by Year ends Here
// Code to generate graph by Date Range starts from here

    $('#generate-ot-btn').click(function () {

        if (startDate != undefined && endDate != undefined && generateParam != undefined && startDatePreview != undefined && endDatePreview != undefined) {
            generateotGraph(startDate, endDate, generateParam, startDatePreview, endDatePreview);
        }
        else {
            alert("Please select a valid date range from the Date Picker");
        }
    });
// Code to generate graph by Date Range ends here
// Code to generate outcome graph by Date Range starts here
    $('#outcome-daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#outcome-daterange-btn span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');
            startDatePreview = start.format('DD-MM-YYYY');
            endDatePreview = end.format('DD-MM-YYYY');
            generateParam = 'range';
        }
    );
    $('#generate-outcome-btn').click(function () {

        if (startDate != undefined && endDate != undefined && generateParam != undefined && startDatePreview != undefined && endDatePreview != undefined) {
            generateoutcomeGraph(startDate, endDate, generateParam, startDatePreview, endDatePreview);
        }
        else {
            alert("Please select a valid date range from the Date Picker");
        }
    });
    // Code to generate outcome graph by Month starts from here
    $('#outcome-generate-month-btn').click(function () {
        var startMonthDate = moment().startOf('year').format('YYYY-MM');
        var endMonthDate = moment().format('YYYY-MM');
        var startMonthDateParam = moment().startOf('year').format('MM-YYYY');
        var endMonthDateParam = moment().format('MM-YYYY');
        if (startMonthDate != undefined && endMonthDate != undefined) {
            generateoutcomeGraph(startMonthDate, endMonthDate, 'monthly', startMonthDateParam, endMonthDateParam);
        }

    });
// Code to generate outcome graph by Month ends here
//Code to generate outcome graph by Year starts here
    $('#outcome-generate-year-btn').click(function () {
        var startMonthDate = '2018-01-01';
        var endMonthDate = moment().format('YYYY-MM-DD');
        var startMonthDateParam = '2018';
        var endMonthDateParam = moment().format('YYYY');
        if (startMonthDate != undefined && endMonthDate != undefined) {
            generateoutcomeGraph(startMonthDate, endMonthDate, 'yearly', startMonthDateParam, endMonthDateParam);
        }
    });
//Code to generate outcome graph by Year ends Here

    //Code to generate the graph based on patient revisits starts here
    $('#revisit-daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#revisit-daterange-btn span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');
            startDatePreview = start.format('DD-MM-YYYY');
            endDatePreview = end.format('DD-MM-YYYY');
            generateParam = 'range';
        }
    );

    $('#generate-revisit-btn').click(function () {

        if (startDate != undefined && endDate != undefined && generateParam != undefined && startDatePreview != undefined && endDatePreview != undefined) {
            generaterevisitGraph(startDate, endDate, generateParam, startDatePreview, endDatePreview);
        }
        else {
            alert("Please select a valid date range from the Date Picker");
        }
    });
    $('#revisit-generate-month-btn').click(function () {
        var startMonthDate = moment().startOf('year').format('YYYY-MM');
        var endMonthDate = moment().format('YYYY-MM');
        var startMonthDateParam = moment().startOf('year').format('MM-YYYY');
        var endMonthDateParam = moment().format('MM-YYYY');
        if (startMonthDate != undefined && endMonthDate != undefined) {
            generaterevisitGraph(startMonthDate, endMonthDate, 'monthly', startMonthDateParam, endMonthDateParam);
        }

    });
    $('#revisit-generate-year-btn').click(function () {
        var startMonthDate = '2018-01-01';
        var endMonthDate = moment().format('YYYY-MM-DD');
        var startMonthDateParam = '2018';
        var endMonthDateParam = moment().format('YYYY');
        if (startMonthDate != undefined && endMonthDate != undefined) {
            generaterevisitGraph(startMonthDate, endMonthDate, 'yearly', startMonthDateParam, endMonthDateParam);
        }
    });
    //Code to generate the graph based on patient revists ends here

// Code to generate outcome graph by Date Range ends here

// Code to generate DISEASE pie chart starts here

    $('#disease-generate-month-btn').click(function () {
        var monthdate = $('#month-selectbox').val();
        if (monthdate !== undefined && monthdate !== '') {
            generatediseasepieChart(monthdate,'monthly');
        }
        else{
            alert("Please select a valid month from the select box");
        }

    });
    $('#disease-generate-year-btn').click(function () {
        var yeardate = $('#year-selectbox').val();
        if (yeardate !== undefined && yeardate !== '') {
            generatediseasepieChart(yeardate,'yearly');
        }
        else{
            alert("Please select a valid year from the select box");
        }
    });
// Code to generate DISEASE pie chart ends here


//Graph Generator function to generate graph starts from here
    function generateGraph(startDateParam, endDateParam, generateByParam, startDatePreviewParam, endDatePreviewParam) {
        function loadJSON(url) {
            // create the request
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                var request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            // load it
            // the last "false" parameter ensures that our code will wait before the
            // data is loaded
            request.open('GET', url, false);
            request.send();

            // parse and return the output
            return eval(request.responseText);
        };

        function loadChart() {
            // load the data
            var chartData = loadJSON(site_base_url + 'dashboard/admission_discharge_graph/?f=' + startDateParam + '&t=' + endDateParam + '&generateBy=' + generateByParam);
            console.debug(site_base_url + 'dashboard/admission_discharge_graph/?f=' + startDate + '&t=' + endDate + '&generateBy=' + generateParam);
            $('#chartdiv').show();
            AmCharts.makeChart("chartdiv",
                {
                    "type": "serial",
                    "categoryField": "category",
                    "startDuration": 1,
                    "theme": "light",
                    "fontSize": 9,
                    "categoryAxis": {
                        "gridPosition": "start",
                        "autoWrap": true
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "No of [[title]]: [[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-1",
                            "title": "Admission",
                            "type": "column",
                            "valueField": "admission",
                            "columnWidth": 0.35
                        },
                        {
                            "balloonText": "No of [[title]]: [[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-2",
                            "title": "Discharge",
                            "type": "column",
                            "valueField": "discharge",
                            "columnWidth": 0.35
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "No. of Patients",
                            "precision": 0
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "legend": {
                        "enabled": true,
                        "useGraphSettings": true
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Admission - Discharge Graph from " + startDatePreviewParam + " to " + endDatePreviewParam
                        }
                    ],
                    "dataProvider": chartData
                });
            // build the chart
            // ...
        };
        loadChart();
    }

    function generateotGraph(startDateParam, endDateParam, generateByParam, startDatePreviewParam, endDatePreviewParam) {
        function loadJSON(url) {
            // create the request
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                var request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            // load it
            // the last "false" parameter ensures that our code will wait before the
            // data is loaded
            request.open('GET', url, false);
            request.send();

            // parse and return the output
            return eval(request.responseText);
        };

        function loadChart() {
            // load the data
            ///dashboard/operated_patients_graph/?f=2018-03-03&t=2018-03-16&generateBy=range
            var chartData = loadJSON(site_base_url + 'dashboard/operated_patients_graph/?f=' + startDateParam + '&t=' + endDateParam + '&generateBy=' + generateByParam);
            //  console.debug(site_base_url +'dashboard/operated_patients_graph/?f='+ startDate +'&t='+ endDate+'&generateBy='+ generateParam);
            $('#otg-chartdiv').show();
            AmCharts.makeChart("otg-chartdiv",
                {
                    "type": "serial",
                    "categoryField": "category",
                    "dataDateFormat": "YYYY-MM-DD",
                    "startDuration": 1,
                    "theme": "light",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "parseDates": true
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "No. of operated Patients: [[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-1",
                            "title": "graph 1",
                            "type": "column",
                            "valueField": "operated_patients_count"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "No. of Patients",
                            "precision": 0
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Operated Patients Graph"
                        }
                    ],
                    "dataProvider": chartData
                });
        };
        loadChart();
    }

    function generateoutcomeGraph(startDateParam, endDateParam, generateByParam, startDatePreviewParam, endDatePreviewParam) {
        function loadJSON(url) {
            // create the request
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                var request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            // load it
            // the last "false" parameter ensures that our code will wait before the
            // data is loaded
            request.open('GET', url, false);
            request.send();

            // parse and return the output
            return eval(request.responseText);
        };

        function loadChart() {
            // load the data
            ///dashboard/operated_patients_graph/?f=2018-03-03&t=2018-03-16&generateBy=range
            var chartData = loadJSON(site_base_url + 'dashboard/outcome_patients_graph/?f=' + startDateParam + '&t=' + endDateParam + '&generateBy=' + generateByParam);
            //  console.debug(site_base_url +'dashboard/operated_patients_graph/?f='+ startDate +'&t='+ endDate+'&generateBy='+ generateParam);
            $('#outcome-chartdiv').show();
            AmCharts.makeChart("outcome-chartdiv",
                {
                    "type": "serial",
                    "categoryField": "date",
                    "dataDateFormat": "DD-MM-YYYY",
                    "theme": "light",
                    "categoryAxis": {
                    },
                    "chartCursor": {
                        "enabled": true
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "No. of Cured Patients: [[value]]",
                            "bullet": "round",
                            "id": "AmGraph-1",
                            "title": "Cured",
                            "valueField": "cured"
                        },
                        {
                            "balloonText": "No. of LAMA Patients: [[value]]",
                            "bullet": "round",
                            "id": "AmGraph-2",
                            "title": "LAMA",
                            "valueField": "lama"
                        },
                        {
                            "balloonText": "No. of DOR Patients: [[value]]",
                            "bullet": "round",
                            "id": "AmGraph-3",
                            "title": "DOR",
                            "valueField": "dor"
                        },
                        {
                            "balloonText": "No. of Discharged Patients: [[value]]",
                            "bullet": "round",
                            "id": "AmGraph-4",
                            "title": "Discharged",
                            "valueField": "discharged"
                        },
                        {
                            "balloonText": "No. of Referred Patients: [[value]]",
                            "bullet": "round",
                            "id": "AmGraph-5",
                            "title": "Referred",
                            "valueField": "referred"
                        },
                        {
                            "balloonText": "No. of Deceased Patients: [[value]]",
                            "bullet": "round",
                            "id": "AmGraph-6",
                            "title": "Death",
                            "valueField": "death"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "No. of Patients",
                            "precision": 0
                        }
                    ],
                    "allLabels": [],
                    "balloon": {
                        "showBullet": true
                    },
                    "legend": {
                        "enabled": true,
                        "useGraphSettings": true
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Outcome Based Graph"
                        }
                    ],
                    "dataProvider": chartData

                });
        };
        loadChart();
    }

    function generaterevisitGraph(startDateParam, endDateParam, generateByParam, startDatePreviewParam, endDatePreviewParam) {
        function loadJSON(url) {// create the request
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                var request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            // load it
            // the last "false" parameter ensures that our code will wait before the
            // data is loaded
            request.open('GET', url, false);
            request.send();

            // parse and return the output
            return eval(request.responseText);
        };

        function loadChart() {
            // load the data
            ///dashboard/operated_patients_graph/?f=2018-03-03&t=2018-03-16&generateBy=range
            var chartData = loadJSON(site_base_url + 'dashboard/revisit_patients_graph/?f=' + startDateParam + '&t=' + endDateParam + '&generateBy=' + generateByParam);
            console.debug(site_base_url + 'dashboard/revisit_patients_graph/?f=' + startDateParam + '&t=' + endDateParam + '&generateBy=' + generateByParam);
            $('#revisit-chartdiv').show();
            AmCharts.makeChart("revisit-chartdiv",
                {
                    "type": "serial",
                    "categoryField": "date",
                    "dataDateFormat": "YYYY-MM-DD",
                    "startDuration": 1,
                    "theme": "light",
                    "categoryAxis": {
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "No. of revisited Patients: [[value]]",
                            "fillAlphas": 1,
                            "id": "AmGraph-1",
                            "title": "graph 1",
                            "type": "column",
                            "valueField": "revisits",
                            "columnWidth": 0.35
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "No. of Patients",
                            "precision": 0
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Graph based on Patient Re-visits"
                        }
                    ],
                    "dataProvider": chartData
                });
        };
        loadChart();
    }

    function generatediseasepieChart(monthdate, generateByParam) {
        function loadJSON(url) {// create the request
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                var request = new ActiveXObject('Microsoft.XMLHTTP');
            }

            // load it
            // the last "false" parameter ensures that our code will wait before the
            // data is loaded
            request.open('GET', url, false);
            request.send();

            // parse and return the output

            return eval(request.responseText);
        };

        function loadChart() {
            // load the data

            var chartData = loadJSON(site_base_url + 'dashboard/disease_based_graph/?d=' + monthdate + '&generateBy=' + generateByParam);
            if( chartData[0] !== undefined) {
                $('#disease-chartdiv').show();
                AmCharts.makeChart("disease-chartdiv",
                    {
                        "type": "pie",
                        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                        "titleField": "disease-name",
                        "valueField": "disease-count",
                        "theme": "light",
                        "allLabels": [],
                        "balloon": {},
                        "legend": {
                            "enabled": true,
                            "align": "center",
                            "markerType": "circle"
                        },
                        "titles": [
                            {
                                "text": "Graph based on the Diseases"
                            }
                        ],
                        "dataProvider": chartData
                    });
            }
            else {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                    'No data has been recorded during this period.\n' +
                    '</div>');
                $('.alert-error').delay(4000).fadeOut('slow');
            }
            };

        loadChart();
    }
//Graph Generator function to generate graph ends here
//Arslan Codes ends here
});