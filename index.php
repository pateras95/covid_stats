<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Web Crawler Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    .custom-form {
      display: none;
    }
  </style>
</head>

<body>
  <h1>Web Crawler Example</h1>

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