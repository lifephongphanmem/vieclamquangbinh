$(function () {
    //cĂ²n páº£i tĂ­nh toĂ¡n
    var url = window.location.href;

    var m = url.indexOf('?');
    if (m > 0) {
        url = url.substring(0, m);
    }
    var chk = url.split('/');

    var index = url.indexOf('perm');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/danhsach';
    }

    index = url.indexOf('modify');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/danhsach';
    }

    index = url.indexOf('new');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/danhsach';
    }

    // index = url.indexOf('chitiet');
    // if (index > 0) {
    //     url = url.substring(0, index - 1) + '/danhsach';
    // }

    index = url.indexOf('detail');
    if (index > 0) {
        url = url.substring(0, index - 1);
    }

    index = chk.indexOf('create');
    if (index > -1) {
        url = '';
        for (var i = 0; i < index; i++) {
            if (i == index - 1) {
                url += chk[i];
            } else {
                url += chk[i] + "/";
            }
        }
    }

    index = chk.indexOf('edit');
    if (index > -1) {
        url = '';
        for (var i = 0; i < index; i++) {
            if (i == index - 1) {
                url += chk[i];
            } else {
                url += chk[i] + "/";
            }
        }
    }

    index = chk.indexOf('nhanexcel');
    if (index > -1) {
        url = '';
        for (var i = 0; i < index; i++) {
            if (i == index - 1) {
                url += chk[i];
            } else {
                url += chk[i] + "/";
            }
        }
        url += "/danhsach";
    }

    //Má»›i
    var index = url.indexOf('TieuChuan');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('XetKT');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('Them');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('Sua');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('DanhSach');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('Xem');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('QuyetDinh');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('PheDuyet');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }
    var index = url.indexOf('TaoDuThao');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }
    
    var index = url.indexOf('PhanQuyen');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }

    var index = url.indexOf('InPhoi');
    if (index > 0) {
        url = url.substring(0, index - 1) + '/ThongTin';
    }
    //
    chk = url.split('/');
    //alert(url);
    if (chk.length > 3 && chk[3] != '') {
        var element = $('ul.menu-subnav a').filter(function () {
            return this.href == url || this.href.indexOf(url) == 0;
            //return this.href == url;
        }).parent().addClass('menu-item-active').parent().parent().parent().addClass('menu-item-open').addClass('menu-item-here');

        if (element.is('li')) {
            element.parent().parent().parent().addClass('menu-item-open').addClass('menu-item-here');
        }
    }
});