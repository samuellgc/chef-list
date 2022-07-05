<?php
# hello_algolia.php
require __DIR__."/vendor/autoload.php";
use Algolia\AlgoliaSearch\SearchClient;

# Connect and authenticate with your Algolia app
$client = SearchClient::create("TNJPH85KY6", "3f2ab7a82941175e09358752c910a070");

# Create a new index and add a record
$index = $client->initIndex("kitchen_chefs");

# Search the index and print the results
$results = $index->search('');

foreach($results['hits'] as $hit) {
    $return .= '<div class="card-product">
                    <ul class="ul-card">
                        <li class="chef-name">Chef '.$hit['name'].'</li>
                        <li>My menu: '.$hit['menu'].'</li>
                        <li>'.$hit['description'].'</li>
                        <li class="chef-price">'.$hit['price'].' kr DKK</li>
                    </ul>
                    <button class="mdc-button mdc-button--raised">
                        <span class="mdc-button__label">Contact</span>
                    </button>
                </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <title>Chef's List</title>
</head>
<section>
<header class="mdc-top-app-bar mdc-top-app-bar--short">
  <div class="mdc-top-app-bar__row">
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
      <img src="assets/images/goco_logo.svg" alt="logo image" class="img-logo">
      
      <div class="mini-card">
        <span class="material-icons">
            account_circle
        </span>
        <span class="log-in">Log in</span>
      </div>
    </section>
  </div>
</header>
<main class="mdc-top-app-bar--fixed-adjust">
    <hr>
<div class="title-main">
    <span class="desc-main">Chef's List</span>
</div>
<div class="container" id="cards">
    <?=$return?>
</div>
</main>
<hr>
    <footer>
        <div class="footer-div">GOCO Test</div>
    </footer>
</section>
<script src="assets/js/index.js"></script>
</body>

</html>