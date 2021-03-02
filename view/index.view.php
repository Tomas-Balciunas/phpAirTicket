<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="view/style.css">
    </head>
    <body>

    
<?php if (isset($_POST['send'])):?>

<?php
    $price = 100;
    $total = 0;
    validateData(); 
?>

<?php if (empty($validation)):?>
    <?php printData(); ?>
    <div class="container">
        <div class="header">
            <p>BOARDING PASS</p>
        </div>
        <div class="side">
            <p>Name of passenger:</p>
            <span><?= $_POST['name'].' '.$_POST['lastname']; ?></span><br>
            <p>Flight number:</p>
            <span><?= $_POST['flight']; ?></span>
        </div>
        <div class="content">
            <p><?= $_POST['flightfrom'].' ⇨ '.$_POST['flightto']; ?></p>
            <p>Price:</p>
            <span>Flight: <?=$price?>EUR</span><br>
            <?php $total = $total + $price; ?>
            <?php if ($_POST['bags'] > 20): ?>
                <?php $total = $total + 30; ?>
                <span>Baggage over 20kg: +30EUR</span>
            <?php endif; ?>
            <p>Total: <?= $total; ?>EUR</p>
        </div>
    </div>
<?php else: ?>
    <ul>
        <?php foreach($validation as $error): ?>
            <li><?=$error;?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php endif; ?>

        <div>
            <form method="post">
                <div>
                    <label for="flight">Skrydzio nr.</label>
                    <select name="flight">
                        <option style="display:none"></option>
                        <?php foreach($flights as $flight):?>
                        <option value="<?=$flight;?>"><?=$flight;?></option>
                        <?php endforeach; ?>
                    </select>
                    <small>Pasirinkite skrydi</small>
                </div><br>
                <div>
                    <label for="kodas">Asmens kodas</label>
                        <input type="text" id="ID" name="kodas">
                    <small>Iveskite asmens koda</small>
                </div><br>
                <div>
                    <label for="name">Vardas</label>
                        <input type="text" id="name" name="name">
                    <small>Iveskite varda</small>
                </div><br>
                <div>
                    <label for="lastname">Pavarde</label>
                        <input type="text" id="lastname" name="lastname">
                    <small>Iveskite pavarde</small>
                </div><br>
                <div>
                    <label for="flightfrom">Is:</label>
                    <select name="flightfrom">
                        <option style="display:none"></option>
                        <?php foreach($flightfrom as $from):?>
                        <option value="<?=$from;?>"><?=$from;?></option>
                        <?php endforeach; ?>
                    </select>
                    <small>Pasirinkite is kur skrisite</small>
                </div><br>
                <div>
                    <label for="flightto">I:</label>
                    <select name="flightto">
                        <option style="display:none"></option>
                        <?php foreach($flightto as $to):?>
                        <option value="<?=$to;?>"><?=$to;?></option>
                        <?php endforeach; ?>
                    </select>
                    <small>Pasirinkite kur skrisite</small>
                </div><br>
                <div>
                    <label for="bags">Bagazo svoris</label>
                        <input type="text" id="bags" name="bags">
                    <small>KG</small>
                </div><br>
                <div>
                    <label for="message"></label>
                        <textarea id="message" rows="3" name="message" placeholder="Parasykite zinute..."></textarea>
                    <small></small>
                </div>
                <button type="submit" name="send">Siusti</button>
            </form>
        </div>
    </body>
</html>