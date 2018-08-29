<?php
// UniPi MASTER
// Written by Jayke Peters
// Define Functions
// wget --content-disposition "URL"
function storeVar() 
{
    // Set "$req" as a Global Variable
    global $req;

    // Store the request in a variable
    $req = $_GET['q'];

    // Convert request to lowercase
    $req = strtolower($req);
}

// Set Response Header as TXT
function setHeader($path, $name)
{ 
    // ABSOLUTELY NO CACHING!
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    // Direct Download Option Here or get zip
    header('Content-Type: text/plain');
    header("Content-Disposition: inline; filename=$name");
    readfile($path);
}

// Redirect invalid requests to README
function error($url) {
    header("Location: $url");
    exit;
}

// Is the variable set?
if (isset($_GET['q']))
{
    storeVar();
}

// Determinte the correct query 
if ($req == 'al') 
{
    setHeader('/etc/pihole/adlists.list', 'adlists.list');
} elseif ($req == 'bl') {
    setHeader('/etc/pihole/blacklist.txt', 'blacklist.txt');
} elseif ($req == 'll') {
    setHeader('/etc/pihole/local.list', 'local.list');
} elseif ($req == 'fc') {
    setHeader('/etc/pihole/pihole-FTL.conf', 'pihole-FTL.conf');
} elseif ($req == 'rl') {
    setHeader('/etc/pihole/regex.list', 'regex.list');
} elseif ($req == 'wl') {
    setHeader('/etc/pihole/whitelist.txt', 'whitelist.txt');
} elseif ($req == 'lg') {
    setHeader('/var/log/pihole.log', 'pihole.log');
} elseif ($req == 'ss') {
    setHeader('/etc/dnsmasq.d/05-restrict.conf', 'safesearch.txt');
} elseif ($req == 'hf') {
    setHeader('/etc/dnsmasq.hosts', 'dnsmasq.hosts');
} else {
    error('https://github.com/jaykepeters/UniPi/blob/master/README.md');
}
?>
