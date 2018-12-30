<?php
// UniPi MASTER
// Written by Jayke Peters
// Define Functions
// wget --content-disposition "URL"
// DEMO REQUEST: UniPi.php?q=ll, returns the "Local List"
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

switch($req) {
    case 'al':
        setHeader('/etc/pihole/adlists.list', 'adlists.list');
        break;
    case 'bl':
        setHeader('/etc/pihole/blacklist.txt', 'blacklist.txt');
        break;
    case 'll':
        setHeader('/etc/pihole/local.list', 'local.list');
        break;
    case 'fc':
        setHeader('/etc/pihole/pihole-FTL.conf', 'pihole-FTL.conf');
        break;
    case 'rl':
        setHeader('/etc/pihole/regex.list', 'regex.list');
        break;
    case 'wl':
        setHeader('/etc/pihole/whitelist.txt', 'whitelist.txt');
        break;
    case 'lg':
        setHeader('/var/log/pihole.log', 'pihole.log');
        break;
    case 'ss':
        setHeader('/etc/dnsmasq.d/05-restrict.conf', 'safesearch.txt');
        break;
    case 'hf':
        setHeader('/etc/dnsmasq.hosts', 'dnsmasq.hosts');
        break;
    case 'hosts':
        setHeader('/etc/hosts', 'hosts.txt');
        break;
    default:
        error('https://github.com/jaykepeters/UniPi/blob/master/README.md');
}
?>
