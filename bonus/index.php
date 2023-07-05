<?php 
    include __DIR__.'/partials/vars.php'
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>PHP Hotel</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="title">
                        <h2>Hotel disponibili</h2>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Nome Hotel</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Voto</th>
                            <th scope="col">Distanza dal centro</th>
                            <th scope="col">Possibilità di parcheggio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($hotels as $hotel){ ?>
                            <tr>
                            <td><?php echo $hotel['name']?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td><?php echo $hotel['vote']. " / ".'5' ?></td>
                            <td><?php echo $hotel['distance_to_center'].' Km '?></td>
                            <td><?php if($hotel['parking'] == true){
                                            echo $string_true = json_encode($hotel['parking']);
                                            }
                                            elseif($hotel['parking'] == false) {
                                                echo $string_false = json_encode($hotel['parking']);
                                            }
                            ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>