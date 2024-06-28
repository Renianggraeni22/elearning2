<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $role = "Ui/Ux Designer";
    ?>
    <h1>Profile Worker</h1>
    @if($role == 'Ui/Ux Designer')
    <h3>Welcome <?= $nama ?>,Anda login sebagai Designer</h3>
    @endif
    
</body>
</html>