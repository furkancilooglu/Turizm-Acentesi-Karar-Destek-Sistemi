<?php
$baglan=mysqli_connect("localhost","root","","kds");
$query2 = $baglan->query("CALL `fransa_turu_fiyat_memnuniyet`();");
$baglan->next_result();
$query3 = $baglan->query("CALL `fransa_turu_otel_memnuniyet`();");


?>
<html>
  <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChartt);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChartt() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tur Adı');
        data.addColumn('number', 'Müşteri Sayısı');
        
        data.addRows([
          
            <?php 
            
           
            foreach($query2 as $row) {
            
                echo "['Evettttt Oranı',".$row["fiyat_evet_orani"]."],";
                echo "['Hayır Oranı',".$row["fiyat_hayir_orani"]."],";
            }
            
            
            ?>
            
            
        ]);

        // Set chart options
        var options = {'title':'Fransa Turu Otel Memnuniyeti',
                       'width':340,
                       'height':290};

        // Instantiate and draw our chart, passing in some options.
        var chartt = new google.visualization.PieChart(document.getElementById('b'));
        chartt.draw(data, options);
      }
    </script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
            
           
            foreach($query3 as $row) {
            
                echo "['Evettttt Oranı',".$row["otel_evet_orani"]."],";
                echo "['Hayır Oranı',".$row["otel_hayir_orani"]."],";
            }
            
            
            ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="b" style="width: 390px; height: 290px; margin:5px;"></div>
    <div id="piechart" style="width: 390px; height: 290px; margin:5px;"></div>
  </body>
</html>


while($row = mysqli_fetch_array($exec)){
            
            echo "[2009,".$row['y2009']."],";
            echo "[2010,".$row['y2010']."],";
            echo "[2011,".$row['y2011']."],";
            echo "[2012,".$row['y2012']."],";
            echo "[2013,".$row['y2013']."],";
            echo "[2014,".$row['y2014']."],";
            echo "[2015,".$row['y2015']."],";
            echo "[2016,".$row['y2016']."],";
            echo "[2017,".$row['y2017']."],";
            echo "[2018,".$row['y2018']."],";
            echo "[2019,".$row['y2019']."],";
            echo "[2020,".$row['y2020']."],";
        }

        ['2004/05', <?php while($row = mysqli_fetch_array($sonuc)){

echo "[".$row['y2009']."],";
}?>],

        ]);