/* * 
* Module loader for Contact Us form support.  The Module Loader pattern provides a standardized approach to loading scripts
* for supporting client-side features. 
* @namespace NWS.Promero.DataModules.SubscriptionManagement.Subscriber.DataList.ModuleLoader
* @property {object}	_ 		- Private accessor class
* @method {void}		init 	- initialation method required for Module Loader pattern.  Automatically called by NWS.Modules.InitModule
*/
NWS.initNamespace("NWS.Promero.DataModules.SubscriptionManagement.Subscriber.DataEditor.ModuleLoader", function () {
    var _ = {
		/** 
		* Returns script object corresponding to supplied key.  Returns user-supplied override, if exists. Otherwise, returns matching value from defaultScripts array.
		* @param {string} key Identifies requested script Object
		* @return {Object} script Script object whose key property matches the supplied key parameter
		*/ 
		getScriptByKey: function(key) {			
			var scriptOverrides = _.params.scriptOverrides || [];
			return NWS.CommonScripts.ModuleManager.GetScriptByKey(key, _.defaultScripts, scriptOverrides);			
		}
		/** 
		* Local configuration data initialized in the module init
		* @property {Object} params
		*/
        ,params: null
		/** 
		* Array of script objects to pre-load on the page 
		* @property: {Array.<key: String, path: String>} preloadScripts
		*/
		,preloadScripts: null
		/** 
		* Array of script objects to pre-load on the page 
		* @property: {Array.<key: String, path: String>} preloadScripts
		*/
		,requiredScripts: null 
		/** 
		* Array of script objects to pre-load on the page 
		* @property: {Array.<key: String, path: String>} preloadScripts
		*/
		,deferredScripts: null		
		/* 
			Default array of script objects to be loaded by the ModuleLoader  
			@property {Array.<key: String, path: Path>} defaultScripts
			@property {Object} defaultScripts[0]
			@property {String} defaultScripts[0].key - Unique (within array) key for script. Effort should be made to be consistent.  If the same script is used by multiple module loaders, use the same key. 
			@property {String} defaultScripts[0].path - rRelative path to the script to load.  Assume path is resolving from the display side						
		*/
		, defaultScripts:[
				{ key: "PromeroDataEditorSupportJS", path: "/CommonScripts/Promero/DataModules.SubscriptionManagement/DataEditorSupport.js" }
			]
		/**
		* Populates the private requiredScripts, deferredScripts and preloadScripts arrays
		* @return {Void}
		*/
		, initScripts: function () {
			var preloadScripts = _.params.preloadScripts || [];
			var requiredScripts = _.params.requiredScripts || [];
			var deferredScripts = _.params.deferredScripts || [];


			requiredScripts.push(_.getScriptByKey("PromeroDataEditorSupportJS"));


			/** 
			* start - do not modify 
			*/
			_.requiredScripts = requiredScripts;

			//remove required scripts from deferred
			_.deferredScripts = deferredScripts.filter(function (script) { return requiredScripts.indexOf(script) < 0; });

			//initialize preloadScripts, deferred scripts are preloaded by default
			_.preloadScripts = [].concat(preloadScripts, _.deferredScripts);
			/** 
			* end - do not modify 
			*/
		}	
		/**
		*	Called once DOMContentLoaded event fires and all requiredScripts returned, deferred CSS not guaranteed to have returned
		*	@param {function} _.params.moduleLoadComplete - user supplied callback to be executed when this method executes
		* 	@return {Void}
		*/
		,moduleLoadComplete: function () {    
				//check and run user provided moduleLoadComplete function
				if(typeof _.params.moduleLoadComplete === "function")
					  _.params.moduleLoadComplete();

				//hook-up save and cancel links
				document.querySelectorAll("input.SaveForLater").forEach(saveLink => {
					saveLink.addEventListener("click", function (e) {
						let subscribeFlag = document.getElementById("cmsForms_internalSubscribe");
						if (subscribeFlag) subscribeFlag.value = "0";
						let formSubmitButton = document.querySelector("input[type='button'][id^='formSubmit']");
						formSubmitButton.click();
					});
				});
				document.querySelectorAll("div.SaveAndSubscribe").forEach(saveLink => {
					saveLink.addEventListener("click", function (e) {
						let subscribeFlag = document.getElementById("cmsForms_internalSubscribe");
						if(subscribeFlag) subscribeFlag.value = "1";
						let skuField= document.getElementById("cmsForms_internalSKU");
						if (skuField) skuField.value = e.currentTarget.dataset.sku;

						let formSubmitButton = document.querySelector("input[type='button'][id^='formSubmit']");
						formSubmitButton.click();
					});
				});
				NWS.Modules.InitModule("NWS.Promero.DataModules.SubscriptionManagement.DataEditorSupport", { InitSubsets: true })
			},
			OrigSFFormSubmitComplete: null,
			SFFormSubmitComplete: function (blockID, submitAction, ajaxResult) {
				if (ajaxResult.Data && ajaxResult.Data.statusCode && ajaxResult.Data.statusCode == 302) {
					window.location.href = ajaxResult.Data.redirectLocation;
				} else {
					_.OrigSFFormSubmitComplete(blockID, submitAction, ajaxResult);
				}
			}
		}

    return {
        init: function (params) {
				_.params = params || {};
				//populate script arrays before loading
				_.initScripts();
			
			    //register deferred scripts after window load event fired
			NWS.CommonScripts.ModuleManager.OnWindowLoad(function () {
				NWS.Modules.Register(_.deferredScripts);
				_.OrigSFFormSubmitComplete = NWS.Block.DataEditor.SFFormSubmitComplete;
				NWS.Block.DataEditor.SFFormSubmitComplete = _.SFFormSubmitComplete


			});

			//preload scripts
			NWS.Modules.Register(_.preloadScripts, null, "preload");            
			
			//load required scripts 
			if (_.requiredScripts.length)
				NWS.Modules.Register(_.requiredScripts, _.moduleLoadComplete);
			else
				_.moduleLoadComplete();
		},
		RedirectWithDataID: function (redirectPath) {
			NWS.Promero.DataModules.SubscriptionManagement.DataEditorSupport.RedirectWithDataID(redirectPath);
		}
    }
});