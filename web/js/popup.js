function popup(_a, _w, _h, ) {

    // _w = 80;
    // _h = 80;

    w = window.screen.availWidth * _w / 100;
    h = window.screen.availHeight * _h / 100;

    var l = (screen.width - w) / 2;
    //var t = (screen.height - h) / 6;
    var t = 8;

    pop = window.open(_a, "popup", "top=" + t + ", left = " + l + ", height = " + h + ", width = " + w + ",titlebar = 0,resizable=0");
    return pop;
}


