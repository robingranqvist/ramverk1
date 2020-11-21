<?php

namespace Anax\View;

?>

<!-- VALIDATE VIEW -->
<h1>
    Information om IP-adressen
</h1>

<p>
    <b>Ip: </b><?php print_r($ip); ?>
</p>
<p>
    <b>Protocoll: </b><?php print_r($type); ?>
</p>
<p>
    <b>Land: </b><?php print_r($country); ?>
</p>
<p>
    <b>Region: </b><?php print_r($region); ?>
</p>
<p>
    <b>Stad: </b><?php print_r($city); ?>
</p>
<p>
    <b>Latitud: </b><?php print_r($latitude); ?>
</p>
<p>
    <b>Longitud: </b><?php print_r($longitude); ?>
</p>
<p>
    <b>Valid Ip: </b><?php print_r($valid); ?>
</p>

<a href="<?= url("ipcheckgeo") ?>">Gå tillbaka -></a>