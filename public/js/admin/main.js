$( function() {

    $( "#menu_item_drag, #menu_final" ).sortable({
        connectWith: ".drag-drop-area",

        tolerance:'intersect',
        update: function( event, ui ) {
            if ($('#menu_final > .item_' + ui.item.attr('id')).length === 0 &&
                !ui.item.parent().hasClass('children') ) {
                ui.item.after('<div class="children drag-drop-area item_' + ui.item.attr('id') + '"></div>');
                $('#menu_final .children').sortable({
                    connectWith: ".drag-drop-area",
                    tolerance: 'intersect',
                }).disableSelection();
            }
        },
        over:function(event,ui){

        },
        receive:function(event, ui){
            calcWidth($(this).siblings('.title'));
        },
    }).disableSelection();

    function calcWidth(obj){
        console.log('---- calcWidth -----');

        var titles =
            $(obj).siblings('.space').children('.route').children('.title');

        $(titles).each(function(index, element){
            var pTitleWidth = parseInt($(obj).css('width'));
            var leftOffset = parseInt($(obj).siblings('.space').css('margin-left'));

            var newWidth = pTitleWidth - leftOffset;

            if ($(obj).attr('id') == 'title0'){
                console.log("called");

                newWidth = newWidth - 10;
            }

            $(element).css({
                'width': newWidth,
            })

            calcWidth(element);
        });

    }
} );