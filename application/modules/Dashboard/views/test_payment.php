<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Merchant Page</title>
        <script src="https://uat2.enets.sg/GW2/js/jquery-3.1.1.min.js"
        type="text/javascript"></script>
        <script src="https://uat2.enets.sg/GW2/pluginpages/env.jsp"></script>
        <!--<script type="text/javascript" src="https://uat2.enets.sg/GW2/js/apps.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url('classic/assets/js/payment.js'); ?>"></script>
    </head>
    <body>
        <input type="hidden" id="txnReq" name="txnReq" value='{"ss":"1","msg":{"netsMid":"UMID_887770001","tid":"","submissionMode":"B","txnAmount":"1000","merchantTxnRef":"20170605 10:26:51.98","merchantTxnDtm":"20170605 10:26:51.989","paymentType":"SALE","currencyCode":"SGD","paymentMode":"","merchantTimeZone":"+8:00","b2sTxnEndURL":"https://sit2.enets.sg/MerchantApp/sim/b2sTxnEndURL.jsp","b2sTxnEndURLParam":"","s2sTxnEndURL":"https://sit2.enets.sg/MerchantApp/rest/s2sTxnEnd","s2sTxnEndURLParam":"","clientType":"W","supMsg":"","netsMidIndicator":"U","ipAddress":"127.0.0.1","language":"en"}}'>
        <input type="hidden" id="keyId" name="keyId" value=''>
        <input type="hidden" id="hmac" name="hmac" value=''>
        <div id="anotherSection">
            <fieldset>
                <div id="ajaxResponse"></div>
            </fieldset>
        </div>
        <script>
            window.onload = function () {
                var txnReq = {
                    "ss": "1", 
                    "msg": {
                        "netsMid": "UMID_877772003",
                        "tid": "",
                        "submissionMode": "B", 
                        "txnAmount": "30",
                        "merchantTxnRef": "20170605 10:26:51.98",
                        "merchantTxnDtm": "20170605 10:26:51.989", 
                        "paymentType": "SALE", 
                        "currencyCode": "SGD",
                        "paymentMode": "",
                        "merchantTimeZone": "+8:00", 
                        "b2sTxnEndURL": "https://sit2.enets.sg/MerchantApp/sim/b2sTxnEndURL.jsp",
                        "b2sTxnEndURLParam": "", 
                        "s2sTxnEndURL": "https://sit2.enets.sg/MerchantApp/rest/s2sTxnEnd",
                        "s2sTxnEndURLParam": "",
                        "clientType": "W",
                        "supMsg": "",
                        "netsMidIndicator": "U",
                        "ipAddress": "127.0.0.1", 
                        "language": "en"
                    }
                }
                var txnReq = document.getElementById('txnReq').value;
                var keyId = '154eb31c-0f72-45bb-9249-84a1036fd1ca';
                var hmac = '38a4b473-0295-439d-92e1-ad26a8c60279';
                sendPayLoad(txnReq, hmac, keyId);
            };
        </script>

    </body>
</html>