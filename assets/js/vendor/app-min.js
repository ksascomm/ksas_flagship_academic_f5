function getParameterByName(e){e=e.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var n="[\\?&]"+e+"=([^&#]*)",a=new RegExp(n),t=a.exec(window.location.search);return null==t?"":decodeURIComponent(t[1].replace(/\+/g," "))}!function($,e,n){"use strict";var a=$(document),t=e.Modernizr;$(document).ready(function(){$.fn.foundationAccordion?a.foundationAccordion():null,$.fn.foundationNavigation?a.foundationNavigation():null,$.fn.foundationTabs?a.foundationTabs():null,$.fn.foundationClearing?a.foundationClearing():null}),t.touch&&!e.location.hash&&$(e).load(function(){setTimeout(function(){e.scrollTo(0,1)},0)})}(jQuery,this),function($){$.fn.meanmenu=function(e){var n={meanMenuTarget:jQuery(this),meanMenuClose:"<h3>CLOSE X</h3>",meanMenuCloseSize:"18px",meanMenuOpen:"<h3>Navigation + </h3>",meanRevealPosition:"left",meanRevealPositionDistance:"15px",meanRevealColour:"",meanRevealHoverColour:"",meanScreenWidth:"1023",meanNavPush:"",meanShowChildren:!0,meanExpandableChildren:!0,meanExpand:"+",meanContract:"-",meanRemoveAttrs:!0},e=$.extend(n,e);return currentWidth=window.innerWidth||document.documentElement.clientWidth,this.each(function(){function n(){if("center"==m){var e=window.innerWidth||document.documentElement.clientWidth,n=e/2-22+"px";meanRevealPos="left:"+n+";right:auto;",p?jQuery(".meanmenu-reveal").animate({left:n}):jQuery(".meanmenu-reveal").css("left",n)}}function a(){$navreveal.html(jQuery($navreveal).is(".meanmenu-reveal.meanclose")?u:s)}function t(){jQuery(".mean-bar,.mean-push").remove(),jQuery("body").removeClass("mean-container"),jQuery(r).show(),menuOn=!1,meanMenuExist=!1}function i(){if(currentWidth<=v){meanMenuExist=!0,jQuery("body").addClass("mean-container"),jQuery(".mean-container").prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="'+meanStyles+'">Show Navigation</a><nav class="mean-nav"></nav></div>');var e=jQuery(r).html();jQuery(".mean-nav").html(e),Q&&jQuery("nav.mean-nav *").each(function(){jQuery(this).removeAttr("class"),jQuery(this).removeAttr("id")}),jQuery(r).before('<div class="mean-push" />'),jQuery(".mean-push").css("margin-top",f),jQuery(r).hide(),jQuery(".meanmenu-reveal").show(),jQuery(y).html(s),$navreveal=jQuery(y),jQuery(".mean-nav ul").hide(),meanShowChildren?meanExpandableChildren?(jQuery(".mean-nav ul ul").each(function(){jQuery(this).children().length&&jQuery(this,"li:first").parent().append('<a class="mean-expand" href="#" style="font-size: '+l+'">'+g+"</a>")}),jQuery(".mean-expand").on("click",function(e){e.preventDefault(),jQuery(this).hasClass("mean-clicked")?(jQuery(this).text(g),console.log("Been clicked"),jQuery(this).prev("ul").slideUp(300,function(){})):(jQuery(this).text(j),jQuery(this).prev("ul").slideDown(300,function(){})),jQuery(this).toggleClass("mean-clicked")})):jQuery(".mean-nav ul ul").show():jQuery(".mean-nav ul ul").hide(),jQuery(".mean-nav ul li").last().addClass("mean-last"),$navreveal.removeClass("meanclose"),jQuery($navreveal).click(function(e){e.preventDefault(),0==menuOn?($navreveal.css("text-align","left"),$navreveal.css("text-indent","0"),$navreveal.css("font-size",l),jQuery(".mean-nav ul:first").slideDown(),menuOn=!0):(jQuery(".mean-nav ul:first").slideUp(),menuOn=!1),$navreveal.toggleClass("meanclose"),a()})}else t()}var r=e.meanMenuTarget,o=e.meanReveal,u=e.meanMenuClose,l=e.meanMenuCloseSize,s=e.meanMenuOpen,m=e.meanRevealPosition,c=e.meanRevealPositionDistance,d=e.meanRevealColour,h=e.meanRevealHoverColour,v=e.meanScreenWidth,f=e.meanNavPush,y=".meanmenu-reveal";meanShowChildren=e.meanShowChildren,meanExpandableChildren=e.meanExpandableChildren;var g=e.meanExpand,j=e.meanContract,Q=e.meanRemoveAttrs;if(navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/iPad/i)||navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/Blackberry/i)||navigator.userAgent.match(/Windows Phone/i))var p=!0;(navigator.userAgent.match(/MSIE 8/i)||navigator.userAgent.match(/MSIE 7/i))&&jQuery("html").css("overflow-y","scroll"),menuOn=!1,meanMenuExist=!1,"right"==m&&(meanRevealPos="right:"+c+";left:auto;"),"left"==m&&(meanRevealPos="left:"+c+";right:auto;"),n(),meanStyles="background:"+d+";color:"+d+";"+meanRevealPos,p||jQuery(window).resize(function(){currentWidth=window.innerWidth||document.documentElement.clientWidth,currentWidth>v,t(),currentWidth<=v?(i(),n()):t()}),window.onorientationchange=function(){n(),currentWidth=window.innerWidth||document.documentElement.clientWidth,currentWidth>=v&&t(),currentWidth<=v&&0==meanMenuExist&&i()},i()})}}(jQuery),function($,e,n){"use strict";$.fn.foundationNavigation=function(e){var n=!1;Modernizr.touch||navigator.userAgent.match(/Windows Phone/i)?($(document).on("click.fndtn touchstart.fndtn",".nav-bar a.flyout-toggle",function(e){e.preventDefault();var a=$(this).siblings(".flyout").first();n===!1&&($(".nav-bar .flyout").not(a).slideUp(500),a.slideToggle(500,function(){n=!1})),n=!0}),$(".nav-bar>li.has-flyout",this).addClass("is-touch")):$(".nav-bar>li.has-flyout",this).on("mouseenter mouseleave",function(e){if("mouseenter"==e.type&&($(".nav-bar").find(".flyout").hide(),$(this).children(".flyout").show()),"mouseleave"==e.type){var n=$(this).children(".flyout"),a=n.find("input"),t=function(e){var n;return e.length>0?(e.each(function(){$(this).is(":focus")&&(n=!0)}),n):!1};t(a)||$(this).children(".flyout").hide()}})}}(jQuery,this);