<?php
if (!$loader = @include __DIR__.'/../vendor/autoload.php') {
    die('You must set up the project dependencies, run the following commands:'.PHP_EOL.
        'Follow instructions here: https://getcomposer.org/download/'.PHP_EOL);
}
$loader->add('LlewellynThomas' . __DIR__ . 'Coins', __DIR__);
