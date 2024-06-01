/* * 
* Module loader for Contact Us form support.  The Module Loader pattern provides a standardized approach to loading scripts
* for supporting client-side features. 
* @namespace NWS.Promero.DataModules.Grants.Grants.DataList.ModuleLoader
* @property {object}	_ 		- Private accessor class
* @method {void}		init 	- initialation method required for Module Loader pattern.  Automatically called by NWS.Modules.InitModule
* 
*/
NWS.initNamespace("Promero.DataModules.Grants.DataList.ModuleLoader", function () {
	var _ = {
		/** 
		* Returns script object corresponding to supplied key.  Returns user-supplied override, if exists. Otherwise, returns matching value from defaultScripts array.
		* @param {string} key Identifies requested script Object
		* @return {Object} script Script object whose key property matches the supplied key parameter
		*/
		getScriptByKey: function (key) {
			var scriptOverrides = _.params.scriptOverrides || [];
			return NWS.CommonScripts.ModuleManager.GetScriptByKey(key, _.defaultScripts, scriptOverrides);
		}
		/** 
		* Local configuration data initialized in the module init
		* @property {Object} params
		*/
		, params: null
		/** 
		* Array of script objects to pre-load on the page 
		* @property: {Array.<key: String, path: String>} preloadScripts
		*/
		, preloadScripts: null
		/** 
		* Array of script objects to pre-load on the page 
		* @property: {Array.<key: String, path: String>} preloadScripts
		*/
		, requiredScripts: null
		/** 
		* Array of script objects to pre-load on the page 
		* @property: {Array.<key: String, path: String>} preloadScripts
		*/
		, deferredScripts: null
		/* 
			Default array of script objects to be loaded by the ModuleLoader  
			@property {Array.<key: String, path: Path>} defaultScripts
			@property {Object} defaultScripts[0]
			@property {String} defaultScripts[0].key - Unique (within array) key for script. Effort should be made to be consistent.  If the same script is used by multiple module loaders, use the same key. 
			@property {String} defaultScripts[0].path - rRelative path to the script to load.  Assume path is resolving from the display side						
		*/
		, defaultScripts: []
		/* uncomment section below and update with your scripts */
		/*
		[	
						  { key:"SampleDeferredCSS", path: "/ClientCSS/NWS/Themes/sample-deferred.css" }, 
						  { key:"SampleFeatureCSS", path: "/ClientCSS/NWS/Themes/sample-feature-deferred.css" },
						  { key:"SampleRequiredCSS", path: "/ClientCSS/NWS/Themes/sample-required-async.css" },
						  { key:"SampleRequiredJS", path: "/CommonScripts/NWS/Themes/sample-required-async.js" },
						  { key:"SampleFeatureDeferredCSS", path: "/ClientCSS/NWS/Themes/sample-feature-deferred-async.css" },
						  { key:"SampleFeatureRequiredCSS", path: "/ClientCSS/NWS/Themes/sample-feature-required-async.css" },
						  { key:"SampleFeatureRequiredJS", path: "/CommonScripts/NWS/Themes/sample-feature-required-async.js" }
		
		/** 
		* Populates the private requiredScripts, deferredScripts and preloadScripts arrays
		* @return {Void}
		*/
		, initScripts: function () {
			var preloadScripts = _.params.preloadScripts || [];
			var requiredScripts = _.params.requiredScripts || [];
			var deferredScripts = _.params.deferredScripts || [];

			/* uncomment section below and add your scripts to the appropriate array */

			/*
				//example of adding required scripts that are not feature specific
				requiredScripts.push(_.getScriptByKey("SampleRequiredCSS"));
					requiredScripts.push(_.getScriptByKey("SampleRequiredJS"));
			    
				//example of adding required scripts 
				if (_.params.featureOptions) {
				  requiredScripts.push(_.getScriptByKey("SampleFeatureRequiredCSS"));
				  requiredScripts.push(_.getScriptByKey("SampleFeatureRequiredJS"));
				}
				
				//initial deferred scripts to include user provided preload and deferred scripts
					deferredScripts.push(_.getScriptByKey("SampleDeferredCSS"));
				if(_.params.featureOptions)
						deferredScripts.push(_.getScriptByKey("SampleFeatureDeferredCSS"));			
			*/

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
		, moduleLoadComplete: function () {
			//check and run user provided moduleLoadComplete function
			if (typeof _.params.moduleLoadComplete === "function")
				_.params.moduleLoadComplete();
			/* uncomment section below and update to reflect code you want to execute once your required scripts have returned */
			/*
			  //initialize feature if options defined and user has not explicitly disabled initialization
				if (_.params.featureOptions && (typeof _.params.featureOptions.init === "undefined" || _.params.featureOptions.init)) 
				{
				  NWS.Modules.InitModule("NWS.Themes.SampleFeature", _.params.featureOptions);
						
						if(typeof _.params.featureOptions.callback === "function")
						  _.params.featureOptions.callback();
				}
			//initialize non-optional features
			  NWS.Modules.InitModule("NWS.Themes.Sample", _.params);
			*/
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
				NWS.Block.DataList.OnAjaxComplete("Promero.DataModules.Grants.DataList.ModuleLoader.ScrollToTop", function () {
					document.querySelector("div.DataList.ScrollTo").closest("div.TitanStripe").scrollIntoView()
				});
			});

			//preload scripts
			NWS.Modules.Register(_.preloadScripts, null, "preload");

			//load required scripts 
			NWS.Modules.Register(_.requiredScripts, _.moduleLoadComplete);
		}
		, SubsetClick: function (subset, blockID, classID, docID) {
			subset.parentElement.querySelectorAll("input[id^='" + subset.dataset.id + "']").forEach(checkbox => {
				checkbox.checked = subset.checked;
				NWS.Block.DataList.ResetSelectClass(checkbox, checkbox.checked, blockID, classID);
			});
			NWS.Block.DataList.ClassificationCheck(blockID);
		}
		, ChangeSortOrder: function (blockID, docID, evt) {
			var target = evt.target;
			if (!target)
				return;
			var prefix = NWS.Block.DataList.MakePrefix(blockID);
			var sortDir = target.getAttribute("sortDir");
			if (!sortDir) sortDir = "ASC";
			NWS.Util.Get(prefix + "SortKey").value = target.getAttribute("sortKey");
			NWS.Util.Get(prefix + "SortDir").value = sortDir;

			NWS.Block.DataList.OnAjaxComplete("Promero.DataModules.Grants.DataList.ModuleLoader.ChangeSortOrder", function (targetSelector, sortDir) {
				var prefix = NWS.Block.DataList.MakePrefix(blockID);

				var sortKey = NWS.Util.Get(prefix + "SortKey").value;
				var sortDir = NWS.Util.Get(prefix + "SortDir").value;
				var target = document.querySelector(targetSelector + ` li[sortKey="${sortKey}"]`);
				Array.from(target.parentElement.children).forEach(element => {
					element.classList.remove("ASC");
					element.classList.remove("DESC");
					element.setAttribute("sortDir", "");

				})
				if (sortDir === "ASC") {
					target.setAttribute("sortDir", "DESC");
					target.classList.add("DESC");
				} else {
					target.setAttribute("sortDir", "ASC");
					target.classList.add("ASC");
				}
			}, [`#${target.parentElement.id}`, blockID]);
			NWS.Block.DataList.GetPageNumCtl(prefix).value = "1";
			NWS.Block.DataList.Submit(blockID, docID)
		},
		ResetClassificationCheckbox: function (blockDataFieldID, classID, evt) {
			if (evt && evt.preventDefault)
				evt.preventDefault();

			var blockID = NWS.Block.DataList.GetBlockID(blockDataFieldID)
				, docID = NWS.Util.Get(NWS.Block.DataList.MakePrefix(blockID) + "DocID").value;

			var div = NWS.FilterSupport.FilterBlock.GetInputsDiv(blockID, classID);
			if (!div)
				return;

			var boxes = div.getElementsByTagName("INPUT");
			for (var ii = 0; ii < boxes.length; ++ii)
				if (boxes[ii].checked) {
					NWS.Util.Get(boxes[ii].id + "_div").classList.remove("selected");
					boxes[ii].checked = false;
				}

			NWS.FilterSupport.FilterBlock.RecalcSeeAllLess(blockID, classID);

			NWS.Block.DataList.Submit(blockID, docID)
		}
	}
});
NWS.Modules.InitModule("NWS.Promero.DataModules.Grants.DataList.ModuleLoader");