<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactformulier</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <h1>Contactformulier</h1>
    
    <form action="process.php" method="post">
        <div class="form-group">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mailadres:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="bericht">Bericht:</label>
            <textarea id="bericht" name="bericht" required></textarea>
        </div>
        
        <button type="submit">Verzenden</button>
    </form>
</body>
<script src="script/script.js"></script>
</html>