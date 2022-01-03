<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'verify' => false,
    'base_uri' => 'https://www.alura.com.br/']);
//$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php'); //https://www.alura.com.br/cursos-online-programacao/php
$crawler = new Crawler();
//$html = $resposta->getBody();

//$crawler->addHtmlContent($html);

//$cursos = $crawler->filter('span.subcategoria__nome'); //span.card-curso__nome

$buscador = new \Alura\BuscadorDeCursos\Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}