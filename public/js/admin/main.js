(function(){
    var droppable = new Draggable.Droppable(document.querySelectorAll(".drag > ul"), {
        draggable: "li",
        droppable: "ul"
    });

    droppable.on("droppable:over", function() {
        $("ul").removeClass("draggable-droppable--occupied");
        console.log("droppable:over")
    });
    droppable.on("droppable:out", () => console.log("droppable:out"));

    function Drag() {
        $.get("https://api.coinmarketcap.com/v1/ticker/?limit=5").done(function(
            data
        ) {
            $.map(data, function(data) {
                let resultMarkup = liResult(data);
                $("#coin-drag").append(resultMarkup);
            });
        });
    }

    function liResult(data) {
        const markup = `<li>        
            <h2> ${data.name} </h2>
            <p id='price-btc'> ${data.price_btc} </p>
            <p id='price-usd'> ${data.price_usd} </p>

        </li>`;
        return markup;
    }

    Drag();

})();