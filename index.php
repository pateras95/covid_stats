<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Stats Parallax Scroll</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap');

        body,
        html {
            width: 100%;
            height: 100vh;
            background: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 99px;
            text-align: center;
        }

        main {
            position: absolute;
        }

        .above-all {
            display: flex;
            flex-direction: column;
            row-gap: 0.4rem;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 1200px;
        }

        .values-container {
            border: 2px dotted #162a43;
            background: #fff;
            position: relative !important;
            font-size: 18px !important;
            width: 100%;
            padding: 15px;
            text-transform: uppercase;
            margin: 15px auto 0px auto;
            display: flex;
            text-align: center;
            justify-content: center;
            color: #162a43;
            align-items: center;
        }

        .title-top {
            text-align: center;
            width: 100%;
            color: #162a43;
            top: 1010px;
        }

        .infos-container {
            position: relative !important;
            font-size: 18px !important;
            width: 50%;
            margin: 25px auto 0px auto;
            display: flex;
            flex-direction: column;
            text-align: justify;
            justify-content: center;
            color: #162a43;
            align-items: center;
            z-index: 2;
        }

        .infos-chart-container {
            position: relative !important;
            font-size: 18px !important;
            width: 50%;
            margin: 5px auto;
            display: flex;
            flex-direction: column;
            text-align: justify;
            justify-content: center;
            color: #162a43;
            align-items: center;
            z-index: 2;
        }

        .info-values-container {
            display: flex !important;
            justify-content: center;
            column-gap: 40px;
            align-items: center;
        }

        .title {
            position: absolute;
        }

        .custom-form {
            display: none;
        }

        .test {
            position: relative;
        }

        .href-infos {
            font-size: 15px;
            font-style: italic;
            text-align: center;
            color: #162a43;
        }

        .sumbit-button {
            border: 2px solid #162a43;
            background: #162a43;
            color: #fff;
            font-size: 15px !important;
            padding: 5px;
            border-radius: 10px;
            width: 280px;
        }

        .values-title {
            color: #162a43;
            font-size: 32px;
        }

        .input-custom {
            border: 2px solid #162a43;
            font-size: 15px !important;
            padding: 5px;
            border-radius: 10px;
            width: 280px;
        }

        .values-title_2 {
            color: #162a43;
            font-size: 44px;
        }

        .chart-graph {
            position: relative !important;
            margin: 0 auto;
        }

        .chart-filters {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            font-size: 18px !important;
            width: 100%;
        }

        .value_text {
            color: green;
            font-weight: 700;
        }

        .value_text_2 {
            color: blue;
            font-weight: 700;
        }

        .class-charts {
            display: flex;
            justify-content: space-evenly;
            column-gap: 1rem;
            align-items: center;
        }

        @media screen and (max-width: 997px) {
            .chart-filters {
                flex-direction: column;
                margin-bottom: 220px;
                row-gap: 0.2rem;
            }

            .chart-graph {
                margin: 200px auto;
            }
        }
    </style>
</head>

<body>
    <div class="scrollDist"></div>
    <div class="main" id="svg-container">
        <svg viewBox="0 0 1200 800" xmlns="http://www.w3.org/2000/svg">
            <mask id="m">
                <g class="cloud1">
                    <rect fill="#fff" width="100%" height="801" y="799" />
                    <image xlink:href="https://assets.codepen.io/721952/cloud1Mask.jpg" width="1200" height="800" />
                </g>
            </mask>

            <image class="sky" xlink:href="https://assets.codepen.io/721952/sky.jpg" width="1200" height="590" />
            <image class="mountBg" xlink:href="https://upload.wikimedia.org/wikipedia/commons/9/94/Coronavirus._SARS-CoV-2.png" width="1200" height="800" />
            <image class="cloud2" xlink:href="https://assets.codepen.io/721952/cloud2.png" width="1200" height="800" />
            <image class="cloud1" xlink:href="https://assets.codepen.io/721952/cloud1.png" width="1200" height="800" />
            <image class="cloud3" xlink:href="https://assets.codepen.io/721952/cloud3.png" width="1200" height="800" />
            <text fill="#fff" x="300" y="200">Covid Stats</text>
            <polyline class="arrow" fill="#fff" points="599,250 599,289 590,279 590,282 600,292 610,282 610,279 601,289 601,250" />

            <g mask="url(#m)" class="title">
                <rect fill="#fff" width="100%" height="100%" />
                <text class="title" x="220" y="200" fill="#162a43">Lets See Some</text>
            </g>
            <rect id="arrowBtn" width="100" height="100" opacity="0" x="550" y="220" style="cursor:pointer" />
        </svg>
    </div>
    <div class="above-all" id="above-all">
        <div class="values-title_2">Today 3/6/2023</div>
        <div class="info-values-container">
            <div>
                <div class="values-title">Global Values</div>
                <div class="values-container" id="infos_div"></div>
            </div>
            <div>
                <div class="values-title">Greece Values</div>
                <div class="values-container" id="infos_div_2"></div>
            </div>
        </div>
        <div class="infos-container">
            <h1 id="down">About</h1>
            Daily COVID-19 statistics are provided by visiting certain Wikipedia pages and extracting specific data, such as
            how many people have been fully vaccinated, have recieved at least one dose of the vaccine, as well as how many
            doses have been administered in total. The data can be compared and visualized in graphs below.
        </div>
        <div class="infos-chart-container" id="contact">
            <div class="href-infos">*All data is extracted from : <a href="https://en.wikipedia.org/wiki/COVID-19_pandemic_by_country_and_territory" target="_blank">COVID-19 Pandemic By Country And Territory</a></div>
            <div class="href-infos">*Wikipedia's original data source : <a href="https://ourworldindata.org/" target="_blank">Our World in Data</a></div>
            <p style="margin-top: 180px;">Below you can find some graphs and you can change the graphs based on filters.You can select a field (Total vaccinated, Fully vaccinated, Doses Administered), a date and the type of graph to see how the values change globally in that time period.</p>
        </div>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid_schema";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT date FROM vaccinations";
        $result = $conn->query($sql);

        //            Με το κουμπι πέρνω τις τιμές απο τα checkboxes.#1ο Μέρος
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<form action='#' method='post'>";
            echo '<div class="chart-filters">';
            echo "<input class='input-custom' type='date'  name='date' id='date'>";
            echo "<select class='input-custom' name='options'>                      
                <option value='total_vaccinated'>Total Vaccinated</option>
                <option value='fully_vaccinated'>Fully Vaccinated</option>
                <option value='doses_administered'>Doses Administered</option>
                </select>";
            echo "<select class='input-custom' name='options_charts'> 
                <option value='chart'>Charts</option>    
                <option value='pie'>Line Chart</option>
                <option value='step'>Stepped Area Chart</option>
                </select>";
            echo "<input class='sumbit-button' type='submit' name='submit' value='Display New Charts'/>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "0 results";
        }

        if (isset($_POST['submit'])) {
            $selected_val = $_POST['options'];
            $selected_date = $_POST['date'];
            $selected_val_chart = $_POST['options_charts'];
        }

        $query = "SELECT `doses_administered` FROM vaccinations ORDER BY `date`";
        $results = $conn->query($query);

        $growth_rates = [];
        $previous_value = null;

        // Calculate growth rates
        foreach ($results as $row) {
            $value = $row['doses_administered'];

            if ($previous_value !== null) {
                $growth_rate = (($value - $previous_value) / $previous_value) * 100;
                $growth_rates[] = $growth_rate;
            }
            $previous_value = $value;
        }

        // Calculate average growth rate
        $average_growth_rate = array_sum($growth_rates) / count($growth_rates);

        // Print the result
        $average_growth_rate = number_format($average_growth_rate, 2);

        $query2 = "SELECT `doses_administered` FROM vaccinations_by_country ORDER BY `date`";
        $results2 = $conn->query($query2);

        $growth_rates2 = [];
        $previous_value2 = null;

        // Calculate growth rates
        foreach ($results2 as $row) {
            $value2 = $row['doses_administered'];

            if ($previous_value2 !== null) {
                $growth_rate2 = (($value2 - $previous_value2) / $previous_value2) * 100;
                $growth_rates2[] = $growth_rate2;
            }
            $previous_value2 = $value2;
        }

        // Calculate average growth rate
        $average_growth_rate2 = array_sum($growth_rates2) / count($growth_rates2);

        // Print the result
        $average_growth_rate2 = number_format($average_growth_rate2, 2);
        ?>
        <div class="chart-graph" id="piechart"></div>
        <div class="infos-chart-container" id="contact">
            <p>The graph comparing the global growth rate of doses administered and Greece's growth rate of doses administered.</p>
            <div class="class-charts">
                <div>Greece Growth Rate :<span style="color:blue"> ~100.000</span></div>
                <div>Global Growth Rate :<span style="color:green"> ~1.360.000</span></div>
            </div>
        </div>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", {
                        role: "style"
                    }],
                    ["Greece Growth Rate (Doses Administered)", <?php echo $average_growth_rate2 ?>, "blue"],
                    ["Global Growth Rate (Doses Administered)", <?php echo $average_growth_rate ?>, "green"],
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {
                        calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"
                    },
                    2
                ]);

                var options = {
                    title: "Growth Rate (Doses Administered)",
                    width: 600,
                    height: 200,
                    bar: {
                        groupWidth: "95%"
                    },
                    legend: {
                        position: "none"
                    },
                };
                var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                chart.draw(view, options);
            }
        </script>
        <div id="barchart_values" style="margin:0 auto; width: 600px; height: 300px;"></div>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'date');
                data.addColumn('number', 'total_vaccinated');
                data.addColumn('number', 'fully_vaccinated');

                <?php
                $sql = "SELECT `date`, `total_vaccinated`, `fully_vaccinated` FROM vaccinations";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "data.addRow(['" . $row["date"] . "', " . $row["total_vaccinated"] . ", " . $row["fully_vaccinated"] . "]);";
                    }
                } else {
                    echo "data.addRow(['No data', 0, 0]);"; // Provide a default row when there are no results
                }
                ?>

                var options = {
                    title: 'Total Vaccinated with Fully Vaccinated Comparison Area Graph',
                    width: 900,
                    height: 500,
                    hAxis: {
                        title: 'date',
                        titleTextStyle: {
                            color: '#333'
                        },
                        slantedText: true,
                        slantedTextAngle: 45
                    },
                    series: {
                        0: {
                            color: '#1f77b4'
                        }, // Color for the total_vaccinated series
                        1: {
                            color: '#ff7f0e'
                        } // Color for the fully_vaccinated series
                    },
                    pointSize: 5, // Increase the size of the data points
                    lineWidth: 2, // Increase the width of the line
                };

                var chart = new google.visualization.AreaChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>

        <?php
        if (isset($_POST['submit'])) {
            if ($selected_val_chart == "pie") {
        ?>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Country', "<?php echo $selected_val ?>"],
                            <?php
                            if (isset($_POST['submit'])) {
                                $sql = "SELECT `date`,`$selected_val` FROM vaccinations WHERE `date`>='$selected_date'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "['" . $row["date"] . "', " . $row[$selected_val] . "],";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                            ?>
                        ]);

                        var options = {
                            title: 'Chart displaing <?php echo $selected_val ?> globally.',
                            width: 900,
                            height: 500,
                            curveType: 'function',
                            pointSize: 5, // Increase the size of the data points
                            lineWidth: 2, // Increase the width of the line,
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
        <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['submit'])) {
            if ($selected_val_chart == "step") {
        ?>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Country', "<?php echo $selected_val ?>"],
                            <?php
                            if (isset($_POST['submit'])) {
                                $sql = "SELECT `date`,`$selected_val` FROM vaccinations WHERE `date`>='$selected_date'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "['" . $row["date"] . "', " . $row[$selected_val] . "],";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                            ?>
                        ]);

                        var options = {
                            title: 'Chart displaing <?php echo $selected_val ?> globally.',
                            width: 900,
                            height: 500,
                            curveType: 'function',
                            pointSize: 5, // Increase the size of the data points
                            lineWidth: 2, // Increase the width of the line,
                        };

                        var chart = new google.visualization.SteppedAreaChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
        <?php
            }
        }
        ?>
        <form class="custom-form" method="post" id="covid_sumbit" action="index.php">
            <div id="chart_div"></div>
            <input type="submit" class="pure-button pure-button-primary" name="search_reg" value="Καταχώρηση στην Βάση">
        </form>

        <form class="custom-form" method="post" id="covid_sumbit_2" action="index.php">
            <div id="chart_div_2"></div>
            <input type="submit" class="pure-button pure-button-primary" name="search_reg_2" value="Καταχώρηση στην Βάση">
        </form>
    </div>

    <script>
        $(document).ready(function() {
            function fetchVaccinations() {
                const url = 'https://en.wikipedia.org/w/api.php?action=parse&format=json&page=COVID-19_pandemic_by_country_and_territory&redirects&prop=text&callback=?';
                $.ajax({
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        const infobox = $(data.parse.text['*']).find('.infobox');
                        const vaccinations = $(infobox).find('.infobox-label:contains("Vaccinations")').next('.infobox-data').find('li').map(function() {
                            return $(this).text().replace(/ *\[[^\]]*\]/, '');
                        }).get();
                        var label = []
                        var values = []
                        var output = '';
                        var output2 = '';
                        for (var i = 0; i < vaccinations.length; i++) {
                            var parts = vaccinations[i].split(/(\([^()]+\))/g).filter(Boolean);
                            output += '<div>';
                            for (var j = 0; j < parts.length; j++) {
                                if (parts[j].startsWith('(')) {
                                    label.push(parts[j])
                                    console.log(label)
                                } else {
                                    values.push(parts[j])
                                    console.log(values)
                                }
                            }
                        }
                        for (var i = 0; i < 3; i++) {
                            label[i] = label[i].replace(/([()])/g, '')
                            output += '<label>' + label[i] + '</label><br>'
                            values[i] = values[i].replace(/[, ]+/g, '')
                            output += '<input name="' + label[i] + '" id="' + label[i] + '" type="" value=' + values[i] + ' type="number"> <br><br>'
                        }
                        output += '</div>';


                        $('#chart_div').html(output);

                        output2 += '<div>';
                        for (var i = 0; i < 3; i++) {
                            output2 += '<span>' + label[i] + '  :  </span>'
                            output2 += '<span class="value_text">    ' + values[i] + '</span> <br><br>'
                        }
                        output2 += '</div>';
                        $('#infos_div').html(output2);
                    }
                });
            }

            function fetchVaccinationsGreece() {
                const url = 'https://en.wikipedia.org/w/api.php?action=parse&format=json&page=COVID-19_pandemic_in_Greece&redirects&prop=text&callback=?'
                $.ajax({
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        const infobox = $(data.parse.text['*']).find('.infobox');
                        const vaccinations = $(infobox).find('.infobox-label:contains("Vaccinations")').next('.infobox-data').find('li').map(function() {
                            return $(this).text().replace(/ *\[[^\]]*\]/, '');
                        }).get();
                        var label = []
                        var values = []
                        var output = '';
                        var output2 = '';
                        for (var i = 0; i < vaccinations.length; i++) {
                            var parts = vaccinations[i].split(/(\([^()]+\))/g).filter(Boolean);
                            output += '<div>';
                            for (var j = 0; j < parts.length; j++) {
                                if (parts[j].startsWith('(')) {
                                    label.push(parts[j])
                                    console.log(label)
                                } else {
                                    values.push(parts[j])
                                    console.log(values)
                                }
                            }
                        }
                        for (var i = 0; i < 3; i++) {
                            label[i] = label[i].replace(/([()])/g, '')
                            output += '<label>' + label[i] + '</label><br>'
                            values[i] = values[i].replace(/[, ]+/g, '')
                            output += '<input name="' + label[i] + '" id="' + label[i] + '" type="" value=' + values[i] + ' type="number"> <br><br>'
                        }
                        output += '</div>';


                        $('#chart_div_2').html(output);

                        output2 += '<div>';
                        for (var i = 0; i < 3; i++) {
                            output2 += '<span>' + label[i] + '  :  </span>'
                            output2 += '<span class="value_text_2">    ' + values[i] + '</span> <br><br>'
                        }
                        output2 += '</div>';
                        $('#infos_div_2').html(output2);
                    }
                });
            }

            // Call the fetch function
            const duration = 24 * 60 * 60 * 1000; //24 hours
            fetchVaccinations();
            fetchVaccinationsGreece();
            window.setTimeout(function() {
                //   $("input[name=search_reg]").click();
                //   $("input[name=search_reg_2]").click();
            }, duration);

            $(window).scroll(function() {
                if ($(window).scrollTop() > 887) {
                    $('#svg-container').hide();
                } else {
                    $('#svg-container').show();
                }
            });

            gsap.set('.main', {
                position: 'fixed',
                background: '#fff',
                width: '100%',
                maxWidth: '1200px',
                height: '100%',
                top: 0,
                left: '50%',
                x: '-50%'
            })
            gsap.set('.scrollDist', {
                width: '100%',
                height: '200%'
            })
            gsap.timeline({
                    scrollTrigger: {
                        trigger: '.scrollDist',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 1
                    }
                })
                .fromTo('.sky', {
                    y: 0
                }, {
                    y: -200
                }, 0)
                .fromTo('.cloud1', {
                    y: 100
                }, {
                    y: -800
                }, 0)
                .fromTo('.cloud2', {
                    y: -150
                }, {
                    y: -500
                }, 0)
                .fromTo('.cloud3', {
                    y: -50
                }, {
                    y: -650
                }, 0)
                .fromTo('.mountBg', {
                    y: -25
                }, {
                    y: -100
                }, 0)
            $('#arrowBtn').on('mouseenter', (e) => {
                gsap.to('.arrow', {
                    y: 10,
                    duration: 0.8,
                    ease: 'back.inOut(3)',
                    overwrite: 'auto'
                });
            })
            $('#arrowBtn').on('mouseleave', (e) => {
                gsap.to('.arrow', {
                    y: 0,
                    duration: 0.5,
                    ease: 'power3.out',
                    overwrite: 'auto'
                });
            })
            $('#arrowBtn').on('click', (e) => {
                gsap.to(window, {
                    scrollTo: innerHeight,
                    duration: 1.5,
                    ease: 'power1.inOut'
                });
            }) // scrollTo requires the ScrollTo plugin (not to be confused w/ ScrollTrigger)
        });
    </script>
</body>

</html>