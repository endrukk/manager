$( function() {

    $(document).ready(function () {
        $(".drag-drop-area").sortable({
            connectWith: ".drag-drop-area",
            opacity: 0.7,
            delay: 150,
        }).disableSelection();
    });

} );