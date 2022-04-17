<?php
    $baglan=mysqli_connect("localhost","root","","kds");
    
    if($_POST){
    $turadi=$_POST["adii"];
    $otelsec=$_POST["otelsec"];
    $gun=$_POST["gun"];
    $bilet=$_POST["bilet"];
    $musteri=$_POST["musteri"];
    }
    $maliyet=$otelsec*$gun*$musteri;
    echo $maliyet;
    $kazanc=$bilet*$musteri;
    echo $kazanc;
    $kar=$kazanc-$maliyet;
    echo $kar;
    
    if(isset($_POST["gonderr"]))
    {
        $sql="INSERT INTO etkilesim(etmaliyet,etkazanc,etkar,turadi)values('".$maliyet."','".$kazanc."','".$kar."','".$turadi."')";
        $sonuc=mysqli_query($baglan,$sql);
        if($sonuc)
        {
           header("Location: http://localhost/kds/yeniTur.php");
        }
      
    }
    
    


?>
