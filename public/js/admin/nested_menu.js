$( function() {
    let updateOutput = function(e)
    {
        let list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
        maxDepth: 1
    }).on('change', updateOutput);
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1,
        maxDepth: 2,
    }).on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));
    $('#nestable-menu').on('click', function(e)
    {
        let target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });


    $('#menu_order').val(processMenuOrder());
    $(document).on('change', '#nestable2', function(){
        $('#menu_order').val(processMenuOrder());
    });

    // $(document).on('change', '#nestable TESE', function(){
    //     let CSRF_TOKEN = $('#global_csrf_token').attr('content');
    //
    //     $.ajax({
    //         url: $('.ajax-actions #menu_fom_action').text(),
    //         type: 'POST',
    //         data: {
    //             _token: CSRF_TOKEN,
    //             menu: processMenuOrder(),
    //             id: $('.ajax-actions #menu_fom_action').attr('data-menu-id'),
    //         },
    //         dataType: 'JSON',
    //         success: function (data) {
    //             console.log(data);
    //         }
    //     });
    // });

} );

let processMenuOrder = function () {
    let result = [];
    $('#nestable2 > ol > li').each(function () {
        let item = new MenuItem(parseInt( $(this).attr('data-id') ));


        if($(this).find('ol.dd-list > li.dd-item').length > 0){
            $(this).find('ol.dd-list > li.dd-item').each(function () {
                item.setChildren(parseInt( $(this).attr('data-id') ))
            });
        }
        result.push(item);
    });
    return JSON.stringify(result);
};

class MenuItem {
    constructor(id) {
        this.id = id;
    }

    setChildren(childID){
        if(typeof(this.children) === "undefined"){
            this.children = [];
        }
        console.log($(this));
        this.children.push({id: childID});
    }
}