NWS.initNamespace("NWS.Block.FormBlock",function(){var _={};return{Init:function(jsModules,callbacks){NWS.Modules.LoadResources(jsModules,callbacks)},InitFormBlockMappings:function(){if(!NWS.FormSupport){setTimeout(NWS.Block.FormBlock.InitFormBlockMappings,100,null);return}if(!window["SFSubmitFormUDFButton"])window["SFSubmitFormUDFButton"]=NWS.FormSupport.SFSubmitFormUDFButton}}})