(function($){if($("#commentform").length>0){$("form#commentform").wrapInner('<div class="row" />');$commentClass=($("form#commentform p").hasClass("logged-in-as"))?"col-xs-12":"col-xs-12 col-sm-6";$("#commentform div.charity-comment-fields").addClass($commentClass);$("#commentform p.form-submit").wrap('<div class="'+$commentClass+'" />');if($("#commentform p.logged-in-as").length>0){$("#commentform p.logged-in-as").wrap('<div class="'+$commentClass+'" />');}
$("#commentform").submit(function(){var $cmtFlag=true;$("#email, #comment ,#author").removeClass('charity-required');if($('#email').length>0){var $emailRgx=/^([a-zA-Z.0-9])+@([a-zA_Z0-9])+\.([a-zA-Z])/;var $cmauthor=$("#author").val();var $cmemail=$("#email").val();if($cmauthor==""){$("#author").addClass('charity-required');$cmtFlag=false;}
if($cmemail==""||!$emailRgx.test($cmemail)){$("#email").addClass('charity-required');$cmtFlag=false;}}
var $cmmsg=$("#comment").val();if($cmmsg==""){$("#comment").addClass('charity-required');$cmtFlag=false;}
return $cmtFlag;});}
if($("form.search-form").length>0){$("form.search-form").submit(function(){var $serchFlag=true;$("form.search-form input[name=s]").removeClass('charity-required');var $serchmsg=$("form.search-form input[name=s]").val();if($serchmsg==""){$("form.search-form input[name=s]").addClass('charity-required');$serchFlag=false;}
return $serchFlag;});}
if($("form.searchform").length>0){$("form.searchform").submit(function(){var $serchFlag=true;$("form.searchform input[name=s]").removeClass('charity-required');var $serchmsg=$("form.searchform input[name=s]").val();if($serchmsg==""){$("form.searchform input[name=s]").addClass('charity-required');$serchFlag=false;}
return $serchFlag;});}
$(document).on("click",".charity-donation-button",function(){var $itemID=$(this).data("id");var $data={action:'donation_window',itemID:$itemID};$.post(charity.ajaxURL,$data,function(msg){$(".charity-donation-window").html(msg);});});if($('#comment-nav-below').length>0){if($('.nav-previous a').length==0){$('.nav-previous').removeClass('btn btn-default btn-sm');}
if($('.nav-next a').length==0){$('.nav-next').removeClass('btn btn-default btn-sm pull-right');}}
var charityCountdown=new Date(charityCustom.countdown);$("#charityCountdown").countdown({until:charityCountdown,format:'DHMS'});var owl=$(".our-product-section .products");if(owl.length>0){owl.owlCarousel({itemsCustom:[[0,1],[450,1],[600,2],[768,3],[1000,4]],navigation:false});}
if($("#footer").length>0){var $footerWidgetHTML=$("#footer .container:first").find(".row .col-xs-12").text().trim();if($footerWidgetHTML.length==0){$("#footer").addClass("footer-without-widgets");}}})(jQuery);;jQuery(function($){"use strict";var Site={initialized:false,initialize:function(){if(this.initialized)
return;this.initialized=true;},build:function(){var revSlider;if($(".banner-slider").length){if($('.banner-slider').revolution==undefined)
revslider_showDoubleJqueryError('.banner-slider');else{revSlider=$('.banner-slider').revolution({delay:9000,startheight:600,startwidth:1442,navigationType:"bullet",onHoverStop:"on",navigationVOffset:40});}}},};Site.initialize();})
jQuery(window).ready(function($){isMobile=navigator.userAgent.match(/(iPhone|iPod|Android|BlackBerry|iPad|IEMobile|Opera Mini)/);jQuery('img.html').each(function(){var $img=jQuery(this);var imgID=$img.attr('id');var imgClass=$img.attr('class');var imgURL=$img.attr('src');jQuery.get(imgURL,function(data){var $svg=jQuery(data).find('svg');if(typeof imgID!=='undefined'){$svg=$svg.attr('id',imgID);}
if(typeof imgClass!=='undefined'){$svg=$svg.attr('class',imgClass+' replaced-svg');}
$svg=$svg.removeAttr('xmlns:a');$img.replaceWith($svg);},'xml');});$(window).load(function(){if($('.flexslider').length){$('.our-causes .flexslider').flexslider({animation:"slide",animationLoop:false,itemWidth:360,itemMargin:30,start:function(slider){$('body').removeClass('loading');}});$('.testimonial .flexslider, .donation-holder .flexslider,.flex-slide.flexslider').flexslider({animation:"slide",animationLoop:false});}});$('#accordion .panel-title').click(function(){if($(this).find('.fa-plus-circle').hasClass('fa-minus-circle')){$(this).find('.fa-minus-circle').removeClass('fa-minus-circle');}else{$('#accordion .fa-minus-circle').removeClass('fa-minus-circle');$(this).find('.fa-plus-circle').addClass('fa-minus-circle');}})
$('#accordion1 .panel-title').click(function(){if($(this).find('.fa-plus-circle').hasClass('fa-minus-circle')){$(this).find('.fa-minus-circle').removeClass('fa-minus-circle');}else{$('#accordion1 .fa-minus-circle').removeClass('fa-minus-circle');$(this).find('.fa-plus-circle').addClass('fa-minus-circle');}})
if($('#accordion .panel-heading').parents('.panel').find('.panel-collapse').hasClass('in')){$('.in').parents('.panel').find('.collape-plus').addClass('fa-minus');}
$('#accordion .panel-heading').click(function(){$('#accordion .fa-minus').removeClass('fa-minus');if($(this).parents('.panel').find('.panel-collapse').hasClass('in')){}else{$(this).find('.collape-plus').addClass('fa-minus');}})
$('#accordion-right .panel-heading').click(function(){$('#accordion-right .fa-minus').removeClass('fa-minus');if($(this).parents('.panel').find('.panel-collapse').hasClass('in')){}else{$(this).find('.collape-plus').addClass('fa-minus');}})
if($(window).width()>=768){$('.search-form button,.icon-search').click(function(){if($('.header-second .form-group').css('width')=='0px'){$('.header-second .form-group').animate({width:'180px'});$('.header-second .form-group').addClass('bottom-line');$('.header-second nav>ul').fadeOut();}else{$('.header-second .form-group').animate({width:'0px'});$('.bottom-line').removeClass('bottom-line');$('.header-second nav>ul').fadeIn();}})}
$('.btn-group *').click(function(){$('.btn-group button.active').removeClass('active');$(this).addClass('active')})
$('.dropdown-menu a').click(function(){var donation_type=$(this).text();$('#dropdownMenu1 small').text(donation_type)})
if($("#slider-range").length){$("#slider-range").slider({range:true,min:0,max:500,values:[75,300],slide:function(event,ui){$("#amount").val("$"+ui.values[0]+" - $"+ui.values[1]);}});$("#amount").val("$"+$("#slider-range").slider("values",0)+" - $"+$("#slider-range").slider("values",1));}
$('.embed-responsive-16by9 img').click(function(){video=$(this).attr('data-video');$(this).after(video);});$('.play-btn').click(function(){video1=$('.video-section img').attr('data-video');$('.video-section img').after(video1);return false;});if(!isMobile){var animSection=function(){var elem=$('.anim-section');for(var i=0;i<elem.length;i++){if($(window).scrollTop()>($(elem[i]).offset().top-$(window).height()/1.15)){$(elem[i]).addClass('animate')}}}
if($('.anim-section').length){animSection()
$(window).scroll(function(){animSection()})}
$(window).load(function(){if($('.parallax').length){var elem=$('.parallax');for(var i=0;i<elem.length;i++){parallax($(elem[i]),0.1);}}});$(window).scroll(function(){if($('.parallax').length){var elem=$('.parallax');for(var i=0;i<elem.length;i++){parallax($(elem[i]),0.1);}}})
if($('.progressbar').length){$(window).scroll(function(){if($(window).scrollTop()>($('.progressbar').offset().top-$(window).height()/1.4)){var elem=$('.progressbar .progress');for(var i=0;i<elem.length;i++){var val=parseInt($(elem[i]).find('.progress-bar').attr('aria-valuenow'));$(elem[i]).find('.progress-bar').width(val+"%")}}})}}else{var elem=$('.progressbar .progress');for(var i=0;i<elem.length;i++){var val=parseInt($(elem[i]).find('.progress-bar').attr('aria-valuenow'));$(elem[i]).find('.progress-bar').width(val+"%")}}
var parallax=function(id,val){if($(window).scrollTop()>id.offset().top-$(window).height()&&$(window).scrollTop()<id.offset().top+id.outerHeight()){var px=parseInt($(window).scrollTop()-(id.offset().top-$(window).height()))
px*=-val;id.css({'background-position':'center '+px+'px'})}}});jQuery(window).scroll(function($){})
var initScroll=jQuery(window).scrollTop(),headerHeight=jQuery('#header').height();function fixedNav(){currentScroll=$(window).scrollTop()
function inteligent(){if(currentScroll>=initScroll){$('#header').removeClass('down')
$('#header').addClass('up')
if(currentScroll==$(document).height()-$(window).height()){$('#header').removeClass('up')
$('#header').addClass('down')}
initScroll=currentScroll}else{$('#header').removeClass('up')
$('#header').addClass('down')
initScroll=currentScroll}}
if($('#header').attr('data-sticky')=="yes"){if(currentScroll>$('#header').height()){$('#header').addClass('fixed')
$('#wrapper').css("padding-top",headerHeight)
inteligent()}else{$('#header').removeClass('fixed up down')
$('#wrapper').css("padding-top","0")}}else{if(currentScroll>$('#header').height()){$('#header').removeClass('fixed up down')
$('#wrapper').css("padding-top","0")}else{$('#header').removeClass('fixed up down')
$('#wrapper').css("padding-top","0")}}}
jQuery(document).ready(function(){jQuery('.option-info img').css("cursor","help");jQuery('.option-info img').hover(function(){jQuery(this).prev().addClass('animate');},function(){jQuery(this).parents('.option-info').hover(function(){},function(){jQuery(this).find('.des-text').removeClass('animate');});});});