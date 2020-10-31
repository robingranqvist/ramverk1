<?php

namespace Anax\View;

?>

<!-- IP CHECK -->
<h1>Ip Check</h1>
<p>
    Har du alltid haft en IP-adress i huvudet som du bara velat veta om det 
    är en riktig IP-adress? Har du alltid velat få mera information om denna 
    IP? Då har du kommit till det rätta stället. Välkommen till Robins IP-check.
</p>
<p>
    På denna sida kan du validera IP-adresser och få lite mer information om dessa. 
</p>
<p>
    Fyll i fälten nedan med in IP-adress.
</p>

<!-- VALIDATE TEXT -->
<h3>
Validera IP i textformat
</h3>

<form method="post" action="<?= url("ipcheck/validate") ?>">
    <input type="text" name="ip-text" placeholder="Textformat">
    <button type="submit" class="btn">Validera</button>
</form>

<!-- VALIDATE JSON -->
<h3>
Validera IP i JSON-format
</h3>

<form method="get" action="<?= url("ipcheck/json") ?>">
    <input type="text" name="ip" placeholder="JSON-format">
    <button type="submit" class="btn">Validera</button>
</form>

<!-- API INFO -->
<h3>
    API
</h3>
<p>
    Mitt API tar emot GET-requests på <b>/json?ip</b> med parametern <b>?ip=93.106.206.157</b>.
</p>
<p>
    Som svar får man:
</p>
<ul>
    <li>"realIp": true/false</li>
    <li>"protocol": "IPV4" / "IPV6"</li>
    <li>"domain": "Domänen tillhörande IP:n"</li>
</ul>

<!-- TEST ROUTES -->
<h3>Test routes</h3>
<ul>
    <li>
        <a href="<?= url("ipcheck/json?ip=96.158.226.150") ?>">96.158.226.150</a>
    </li>
    <li>
        <a href="<?= url("ipcheck/json?ip=54a0:7531:8915:0fda:b298:82e1:7d8d:7f91") ?>">54a0:7531:8915:0fda:b298:82e1:7d8d:7f91</a>
    </li>
    <li>
        <a href="<?= url("ipcheck/json?ip=175.200.244.203") ?>">175.200.244.203</a>
    </li>
    <li>
        <a href="<?= url("ipcheck/json?ip=dettaaringenip") ?>">DettaaringenIP</a>
    </li>
</ul>

<style>
    .btn {
        padding: 4px 25px;
    }
</style>