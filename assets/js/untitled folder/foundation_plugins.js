!function($,window,document,undefined){"use strict";Foundation.libs.accordion={name:"accordion",version:"5.5.3",settings:{content_class:"content",active_class:"active",multi_expand:!1,toggleable:!0,callback:function(){}},init:function(scope,method,options){this.bindings(method,options)},events:function(instance){var self=this,S=this.S;self.create(this.S(instance)),S(this.scope).off(".fndtn.accordion").on("click.fndtn.accordion","["+this.attr_name()+"] > dd > a, ["+this.attr_name()+"] > li > a",function(e){var accordion=S(this).closest("["+self.attr_name()+"]"),groupSelector=self.attr_name()+"="+accordion.attr(self.attr_name()),settings=accordion.data(self.attr_name(!0)+"-init")||self.settings,target=S("#"+this.href.split("#")[1]),aunts=$("> dd, > li",accordion),siblings=aunts.children("."+settings.content_class),active_content=siblings.filter("."+settings.active_class);return e.preventDefault(),accordion.attr(self.attr_name())&&(siblings=siblings.add("["+groupSelector+"] dd > ."+settings.content_class+", ["+groupSelector+"] li > ."+settings.content_class),aunts=aunts.add("["+groupSelector+"] dd, ["+groupSelector+"] li")),settings.toggleable&&target.is(active_content)?(target.parent("dd, li").toggleClass(settings.active_class,!1),target.toggleClass(settings.active_class,!1),S(this).attr("aria-expanded",function(i,attr){return"true"===attr?"false":"true"}),settings.callback(target),target.triggerHandler("toggled",[accordion]),void accordion.triggerHandler("toggled",[target])):(settings.multi_expand||(siblings.removeClass(settings.active_class),aunts.removeClass(settings.active_class),aunts.children("a").attr("aria-expanded","false")),target.addClass(settings.active_class).parent().addClass(settings.active_class),settings.callback(target),target.triggerHandler("toggled",[accordion]),accordion.triggerHandler("toggled",[target]),void S(this).attr("aria-expanded","true"))})},create:function($instance){var self=this,accordion=$instance,aunts=$("> .accordion-navigation",accordion),settings=accordion.data(self.attr_name(!0)+"-init")||self.settings;aunts.children("a").attr("aria-expanded","false"),aunts.has("."+settings.content_class+"."+settings.active_class).addClass(settings.active_class).children("a").attr("aria-expanded","true"),settings.multi_expand&&$instance.attr("aria-multiselectable","true")},toggle:function(options){var options="undefined"!=typeof options?options:{},selector="undefined"!=typeof options.selector?options.selector:"",toggle_state="undefined"!=typeof options.toggle_state?options.toggle_state:"",$accordion="undefined"!=typeof options.$accordion?options.$accordion:this.S(this.scope).closest("["+this.attr_name()+"]"),$items=$accordion.find("> dd"+selector+", > li"+selector);if($items.length<1)return window.console&&console.error("Selection not found.",selector),!1;var S=this.S,active_class=this.settings.active_class;$items.each(function(){var $item=S(this),is_active=$item.hasClass(active_class);(is_active&&"close"===toggle_state||!is_active&&"open"===toggle_state||""===toggle_state)&&$item.find("> a").trigger("click.fndtn.accordion")})},open:function(options){var options="undefined"!=typeof options?options:{};options.toggle_state="open",this.toggle(options)},close:function(options){var options="undefined"!=typeof options?options:{};options.toggle_state="close",this.toggle(options)},off:function(){},reflow:function(){}}}(jQuery,window,window.document),function($,window,document,undefined){"use strict";Foundation.libs.interchange={name:"interchange",version:"5.5.3",cache:{},images_loaded:!1,nodes_loaded:!1,settings:{load_attr:"interchange",named_queries:{"default":"only screen",small:Foundation.media_queries.small,"small-only":Foundation.media_queries["small-only"],medium:Foundation.media_queries.medium,"medium-only":Foundation.media_queries["medium-only"],large:Foundation.media_queries.large,"large-only":Foundation.media_queries["large-only"],xlarge:Foundation.media_queries.xlarge,"xlarge-only":Foundation.media_queries["xlarge-only"],xxlarge:Foundation.media_queries.xxlarge,landscape:"only screen and (orientation: landscape)",portrait:"only screen and (orientation: portrait)",retina:"only screen and (-webkit-min-device-pixel-ratio: 2),only screen and (min--moz-device-pixel-ratio: 2),only screen and (-o-min-device-pixel-ratio: 2/1),only screen and (min-device-pixel-ratio: 2),only screen and (min-resolution: 192dpi),only screen and (min-resolution: 2dppx)"},directives:{replace:function(el,path,trigger){if(null!==el&&/IMG/.test(el[0].nodeName)){var orig_path=$.each(el,function(){this.src=path});if(new RegExp(path,"i").test(orig_path))return;return el.attr("src",path),trigger(el[0].src)}var last_path=el.data(this.data_attr+"-last-path"),self=this;if(last_path!=path)return/\.(gif|jpg|jpeg|tiff|png)([?#].*)?/i.test(path)?($(el).css("background-image","url("+path+")"),el.data("interchange-last-path",path),trigger(path)):$.get(path,function(response){el.html(response),el.data(self.data_attr+"-last-path",path),trigger()})}}},init:function(scope,method,options){Foundation.inherit(this,"throttle random_str"),this.data_attr=this.set_data_attr(),$.extend(!0,this.settings,method,options),this.bindings(method,options),this.reflow()},get_media_hash:function(){var mediaHash="";for(var queryName in this.settings.named_queries)mediaHash+=matchMedia(this.settings.named_queries[queryName]).matches.toString();return mediaHash},events:function(){var prevMediaHash,self=this;return $(window).off(".interchange").on("resize.fndtn.interchange",self.throttle(function(){var currMediaHash=self.get_media_hash();currMediaHash!==prevMediaHash&&self.resize(),prevMediaHash=currMediaHash},50)),this},resize:function(){var cache=this.cache;if(!this.images_loaded||!this.nodes_loaded)return void setTimeout($.proxy(this.resize,this),50);for(var uuid in cache)if(cache.hasOwnProperty(uuid)){var passed=this.results(uuid,cache[uuid]);passed&&this.settings.directives[passed.scenario[1]].call(this,passed.el,passed.scenario[0],function(passed){if(arguments[0]instanceof Array)var args=arguments[0];else var args=Array.prototype.slice.call(arguments,0);return function(){passed.el.trigger(passed.scenario[1],args)}}(passed))}},results:function(uuid,scenarios){var count=scenarios.length;if(count>0)for(var el=this.S("["+this.add_namespace("data-uuid")+'="'+uuid+'"]');count--;){var mq,rule=scenarios[count][2];if(mq=this.settings.named_queries.hasOwnProperty(rule)?matchMedia(this.settings.named_queries[rule]):matchMedia(rule),mq.matches)return{el:el,scenario:scenarios[count]}}return!1},load:function(type,force_update){return("undefined"==typeof this["cached_"+type]||force_update)&&this["update_"+type](),this["cached_"+type]},update_images:function(){var images=this.S("img["+this.data_attr+"]"),count=images.length,i=count,loaded_count=0,data_attr=this.data_attr;for(this.cache={},this.cached_images=[],this.images_loaded=0===count;i--;){if(loaded_count++,images[i]){var str=images[i].getAttribute(data_attr)||"";str.length>0&&this.cached_images.push(images[i])}loaded_count===count&&(this.images_loaded=!0,this.enhance("images"))}return this},update_nodes:function(){var nodes=this.S("["+this.data_attr+"]").not("img"),count=nodes.length,i=count,loaded_count=0,data_attr=this.data_attr;for(this.cached_nodes=[],this.nodes_loaded=0===count;i--;){loaded_count++;var str=nodes[i].getAttribute(data_attr)||"";str.length>0&&this.cached_nodes.push(nodes[i]),loaded_count===count&&(this.nodes_loaded=!0,this.enhance("nodes"))}return this},enhance:function(type){for(var i=this["cached_"+type].length;i--;)this.object($(this["cached_"+type][i]));return $(window).trigger("resize.fndtn.interchange")},convert_directive:function(directive){var trimmed=this.trim(directive);return trimmed.length>0?trimmed:"replace"},parse_scenario:function(scenario){var directive_match=scenario[0].match(/(.+),\s*(\w+)\s*$/),media_query=scenario[1].match(/(.*)\)/);if(directive_match)var path=directive_match[1],directive=directive_match[2];else var cached_split=scenario[0].split(/,\s*$/),path=cached_split[0],directive="";return[this.trim(path),this.convert_directive(directive),this.trim(media_query[1])]},object:function(el){var raw_arr=this.parse_data_attr(el),scenarios=[],i=raw_arr.length;if(i>0)for(;i--;){var scenario=raw_arr[i].split(/,\s?\(/);if(scenario.length>1){var params=this.parse_scenario(scenario);scenarios.push(params)}}return this.store(el,scenarios)},store:function(el,scenarios){var uuid=this.random_str(),current_uuid=el.data(this.add_namespace("uuid",!0));return this.cache[current_uuid]?this.cache[current_uuid]:(el.attr(this.add_namespace("data-uuid"),uuid),this.cache[uuid]=scenarios)},trim:function(str){return"string"==typeof str?$.trim(str):str},set_data_attr:function(init){return init?this.namespace.length>0?this.namespace+"-"+this.settings.load_attr:this.settings.load_attr:this.namespace.length>0?"data-"+this.namespace+"-"+this.settings.load_attr:"data-"+this.settings.load_attr},parse_data_attr:function(el){for(var raw=el.attr(this.attr_name()).split(/\[(.*?)\]/),i=raw.length,output=[];i--;)raw[i].replace(/[\W\d]+/,"").length>4&&output.push(raw[i]);return output},reflow:function(){this.load("images",!0),this.load("nodes",!0)}}}(jQuery,window,window.document),function($,window,document,undefined){"use strict";var noop=function(){},Orbit=function(el,settings){if(el.hasClass(settings.slides_container_class))return this;var container,number_container,bullets_container,timer_container,animate,timer,self=this,slides_container=el,idx=0,locked=!1;self.slides=function(){return slides_container.children(settings.slide_selector)},self.slides().first().addClass(settings.active_slide_class),self.update_slide_number=function(index){settings.slide_number&&(number_container.find("span:first").text(parseInt(index)+1),number_container.find("span:last").text(self.slides().length)),settings.bullets&&(bullets_container.children().removeClass(settings.bullets_active_class),$(bullets_container.children().get(index)).addClass(settings.bullets_active_class))},self.update_active_link=function(index){var link=$('[data-orbit-link="'+self.slides().eq(index).attr("data-orbit-slide")+'"]');link.siblings().removeClass(settings.bullets_active_class),link.addClass(settings.bullets_active_class)},self.build_markup=function(){slides_container.wrap('<div class="'+settings.container_class+'"></div>'),container=slides_container.parent(),slides_container.addClass(settings.slides_container_class),settings.stack_on_small&&container.addClass(settings.stack_on_small_class),settings.navigation_arrows&&(container.append($('<a href="#"><span></span></a>').addClass(settings.prev_class)),container.append($('<a href="#"><span></span></a>').addClass(settings.next_class))),settings.timer&&(timer_container=$("<div>").addClass(settings.timer_container_class),timer_container.append("<span>"),timer_container.append($("<div>").addClass(settings.timer_progress_class)),timer_container.addClass(settings.timer_paused_class),container.append(timer_container)),settings.slide_number&&(number_container=$("<div>").addClass(settings.slide_number_class),number_container.append("<span></span> "+settings.slide_number_text+" <span></span>"),container.append(number_container)),settings.bullets&&(bullets_container=$("<ol>").addClass(settings.bullets_container_class),container.append(bullets_container),bullets_container.wrap('<div class="orbit-bullets-container"></div>'),self.slides().each(function(idx,el){var bullet=$("<li>").attr("data-orbit-slide",idx).on("click",self.link_bullet);bullets_container.append(bullet)}))},self._goto=function(next_idx,start_timer){if(next_idx===idx)return!1;"object"==typeof timer&&timer.restart();var slides=self.slides(),dir="next";if(locked=!0,idx>next_idx&&(dir="prev"),next_idx>=slides.length){if(!settings.circular)return!1;next_idx=0}else if(0>next_idx){if(!settings.circular)return!1;next_idx=slides.length-1}var current=$(slides.get(idx)),next=$(slides.get(next_idx));current.css("zIndex",2),current.removeClass(settings.active_slide_class),next.css("zIndex",4).addClass(settings.active_slide_class),slides_container.trigger("before-slide-change.fndtn.orbit"),settings.before_slide_change(),self.update_active_link(next_idx);var callback=function(){var unlock=function(){idx=next_idx,locked=!1,start_timer===!0&&(timer=self.create_timer(),timer.start()),self.update_slide_number(idx),slides_container.trigger("after-slide-change.fndtn.orbit",[{slide_number:idx,total_slides:slides.length}]),settings.after_slide_change(idx,slides.length)};slides_container.outerHeight()!=next.outerHeight()&&settings.variable_height?slides_container.animate({height:next.outerHeight()},250,"linear",unlock):unlock()};if(1===slides.length)return callback(),!1;var start_animation=function(){"next"===dir&&animate.next(current,next,callback),"prev"===dir&&animate.prev(current,next,callback)};next.outerHeight()>slides_container.outerHeight()&&settings.variable_height?slides_container.animate({height:next.outerHeight()},250,"linear",start_animation):start_animation()},self.next=function(e){e.stopImmediatePropagation(),e.preventDefault(),self._goto(idx+1)},self.prev=function(e){e.stopImmediatePropagation(),e.preventDefault(),self._goto(idx-1)},self.link_custom=function(e){e.preventDefault();var link=$(this).attr("data-orbit-link");if("string"==typeof link&&""!=(link=$.trim(link))){var slide=container.find("[data-orbit-slide="+link+"]");-1!=slide.index()&&self._goto(slide.index())}},self.link_bullet=function(e){var index=$(this).attr("data-orbit-slide");if("string"==typeof index&&""!=(index=$.trim(index)))if(isNaN(parseInt(index))){var slide=container.find("[data-orbit-slide="+index+"]");-1!=slide.index()&&self._goto(slide.index()+1)}else self._goto(parseInt(index))},self.timer_callback=function(){self._goto(idx+1,!0)},self.compute_dimensions=function(){var current=$(self.slides().get(idx)),h=current.outerHeight();settings.variable_height||self.slides().each(function(){$(this).outerHeight()>h&&(h=$(this).outerHeight())}),slides_container.height(h)},self.create_timer=function(){var t=new Timer(container.find("."+settings.timer_container_class),settings,self.timer_callback);return t},self.stop_timer=function(){"object"==typeof timer&&timer.stop()},self.toggle_timer=function(){var t=container.find("."+settings.timer_container_class);t.hasClass(settings.timer_paused_class)?("undefined"==typeof timer&&(timer=self.create_timer()),timer.start()):"object"==typeof timer&&timer.stop()},self.init=function(){self.build_markup(),settings.timer&&(timer=self.create_timer(),Foundation.utils.image_loaded(this.slides().children("img"),timer.start)),animate=new FadeAnimation(settings,slides_container),"slide"===settings.animation&&(animate=new SlideAnimation(settings,slides_container)),container.on("click","."+settings.next_class,self.next),container.on("click","."+settings.prev_class,self.prev),settings.next_on_click&&container.on("click","."+settings.slides_container_class+" [data-orbit-slide]",self.link_bullet),container.on("click",self.toggle_timer),settings.swipe&&container.on("touchstart.fndtn.orbit",function(e){e.touches||(e=e.originalEvent);var data={start_page_x:e.touches[0].pageX,start_page_y:e.touches[0].pageY,start_time:(new Date).getTime(),delta_x:0,is_scrolling:undefined};container.data("swipe-transition",data),e.stopPropagation()}).on("touchmove.fndtn.orbit",function(e){if(e.touches||(e=e.originalEvent),!(e.touches.length>1||e.scale&&1!==e.scale)){var data=container.data("swipe-transition");if("undefined"==typeof data&&(data={}),data.delta_x=e.touches[0].pageX-data.start_page_x,"undefined"==typeof data.is_scrolling&&(data.is_scrolling=!!(data.is_scrolling||Math.abs(data.delta_x)<Math.abs(e.touches[0].pageY-data.start_page_y))),!data.is_scrolling&&!data.active){e.preventDefault();var direction=data.delta_x<0?idx+1:idx-1;data.active=!0,self._goto(direction)}}}).on("touchend.fndtn.orbit",function(e){container.data("swipe-transition",{}),e.stopPropagation()}),container.on("mouseenter.fndtn.orbit",function(e){settings.timer&&settings.pause_on_hover&&self.stop_timer()}).on("mouseleave.fndtn.orbit",function(e){settings.timer&&settings.resume_on_mouseout&&timer.start()}),$(document).on("click","[data-orbit-link]",self.link_custom),$(window).on("load resize",self.compute_dimensions),Foundation.utils.image_loaded(this.slides().children("img"),self.compute_dimensions),Foundation.utils.image_loaded(this.slides().children("img"),function(){container.prev("."+settings.preloader_class).css("display","none"),self.update_slide_number(0),self.update_active_link(0),slides_container.trigger("ready.fndtn.orbit")})},self.init()},Timer=function(el,settings,callback){var start,timeout,self=this,duration=settings.timer_speed,progress=el.find("."+settings.timer_progress_class),left=-1;this.update_progress=function(w){var new_progress=progress.clone();new_progress.attr("style",""),new_progress.css("width",w+"%"),progress.replaceWith(new_progress),progress=new_progress},this.restart=function(){clearTimeout(timeout),el.addClass(settings.timer_paused_class),left=-1,self.update_progress(0)},this.start=function(){return el.hasClass(settings.timer_paused_class)?(left=-1===left?duration:left,el.removeClass(settings.timer_paused_class),start=(new Date).getTime(),progress.animate({width:"100%"},left,"linear"),timeout=setTimeout(function(){self.restart(),callback()},left),void el.trigger("timer-started.fndtn.orbit")):!0},this.stop=function(){if(el.hasClass(settings.timer_paused_class))return!0;clearTimeout(timeout),el.addClass(settings.timer_paused_class);var end=(new Date).getTime();left-=end-start;var w=100-left/duration*100;self.update_progress(w),el.trigger("timer-stopped.fndtn.orbit")}},SlideAnimation=function(settings,container){var duration=settings.animation_speed,is_rtl=1===$("html[dir=rtl]").length,margin=is_rtl?"marginRight":"marginLeft",animMargin={};animMargin[margin]="0%",this.next=function(current,next,callback){current.animate({marginLeft:"-100%"},duration),next.animate(animMargin,duration,function(){current.css(margin,"100%"),callback()})},this.prev=function(current,prev,callback){current.animate({marginLeft:"100%"},duration),prev.css(margin,"-100%"),prev.animate(animMargin,duration,function(){current.css(margin,"100%"),callback()})}},FadeAnimation=function(settings,container){var duration=settings.animation_speed;1===$("html[dir=rtl]").length;this.next=function(current,next,callback){next.css({margin:"0%",opacity:"0.01"}),next.animate({opacity:"1"},duration,"linear",function(){current.css("margin","100%"),callback()})},this.prev=function(current,prev,callback){prev.css({margin:"0%",opacity:"0.01"}),prev.animate({opacity:"1"},duration,"linear",function(){current.css("margin","100%"),callback()})}};Foundation.libs=Foundation.libs||{},Foundation.libs.orbit={name:"orbit",version:"5.5.3",settings:{animation:"slide",timer_speed:1e4,pause_on_hover:!0,resume_on_mouseout:!1,next_on_click:!0,animation_speed:500,stack_on_small:!1,navigation_arrows:!0,slide_number:!0,slide_number_text:"of",container_class:"orbit-container",stack_on_small_class:"orbit-stack-on-small",next_class:"orbit-next",prev_class:"orbit-prev",timer_container_class:"orbit-timer",timer_paused_class:"paused",timer_progress_class:"orbit-progress",slides_container_class:"orbit-slides-container",preloader_class:"preloader",slide_selector:"*",bullets_container_class:"orbit-bullets",bullets_active_class:"active",slide_number_class:"orbit-slide-number",caption_class:"orbit-caption",active_slide_class:"active",orbit_transition_class:"orbit-transitioning",bullets:!0,circular:!0,timer:!0,variable_height:!1,swipe:!0,before_slide_change:noop,after_slide_change:noop},init:function(scope,method,options){this.bindings(method,options)},events:function(instance){var orbit_instance=new Orbit(this.S(instance),this.S(instance).data("orbit-init"));this.S(instance).data(this.name+"-instance",orbit_instance)},reflow:function(){var self=this;if(self.S(self.scope).is("[data-orbit]")){var $el=self.S(self.scope),instance=$el.data(self.name+"-instance");instance.compute_dimensions()}else self.S("[data-orbit]",self.scope).each(function(idx,el){var $el=self.S(el),instance=(self.data_options($el),$el.data(self.name+"-instance"));instance.compute_dimensions()})}}}(jQuery,window,window.document),function($,window,document,undefined){"use strict";Foundation.libs.slider={name:"slider",version:"5.5.3",settings:{start:0,end:100,step:1,precision:2,initial:null,display_selector:"",vertical:!1,trigger_input_change:!1,on_change:function(){}},cache:{},init:function(scope,method,options){Foundation.inherit(this,"throttle"),this.bindings(method,options),this.reflow()},events:function(){var self=this;$(this.scope).off(".slider").on("mousedown.fndtn.slider touchstart.fndtn.slider pointerdown.fndtn.slider","["+self.attr_name()+"]:not(.disabled, [disabled]) .range-slider-handle",function(e){self.cache.active||(e.preventDefault(),self.set_active_slider($(e.target)))}).on("mousemove.fndtn.slider touchmove.fndtn.slider pointermove.fndtn.slider",function(e){if(self.cache.active)if(e.preventDefault(),$.data(self.cache.active[0],"settings").vertical){var scroll_offset=0;e.pageY||(scroll_offset=window.scrollY),self.calculate_position(self.cache.active,self.get_cursor_position(e,"y")+scroll_offset)}else self.calculate_position(self.cache.active,self.get_cursor_position(e,"x"))}).on("mouseup.fndtn.slider touchend.fndtn.slider pointerup.fndtn.slider",function(e){if(!self.cache.active){var slider="slider"===$(e.target).attr("role")?$(e.target):$(e.target).closest(".range-slider").find("[role='slider']");if(slider.length&&!slider.parent().hasClass("disabled")&&!slider.parent().attr("disabled"))if(self.set_active_slider(slider),$.data(self.cache.active[0],"settings").vertical){var scroll_offset=0;e.pageY||(scroll_offset=window.scrollY),self.calculate_position(self.cache.active,self.get_cursor_position(e,"y")+scroll_offset)}else self.calculate_position(self.cache.active,self.get_cursor_position(e,"x"))}self.remove_active_slider()}).on("change.fndtn.slider",function(e){self.settings.on_change()}),self.S(window).on("resize.fndtn.slider",self.throttle(function(e){self.reflow()},300)),this.S("["+this.attr_name()+"]").each(function(){var slider=$(this),handle=slider.children(".range-slider-handle")[0],settings=self.initialize_settings(handle);""!=settings.display_selector&&$(settings.display_selector).each(function(){$(this).attr("value")&&$(this).off("change").on("change",function(){slider.foundation("slider","set_value",$(this).val())})})})},get_cursor_position:function(e,xy){var position,pageXY="page"+xy.toUpperCase(),clientXY="client"+xy.toUpperCase();return"undefined"!=typeof e[pageXY]?position=e[pageXY]:"undefined"!=typeof e.originalEvent[clientXY]?position=e.originalEvent[clientXY]:e.originalEvent.touches&&e.originalEvent.touches[0]&&"undefined"!=typeof e.originalEvent.touches[0][clientXY]?position=e.originalEvent.touches[0][clientXY]:e.currentPoint&&"undefined"!=typeof e.currentPoint[xy]&&(position=e.currentPoint[xy]),position},set_active_slider:function($handle){this.cache.active=$handle},remove_active_slider:function(){this.cache.active=null},calculate_position:function($handle,cursor_x){var self=this,settings=$.data($handle[0],"settings"),bar_l=($.data($handle[0],"handle_l"),$.data($handle[0],"handle_o"),$.data($handle[0],"bar_l")),bar_o=$.data($handle[0],"bar_o");requestAnimationFrame(function(){var pct;pct=Foundation.rtl&&!settings.vertical?self.limit_to((bar_o+bar_l-cursor_x)/bar_l,0,1):self.limit_to((cursor_x-bar_o)/bar_l,0,1),pct=settings.vertical?1-pct:pct;var norm=self.normalized_value(pct,settings.start,settings.end,settings.step,settings.precision);self.set_ui($handle,norm)})},set_ui:function($handle,value){var settings=$.data($handle[0],"settings"),handle_l=$.data($handle[0],"handle_l"),bar_l=$.data($handle[0],"bar_l"),norm_pct=this.normalized_percentage(value,settings.start,settings.end),handle_offset=norm_pct*(bar_l-handle_l)-1,progress_bar_length=100*norm_pct,$handle_parent=$handle.parent(),$hidden_inputs=$handle.parent().children("input[type=hidden]");Foundation.rtl&&!settings.vertical&&(handle_offset=-handle_offset),handle_offset=settings.vertical?-handle_offset+bar_l-handle_l+1:handle_offset,this.set_translate($handle,handle_offset,settings.vertical),settings.vertical?$handle.siblings(".range-slider-active-segment").css("height",progress_bar_length+"%"):$handle.siblings(".range-slider-active-segment").css("width",progress_bar_length+"%"),$handle_parent.attr(this.attr_name(),value).trigger("change.fndtn.slider"),$hidden_inputs.val(value),settings.trigger_input_change&&$hidden_inputs.trigger("change.fndtn.slider"),$handle[0].hasAttribute("aria-valuemin")||$handle.attr({"aria-valuemin":settings.start,"aria-valuemax":settings.end}),$handle.attr("aria-valuenow",value),""!=settings.display_selector&&$(settings.display_selector).each(function(){this.hasAttribute("value")?$(this).val(value):$(this).text(value)})},normalized_percentage:function(val,start,end){return Math.min(1,(val-start)/(end-start))},normalized_value:function(val,start,end,step,precision){var range=end-start,point=val*range,mod=(point-point%step)/step,rem=point%step,round=rem>=.5*step?step:0;return(mod*step+round+start).toFixed(precision)},set_translate:function(ele,offset,vertical){vertical?$(ele).css("-webkit-transform","translateY("+offset+"px)").css("-moz-transform","translateY("+offset+"px)").css("-ms-transform","translateY("+offset+"px)").css("-o-transform","translateY("+offset+"px)").css("transform","translateY("+offset+"px)"):$(ele).css("-webkit-transform","translateX("+offset+"px)").css("-moz-transform","translateX("+offset+"px)").css("-ms-transform","translateX("+offset+"px)").css("-o-transform","translateX("+offset+"px)").css("transform","translateX("+offset+"px)")},limit_to:function(val,min,max){return Math.min(Math.max(val,min),max)},initialize_settings:function(handle){var decimal_places_match_result,settings=$.extend({},this.settings,this.data_options($(handle).parent()));return null===settings.precision&&(decimal_places_match_result=(""+settings.step).match(/\.([\d]*)/),settings.precision=decimal_places_match_result&&decimal_places_match_result[1]?decimal_places_match_result[1].length:0),settings.vertical?($.data(handle,"bar_o",$(handle).parent().offset().top),$.data(handle,"bar_l",$(handle).parent().outerHeight()),$.data(handle,"handle_o",$(handle).offset().top),$.data(handle,"handle_l",$(handle).outerHeight())):($.data(handle,"bar_o",$(handle).parent().offset().left),$.data(handle,"bar_l",$(handle).parent().outerWidth()),$.data(handle,"handle_o",$(handle).offset().left),$.data(handle,"handle_l",$(handle).outerWidth())),$.data(handle,"bar",$(handle).parent()),$.data(handle,"settings",settings)},set_initial_position:function($ele){var settings=$.data($ele.children(".range-slider-handle")[0],"settings"),initial="number"!=typeof settings.initial||isNaN(settings.initial)?Math.floor(.5*(settings.end-settings.start)/settings.step)*settings.step+settings.start:settings.initial,$handle=$ele.children(".range-slider-handle");this.set_ui($handle,initial)},set_value:function(value){var self=this;$("["+self.attr_name()+"]",this.scope).each(function(){$(this).attr(self.attr_name(),value)}),$(this.scope).attr(self.attr_name())&&$(this.scope).attr(self.attr_name(),value),self.reflow()},reflow:function(){var self=this;self.S("["+this.attr_name()+"]").each(function(){var handle=$(this).children(".range-slider-handle")[0],val=$(this).attr(self.attr_name());self.initialize_settings(handle),val?self.set_ui($(handle),parseFloat(val)):self.set_initial_position($(this))})}}}(jQuery,window,window.document),function($,window,document,undefined){"use strict";Foundation.libs.tab={name:"tab",version:"5.5.3",settings:{active_class:"active",callback:function(){},deep_linking:!1,scroll_to_content:!0,is_hover:!1},default_tab_hashes:[],init:function(scope,method,options){var self=this,S=this.S;S("["+this.attr_name()+"] > .active > a",this.scope).each(function(){self.default_tab_hashes.push(this.hash)}),this.bindings(method,options),this.handle_location_hash_change()},events:function(){var self=this,S=this.S,usual_tab_behavior=function(e,target){var settings=S(target).closest("["+self.attr_name()+"]").data(self.attr_name(!0)+"-init");if(!settings.is_hover||Modernizr.touch){var keyCode=e.keyCode||e.which;9!==keyCode&&(e.preventDefault(),e.stopPropagation()),self.toggle_active_tab(S(target).parent())}};S(this.scope).off(".tab").on("keydown.fndtn.tab","["+this.attr_name()+"] > * > a",function(e){var keyCode=e.keyCode||e.which;if(13===keyCode||32===keyCode){var el=this;usual_tab_behavior(e,el)}}).on("click.fndtn.tab","["+this.attr_name()+"] > * > a",function(e){var el=this;usual_tab_behavior(e,el)}).on("mouseenter.fndtn.tab","["+this.attr_name()+"] > * > a",function(e){var settings=S(this).closest("["+self.attr_name()+"]").data(self.attr_name(!0)+"-init");settings.is_hover&&self.toggle_active_tab(S(this).parent())}),S(window).on("hashchange.fndtn.tab",function(e){e.preventDefault(),self.handle_location_hash_change()})},handle_location_hash_change:function(){var self=this,S=this.S;S("["+this.attr_name()+"]",this.scope).each(function(){var settings=S(this).data(self.attr_name(!0)+"-init");if(settings.deep_linking){var hash;if(hash=settings.scroll_to_content?self.scope.location.hash:self.scope.location.hash.replace("fndtn-",""),""!=hash){var hash_element=S(hash);if(hash_element.hasClass("content")&&hash_element.parent().hasClass("tabs-content"))self.toggle_active_tab($("["+self.attr_name()+"] > * > a[href="+hash+"]").parent());else{var hash_tab_container_id=hash_element.closest(".content").attr("id");hash_tab_container_id!=undefined&&self.toggle_active_tab($("["+self.attr_name()+"] > * > a[href=#"+hash_tab_container_id+"]").parent(),hash)}}else for(var ind=0;ind<self.default_tab_hashes.length;ind++)self.toggle_active_tab($("["+self.attr_name()+"] > * > a[href="+self.default_tab_hashes[ind]+"]").parent())}})},toggle_active_tab:function(tab,location_hash){var self=this,S=self.S,tabs=tab.closest("["+this.attr_name()+"]"),tab_link=tab.find("a"),anchor=tab.children("a").first(),target_hash="#"+anchor.attr("href").split("#")[1],target=S(target_hash),siblings=tab.siblings(),settings=tabs.data(this.attr_name(!0)+"-init"),interpret_keyup_action=function(e){var $target,$original=$(this),$prev=$(this).parents("li").prev().children('[role="tab"]'),$next=$(this).parents("li").next().children('[role="tab"]');switch(e.keyCode){case 37:$target=$prev;break;case 39:$target=$next;break;default:$target=!1}$target.length&&($original.attr({tabindex:"-1","aria-selected":null}),$target.attr({tabindex:"0","aria-selected":!0}).focus()),$('[role="tabpanel"]').attr("aria-hidden","true"),$("#"+$(document.activeElement).attr("href").substring(1)).attr("aria-hidden",null)},go_to_hash=function(hash){var default_hash=settings.scroll_to_content?self.default_tab_hashes[0]:"fndtn-"+self.default_tab_hashes[0].replace("#","");(hash!==default_hash||window.location.hash)&&(window.location.hash=hash)};anchor.data("tab-content")&&(target_hash="#"+anchor.data("tab-content").split("#")[1],target=S(target_hash)),settings.deep_linking&&(settings.scroll_to_content?(go_to_hash(location_hash||target_hash),location_hash==undefined||location_hash==target_hash?tab.parent()[0].scrollIntoView():S(target_hash)[0].scrollIntoView()):go_to_hash(location_hash!=undefined?"fndtn-"+location_hash.replace("#",""):"fndtn-"+target_hash.replace("#",""))),tab.addClass(settings.active_class).triggerHandler("opened"),tab_link.attr({"aria-selected":"true",tabindex:0}),siblings.removeClass(settings.active_class),siblings.find("a").attr({"aria-selected":"false"}),target.siblings().removeClass(settings.active_class).attr({"aria-hidden":"true"}),target.addClass(settings.active_class).attr("aria-hidden","false").removeAttr("tabindex"),settings.callback(tab),target.triggerHandler("toggled",[target]),
tabs.triggerHandler("toggled",[tab]),tab_link.off("keydown").on("keydown",interpret_keyup_action)},data_attr:function(str){return this.namespace.length>0?this.namespace+"-"+str:str},off:function(){},reflow:function(){}}}(jQuery,window,window.document);