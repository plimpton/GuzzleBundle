<?php

namespace plimpton\Bundle\GuzzleBundle\Log;

use Psr\Log;

/**
 * Interface LoggerInterface
 *
 * @author  SuRiKmAn <surikman@surikman.sk>
 * @package plimpton\Bundle\GuzzleBundle\Log
 */
interface LoggerInterface extends Log\LoggerInterface
{

    /**
     * Clear messages list
     *
     * @return void
     */
    public function clear();

    /**
     * Return if messages exist or not
     *
     * @return  boolean
     */
    public function hasMessages();

    /**
     * Return log messages
     *
     * @return  array
     */
    public function getMessages();
}
