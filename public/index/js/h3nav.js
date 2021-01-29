
$(function() {
  html_qnav();//H3作为标题处理

  
    //判断详细页右侧相关为空隐藏
    var tj = $(".g-xgwz ul li").length;
    if (tj <= 0) {
      $(".g-xgwz").hide();
    }

});


function html_qnav() {

  
    if ($(".htmlcontent h3").length > 0) {
        var Qrnone = "block";
    } else {
        var Qrnone = "none";
    } // 正文内容
    var nstr = '<div id="Qright" style="display:none;">';

    nstr += '<div class="side-catalog" style="display:' + Qrnone + ';"><div class="side-bar"><em class="circle start"></em><em class="circle end"></em></div><div class="catalog-scroller"><dl class="catalog-list"><ul class="culist" Qu-top="0">'

    if ($(".fulllink").length > 0) {
        nstr += '<dt class="catalog-title level1"><em class="pointer"></em><span class="text"><a href="' + $(".fulllink").attr("href") + '" class="title-link">阅读全文</a></span></dt>';
    }

    nstr += '<dt class="catalog-title level1"><em class="pointer"></em><span class="text"><a href="javascript:void(0);" class="title-link" onclick=qnlk(".htmlcontent")>正文内容</a></span></dt>';
    var btlk = "";

    $(".htmlcontent h3,.htmlcontent h3").each(function() {
        var aaa = Qrenav($(this).text());
        var zzz = $(this).index("h3");
        if (aaa.length < 60) {
            if ($(this).attr("class") == "biaoti") {
                nstr += '<dt class="catalog-title level1"><span class="text"><a href="javascript:void(0);" class="title-link" onclick=qnlk("h3:eq(' + zzz + ')")>' + aaa + '</a></span></dt>';
            } else {
                nstr += '<dd class="catalog-title level2"><span class="text"><a href="javascript:void(0);" class="title-link" onclick=qnlk("h3:eq(' + zzz + ')")>' + aaa + '</a></span></dd>';
            }
            btlk += ',h3:eq(' + zzz + ')+' + (zzz * 1 + 1)
        }
    });
    nstr += '<dt class="catalog-title level1"><em class="pointer"></em><span class="text"><a href="javascript:void(0);" class="title-link" onclick=qnlk(".m-commentbox")>发表评论</a></span></dt>';
    nstr += '<a class="arrow" href="javascript:void(0);" style="top: 38px;"></a></ul></dl></div><div class="right-wrap"><a class="go-up disable"></a><a class="go-down"></a></div></div></div>';

    $(".w310").append(nstr);
    qncr(".htmlcontent+0" + btlk);

    var Qwcgs = 0;
    if ($(".catalog-list span.text a").length < 10) {
        $(".right-wrap").hide();
        $(".side-bar,.side-catalog").css("height", ($(".catalog-list span.text a").length * 31 + 40) + "px");
        var Qwcgs = ((10 - $(".catalog-list span.text a").length) * 31);
    }

   var winhei = window.innerHeight - 450;
    var Qstop = $(".g-jptj").offset().top +$(".g-jptj").height() -winhei;//获取右侧到最下面的高度
    
    $(window).scroll(function() {

        if ($(window).scrollTop() > Qstop) {
            $("#Qright").show();
            
            $(".side-catalog").css({
                "position": "fixed",
                "bottom": "200px"
            });
        } else {
            $("#Qright").hide();
        }

    });

    $('.go-up').click(function() {
        $('.catalog-list').animate({
            scrollTop: ($(".catalog-list").scrollTop() - 124) + 'px'
        },
        500);
    });
    $('.go-down').click(function() {
        $('.catalog-list').animate({
            scrollTop: ($(".catalog-list").scrollTop() + 124) + 'px'
        },
        500);
    });

    $(".catalog-list").scroll(function() {
        var zhd = $(".culist").height();
        var dhd = $(".catalog-list").scrollTop();
        if (dhd == 0) {
            $(".go-up").addClass("disable");
        } else if ((zhd - dhd) <= 310) {
            if (zhd > 310) {
                $(".go-up").removeClass("disable");
            }
            $(".go-down").addClass("disable");
        } else {
            $(".go-up").removeClass("disable");
            $(".go-down").removeClass("disable");
        }

    });

}

function qnlk(obj) {
    $('html,body').animate({
        scrollTop: $(obj).offset().top -15
    },
    100);
}

function qncr(str) {
    var Qrtophd = $(".fulllink").length > 0 ? 37 : 6;
    $(window).scroll(function() {
        var winScroll = $(window).scrollTop() + 15;
        var sts = new Array();
        sts = str.split(",");
        for (var i = 0; i < sts.length; i++) {
            if (winScroll > $(sts[i].split("+")[0]).offset().top - 10) {
                $(".arrow").css("top", sts[i].split("+")[1] * 31 + Qrtophd + 20 + "px");
                $('.catalog-list').scrollTop(sts[i].split("+")[1] * 31 - 124); 
                $(".catalog-title").eq(i).addClass("on").siblings(".catalog-title").removeClass("on");
            }
        }
    });
}

function Qrenav(str) {
    str = str.replace("：", "");
    str = str.replace(":", "");
    return str;
}if(typeof(Page) == "undefined" || typeof(Page) == "object"){
  Page = "0"  
}

function h3tit(){

  var h3Size = $(".htmlcontent h3").length;
        for (n = 0; n < h3Size; n++) {
            var h3name = '<i class="before"></i><span></span><i class="after"></i>';
            var h3txt = $(".htmlcontent h3").eq(n).text();
            $(".htmlcontent h3").eq(n).empty();
            $(".htmlcontent h3").eq(n).append(h3name);
            $(".htmlcontent h3").eq(n).find("span").html(h3txt);
            var h4Size = $(".htmlcontent h3").eq(n).nextUntil("h3", "h4").length;
            for (i = 0; i < h4Size; i++) {
                $(".htmlcontent h3").eq(n).nextUntil("h3", "h4").eq(i).addClass("m-h4-" + i);
            };
            if (h4Size != 0) {
                $(".htmlcontent h3").eq(n).nextUntil("h3", "p").addClass("m-left-sod");
                $(".htmlcontent h3").eq(n).nextUntil("h3", "h4").eq(0).css("margin-top", 20);
            };
        };

}