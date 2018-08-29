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

    var menu_order = processMenuOrder();
    console.log(menu_order);
} );

var processMenuOrder = function () {
    let result = {};
    $('#nestable2 li').each(function () {
        let itemID = parseInt( $(this).attr('data-id') );
        let parentID = parseInt( $(this).attr('data-parent') );

        if(!Number.isNaN(parentID)){
            result[parentID].setChildren(itemID)
        }else{
            result[itemID] =  new MenuItem(itemID);
        }
    });
    return result;
};

class MenuItem {
    constructor(id) {
        this.id = id;
    }

    setChildren(childID){
        if(typeof(this.children) === "undefined"){
            this.children = {};
            this.childPosition
        }
        this.children[childID]['id'] = childID;
        this.children[childID]['position'] = childID;
    }
}