<?php
/**
 * UIX Controls
 *
 * @package   controls
 * @author    David Cramer
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 David Cramer
 */
namespace uix\ui\control;

/**
 * Template file include. for including custom control html/php
 *
 * @since 1.0.0
 */
class template extends \uix\ui\control{

    /**
     * The type of object
     *
     * @since       1.0.0
     * @access public
     * @var         string
     */
    public $type = 'template';

    /**
     * Returns the main input field for rendering
     *
     * @since 1.0.0
     * @see \uix\ui\uix
     * @access public
     * @return string 
     */
    public function input(){
        
        if( !empty( $this->struct['template'] ) && file_exists( $this->struct['template'] ) )
            include $this->struct['template'];
    }    
     

}