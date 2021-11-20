var socket;
var socketError;
var initOK = 0;
window.currentCIDAjaxEventName = "";

var chw_name;
var amp_name;
var tmb_name;
var addr_code;
var road;
var moo;
var address;

function smlog(msg) {
    console.log(msg);
}


$('.btn-addr-en').click(function () {
    //console.log('ok');
    tmb_code = $('#sel-tmb').val();
    addr = $('#patient-address').val();
    moo = $('#patient-moo').val();
    if (!tmb_code) {
        alert('กรุณาเลือกตำบล');
        return;
    }
    console.log(tmb_code);
    $.get("../ajax/addr-full-en", {
        'tmb_code': tmb_code,

    }, function (data) {
        console.log(data);
        $('#patient-address_full_english').val(addr + ' ,Moo ' + moo + ' ,' + data.tmb_en + ', ' + data.amp_en + ', ' + data.chw_en + ', ' + data.post_code);

    })

});

function get_all_addr(chw_name, amp_name, tmb_name, moo, addr, road, sec1, sec2) {
    console.log('get_all_addr');
    $.get("../ajax/addr-code", {
        'chw_name': chw_name,
        'amp_name': amp_name,
        'tmb_name': tmb_name
    }, function (data) {
        console.log(data);
        chw = data.addr_code.slice(0, 2);
        amp = data.addr_code.slice(0, 4);
        tmb = data.addr_code.slice(0, 6);

        console.log(chw, amp, tmb);

        $('#sel-chw').val(chw);
        $('#sel-chw').trigger('change');
        setTimeout(function () {
            //console.log(amp);
            $('#sel-amp').val(amp);
            $('#sel-amp').trigger('change');

            setTimeout(function () {
                //console.log(tmb);
                $('#sel-tmb').val(tmb);
                $('#sel-tmb').trigger('change');

                //$('#patient-address_full_english').val(address + ' ,Moo ' + moo + ' ,' + data.tmb_en + ', ' + data.amp_en + ', ' + data.chw_en + ', ' + data.post_code);
                //$('#patient-mobile_phone').focus();
            }, sec2);
        }, sec1);


    });

    $('#patient-addr_road').val(road);
    $('#patient-addr_moo').val(moo);
    $('#patient-addr_no').val(addr);

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
                        console.log(json);
                        $('#patient-cid').val(json.CID);

                        $('#patient-prefix').val(json.Pname_Thai);
                        //$('#patient-prefix_eng').val(json.Pname_Eng);

                        $('#patient-first_name').val(json.FName_Thai);
                        //$('#patient-first_name_eng').val(json.FName_Eng);

                        $('#patient-last_name').val(json.LName_Thai);
                        //$('#patient-last_name_eng').val(json.LName_Eng);
                        sex = 'ชาย';
                        if (json.sex == 2) {
                            sex = 'หญิง';
                        }
                        $('#patient-gender').val(sex);

                        birth = json.BirthDate;
                        birth = birth.split("-");
                        by = parseInt(birth[0]) + 543;
                        bm = birth[1];
                        bd = birth[2];
                        $('#patient-byear').val(by);
                        $('#patient-bmon').val(bm);
                        $('#patient-bdate').val(bd);

                        var d = new Date();
                        var y = d.getFullYear() + 543;
                        //console.log(y);
                        age_y = y - by;
                        $('#patient-age_y').val(age_y);



                        $('#patient-nation').val('ไทย');
                        $('#patient-marital').val('ไม่ทราบ');

                        road = '--';
                        if (json.Road && json.Road != '') {
                            road = json.Road;
                        }
                        moo = '-'
                        if (json.MooPart && json.MooPart != '') {
                            moo = json.MooPart;
                        }

                        chw_name = json.ProvinceName;
                        amp_name = json.AmphurName;
                        tmb_name = json.TambolName;
                        addr = json.AddrPart;


                        $('#smc-error').hide();
                        $('#smc-success').show();
                        $('#smc-warning').hide();

                        setTimeout(get_all_addr(chw_name, amp_name, tmb_name, moo, addr, road ,500, 500), 1000);
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