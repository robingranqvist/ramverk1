<?php

namespace Anax\View;

?>

<h1>
    Validera IP
</h1>

<p>
    <b><?php echo $realIp; ?></b>
</p>
<p>
    <b>Protokoll: </b><?php echo $protocol; ?>
</p>

<p>
    <b>Domän: </b><?php echo $domain; ?>
</p>

<a href="<?= url("ipcheck") ?>">Gå tillbaka -></a>