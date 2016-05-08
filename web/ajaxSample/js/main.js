$(document).ready(function() {
    get();
    $("#xml").on("click", get);
    $("#clc").on("click",sex);

    function get() {
        $.ajax({
            type: 'GET',
            url: '/xml/xml.php',
            cache: false,
            dataType: "xml",
            success : function (result) {
                $("#result").html('Load - OK!');
                var list = $('dl');
                list.empty();
                $(result).find('field').each(function (index, element) {
                    var field = $(element);
                    // get the values we want
                    var label = field.find('label').text();
                    var value = field.find('value').text();
                    var id = field.find('msg_id').text();
                    // and append some html in the <dl> element we stored previously
                    list.append('<dt id="'+id+'">' + label + ': </dt>')
                        .append('<dd id="'+id+'">' + value + '</dd>');
                });
            },
            error : function () {
                $("#result").html('Load - NOT OK!');
            }
        });
    }

    function doStuff(data) {
        // parse the xml
        data = $.parseXML(data);
        // first we query the HTML document to get the list element
        // and store it for later use

    }

    function sex() {
        $("dt#").remove();
        $("dd#").remove();
    }

});