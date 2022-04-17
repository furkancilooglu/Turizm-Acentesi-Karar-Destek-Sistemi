<?php
    $baglan=mysqli_connect("localhost","root","","kds");
    
    
    $tc=$_POST["tc"];
    $turid=$_POST["turid"];
    $ad=$_POST["ad"];
    $soyad=$_POST["soyad"];
    if(isset($_POST["gonder"]))
    {
        $sql="INSERT INTO musteriler(musteri_tc_no,tur_id,musteri_ad,musteri_soyad)values('".$tc."','".$turid."','".$ad."','".$soyad."')";
        $sonuc=mysqli_query($baglan,$sql);
        if($sonuc)
        {
            header("Location: http://localhost/kds/turlar%C4%B1m%C4%B1z.php");
        }
      
    }
    


?>