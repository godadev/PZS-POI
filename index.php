<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PZS-POI</title>

  </head>
  <body>
    <?php

    ?>
      <div class="container bg-light border border-1 border-dark rounded-3">
          <div class="text-sm-center">
              <h2>Vnesi -idKOTE-</h2>
            </div>
            <p class="text-start fs-4">kota za Aljažev dom: 1238</p>
        </div>
        <div class="container" style="margin-top: 20px;">
            <form  method="GET" action="proces.php">
                <label for="idkote" class="fs-4">https://mapzs.pzs.si/api/tracks/poi/</label>
                <input type="text" name="idkote" value="">
                <input type="submit" name="submit" value="Preveri">
            </form>
        </div>
        <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>