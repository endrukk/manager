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

    $(document).on('submit', '#menu_item_form', function(e){
        e.preventDefault();
        $('#new_item_validation_errors').html('');
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {
                $('#nestable > .dd-list').append(
                  '<li class="dd-item" data-id="' + data['id'] + '">' +
                      '<div class="dd-handle is-block tag is-primary is-large">' + data['name'] + '</div>' +
                  '</li>'
                );

                $('#menu_item_form input[type=text], #menu_item_form select').val("")
                    .removeClass('is-error');
                $('#menu_item_form .notification').addClass("is-hidden");

                $('.modal').removeClass('is-active');
            },
            error: function (data) {
                let errors = data.responseJSON.errors;
                for(let i in errors) {
                    if (errors.hasOwnProperty(i)) {
                        $('#new_item_validation_errors').append(
                            '<li>' +
                            errors[i][0] +
                            '</li>');

                        $('#menu_item_form input[name=' + i +']').addClass('is-danger');
                        $('#menu_item_form select[name=' + i +']').parent().addClass('is-danger');
                    }
                }
                $('#menu_item_form .notification').removeClass("is-hidden");
            }
        });
    });

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