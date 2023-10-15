
<?php

//Užduotis 1. 
// Atspausdinti PHP asociatyvų masyvą kaip ASCII lentelę. 

$elementas = array("Name"=>"Trikse", "Color"=>"Green", "Element"=>"Earth", "Likes"=>"Flowers");
$elementas2 = array("Name"=>"Vardenis", "Element"=>"Air", "Likes"=>"Singing", "Color"=>"Blue");
$elementas3 = array("Element"=>"Water", "Likes"=>"Dancing", "Name"=>"Jonas", "Color"=>"Pink");

//sudeti visus asociatyvius masyvus i bendra masyva
$bendras = array($elementas, $elementas2, $elementas3);
$dydis = sizeof($bendras);

$vardai=array();
$spalva=array();
$element=array();
$pomegis=array();

//papildau naujus array tokia tvarka -> name, color, element, likes
foreach ($bendras as $kint)
{
   // $kint = $bendras[$i];
    foreach($kint as $key=>$value)
    {
       //
        if($key=="Name")
        {
            array_push($vardai, $value);
        }
        if($key=="Color")
        {
            array_push($spalva, $value);
        }
        if($key=="Element")
        {
            array_push($element, $value);
        }
        if($key=="Likes")
        {
            array_push($pomegis, $value);
        }
    }
    
}
//patikrina ar visi arrays turi tiek pat duomenu (visi keturi kintamieji irasyti)
$duomenuKiekis=duomenuKiek($vardai, $spalva, $element, $pomegis);

//sie metodai printina lenteles headeri ir turini
lentelesVirsus($elementas);
lentele($duomenuKiekis, $vardai, $spalva, $element, $pomegis);
    
function lentele($duomenuKiekis, $vardai, $spalva, $element, $pomegis){
    if($duomenuKiekis==-1)
    echo"<br> BLOGI DUOMENYS";
for($i=0;$i<$duomenuKiekis;$i++)
{
    
    echo"<br> | {$vardai[$i]}  | {$spalva[$i]} | {$element[$i]} | {$pomegis[$i]} |  ";
    echo"<br> +------------+-----------+-------------+ ";
}
}

function lentelesVirsus($elementas)
{
    echo" +-------+-------+-----------+-------+ <br> |";
foreach ($elementas as $key => $value) {
    echo"  {$key} |  ";
}
echo"<br> +-------+-------+-----------+-------+";
}

function duomenuKiek($vardai, $spalva, $element, $pomegis)
{
    if(sizeof($vardai) == sizeof($spalva) && sizeof($spalva) == sizeof($element)
    && sizeof($element) == sizeof($pomegis))
    {
        $duomenuKiekis = sizeof($vardai);
    }
    else $duomenuKiekis =-1;
    return $duomenuKiekis;
}
?>