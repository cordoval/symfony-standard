<?php

namespace Cordoval\BBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CordovalBBundle extends Bundle
{
    public function getParent()
    {
        return 'CordovalABundle';
    }
}
