<?php
namespace Euler;

interface NumberWriter
{
    /**
     * @return string  a representation of the number
     */
    public function __invoke($number);
}
