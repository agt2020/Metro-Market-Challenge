<?php

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if($method != 'GET' || $uri != '/offers')
{
        http_response_code(404);
        echo json_encode([]);
        exit();
}

http_response_code(200);
$offers = file_get_contents('storage/offers.json') ?? null;
if($offers != null)
{
        echo $offers;
}
exit();