<!DOCTYPE html>
<html>
<head>
    <title>{PAGE_TITLE}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="shortcut icon" href="/favicon.ico" />
    <link type="text/css" rel="stylesheet" media="all" href="/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/chat.js"></script>
</head>
<body>
<div id="page">
    <div id="header">
        {PAGE_HEADER}
    </div>
    <div id="main" class="main">
        <div id="navbar" class="navbar">
            {NAVBAR}
        </div>
        <div id="menu" class="menu">
            {MENU}
            <dl></dl>
        </div>
        <div id="content" class="content">
            {CONTENT}
            <div id="count">You have clicked 0 times. </div>
            <textarea id="txtHere" name="txt" rows="15" cols="50" readonly></textarea>
            <br>
            <textarea id="msg" name="msg" rows="4" cols="50">Type your message here</textarea>
            <br />
            <button type="button" id="clicker">Send</button>
            <button type="button" id="xml">XML!</button>
        </div>
    </div>
    <div id="footer" class="footer">
        {FOOTER}
    </div>
</div>
</body>
</html>