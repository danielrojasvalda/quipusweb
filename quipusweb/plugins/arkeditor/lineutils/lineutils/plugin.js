"use strict";
/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
(function(){function r(n,t){CKEDITOR.tools.extend(this,{editor:n,editable:n.editable(),doc:n.document,win:n.window},t,!0);this.inline=this.editable.isInline();this.inline||(this.frame=this.win.getFrame());this.target=this[this.inline?"editable":"doc"]}function u(n,t){CKEDITOR.tools.extend(this,t,{editor:n},!0)}function e(n,t){var i=n.editable();CKEDITOR.tools.extend(this,{editor:n,editable:i,inline:i.isInline(),doc:n.document,win:n.window,container:CKEDITOR.document.getBody(),winTop:CKEDITOR.document.getWindow()},t,!0);this.hidden={};this.visible={};this.inline||(this.frame=this.win.getFrame());this.queryViewport();var r=CKEDITOR.tools.bind(this.queryViewport,this),u=CKEDITOR.tools.bind(this.hideVisible,this),e=CKEDITOR.tools.bind(this.removeAll,this);i.attachListener(this.winTop,"resize",r);i.attachListener(this.winTop,"scroll",r);i.attachListener(this.winTop,"resize",u);i.attachListener(this.win,"scroll",u);i.attachListener(this.inline?i:this.frame,"mouseout",function(n){var t=n.data.$.clientX,i=n.data.$.clientY;this.queryViewport();(t<=this.rect.left||t>=this.rect.right||i<=this.rect.top||i>=this.rect.bottom)&&this.hideVisible();(t<=0||t>=this.winTopPane.width||i<=0||i>=this.winTopPane.height)&&this.hideVisible()},this);i.attachListener(n,"resize",r);i.attachListener(n,"mode",e);n.on("destroy",e);this.lineTpl=new CKEDITOR.template(c).output({lineStyle:CKEDITOR.tools.writeCssText(CKEDITOR.tools.extend({},h,this.lineStyle,!0)),tipLeftStyle:CKEDITOR.tools.writeCssText(CKEDITOR.tools.extend({},f,{left:"0px","border-left-color":"red","border-width":"6px 0 6px 6px"},this.tipCss,this.tipLeftStyle,!0)),tipRightStyle:CKEDITOR.tools.writeCssText(CKEDITOR.tools.extend({},f,{right:"0px","border-right-color":"red","border-width":"6px 6px 6px 0"},this.tipCss,this.tipRightStyle,!0))})}function t(n,t){return n&t}function s(n){return n&&n.type==CKEDITOR.NODE_ELEMENT}function l(n){return!!(i[n.getComputedStyle("float")]||i[n.getAttribute("align")])}function a(n){return!!o[n.getComputedStyle("position")]}function v(n){return s(n)&&n.getAttribute("contenteditable")=="true"}function n(n){return s(n)&&!l(n)&&!a(n)}var i,o;CKEDITOR.plugins.add("lineutils");CKEDITOR.LINEUTILS_BEFORE=1;CKEDITOR.LINEUTILS_AFTER=2;CKEDITOR.LINEUTILS_INSIDE=4;r.prototype={start:function(n){var r=this,e=this.editor,s=this.doc,u,f,t,i,o=CKEDITOR.tools.eventsBuffer(50,function(){e.readOnly||e.mode!="wysiwyg"||(r.relations={},(f=s.$.elementFromPoint(t,i))&&f.nodeType)&&(u=new CKEDITOR.dom.element(f),r.traverseSearch(u),isNaN(t+i)||r.pixelSearch(u,t,i),n&&n(r.relations,t,i))});this.listener=this.editable.attachListener(this.target,"mousemove",function(n){t=n.data.$.clientX;i=n.data.$.clientY;o.input()});this.editable.attachListener(this.inline?this.editable:this.frame,"mouseout",function(){o.reset()})},stop:function(){this.listener&&this.listener.removeListener()},getRange:function(){var n={};return n[CKEDITOR.LINEUTILS_BEFORE]=CKEDITOR.POSITION_BEFORE_START,n[CKEDITOR.LINEUTILS_AFTER]=CKEDITOR.POSITION_AFTER_END,n[CKEDITOR.LINEUTILS_INSIDE]=CKEDITOR.POSITION_AFTER_START,function(t){var i=this.editor.createRange();return i.moveToPosition(this.relations[t.uid].element,n[t.type]),i}}(),store:function(){function i(n,t,i){var r=n.getUniqueId();r in i?i[r].type|=t:i[r]={element:n,type:t}}return function(r,u){var f;t(u,CKEDITOR.LINEUTILS_AFTER)&&n(f=r.getNext())&&f.isVisible()&&(i(f,CKEDITOR.LINEUTILS_BEFORE,this.relations),u^=CKEDITOR.LINEUTILS_AFTER);t(u,CKEDITOR.LINEUTILS_INSIDE)&&n(f=r.getFirst())&&f.isVisible()&&(i(f,CKEDITOR.LINEUTILS_BEFORE,this.relations),u^=CKEDITOR.LINEUTILS_INSIDE);i(r,u,this.relations)}}(),traverseSearch:function(t){var r,u,i;do if(i=t.$["data-cke-expando"],!i||!(i in this.relations)){if(t.equals(this.editable))return;if(n(t))for(r in this.lookups)(u=this.lookups[r](t))&&this.store(t,u)}while(!v(t)&&(t=t.getParent()))},pixelSearch:function(){function t(t,r,u,f,e){for(var s=u,h=0,o;e(s);){if(s+=f,++h==25)return;if(o=this.doc.$.elementFromPoint(r,s),o){if(o==t){h=0;continue}else if(!i(t,o))continue}else continue;if(h=0,n(o=new CKEDITOR.dom.element(o)))return o}}var i=CKEDITOR.env.ie||CKEDITOR.env.webkit?function(n,t){return n.contains(t)}:function(n,t){return!!(n.compareDocumentPosition(t)&16)};return function(i,r,u){var o=this.win.getViewPaneSize().height,f=t.call(this,i.$,r,u,-1,function(n){return n>0}),e=t.call(this,i.$,r,u,1,function(n){return n<o});if(f)for(this.traverseSearch(f);!f.getParent().equals(i);)f=f.getParent();if(e)for(this.traverseSearch(e);!e.getParent().equals(i);)e=e.getParent();while(f||e){if(f&&(f=f.getNext(n)),!f||f.equals(e))break;if(this.traverseSearch(f),e&&(e=e.getPrevious(n)),!e||e.equals(f))break;this.traverseSearch(e)}}}(),greedySearch:function(){this.relations={};for(var u=this.editable.getElementsByTag("*"),f=0,t,i,r;t=u.getItem(f++);)if(!t.equals(this.editable)&&t.type==CKEDITOR.NODE_ELEMENT&&(t.hasAttribute("contenteditable")||!t.isReadOnly())&&n(t)&&t.isVisible())for(r in this.lookups)(i=this.lookups[r](t))&&this.store(t,i);return this.relations}};u.prototype={locate:function(){function i(t,i){var r=t.element[i===CKEDITOR.LINEUTILS_BEFORE?"getPrevious":"getNext"]();return r&&n(r)?(t.siblingRect=r.getClientRect(),i==CKEDITOR.LINEUTILS_BEFORE?(t.siblingRect.bottom+t.elementRect.top)/2:(t.elementRect.bottom+t.siblingRect.top)/2):i==CKEDITOR.LINEUTILS_BEFORE?t.elementRect.top:t.elementRect.bottom}return function(n){var r,u;this.locations={};for(u in n)r=n[u],r.elementRect=r.element.getClientRect(),t(r.type,CKEDITOR.LINEUTILS_BEFORE)&&this.store(u,CKEDITOR.LINEUTILS_BEFORE,i(r,CKEDITOR.LINEUTILS_BEFORE)),t(r.type,CKEDITOR.LINEUTILS_AFTER)&&this.store(u,CKEDITOR.LINEUTILS_AFTER,i(r,CKEDITOR.LINEUTILS_AFTER)),t(r.type,CKEDITOR.LINEUTILS_INSIDE)&&this.store(u,CKEDITOR.LINEUTILS_INSIDE,(r.elementRect.top+r.elementRect.bottom)/2);return this.locations}}(),sort:function(){function u(n,t,i){return Math.abs(n-r[t][i])}var r,n,i,t;return function(f,e){var o,s;r=this.locations;n=[];for(o in r)for(s in r[o])if(i=u(f,o,s),n.length){for(t=0;t<n.length;t++)if(i<n[t].dist){n.splice(t,0,{uid:+o,type:s,dist:i});break}t==n.length&&n.push({uid:+o,type:s,dist:i})}else n.push({uid:+o,type:s,dist:i});return typeof e!="undefined"?n.slice(0,e):n}}(),store:function(n,t,i){this.locations[n]||(this.locations[n]={});this.locations[n][t]=i}};var f={display:"block",width:"0px",height:"0px","border-color":"transparent","border-style":"solid",position:"absolute",top:"-6px"},h={height:"0px","border-top":"1px dashed red",position:"absolute","z-index":9999},c='<div data-cke-lineutils-line="1" class="cke_reset_all" style="{lineStyle}"><span style="{tipLeftStyle}">&nbsp;<\/span><span style="{tipRightStyle}">&nbsp;<\/span><\/div>';e.prototype={removeAll:function(){for(var n in this.hidden)this.hidden[n].remove(),delete this.hidden[n];for(n in this.visible)this.visible[n].remove(),delete this.visible[n]},hideLine:function(n){var t=n.getUniqueId();n.hide();this.hidden[t]=n;delete this.visible[t]},showLine:function(n){var t=n.getUniqueId();n.show();this.visible[t]=n;delete this.hidden[t]},hideVisible:function(){for(var n in this.visible)this.hideLine(this.visible[n])},placeLine:function(n,t){var u,i,r;if(u=this.getStyle(n.uid,n.type)){for(r in this.visible)if(this.visible[r].getCustomData("hash")!==this.hash){i=this.visible[r];break}if(!i)for(r in this.hidden)if(this.hidden[r].getCustomData("hash")!==this.hash){this.showLine(i=this.hidden[r]);break}i||this.showLine(i=this.addLine());i.setCustomData("hash",this.hash);this.visible[i.getUniqueId()]=i;i.setStyles(u);t&&t(i)}},getStyle:function(n,t){var r=this.relations[n],f=this.locations[n][t],i={},e,u;if(i.width=r.siblingRect?Math.max(r.siblingRect.width,r.elementRect.width):r.elementRect.width,i.top=this.inline?f+this.winTopScroll.y-this.rect.relativeY:this.rect.top+this.winTopScroll.y+f,i.top-this.winTopScroll.y<this.rect.top||i.top-this.winTopScroll.y>this.rect.bottom)return!1;this.inline?i.left=r.elementRect.left-this.rect.relativeX:(r.elementRect.left>0?i.left=this.rect.left+r.elementRect.left:(i.width+=r.elementRect.left,i.left=this.rect.left),(e=i.left+i.width-(this.rect.left+this.winPane.width))>0&&(i.width-=e));i.left+=this.winTopScroll.x;for(u in i)i[u]=CKEDITOR.tools.cssLength(i[u]);return i},addLine:function(){var n=CKEDITOR.dom.element.createFromHtml(this.lineTpl);return n.appendTo(this.container),n},prepare:function(n,t){this.relations=n;this.locations=t;this.hash=Math.random()},cleanup:function(){var n;for(var t in this.visible)n=this.visible[t],n.getCustomData("hash")!==this.hash&&this.hideLine(n)},queryViewport:function(){this.winPane=this.win.getViewPaneSize();this.winTopScroll=this.winTop.getScrollPosition();this.winTopPane=this.winTop.getViewPaneSize();this.rect=this.getClientRect(this.inline?this.editable:this.frame)},getClientRect:function(n){var t=n.getClientRect(),i=this.container.getDocumentPosition(),r=this.container.getComputedStyle("position");return t.relativeX=t.relativeY=0,r!="static"&&(t.relativeY=i.y,t.relativeX=i.x,t.top-=t.relativeY,t.bottom-=t.relativeY,t.left-=t.relativeX,t.right-=t.relativeX),t}};i={left:1,right:1,center:1};o={absolute:1,fixed:1};CKEDITOR.plugins.lineutils={finder:r,locator:u,liner:e}})()