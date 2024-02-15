  <?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container_display {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .result-item {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            background-color: #fff;
        }

        .result-item img {
            max-width: 150px;
            height: auto;
            object-fit: cover;
            border-right: 1px solid #ddd;
        }

        .result-item-content {
            padding: 20px;
        }

        .result-item-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .result-item-address {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .result-item-phone {
            font-size: 14px;
            color: #007bff;
        }
       .result-item-button {
    margin-right: 10px;
    padding: 10px 20px;
    font-size: 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    color: #fff; /* Set text color to white */
    background-color: transparent; /* Set background color to transparent */
}

.result-item-button.show-number {
    background-color: #4caf50;
}

.result-item-button.chat {
    background-color: #007bff;
}

/* Remove underline on anchor tags within buttons */
.result-item-button a {
    text-decoration: none;
    color: inherit; /* Inherit color from parent */
}

    </style>
</head>
<body>
    <div class="container_display">
        <?php 
            $sql = "SELECT * FROM images where category='ticket_sharing' ORDER BY id DESC";
            $res = mysqli_query($conn,  $sql);
            if(mysqli_num_rows($res) > 0) {
                while ($images = mysqli_fetch_assoc($res)) { 
                    echo '<div class="result-item">';
                    echo '<img src="uploads/'.$images['image_url'].'" alt="Result Image">';
                    echo '<div class="result-item-content">';
                    echo '<div class="result-item-title"><b>'.$images['user'].'</b></div>';
                   
                      //echo '<i class="fas fa-map-marker-alt"></i>'. $images['location'];
                      echo '<div class="result-item-location"><i class="fa fa-map-marker"></i> '.$images['location'].'</div>';
                      echo '<br>';
                      echo '<br>';
                 echo '<button class="result-item-button show-number"><i class="fa fa-phone"></i><a href="tel:'.$images['number'].'">'.$images['number'].'</a></button>';

                   echo '<button class="result-item-button chat"><a href="https://wa.me/' . $images['number'] . '"><i class="fa fa-comments"></i> Chat</a></button>';

                    echo '</div></div>';
                }
            }
        ?>
    </div>
</body>
</html>