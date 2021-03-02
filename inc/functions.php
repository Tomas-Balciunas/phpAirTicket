<?php 

function printData() {
    $data = "data/zinutes.txt";
    $content = file_get_contents($data);
    $formData = implode(',', $_POST);
    $content .= $formData."/n";
    file_put_contents($data, $content);
    $messages = file_get_contents($data, true);
    $messages = explode('/n', $messages);
    echo '<table>';
    echo '<tr>';
    echo '<th>Flight nr.</th>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>From</th>';
    echo '<th>To</th>';
    echo '<th>Baggage</th>';
    echo '<th>Comment</th>';
    echo '</tr>';
    foreach($messages as $message) {
        $message = explode(',', $message);
        echo '<tr>';
        foreach($message as $key) {
            echo '<td>' . $key . '</td>';
        }
        echo '<td><input type="submit" name="ticket"></td>';
        echo '</tr>';
    }
    echo '</table>';
}

function validateData() {
    global $validation;

    if ($_POST['flight'] == '') {
        $validation[] = "Nepasirinktas skrydzio numeris";
    };
    if (!preg_match('/^[0-9]{11}$/', $_POST['kodas'])) {
        $validation[] = "Neteisingas asmens kodas";
    };
    if (!preg_match('/^[A-Z][a-zA-Z]{2,100}$/', $_POST['name'])) {
        $validation[] = "Vardas turi prasideti is didziosios raides";
    };
    if (!preg_match('/^[A-Z][a-zA-Z]{2,100}$/', $_POST['lastname'])) {
        $validation[] = "Pavarde turi prasideti is didziosios raides";
    };
    if ($_POST['flightfrom'] == '') {
        $validation[] = "Nepasirinktas miestas";
    };
    if ($_POST['flightto'] == '') {
        $validation[] = "Nepasirinktas miestas";
    };
    if (!preg_match('/^[0-9]{1,3}$/',$_POST['bags']) or ($_POST['bags'] > 100)) {
        $validation[] = "Bagazo svoris turi buti nurodytas skaiciais ir buti ne didesnis kaip 100kg";
    };
    if (!preg_match('/^.{10,300}$/', $_POST['message'])) {
        $validation[] = "Zinute turi buti ne trumpesne nei 10 simboliu ir ne ilgesne kaip 300 simboliu";
    };
}