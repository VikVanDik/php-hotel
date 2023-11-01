<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filtered_hotels = [];
    $vote = isset($_POST['vote']) ? $_POST['vote'] : '0';

    if (isset($_POST['parking'])) {
        foreach ($hotels as $hotel){
            if ($hotel['parking']) {
                $filtered_hotels[] = $hotel;
            }
        }
    } else {
        foreach ($hotels as $hotel){
            if ($hotel['vote'] >= $vote) {
                $filtered_hotels[] = $hotel;
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Hotel</title>
</head>
<body>

    <h1>Hotels</h1>
    <form action="index.php" method="POST">
        <input type="checkbox" name="parking" id="parking">
        <label for="parking">
            Solo hotel con parcheggio
        </label>

        <input type="radio" name="vote" id="vote1">
        <label for="vote1">1</label>
        <input type="radio" name="vote" id="vote2">
        <label for="vote2">2</label>
        <input type="radio" name="vote" id="vote3">
        <label for="vote3">3</label>
        <input type="radio" name="vote" id="vote4">
        <label for="vote4">4</label>
        <input type="radio" name="vote" id="vote5">
        <label for="vote5">5</label>
        
        <button class="btn btn-success" type="submit">INVIA</button>
    </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Voto</th>
            <th scope="col">Parcheggio</th>
            <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filtered_hotels as $hotel): ?>
            <tr>
            <th scope="row"><?php echo $hotel['name'] ?></th>
            <td><?php echo $hotel['description'] ?></td>
            <td><?php echo $hotel['vote'] ?></td>
            <td><?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
            <td><?php echo $hotel['distance_to_center'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>