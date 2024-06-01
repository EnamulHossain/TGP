NWS.initNamespace("NWS.Ajax",function(){var _={makeBaseXhr:function(method,url,callback){var xhr=new XMLHttpRequest;xhr.open(method,url,true);xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");xhr.addEventListener("load",function(evt){if(evt.target.status===401){var response=evt.target.responseType==="json"?evt.target.response:JSON.parse(evt.target.responseText);window.location=response.LoginUrl}},false);if(callback instanceof Callback)callback.ListenTo(xhr);return xhr},makeBaseXhrSync:function(method,url){var xhr=new XMLHttpRequest;xhr.open(method,url,false);xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");return xhr},isObject:function(value){return typeof value!=="undefined"&&value!==null&&value.constructor===Object},appendJsonToFormData:function(formData,jsonData,previousKey){if(_.isObject(jsonData)){Object.keys(jsonData).forEach(function(key){var v=jsonData[key];if(_.isObject(v))return _.appendJsonToFormData(formData,v,key);if(previousKey)key=[previousKey,".",key].join("");if(Array.isArray(v)&&v.every(_.isObject))return v.forEach(function(val,i){_.appendJsonToFormData(formData,val,[key,"[",i,"]"].join(""))});if(Array.isArray(v))v.forEach(function(val){formData.append([key,"[]"].join(""),val)});else if(v instanceof FileList&&v.length===1)formData.append(key,v[0],v[0].name);else if(v instanceof File)formData.append(key,v,v.name);else formData.append(key,v)})}}};var _callbackQueue={queue:[],Add:function(xhr,data,callback){if(!(xhr instanceof XMLHttpRequest))return;if(!(callback instanceof Callback)){xhr.send(data);return}let newCall={ajax:xhr,ajaxData:data,postOp:callback};if(callback.CanSkip){let existing=_callbackQueue.queue.findIndex((c,i)=>i>0&&c.postOp.Name===callback.Name&&c.postOp.CanSkip);if(existing>0){NWS.Logging.Log("Cancelling existing callback: "+callback.Name);_callbackQueue.queue[existing].postOp.Cancel(_callbackQueue.queue[existing].ajax);NWS.Logging.Log("Replacing existing callback: "+callback.Name);_callbackQueue.queue[existing]=newCall;return}}_callbackQueue.queue.push(newCall);NWS.Logging.Log("Queued new callback: "+newCall.postOp.Name);if(_callbackQueue.queue.length===1)_callbackQueue.Execute()},Execute:function(){if(_callbackQueue.queue.length===0)return;let ajax=_callbackQueue.queue[0].ajax,data=_callbackQueue.queue[0].ajaxData;NWS.Logging.Log("Executing ajax call with callback: "+_callbackQueue.queue[0].postOp.Name);ajax.send(data)},SkipCallback:function(){if(_callbackQueue.queue.length){let curCall=_callbackQueue.queue[0],skip=_callbackQueue.queue.some((c,i)=>i>0&&c.postOp.Name===curCall.postOp.Name&&c.postOp.CanSkip);if(skip)NWS.Logging.Log("Skipping callback: "+curCall.postOp.Name);return skip}return false},Complete:function(){let completedCall=_callbackQueue.queue.shift();NWS.Logging.Log("Completed callback: "+completedCall.postOp.Name);if(_callbackQueue.queue.length)_callbackQueue.Execute()}};var _commonHandlers={loadHandler:function(evt){let xhr=evt.target;if(xhr.status>=400||_callbackQueue.SkipCallback())return;xhr.Callback.Load(xhr)},loadendHandler:function(evt){let xhr=evt.target;if(xhr.status===401||_callbackQueue.SkipCallback()){_callbackQueue.Complete();return}if(xhr.Callback.LoadEnd&&xhr.status<400){xhr.Callback.LoadEnd(xhr);_callbackQueue.Complete();return}if(xhr.Callback.LoadError&&xhr.status>=400)xhr.Callback.LoadError(xhr);_callbackQueue.Complete()},loadendDefault:function(evt){_callbackQueue.Complete()}};function Callback(onLoad,onLoadEnd=null,onLoadError=null,name=null,canSkip=true){this.Load=onLoad;this.LoadEnd=onLoadEnd;this.LoadError=onLoadError;this.Name=name;this.CanSkip=name!==null&&canSkip}Callback.prototype.Cancel=function(xhr){if(!(xhr instanceof XMLHttpRequest))return;if(this.Load)xhr.removeEventListener("load",_commonHandlers.loadHandler,false);if(this.LoadEnd||this.LoadError)xhr.removeEventListener("loadend",_commonHandlers.loadendHandler,false);else xhr.removeEventListener("loadend",_commonHandlers.loadendDefault,false)};Callback.prototype.ListenTo=function(xhr){if(!xhr instanceof XMLHttpRequest)return;xhr.Callback=this;if(this.Load)xhr.addEventListener("load",_commonHandlers.loadHandler,false);if(this.LoadEnd||this.LoadError)xhr.addEventListener("loadend",_commonHandlers.loadendHandler,false);else xhr.addEventListener("loadend",_commonHandlers.loadendDefault,false);xhr.addEventListener("error",this.LoadError||function(){console.error("An unknown network error occurred")},false)};return{Callback:Callback,QueuedCallback:function(name,onLoad,canSkip=true){return new Callback(onLoad,null,null,name,canSkip)},CommonCallbacks:{DownloadFile:function(ajaxResult){if(!(ajaxResult.response instanceof Blob)){NWS.Logging.Warn("Invalid response for file download");return}let headerData=ajaxResult.getResponseHeader("Content-Disposition").split("filename=").reverse(),fileName=headerData.length?headerData[0]:"";let a=document.createElement("a");a.style="display:none";a.href=URL.createObjectURL(ajaxResult.response);if(fileName!=="")a.download=fileName;document.body.appendChild(a);a.click();URL.revokeObjectURL(a.href);a.remove()}},Get:function(url,responseType,callback){var ajax=_.makeBaseXhr("GET",url,callback);ajax.responseType=responseType;_callbackQueue.Add(ajax,null,callback)},Post:function(url,jsonObj,responseType,callback){var ajax=_.makeBaseXhr("POST",url,callback),formData=new FormData;_.appendJsonToFormData(formData,jsonObj,null);ajax.responseType=responseType;_callbackQueue.Add(ajax,formData,callback)},PostSync:function(url,jsonObj){var ajax=_.makeBaseXhrSync("POST",url),formData=new FormData;_.appendJsonToFormData(formData,jsonObj,null);ajax.send(formData);var response={};if(ajax.responseText)response=JSON.parse(ajax.response);if(ajax.status===401)window.location=response.LoginUrl;else if(ajax.status<400)return response;else if(ajax.status>=400)console.error(response)},QueueCheck:function(){NWS.Logging.Log(_callbackQueue.queue)},Form:{PostToNewWindow:function(action,target,enctype="text/plain",args={}){var newWindow=window.open("",target),form=document.createElement("form");form.setAttribute("method","POST");form.setAttribute("enctype",enctype);form.setAttribute("action",action);form.setAttribute("target",target);form.addEventListener("formdata",function(e){_.appendJsonToFormData(e.formData,args,null)},false);document.body.appendChild(form);form.submit();form.remove()}},UrlToken:{Encode:function(str){var base64=btoa(unescape(encodeURIComponent(str))),padChars=base64.match(/=/g);return base64.replace(/=/g,"")+(padChars===null?0:padChars.length)},Decode:function(token){if(token.length===0||token==="bnVsbA2")return null;var padChars=token.slice(-1);token=token.slice(0,-1);token=token.replace(/-/g,'+');token=token.replace(/_/g,'/');for(var i=0;i<padChars;i++)token+="=";return decodeURIComponent(escape(atob(token)))}}}})