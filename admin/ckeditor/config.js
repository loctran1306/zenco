/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
 
	config.extraPlugins = 'codemirror,lineheight,wenzgmap,youtube,googledocs,tableresize,imagerotate,youtube,entities,bootstrapVisibility,slideshow,locationmap,pastefromword,lightbox,imagebrowser,imagepaste,quicktable,image2,widget,widgetbootstrap,widgettemplatemenu';
	config.codemirror_theme = 'rubyblue';  // Go here for theme names: http://codemirror.net/demo/theme.html
	config.locationMapPath = 'http://demo301.ninavietnam.org/hoangnhu/administrator/ckeditor/map/';
	config.ckfinder = true;
	config.codemirror = {
	lineNumbers: true,
	highlightActiveLine: true,
	enableSearchTools: true,
	showSearchButton: true,
	showFormatButton: true,
	showCommentButton: true,
	showUncommentButton: true,
	showAutoCompleteButton: true
	};

	config.extraAllowedContent = 'a[data-lightbox,data-title,data-lightbox-saved]';


    config.pasteFromWordPromptCleanup = false;
    config.pasteFromWordCleanupFile = false;
    config.pasteFromWordRemoveFontStyles = false;
    config.pasteFromWordNumberedHeadingToList = false;
    config.pasteFromWordRemoveStyles = false;

	
	// Comment out or remove the 2 lines below if you want to enable the Advanced Content Filter	
	config.allowedContent = true;
	config.extraAllowedContent = '*{*}';	
	config.uiColor = '#AADC6E';
	config.skin = 'office2013';
	config.line_height="1.0;1.1;1.2;1.3;1.4;1.5;1.5;1.6;1.7;1.8;1.9;2.0;3.0;4.0;5.0" ;
	
	config.toolbar = 'Full';
 
	config.toolbar_Full =
	[
		{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
	        'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
		'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe', ] },
		'/',
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize','lineheight','WidgetTemplateMenu' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About','Youtube','ImageRotate','lightbox','ImageBrowser','ImagePaste', ] }
	];
	 
	config.toolbar_Basic =
	[
		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']
	];
};