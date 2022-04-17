<?php
$baglan=mysqli_connect("localhost","root","","kds");


?>

<!DOCTYPE html>
<html>
<head>
<title>GTK Turizm</title>
<meta charset="UTF-8"/>
<meta name="Description" content="GTK Turizm Dashboard"/>
<meta name="Keywords" content="Gez, Toz, Kesfet, Tur, Acenta, Avrupa, Turizm, Gezi, Tatil, Eglence"/>
<meta name="robots" content="index,contact"/>
<meta name="copyright" content="2021-2022 Copyright | gtkturizm.com"/>
<link href="style2.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

       
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Tur Adı', 'Tur Maliyeti', 'Tur Geliri'],
          <?php
           $query = "SELECT * from e_turlar";
           $exec = mysqli_query($baglan,$query);
           while($row = mysqli_fetch_array($exec)){

            echo "['".$row['e_tur_ad']."',".$row['maliyet_euro'].",".$row['kazanc_euro']."],";
        }
        

          ?>
        ]);

        var materialOptions = {
          width: 590,
          chart: {
            title: 'Eski Tur',
            subtitle: 'Para birimi olarak Euro kullanılmıştır'
          },
          series: {
             // Bind series 0 to an axis named 'hedeflenenverimlilik'.
             // Bind series 1 to an axis named 'gerceklesenverimlilik'.
          },
          axes: {
            y: {
              
               // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 590,
          series: {
            
            
          },
          title: '',
          vAxes: {
            // Adds titles to each axis.
            
            
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          
        }

        

        drawMaterialChart();
    };
    </script>



    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tur Adı');
        data.addColumn('number', 'Müşteri Sayısı');
        data.addRows([
          
            <?php 
            $query2 = $baglan->query("SELECT * from e_turlar");
            foreach($query2 as $row) {
            
                echo "['".$row["e_tur_ad"]."',".$row["musteri_sayisi"]."],";
            
            }
            
            
            ?>
            
            
        ]);

        // Set chart options
        var options = {'title':'Eski Turlarımızın Müşteri Dağılımı',
                       'width':390,
                       'height':290};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_divv'));
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Tur Adı');
  data.addColumn('number', 'Müşteri Sayısı');
  data.addRows([
    
      <?php 
      $query2 = $baglan->query("SELECT * from e_turlar");
      foreach($query2 as $row) {
      
          echo "['".$row["e_tur_ad"]."',".$row["musteri_sayisi"]."],";
      
      }
      
      
      ?>
      
      
  ]);

  // Set chart options
  var options = {'title':'Eski Turlarımızın Müşteri Dağılımı',
                 'width':390,
                 'height':290};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('chart_divv'));
  chart.draw(data, options);
}
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tur Adı');
        data.addColumn('string', 'Otel Adı');
        data.addColumn('number', 'Otel ID');
        data.addColumn('number', 'Günlük Fiyatı EURO');
        
        
        
        data.addRows([
            <?php 
            $query4 = $baglan->query("SELECT e_turlar.e_tur_ad,e_turlar.otel_id,otel.otel_ad,otel.otel_gunluk_fiyat_euro from otel,e_turlar WHERE otel.otel_id=e_turlar.otel_id ");
            foreach($query4 as $row) {
            
                echo "['".$row["e_tur_ad"]."','".$row["otel_ad"]."',{v:".$row["otel_id"]." , f: '".$row["otel_id"]."'},{v:".$row["otel_gunluk_fiyat_euro"]." , f: '".$row["otel_gunluk_fiyat_euro"]."'}],";
            
            }
            
            
            ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_divv'));

        table.draw(data, {showRowNumber: true, width: '890px', height: '270px'});
      }
    </script>

</head>
<body>
    <div class="container">
        
        <div class="solBar">
            <div class="logo">
                <img class="resim" src="GTKlogo.png">

            </div>
            <div class="menuBar">
                <ul>
                    <li><a href="giris.php">Ana Sayfa</a></li>
                    <li><a class="active" href="gTurlar.php">Geçmiş Turlarımız</a></li>
                    <li><a href="yeniTur.php">Tur Analizi</a></li>
                    <li><a href="musteri.php">Müşteri Memnuniyeti</a></li>
                    <li><a href="turlarımız.php">Turlarımız</a></li>
                  </ul>
            </div>
        </div>


        <div class="content">
            <div class="ustYazi">
                <span class="yazii">Gez Toz Keşfet Turizm Dashboard</span>
            </div>


            <div class="eskicontent">
            <div class="eskiturgrafik1">
                <div class="bu1c">
                <div id="chart_div" style="width: 590px; height: 395px; margin:5px; "></div>
                </div>

            </div>

            <div class="eskiturgrafik2">
                <div class="bu2c">
                    <div id="chart_divv" style="width: 400px; height: 300px; margin:5px;"></div>
                </div>
            </div>
            
            </div>

            <div class="eskicontent2">
                <div class="eskiturgrafik3">
                    <div class="ba1c">
                    <div id="table_divv" style="margin:15px;" ></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>