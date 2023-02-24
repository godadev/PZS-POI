<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PZS-POI Izpis</title>

  </head>
  <body>

<div class="container lh-lg">

<?php

error_reporting(E_ALL ^ E_WARNING); //-----------------Samo zaradi $iterr

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    $idkote = clean_input($_GET['idkote']);
    }

    function clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    echo "<br><div class='bg-info fs-3 border-dark rounded-2 p-1'>";
    echo "<b>Vnešena idkota je: " . $idkote . "</b>";
    echo "</div><br>";
    
    $poiUrl = 'https://mapzs.pzs.si/api/tracks/poi/' . $idkote;
    $jsonurl = file_get_contents($poiUrl);
    $id = json_decode($jsonurl);
    
    // echo "<pre>";
    // print_r($data) ;
    // echo "</pre>";
    
    //ksort($data);
    
    foreach($id as $item)
    {
        //Samo za oštevilčevanje
        $iterr += 1;
        
        //--------------------------------Komentiraj spodnje tri vrstice za prijaznejši prikaz
        // echo "<pre>";
        // print_r($item);
        // echo "</pre>";

        foreach($item as $key => $value)
        {
            //echo "$key => $value";
            //echo "<br>";
            $arrID = $key;
            $arrIDValue = $value;

            
            if ($arrID == "name")
            {
                echo "<b class='bg-warning p-1 rounded-2'>" . $arrIDValue . "</b>";
                echo "<br>";
                
            }  
            switch ($arrID) 
            {
                case "trailType":
                    if ($arrIDValue == 1)
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        echo "Tip poti: -" . "<b>" . $arrIDValue . "</b>" . "- Planinska pot";
                        echo "<br>";
                        
                    }
                    elseif ($arrIDValue == 6)
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        echo "Tip poti: -" . "<b>" . $arrIDValue . "</b>" . "- TK Pot";
                        echo "<br>";
                         
                    }
                    elseif ($arrIDValue == 7) 
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        echo "Tip poti: " . "<b>" . $arrIDValue . "</b>" . " Pot kurirjev in vezistov";
                        echo "<br>";
                            
                    } else 
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        echo "Ni označene poti.";
                    } 
                        break;

                case "hasSafetyGear":
                    if ($arrIDValue != "")
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        echo "Pot <b>JE</b> zavarovana";
                        echo "<br>";
                    } else 
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        echo "Pot <b>NI</b> zavarovana";
                        echo "<br>";
                    }
                        break;

                case "difficulty":
                        echo "<b>" . "[" . $arrID . "] " . "</b>"; // -------------------------------Tukaj kopiraj za lažje formatiranje izpsov $arrID
                        echo "Težavnostna stopnja poti je: <b>" . $arrIDValue . "</b>";
                        echo "<br>";

                        break;

                case "id":
                        $pathAdress = "https://mapzs.pzs.si/path/";
                        $linkpoti = "<a href=" . $pathAdress . $arrIDValue . ">ID POTI = </a>";
                        echo "<b class='bg-primary p-1 rounded-2 fs-2' style='--bs-bg-opacity: .5;'>" . $iterr . ".POT - " . $linkpoti . $arrIDValue . "</b>";
                        echo "<br>";
                        echo "<b>" . "[" . $arrID . "] " . "</b>"; // -------------------------------Tukaj kopiraj za lažje formatiranje izpsov $arrID
                        echo "To je ID ene od večih poti, ki jih vsebuje koča. <b>" . $arrIDValue . "</b>. ";
                        echo "Torej pri vpisani koti " . "<b>" . $idkote . "</b>" . " je to ena izmed poti na katere lahko gremo iz te koče.";
                        echo "<br>";

                        break;

                case "logo":
                    if ($arrIDValue != "")
                    {
                        echo "<b>" . "[" . $arrID . "] " . "</b>";
                        $linkAdress = "https://mapzs.pzs.si/api/image/";
                        echo "Slika JE: " . '<a href="' . $linkAdress . $arrIDValue . '">Na tem naslovu </a>'; // ---------Kopiraj tukaj za hitrejše ustvarjanje linka
                        echo "Ime datoteke je: " . "<b>" . $arrIDValue . "</b>";
                        echo "<br>";
                    }
                        break;

                        // ------------------------------------------------------------------------Dodamo lahko še več case stavkov in iščemo še druge $arrID
                default:
                echo "";
            }             
        }
    }          
                
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>