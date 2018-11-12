// Image Picker
// by Rodrigo Vera
//
// Version 0.2.4
// Full source at https://github.com/rvera/image-picker
// MIT License, https://github.com/rvera/image-picker/blob/master/LICENSE
(function(){var t,e,i,s,l=function(t,e){return function(){return t.apply(e,arguments)}},n=[].indexOf||function(t){for(var e=0,i=this.length;i>e;e++)if(e in this&&this[e]===t)return e;return-1};jQuery.fn.extend({imagepicker:function(e){return null==e&&(e={}),this.each(function(){var i;return i=jQuery(this),i.data("picker")&&i.data("picker").destroy(),i.data("picker",new t(this,s(e))),null!=e.initialized?e.initialized.call(i.data("picker")):void 0})}}),s=function(t){var e;return e={hide_select:!0,show_label:!1,initialized:void 0,changed:void 0,clicked:void 0,selected:void 0,limit:void 0,limit_reached:void 0},jQuery.extend(e,t)},i=function(t,e){return 0===jQuery(t).not(e).length&&0===jQuery(e).not(t).length},t=function(){function t(t,e){this.opts=null!=e?e:{},this.sync_picker_with_select=l(this.sync_picker_with_select,this),this.select=jQuery(t),this.multiple="multiple"===this.select.attr("multiple"),null!=this.select.data("limit")&&(this.opts.limit=parseInt(this.select.data("limit"))),this.build_and_append_picker()}return t.prototype.destroy=function(){var t,e,i,s;for(s=this.picker_options,e=0,i=s.length;i>e;e++)t=s[e],t.destroy();return this.picker.remove(),this.select.unbind("change"),this.select.removeData("picker"),this.select.show()},t.prototype.build_and_append_picker=function(){var t=this;return this.opts.hide_select&&this.select.hide(),this.select.change(function(){return t.sync_picker_with_select()}),null!=this.picker&&this.picker.remove(),this.create_picker(),this.select.after(this.picker),this.sync_picker_with_select()},t.prototype.sync_picker_with_select=function(){var t,e,i,s,l;for(s=this.picker_options,l=[],e=0,i=s.length;i>e;e++)t=s[e],t.is_selected()?l.push(t.mark_as_selected()):l.push(t.unmark_as_selected());return l},t.prototype.create_picker=function(){return this.picker=jQuery("<ul class='thumbnails image_picker_selector'></ul>"),this.picker_options=[],this.recursively_parse_option_groups(this.select,this.picker),this.picker},t.prototype.recursively_parse_option_groups=function(t,i){var s,l,n,r,c,o,h,a,p,u;for(a=t.children("optgroup"),r=0,o=a.length;o>r;r++)n=a[r],n=jQuery(n),s=jQuery("<ul></ul>"),s.append(jQuery("<li class='group_title'>"+n.attr("label")+"</li>")),i.append(jQuery("<li>").append(s)),this.recursively_parse_option_groups(n,s);for(p=function(){var i,s,n,r;for(n=t.children("option"),r=[],i=0,s=n.length;s>i;i++)l=n[i],r.push(new e(l,this,this.opts));return r}.call(this),u=[],c=0,h=p.length;h>c;c++)l=p[c],this.picker_options.push(l),l.has_image()&&u.push(i.append(l.node));return u},t.prototype.has_implicit_blanks=function(){var t;return function(){var e,i,s,l;for(s=this.picker_options,l=[],e=0,i=s.length;i>e;e++)t=s[e],t.is_blank()&&!t.has_image()&&l.push(t);return l}.call(this).length>0},t.prototype.selected_values=function(){return this.multiple?this.select.val()||[]:[this.select.val()]},t.prototype.toggle=function(t){var e,s,l;return s=this.selected_values(),l=""+t.value(),this.multiple?n.call(this.selected_values(),l)>=0?(e=this.selected_values(),e.splice(jQuery.inArray(l,s),1),this.select.val([]),this.select.val(e)):null!=this.opts.limit&&this.selected_values().length>=this.opts.limit?null!=this.opts.limit_reached&&this.opts.limit_reached.call(this.select):this.select.val(this.selected_values().concat(l)):this.has_implicit_blanks()&&t.is_selected()?this.select.val(""):this.select.val(l),i(s,this.selected_values())||(this.select.change(),null==this.opts.changed)?void 0:this.opts.changed.call(this.select,s,this.selected_values())},t}(),e=function(){function t(t,e,i){this.picker=e,this.opts=null!=i?i:{},this.clicked=l(this.clicked,this),this.option=jQuery(t),this.create_node()}return t.prototype.destroy=function(){return this.node.find(".thumbnail").unbind()},t.prototype.has_image=function(){return null!=this.option.data("img-src")},t.prototype.is_blank=function(){return!(null!=this.value()&&""!==this.value())},t.prototype.is_selected=function(){var t;return t=this.picker.select.val(),this.picker.multiple?jQuery.inArray(this.value(),t)>=0:this.value()===t},t.prototype.mark_as_selected=function(){return this.node.find(".thumbnail").addClass("selected")},t.prototype.unmark_as_selected=function(){return this.node.find(".thumbnail").removeClass("selected")},t.prototype.value=function(){return this.option.val()},t.prototype.label=function(){return this.option.data("img-label")?this.option.data("img-label"):this.option.text()},t.prototype.clicked=function(){return this.picker.toggle(this),null!=this.opts.clicked&&this.opts.clicked.call(this.picker.select,this),null!=this.opts.selected&&this.is_selected()?this.opts.selected.call(this.picker.select,this):void 0},t.prototype.create_node=function(){var t,e;return this.node=jQuery("<li/>"),t=jQuery("<img class='image_picker_image'/>"),t.attr("src",this.option.data("img-src")),e=jQuery("<div class='thumbnail'>"),e.click({option:this},function(t){return t.data.option.clicked()}),e.append(t),this.opts.show_label&&e.append(jQuery("<p/>").html(this.label())),this.node.append(e),this.node},t}()}).call(this);
var intervalSet;
(function($) {
    "use strict";
    
    $(document).ready(function() {
        
    	$('#import_type').on('change', function(){
    		var value = $(this).val();

    		if(value == 'on_builder'){
    			$('.online_builder').show();
    			$('.demo').hide();
    			$('.backup').hide();
    		}else{
    			$('.online_builder').hide();
    			$('.demo').show();
    			$('.backup').show();
    		}
    	});


        $('select.demodata').imagepicker({show_label:true});

        var backup = $('#backups').val();
        
		var demo = $('#demodata').val();
		var parts = $('#demodata option[value="'+demo+'"]').data('parts');
		var import_ = 'demos';
		var type = $('#import_type').val();
		var export_type = $('#import_type2').val();
		var attachment = $("#attachments").is(':checked') ? 1 : 0;
		var import_progress = $("#import_progress");
		var export_progress = $("#export_progress");
		var percentage_now = 0;
		var content_percent = 70/parseInt(parts);
		var widget_percent = 10;
		var success = true; 
		var menu_percent = 10; 
		
		var options_percent = 10;
		if(backup != 0){
			import_ = 'backups';
			demo = backup;
		}

		if(type == 'content'){
			content_percent = 10;
		}

		if(type == 'widgets'){
			widget_percent = 100;
		}

		if(type == 'options'){
			options_percent = 100;
		}
		var import_message = $('.import_status');
		import_message.text('');
			
        $('#import-data').on('click', function(e) {
        	import_message.text('');
			e.preventDefault();
			backup = $('#backups').val();
			demo = $('#demodata').val();
			parts = $('#demodata option[value="'+demo+'"]').data('parts');
			content_percent = 70/parseInt(parts);

			import_ = 'demos';

			type = $('#import_type').val();
			attachment = $("#attachments").is(':checked') ? 1 : 0;
			if(type == 'on_builder')
				import_ = 'on_builder';
			if(backup != 0){
				import_ = 'backups';
				demo = backup;
			}

			if(type == 'content'){
				content_percent = 100/parseInt(parts);
			}

			if(type == 'widgets'){
				widget_percent = 100;
			}

			if(type == 'options'){
				options_percent = 100;
			}
			if(type == 'on_builder'){
				options_percent = 100;
			}
			if (confirm('Are you sure to import ?')) {
				import_progress.parent().css('opacity', '1');
				setProgress(0, '#import_progress');
				
				if(type == 'all'){
					if(import_ == 'backups') 
						import_content('content', 70);
					else{
						
						import_content(1, percentage_now + content_percent);
	
					}
					$('body').on('imported_content', function(){
						if(type == 'all')
							import_options(percentage_now + options_percent);
					});

					$('body').on('imported_options', function(){
						if(type == 'all')
							import_widgets(percentage_now + widget_percent);
					});

					$('body').on('imported_widgets', function(){
						if(type == 'all')	
							import_menus(percentage_now + menu_percent);
					});
						
				}else if(type == 'content'){
					if(import_ == 'backups')
						import_content('content', 100);
					else{
						
						import_content(1, percentage_now + content_percent);
					}
				}else if(type == 'widgets')
					import_widgets(widget_percent);
				else if(type == 'options')
					import_options(options_percent);
				else if(type == 'on_builder')
					import_options2(options_percent);


				/*if(success)
					setTimeout(function(){
								location.reload();
					},600);*/
		
			}
		});


		$('#save-backup').on('click', function(e) {
			e.preventDefault();
			export_type = $('#import_type2').val();
			var export_message = $('.export_status');

			if (confirm('Are you sure to export ?')) {
				export_message.text('');
				export_progress.parent().css('opacity', '1');
				setProgress(0, '#export_progress');
				jQuery.ajax({
					type: 'POST',
					url: ajaxurl, 
					data: {
						action: 'codeless_export',
						
						type: export_type,
						secret: secret
					},
					dataType: 'html',
					success: function(data, textStatus, XMLHttpRequest){
						var status = parseInt(data.charAt(0));
						if(status == 1) {
							intervalProgress(100, '#export_progress', 500, 10);
							percentage_now = 100;
							setTimeout(function(){
								location.reload();
							},600);
							

						}else{
							$('#export_progress').parent().css('opacity', '0');
							export_message.append(data.substring(1));
						}
					},
					error: function(MLHttpRequest, textStatus, errorThrown){
						success = false;
					}
				});
			}
		});

		function import_content(file, percentage){	
			var nr_file = file;
			if(file != 'content')
				file = 'content_'+file;
			
			setProgressTimeTo(percentage, '#import_progress');
			jQuery.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'codeless_import_content',
					xml: file,
					demo: demo,
					type: import_,
					import_attachments: attachment
				},
				dataType: 'html',
				success: function(data, textStatus, XMLHttpRequest){
					var status = parseInt(data.charAt(0));
					
					if(status == 1){
						clearInterval(intervalSet);
						setProgress(percentage, '#import_progress');
						percentage_now = percentage;
						if(file == 'content' || file == 'content_'+parts){
							$('body').trigger({
								type: "imported_content",
								message: "Imported!" 
							});
							import_message.append(data.substring(1));
						}else{
							import_content(nr_file+1, percentage + content_percent);
						}
						
					}else{
						$('#import_progress').parent().css('opacity', '0');
						success = false;
					}
					
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					success = false;
				}
			});
		}

		function import_options(percentage){
			
			jQuery.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'codeless_import_options',
					demo: demo,
					type: import_
				},
				dataType: 'html',
				success: function(data, textStatus, XMLHttpRequest){
					var status = parseInt(data.charAt(0));
					if(status == 1){

						setProgress(percentage, '#import_progress');
						percentage_now = percentage;
						$('body').trigger({
							type: "imported_options",
							message: "Imported!"
						});
						
					}else{
						$('#import_progress').parent().css('opacity', '0');
						success = false;
					}
					import_message.append(data.substring(1));
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					success = false;
				}
			});
		}


		function import_options2(percentage){
			var val = $('#online_builder').val();
			jQuery.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'codeless_import_options2',
					options: val,
					type: import_
				},
				dataType: 'html',
				success: function(data, textStatus, XMLHttpRequest){
					var status = parseInt(data.charAt(0));
					if(status == 1){
						setProgress(percentage, '#import_progress');
						percentage_now = percentage;
						$('body').trigger({
							type: "imported_options",
							message: "Imported!"
						});
						
					}else{
						$('#import_progress').parent().css('opacity', '0');
						success = false;
					}
					import_message.append(data.substring(1));
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					success = false;
				}
			});
		}

		function import_widgets(percentage){
			
			jQuery.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'codeless_import_widgets',
					type: import_,
					demo: demo
				},
				dataType: 'html',
				success: function(data, textStatus, XMLHttpRequest){
					var status = parseInt(data.charAt(0));
					if(status == 1){
						setProgress(percentage, '#import_progress');
						percentage_now = percentage;
						$('body').trigger({
							type: "imported_widgets",
							message: "Imported!"
						});
						
					}else{
						$('#import_progress').parent().css('opacity', '0');
						success = false;
					}
					import_message.append(data.substring(1));
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					success = false;
				}
			});
		}

		function import_menus(percentage){
			
			jQuery.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'codeless_import_menus',
					type: import_,
					demo: demo
				},
				dataType: 'html',
				success: function(data, textStatus, XMLHttpRequest){
					var status = parseInt(data.charAt(0));
					if(status == 1){
						setProgress(percentage, '#import_progress');
						percentage_now = percentage;
						$('body').trigger({
							type: "imported_menus",
							message: "Imported!"
						});

					}else{
						$('#import_progress').parent().css('opacity', '0');
						success = false;
					}
					import_message.append(data.substring(1));
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					success = false;
				}
			});
		}

		function setProgress(percent, to){
			$(to).width(percent+'%');
			$(to).parent().find('.text').text(percent+'%');
		}

		function setProgressTimeTo(percent, to){
			var interval = 2000;
			var increase = 1;
			var now = 0;
			intervalSet = setInterval(function(){
				now = now + increase;
				$(to).width(now+'%');
				$(to).parent().find('.text').text(now+'%');
				if(now+5 >= percent)
					clearInterval(intervalSet);
			}, interval);
		}

		function intervalProgress(percent, to, time, num){
			var interval = time / num;
			var increase = percent / num;
			var now = 0;
			var intervalSet = setInterval(function(){
				now = now + increase;
				setProgress(now, to);
				if(now >= percent)
					clearInterval(intervalSet);
			}, interval);

			
		}
        
    });
})(jQuery);