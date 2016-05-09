$(document).ready(function(){
    var i=1;
    var ch="";
    function chtxt() {
        var txt = "You have clicked "+ i +" times. \n";
        var msg = $("#msg");
        if(msg.trim() == ""){
            msg.val("");
            return;
        }
        ch += msg.trim() + "\n";
        $("#count").text(txt);
        $("#txtHere").text(ch);
        msg.val("");
        i++;
    }
    $("#clicker").on("click", chtxt);
    $("#msg").keyup(function (e) {
        if (e.keyCode != 13) return;
        chtxt();
    });
    $("#xml").on("click", function () {
        var xmlDocument = $($.parseXML('<?xml version="1.0" encoding="utf-8" ?><root />'));
        $('root',xmlDocument).append($('<message />', xmlDocument));
        var xElement = $(xmlDocument).find('message');
        $(xElement).append('<nickname>chatuser 1</nickname>',xElement);
        $(xElement).append('<msg>2dawdADAD8</msg>',xElement);
        var list = $("#menu");

        var str = (new XMLSerializer()).serializeToString(xmlDocument.context);
        list.text(str);
        sendXml(str);

    });
    function sendXml(str)   {

        $.ajax({
            url: '/xml/xml.php',
            processData: false,
            type: "POST",
            data: str, // send the string directly
            success: function(){
                //alert('OK!');
            },
            error: function(response) {
                alert(response);
            }
        });
    }


});