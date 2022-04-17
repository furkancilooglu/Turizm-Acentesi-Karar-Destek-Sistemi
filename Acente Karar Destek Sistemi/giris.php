<?php
$baglan=mysqli_connect("localhost","root","","kds");

/**region: '150'**/


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
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['ÜLKELER', 'TURİST SAYISI'],
          <?php
           $query = "SELECT * from ulke_ing";
           $exec = mysqli_query($baglan,$query);
           while($row = mysqli_fetch_array($exec)){

            echo "['".$row['ulke_ing_ad']."',".$row['ulke_turist_toplam']."],";
        }
        

          ?>
        ]);

        var options = {
            region: '150'
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
      google.charts.load('current', {'packages':['scatter']});  
      google.charts.setOnLoadCallback(drawChart);

      function drawChart () {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'otel');
        data.addColumn('number', 'Otel Günlük Fiyatı (EURO)');

        data.addRows([
          <?php 
            $query2 = $baglan->query("SELECT * from otel");
            foreach($query2 as $row) {
            
                echo "[".$row["otel_id"].",".$row["otel_gunluk_fiyat_euro"]."],";
            
            }
            
            
            ?>
        ]);

        var options = {
          width: 800,
          height: 400,
          chart: {
            title: 'Otellerin Fiyat Grafiği',
            subtitle: ''
          },
          hAxis: {title: 'Otel ID'},
          vAxis: {title: 'Günlük Fiyat (Euro)'}
        };

        var chart = new google.charts.Scatter(document.getElementById('scatterchart_material'));

        chart.draw(data, google.charts.Scatter.convertOptions(options));
      }
    </script>


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
            $query3 = $baglan->query("SELECT * from dusuk_fiyat ");
            foreach($query3 as $row) {
            
                echo "['".$row["ulke_adi"]."','".$row["otel_adi"]."',{v:".$row["gunluk"]." , f: '".$row["gunluk"]."'}],";
            
            }
            
            
            ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '330px', height: '100px'});
      }
    </script>


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
            $query4 = $baglan->query("SELECT * from yuksek_fiyat ");
            foreach($query4 as $row) {
            
                echo "['".$row["ulke_adi"]."','".$row["otel_adi"]."',{v:".$row["gunluk"]." , f: '".$row["gunluk"]."'}],";
            
            }
            
            
            ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_divv'));

        table.draw(data, {showRowNumber: true, width: '330px', height: '100px'});
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
                    <li><a class="active" href="giris.php">Ana Sayfa</a></li>
                    <li><a href="gTurlar.php">Geçmiş Turlarımız</a></li>
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
            <div class="giriscontent">
                
                <div class="ustcontent">
                <div class="kutu1">
                    <div class="a1u">
                        <p class="a1up">Tur Düzenlenen Ülke Sayımız</p>
                    </div>
                    <div class="a1a">
                        <div class="a1ar">
                            <img src="a1ar.png" style="width: 100px;height:90px;">

                        </div>
                        <div class="a1ac">
                            <p class="a1up">20</p>
                        </div>
                    </div> 
                </div>

                <div class="kutu2">
                    <div class="a1u">
                        <p class="a1up">Anlaşmalı Otel Sayımız</p>
                    </div>
                    <div class="a1a">
                        <div class="a1ar">
                            <img src="a2ar.png" style="width: 100px;height:90px;">

                        </div>
                        <div class="a1ac">
                            <p class="a1up">61</p>
                        </div>
                    </div> 
                </div>
            </div>



            <div class="altcontent">
                <div class="harita">
                    <h1>Ülkelere Göre Turist Sayısı Haritası</h1>
                <div id="regions_div" style="width: 100%; height: 500px;"></div>
                </div>

            </div>
            <div class="altaltcontent">
            <div class="otelgrafik">
                <div id="scatterchart_material" style="width: 100%; height: 500px;"></div>
                </div>
            </div>

            
            <div class="otelaltcontent">

                <div class="otelcontent1">
                    <h3 style="text-align:center; color:#eeeeee;">Otel Listesi Görüntüle</h3>
                    <div class="otelform">
                        <div class="otelgoruntule"> 
                        <form method="post">
                            <select name='otelllerrr' style="widht:50px; height:20px; background-color:#eeeeee; margin-left: 18px; border-radius:10px;">
                            <option value="">Otel Seçiniz</option>
                            <?php 
                           
                            $otelid=$baglan->query("SELECT otel_id,otel_ad FROM otel");
                            while ($row = mysqli_fetch_array($otelid)){
                            echo "<option value='".$row['otel_ad']."'>".$row['otel_id']."</option>";
                            
                            }
                             
                               
                            ?>
                            
                            </select>
                            <div>
                            <input type="submit" class="button" name="gor" value="Otel Görüntüle">  
                            </div>         
                        </form>
                        </div>
                        <div class="otelad">
                            <div style="margin-top:25px; "> 
                        <?php
                        
                        if($_POST){
                        if(($_POST["gor"])){
                            $oteladd=$_POST["otelllerrr"];
                            echo $oteladd;
                           
                            
                        } 
                    }
                        ?>
                        </div> 
                        </div>
                       
                        
                          
                    </div>
                </div>

                <div class="otelcontent2">
                    <span style="color:#eeeeee;">En Düşük Fiyatlı 5 Otel</span>
                    <div id="table_div" style="margin:15px;" ></div>
                </div>

                <div class="otelcontent3">
                    <span style="color:#eeeeee;">En Yüksek Fiyatlı 5 Otel</span>
                    <div id="table_divv" style="margin:15px;" ></div>
                </div>


            </div>



            </div>
            
                
            
        </div>

    </div>
</body>