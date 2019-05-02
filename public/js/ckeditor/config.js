CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi'] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];
	//
	// config.toolbar = 'Groups';
	//
	// config.toolbar_MyToolbar =
	// 	[
	// 		{ name: 'document', items : [ 'Source' ] },
	// 		{ name: 'tools', items : [ 'Maximize' ] },
	// 		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
	// 		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	// 		{ name: 'insert', items : [ 'Image','-','SpecialChar','-','Iframe','Table' ] },
	// 		'/',
	// 		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	// 		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv' ] },
	// 		{ name: 'styles', items : [ 'Format' ] }
	//
	// 	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

    //	Маршрут php загрузчика фото на сервере
	config.filebrowserUploadUrl = '/admin/ckeditor-upload-image';

	//config.extraPlugins = 'youtube';
	//config.extraPlugins = 'iframe';

	config.extraPlugins = 'div';


	/*	Разрешенные тэги и атрибуты. */
	/*	https://ckeditor.com/docs/ckeditor4/latest/guide/dev_allowed_content_rules.html */
	//config.allowedContent = true;
	config.allowedContent =
		'h1 h2 h3 h4 h5 h6 p blockquote strong em pre;' +
		'div(*);' +
		'ol(*);' +
		'ul(*);' +
		'li(*);' +
		'a[!href, rel];' +
		'iframe(*)[!src];' +
		'img(left,right)[!src,alt]{float, width, height};';

	/*	Запрещенные тэги и атрибуты (имеют приоритет над разрешенными). */
	/*	https://ckeditor.com/docs/ckeditor4/latest/guide/dev_disallowed_content.html */
	//config.disallowedContent = 'style span';

    //config.height = '600px';
};

// $(function () {
//     CKEDITOR.replace('lit', {
//         filebrowserUploadUrl: "{{ route('uploader') }}",
//         toolbar : [
// 			{name: 'img', items: ['Image']},
// 		]
// 	});
// });