(function(){var n="arklink";CKEDITOR.plugins.add("document",{lang:"en,de,es,fi,fr,he,it,nl,ru,zh-cn",icons:"document",hidpi:!1,init:function(t){var r={href:t.config.base+"index.php?option=com_media&view=images&tmpl=component&e_name={EDITOR}&asset=com_content&arkmedia=1&author=",exec:function(n){var f=CKEDITOR.plugins.link,i=null,e,o,r,t,u;this.href=this.href.replace("{EDITOR}",n.name);e=this;o=function(n){n.cancel()};n.editable().once("blur",o,null,null,-100);if(jQuery.fn.squeezeBox?jQuery.fn.squeezeBox({handler:"iframe",size:{x:800,y:500},url:this.href},!0):SqueezeBox.open(null,{handler:"iframe",size:{x:800,y:500},url:this.href}),r=n.getSelection(),i=f.getSelectedLink(n)&&f.getSelectedLink(n).hasAttribute("href")&&f.getSelectedLink(n)||r&&(r.getSelectedElement()&&r.getSelectedElement().getOuterHtml()||r.getSelectedText())){if(t=function(){var i=n.getSelection();CKEDITOR.env.ie&&i&&(n._bookmarks=i.createBookmarks2());CKEDITOR.tools.setTimeout(function(){typeof SqueezeBox=="object"?SqueezeBox.removeEvent("onOpen",t):jQuery(ARK.squeezeBox).off("onOpen",t)},0,e)},u=function(){var t=CKEDITOR.document.getById("sbox-window").findOne("#sbox-content iframe");t.on("load",function(){var f=t.getFrameDocument(),r=f.getWindow().$.MediaManager;r.populateElementValues||(r.populateElementValues=function(t){var i,r;this.html=t.getHtml();i=(t.data("cke-saved-href")||t.getAttribute("href")).replace(n.config.base,"");this.fields.url.value=i;this.fields.rel.value=t.getAttribute("rel");this.fields.title.value=t.getAttribute("title");this.fields.text.value=t.getText();target=t.getAttribute("target")||"";this.fields.target.value=target;r=this.fields.target.options[this.fields.target.selectedIndex].text;f.findOne("#f_target_chzn a.chzn-single span").setText(r)});typeof i=="string"&&(i=CKEDITOR.dom.element.createFromHtml('<a href="" rel="" title="">'+i+"<\/a>"));r.populateElementValues(i,n);CKEDITOR.tools.setTimeout(function(){if(typeof SqueezeBox=="object")SqueezeBox.removeEvent("onOpen",u);else jQuery(ARK.squeezeBox).on("onOpen",u)},0,e)})},CKEDITOR.env.ie)if(typeof SqueezeBox=="object")SqueezeBox.addEvent("onOpen",t);else jQuery(ARK.squeezeBox).on("onOpen",t);if(typeof SqueezeBox=="object")SqueezeBox.addEvent("onOpen",u);else jQuery(ARK.squeezeBox).on("onOpen",t)}}},u=t.addCommand(n,r),i;u.modes={wysiwyg:1};i=/(?:[^\/])\/(([^\u0000-\u007F]|[\w-])+\.(?!(?:htm|php|asp|jsp|cfm|pl|cgi))\w+)$/;t.on("doubleclick",function(r){var u=CKEDITOR.plugins.link.getSelectedLink(t)||r.data.element;if(!u.isReadOnly())if(u.is("a")){if(u.getAttribute("name")||!u.getAttribute("href")&&u.getChildCount())u.getAttribute("name")&&(!u.getAttribute("href")||u.getChildCount())&&(r.data.dialog="anchor");else if(i.test(u.getAttribute("href")))return setTimeout(function(){t.execCommand(n)},0),!1}else CKEDITOR.plugins.link.tryRestoreFakeAnchor(t,u)&&(r.data.dialog="anchor")},null,null,5);t.addMenuItems&&t.addMenuItems({document:{label:t.lang.document.menu,command:n,group:"link",order:1}});t.ui.addButton&&t.ui.addButton("Document",{label:t.lang.document.toolbar,command:n});t.contextMenu&&t.contextMenu.addListener(function(n){var r,u;return!n||n.isReadOnly()?null:(r=CKEDITOR.plugins.link.tryRestoreFakeAnchor(t,n),!r&&!(r=CKEDITOR.plugins.link.getSelectedLink(t)))?null:(u={},r.getAttribute("href")&&r.getChildCount()&&i.test(r.getAttribute("href"))&&(u={document:CKEDITOR.TRISTATE_OFF}),u)})}})})()