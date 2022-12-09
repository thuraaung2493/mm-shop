<?php

namespace App\DataTransferObjects;

use PhpParser\Node\Expr\Cast\String_;

class CategoryData
{
    public function __construct(
        public readonly String $name
    ) {
    }
}
