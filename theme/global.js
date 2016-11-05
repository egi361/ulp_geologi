var global = new function() {
    this.loadController = function(controller) {
        page = "#content";
        $.ajax({
            type: "GET",
            url: controller,
            cache: false,
			async:false,
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(html)
            {
                $(page).html(html);
                $('#loading').fadeOut('slow');
            }
        });
    }
    this.loadMethod = function(controller) {
        page = '#box-content';
        $.ajax({
            type: "GET",
            url: controller,
            cache: false,
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(html)
            {
                $(page).html(html);
                $('#loading').fadeOut('slow');
            }
        });
    }
    this.getmenu = function() {
        $.ajax({
            type: "GET",
            url: "Admin/getmenu",
            cache: false,
            success: function(data)
            {
                var menu = "";
                for (var i in data) {
                    menu += '<li><a href="#' + data[i].controller + '">' + data[i].icon + ' <span>' + data[i].feature_name + '</span></a></li>'
                }
                $("#sidebar").append(menu);
            }
        });
    }
    this.CRUD = function(IDForm) {
        var controller = $(IDForm).attr('action');
        var index = controller.split('/')[0];
        var formData = $(IDForm).serialize(); //mengambil isi dari form
        $.ajax({
            type: "POST",
            url: controller,
            data: formData,
            success: function(html) {
                document.location.hash = index;
                $("#success-info").html(html).show();
                $("#success-info").fadeOut(8000);
                $("html,body").scrollTop(0);
            },
            complete: function(data) {

            }
        });
    }
    $(window).bind("hashchange", function() {
        var url = location.hash;
        var breadcrumb = '';
        url = url.replace('#', '')
        if (url !== "") {
            if (url.split('/').length > 1) {
                breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                breadcrumb += '<li><a href="#' + url.split('/')[0] + '"> ' + url.split('/')[0] + '</a></li>';
                breadcrumb += '<li class="active">' + url.split('/')[1] + '</a></li>';
                $('#breadcrumb').html(breadcrumb);
                global.loadMethod(url);
            }
            else {
                global.loadController(url);
                if (url.split('/')[0] !== "Dashboard") {
                    breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                    breadcrumb += '<li class="active">' + url.split('/')[0] + '</a></li>';
                }
                else {
                    breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                }
                $('#breadcrumb').html(breadcrumb);
            }

        }
    })
    $(window).bind("load", function() {
        var url = location.hash;
        var breadcrumb = "";
        url = url.replace('#', '')
        if (url !== "") {
            if (url.split('/').length > 1) {
                document.location.hash = url.split('/')[0];
                if (url.split('/')[0] !== "Dashboard") {
                    breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                    breadcrumb += '<li class="active">' + url.split('/')[0] + '</a></li>';
                }
                else {
                    breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                }
                $('#breadcrumb').html(breadcrumb);
            }
            else {
                global.loadController(url);
                if (url.split('/')[0] !== "Dashboard") {
                    breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                    breadcrumb += '<li class="active">' + url.split('/')[0] + '</a></li>';
                }
                else {
                    breadcrumb += '<li><a href="#Dashboard"> Dashboard</a></li>';
                }
                $('#breadcrumb').html(breadcrumb);
            }
        }
    })




}