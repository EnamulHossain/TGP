NWS.initNamespace("NWS.FormSupport", function () {
    var _ = {
        GTM_dlPush: function () {
            //when everything has been validated, submit an event to GTM
            NWS.Logging.Track({ "event": "formSubmitted", "pageURL": window.location.href });
        },

        ActionByType: function (type, action, container, suffix) {
            if (!container)
                container = document;

            var ctls = container.getElementsByTagName(type);
            var returnValue = true;
            for (var ii = 0; ii < ctls.length; ++ii) {
                var name = ctls[ii].name || ctls[ii].getAttribute("name");

                if (name && (name.indexOf("cmsForms_") === 0 || name.indexOf("cmsFormS_") === 0))
                    switch (action) {
                        case "disable":
                            _.SFDisableControl(name);
                            break;
                        case "enable":
                            _.SFEnableControl(name);
                            break;
                        case "validate":
                            returnValue &= NWS.FormSupport.SFValidateControl(name, suffix, container);
                            break;
                        case "clearCheck":
                            if (ctls[ii].type === "checkbox")
                                ctls[ii].checked = false;
                    }
            }

            return returnValue;
        },

        HandleProcessingKey: function (blockID) {
            var processingKey = NWS.Util.Get("cmsFormsControl_" + blockID + "_ProcessingKey"),
                keyField = NWS.Util.Get("cmsForms_" + blockID + "_key");
            if (processingKey && keyField) {
                var hash = processingKey.getAttribute("token"),
                    key = keyField.value;

                keyField.value = "";
                processingKey.innerHTML += ["<input type='text' id='cmsForms_", blockID, "_", key, "' name='cmsForms_", blockID, "_", key, "' value='", hash, "' style='display:none'/>"].join("");
            }
        },

        ResetProcessingKey: function (blockID, decodedFields) {
            var processingKey = NWS.Util.Get("cmsFormsControl_" + blockID + "_ProcessingKey"),
                keyField = NWS.Util.Get("cmsForms_" + blockID + "_key"),
                cmsFormPrefix = "cmsForms_" + blockID + "_",
                fields = NWS.Util.QueryGetAll("input[id^='" + cmsFormPrefix + "']", processingKey);

            for (var f = 0; f < fields.length; f++) {
                if (fields[f] !== keyField) {
                    keyField.value = fields[f].id.substring(cmsFormPrefix.length);
                    processingKey.removeChild(fields[f]);
                    break;
                }
            }

            if (decodedFields && Array.isArray(decodedFields)) {
                for (var i = 0; i < decodedFields.length; i++)
                    NWS.Util.Get(decodedFields[i].FieldName).value = decodedFields[i].FieldValue;
            }
        },

        ControlHasBeenProcessed: function (processed, newCtlName) {
            for (var ii = 0; ii < processed.length; ++ii)
                if (processed[ii] === newCtlName)
                    return true;

            return false;
        },

        GetCommentValue: function (ctl) {
            switch (ctl.tagName) {
                case "INPUT":
                    if (ctl.type === "radio")
                        return NWS.FormSupport.SFGetRadioValue(ctl.name);
                    else if (ctl.type === "checkbox")
                        return ctl.checked ? "yes" : "no";
                /* ELSE we're an input FALL THROUGH */
                case "TEXTAREA":
                    return ctl.value.replace(/<|>|&lt;|&gt;|&#60;|&#62;|&#x3c;|&#x3e;|%3c|%3e/gi, "");
                case "SELECT":
                    return [].slice.call(ctl.selectedOptions).map(function (option) { return option.value; }).join(", ");
            }
        },

        PackageByType: function (type, container) {
            if (!container)
                container = document;

            var processedControls = [],
                returnValue = "",
                ctls = container.getElementsByTagName(type);

            for (var ii = 0; ii < ctls.length; ++ii) {
                if (ctls[ii].getAttribute("no-qs") === "1")
                    continue;

                var name = ctls[ii].name || ctls[ii].getAttribute("name"),
                    isXml = type === "textarea" && ctls[ii].getAttribute("isXml") !== undefined ? ctls[ii].getAttribute("isXml") : null;

                if (name && (name.indexOf("upl_C") === 0 || name.indexOf("cmsForms_") === 0 || name.indexOf("cmsFormS_") === 0)) {
                    if (_.ControlHasBeenProcessed(processedControls, name))
                        continue;

                    processedControls[processedControls.length] = name;

                    if (isXml !== null) {
                        returnValue += NWS.Xml.MakeStartTag(name, [{ name: "isXml", value: isXml }], true);
                        returnValue += _.GetCommentValue(ctls[ii]);
                        returnValue += NWS.Xml.MakeEndTag(name);
                    }
                    else
                        returnValue += NWS.Xml.MakeTag(name, _.GetCommentValue(ctls[ii]), null, true);
                }
            }

            return returnValue;
        },

        PackageFormData: function (blockID) {
            var containerControl = NWS.Util.Get("DataDiv_" + blockID),
                packagedData = [
                    NWS.Xml.MakeStartTag("Data", null, false),
                    _.PackageByType("select", containerControl),
                    _.PackageByType("input", containerControl),
                    _.PackageByType("textarea", containerControl),
                    NWS.Xml.MakeTag("Captcha", _.ExtractCaptchaInfo(containerControl, blockID), null, false),
                    NWS.Xml.MakeEndTag("Data")
                ];

            return packagedData.join("");
        },

        MaskEdit: function (ctl) {
            if (!ctl)
                return;
            ctl.readOnly = true;
            ctl.classList.add("hideBorders");
        },

        UnMaskEdit: function (ctl) {
            if (!ctl)
                return;
            ctl.readOnly = false;
            ctl.classList.remove("hideBorders");
        },

        SFSubmitFormHandler: function (docID, blockID, doConfirm, useCaptcha, submitAction) {
            if (!NWS.FormSupport.SFGeneralValidate(docID, blockID, useCaptcha, window["FormSpecificValidation"]))
                return;

            if (!NWS.Util.Get("cmsForms_submitUDF") && submitAction === "ajax" && doConfirm === "1")
                return _.SFConfirmForm(blockID);

            NWS.FormSupport.SFFinalFormSubmit(docID, blockID, useCaptcha, submitAction);
        },

        SFConfirmForm: function (blockID) {
            _.SFDisableAll(NWS.Util.Get("DataDiv_" + blockID));
            NWS.Util.Get("VerifyMessage_" + blockID).style.display = "block";
            NWS.Util.Get("SubmitButtons_" + blockID).style.display = "none";
            NWS.Util.Get("ConfirmButtons_" + blockID).style.display = "block";
            NWS.Util.Get("cmsForms_DataNotProvided_" + blockID).style.display = "none";
            NWS.Util.Get("DataDiv_" + blockID).style.display = "block";
        },

        SFFormSubmitComplete: function (blockID, submitAction, ajaxResult) {
            let response = ajaxResult.response;
            _.ResetCaptcha(blockID);

            if (submitAction === "remotePost" && NWS.Util.Get("postURL_" + blockID)) {
                NWS.Util.QueryGet("form#routerForm").setAttribute("action", NWS.Util.Get("postURL_" + blockID).value);
                return NWS.Util.QueryGet("form#routerForm").submit();
            }

            if (!response.status) {
                NWS.Util.Get("DataDiv_" + blockID).style.display = "block";
                NWS.FormSupport.SFRespondToValidation(false, "formsubmit", response.message, "foo", blockID);
                _.ResetProcessingKey(blockID, response.data);
                if (NWS.Util.Get("cmsForms_submitUDF"))
                    NWS.Util.Get("SubmitButtons_" + String(blockID)).style.display = "none";
            }
            else if (NWS.Util.Get("ThankYouDiv_" + blockID)) {
                var thankYouDiv = NWS.Util.Get("ThankYouDiv_" + blockID);
                thankYouDiv.style.display = "block";
                NWS.Util.ScrollTo(thankYouDiv);
            }
            else if (NWS.Util.Get("followupUrl_" + blockID)) {
                var followupUrl = NWS.Util.Get("followupUrl_" + blockID).value,
                    lastIndex = followupUrl.lastIndexOf("DataID="),
                    dataIDParam = (response.docID && response.docID > 0 && lastIndex !== -1 && lastIndex === (followupUrl.length - 7)) ? response.docID : "";

                location.href = NWS.Util.Get("followupUrl_" + blockID).value + dataIDParam;
            }
        },

        SFEnableControl: function (ctlName) {
            var ctl = NWS.Util.Get(ctlName);
            if (ctl && ctl.tagName === "SELECT") {
                ctl.style.display = "block";

                if (NWS.Util.Get(ctl.id + "_mask"))
                    NWS.Util.Get(ctl.id + "_mask").parentNode.removeChild(NWS.Util.Get(ctl.id + "_mask"));
            }
            else if (ctl && ctl.tagName === 'INPUT' && ctl.type === 'checkbox')
                ctl.disabled = false;
            else if (!ctl || (ctl.tagName === 'INPUT' && ctl.type === 'radio')) {
                var ctlGroup = document.getElementsByName(ctlName);
                for (var ii = 0; ii < ctlGroup.length; ++ii)
                    ctlGroup[ii].disabled = false;
            }
            else // input and textareas
                _.UnMaskEdit(ctl);
        },

        SFDisableControl: function (ctlName) {
            var ctl = NWS.Util.Get(ctlName);
            if (ctl && ctl.tagName === "SELECT") {
                var parentNode = ctl.parentNode;
                if (!parentNode)
                    return window.alert("No parent element found for " + ctlName);

                var inputControl = document.createElement("input");
                if (!inputControl)
                    return window.alert("Unable to create element for " + ctlName);
                inputControl.id = ctl.id + "_mask";

                inputControl.value = [].slice.call(ctl.selectedOptions).map(function (option) { return option.textContent; }).join(", ");

                inputControl.className = ctl.className;
                parentNode.insertBefore(inputControl, ctl);
                _.MaskEdit(inputControl);
                ctl.style.display = "none";
            }
            else if (ctl && ctl.tagName === 'INPUT' && ctl.type === 'checkbox')
                ctl.disabled = true;
            else if (!ctl || (ctl.tagName === 'INPUT' && ctl.type === 'radio')) {
                var ctlGroup = document.getElementsByName(ctlName);
                for (var jj = 0; jj < ctlGroup.length; ++jj)
                    ctlGroup[jj].disabled = true;
            }
            else // input and textareas
                _.MaskEdit(ctl);
        },

        SFDisableAll: function (container) {
            if (!container)
                container = document;
            _.ActionByType("input", "disable", container, null);
            _.ActionByType("textarea", "disable", container, null);
            _.ActionByType("select", "disable", container, null);
        },

        SFEnableAll: function (container) {
            if (!container)
                container = document;
            _.ActionByType("input", "enable", container, null);
            _.ActionByType("textarea", "enable", container, null);
            _.ActionByType("select", "enable", container, null);
        },

        SFRemoveAllWhitespace: function (strValue) {
            return strValue.replace(/[\s|\240]/gi, "");
        },

        /******************* Validation Support ***************************/

        SFEditFieldHasValue: function (ctlName) {
            var ctl = NWS.Util.Get(ctlName);
            return ctl ? _.SFRemoveAllWhitespace(ctl.value) : false;
        },

        SFEditFieldMatchesRegEx: function (ctlName, regEx) {
            return NWS.Util.Get(ctlName).value.match(regEx) !== null;
        },

        SFEditFieldIsEmail: function (ctlName) {
            return _.SFEditFieldMatchesRegEx(ctlName, "^ *[\\w._\\-']+@[\\w._\\-]+\\.[\\w._\\-]* *$");
        },

        SFEditFieldIsPhone: function (ctlName, bNonUS) {
            return bNonUS ? _.SFEditFieldMatchesRegEx(ctlName, "^[\\d\\.\\- ]*$") : _.SFEditFieldMatchesRegEx(ctlName, "^ *\\(?\\d{3}\\)?[) -.]\\d{3}[ -.]\\d{4} *$");
        },

        SFEditFieldIsDate: function (ctlName) {
            var ctl = NWS.Util.Get(ctlName);
            if (!ctl || !ctl.value)
                return true;

            return NWS.FormSupport.ValueIsDate(ctl.value);
        },

        /******************* Captcha Support ***************************/

        ClientSideCaptchaValidate: function (cmsFormsSuffix, recaptchaDivSuffix) {
            // Global "UseCaptcha" may have been set to true, but we check for the existence of the 
            // Recaptcha divs in case they were turned off in the workstation at the block level.
            // If they were turned off, then we don't want to interrupt the submission of the form
            // by returning false, so we return true indicating the form is free to proceed with
            // submission.
            if (!NWS.Util.Get("cmsForms_CommentingCaptchaEnabled_" + cmsFormsSuffix) ||
                NWS.Util.Get("cmsForms_CommentingCaptchaEnabled_" + cmsFormsSuffix).value !== "1")
                return true;

            if (!NWS.Util.Get("cmsForms_TitanRatingReCaptchaZone_" + cmsFormsSuffix))
                return true;

            if (!NWS.Util.Get("recaptcha-container-" + recaptchaDivSuffix))
                return true;

            var recaptchaDisplayType = NWS.Util.Get("recaptcha-container-" + recaptchaDivSuffix).getAttribute("data-displaytype");
            if (!recaptchaDisplayType || recaptchaDisplayType === 'invisible') {
                // For invisible recaptchas we already executed the check, so we just return true here as we have already grabbed the token.
                return true;
            }
            else {
                // Snag the token and store it off prior to sending the data package back to the server
                var tokenContainer = NWS.Util.Get("cmsForms_CaptchaResponseToken_" + cmsFormsSuffix);
                var recaptchaResponse = grecaptcha.getResponse();
                if (tokenContainer && recaptchaResponse)
                    tokenContainer.value = recaptchaResponse;

                return NWS.FormSupport.SFRespondToValidation(recaptchaResponse, "titan_captcha", "You must respond to the Recaptcha request.", "cmsForms_TitanCaptcha", cmsFormsSuffix);
            }
        },

        recaptchaLoadedFunctions: [],

        RecaptchaLoaded: function () {
            if (_.recaptchaLoadedFunctions && Array.isArray(_.recaptchaLoadedFunctions))
                for (var i = 0; i < _.recaptchaLoadedFunctions.length; i++) {
                    var recaptchaFunction = _.recaptchaLoadedFunctions[i];
                    if (recaptchaFunction && typeof recaptchaFunction === 'function') {
                        recaptchaFunction();
                    }
                }
        },

        ResetCaptcha: function (widgetSuffix) {
            try {
                if (window["grecaptcha"] && grecaptcha.render) {
                    var widgetID = NWS.Util.Get('recaptcha-widget-id-' + widgetSuffix).value;
                    grecaptcha.reset(widgetID);
                }
            }
            catch (e) {
                // if it fails, it fails. We tried
            }
        },

        ExtractCaptchaInfo: function (containerControl, suffix) {
            if (!window["grecaptcha"])
                return;

            var tokenContainer = NWS.Util.Get("cmsForms_CaptchaResponseToken_" + suffix);
            if (!tokenContainer)
                return;

            return NWS.Xml.MakeTag("RecaptchaResponse", tokenContainer.value, null, true);
        },

        CheckForInvisibleRecaptchaForm: function (docID, blockID, doConfirm, useCaptcha, submitAction) {
            // If we haven't set up the HTML correctly to use the invisible captcha system, then just submit the
            // form and return.
            if (!NWS.Util.Get("cmsForms_CommentingCaptchaEnabled_" + blockID) ||
                NWS.Util.Get("cmsForms_CommentingCaptchaEnabled_" + blockID).value !== "1") {
                _.SFSubmitFormHandler(docID, blockID, doConfirm, useCaptcha, submitAction);
                return;
            }

            if (!NWS.Util.Get("recaptcha-container-" + blockID)) {
                _.SFSubmitFormHandler(docID, blockID, doConfirm, useCaptcha, submitAction);
                return;
            }

            // We have all the parts for the invisible recaptcha to work.  Execute the check and return.
            var recaptchaDisplayType = NWS.Util.Get("recaptcha-container-" + blockID).getAttribute("data-displaytype");
            if (recaptchaDisplayType && recaptchaDisplayType === 'invisible') {
                var recaptchaID = NWS.Util.Get('recaptcha-widget-id-' + blockID).value;
                grecaptcha.execute(recaptchaID);
                return;
            }

            // Not using invisible recaptcha, so allow the form to proceed.
            _.SFSubmitFormHandler(docID, blockID, doConfirm, useCaptcha, submitAction);
        }
    };

    return {
        SFSubmitFormHandler: function (docID, blockID, doConfirm, useCaptcha, submitAction) {
            _.SFSubmitFormHandler(docID, blockID, doConfirm, useCaptcha, submitAction);
        },

        SFSubmitForm: function (docID, blockID, doConfirm, useCaptcha, submitAction) {
            if (useCaptcha === "1") {
                _.CheckForInvisibleRecaptchaForm(docID, blockID, doConfirm, useCaptcha, submitAction);
                return;
            }

            _.SFSubmitFormHandler(docID, blockID, doConfirm, useCaptcha, submitAction);
        },

        SFFinalFormSubmit: function (docID, blockID, useCaptcha, submitAction) {
            NWS.FormSupport.SFReturnToEdit(blockID);
            NWS.Util.Get("DataDiv_" + blockID).style.display = "none";
            _.HandleProcessingKey(blockID);

            if (submitAction === "post")
                return NWS.Util.QueryGet("form#routerForm").submit();

            var packagedData = _.PackageFormData(blockID),
                ajaxArgs = { docID, blockID, encodedData: NWS.Ajax.UrlToken.Encode(packagedData) },
                callback = NWS.Ajax.QueuedCallback("Forms_" + blockID, function (result) { _.SFFormSubmitComplete(blockID, submitAction, result); });

             NWS.Ajax.Post("/FormBlockAjax/ProcessComment", ajaxArgs, "json", callback);
            _.GTM_dlPush();
        },

        SFGetRadioDefaultValue: function (ctlSet) {
            var radios = document.getElementsByName(ctlSet);
            if (radios === null)
                return null;

            for (var ii = 0; ii < radios.length; ++ii)
                if (radios[ii].type !== "radio")
                    return null;
                else if (radios[ii].defaultChecked)
                    return radios[ii].value;

            return null;
        },

        SFGetRadioValue: function (ctlSet) {
            var radios = NWS.Util.GetSet(ctlSet);
            if (radios === null)
                return null;

            for (var ii = 0; ii < radios.length; ++ii)
                if (radios[ii].type !== "radio")
                    return null;
                else if (radios[ii].checked)
                    return radios[ii].value;

            return null;
        },

        SFGetSelectValue: function (ctlSet) {
            var options = NWS.Util.Get(ctlSet);
            if (options === null)
                return null;

            return [].slice.call(options.selectedOptions).map(function (option) { return option.value; }).join(", ");
        },

        SFGetSelectDefaultValue: function (ctlSet) {
            var options = NWS.Util.Get(ctlSet);
            if (options === null)
                return null;

            for (var ii = 0; ii < options.length; ++ii)
                if (options[ii].defaultSelected)
                    return options[ii].value;

            return null;
        },

        ValueIsDate: function (dateString) {
            var minDate = new Date(1901, 0, 1, 0, 0, 0),
                maxDate = new Date(2400, 11, 31, 23, 59, 59),
                pDate = Date.parse(dateString),
                date = isNaN(pDate) ? null : new Date(pDate);

            return date !== null && date >= minDate && date <= maxDate;
        },

        SFSetRadioValue: function (ctlName, ctlValue) {
            var ctl = document.getElementsByName(ctlName);
            if (ctl === null)
                return;

            if (ctl.length && ctl.length > 0)
                for (var ii = 0; ii < ctl.length; ++ii)
                    ctl[ii].checked = ctl[ii].value === ctlValue;
            else
                ctl.checked = ctl.value === ctlValue;
        },

        SFClearRadioButton: function (ctlName, ctlValue) {
            var ctl = document.getElementsByName(ctlName);
            if (ctl === null)
                return;

            for (var ii = 0; clt.length && ii < ctl.length; ++ii)
                if (ctl[ii].value === ctlValue)
                    ctl[ii].selected = ctl[ii].checked = false; 
        },
        
        SFSetControlValue: function (ctlName, ctlValue, bFireChangeEvent) {
            var ctl = NWS.Util.Get(ctlName);
            if (ctl === null) {
                ctl = document.getElementsByName(ctlName);
                if (ctl === null || ctl.length === 0)
                    return;
            }

            var arrayOfValues;
            if (ctl.tagName === "SELECT" && ctl.multiple)
                arrayOfValues = ctlValue.split(',');
            else
                arrayOfValues = [ctlValue];

            if (ctl.length && ctl.length > 0) {
                for (var ii = 0; ii < ctl.length; ++ii) {
                    ctl[ii].selected = false;
                    ctl[ii].checked = false;
                    ctl[ii].defaultChecked = false;
                    ctl[ii].defaultSelected = false;
                }

                for (var jj = 0; jj < arrayOfValues.length; ++jj) {
                    for (var kk = 0; kk < ctl.length; ++kk) {
                        if (ctl[kk].value.replace(/ /g, '') === arrayOfValues[jj].replace(/ /g, '')) {
                            ctl[kk].selected = true;
                            ctl[kk].checked = true;
                            ctl[kk].defaultChecked = true;
                            ctl[kk].defaultSelected = true;
                            if (bFireChangeEvent && ctl[kk].onclick)
                                ctl[kk].onclick();
                        }
                    }
                }

                // Handle dropdown's where the method is on the select            
                if (bFireChangeEvent && ctl.onchange)
                    ctl.onchange();
            }
            else if (ctl.tagName === "INPUT" && ctl.type === "file")
                ;
            else if (ctl.tagName === "INPUT" && ctl.type === "radio") {
                var ctlGroup = document.getElementsByName(ctlName);
                for (var mm = 0; mm < ctlGroup.length; ++mm)
                    if (ctlGroup[mm].value === ctlValue) {
                        ctlGroup[mm].checked = true;
                        if (bFireChangeEvent && ctl.onclick)
                            ctl.onclick();
                    }
            }
            else if (ctl.tagName === "INPUT" && ctl.type === "checkbox") {
                ctl.defaultChecked = ctl.checked = (ctlValue !== "" && ctlValue !== 0 && ctlValue !== "No" && ctlValue !== "off" && ctlValue !== false);
                if (bFireChangeEvent && ctl.onclick)
                    ctl.onclick();
            }
            else {
                ctl.value = ctlValue;
                ctl.defaultValue = ctlValue;
                if (bFireChangeEvent && ctl.onchange)
                    ctl.onchange();
            }
        },

        SFGetCheckboxState: function (ctlName) {
            var ctl = NWS.Util.Get(ctlName);
            return (ctl) ? ctl.checked : false;
        },

        SFValidateCheckboxesByRel: function (rel) {
            var retVal = false;
            var checkboxes = document.getElementsByTagName("INPUT");
            if (checkboxes === null || checkboxes.length === null || checkboxes.length === 0)
                return false;

            for (var ii = 0; ii < checkboxes.length; ++ii) {
                if (checkboxes[ii].type !== 'checkbox' || checkboxes[ii].getAttribute("rel") === null || checkboxes[ii].getAttribute("rel") !== rel)
                    continue;

                retVal = checkboxes[ii].checked;
                if (retVal)
                    break;
            }

            return retVal;
        },

        SFValidateControl: function (ctlName, suffix, container) {
            var messageName = "alert_" + ctlName,
                controlIsValid = true,
                ctl = NWS.Util.QueryGet("#"+ctlName, container),
                displayName = ctlName.substring(ctlName.indexOf('_') + 1),
                bIsRequired = false;

            if (ctl) {
                if (ctl.attributes["errorMessage"] && ctl.attributes["errorMessage"].value !== "")
                    displayName = ctl.attributes["errorMessage"].value;
                else if (ctl.attributes["errormessage"] && ctl.attributes["errormessage"].value !== "")
                    displayName = ctl.attributes["errormessage"].value;
                bIsRequired = ((ctl.attributes["isRequired"] && (ctl.attributes["isRequired"].value === '1' || ctl.attributes["isRequired"].value === 'true' || ctl.attributes["isRequired"].value === "isRequired")) ||
                    (ctl.attributes["isrequired"] && (ctl.attributes["isrequired"].value === '1' || ctl.attributes["isrequired"].value === 'true' || ctl.attributes["isrequired"].value === "isrequired")));
            }

            if (ctl && ctl.tagName === "SELECT") {
                if (bIsRequired) {
                    var selectedValue = NWS.FormSupport.SFGetSelectValue(ctlName);
                    if (!selectedValue || selectedValue === "")
                        controlIsValid = false;
                }

                NWS.FormSupport.SFRespondToValidation(controlIsValid, messageName, displayName, ctlName, suffix);
            }
            else if (ctl && ctl.tagName === 'INPUT' && ctl.type === 'checkbox') {
                if (bIsRequired) {
                    controlIsValid = (ctl.getAttribute("rel") !== null) ? NWS.FormSupport.SFValidateCheckboxesByRel(ctl.getAttribute("rel")) : ctl.checked;
                    NWS.FormSupport.SFRespondToValidation(controlIsValid, messageName, displayName, ctlName, suffix);
                }
            }
            else if (!ctl || (ctl.tagName === 'INPUT' && ctl.type === 'radio')) {
                if (!ctl) {
                    var ctlGroup = document.getElementsByName(ctlName);
                    if (ctlGroup && ctlGroup.length > 0) {
                        bIsRequired = ((ctlGroup[0].attributes["isRequired"] && (ctlGroup[0].attributes["isRequired"].value === 'true' || ctlGroup[0].attributes["isRequired"].value === "isRequired")) ||
                            (ctlGroup[0].attributes["isrequired"] && (ctlGroup[0].attributes["isrequired"].value === 'true' || ctlGroup[0].attributes["isrequired"].value === "isrequired")));

                        var firstCtl = ctlGroup[0];
                        if (firstCtl.attributes["errorMessage"] && firstCtl.attributes["errorMessage"].value !== "")
                            displayName = firstCtl.attributes["errorMessage"].value;
                        else if (firstCtl.attributes["errormessage"] && firstCtl.attributes["errormessage"].value !== "")
                            displayName = firstCtl.attributes["errormessage"].value;
                    }
                }

                if (bIsRequired) {
                    var selectedRadioValue = NWS.FormSupport.SFGetRadioValue(ctlName);
                    if (!selectedRadioValue || selectedRadioValue === "")
                        controlIsValid = false;
                }

                NWS.FormSupport.SFRespondToValidation(controlIsValid, messageName, displayName, ctlName, suffix);
            }
            else // input and textareas
            {
                var vType = ctl.attributes["validationType"] ? ctl.attributes["validationType"].value : "None",
                    bNeedsValidation = vType !== "None",
                    bIsOptional = !bIsRequired && bNeedsValidation,
                    regexp = ctl.getAttribute("regExp") || ctl.getAttribute("regexp");

                if (bIsRequired && !_.SFEditFieldHasValue(ctlName))
                    controlIsValid = false;
                else if (bIsOptional && !_.SFEditFieldHasValue(ctlName))
                    controlIsValid = true;
                else if (bNeedsValidation && vType === "Function") {
                    controlIsValid = false;
                    try {
                        controlIsValid = NWS.Modules.ExecuteFunctionByName(regexp, window, [ctlName]);
                    }
                    catch (e) {
                        if (e.message === "Cannot call method 'apply' of undefined")
                            displayName += " (could not locate validation function)";
                        else
                            displayName += " (error calling '" + regexp + "': " + e.message + ")";
                    }
                }
                else if (bNeedsValidation && !_.SFEditFieldMatchesRegEx(ctlName, regexp))
                    controlIsValid = false;

                NWS.FormSupport.SFRespondToValidation(controlIsValid, messageName, displayName, ctlName, suffix);
            }

            return controlIsValid;
        },

        SFGeneralValidate: function (docID, blockID, useCaptcha, specialValidationFunc) {
            var containerControl = NWS.Util.Get("DataDiv_" + blockID),
                dataErrorDiv = NWS.Util.Get("cmsForms_DataNotProvided_" + blockID);

            if (!containerControl) {
                window.alert("Form Container is Missing");
                return false;
            }

            NWS.Util.Get(containerControl.id).style.display = "none";
            var allPassed = true;

            if (specialValidationFunc)
                allPassed &= specialValidationFunc(blockID, docID);

            allPassed &= _.ActionByType("select", "validate", containerControl, blockID);
            allPassed &= _.ActionByType("input", "validate", containerControl, blockID);
            allPassed &= _.ActionByType("textarea", "validate", containerControl, blockID);

            if (useCaptcha === "1")
                allPassed &= _.ClientSideCaptchaValidate(blockID, blockID);

            if (!allPassed) {
                _.ResetCaptcha(blockID);
                NWS.Util.Get(containerControl.id).style.display = "block";
                if (dataErrorDiv)
                    NWS.Util.ScrollTo(dataErrorDiv);
                else
                    NWS.Util.ScrollTo(containerControl);
            }

            return allPassed;
        },

        SFReturnToEdit: function (blockID) {
            _.SFEnableAll(NWS.Util.Get("DataDiv_" + blockID));
            NWS.Util.Get("VerifyMessage_" + blockID).style.display = "none";
            NWS.Util.Get("SubmitButtons_" + blockID).style.display = "block";
            NWS.Util.Get("ConfirmButtons_" + blockID).style.display = "none";
            NWS.Util.Get("DataDiv_" + blockID).style.display = "block";
        },

        SFRespondToValidation: function (testHasPassed, msgName, message, ctlName, suffix) {
            var containingDiv = null;
            var errorCtl = NWS.Util.Get(ctlName + "_Error");
            if (errorCtl) {
                containingDiv = errorCtl;
                while (containingDiv && containingDiv.tagName !== "DIV")
                    containingDiv = containingDiv.parentNode;

                if (containingDiv && containingDiv.tagName !== "DIV")
                    containingDiv = null;
            }

            if (testHasPassed) {
                NWS.FormSupport.SFRemoveMessage(msgName, suffix);
                if (containingDiv)
                    containingDiv.classList.remove("messageOn");
                return true;
            }
            else {
                NWS.FormSupport.SFDisplayMessage(msgName, message, suffix);
                if (containingDiv)
                    containingDiv.classList.add("messageOn");
                return false;
            }
        },

        /******************* Message Area Manipulation ***************************/

        SFExtractMessageControl: function (suffix) {
            var ctlName = "cmsForms_DataNotProvided";
            if (suffix)
                ctlName += "_" + suffix;
            return NWS.Util.Get(ctlName);
        },

        SFFindMessage: function (msgCtl, msgName) {
            var message = NWS.Util.Get(msgName);
            if (message)
                msgCtl.style.display = "block";
            return message;
        },

        SFMessageAreaHasMessage: function (suffix) {
            var ctl = NWS.FormSupport.SFExtractMessageControl(suffix);
            var embeddedDivs = ctl.getElementsByTagName("DIV");
            for (var ii = 0; ii < embeddedDivs.length; ++ii)
                if (embeddedDivs[ii].className && embeddedDivs[ii].className === "SFMessage")
                    return true;
            return false;
        },

        SFMessageAreaFinalAdjust: function (suffix) {
            var msgCtl = NWS.FormSupport.SFExtractMessageControl(suffix);
            if (NWS.FormSupport.SFMessageAreaHasMessage(suffix)) {
                msgCtl.style.display = "block";
                if (msgCtl.getAttribute("useClass") === "1")
                    msgCtl.classList.remove("error");
                else
                    msgCtl.style.display = "none";
            }
            else {
                if (msgCtl.getAttribute("useClass") === "1")
                    msgCtl.classList.add("error");
                else
                    msgCtl.style.display = "none";
            }
        },

        SFAddMessage: function (msgName, msgText, suffix) {
            var msgCtl = NWS.FormSupport.SFExtractMessageControl(suffix);
            if (NWS.FormSupport.SFFindMessage(msgCtl, msgName))
                return;

            var newMessage = document.createElement("DIV");
            newMessage.className = "SFMessage";
            newMessage.id = msgName;
            newMessage.textContent = msgText;

            msgCtl.appendChild(newMessage);

            if (msgCtl.getAttribute("useClass") === "1")
                msgCtl.classList.add("error");
            else
                msgCtl.style.display = "block";
            return true;
        },

        SFRemoveMessage: function (msgName, suffix) {
            var msgCtl = NWS.FormSupport.SFExtractMessageControl(suffix);
            var ctlToRemove = NWS.FormSupport.SFFindMessage(msgCtl, msgName);
            if (ctlToRemove === null || msgCtl === null)
                return;
            msgCtl.removeChild(ctlToRemove);

            if (msgCtl.getElementsByTagName("DIV").length > 0)
                return;

            if (msgCtl.getAttribute("useClass") === "1")
                msgCtl.classList.remove("error");
            else
                msgCtl.style.display = "none";
        },

        SFDisplayMessage: function (msgName, message, suffix) {
            if (NWS.FormSupport.SFFindMessage(NWS.FormSupport.SFExtractMessageControl(suffix), msgName))
                return;

            NWS.FormSupport.SFAddMessage(msgName, message, suffix);
        },

        SFSubmitFormUDFButton: function (ctl) {
            var parent = ctl.parentNode;
            while (parent)
                if (parent.tagName === "DIV" && parent.id && parent.id.indexOf("DataDiv_") === 0)
                    break;
                else
                    parent = parent.parentNode;

            if (!parent)
                return;

            var blockID = parent.getAttribute("blockID");
            if (!blockID)
                return;

            var realSubmit = NWS.Util.Get("formSubmit" + blockID);
            if (!realSubmit)
                return;

            return realSubmit.click();   
        },

        RecaptchaFunctionInit: function (docID, blockID, doConfirm, submitAction, publicKey, blockType, displayType) {
            var bindingArgs = {
                submitFunc: "",
                submitArgs: [],
                recaptchaContainerID: blockType === "comment" ? "recaptcha-container-comment-" + docID : "recaptcha-container-" + blockID,
                tokenContainerID: blockType === "comment" ? "cmsForms_CaptchaResponseToken_Comment_" + docID : "cmsForms_CaptchaResponseToken_" + blockID,
                widgetID: blockType === "comment" ? "recaptcha-widget-id-comment-" + docID : "recaptcha-widget-id-" + blockID,
                widgetConfig: {
                    sitekey: publicKey,
                    badge: "inline"
                }
            };

            if (displayType === "invisible")
                bindingArgs.widgetConfig.size = "invisible";

            if (blockType === "form") {
                bindingArgs.submitFunc = "NWS.FormSupport.SFSubmitFormHandler";
                bindingArgs.submitArgs = [docID, blockID, doConfirm, "1", submitAction];
            }
            else if (blockType === "comment") {
                bindingArgs.submitFunc = "NWS.Block.Comments.CRValidateAndSubmitHandler";
                bindingArgs.submitArgs = [];
            }
            else if (blockType === "data") {
                bindingArgs.submitFunc = "NWS.Block.DataEditor.HandleSubmit";
                bindingArgs.submitArgs = [docID, blockID, doConfirm, "1", submitAction];
            }

            _.recaptchaLoadedFunctions.push(function () {
                var callbackBindingArgs = {
                    submitFunc: this.submitFunc,
                    submitArgs: this.submitArgs,
                    tokenContainerID: this.tokenContainerID,
                    recaptchaContainerID: this.recaptchaContainerID
                };

                this.widgetConfig.callback = function (token) {
                    document.getElementById(this.tokenContainerID).value = token;
                    if (document.getElementById(this.recaptchaContainerID).getAttribute("data-displaytype") === "invisible")
                        NWS.Modules.ExecuteFunctionByName(this.submitFunc, window, this.submitArgs);
                }.bind(callbackBindingArgs);

                var widgetID = grecaptcha.render(this.recaptchaContainerID, this.widgetConfig);
                document.getElementById(this.widgetID).value = widgetID;
            }.bind(bindingArgs));

            _.RecaptchaLoaded();
        },

        ClientSideCaptchaValidate: function (cmsFormsSuffix, recaptchaDivSuffix) {
            _.ClientSideCaptchaValidate(cmsFormsSuffix, recaptchaDivSuffix);
        },

        ExtractCaptchaInfo: function (containerControl, suffix) {
            return _.ExtractCaptchaInfo(containerControl, suffix);
        },

        ActionByType: function (type, action, container, suffix) {
            return _.ActionByType(type, action, container, suffix);
        },

        PackageByType: function (type, container) {
            return _.PackageByType(type, container);
        },

        ResetCaptcha: function (widgetSuffix) {
            _.ResetCaptcha(widgetSuffix);
        }
    };
});