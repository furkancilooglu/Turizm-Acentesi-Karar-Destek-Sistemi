<?php
$baglan=mysqli_connect("localhost","root","","kds");
$query2 = $baglan->query("CALL `fransa_turu_fiyat_memnuniyet`();");
$baglan->next_result();
$query = $baglan->query("CALL `fransa_turu_otel_memnuniyet`();");
$baglan->next_result();
$query3 = $baglan->query("CALL `fransa_turu_ulke_memnuniyet`();");
$baglan->next_result();
$query4 = $baglan->query("CALL `ispanya_turu_fiyat_memnuniyet`();");
$baglan->next_result();
$query5 = $baglan->query("CALL `ispanya_turu_otel_memnuniyet`();");
$baglan->next_result();
$query6 = $baglan->query("CALL `ispanya_turu_ulke_memnuniyet`();");
$baglan->next_result();
$query7 = $baglan->query("CALL `ukrayna_turu_fiyat_memnuniyet`();");
$baglan->next_result();
$query8 = $baglan->query("CALL `ukrayna_turu_otel_memnuniyet`();");
$baglan->next_result();
$query9 = $baglan->query("CALL `ukrayna_turu_ulke_memnuniyet`();");
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
           
           
            foreach($query2 as $row) {
            
                echo "['Evet Oranı',".$row["fiyat_evet_orani"]."],";
                echo "['Hayır Oranı',".$row["fiyat_hayir_orani"]."],";
            }
            
            
            ?>
            
            
        ]);

        // Set chart options
        var options = {'title':'Fransa Turu Fiyat Memnuniyeti',
                       'width':340,
                       'height':290};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('1'));
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
            
           
            foreach($query as $row) {
            
                echo "['Evet Oranı',".$row["otel_evet_orani"]."],";
                echo "['Hayır Oranı',".$row["otel_hayir_orani"]."],";
            }
            
            
            ?>
            
            
        ]);

        // Set chart options
        var options = {'title':'Fransa Turu Otel Memnuniyeti',
                       'width':340,
                       'height':290};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('b'));
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
            
           
            foreach($query3 as $row) {
            
                echo "['Evet Oranı',".$row["ulke_evet_orani"]."],";
                echo "['Hayır Oranı',".$row["ulke_hayir_orani"]."],";
            }
            
            
            ?>
            
            
        ]);

        // Set chart options
        var options = {'title':'Fransa Turu Ülke Memnuniyeti',
                       'width':340,
                       'height':290};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('c'));
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
      
     
      foreach($query4 as $row) {
      
          echo "['Evet Oranı',".$row["fiyat_evet_orani"]."],";
          echo "['Hayır Oranı',".$row["fiyat_hayir_orani"]."],";
      }
      
      
      ?>
      
      
  ]);

  // Set chart options
  var options = {'title':'İspanya Turu Fiyat Memnuniyeti',
                 'width':340,
                 'height':290};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('d'));
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
            
           
            foreach($query5 as $row) {
            
                echo "['Evet Oranı',".$row["otel_evet_orani"]."],";
                echo "['Hayır Oranı',".$row["otel_hayir_orani"]."],";
            }
            
            
            ?>
            
            
        ]);

        // Set chart options
        var options = {'title':'İspanya Turu Otel Memnuniyeti',
                       'width':340,
                       'height':290};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('e'));
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
      
     
      foreach($query6 as $row) {
      
          echo "['Evet Oranı',".$row["ulke_evet_orani"]."],";
          echo "['Hayır Oranı',".$row["ulke_hayir_orani"]."],";
      }
      
      
      ?>
      
      
  ]);

  // Set chart options
  var options = {'title':'İspanya Turu Ülke Memnuniyeti',
                 'width':340,
                 'height':290};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('f'));
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
      
     
      foreach($query7 as $row) {
      
          echo "['Evet Oranı',".$row["fiyat_evet_orani"]."],";
          echo "['Hayır Oranı',".$row["fiyat_hayir_orani"]."],";
      }
      
      
      ?>
      
      
  ]);

  // Set chart options
  var options = {'title':'Ukrayna Turu Fiyat Memnuniyeti',
                 'width':340,
                 'height':290};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('g'));
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
      
     
      foreach($query8 as $row) {
      
          echo "['Evet Oranı',".$row["otel_evet_orani"]."],";
          echo "['Hayır Oranı',".$row["otel_hayir_orani"]."],";
      }
      
      
      ?>
      
      
  ]);

  // Set chart options
  var options = {'title':'Ukrayna Turu Otel Memnuniyeti',
                 'width':340,
                 'height':290};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('h'));
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
      
     
      foreach($query9 as $row) {
      
          echo "['Evet Oranı',".$row["ulke_evet_orani"]."],";
          echo "['Hayır Oranı',".$row["ulke_hayir_orani"]."],";
      }
      
      
      ?>
      
      
  ]);

  // Set chart options
  var options = {'title':'Ukrayna Turu Ülke Memnuniyeti',
                 'width':340,
                 'height':290};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('z'));
  chart.draw(data, options);
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
                    <li><a href="gTurlar.php">Geçmiş Turlarımız</a></li>
                    <li><a href="yeniTur.php">Tur Analizi</a></li>
                    <li><a class="active" href="musteri.php">Müşteri Memnuniyeti</a></li>
                    <li><a href="turlarımız.php">Turlarımız</a></li>
                  </ul>
            </div>
        </div>


        <div class="content">
            <div class="ustYazi">
                <span class="yazii">Gez Toz Keşfet Turizm Dashboard</span>
            </div>

            
            <div class="mustericontent">
                <div class="musterigrafik">
                    <div class="du1c">
                        <div id="1" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>

                <div class="musterigrafik2">
                    <div class="du2c">
                    <div id="b" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>

                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="c" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>
            </div>

            

            <div class="mustericontent">
                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="d" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>

                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="e" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>

                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="f" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>
            </div>



            <div class="mustericontent">
                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="g" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>

                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="h" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>

                <div class="musterigrafik">
                    <div class="du1c">
                    <div id="z" style="width: 390px; height: 290px; margin:5px;"></div>
                    </div>
    
                </div>
            </div>

        </div>

    </div>
</body>