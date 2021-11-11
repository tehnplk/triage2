var socket;
var socketError;
var initOK = 0;
window.currentCIDAjaxEventName = "";

function smlog(msg) {
    console.log(msg);
}

function readyReadCID() {

    if ((socketError === 1) || (initOK === 0)) {
        initSmartCard();
        // await sleep(2000);
        return;
    }
    console.log("Inform Server Read and Send CID Data");
    try {
        socket.send("cid-clear");
    } catch (ex) {
        smlog(ex);
    }
    try {
        socket.send("cid-nopicture");
    } catch (ex) {
        smlog(ex);
    }

    try {
        socket.send("cid-ready");
    } catch (ex) {
        smlog(ex);
    }
}

function initSmartCard() {
    try
    {

        console.log("function initSmartCard v1.1 : " + window.currentCIDAjaxEventName);

        // window.currentCIDAjaxEventName ;
        //   console.log("evtName = "+evtName);
        socket = new WebSocket("ws://localhost:18888/whatever/", "cid");
        // socket = new WebSocket("ws://localhost:8888",""); // will also work
        initOK = 1;
        smlog('WebSocket - status ' + socket.readyState);
        socket.onopen = function (msg) {
            console.log(msg);
            smlog("onopen: Welcome - status " + this.readyState);
            socketError = 0;
            readyReadCID();

        };
        socket.onmessage = function (msg) {
            console.log(msg);
            smlog("tehn onmessage: (" + msg.data.length + " bytes): " + (msg.data.length < 5000 ? msg.data : (msg.data.substr(0, 30) + '...')));
            if (msg.data.length < 200) {
                $('#smc-error').hide();
                $('#smc-success').hide();
                $('#smc-warning').show();
            }
            try {
                var json = JSON.parse(msg.data);
                if (json.hasOwnProperty('task') && json.hasOwnProperty('result')) {

                    if ((json.task === "cid-ready") && (json.result === "OK")) {
                        smlog(json.CID);
                        $('#person-cid').val(json.CID);
                        $('#person-pname').val(json.Pname_Thai);
                        $('#person-fname').val(json.FName_Thai);
                        $('#person-lname').val(json.LName_Thai);
                        sex = 'ชาย';
                        if (json.sex == '2') {
                            sex = 'หญิง';
                        }

                        $('#person-sex').val(sex);

                        birth = json.BirthDate;
                        birth = birth.split("-");
                        by = parseInt(birth[0]) + 543;
                        bm = birth[1];
                        bd = birth[2];
                        $('#person-byear').val(by);
                        $('#person-bmon').val(bm);
                        $('#person-bdate').val(bd);

                        $('#person-nationality').val('ไทย');

                        $('#person-addr_chw').val(json.ProvinceName);
                        $('#person-addr_amp').val(json.AmphurName).trigger('change');
                        $('#person-addr_tmb').val(json.TambolName);
                        $('#person-addr_moo').val(json.MooPart);
                        $('#person-addr_no').val(json.AddrPart);
                        road = '--';
                        if (json.Road != '') {
                            road = json.Road;
                        }
                        $('#person-addr_road').val(road);
                        //alert("Read SmartCard Success!!");
                        $('#person-marital').focus();

                        $('#smc-error').hide();
                        $('#smc-success').show();
                        $('#smc-warning').hide();

                        // $("ptimage").src = 'data:image/jpeg;base64,'+json.PersonPictureJPEGString;

                        // ajaxRequest(PersonSmartCardReaderForm.UniHTMLFrame1, 'ciddata', ['data='+msg.data]);
                        //  ajaxRequest(UniHospitalPersonListFrame.EditButton, 'ciddata', ['data='+msg.data]);


                        //smlog("Call AjaxRequest " + window.currentCIDAjaxEventName + " = " + eval(window.currentCIDAjaxEventName));

                        //ajaxRequest(eval(window.currentCIDAjaxEventName), 'ciddata', ['data=' + msg.data]);


                    }


                }
            } catch (ex) {
                //alert(ex);
                smlog(ex);
            }


        };
        socket.onerror = function (msg) {
            console.log('err', msg);
            //alert('กรุณาเปิดโปรแกรมอ่านบัตร และตรวจสอบสายเครื่องอ่านบัตรอีกครั้ง');
            $('#smc-error').show();
            $('#smc-success').hide();
            $('#smc-warning').hide();
            smlog("onerror - code:" + msg.code + ", reason:" + msg.reason + ", wasClean:" + msg.wasClean + ", status:" + this.readyState);
            socketError = 1;
        };
        socket.onclose = function (msg) {
            console.log(msg);
            smlog("onclose - code:" + msg.code + ", reason:" + msg.reason + ", wasClean:" + msg.wasClean + ", status:" + this.readyState);
            socketError = 1;
        };
    } catch (ex)
    {
        smlog(ex);
    }

}




function quitSmartCard() {


    socket.close(1000, 'Bye bye');
    socket = null;

}