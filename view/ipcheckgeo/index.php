<?php

namespace Anax\View;

if (!$_SERVER['HTTP_X_FORWARDED_FOR']) {
    $ip = $_SERVER['REMOTE_ADDR'];
} else {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

?>

<!-- IP CHECK GEO -->
<h1>Ip Check GEO</h1>
<p>
    Välkommen till Robins andra del av en IP-address-check-tjänst. Denna gång 
    kan du få reda på om IPn du vill testa är giltig, om den är en IPV4 eller IPV6 
    samt dess geografiska position.
</p>
<p>
    Fyll i fälten nedan med in IP-adress. Din egna IP är redan ifylld som default.
</p>

<!-- VALIDATE TEXT -->
<h3>
Kolla IP i textformat
</h3>

<form method="post" action="<?= url("ipcheckgeo/validate") ?>">
    <input type="text" name="ip-text" value="<?php echo $ip; ?>">
    <button type="submit" class="btn">Kolla IP</button>
</form>

<!-- VALIDATE JSON -->
<h3>
Kolla IP i JSON-format
</h3>

<form method="get" action="<?= url("ipcheckgeo/json") ?>">
    <input type="text" name="ip" value="<?php echo $ip; ?>">
    <button type="submit" class="btn">Kolla IP</button>
</form>

<!-- API INFO -->
<h3>
    API
</h3>
<p>
    API'et tar emot GET-requests på <b>/json?ip</b> med parametern <b>?ip=93.106.206.157</b>.
</p>
<p>
    Som svar får man som exempel:
</p>
<ul>
    <li>"ip": "93.106.206.157"</li>
    <li>"type": "ipv4"</li>
    <li>"country": "Finland"</li>
    <li>"region": "Pirkanmaa"</li>
    <li>"city": "Pirkanmaa"</li>
    <li>"latitude": 61.47808837890625</li>
    <li>"longitude": 23.739139556884766</li>
    <li>"valid": "Ja"</li>
</ul>

<!-- TEST ROUTES -->
<h3>Test routes</h3>
<ul>
    <li>
        <a href="<?= url("ipcheckgeo/json?ip=96.158.226.150") ?>">96.158.226.150</a>
    </li>
    <li>
        <a href="<?= url("ipcheckgeo/json?ip=175.200.244.203") ?>">175.200.244.203</a>
    </li>
    <li>
        <a href="<?= url("ipcheckgeo/json?ip=dettaaringenip") ?>">DettaaringenIP</a>
    </li>
    <li>
        <a href="<?= url("ipcheckgeo/json?ip=54a0:7531:8915:0fda:b298:82e1:7d8d:7f91") ?>">54a0:7531:8915:0fda:b298:82e1:7d8d:7f91</a>
    </li>
</ul>

<style>
    .btn {
        padding: 4px 25px;
    }
</style>