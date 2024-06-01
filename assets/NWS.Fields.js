NWS.initNamespace("NWS.Fields", function () {
    var _ = {
        getValue: function (id, container) {
            var ctl = NWS.Util.QueryGet('#' + id, container),
                ctlSet = null;

            if (ctl && ctl.nodeName === "INPUT" && ctl.type === "radio" && ctl.name) {
                ctlSet = NWS.Util.GetSet(ctl.name);
                ctl = null;
            }
            else if (!ctl)
                ctlSet = NWS.Util.GetSet(id);

            if (!ctl && ctlSet.length === 0)
                return null;
            
            if (ctl && ctl.nodeName === "INPUT" && ctl.type === "file")
                return ctl.files;

            var retVal = [];
            if (ctl && ctl.nodeName === "SELECT") {
                for (var ii = 0; ii < ctl.options.length; ii++)
                    if (ctl.options[ii].selected)
                        retVal.push(String(ctl.options[ii].value).trim());
            }
            else if (ctl && ctl.nodeName === "TEXTAREA")
                retVal.push(String(ctl.value).trim());
            else if (ctl && ctl.nodeName === "INPUT" && ctl.type === "checkbox")    // single checkbox
                retVal.push(_.checkboxValue(ctl, ctl.checked));
            else if (ctl && ctl.nodeName === "INPUT")   // other input
                retVal.push(String(ctl.value).trim());
            else if (ctlSet && ctlSet.length)   // set of radios or checkboxes
                retVal = ctlSet.filter(function (c) { return c.checked; }).map(function (c) { return String(c.value).trim(); });

            return retVal.join(", ");
        },

        checkboxValue: function (ctl, chkState) {
            if (chkState)
                return String(ctl.value).trim();

            switch (ctl.value) {
                case "true":
                    return "false";
                case "false":
                    return "true";
                case "yes":
                    return "no";
                case "no":
                    return "yes";
                case "1":
                    return "0";
                case "0":
                    return "1";
            }

            return "";
        },

        getDefaultValue: function (id, container) {
            var ctl = NWS.Util.QueryGet('#' + id, container);
            if (!ctl)
                return null;

            var retVal = [],
                ctlSet = [];

            if (ctl.type === "radio" || ctl.type === "checkbox" && ctl.name)
                ctlSet = NWS.Util.QueryGetAll(["input[type='", ctl.type, "'][name='", ctl.name, "']"].join(""));

            if (ctlSet.length)  // radio or checkbox set
                ctlSet.filter(function (c) { return c.defaultChecked; }).forEach(function (c) { retVal.push(String(c.value).trim()); });
            else if (ctl.type === "checkbox")   // single checkbox
                retVal.push(_.checkboxValue(ctl, ctl.defaultChecked));
            else if (ctl.nodeName === "SELECT") {
                for (var ii = 0; ii < ctl.options.length; ii++)
                    if (ctl.options[ii].hasAttribute("data-default-selected"))
                        retVal.push(String(ctl.options[ii].value).trim());
            }
            else if (ctl.hasAttribute("defaultValue"))
                retVal.push(String(ctl.getAttribute("defaultValue")).trim());
            else
                retVal.push(!ctl.defaultValue ? "" : ctl.defaultValue);

            return retVal.join(", ");
        },

        setValue: function (id, value, doOnChange, container) {
            if (value === null)
                value = "";

            var ctl = NWS.Util.QueryGet('#' + id, container),
                ctlGroup = null;

            if (ctl && ctl.nodeName === "INPUT" && ctl.type === "radio" && ctl.name) {
                ctlGroup = NWS.Util.GetSet(ctl.name);
                ctl = null;
            }
            else if (ctl === null) 
                ctlGroup = NWS.Util.GetSet(id);

            if (ctl === null && ctlGroup.length === 0)
                return;
            
            var arrayOfValues = [];
            if (ctlGroup || ctl.nodeName === "SELECT" && ctl.multiple)
                value.split(",").forEach(function (element) { arrayOfValues.push(element.replace(/ /g, '')); });
            else if (value !== null)
                arrayOfValues.push(value.replace(/ /g, ''));

            if (ctl && ctl.length && ctl.length > 0) {
                for (var ii = 0; ii < ctl.length; ++ii) {
                    if (ctl.nodeName === "SELECT") {
                        ctl[ii].selected = false;
                        ctl[ii].removeAttribute("selected");
                    }
                    else {
                        ctl[ii].checked = false;
                        ctl[ii].removeAttribute("checked");
                    }

                    if (arrayOfValues.indexOf(ctl[ii].value.replace(/ /g, '')) >= 0) {
                        if (ctl.nodeName === "SELECT") {
                            ctl[ii].selected = true;
                            ctl[ii].setAttribute("selected", "selected");
                        }
                        else {
                            ctl[ii].checked = true;
                            ctl[ii].setAttribute("checked", "checked");
                        }
                        
                        if (doOnChange)
                            NWS.Util.Event.DoMouseEvent(ctl[ii], "click");
                    }
                }

                // Handle dropdown's where the method is on the select
                if (doOnChange)
                    NWS.Util.Event.DoEvent(ctl, "change");
            }
            else if (ctlGroup && ctlGroup[0].type === "radio" && ctlGroup.some(function (r) { return r.value === value; })) {
                var selected = ctlGroup.filter(function (r) { return r.value === value; })[0];
                selected.checked = true;

                if (doOnChange) {
                    NWS.Util.Event.DoEvent(selected, "click");
                    NWS.Util.Event.DoEvent(selected, "change");
                }
            }
            else if (ctlGroup && ctlGroup[0].type === "checkbox" && ctlGroup.some(function (cb) { return arrayOfValues.indexOf(cb.value) >= 0; })) {
                ctlGroup.forEach(function (cb) {
                    cb.checked = arrayOfValues.indexOf(cb.value) >= 0;
                    if (cb.checked && doOnChange) {
                        NWS.Util.Event.DoEvent(cb, "click");
                        NWS.Util.Event.DoEvent(cb, "change");
                    }
                });
            }
            else if (ctl && ctl.nodeName === 'INPUT' && ctl.type === 'checkbox') {
                ctl.checked = value !== "" && value !== 0 && value !== "0" && value !== "no" && value !== "off" && value !== "false" && value !== false;
                if (doOnChange)
                    NWS.Util.Event.DoMouseEvent(ctl, "click");
            }
            else {
                ctl.value = value;
                if (doOnChange) {
                    NWS.Util.Event.DoEvent(ctl, "input");
                    NWS.Util.Event.DoEvent(ctl, "change");
                }
            }
        }
    };

    return {
        State: {
            IsDisabled: function (id, container) {
                let ctl = NWS.Util.QueryGet('#' + id, container),
                    wrapper = NWS.Util.GetClosest(ctl, ".Field");

                if (!ctl && !wrapper)
                    return null;

                return ctl.disabled || wrapper.classList.contains("disabled");
            },
            IsHidden: function (id, container) {
                let ctl = NWS.Util.QueryGet('#' + id, container),
                    wrapper = NWS.Util.GetClosest(ctl, ".Field");

                if (!ctl && !wrapper)
                    return null;

                return wrapper.classList.contains("hide");
            },
            HasChanged: function (id, container) {
                let val = _.getValue(id, container) ?? "";
                return val !== _.getDefaultValue(id, container);
            },

            GetValue: function (id, container = null, keepNull = false) {
                return _.getValue(id, container) ?? (keepNull ? null : "");
            },
            GetDefaultValue: function (id, container) { return _.getDefaultValue(id, container); },
            SetValue: function (id, value, doOnChange, container) { _.setValue(id, value, doOnChange, container); },
            Reset: function (id, container = null, doEvents = true) {
                _.setValue(id, _.getDefaultValue(id, container), doEvents);

                var ctl = NWS.Util.QueryGet('#' + id, container),
                    div = NWS.Util.GetBaseNodeForCtl(ctl);

                if (!ctl && !div)
                    return;

                ctl.checkValidity && ctl.setCustomValidity("");
                div.classList.remove("changed");
                div.classList.remove("error");
            }
        },

        Validate: {
            IsRecurringDate: function () { },
            IsGeographicPoint: function () { },

            IsXml: function (id, container) {
                var value = _.getValue(id, container);
                if (value === null)
                    return false;

                // Empty is valid
                if (value === "")
                    return true;

                // rather than return a parsererror element, IE throws an exception.
                try {
                    var parser = new DOMParser(),
                        xml = parser.parseFromString(value, "application/xml"),
                        errors = xml.querySelectorAll("parsererror");

                    return errors.length === 0;
                }
                catch (ex) {
                    return false;
                }
            },

            IsHtml: function (id, container) {
                var value = _.getValue(id, container);
                if (value === null)
                    return false;

                // Empty is valid
                if (value === "")
                    return true;

                var parser = new DOMParser(),
                    xml = parser.parseFromString(["<TITAN>", value, "</TITAN>"].join(""), "application/xml");

                if (xml.querySelector("parsererror"))
                    return false;

                // passed well-formed... which is surprising given the loose syntax of html5

                var html = parser.parseFromString(value, 'text/html'),
                    nodes = [].slice.call(html.querySelectorAll('*'));

                if (nodes.some(function (n) { return n instanceof HTMLUnknownElement; }))
                    return false;

                return true;
            },

            MatchesRegEx: function (id, regEx, container) {
                var value = _.getValue(id, container);
                return value !== null && value.match(regEx) !== null;
            },

            Exists: function (id, container) {
                return NWS.Util.QueryGet('#' + id, container) !== null;
            },

            IsEnabled: function (id, container) {
                var ctl = NWS.Util.QueryGet('#' + id, container);
                return ctl !== null && !ctl.disabled;
            },

            IsNumeric: function (id, container) {
                var value = _.getValue(id, container);
                return !isNaN(parseFloat(value)) && isFinite(value);
            },

            HasValue: function (id, container) {
                var value = _.getValue(id, container);
                return Boolean(value);
            }
        }        
    };
});