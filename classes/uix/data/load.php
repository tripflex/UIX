<?php

/**
 * Interface for data load
 *
 * @package   uix
 * @author    David Cramer
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 David Cramer
 */
namespace uix\data;

interface load{

    /**
     * Get data
     *
     * @since 1.0.0
     * @access public
     * @return mixed $data Requested data of the object
     */
    public function load_data();

    /**
     * get the objects data store key
     * @since 1.0.0
     * @access public
     * @return string $store_key the defined option name for this UIX object
     */
    public function store_key();


}
