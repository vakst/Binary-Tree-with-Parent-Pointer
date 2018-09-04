<?php

/**
 * Class CliReader
 */
class CliReader implements ReaderInterface
{
    protected $expectedAmount;
    protected $current;

    public function __construct()
    {
        $this->current = 0;
        fscanf(STDIN, "%d\n", $this->expectedAmount);
    }

    /**
     * @return null|string
     */
    public function next()
    {
        if ($this->current++ == $this->expectedAmount) {
            return null;
        }
        return trim(fgets(STDIN));
    }
}