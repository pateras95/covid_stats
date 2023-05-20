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

        div {
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
            background: #fff;
            position: relative !important;
            font-size: 18px !important;
            width: 100%;
            text-transform: uppercase;
            margin: 15px auto;
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

        .title {
            position: absolute;
        }

        .custom-form {
            display: none;
        }

        .test {
            position: relative;
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

        .input-custom {
            border: 2px solid #162a43;
            font-size: 15px !important;
            padding: 5px;
            border-radius: 10px;
            width: 280px;
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
            margin-bottom: 300px;
            width: 100%;
        }

        .value_text {
            color: green;
            font-weight: 700;
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
    <!-- This is a recreation of Unfold's (https://dribbble.com/unfold) parallax scene: https://cdn.dribbble.com/users/14268/screenshots/3275340/northface.gif -->
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
        <div class="values-container" id="infos_div"></div>
        <div class="infos-container">
            <h1 id="down">Some Infos</h1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget arcu et enim mattis tristique. Nullam a
            leo aliquet, tincidunt nibh sit amet, pellentesque mauris. Nunc quis tellus posuere, fermentum felis at,
            tristique leo. Praesent nec facilisis turpis. Praesent sit amet velit vitae libero mollis efficitur.
            Praesent rutrum erat quis facilisis dapibus. Curabitur nec tempus nibh, ac eleifend turpis.
        </div>
        <div class="infos-chart-container" id="contact">
            <p>Below you can find some graphs and you can change the graphs base on filters.</p>
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
                <option value='pie'>Pie Chart</option>
                <option value='donut'>Donut Chart</option>
                <option value='geo'>Geo Chart</option>
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
            // echo "You have selected :" . $selected_val_chart;  // Displaying Selected Value
            // echo "You have selected :" . $selected_date;  // Displaying Selected Value
        }
        ?>
        <div class="chart-graph" id="piechart"></div>


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
                    title: 'All',
                    width: 900,
                    height: 500,
                    curveType: 'function',
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
                    curveType: 'function'
                };

                var chart = new google.visualization.LineChart(document.getElementById('piechart'));
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
                            ['Country', 'Something'],
                            <?php
                            if (isset($_POST['submit'])) {
                                $sql = "SELECT `date`,`$selected_val` FROM vaccinations WHERE `date`>'$selected_date'";
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
                            title: 'Chart',
                            width: 900,
                            height: 500,
                            curveType: 'function',
                            pointSize: 5, // Increase the size of the data points
                            lineWidth: 2, // Increase the width of the line
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('piechart'));

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

            // Call the fetch function
            fetchVaccinations();
            // window.setTimeout(function() {
            //   $("input[name=search_reg]").click();
            // } , 5000);

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