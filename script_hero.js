//alert('yo');
$( "input[class='hero1']" ).each(function() {
    $(this).click(function (ev) {
        $("#fighter1")[0].src = $(this)[0].src;
        $("#fighter1")[0].alt = $(this)[0].alt;
        $("#champs1").val($(this)[0].title);
        $("#fighter1name").text($(this)[0].alt);
    });
});

$( "input[class='hero2']" ).each(function() {
    $(this).click(function (ev) {
        $("#fighter2")[0].src = $(this)[0].src;
        $("#fighter2")[0].alt = $(this)[0].alt;
        $("#champs2").val($(this)[0].title);
        $("#fighter2name").text($(this)[0].alt);
    });
});
