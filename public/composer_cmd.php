<?php

$composerPhar = './composer.phar';

$composerCommand = 'Composer install';

passthru("php $composerPhar $composerCommand",$output);

echo "command- ".$output;