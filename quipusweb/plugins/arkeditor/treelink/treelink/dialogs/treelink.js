CKEDITOR.dialog.add("treelink",function(n){var l=/^(_(?:self|top|parent|blank))$/,o="notSet",w=n.config.baseHref,s=function(){var i=this.getDialog(),r=i.getContentElement("target","popupFeatures"),t=i.getContentElement("target","linkTargetName"),u=i.getContentElement("target","joomlamodeltext"),f=i.getContentElement("target","template");if(value=this.getValue(),JoomlaModelFeatures=i.getContentElement("target","JoomlaModelFeatures"),r&&t){r=r.getElement();r.hide();t.setValue("");switch(value){case"frame":t.setLabel(n.lang.treelink.targetFrameName);t.getElement().show();u.getElement().show();f.getElement().show();JoomlaModelFeatures.getElement().show();break;case"popup":JoomlaModelFeatures.getElement().hide();r.show();t.setLabel(n.lang.treelink.targetPopupName);t.getElement().show();u.getElement().hide();f.getElement().hide();break;default:t.setValue(value);t.getElement().hide();u.getElement().hide();f.getElement().hide();JoomlaModelFeatures.getElement().hide()}}},a=/\s*window.open\(\s*this\.href\s*,\s*(?:'([^']*)'|null)\s*,\s*'([^']*)'\s*\)\s*;\s*return\s*false;*\s*/,v=/(?:^|,)([^=]+)=(\d+|yes|no)/gi,y=/\{handler:\s*'iframe'\s*,\s*size:\s*\{x:\s*(\d+?)\s*,\s*y:\s*(\d+?)\}\}/i,p=function(n,t){var w=t&&(t.data("cke-saved-href")||t.getAttribute("href"))||"",d=n.document,i={},e,s,o,u,b,h,c,p,f,k,r;if(t){if(e=t.getAttribute("target"),i.target={},i.adv={},e)b=e.match(l),b?i.target.type=i.target.name=e:(i.target.type="frame",i.target.name=e);else if(s=t.data("cke-pa-onclick")||t.getAttribute("onclick"),o=s&&s.match(a),o)for(i.target.type="popup",i.target.name=o[1];u=v.exec(o[2]);)u[2]=="yes"||u[2]=="1"?i.target[u[1]]=!0:isFinite(u[2])&&(i.target[u[1]]=u[2]);h=t.getAttribute("rel");i.target.rel={};i.target.modalchecked=!0;i.target.template=!0;i.target.type=="frame"&&(i.target.modalchecked=!1,i.target.template=!0);h&&(c=t.getAttribute("class"),p=c&&c.match(/(?:^|\s)([\w\d]*)$/),p&&(i.target.rel.classname=p[1]),f=h.match(y),f?(f[1]&&(i.target.rel.width=f[1]),f[2]&&(i.target.rel.height=f[2]),i.target.modalchecked=!0):i.target.modalchecked=!1,i.target.template=w.indexOf("tmpl=component")!=-1?!1:!0,i.target.type="frame");k=this;r=function(n,r){var u=t.getAttribute(r);u!==null&&(i.adv[n]=u||"")};r("advId","id");r("advLangDir","dir");r("advAccessKey","accessKey");r("advName","name");r("advLangCode","lang");r("advTabIndex","tabindex");r("advTitle","title");r("advContentType","type");r("advCSSClasses","class");r("advCharset","charset");r("advStyles","style");document.ckadminForm.url.value=w.replace("&tmpl=component","");document.ckadminForm.text.value=t.getText();document.ckadminForm.title.value=t.getAttribute("title")}else(selection=n.getSelection())&&(document.ckadminForm.text.value=selection.getSelectedText());return this._.selectedElement=t,i},h=function(n,t){t[n]&&this.setValue(t[n][this.id]||"")},i=function(n){return h.call(this,"target",n)},u=function(n){return h.call(this,"adv",n)},c=function(n,t){t[n]||(t[n]={});t[n][this.id]=this.getValue()||""},r=function(n){return c.call(this,"target",n)},f=function(n){return c.call(this,"adv",n)},e=n.lang.common,t=n.lang.treelink;return{title:n.lang.link.title,minWidth:590,minHeight:330,contents:[{id:"info",label:t.info,title:t.info,required:!0,padding:0,elements:[{type:"html",html:'<div id="jtree-content_tree" style="height:330px;width:590px;overflow:auto;border:1px solid #CCC;"><\/div><div id="jtree-linkinfo-tree" style="margin-top:3px;padding:3px"><form name="ckadminForm" action="#" onSubmit="return false;"><table style="height:40px;width:100%;"> <tr><td>Text<\/td><td colspan="3"><input type="text" name="text" id="ctext" value="" size="30" style="border:1px solid #CCC;" /><\/td><td>Title<\/td><td colspan="3"><input type="text" name="title" id="ctitle"  value="" size="30" style="border:1px solid #CCC;"/><\/td><\/tr><tr><td>URL<\/td><td colspan="5"><input type="text" name="url" id="url"  value="" size="30" style="border:1px solid #CCC;"/><\/td><\/tr><\/table><\/form><\/div>'},{type:"text",id:"maketabenabled","default":"",hidden:!0}]},{id:"target",label:t.target,title:t.target,elements:[{type:"hbox",widths:["50%","50%"],children:[{type:"select",id:"linkTargetType",label:e.target,"default":"notSet",style:"width : 100%;",items:[[e.notSet,"notSet"],[t.targetFrame,"frame"],[t.targetPopup,"popup"],[e.targetNew,"_blank"],[e.targetTop,"_top"],[e.targetSelf,"_self"],[e.targetParent,"_parent"]],onChange:s,setup:function(n){n.target&&this.setValue(n.target.type);s.call(this)},commit:function(n){n.target||(n.target={});n.target.type=this.getValue()}},{type:"text",id:"linkTargetName",label:t.targetFrameName,"default":"",setup:function(n){n.target&&this.setValue(n.target.name)},commit:function(n){n.target||(n.target={});n.target.name=this.getValue().replace(/\W/gi,"")}}]},{type:"hbox",widths:["25%","25%","25%","25%"],id:"JoomlaModelFeatures",height:"40",children:[{type:"checkbox",id:"modelcheckbox",label:"Use Joomla Modal","default":"checked",onClick:function(){var n=this.getDialog(),t=n.getContentElement("target","relHeight"),i=n.getContentElement("target","relWidth"),r=n.getContentElement("target","relClass"),u=n.getContentElement("target","relModaltext");this.getValue()?(t.getElement().show(),i.getElement().show(),r.getElement().show(),u.getElement().show()):(t.getElement().hide(),i.getElement().hide(),r.getElement().hide(),u.getElement().hide())},setup:function(n){if(n.target){var t=this.getDialog(),i=t.getContentElement("target","relHeight"),r=t.getContentElement("target","relWidth"),u=t.getContentElement("target","relClass"),f=t.getContentElement("target","relModaltext");relTemplateCheck=t.getContentElement("target","relTemplate");n.target.modalchecked?(i.getElement().show(),r.getElement().show(),u.getElement().show(),f.getElement().show(),relTemplateCheck.getElement().show()):(i.getElement().hide(),r.getElement().hide(),u.getElement().hide(),f.getElement().hide(),relTemplateCheck.getElement().show());this.setValue(n.target.modalchecked)}},commit:function(n){n.target||(n.target={});n.target.modalchecked=this.getValue()}},{type:"text",id:"relClass",label:"Classname","default":"modal",setup:function(n){n.target&&n.target.rel&&this.setValue(n.target.rel.classname||"modal")},commit:function(n){n.target.rel||(n.target.rel={});n.target.rel.classname=this.getValue()}},{type:"text",id:"relHeight",label:"Height","default":"550",setup:function(n){n.target&&n.target.rel&&this.setValue(n.target.rel.height||550)},commit:function(n){n.target.rel||(n.target.rel={});n.target.rel.height=this.getValue().replace(/\W/gi,"")}},{type:"text",id:"relWidth",label:"Width","default":"450",setup:function(n){n.target&&n.target&&this.setValue(n.target.rel.width||450)},commit:function(n){n.target.rel||(n.target.rel={});n.target.rel.width=this.getValue().replace(/\W/gi,"")}}]},{type:"vbox",id:"template",children:[{type:"checkbox",id:"relTemplate",label:"Include Template","default":"checked",setup:function(n){n.target&&this.setValue(n.target.template)},commit:function(n){n.target||(n.target={});n.target.template=!this.getValue()}}]},{type:"vbox",id:"relModaltext",children:[{id:"joomlamodeltext",type:"html",html:'<div style="position: relative; height: 207px;"><span style="position: absolute; bottom:0px; font-style:italic;"><span style="font-weight:bold;">Please note<\/span>: this functionality requires Joomla\'s Modal library to be loaded in order for this functionality to work. <br/>Please <a href="http://www.joomlackeditor.com/component/jdownloads/viewdownload/17-joomla-plugins/51-jck-modal-plugin" target="_blank" style="color: blue; text-decoration: underline; cursor: pointer;">click here<\/a> to view our solution.<\/span><\/div>'}]},{type:"vbox",width:260,align:"center",padding:2,id:"popupFeatures",children:[{type:"fieldset",label:t.popupFeatures,children:[{type:"hbox",children:[{type:"checkbox",id:"resizable",label:t.popupResizable,setup:i,commit:r},{type:"checkbox",id:"status",label:t.popupStatusBar,setup:i,commit:r}]},{type:"hbox",children:[{type:"checkbox",id:"location",label:t.popupLocationBar,setup:i,commit:r},{type:"checkbox",id:"toolbar",label:t.popupToolbar,setup:i,commit:r}]},{type:"hbox",children:[{type:"checkbox",id:"menubar",label:t.popupMenuBar,setup:i,commit:r},{type:"checkbox",id:"fullscreen",label:t.popupFullScreen,setup:i,commit:r}]},{type:"hbox",children:[{type:"checkbox",id:"scrollbars",label:t.popupScrollBars,setup:i,commit:r},{type:"checkbox",id:"dependent",label:t.popupDependent,setup:i,commit:r}]},{type:"hbox",children:[{type:"text",widths:["30%","70%"],labelLayout:"horizontal",label:t.popupWidth,id:"width",setup:i,commit:r},{type:"text",labelLayout:"horizontal",widths:["55%","45%"],label:t.popupLeft,id:"left",setup:i,commit:r}]},{type:"hbox",children:[{type:"text",labelLayout:"horizontal",widths:["30%","70%"],label:t.popupHeight,id:"height",setup:i,commit:r},{type:"text",labelLayout:"horizontal",label:t.popupTop,widths:["55%","45%"],id:"top",setup:i,commit:r}]}]}]}]},{id:"advanced",label:t.advanced,title:t.advanced,elements:[{type:"vbox",padding:1,children:[{type:"hbox",widths:["45%","35%","20%"],children:[{type:"text",id:"advId",label:t.id,setup:u,commit:f},{type:"select",id:"advLangDir",label:t.langDir,"default":"",style:"width:110px",items:[[e.notSet,""],[t.langDirLTR,"ltr"],[t.langDirRTL,"rtl"]],setup:u,commit:f},{type:"text",id:"advAccessKey",width:"80px",label:t.acccessKey,maxLength:1,setup:u,commit:f}]},{type:"hbox",widths:["45%","35%","20%"],children:[{type:"text",label:t.name,id:"advName",setup:u,commit:f},{type:"text",label:t.langCode,id:"advLangCode",width:"110px","default":"",setup:u,commit:f},{type:"text",label:t.tabIndex,id:"advTabIndex",width:"80px",maxLength:5,setup:u,commit:f}]}]},{type:"vbox",padding:1,children:[{type:"vbox",children:[{type:"text",label:t.advisoryContentType,"default":"",id:"advContentType",setup:u,commit:f}]},{type:"hbox",widths:["45%","55%"],children:[{type:"text",label:t.cssClasses,"default":"",id:"advCSSClasses",setup:u,commit:f},{type:"text",label:t.charset,"default":"",id:"advCharset",setup:u,commit:f}]},{type:"hbox",children:[{type:"text",label:t.styles,"default":"",id:"advStyles",setup:u,commit:f}]}]}]}],onLoad:function(){var r=this,n=this.getParentEditor();n.config.treelinkShowAdvancedTab||this.hidePage("advanced");n.config.treelinkShowTargetTab||this.hidePage("target");var i=n.config.base,t=n.config.baseHref+"media/editors/arkeditor/";jQuery("#jtree-content_tree").jtree({mode:"files",grid:!0,theme:t+"images/jtree.gif",loader:{icon:t+"images/jtree_loader.gif",text:"Loading...",color:"#a0a0a0"},onSelect:function(t){if(t.data.url&&t.data.selectable=="true"){document.ckadminForm.url.value=t.data.url;var i=n.getSelection();i&&n.plugins.link.select==""&&document.ckadminForm.text.value&&i.getSelectedText()==document.ckadminForm.text.value||document.ckadminForm.text.value&&document.ckadminForm.text.value!=n.plugins.link.select||(document.ckadminForm.text.value=t.text);n.plugins.link.select=t.text;document.ckadminForm.title.value=t.text}}},{text:"Links",open:!0}).root.load(i+"index.php?option=com_ajax&plugin=arktreelink&format=json&action=initialize")},onShow:function(){var t=this.getParentEditor(),i=t.getSelection(),n=null,r=CKEDITOR.plugins.link,u;(n=r.getSelectedLink(t))&&n.hasAttribute("href")?(i.selectElement(n),u=this.getContentElement("target","linkTargetType")):n=null;document.ckadminForm.url.value="";document.ckadminForm.text.value="";document.ckadminForm.title.value="";t.plugins.link.select="";this.setupContent(p.apply(this,[t,n]))},onOk:function(){var a=this.getParentEditor(),h=document.ckadminForm.url.value||"",v=document.ckadminForm.text.value,d=document.ckadminForm.title.value,t={href:h,title:d},n={},u=[],s,i,b,k,f,y,p,r,l;if(this.commitContent(n),n.target)if(n.target.type=="popup"){var w=["window.open(this.href, '",n.target.name||"","', '"],e=["resizable","status","location","toolbar","menubar","fullscreen","scrollbars","dependent"],g=e.length,c=function(t){n.target[t]&&e.push(t+"="+n.target[t])};for(s=0;s<g;s++)e[s]=e[s]+(n.target[e[s]]?"=yes":"=no");c("width");c("left");c("height");c("top");w.push(e.join(","),"'); return false;");t["data-cke-pa-onclick"]=w.join("");u.push("target");u.push("rel")}else n.target.type!=o&&n.target.name?(t.target=n.target.name,u.push("rel")):u.push("target"),u.push("data-cke-pa-onclick","onclick");n.adv&&(i=function(i,r){var f=n.adv[i];f?t[r]=f:r!="class"&&u.push(r)},this._.selectedElement&&i("advId","id"),i("advLangDir","dir"),i("advAccessKey","accessKey"),i("advName","name"),i("advLangCode","lang"),i("advTabIndex","tabindex"),i("advContentType","type"),i("advCSSClasses","class"),i("advCharset","charset"),i("advStyles","style"));n.target&&n.target.type=="frame"&&n.target.modalchecked?(b="{handler: 'iframe' , size: {x:"+n.target.rel.width+", y:"+n.target.rel.height+"}}",t.rel=b,t["class"]=t["class"]?t["class"]+" "+n.target.rel.classname:n.target.rel.classname,t.href&&n.target.template&&(t.href+="&tmpl=component",h=t.href)):(u.push("rel"),t.href=t.href.replace("&tmpl=component",""),h=t.href);this._.selectedElement?(r=this._.selectedElement,v?r.setText(v):r.setHtml(r.getHtml()),r.data("cke-saved-href",h),r.setAttributes(t),r.removeAttributes(u),n.target&&(n.target.type!="frame"||n.target.type=="frame"&&!n.target.modalchecked)&&(l=n.target.rel.classname,l&&r.hasClass(l)&&r.removeClass(l)),n.target.type!=o&&n.target.name?t.target=n.target.name:delete this._.selectedElement):(k=a.getSelection(),f=k.getRanges(!0),f.length==1&&f[0].collapsed&&(y=new CKEDITOR.dom.text(v,a.document),f[0].insertNode(y),f[0].selectNodeContents(y)),p=new CKEDITOR.style({element:"a",attributes:t}),p.type=CKEDITOR.STYLE_INLINE,p.applyToRange(f[0],a),f[0].select())}}})