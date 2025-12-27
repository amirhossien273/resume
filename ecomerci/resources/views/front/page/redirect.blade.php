<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>
    <form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
        <input type="hidden" name="RefId" value="{{ $refId }}">
    </form>

    <script type="text/javascript">
        window.onload = function () {
            document.forms['myform'].submit();
        };
    </script>
</body>
</html>