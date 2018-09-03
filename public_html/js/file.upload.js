(function ($) {
	var currentId = 0;
	var model = {
		init: function () {
			if (!localStorage.files) {
				localStorage.files = JSON.stringify([]);
			} else {
				localStorage.files = JSON.stringify([]);
			}
		},
		add: function (obj) {
			var data = JSON.parse(localStorage.files);
			data.push(obj);
			localStorage.files = JSON.stringify(data);
			currentId += 1;
		},
		getAll: function () {
			return JSON.parse(localStorage.files);
		},
		update: function (id, image) {
			var data = model.getAll();
			data[id].ImgSrc = image.base_url+JSON.parse(image.in_json).images.small;
			data[id].ImgId=image.id;
			data[id].type = "local";
			data[id].status = "success";
			localStorage.files = JSON.stringify(data);
		},
		getSelected: function (id) {
			var data = model.getAll().filter(function (item) {
				return item.id == id;
			});
			return data[0];
		}
	}
	var controller = {
		init: function (id, env) {
			model.init();
			this.getAllFilesFromServer(env.serverAllFileUrl, env);
			view.init(env);
		},
		setSelected: function (id, clicked) {
			// TODO upgrade this performance 
			// COntains bug on clicked.inputId
			console.log(clicked);
			
			$('input[name=' + clicked.input + ']').val(model.getSelected(id).ImgId);
			
			// $('#' + clicked.imageId).html('<img src="' + model.getSelected(id).ImgSrc + '" class="img-fluid">');
			// 
			$('#' + clicked.id).parent().css({ 'background':'url('+model.getSelected(id).ImgSrc+') no-repeat','height':'20rem' });
			$('#' + clicked.imageId).html('');
			return true;
		},


		/**
		 * Adding Local File to the list, We set a type=local to identify this file is local
		 * 
		 * @param data
		 * @param url
		 * @param src
		 * @param env 
		 */
		 addFile: function (data, url, src, env) {
		 	var tempId = currentId;
		 	model.add({
		 		ImgSrc: src,
		 		id: tempId,
		 		type: 'local',
		 		status: 'uploading'
		 	});
		 	view.bufferRender('local');
		 	this.sendToServer(data, url, env, tempId);
		 },


		/**
		 * We download the files(path) from the url that is set on env
		 * 
		 * @returns array of  data
		 */
		 getServerFileFromModel: function () {
		 	var data = model.getAll().filter(function (item) {
		 		return item.type == 'server';
		 	});
		 	console.log(data);
		 	return data;
		 },


		/**
		 * This function is called when files lists are downloaded from the server
		 * 
		 * @returns void
		 */
		 addMultipleFiles: function (data, env) {
		 	data.data.forEach(function (item) {
		 		model.add({
					ImgSrc: item.url,
					ImgId:item.id,
		 			id: currentId,
		 			type: 'server',
		 			status: 'success'
		 		});
		 	});
		 },

		/**
		 * 
		 * @param {*} src 
		 * @param {*} env 
		 * @param {*} currentId 
		 */
		 updateSrc(src, env, currentId) {
		 	model.update(currentId, src);
		 	console.log(model.getSelected(currentId));
		 	view.bufferRender('local');
		 },


		 sendToServer: function (data, url, env, currentId) {
		 	$.ajax({
		 		headers: {
		 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		 		},
		 		url: url,
		 		type: 'POST',
		 		data: data,
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				uploadProgress: function (event, position, total, percentComplete) {
					console.log('Percentage COmplete ' + percentComplete);
				},
				success: function (data, textStatus, jqXHR) {
					/*Update the src of local */
					console.log(data);
					console.log(textStatus);
					console.log(jqXHR);
					controller.updateSrc(data, env, currentId);
					/*Set opacity to 1 */
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR)
					alert(errorThrown + textStatus);
					if (jqXHR.responseText) {
						errors = JSON.parse(jqXHR.responseText).errors
						alert('Error uploading image: ' + errors.join(", ") + '. Make sure the file is an image and has extension jpg/jpeg/png.');
					}
				}
			});
		 },
		 getAllFilesFromServer(url, env) {
		 	$.ajax({
		 		headers: {
		 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		 		},
		 		url: url,
		 		type: 'GET',
		 		success: function (data, textStatus, jqXHR) {
		 			controller.addMultipleFiles(data, env);
		 		},
		 		error: function (jqXHR, textStatus, errorThrown) {
		 			alert(errorThrown + textStatus);
		 			if (jqXHR.responseText) {
		 				errors = JSON.parse(jqXHR.responseText).errors
		 				alert('Error uploading image: ' + errors.join(", ") + '. Make sure the file is an image and has extension jpg/jpeg/png.');
		 			}
		 		}
		 	});
		 },
		 removeFile: function () {

		 },
		 getAllFiles: function (type) {
		 	var data = model.getAll().filter(function (item) {
		 		return item.type == type;
		 	});
		 	console.log(data);
		 	return data;
		 }
		}
		var view = {
			init: function (env) {
				var temp = this;
				temp.env = env;
				var $div = $('#' + env.id);
				var inputAppend = "<input name='" + $div.attr('input-field') + "' type='hidden' value='"+env.value+"'>";
				$div.parent().prepend(inputAppend);
				inputAppend="<span id='"+env.id+"-image'>";
				
				inputAppend+="</span>";

				$div.parent().append(inputAppend);
				
			var $result = $('#' + env.imageId);
			$div.click(function () {
				temp.env.id = $(this).attr('id');
				temp.env.input = $(this).attr('input-field');
				temp.env.imageId = $(this).attr('id') + '-image';
				var raw = '<div class="overlay">' +
				'</div><div class="hero">' +
				'<ul class="nav nav-tabs" id="myTab" role="tablist">' +
				'<li class="nav-item">' +
				'<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload From your device</a>' +
				'</li>' +
				'<li class="nav-item">' +
				'<a class="nav-link" id="astd-tab" data-toggle="tab" href="#astd" role="tab" aria-controls="astd" aria-selected="false">Browse among uploaded</a>' +
				'</li>' +
				'<li class="nav-item">' +
				'<a id="close-image-upload" class="nav-link float-right" href="#">Close &times;</a>' +
				'</li>' +
				'</ul>' +
				'<div class="tab-content mt-2" id="myTabContent">' +
				'<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">' +
				'<div id="bedusUpload" class="btn btn-primary">Upload File</div>' +
				'<div id="buffer" class="row"></div>' +
				'</div>' +
				'<div class="tab-pane fade" id="astd" role="tabpanel" aria-labelledby="astd-tab"></div>' +
				'</div>' +
				'</div>';
				$result.prepend(raw);
				view.localInit('local');
				view.render();
				var newUpload = $('#bedusUpload');

				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');
				input.onchange = function () {
					var file = this.files[0];
					// TODO
					// Implement File Validation

					let form = new FormData();
					form.append('file', file);
					var url = env.serverUploadUrl;
					var reader = new FileReader();
					reader.onload = function () {
						controller.addFile(form, url, reader.result, env);
					};
					reader.readAsDataURL(file);
				};
				newUpload.click(function () {
					input.click();
				});
				$('body').on('click', 'div.astd', function () {
					controller.setSelected($(this).attr('id'), temp.env);
				});
				$('body').on('click', '#close-image-upload', function () {
					$('#' + temp.env.imageId).html('');
				});
			});
		},


		/**
		 * Initialization of all local files to 
		 */
		 localInit: function (type = 'local') {

		 	var container = $('#buffer');
		 	var raw = "";
		 	controller.getAllFiles(type).forEach(function (file) {
		 		raw += '<div class="col-md-3 astd mt-4 mb-4" id="' + file.id + '">';
		 		raw += '<div class="temp-img" id="myProgress" style="background:url(' + file.ImgSrc + ') no-repeat;">';
		 		raw += '<div id="' + file.id + '-i" class="local"><div>&nbsp;</div><div class="setB">set Image</div></div>';
		 		raw += '</div>';
		 		raw += "</div>";
		 	});

		 	container.prepend(raw);

		 },


		/**
		 * This function adds individual item to the viewport
		 * @param string type
		 */
		 bufferRender: function (type) {
		 	var container = $('#buffer');
		 	var raw="";
		 	controller.getAllFiles(type).forEach(function (file) {
		 		console.log(file);
		 		if (file.status == "uploading") {
		 			raw = '<div class="col-md-3 astd mt-4 mb-4" id="' + file.id + '">';
		 			raw += '<div class="temp-img" id="myProgress" style="background:url(' + file.ImgSrc + ') no-repeat;">';
		 			raw += '<div id="' + file.id + '-i" class="local"><i class="fa fa-spinner fa-spin"></i></div>';
		 			raw += '</div>';
		 			raw += "</div>";
		 		} else if (file.status == "success") {
		 			$('#' + file.id + '-i > i').css({ 'display': 'none' });
					$('#' + file.id + '-i').html('<div>&nbsp;</div>');
					$('#' + file.id + '-i').append('<div class="setB">set Image</div>');
		 		}
		 	});

		 	container.prepend(raw);
		 },

		/**
		 * Render all the files which are already uploaded
		 */
		 render: function () {
		 	var container = $('#astd');
		 	var raw = '<div class="container"><div class="row">' +
		 	'<div class="col-md-12"><div class="row">';
		 	controller.getServerFileFromModel().forEach(function (file) {
		 		raw += '<div class="col-md-3 astd mt-4 mb-4" id="' + file.id + '">' ;
		 		raw += '<div class="temp-img" id="myProgress" style="background:url(' + file.ImgSrc + ') no-repeat;">';
				raw += '<div id="' + file.id + '-i" class="local"><div>&nbsp;</div><div class="setB">set Image</div></div>';
				raw += '</div>';
				raw += "</div>";
		 	});
		 	raw += '</div></div></div></div>';
		 	container.append(raw);
		 },


		 lazyLoad: function () {
		 	[].forEach.call(document.querySelectorAll('img[data-src]'), function (img) {
		 		if (view.isInViewport(img)) {
		 			img.setAttribute('src', img.getAttribute('data-src'));
		 			img.onload = function () {
		 				img.removeAttribute('data-src');
		 			};
		 		}
		 	});
		 },
		 isInViewport: function (el) {
		 	var rect = el.getBoundingClientRect();
		 	return (
		 		rect.bottom >= 0 &&
		 		rect.right >= 0 &&
		 		rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
		 		rect.left <= (window.innerWidth || document.documentElement.clientWidth)
		 		);
		 },
		 addImageItem: function (hing, src) {
		 	var raw = '<img src="' + src + '">';
		 	hing.append(raw);
		 }
		}
		$.fn.fileupload = function (options) {
			$this = $(this);
			return this.each(function () {
				env = $.extend({
					baseUrl: "/",
					id: $this.attr('id'),
					value:(typeof $this.attr('data-value') == typeof undefined) ? '':$this.attr('data-value'),
					imageId: $this.attr('id') + '-image',
					serverUploadUrl: '/',
					serverAllFileUrl: ''
				}, options);
				controller.init($this.attr('id'), env);
			});
		};
	}(jQuery));