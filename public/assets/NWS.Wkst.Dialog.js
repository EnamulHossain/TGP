NWS.initNamespace("NWS.Wkst.Dialog", function () {
    var _ = {
        selectors: {
            ID: "WkstDialog",
            Editor: ".DialogEditor:last-child",
            Buttons: ".DialogEditor:last-child .bar .buttons button.wkstButton",

            /* This was changed to exclude Block Editor fields in the auto wire-up */
            Controls: ".WkstDialog .DialogEditor:not(.Block) .Field[data-control-id][data-field-binding-info]"
        },

        controls: [],

        Show: function () {
            if (NWS.Wkst.Preview)
                NWS.Wkst.Preview.EnableDisableStylesheets(false);

            NWS.Util.Get(_.selectors.ID).classList.add("fuzzyCover");
        },

        Hide: function () {
            var dialog = NWS.Util.Get(_.selectors.ID),
                editor = NWS.Util.QueryGet(_.selectors.Editor, dialog);

            // remove the first item in the array
            _.controls.shift();

            if (editor)
                dialog.removeChild(editor);

            // Don't hide until all dialogs are processed
            if (_.controls.length > 0) {
                _.controls[0].ControlCollection.Validate();
                return;
            }

            dialog.classList.remove("error");
            dialog.classList.remove("fuzzyCover");

            if (NWS.Wkst.Preview)
                NWS.Wkst.Preview.EnableDisableStylesheets(true);
        },

        HandleDefaultKey: function (key, func, evt) {
            NWS.Util.Event.DoHandlerForKeypress(evt, key, func);
        }
    };

    function DialogData(name, url, args) {
        this.OriginalArgs = { Url: url, Args: args };
        this.ControlCollection = new NWS.CmsControls.ControlCollection(name);
    }

    DialogData.prototype.Init = function () {
        this.ControlCollection.InitFromElements(NWS.Util.QueryGetAll(_.selectors.Controls).filter(function (field) { return field.parentNode.closest(".Field[data-control-id][data-field-binding-info]") === null; }));
    };

    var machine = {
        state: "idle",
        transitions: {
            idle: {
                Open: function (name, url, args) {
                    _.Show();
                    this.changeStateTo("loading");
                    this.dispatch("Load", [name, url, args]);
                },

                Submit: function (url, args, dataFormat, onComplete) {
                    this.changeStateTo("submitting");
                    this.dispatch("Submit", [url, args, dataFormat, onComplete]);
                },

                Confirm: function (onComplete) {
                    this.changeStateTo("submitting");
                    this.dispatch("Confirm", [onComplete]);
                },

                Return: function (...theArgs) {
                    this.changeStateTo("submitting");
                    this.dispatch("Return", theArgs);
                }
            },

            loading: {
                Load: function (name, url, args) {
                    var callback = new NWS.Ajax.Callback(
                        function (result) { machine.dispatch("LoadSuccess", [result]); },
                        function (result) { machine.dispatch("LoadControls", [result]); },
                        function (result) { machine.dispatch("LoadErrors", [result]); }
                    );

                    // add to the beginning of the array so the collection at index 0 is always handled first
                    _.controls.unshift(new DialogData(name, url, args));

                    if (args)
                        NWS.Ajax.Post(url, args, "", callback);
                    else
                        NWS.Ajax.Get(url, "", callback);
                },

                LoadSuccess: function (ajaxResult) {
                    if (ajaxResult && ajaxResult.responseText)
                        NWS.Util.Get(_.selectors.ID).insertAdjacentHTML("beforeend", ajaxResult.responseText);
                },

                LoadControls: function (ajaxResult) {
                    var editor = NWS.Util.QueryGet(_.selectors.Editor);

                    if (editor && ajaxResult) {
                        var jsClass = editor.getAttribute("data-editor-js-class");

                        if (jsClass && NWS.Modules.Parse(jsClass, window, "object") === null) {
                            machine.dispatch("LoadControls", [ajaxResult], 100);
                            return;
                        }

                        NWS.Util.QueryGetAll(_.selectors.Buttons).forEach(function(button) {
                            clickHandler = NWS.Modules.Parse(jsClass + "." + button.id, window, "function") || _default[button.id];

                            if (clickHandler)
                                button.addEventListener("click", clickHandler, false);

                            if (clickHandler && button.hasAttribute("data-default-key")) {
                                var k = button.getAttribute("data-default-key"),
                                    e = _.HandleDefaultKey.bind(window, k, clickHandler);

                                editor.addEventListener("keyup", function (evt) { e(evt); }, false);    // Must be false to allow elements deeper in the DOM to have first dibs on keyup event
                                button.removeAttribute("data-default-key");
                            }
                        });

                        editor.removeAttribute("data-editor-js-class");

                        _.controls[0].Init();
                    }

                    machine.changeStateTo("idle");

                    /* If an operation is done during Open and the result is empty, then 
                     * we reset state and refresh the tree.
                     */
                    var isEmpty = ajaxResult && ajaxResult.responseText === "";
                    if (isEmpty)
                        _.Hide();

                    /* Workstation only. */
                    if (isEmpty && typeof NWS.Wkst.Tabs !== "undefined")
                        NWS.Wkst.Tabs.ResetControlState();

                    if (isEmpty && typeof NWS.Wkst.NavTree !== "undefined") {
                        var results = NWS.Wkst.Tabs.Results ? NWS.Wkst.Tabs.Results.GetSelections() : [];
                        NWS.Wkst.NavTree.RefreshSpecific({ items: Array.from(new Set(results.map(data => data.ParentDocID))), clickOn: NWS.Wkst.NavTree.GetPropertyOfSelected("DocID"), requery: true });
                    }
                    else if (isEmpty)
                        NWS.Wkst.Tree.Get("tree").RefreshSelected(false, true);

                    // Can't set focus until the input is visible
                    var autoFocus = NWS.Util.QueryGet("input[autofocus]", editor);
                    if (autoFocus)
                        autoFocus.focus({ preventScroll: true });
                },

                LoadErrors: function (ajaxResult) {
                    if (ajaxResult) {
                        var dialog = NWS.Util.Get(_.selectors.ID);
                        dialog.insertAdjacentHTML("beforeend", ajaxResult.responseText);
                        dialog.classList.add("error");

                        var button = NWS.Util.QueryGet(_.selectors.Buttons, dialog);
                        if (button)
                            button.addEventListener("click", NWS.Wkst.Dialog.Close, false);
                    }

                    machine.changeStateTo("idle");
                }
            },

            submitting: {
                Confirm: function (onComplete) {
                    var confirmArgs = _.controls[0].OriginalArgs;
                    confirmArgs.Args.confirmed = true;
                    if (_.controls[0].ControlCollection.Controls.length > 0 && confirmArgs.Args.encodedData === undefined)
                        confirmArgs.Args.encodedData = NWS.Ajax.UrlToken.Encode(_.controls[0].ControlCollection.PackageData());

                    this.dispatch("Submit", [confirmArgs.Url, confirmArgs.Args, null, onComplete]);
                },

                Return: function (...theArgs) {
                    var returnArgs = _.controls[0].OriginalArgs;

                    /* ReturnCallback functions that perform additional "long-running" AJAX calls
                     * typically use the Loading dialog to make the experience better. So we change 
                     * the state and close before those calls so they can open the loading dialog.
                     */
                    machine.changeStateTo("idle");
                    NWS.Wkst.Dialog.Close();

                    if (theArgs.length === 0 && returnArgs.Args.SilentDelete)
                        returnArgs.Args.SilentDelete();
                    else if (theArgs.length && returnArgs.Args.ReturnCallback) 
                        returnArgs.Args.ReturnCallback.apply(this, theArgs);
                },

                Submit: function (url, args, dataFormat, onComplete) {
                    var callback = new NWS.Ajax.Callback(
                        function (result) { result.AutoCloseDialog = true; onComplete(result); },
                        function (result) { machine.dispatch("SubmitSuccess", [result]); },
                        function (result) { machine.dispatch("SubmitError", [result]); }
                    );

                    args = args || _.controls[0].ControlCollection.PackageData(dataFormat);

                    NWS.Ajax.Post(url, args, "", callback);
                },

                SubmitSuccess: function (ajaxResult) {
                    machine.changeStateTo("idle");

                    if (ajaxResult && ajaxResult.AutoCloseDialog)
                        NWS.Wkst.Dialog.Close();
                },

                SubmitError: function (ajaxResult) {
                    if (ajaxResult) {
                        var dialog = NWS.Util.Get(_.selectors.ID);
                        dialog.innerHTML = ajaxResult.responseText;

                        var button = NWS.Util.QueryGet(_.selectors.Buttons, dialog);
                        if (button)
                            button.addEventListener("click", NWS.Wkst.Dialog.Close, false);
                    }

                    machine.changeStateTo("idle");
                }
            }
        },

        dispatch: function (actionName, argsArray, delayMs) {
            var action = this.transitions[this.state][actionName];
            if (!action) {
                console.warn("Dialog: Unknown action ", actionName, " from state ", this.state);
                return;
            }

            delayMs = delayMs || 0;
            setTimeout(function () { action.apply(machine, argsArray); }, delayMs);
        },

        changeStateTo: function (newState) {
            this.state = newState;
            NWS.Util.Get(_.selectors.ID).setAttribute("data-state", newState);
        }
    };

    var _default = {
        Close: function (evt) {
            NWS.Util.Event.Cancel(evt);
            NWS.Wkst.Dialog.Close();
        },

        Done: function (evt) {
            NWS.Util.Event.Cancel(evt);
            NWS.Wkst.Dialog.Close();
        }
    };

    var _displaySide = {
        Init: function () {
            NWS.Wkst.Icons.Init({ spritePath: "/ClientCSS/editor/images/dialog-sprite.svg", spriteContainerID: "dialogSprite" });
            _displaySide.LoadModules();
            _displaySide.observer = new MutationObserver(_displaySide.mutationCallback);
            _displaySide.OnContentMutation("NWS.Wkst.Dialog", _displaySide.LoadModules, [], 1);
            _displaySide.Start();
        },

        LoadModules: function () {
            var jsElements = NWS.Util.QueryGetAll("*[data-js]");
            if (jsElements.length === 0)
                return;

            var jsModules = jsElements.map(function (js) { return JSON.parse(js.getAttribute("data-js")); }),
                moduleScripts = [],
                moduleInits = [];

            jsModules.forEach(function(json) {
                var modules = Array.isArray(json.modules) ? json.modules : [json.modules];
                modules.forEach(function(module) {
                    if (moduleScripts.indexOf(module) === -1)
                        moduleScripts.push(module);
                });

                if (json.init) {
                    var initList = Array.isArray(json.init) ? json.init : [json.init];
                    initList.filter(init => init.func !== null).forEach(init => moduleInits.push(init));
                }
            });

            jsElements.forEach(function (js) { js.removeAttribute("data-js"); });
            NWS.Modules.LoadResources(moduleScripts, moduleInits);
        },

        observer: null,
        callbacks: [],
        mutationCallback: function (mutations, thisObserver) {
            if (mutations.length === 0)
                return;

            _displaySide.callbacks.forEach(function(c) {
                var func = c.func,
                    args = c.args.slice(0); // creates a clone of the array

                args.push(mutations);
                func.apply(thisObserver, args);
            });
        },

        OnContentMutation: function (who, callback, callbackArgs, priority) {
            if (_displaySide.callbacks.filter(function (c) { return c.who === who; }).length > 0)
                return;

            callbackArgs = callbackArgs || [];
            priority = priority || 999;
            _displaySide.callbacks.push({ who: who, func: callback, args: callbackArgs, order: priority });
            _displaySide.callbacks.sort(function (a, b) { return a.order - b.order; });
        },

        Start: function () {
            let config = { childList: true, attributes: true, subtree: true },
                content = document.getElementById("WkstDialog");

            _displaySide.observer.observe(content, config);
        },

        Stop: function () {
            _displaySide.observer.disconnect();
        }
    };

    return {
        Init: function () {
            /* Display-side. Needs WkstDialog added to the end of the body tag */
            if (NWS.Util.Get(_.selectors.ID) === null) {
                NWS.Util.Get("titanBody").insertAdjacentHTML("beforeend", "<div class='Wkst'><section id='WkstDialog' class='WkstDialog'><div id='dialogSprite'></div><div class='loading hide'><img src='data:image/gif;base64,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' alt='Please Wait' /></div></section></div>");
                _displaySide.Init();
            }
            
            machine.changeStateTo("idle");
        },

        Open: function (name, url, args) {
            machine.dispatch("Open", [name, url, args]);
        },

        Submit: function (url, args, dataFormat, onComplete) {
            machine.dispatch("Submit", [url, args, dataFormat, onComplete]);
        },

        Confirm: function (onComplete) {
            machine.dispatch("Confirm", [onComplete]);
        },

        Return: function (...theArgs) {
            machine.dispatch("Return", theArgs);
        },

        Loading: function (doShow) {
            machine.changeStateTo(doShow ? "loading" : "idle");

            if (_.controls.length > 0)
                return;

            if (doShow)
                _.Show();
            else
                _.Hide();
        },

        Close: function () {
            if (machine.state !== "idle")
                return false;

            _.Hide();
            return true;
        },

        /* Gets editor element for top-most dialog */
        GetEditor: function () {
            return NWS.Util.QueryGet(_.selectors.Editor, NWS.Util.Get(_.selectors.ID));
        },

        /* Get editor element closest to the given element */
        GetClosestEditor: function (element) {
            return NWS.Util.GetClosest(element, ".DialogEditor");
        },

        /* Get the index of the Dialog closest to the given element */
        GetDialogIndex: function (element) {
            let dialogs = NWS.Util.QueryGetAll(".DialogEditor").reverse(),
                closestEditor = NWS.Util.GetClosest(element, ".DialogEditor");

            return dialogs.findIndex(d => d === closestEditor);
        },

        GetControl: function (name, dialogIndex = 0) {
            if (_.controls?.[dialogIndex] === undefined)
                return undefined;

            var idx = _.controls[dialogIndex].ControlCollection.ControlNames.indexOf(name);
            return idx === -1 ? null : _.controls[dialogIndex].ControlCollection.Controls[idx];
		},

        GetOriginalArgs: function (dialogIndex = 0) {
            if (_.controls?.[dialogIndex] === undefined)
				return null;

			return _.controls[dialogIndex].OriginalArgs;
		},

        PackageData: function (format, dialogIndex = 0) {
            return _.controls[dialogIndex].ControlCollection.PackageData(format);
        },

        HasChanged: function (dialogIndex = 0) {
            return _.controls[dialogIndex].ControlCollection.HasChanged();
        },

        IsValid: function (dialogIndex = 0) {
            _.controls[dialogIndex].ControlCollection.Validate();
            return _.controls[dialogIndex].ControlCollection.IsValid();
        }
    };
});