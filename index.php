<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Upload Using PHP</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
	</style>
</head>
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="upload.php"
           method="post"
           enctype="multipart/form-data">
          <label >username:</label>
          <input type="text" name="user" id="user">
          <br>
          <br>
          <label>Location :</label>
           <input type="text" name="loc" id="loc">
          <br>
          <br>
          <label >Choose an option:</label>
        <select id="sharing" name="sharing">
            <option value="carpooling">Carpooling</option>
            <option value="ticket_sharing">Ticket Sharing</option>
            <option value="room_sharing">Room Sharing</option>
        </select>
        <br><br>
             <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="num" required>
            <br>
            <br>
           <input type="file" 
                  name="my_image">
          <br>
          <br>
          
           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>