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
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Ülke Adı');
        data.addColumn('string', 'Otel Adı');
        
        data.addColumn('number', 'Günlük Fiyatı');
        
        
        
        data.addRows([
            <?php 
            $query3 = $baglan->query("SELECT* from oteltablo");
            foreach($query3 as $row) {
            
                echo "['".$row["ulke"]."','".$row["otel"]."',{v:".$row["fiyat"]." , f: '".$row["fiyat"]."'}],";
            
            }
            
            
            ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '650px', height: '380px'});
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

       
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Tur Adı', 'Tur Maliyeti', 'Tur Geliri','Tur Kazancı'],
          <?php
           $query = "SELECT * from etkilesim";
           $exec = mysqli_query($baglan,$query);
           while($row = mysqli_fetch_array($exec)){

            echo "['".$row['turadi']."',".$row['etmaliyet'].",".$row['etkazanc'].",".$row['etkar']."],";
        }
        

          ?>
        ]);

        var materialOptions = {
          width: 590,
          chart: {
            title: 'Tur Analizi',
            subtitle: 'Para birimi olarak Euro kullanılmıştır'
          },
          series: {
             
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
                    <li><a class="active" href="yeniTur.php">Tur Analizi</a></li>
                    <li><a href="musteri.php">Müşteri Memnuniyeti</a></li>
                    <li><a href="turlarımız.php">Turlarımız</a></li>
                  </ul>
            </div>
        </div>


        <div class="content">
            <div class="ustYazi">
                <span class="yazii">Gez Toz Keşfet Turizm Dashboard</span>
            </div>

            
                <div class="turcontent">
                    <div class="turform">
                        <div class="cu1c">
                        <div id="table_div" style="margin:15px;" ></div>
                        </div>
        
                    </div>
                    
                    <div class="turgrafik1">
                        <div class="cu2c">
                        <form class="ekle" action="turetkilesim.php" method="post">
                
                        <div class="formm">
                        
                        <select name='otelsec' style="widht:50px; height:20px; background-color:#eeeeee; margin-left: 18px; border-radius:10px;">
                            <option value="">Otel Seçiniz</option>
                            <?php 
                           
                            $otelad=$baglan->query("SELECT * FROM otel");
                            while ($row = mysqli_fetch_array($otelad)){
                            echo "<option value=".$row['otel_gunluk_fiyat_euro'].">".$row['otel_ad']."</option>";
                            
                            }
                             
                               
                            ?>
                            
                            </select>
                        <input class="musterigirisi" type="number" name="gun" value="" placeholder="Gün Sayısını Giriniz"><br>
                        <input class="musterigirisi" type="number" name="bilet" value="" placeholder="Bilet Fiyatı Giriniz"><br>
                        <input class="musterigirisi" type="number" name="musteri" value="" placeholder="Müşteri Sayısını Giriniz"><br>
                        <input class="musterigirisi" type="string" name="adii" value="" placeholder="Tur Adı Giriniz"><br>
                        <input  type="submit" class="buttonn" name="gonderr" value="Sonucu Gör">
                        

                        </div>
                        </form>
                        </div>
        
                    </div>
                </div>
            
                <div class="turcontentalt">
                    <div class="turform2">
                        <div class="ca1c">
                        <div id="chart_div" style="width: 590px; height: 395px; margin:5px; "></div>
                        </div>
        
                    </div>


                    



        </div>

    </div>
</body>