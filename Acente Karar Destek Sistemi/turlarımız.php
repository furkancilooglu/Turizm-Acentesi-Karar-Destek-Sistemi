<?php
$baglan=mysqli_connect("localhost","root","","kds");
$query3 = $baglan->query("SELECT * from turlarimiz ");
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
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tur Adı');
        data.addColumn('string', 'Ülke Adı');
        data.addColumn('string', 'Otel Adı');
        data.addColumn('number', 'Gün Sayısı');
        data.addColumn('number', 'Bilet Fiyatı');
        data.addColumn('number', 'Bilet Alan Müşteri Sayısı');
        
        
        
        data.addRows([
            <?php 
            
            foreach($query3 as $row) {
            
                echo "['".$row["turad"]."','".$row["ulke_ad"]."','".$row["otel_ad"]."',{v:".$row["gun_sayisi"]." , f: '".$row["gun_sayisi"]."'},{v:".$row["fiyat_bilet_euro"]." , f: '".$row["fiyat_bilet_euro"]."'},{v:".$row["musterisayisi"]." , f: '".$row["musterisayisi"]."'}],";
            
            }
            
            
            ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '950px', height: '380px'});
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

       
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Tur Adı', 'Tur Maliyeti', 'Tur Geliri'],
          <?php
           $query = "SELECT * from tur_etkilesim";
           $exec = mysqli_query($baglan,$query);
           while($row = mysqli_fetch_array($exec)){

            echo "['".$row['turadi']."',".$row['maliyet'].",".$row['kazanc']."],";
        }
        

          ?>
        ]);

        var materialOptions = {
          width: 700,
          chart: {
            title: 'Turlarımız',
            subtitle: 'Para birimi olarak Euro kullanılmıştır'
          },
          series: {
             // Bind series 0 to an axis named ''.
             // Bind series 1 to an axis named ''.
          },
          axes: {
            y: {
              
               // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 700,
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
                    <li><a href="musteri.php">Müşteri Memnuniyeti</a></li>
                    <li><a class="active" href="turlarımız.php">Turlarımız</a></li>
                  </ul>
            </div>
        </div>


        <div class="content">
            <div class="ustYazi">
                <span class="yazii">Gez Toz Keşfet Turizm Dashboard</span>
            </div>


            <div class="turlarimizcontent">
                <div class="turlarimiztablo">
                    <div class="eu1c">
                    <div id="table_div" style="margin:15px;" ></div>
                    </div>
    
                </div>

                <div class="turlarimiztablo2">
                    <div class="eu1c">
                    <div id="chart_div" style="width: 700px; height: 395px; margin:5px; "></div>
                    </div>
    
                </div>

                <div class="turlarimiztablo3">
                    <div class="eu1c">
                    <form class="ekle" action="musteriekle.php" method="post">
                
                    <div class="formmm">
                            <h3 class="asdasd">Müşteri Ekle</h3>
                        <input class="musterigirisi" type="number" name="tc" value="" placeholder="TC Numarasını Giriniz"><br>
                        <input class="musterigirisi" type="number" name="turid" value="" placeholder="Tur ID Numarasını Giriniz"><br>
                        <input class="musterigirisi" type="string" name="ad" value="" placeholder="Müşteri Adını Giriniz"><br>
                        <input class="musterigirisi" type="string" name="soyad" value="" placeholder="Müşteri Soyadını Giriniz"><br>
                        <input  type="submit" class="buttonn" name="gonder" value="Müşteri ekle">

                    </div>
                    </form>
                    </div>
    
                </div>
            </div>
        </div>

    </div>
</body>