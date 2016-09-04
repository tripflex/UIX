<?php
/**
 * UIX section
 *
 * @package   uixv2
 * @author    David Cramer
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 David Cramer
 */
namespace uixv2\ui;

/**
 * UIX sections class.
 *
 * @since 2.0.0
 * @see \uixv2\uix
 */
class section extends \uixv2\data\data {

    /**
     * The type of object
     *
     * @since 2.0.0
     * @access public
     * @var      string
     */
    public $type = 'section';


    /**
     * Sets the Sections to the current instance and registers it's Controls 
     *
     * @since 2.0.0
     * @see \uixv2\uix
     * @access public
     */
    public function setup() {
        if( !empty( $this->struct['controls'] ) ){            
            foreach ( $this->struct['controls'] as $control_slug => $control_structure)
                $this->add_child( 'control\\' . $control_structure['type'], $control_slug, $control_structure );
        }
    }

    /**
     * Render the Section
     *
     * @since 2.0.0
     * @access public
     */
    public function render(){
        
        if( empty( $this->struct['active'] ) ){
            $hidden = 'true';
        }else{            
            $hidden = 'false';
        }

        echo '<div id="' . esc_attr( $this->slug . '-' . $this->parent->slug ) . '" class="uix-' . esc_attr( $this->parent->type ) . '-section" aria-hidden="' . esc_attr( $hidden ) . '">';
            echo '<div class="uix-' . esc_attr( $this->parent->type ) . '-section-content">';
                if( !empty( $this->struct['description'] ) ){
                    echo '<p class="description">' . esc_html( $this->struct['description'] ) . '</p>';
                }
                if( !empty( $this->struct['template'] ) ){
                    // tempalte
                    if( file_exists( $this->struct['template'] ) ){
                        include $this->struct['template'];
                    }else{
                        echo esc_html__( 'Template not found: ', 'text-domain' ) . $this->struct['template'];
                    }

                }elseif( !empty( $this->children ) ){
                    foreach ( $this->children as $control ) {
                        $control->render();
                    }                    
                }
                
            echo '</div>';
        echo '</div>';
    }


    /**
     * checks if the current section is active
     *
     * @since 2.0.0
     * @access public
     */
    public function is_active(){
        return $this->parent->is_active();
    }

}