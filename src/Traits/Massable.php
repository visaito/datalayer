<?php

namespace CodeHappy\DataLayer\Traits;

trait Massable
{
    /**
     * Update All
     *
     * @param array $data
     * @return int
     */
    public function updateAll(array $data): int
    {
        return $this->builder()
            ->update($data);
    }

    /**
     * Delete All
     *
     * @return int
     */
    public function deleteAll(): int
    {
        return $this->builder()
            ->delete();
    }
}
