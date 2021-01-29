if (typeof(page) == "undefined") {
  page = "0"  
};
$(function() {


  
	//返回顶部
	$("body").append('<div class="g-float"><a href="javascript:;" id="m-top-back"></a></div>')
  	$(window).scroll(function(){
        if($(window).scrollTop()>200){
            $("#m-top-back").animate({height:60},10);            
            }else{
               $("#m-top-back").animate({height:0},10);                    
            }
    })
    $("#m-top-back").click(function(){
        $("body,html").animate({scrollTop:0},300)
    })

	$("#content").each(function(){
		$(this).find("h3").prepend("<i></i>");
		var liSize = $(this).find("h3").length;
		for(i=0;i<liSize;i++){
			$(this).find("h3 i").eq(i).append(i+1);
		}
	})

  //判断无作者板块隐藏
  var zz = $(".g-zzbox .g-jtgx ul li").length;
  if (zz <= 0) {
    $(".g-zzbox").hide();
  }



  //判断详细页右侧推荐为空隐藏
  var tj = $(".f-list-no ul li").length;
  if (tj <= 0) {
    $(".f-list-no").hide();
  }

  //话题页面tab
  $(".g-tabht .g-tabht-top li").click(function() {
      $(this).addClass("m-hover").siblings().removeClass("m-hover");
      var contul = $(".g-tabht .g-tabht-top li").index(this);
      $(".g-tabht .g-tabhtbd").eq(contul).addClass("block").siblings().removeClass("block")
  });



var bdfx = '<div class="bdsharebuttonbox"><p>分享至：</p><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_more" data-cmd="more"></a></div>';
$(".g-infocont .u-info").append(bdfx);
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];




  if(page == 1){
      $(".g-banner").slide({titCell:".g-arrow li",mainCell:".g-banner-img ul",effect:"leftLoop",autoPlay:true,trigger:"click",titOnClassName:"m-hover"});
  }

  if(page == "index"){
      Tabflash();//首页幻灯片

      jQuery(".g-list-two").slide({mainCell:".g-list-dome ul",effect:"leftLoop",autoPlay:true,scroll:1,vis:4});//推荐

      $(".g-headnews").each(function(){
        $(this).find("ul").eq(0).show();
      })
      $(".g-headnews ul").each(function(){
        var liSize = $(this).find("li").length;
        for(i=0;i<liSize;i++){
          $(this).find("li i").eq(i).append(i+1);
        }     
      })
      $(".f-ultab span").click(function(){    
        var btnParentObj = $(this).parents(".g-headnews");
        var n = btnParentObj.attr("data-choosenum");
        var contSize = btnParentObj.find(".g-headnews-ul").length;
        if(n<contSize-1){
          n++;  
        }else{
          n=0;  
        }
        btnParentObj.attr("data-choosenum",n);
        btnParentObj.find(".g-headnews-ul").eq(n).show().siblings(".g-headnews-ul").hide();
      })

      
  }

    if(page == "newsdetail"){
        var xgwzli = $(".g-xgrd .m-imgdiv ul li").length;
        if (xgwzli <= 0) {
          $(".g-xgrd").hide();
        }

        var tags = $(".g-tag ul li").length;
        if (tags > 0) {
          $(".g-tag").show();
        }

        $(".m-main h3").wrapInner("<span></span>")//H3;

    }

})


function Tabflash(){//首页幻灯切换
    var Picbox = $("#img").find("li");
    var Picpoint = $("#tab").find("li");
    var Pictitle = $("#ifocus_tx").find("li");
    var curr = 0;
    $("#tab").find("li").eq(0).addClass("on");
    $("#tab").find("li").eq(3).css("margin-bottom","0px")
    Picpoint.mouseenter(function()
    {
        var i = $(this).index();
        curr = i;
        Picpoint.removeClass("on").eq(i).addClass("on");
        Picbox.hide().eq(i).show()
        Pictitle.hide().eq(i).show();
        return false;
    })
    var Autogo = setInterval(function()
    {
        var todo = (curr+1)%4;
        curr = todo;
        Picpoint.removeClass("on").eq(todo).addClass("on");
        Picbox.hide().eq(todo).show();
        Pictitle.hide().eq(todo).show();
    },5000);
    $("#img").hover(function()
    {
        clearInterval(Autogo);
    },function()
    {
        Autogo = setInterval(function()
    {
        var todo = (curr+1)%4;
        curr = todo;
        Picpoint.removeClass("on").eq(todo).addClass("on");
        Picbox.hide().eq(todo).show();
        Pictitle.hide().eq(todo).show();
    },5000);
    })
    $("#tab li").hover(function()
    {
        clearInterval(Autogo);
    },function()
    {
        Autogo = setInterval(function()
    {
        var todo = (curr+1)%4;
        curr = todo;
        Picpoint.removeClass("on").eq(todo).addClass("on");
        Picbox.hide().eq(todo).show();
        Pictitle.hide().eq(todo).show();
    },5000);
    })  
}



//禁用右键、文本选择功能、复制按键  
//document.onselectstart = function(){  event.returnValue = false;};document.oncontextmenu = function(){  event.returnValue = false;};document.oncopy = function(){  event.returnValue = false;};



