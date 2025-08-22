<?php

namespace App\QueryBuilders;

use Illuminate\Http\Request;

interface IWithStandardQuery
{
    public function standardQuery(Request|null $request = null): self;
}