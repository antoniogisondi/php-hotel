<?php 
    include __DIR__.'/partials/vars.php';



    if(isset($_GET['parking'])){
        $park = $_GET['parking'];
        $array_hotels = [];
        foreach ($hotels as $index => $hotel){
            if($hotel['parking'] == filter_var($park, FILTER_VALIDATE_BOOLEAN) ){
                $array_hotels [] = $hotel;

            }
        };
        $hotels = $array_hotels;
    };


    if(isset($_GET['vote']) && $_GET['vote'] !== ''){

        $vote = $_GET['vote'];
        $rating_hotels = [];

        foreach($filter_hotels as $index => $hotel){
            if($hotel['vote'] === $vote){
                $rating_hotels [] = $hotels;
            }
        }

        $hotels = $rating_hotels;
    }
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
            <div class="row d-flex flex-column">
                <div class="col-12">
                    <form action="index.php" method="GET">
                        <div class="col">
                            <label for="parking" class="control-label">Parcheggio</label>
                            <select name="parking" id="parking">
                                <option value="">Tutti</option>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="vote" class="control-label">Voto</label>
                            <input type="number" name="vote" id="vote">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Cerca</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
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
                            <td><?php echo ($hotel['parking'] == true) ? 'Si' : 'No'?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>