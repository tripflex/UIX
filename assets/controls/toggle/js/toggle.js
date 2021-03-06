(function() {

    jQuery( function( $ ){
        $( document ).on( 'change', '.uix-control .switch', function( e ){
            var clicked     = $( this ),
                parent      = clicked.closest( '.uix-section-content' ),                
                toggleAll   = parent.find( '[data-toggle-all="true"]' ),
                allcount    = parent.find( '.uix-control .switch > input' ).not( toggleAll ).length,
                tottlecount = parent.find( '.uix-control .switch > input:checked' ).not( toggleAll ).length,
                control     = $( '#' + clicked.data('for') );

            if( control.is(':checked') ){
                clicked.addClass( 'active' );
                if( allcount === tottlecount ){
                   toggleAll.prop( 'checked', true ).parent().addClass( 'active' );
                }

            }else{
                clicked.removeClass( 'active' );
                if( toggleAll.length ){
                    toggleAll.prop( 'checked', false ).parent().removeClass( 'active' );
                }
            }

        } );

        $( '.uix-control .switch' ).trigger( 'change' );

        $( document ).on('change', '[data-toggle-all="true"]', function(e){
            var clicked = $( this ),
                parent = clicked.closest( '.uix-section-content' );

            parent.find('.uix-control .switch > input').not( this ).prop('checked', this.checked ).trigger('change');
        });

    });



})( jQuery );