<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Web Crawler Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style>
    .custom-form {
      display: none;
    }


    body,
    html {
      scroll-behavior: smooth;
      height: 100%;
      margin: 0;
      padding: 0;
      line-height: 1.5;
      transform-style: preserve-3d;
    }


    main {
      display: block;
      overflow-x: hidden;
      height: 100vh;
      max-height: 100%;
      perspective: 1px;
      scroll-behavior: smooth;
    }


    header {
      height: 100vh;
      transform: translateZ(-1px) scale(2.03);
      margin: 0 auto;
      background: #2a3136;
      text-align: center;
      justify-items: center;
      /* background-image: url('https://www.cam.ac.uk/sites/www.cam.ac.uk/files/shorthand/221541/I2oJtQOWWv/assets/hpXLO7kIln/piro4d-from-pixabay-green-viruscrop-2560x1440.jpeg'); */
      opacity: 0.9;
      background-position: center center;
      background-size: cover;
      background-repeat: no-repeat;
      box-sizing: border-box;
    }

    .arrow {
      position: absolute;
      right: 50%;
      transform: translate(-50%, -50%);
      transform: rotate(360deg);
      cursor: pointer;
    }

    .arrow span {
      display: block;
      width: 1.2vw;
      height: 1.2vw;
      border-bottom: 5px solid gold;
      border-right: 5px solid gold;
      transform: rotate(45deg);
      margin: -10px;
      animation: animate 2s infinite;
    }

    .arrow span:nth-child(2) {
      animation-delay: -0.2s;
    }

    .arrow span:nth-child(3) {
      animation-delay: -0.4s;
    }

    @keyframes animate {
      0% {
        opacity: 0;
        transform: rotate(45deg) translate(-20px, -20px);
      }

      50% {
        opacity: 1;
      }

      100% {
        opacity: 0;
        transform: rotate(45deg) translate(20px, 20px);
      }
    }

    .button-scroll:hover {}

    section {
      height: auto;
      font-family: "Courier New", Courier, monospace;
      padding: 20px;
      align-content: center;
      transform: translateZ(0);
      background: white;
    }

    h1 {
      font-family: Verdana, Geneva, sans-serif;
      text-transform: uppercase;
      padding: 10px;
    }

    p {
      padding: 10px;
    }

    .value_text {
      color: green;
      font-weight: 700;
    }

    .values-container {
      padding: 50px;
      text-transform: uppercase;
      margin: 0 auto;
      font-size: 1.6rem;
      display: flex;
      text-align: center;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <main>
    <header>
      <div class="values-container" id="infos_div"></div>
      <div class="arrow" onClick="document.getElementById('down').scrollIntoView();">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </header>

    <section>
      <h1 id="down">Some Infos</h1>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget arcu et enim mattis tristique. Nullam a leo aliquet, tincidunt nibh sit amet, pellentesque mauris. Nunc quis tellus posuere, fermentum felis at, tristique leo. Praesent nec facilisis turpis. Praesent sit amet velit vitae libero mollis efficitur. Praesent rutrum erat quis facilisis dapibus. Curabitur nec tempus nibh, ac eleifend turpis.</p>
      <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur quis fermentum lectus. Duis lobortis mollis diam, id pellentesque sapien interdum sit amet. Quisque id malesuada leo. Vestibulum ac porttitor arcu. Duis at varius lacus. Integer in blandit ligula, in maximus elit. Nam odio quam, ultrices eget hendrerit nec, sagittis consectetur orci. Sed bibendum augue turpis, aliquet tempus tortor maximus non.</p>
      <p>Vestibulum suscipit volutpat semper. Vestibulum dictum enim arcu, ullamcorper aliquam mi rutrum a. In in ultrices quam, quis fringilla enim. Vestibulum vitae odio ligula. Phasellus urna urna, tristique vitae eros ac, laoreet pellentesque tellus. Fusce faucibus lobortis mauris a venenatis. Suspendisse ac eros ac lorem vehicula tempor vel sit amet ex. Duis dignissim mollis ullamcorper. Donec porta iaculis vestibulum. Proin efficitur tempor aliquet. Nunc nec fringilla lectus. Cras mollis in tortor eu fringilla. Aliquam sit amet dictum odio. Nunc vel eros mi.</p>
      <p>Nam auctor eu dolor vitae hendrerit. Vestibulum feugiat erat ac velit placerat, a euismod orci sagittis. Aenean mattis odio in magna blandit consequat. Praesent nulla tortor, lobortis eget velit vel, pharetra tempor mauris. Etiam lacinia at velit at rhoncus. Maecenas tristique dui aliquam dolor dignissim, at bibendum orci bibendum. Curabitur ligula felis, vestibulum sit amet aliquam sit amet, ultricies tincidunt elit. Vestibulum fringilla lacus in commodo venenatis. Suspendisse vitae quam at diam eleifend laoreet. Nam neque leo, venenatis ut lectus at, tristique suscipit tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </section>

    <div class="w3-content w3-container" id="contact">
      <p>Παρακάτω μπορείτε να βρείτε πληροφορίες για τις χώρες
        που θέλετε να αναζητήσεται διαμορφωμένες σε δίαφορα διαγράμματα.</p>
    </div>
    <!--Δημιουργια τον Check Boxes δυναμικα μέσα απο την βάση.-->

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
      echo "<p class='w3-center'><em>Παρακαλώ επιλέξτε χώρες αναζήτησης.</em></p> ";
      echo "<form action='#' method='post'>";
      echo '<center><table>';
      while ($row = $result->fetch_assoc()) {
        echo "<td style='padding-left: 25px; padding-right: 25px;'><input name='check_list[]' type='checkbox' value='{$row["date"]}'>" . $row["date"] . '</br></td><tr>';
      }
      echo "</table></center>";
      echo "<p class='w3-center'><em>Παρακαλώ επιλέξτε κριτήριο αναζήτησης.</em></p> ";
      echo "<center><select name='options'>                      
                <option value='total_vaccinated'>Total Vaccinated</option>
                <option value='fully_vaccinated'>Fully Vaccinated</option>
                <option value='doses_administered'>Doses Administered</option>
                </select></center>
                <br>
                <br>";
      echo "<p class='w3-center'><em>Παρακαλώ επιλέξτε είδος γραφήματος.</em></p> ";
      echo "<center><select name='options_charts'> 
                <option value='chart'>Γράφημα</option>    
                <option value='pie'>Pie Chart</option>
                <option value='donut'>Donut Chart</option>
                <option value='geo'>Geo Chart</option>
                </select></center>
                <br>
                <br>";
      echo "<center><input class='pure-button pure-button-primary' type='submit' name='submit' value='Εμφάνιση Διαγραμμάτων'/></center>";
      echo "</form>";
    } else {
      echo "0 results";
    }

    if (isset($_POST['submit'])) {
      $selected_val = $_POST['options'];
      $selected_val_chart = $_POST['options_charts'];
      // echo "You have selected :" . $selected_val_chart;  // Displaying Selected Value
      echo "You have selected :" . $selected_val;  // Displaying Selected Value
    }
    ?>

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
              if (isset($_POST['submit'])) { //to run PHP script on submit
                if (!empty($_POST['check_list'])) {
                  // Loop to store and display values of individual checked checkbox.
                  foreach ($_POST['check_list'] as $selected) {
                    $sql = "SELECT date,$selected_val FROM vaccinations WHERE date='$selected'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                        echo "['" . $row["date"] . "', " . $row[$selected_val] . "],";
                      }
                    } else {
                      echo "0 results";
                    }
                  }
                }
              }
              ?>
            ]);

            var options = {
              title: 'Chart',
              width: 900,
              height: 500,
              curveType: 'function'
            };

            var chart = new google.visualization.LineChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
    <?php
      }
    }
    ?>
    <div id="piechart"></div>
  </main>
  <form class="custom-form" method="post" id="covid_sumbit" action="index.php">
    <div id="chart_div"></div>
    <input type="submit" class="pure-button pure-button-primary" name="search_reg" value="Καταχώρηση στην Βάση">
  </form>

  <script>
    $(document).ready(function() {
      // Define a function to fetch and show the vaccinations field
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
    });
  </script>
</body>

</html>

<!-- me ta charts
$(document).ready(function() {
    // Define a function to fetch and show the vaccinations field
    function fetchVaccinations() {
      const url = 'https://en.wikipedia.org/w/api.php?action=parse&format=json&page=COVID-19_pandemic_by_country_and_territory&redirects&prop=text&callback=?';
      $.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
          const infobox = $(data.parse.text['*']).find('.infobox');
          const vaccinations = $(infobox).find('.infobox-label:contains("Vaccinations")').next('.infobox-data').find('li').map(function() { return $(this).text().replace(/ *\[[^\]]*\]/, ''); }).get();
          var data = [];
          var labels = [];
          for (var i = 0; i < vaccinations.length; i++) {
            var parts = vaccinations[i].split(/(\([^()]+\))/g).filter(Boolean);
            var value = parseInt(parts[0].replace(/,/g, ''));
            var label = parts[1].replace(/[()]/g, '');
            data.push(value);
            labels.push(label);
          }
          drawChart(data, labels);
        }
      });
    }

    // Call the fetch function
    fetchVaccinations();

    // Define a function to draw the chart
    function drawChart(data, labels) {
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(function() {
        var chartData = [['Country', 'Vaccinations']];
        for (var i = 0; i < data.length; i++) {
          console.log(data[i])
          chartData.push([labels[i], data[i]]);
        }
        var chartOptions = {
          title: 'COVID-19 Vaccinations by Country/Territory',
          height: 600,
          hAxis: {title: 'Country/Territory', titleTextStyle: {bold: true}},
          vAxis: {title: 'Vaccinations', titleTextStyle: {bold: true}},
          legend: {position: 'none'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(google.visualization.arrayToDataTable(chartData), chartOptions);
      });
    }
  }); -->