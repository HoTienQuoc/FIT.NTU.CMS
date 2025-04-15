<?php
$server = "mongodb://google.com:27017/university";
$c = new \MongoDB\Client($server);
if ($c->connected) {
    echo "Connected successfully";
} else {
    echo "Connection failed";
}
