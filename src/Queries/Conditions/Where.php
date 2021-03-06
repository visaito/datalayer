<?php

namespace CodeHappy\DataLayer\Queries\Conditions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class Where extends AbstractCondition
{
    /**
     * {@inheritDoc}
     * @throws \InvalidArgumentException
     */
    public function handle(): Builder
    {
        $params = func_get_args();
        if (count($params) === 1 && is_string($params[0])) {
            return $this->builder->whereRaw($params[0]);
        }
        $operator   = $this->lastParam($params);
        $count      = count($params);
        if ($count !== 3) {
            throw new InvalidArgumentException();
        }
        list($column, $comparator, $value) = $params;
        return $this->builder->where(DB::raw($column), $comparator, $value, $operator);
    }
}
