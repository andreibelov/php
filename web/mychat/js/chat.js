$(document).ready(function(){
    var i=1;
    var ch="";
    function chtxt() {
        var txt = "You have clicked "+ i +" times. \n";
        var msg = $("#msg").val();
        if(msg.trim() == ""){
            $("#msg").val("");
            return;
        }
        ch += msg.trim() + "\n";
        $("#count").text(txt);
        $("#txtHere").text(ch);
        $("#msg").val("");
        i++;
    }
    $("#clicker").on("click", chtxt);
    $("#msg").keyup(function (e) {
        if (e.keyCode != 13) return;
        chtxt();
    });
    $("#xml").on("click", function () {
        $.get('/?xml=1')
            .done(function(data){
                // parse the xml
                data = $.parseXML(data);
                // first we query the HTML document to get the list element
                // and store it for later use
                var list = $('dl');
                // data is a xml document now, so we query it...
                $(data)
                // and search for all <field> elements
                    .find('field')
                    // now we can play with each <field>
                    .each(function(index, element){
                        // as example we query & store the field
                        var field = $(element);
                        // get the values we want
                        var label = field.find('label').text();
                        var value = field.find('value').text();
                        // and append some html in the <dl> element we stored previously
                        list
                            .append('<dt>'+label+': </dt>')
                            .append('<dd>'+value+'</dd>')
                        ;
                    })
                ;
            })
            .fail(function(){
                alert('something went wrong!');
            });
    });


});