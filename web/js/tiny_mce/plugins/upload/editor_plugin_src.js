
(function() {
	tinymce.create('tinymce.plugins.UploadPlugin', {
		init : function(ed, url) {
			ed.addCommand('mceUpload', function() {
				ed.windowManager.open({
					file : document.getElementById("popup_id").value + '/browse/',
					width : 620 + parseInt(ed.getLang('upload.delta_width', 0)),
					height : 420 + parseInt(ed.getLang('upload.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register upload button
			ed.addButton('upload', {
				title : 'Attach a file to article',
				cmd : 'mceUpload',
				image : url + '/img/upload.gif'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('upload', n.nodeName == 'IMG');
			});
		},

		getInfo : function() {
			return {
				longname : 'Fileupload and browse plugin',
				author : 'Hannes Magnusson',
				authorurl : 'http://linpro.no',
				version : "0.9"
			};
		}
	});

	tinymce.PluginManager.add('upload', tinymce.plugins.UploadPlugin);
})();

