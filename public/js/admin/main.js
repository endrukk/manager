$( function() {

    $('.sortable').nestedSortable({
        forcePlaceholderSize: true,
        items: 'li',
        handle: 'span',
        placeholder: 'menu-highlight',
        listType: 'ul',
        connectWith: '.sortable',
        maxLevels: 2,
        opacity: .6,
    });

} );