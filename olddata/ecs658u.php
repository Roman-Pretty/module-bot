<!DOCTYPE html>

<html  dir="ltr" lang="en" xml:lang="en">
<head>
    <title>Course: ECS658U - Further Object Oriented Programming - 2024/25 | MyQMUL</title>
    <link rel="shortcut icon" href="//qmplus.qmul.ac.uk/pluginfile.php/1/theme_catawesome/favicon/1730236564/favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="moodle, Course: ECS658U - Further Object Oriented Programming - 2024/25 | MyQMUL" />
<link rel="stylesheet" type="text/css" href="https://qmplus.qmul.ac.uk/theme/yui_combo.php?rollup/3.18.1/yui-moodlesimple-min.css" /><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="https://qmplus.qmul.ac.uk/theme/styles.php/catawesome/1730236564_1729024339/all" />
<link rel="stylesheet" type="text/css" href="https://qmplus.qmul.ac.uk/local/bfaltformat/css/default.css" />
<script>
//<![CDATA[
var M = {}; M.yui = {};
M.pageloadstarttime = new Date();
M.cfg = {"wwwroot":"https:\/\/qmplus.qmul.ac.uk","homeurl":{},"sesskey":"W8ymbnpm5r","sessiontimeout":"7200","sessiontimeoutwarning":1200,"themerev":"1730236564","slasharguments":1,"theme":"catawesome","iconsystemmodule":"core\/icon_system_fontawesome","jsrev":"1729024113","admin":"admin","svgicons":true,"usertimezone":"Europe\/London","language":"en","courseId":12696,"courseContextId":1764631,"contextid":1764631,"contextInstanceId":12696,"langrev":1730428209,"templaterev":"1729024113"};var yui1ConfigFn = function(me) {if(/-skin|reset|fonts|grids|base/.test(me.name)){me.type='css';me.path=me.path.replace(/\.js/,'.css');me.path=me.path.replace(/\/yui2-skin/,'/assets/skins/sam/yui2-skin')}};
var yui2ConfigFn = function(me) {var parts=me.name.replace(/^moodle-/,'').split('-'),component=parts.shift(),module=parts[0],min='-min';if(/-(skin|core)$/.test(me.name)){parts.pop();me.type='css';min=''}
if(module){var filename=parts.join('-');me.path=component+'/'+module+'/'+filename+min+'.'+me.type}else{me.path=component+'/'+component+'.'+me.type}};
YUI_config = {"debug":false,"base":"https:\/\/qmplus.qmul.ac.uk\/lib\/yuilib\/3.18.1\/","comboBase":"https:\/\/qmplus.qmul.ac.uk\/theme\/yui_combo.php?","combine":true,"filter":null,"insertBefore":"firstthemesheet","groups":{"yui2":{"base":"https:\/\/qmplus.qmul.ac.uk\/lib\/yuilib\/2in3\/2.9.0\/build\/","comboBase":"https:\/\/qmplus.qmul.ac.uk\/theme\/yui_combo.php?","combine":true,"ext":false,"root":"2in3\/2.9.0\/build\/","patterns":{"yui2-":{"group":"yui2","configFn":yui1ConfigFn}}},"moodle":{"name":"moodle","base":"https:\/\/qmplus.qmul.ac.uk\/theme\/yui_combo.php?m\/1729024113\/","combine":true,"comboBase":"https:\/\/qmplus.qmul.ac.uk\/theme\/yui_combo.php?","ext":false,"root":"m\/1729024113\/","patterns":{"moodle-":{"group":"moodle","configFn":yui2ConfigFn}},"filter":null,"modules":{"moodle-core-chooserdialogue":{"requires":["base","panel","moodle-core-notification"]},"moodle-core-handlebars":{"condition":{"trigger":"handlebars","when":"after"}},"moodle-core-actionmenu":{"requires":["base","event","node-event-simulate"]},"moodle-core-dragdrop":{"requires":["base","node","io","dom","dd","event-key","event-focus","moodle-core-notification"]},"moodle-core-formchangechecker":{"requires":["base","event-focus","moodle-core-event"]},"moodle-core-maintenancemodetimer":{"requires":["base","node"]},"moodle-core-blocks":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification"]},"moodle-core-event":{"requires":["event-custom"]},"moodle-core-lockscroll":{"requires":["plugin","base-build"]},"moodle-core-notification":{"requires":["moodle-core-notification-dialogue","moodle-core-notification-alert","moodle-core-notification-confirm","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-core-notification-dialogue":{"requires":["base","node","panel","escape","event-key","dd-plugin","moodle-core-widget-focusafterclose","moodle-core-lockscroll"]},"moodle-core-notification-alert":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-confirm":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-exception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core-notification-ajaxexception":{"requires":["moodle-core-notification-dialogue"]},"moodle-core_availability-form":{"requires":["base","node","event","event-delegate","panel","moodle-core-notification-dialogue","json"]},"moodle-backup-backupselectall":{"requires":["node","event","node-event-simulate","anim"]},"moodle-course-management":{"requires":["base","node","io-base","moodle-core-notification-exception","json-parse","dd-constrain","dd-proxy","dd-drop","dd-delegate","node-event-delegate"]},"moodle-course-categoryexpander":{"requires":["node","event-key"]},"moodle-course-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-course-coursebase","moodle-course-util"]},"moodle-course-util":{"requires":["node"],"use":["moodle-course-util-base"],"submodules":{"moodle-course-util-base":{},"moodle-course-util-section":{"requires":["node","moodle-course-util-base"]},"moodle-course-util-cm":{"requires":["node","moodle-course-util-base"]}}},"moodle-form-shortforms":{"requires":["node","base","selector-css3","moodle-core-event"]},"moodle-form-dateselector":{"requires":["base","node","overlay","calendar"]},"moodle-question-chooser":{"requires":["moodle-core-chooserdialogue"]},"moodle-question-searchform":{"requires":["base","node"]},"moodle-question-preview":{"requires":["base","dom","event-delegate","event-key","core_question_engine"]},"moodle-availability_completion-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_date-form":{"requires":["base","node","event","io","moodle-core_availability-form"]},"moodle-availability_grade-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_group-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_grouping-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_profile-form":{"requires":["base","node","event","moodle-core_availability-form"]},"moodle-availability_xp-form":{"requires":["base","node","event","handlebars","moodle-core_availability-form"]},"moodle-mod_aspirelists-inline_display":{"requires":["base","node","event","event-delegate"]},"moodle-mod_assign-history":{"requires":["node","transition"]},"moodle-mod_attendance-groupfilter":{"requires":["base","node"]},"moodle-mod_checklist-linkselect":{"requires":["node","event-valuechange"]},"moodle-mod_hsuforum-article":{"requires":["base","node","event","router","core_rating","querystring","moodle-mod_hsuforum-io","moodle-mod_hsuforum-livelog"]},"moodle-mod_hsuforum-io":{"requires":["base","io-base","io-form","io-upload-iframe","json-parse"]},"moodle-mod_hsuforum-livelog":{"requires":["widget"]},"moodle-mod_oublog-tagselector":{"requires":["base","node","autocomplete","autocomplete-filters","autocomplete-highlighters"]},"moodle-mod_oublog-savecheck":{"requires":["base","node","io","panel","moodle-core-notification-alert"]},"moodle-mod_quiz-dragdrop":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-base","moodle-mod_quiz-util-page","moodle-mod_quiz-util-slot","moodle-course-util"]},"moodle-mod_quiz-toolboxes":{"requires":["base","node","event","event-key","io","moodle-mod_quiz-quizbase","moodle-mod_quiz-util-slot","moodle-core-notification-ajaxexception"]},"moodle-mod_quiz-util":{"requires":["node","moodle-core-actionmenu"],"use":["moodle-mod_quiz-util-base"],"submodules":{"moodle-mod_quiz-util-base":{},"moodle-mod_quiz-util-slot":{"requires":["node","moodle-mod_quiz-util-base"]},"moodle-mod_quiz-util-page":{"requires":["node","moodle-mod_quiz-util-base"]}}},"moodle-mod_quiz-modform":{"requires":["base","node","event"]},"moodle-mod_quiz-quizbase":{"requires":["base","node"]},"moodle-mod_quiz-autosave":{"requires":["base","node","event","event-valuechange","node-event-delegate","io-form"]},"moodle-mod_quiz-questionchooser":{"requires":["moodle-core-chooserdialogue","moodle-mod_quiz-util","querystring-parse"]},"moodle-mod_scheduler-delselected":{"requires":["base","node","event"]},"moodle-mod_scheduler-saveseen":{"requires":["base","node","event"]},"moodle-mod_scheduler-studentlist":{"requires":["base","node","event","io"]},"moodle-message_airnotifier-toolboxes":{"requires":["base","node","io"]},"moodle-block_xp-filters":{"requires":["base","node","moodle-core-dragdrop","moodle-core-notification-confirm","moodle-block_xp-rulepicker"]},"moodle-block_xp-rulepicker":{"requires":["base","node","handlebars","moodle-core-notification-dialogue"]},"moodle-block_xp-notification":{"requires":["base","node","handlebars","button-plugin","moodle-core-notification-dialogue"]},"moodle-filter_glossary-autolinker":{"requires":["base","node","io-base","json-parse","event-delegate","overlay","moodle-core-event","moodle-core-notification-alert","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-editor_atto-editor":{"requires":["node","transition","io","overlay","escape","event","event-simulate","event-custom","node-event-html5","node-event-simulate","yui-throttle","moodle-core-notification-dialogue","moodle-editor_atto-rangy","handlebars","timers","querystring-stringify"]},"moodle-editor_atto-plugin":{"requires":["node","base","escape","event","event-outside","handlebars","event-custom","timers","moodle-editor_atto-menu"]},"moodle-editor_atto-menu":{"requires":["moodle-core-notification-dialogue","node","event","event-custom"]},"moodle-editor_atto-rangy":{"requires":[]},"moodle-report_eventlist-eventfilter":{"requires":["base","event","node","node-event-delegate","datatable","autocomplete","autocomplete-filters"]},"moodle-report_loglive-fetchlogs":{"requires":["base","event","node","io","node-event-delegate"]},"moodle-gradereport_history-userselector":{"requires":["escape","event-delegate","event-key","handlebars","io-base","json-parse","moodle-core-notification-dialogue"]},"moodle-qbank_editquestion-chooser":{"requires":["moodle-core-chooserdialogue"]},"moodle-tool_lp-dragdrop-reorder":{"requires":["moodle-core-dragdrop"]},"moodle-local_kaltura-ltipanel":{"requires":["base","node","panel","node-event-simulate"]},"moodle-local_kaltura-ltiservice":{"requires":["base","node","node-event-simulate"]},"moodle-local_kaltura-lticontainer":{"requires":["base","node"]},"moodle-local_kaltura-ltitinymcepanel":{"requires":["base","node","panel","node-event-simulate"]},"moodle-assignfeedback_editpdf-editor":{"requires":["base","event","node","io","graphics","json","event-move","event-resize","transition","querystring-stringify-simple","moodle-core-notification-dialog","moodle-core-notification-alert","moodle-core-notification-warning","moodle-core-notification-exception","moodle-core-notification-ajaxexception"]},"moodle-atto_accessibilitychecker-button":{"requires":["color-base","moodle-editor_atto-plugin"]},"moodle-atto_accessibilityhelper-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_align-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bfimage-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bflink-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_bold-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_charmap-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_clear-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_collapse-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_computing-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_echo360attoplugin-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_embedquestion-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emojipicker-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_emoticon-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_equation-button":{"requires":["moodle-editor_atto-plugin","moodle-core-event","io","event-valuechange","tabview","array-extras"]},"moodle-atto_fontfamily-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_fullscreen-button":{"requires":["event-resize","moodle-editor_atto-plugin"]},"moodle-atto_h5p-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_html-beautify":{},"moodle-atto_html-button":{"requires":["promise","moodle-editor_atto-plugin","moodle-atto_html-beautify","moodle-atto_html-codemirror","event-valuechange"]},"moodle-atto_html-codemirror":{"requires":["moodle-atto_html-codemirror-skin"]},"moodle-atto_htmlplus-beautify":{},"moodle-atto_htmlplus-button":{"requires":["moodle-editor_atto-plugin","moodle-atto_htmlplus-beautify","moodle-atto_htmlplus-codemirror","event-valuechange"]},"moodle-atto_htmlplus-codemirror":{"requires":["moodle-atto_htmlplus-codemirror-skin"]},"moodle-atto_image-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_indent-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_italic-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_kalturamedia-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_link-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_managefiles-usedfiles":{"requires":["node","escape"]},"moodle-atto_media-button":{"requires":["moodle-editor_atto-plugin","moodle-form-shortforms"]},"moodle-atto_noautolink-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_orderedlist-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_recordrtc-button":{"requires":["moodle-editor_atto-plugin","moodle-atto_recordrtc-recording"]},"moodle-atto_recordrtc-recording":{"requires":["moodle-atto_recordrtc-button"]},"moodle-atto_rtl-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_snippet-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_strike-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_subscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_superscript-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_table-button":{"requires":["moodle-editor_atto-plugin","moodle-editor_atto-menu","event","event-valuechange"]},"moodle-atto_title-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_underline-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_undo-button":{"requires":["moodle-editor_atto-plugin"]},"moodle-atto_unorderedlist-button":{"requires":["moodle-editor_atto-plugin"]}}},"gallery":{"name":"gallery","base":"https:\/\/qmplus.qmul.ac.uk\/lib\/yuilib\/gallery\/","combine":true,"comboBase":"https:\/\/qmplus.qmul.ac.uk\/theme\/yui_combo.php?","ext":false,"root":"gallery\/1729024113\/","patterns":{"gallery-":{"group":"gallery"}}}},"modules":{"core_filepicker":{"name":"core_filepicker","fullpath":"https:\/\/qmplus.qmul.ac.uk\/lib\/javascript.php\/1729024113\/repository\/filepicker.js","requires":["base","node","node-event-simulate","json","async-queue","io-base","io-upload-iframe","io-form","yui2-treeview","panel","cookie","datatable","datatable-sort","resize-plugin","dd-plugin","escape","moodle-core_filepicker","moodle-core-notification-dialogue"]},"core_comment":{"name":"core_comment","fullpath":"https:\/\/qmplus.qmul.ac.uk\/lib\/javascript.php\/1729024113\/comment\/comment.js","requires":["base","io-base","node","json","yui2-animation","overlay","escape"]},"block_module_info":{"name":"block_module_info","fullpath":"https:\/\/qmplus.qmul.ac.uk\/lib\/javascript.php\/1729024113\/blocks\/module_info\/module.js","requires":[]}},"logInclude":[],"logExclude":[],"logLevel":null};
M.yui.loader = {modules: {}};

//]]>
</script>

<meta name="moodle-validation" content="be00aa8ff821040a99d712a065054d52" />
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2LDYRTL88Z"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2LDYRTL88Z');
</script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40382424-1']);
  _gaq.push(['_setDomainName', 'qmul.ac.uk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://analytics.euoffice.catalyst-eu.net/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '6']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

<!-- Dynatrace -->
<script type="text/javascript" src="https://dok.js-cdn.dynatrace.com/jstag/17dc3dca4c8/bf91175sbx/12467143fd6c3876_complete.js" crossorigin="anonymous"></script>
<!-- End Dynatrace  Code -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,700;1,500;1,700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body  id="page-course-view-qmultopics" class="format-qmultopics tabsloading limitedwidth  path-course path-course-view chrome android dir-ltr lang-en yui-skin-sam yui3-skin-sam qmplus-qmul-ac-uk pagelayout-course course-12696 context-1764631 category-384 theme uses-drawers hamburger-left custom-header" >

<div class="toast-wrapper mx-auto py-0 fixed-top" role="status" aria-live="polite"></div>

<div id="page-wrapper" class="d-print-block">

    <div>
    <a class="sr-only sr-only-focusable" href="#maincontent">Skip to main content</a>
</div><script src="https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/lib/polyfills/polyfill.js"></script>
<script src="https://qmplus.qmul.ac.uk/theme/yui_combo.php?rollup/3.18.1/yui-moodlesimple-min.js"></script><script src="https://qmplus.qmul.ac.uk/theme/jquery.php/core/jquery-3.7.1.min.js"></script>
<script src="https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/lib/javascript-static.js"></script>
<script>
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>


<!-- Queen Mary, University of London -->

    <nav class="fixed-top navbar navbar-expand moodle-has-zindex" aria-label="Site navigation">
        <div data-region="drawer-toggle" class="drawer-toggle hamburger-left">
            <button aria-expanded="false" aria-controls="nav-drawer" type="button" class="navbar-toggler aabtn d-block" data-action="toggle-drawer" data-side="left" data-preference="drawer-open-nav"><i class="icon fa fa-bars fa-fw "   ></i><span class="sr-only">Side panel</span></button>
        </div>
    
        <a href="https://qmplus.qmul.ac.uk" class="navbar-brand d-flex align-items-center m-0 p-0 aabtn has-logo 
            ">
            <span class="logo">
                <img src="//qmplus.qmul.ac.uk/pluginfile.php/1/theme_catawesome/logo/1730236564/qm-logo-white.svg" alt="MyQMUL">
            </span>
    
        </a>
    
    
        <ul class="navbar-nav d-none d-md-flex">
            <!-- my_courses -->
            
            <li class="primary-navigation">
                <nav class="moremenu navigation">
                    <ul id="moremenu-6729ef396ac6e-navbar-nav" role="menubar" class="nav more-nav navbar-nav">
                                <li data-key="home" class="nav-item" role="none" data-forceintomoremenu="false">
                                            <a role="menuitem" class="nav-link  "
                                                href="https://qmplus.qmul.ac.uk/?redirect=0"
                                                
                                                
                                                data-disableactive="true"
                                                tabindex="-1"
                                            >
                                                Home
                                            </a>
                                </li>
                                <li data-key="myhome" class="nav-item" role="none" data-forceintomoremenu="false">
                                            <a role="menuitem" class="nav-link  "
                                                href="https://qmplus.qmul.ac.uk/my/"
                                                
                                                
                                                data-disableactive="true"
                                                tabindex="-1"
                                            >
                                                Dashboard
                                            </a>
                                </li>
                                <li data-key="mycourses" class="nav-item" role="none" data-forceintomoremenu="false">
                                            <a role="menuitem" class="nav-link  "
                                                href="https://qmplus.qmul.ac.uk/my/courses.php"
                                                
                                                
                                                data-disableactive="true"
                                                tabindex="-1"
                                            >
                                                My Modules
                                            </a>
                                </li>
                                <li data-key="" class="nav-item" role="none" data-forceintomoremenu="false">
                                            <a role="menuitem" class="nav-link  "
                                                href="https://qmplus.qmul.ac.uk/course/"
                                                
                                                
                                                data-disableactive="true"
                                                tabindex="-1"
                                            >
                                                All Modules
                                            </a>
                                </li>
                                <li class="dropdown nav-item" role="none" data-forceintomoremenu="false">
                                    <a class="dropdown-toggle nav-link  " id="drop-down-6729ef396abb3" role="menuitem" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" href="#" aria-controls="drop-down-menu-6729ef396abb3"
                                        
                                        
                                        tabindex="-1"
                                    >
                                        Help
                                    </a>
                                    <div class="dropdown-menu" role="menu" id="drop-down-menu-6729ef396abb3" aria-labelledby="drop-down-6729ef396abb3">
                                                    <a class="dropdown-item" role="menuitem" href="http://its.qmul.ac.uk"  data-disableactive="true" tabindex="-1"
                                                        
                                                    >
                                                        Raise a Ticket
                                                    </a>
                                                    <a class="dropdown-item" role="menuitem" href="https://elearning.qmul.ac.uk/learning-applications/qmplus/"  data-disableactive="true" tabindex="-1"
                                                        
                                                    >
                                                        User Guides
                                                    </a>
                                    </div>
                                </li>
                        <li role="none" class="nav-item dropdown dropdownmoremenu d-none" data-region="morebutton">
                            <a class="dropdown-toggle nav-link " href="#" id="moremenu-dropdown-6729ef396ac6e" role="menuitem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                More
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left" data-region="moredropdown" aria-labelledby="moremenu-dropdown-6729ef396ac6e" role="menu">
                            </ul>
                        </li>
                    </ul>
                </nav>
            </li>
        </ul>
    
        <div id="usernavigation" class="navbar-nav ml-auto">
            <div id="searchinput-navbar-6729ef396c22f6729ef389aae96" class="simplesearchform">
    <div class="collapse" id="searchform-navbar">
        <form autocomplete="off" action="https://qmplus.qmul.ac.uk/search/index.php" method="get" accept-charset="utf-8" class="mform form-inline searchform-navbar">
                <input type="hidden" name="context" value="1764631">
            <div class="input-group">
                <label for="searchinput-6729ef396c22f6729ef389aae96">
                    <span class="sr-only">Search</span>
                </label>
                    <input type="text"
                       id="searchinput-6729ef396c22f6729ef389aae96"
                       class="form-control withclear"
                       placeholder="Search"
                       aria-label="Search"
                       name="q"
                       data-region="input"
                       autocomplete="off"
                    >
                    <a class="btn btn-close"
                        data-action="closesearch"
                        data-toggle="collapse"
                        href="#searchform-navbar"
                        role="button"
                    >
                        <i class="icon fa fa-times fa-fw "   ></i>
                        <span class="sr-only">Close</span>
                    </a>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-submit" data-action="submit">
                        <i class="icon fa fa-search fa-fw "   ></i>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <a
        class="btn btn-open rounded-0 nav-link"
        data-toggle="collapse"
        data-action="opensearch"
        href="#searchform-navbar"
        role="button"
        aria-expanded="false"
        aria-controls="searchform-navbar"
        title="Toggle search input"
    >
        <i class="icon fa fa-search fa-fw "   ></i>
        <span class="sr-only">Toggle search input</span>
    </a>
</div>
            <div class="popover-region collapsed popover-region-notifications"
    id="nav-notification-popover-container" data-userid="14551592"
    data-region="popover-region">
    <div class="popover-region-toggle nav-link icon-no-margin"
        data-region="popover-region-toggle"
        role="button"
        aria-controls="popover-region-container-6729ef39972756729ef389aae97"
        aria-haspopup="true"
        aria-label="  Show notification window with 6 new notifications  "
        tabindex="0">
                <i class="icon fa fa-bell fa-fw "  title="Toggle notifications menu" role="img" aria-label="Toggle notifications menu"></i>
        <div
            class="count-container "
            data-region="count-container"
            aria-hidden=true
        >
            6
        </div>

    </div>
    <div 
        id="popover-region-container-6729ef39972756729ef389aae97"
        class="popover-region-container"
        data-region="popover-region-container"
        aria-expanded="false"
        aria-hidden="true"
        aria-label="Notification window"
        role="region">
        <div class="popover-region-header-container">
            <h3 class="popover-region-header-text" data-region="popover-region-header-text">Notifications</h3>
            <div class="popover-region-header-actions" data-region="popover-region-header-actions">        <a class="mark-all-read-button"
           href="#"
           title="Mark all as read"
           data-action="mark-all-read"
           role="button"
           aria-label="Mark all as read">
            <span class="normal-icon"><i class="icon fa fa-check fa-fw "   ></i></span>
            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
        </a>
            <a href="https://qmplus.qmul.ac.uk/message/notificationpreferences.php"
               title="Notification preferences"
               aria-label="Notification preferences">
                <i class="icon fa icon-settings fa-fw "   ></i></a>
</div>
        </div>
        <div class="popover-region-content-container" data-region="popover-region-content-container">
            <div class="popover-region-content" data-region="popover-region-content">
                        <div class="all-notifications"
            data-region="all-notifications"
            role="log"
            aria-busy="false"
            aria-atomic="false"
            aria-relevant="additions"></div>
        <div class="empty-message" tabindex="0" data-region="empty-message">You have no notifications</div>

            </div>
            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
        </div>
                <a class="see-all-link"
                    href="https://qmplus.qmul.ac.uk/message/output/popup/notifications.php">
                    <div class="popover-region-footer-container">
                        <div class="popover-region-seeall-text">See all</div>
                    </div>
                </a>
    </div>
</div><div class="pull-right popover-region collapsed popover-region-messages">
    <a id="message-drawer-toggle-6729ef399a59b6729ef389aae98" class="nav-link d-inline-block popover-region-toggle position-relative" href="#">
        <i class="icon fa icon-bubble fa-fw "  title="Toggle messaging drawer" role="img" aria-label="Toggle messaging drawer"></i>
        <div class="count-container hidden" data-region="count-container">0</div>
    </a>
</div><div class="activitytodo-icon">
    <a href="https://qmplus.qmul.ac.uk/local/activitytodo" class="nav-link popover-region-toggle" tabindex="0">
        <div><i class="icon fa fa-list-ul fa-fw "  title="Activity to do list" role="img" aria-label="Activity to do list"></i></div>
    </a>
</div>
            <div class="d-flex align-items-stretch usermenu-container" data-region="usermenu">
                        <div class="usermenu">
                                <div class="dropdown show">
                                    <a href="#" role="button" id="user-menu-toggle" data-toggle="dropdown" aria-label="User menu"
                                       aria-haspopup="true" aria-controls="user-action-menu" class="btn dropdown-toggle">
                                        <span class="userbutton">
                                            <span class="avatars">
                                                    <span class="avatar current">
                                                        <span class="userinitials size-35" title="Roman James John Pretty" aria-label="Roman James John Pretty" role="img">RP</span>
                                                    </span>
                                            </span>
                                        </span>
                                    </a>
                                    <div id="user-action-menu" class="dropdown-menu dropdown-menu-right">
                                        <div id="usermenu-carousel" class="carousel slide" data-touch="false" data-interval="false" data-keyboard="false">
                                            <div class="carousel-inner">
                                                <div id="carousel-item-main" class="carousel-item active" role="menu" tabindex="-1" aria-label="User">
                                                            <a href="https://qmplus.qmul.ac.uk/user/profile.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Profile
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/blocks/module_info/timetable.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                My Timetable
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/calendar/view.php?view=month" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Calendar
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/local/qmul_dashboard/index.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Gradesplus 
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/local/mymedia/mymedia.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                My Media
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/user/files.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                My Files
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/mod/lti/view.php?id=2605484" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                QMplus Hub
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/local/bfaltformat/selfservice.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Accessibility File Conversion
                                                            </a>
                                                        
                                                            <a href="https://qmplus.qmul.ac.uk/reportbuilder/index.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Reports
                                                            </a>
                                                        
                                                        <div class="dropdown-divider"></div>
                                                            <a href="https://qmplus.qmul.ac.uk/user/preferences.php" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Preferences
                                                            </a>
                                                        <div class="dropdown-divider"></div>
                                                            <a href="https://qmplus.qmul.ac.uk/login/logout.php?sesskey=W8ymbnpm5r" class="dropdown-item" role="menuitem" tabindex="-1">
                                                                    
                                                                Log out
                                                            </a>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
            </div>
            
        </div>
    </nav>
        <div  class="drawer drawer-left  d-print-none not-initialized" data-region="fixed-drawer" id="theme_boost-drawers-courseindex" data-preference="drawer-open-index" data-state="show-drawer-left" data-forceopen="0" data-close-on-resize="0">
    <div class="drawerheader">
        <button
            class="btn drawertoggle icon-no-margin hidden"
            data-toggler="drawers"
            data-action="closedrawer"
            data-target="theme_boost-drawers-courseindex"
            data-toggle="tooltip"
            data-placement="right"
            title="Close course index"
        >
            <i class="icon fa fa-times fa-fw "   ></i>
        </button>
        
        <div class="drawerheadercontent hidden">
                            <div id="courseindexdrawercontrols" class="dropdown">
                    <button class="btn btn-icon rounded-circle mx-2"
                            type="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            title="Course index options"
                    >
                        <i class="icon fa fa-ellipsis-v fa-fw m-0" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item"
                           href="#"
                           data-action="expandallcourseindexsections"
                        >
                            <i class="icon fa fa-angles-down fa-fw "   ></i>
                            Expand all
                        </a>
                        <a class="dropdown-item"
                           href="#"
                           data-action="collapseallcourseindexsections"
                        >
                            <span class="dir-rtl-hide"><i class="icon fa fa-angles-right fa-fw "   ></i></span>
                            <span class="dir-ltr-hide"><i class="icon fa fa-angles-left fa-fw "   ></i></span>
                            Collapse all
                        </a>
                    </div>
                </div>

        </div>
    </div>
    <div class="drawercontent drag-container" data-usertour="scroller">
                        <nav id="courseindex" class="courseindex">
    <div id="courseindex-content">
        <div data-region="loading-placeholder-content" aria-hidden="true" id="6729ef39481776729ef389aae94-course-index-placeholder">
            <ul class="media-list">
                <li class="media">
                    <div class="media-body col-md-6 p-0 d-flex align-items-center">
                        <div class="bg-pulse-grey rounded-circle mr-2"></div>
                        <div class="bg-pulse-grey w-100"></div>
                    </div>
                </li>
                <li class="media">
                    <div class="media-body col-md-6 p-0 d-flex align-items-center">
                        <div class="bg-pulse-grey rounded-circle mr-2"></div>
                        <div class="bg-pulse-grey w-100"></div>
                    </div>
                </li>
                <li class="media">
                    <div class="media-body col-md-6 p-0 d-flex align-items-center">
                        <div class="bg-pulse-grey rounded-circle mr-2"></div>
                        <div class="bg-pulse-grey w-100"></div>
                    </div>
                </li>
                <li class="media">
                    <div class="media-body col-md-6 p-0 d-flex align-items-center">
                        <div class="bg-pulse-grey rounded-circle mr-2"></div>
                        <div class="bg-pulse-grey w-100"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

    </div>
</div>
        <div  class="drawer drawer-right d-print-none not-initialized" data-region="fixed-drawer" id="theme_boost-drawers-blocks" data-preference="drawer-open-block" data-state="show-drawer-right" data-forceopen="" data-close-on-resize="1">
    <div class="drawerheader">
        <button
            class="btn drawertoggle icon-no-margin hidden"
            data-toggler="drawers"
            data-action="closedrawer"
            data-target="theme_boost-drawers-blocks"
            data-toggle="tooltip"
            data-placement="left"
            title="Close block drawer"
        >
            <i class="icon fa fa-times fa-fw "   ></i>
        </button>
        
        <div class="drawerheadercontent hidden">
            
        </div>
    </div>
    <div class="drawercontent drag-container" data-usertour="scroller">
                        <section class="d-print-none" aria-label="Blocks">
                    
                    <aside id="block-region-side-pre" class="block-region" data-blockregion="side-pre" data-droptarget="1"><h2 class="sr-only">Blocks</h2><section id="inst1261597"
     class=" block_html block  card mb-3"
     role="complementary"
     data-block="html"
     data-instance-id="1261597"
        aria-label="Text"
>

    <div class="card-body p-3">



        <div class="card-text content mt-3">
            <div class="no-overflow"><p dir="ltr" style="text-align: left;"><a href="https://qmplus.qmul.ac.uk/mod/questionnaire/view.php?id=2720440" target="_blank" title="https://qmplus.qmul.ac.uk/mod/questionnaire/view.php?id=2720440"><img src="https://qmplus.qmul.ac.uk/pluginfile.php/4366234/block_html/content/New%20Project2222.gif" alt="" width="368" height="294" role="presentation" class="img-fluid atto_image_button_text-bottom"></a><br></p></div>
            <div class="footer"></div>
            
        </div>

    </div>

</section><a href="#sb-2" class="sr-only sr-only-focusable">Skip Module Info</a>

<section id="inst614505"
     class=" block_module_info block  card mb-3"
     role="complementary"
     data-block="module_info"
     data-instance-id="614505"
          aria-labelledby="instance-614505-header"
     >

    <div class="card-body p-3">

            <h3 id="instance-614505-header" class="h5 card-title d-inline">Module Info</h3>


        <div class="card-text content mt-3">
            <div id="modinfo-core-info" class="collapsibleregion core-info"><div id="modinfo-core-info_sizer"><div id="modinfo-core-info_caption" class="collapsibleregioncaption"><a href="#" id="modinfo-core-info_caption_anchor">Core Information</a></div><div id="modinfo-core-info_inner" class="collapsibleregioninner"><p class="module_specific"><span class="module_info_title">Code: </span><strong>ECS658U</strong></p><p class="module_specific"><span class="module_info_title">Level: </span><strong>6</strong></p><p class="module_specific"><span class="module_info_title">Credit Value: </span><strong>15</strong></p><p class="module_specific"><span class="module_info_title">Semester: </span><strong>A</strong></p></div></div></div><div id="modinfo-viewlet-teaching" class="collapsibleregion teaching-heading"><div id="modinfo-viewlet-teaching_sizer"><div id="modinfo-viewlet-teaching_caption" class="collapsibleregioncaption"><a href="#" id="modinfo-viewlet-teaching_caption_anchor">Teaching</a></div><div id="modinfo-viewlet-teaching_inner" class="collapsibleregioninner"><h2 class="convenor-heading">Module Organiser</h2><div class="staff-wrap clearfix"><div class="staff-image" style="max-width:50%;float:left;"><a href="https://qmplus.qmul.ac.uk/user/view.php?id=106355&amp;course=12696" class="d-inline-block aabtn"><img src="https://qmplus.qmul.ac.uk/pluginfile.php/1065700/user/icon/catawesome/f1?rev=101367497" class="staff-profile-pic" width="100" height="100" alt="Headshot made by Lensa" title="Headshot made by Lensa" /></a></div><div class="staff-info" style="max-width:50%;float:left;"><div class="staff-name">Simon Lucas</div><div class="staff-email"><a href="ma&#105;&#108;t&#111;:%73i%6d%6f%6e.lu%63%61%73@%71%6dul%2ea%63%2e%75k">&#115;&#105;&#109;&#111;&#110;.&#108;uc&#97;&#115;@&#113;m&#117;&#108;&#46;&#97;&#99;&#46;uk</a></div></div></div></div></div></div><div id="modinfo-viewlet-schedule" class="collapsibleregion schedule-heading"><div id="modinfo-viewlet-schedule_sizer"><div id="modinfo-viewlet-schedule_caption" class="collapsibleregioncaption"><a href="#" id="modinfo-viewlet-schedule_caption_anchor">Schedule</a></div><div id="modinfo-viewlet-schedule_inner" class="collapsibleregioninner"><div id="schedule-pane"><div id="schedule"><div class="smart-link"><a target="_BLANK" href="https://ical.timetables.qmul.ac.uk/timezone.html?objectclass=student%2Bset&amp;week=14&amp;day=1-5&amp;period=1-28&amp;identifier=210327061&amp;style=individual&amp;template=swsnet%2Bobject%2Bindividual">Personal timetable</a></div><div class="smart-link"><a target="_BLANK" href="https://ical.timetables.qmul.ac.uk/timezone.html?objectclass=module&amp;week=14&amp;day=1-5&amp;period=1-28&amp;identifier=ECS658U-A24&amp;style=individual&amp;template=swsnet%2Bobject%2Bindividual">Module timetable</a></div></div></div></div></div></div>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-2"></span><a href="#sb-3" class="sr-only sr-only-focusable">Skip MySIS Assessment Pattern</a>

<section id="inst1243542"
     class=" block_html block  card mb-3"
     role="complementary"
     data-block="html"
     data-instance-id="1243542"
          aria-labelledby="instance-1243542-header"
     >

    <div class="card-body p-3">

            <h3 id="instance-1243542-header" class="h5 card-title d-inline">MySIS Assessment Pattern</h3>


        <div class="card-text content mt-3">
            <div class="no-overflow"><table style="width: 100%;">
  <tbody>
    <tr style="background-color: #6f809f; color: white; border: 1px solid black;">
      <th colspan="4">Assessment Items (ECS658U)</th>
    </tr>
    <tr style="background-color: #ffffff; border: 1px solid black;">
      <td><span>Seq<br></span></td>
      <td><span>Type&nbsp;<br></span></td>
      <td><span><br>Description&nbsp;<br><br></span></td>
      <td><span>Weight<br></span></td>
    </tr>
    <tr style="background-color: #fbfbfb; border: 1px solid black;"> <!-- Changed background color -->
      <td>001</td>
      <td>CWK</td>
      <td>Software Assignment 1</td>
      <td>30%</td>
    </tr>
    <tr style="background-color: #fbfbfb; border: 1px solid black;"> <!-- Changed background color -->
      <td>002</td>
      <td>EXN</td>
      <td>Term Test</td>
      <td>30%</td>
    </tr><tr style="border: 1px solid black;">
      <td>003</td>
      <td>CWK</td>
      <td>Software Assignment 2</td>
      <td>40%</td>
    </tr>
    
  </tbody>
</table><br><p style="text-align: center;"><span style="font-size: 1rem;"></span><span>This is the fixed MySIS Assessment Pattern.&nbsp;</span>This pattern is set and&nbsp;<u>unchangeable</u>.<strong style="font-size: 1rem;"><u></u></strong></p></div>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-3"></span><a href="#sb-7" class="sr-only sr-only-focusable">Skip Latest announcements</a>

<section id="inst931652"
     class=" block_news_items block  card mb-3"
     role="complementary"
     data-block="news_items"
     data-instance-id="931652"
          aria-labelledby="instance-931652-header"
     >

    <div class="card-body p-3">

            <h3 id="instance-931652-header" class="h5 card-title d-inline">Latest announcements</h3>


        <div class="card-text content mt-3">
            
<ul class='unlist'>
<li class="post"><div class="head clearfix"><div class="date">1 November 2024, 9:35 AM</div><div class="name">Simon Lucas</div></div><div class="info"><a href="https://qmplus.qmul.ac.uk/mod/forum/discuss.php?d=550450">Further OOP Lab week 6</a></div></li>
<li class="post"><div class="head clearfix"><div class="date">28 October 2024, 9:55 PM</div><div class="name">Simon Lucas</div></div><div class="info"><a href="https://qmplus.qmul.ac.uk/mod/forum/discuss.php?d=549392">Further OOP Assignment 1 handin and Week 6</a></div></li>
<li class="post"><div class="head clearfix"><div class="date">21 October 2024, 5:42 PM</div><div class="name">Simon Lucas</div></div><div class="info"><a href="https://qmplus.qmul.ac.uk/mod/forum/discuss.php?d=547274">Further OOP week 5</a></div></li>
<li class="post"><div class="head clearfix"><div class="date">18 October 2024, 9:07 AM</div><div class="name">Simon Lucas</div></div><div class="info"><a href="https://qmplus.qmul.ac.uk/mod/forum/discuss.php?d=546654">Further OOP Lab script 3</a></div></li>
<li class="post"><div class="head clearfix"><div class="date">11 October 2024, 2:35 PM</div><div class="name">Simon Lucas</div></div><div class="info"><a href="https://qmplus.qmul.ac.uk/mod/forum/discuss.php?d=545280">Further OOP Lab 2 script update</a></div></li>
</ul>

            <div class="footer"><a href="https://qmplus.qmul.ac.uk/mod/forum/view.php?f=94437">Older topics</a> ...</div>
            
        </div>

    </div>

</section>

  <span id="sb-7"></span><a href="#sb-8" class="sr-only sr-only-focusable">Skip Activities</a>

<section id="inst993726"
     class=" block_activity_modules block list_block  card mb-3"
     role="navigation"
     data-block="activity_modules"
     data-instance-id="993726"
          aria-labelledby="instance-993726-header"
     >

    <div class="card-body p-3">

            <h3 id="instance-993726-header" class="h5 card-title d-inline">Activities</h3>


        <div class="card-text content mt-3">
            <ul class="unlist"><li class="r0"><div class="column c1"><a href="https://qmplus.qmul.ac.uk/mod/assign/index.php?id=12696"><img class="icon " alt="Assignment" title="Assignment" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/assign/1730236564/monologo" />Assignments</a></div></li>
<li class="r1"><div class="column c1"><a href="https://qmplus.qmul.ac.uk/mod/lti/index.php?id=12696"><img class="icon " alt="External tool" title="External tool" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/lti/1730236564/monologo" />External tools</a></div></li>
<li class="r0"><div class="column c1"><a href="https://qmplus.qmul.ac.uk/mod/forum/index.php?id=12696"><img class="icon " alt="Forum" title="Forum" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/forum/1730236564/monologo" />Forums</a></div></li>
<li class="r1"><div class="column c1"><a href="https://qmplus.qmul.ac.uk/mod/questionnaire/index.php?id=12696"><img class="icon " alt="Questionnaire" title="Questionnaire" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/questionnaire/1730236564/monologo" />Questionnaires</a></div></li>
<li class="r0"><div class="column c1"><a href="https://qmplus.qmul.ac.uk/mod/quiz/index.php?id=12696"><img class="icon " alt="Quiz" title="Quiz" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/quiz/1730236564/monologo" />Quizzes</a></div></li>
<li class="r1"><div class="column c1"><a href="https://qmplus.qmul.ac.uk/course/resources.php?id=12696"><img class="icon icon" alt="" aria-hidden="true" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/mod_page/1730236564/monologo" />Resources</a></div></li></ul>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-8"></span><a href="#sb-9" class="sr-only sr-only-focusable">Skip EECS Quick Links</a>

<section id="inst614506"
     class=" block_html block  card mb-3"
     role="complementary"
     data-block="html"
     data-instance-id="614506"
          aria-labelledby="instance-614506-header"
     >

    <div class="card-body p-3">

            <h3 id="instance-614506-header" class="h5 card-title d-inline">EECS Quick Links</h3>


        <div class="card-text content mt-3">
            <div class="no-overflow"><ul>
<li><a title="EECS Landing Page" href="https://intranet.eecs.qmul.ac.uk/aboutyou" target="_blank">EECS Landing Page</a></li>
<li><a title="Lab Availability" href="https://intranet.eecs.qmul.ac.uk/admin/labstatus/todaystimetable" target="_blank">Today's Lab Availability</a></li>
<li><a title="Surgery Hours" href="https://intranet.eecs.qmul.ac.uk/courses/surgeryhours" target="_blank">Staff Surgery Hours</a></li>
<li><a title="Staff-Student Liaison Committee" href="https://intranet.eecs.qmul.ac.uk/admin/sslc" target="_blank">Staff-Student Committee</a></li>
<li><a title="Our Community" href="http://www.qmul.ac.uk/ourcommunity/">Our Community</a></li>
</ul></div>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-9"></span><a href="#sb-10" class="sr-only sr-only-focusable">Skip Recent activity</a>

<section id="inst614509"
     class=" block_recent_activity block  card mb-3"
     role="complementary"
     data-block="recent_activity"
     data-instance-id="614509"
          aria-labelledby="instance-614509-header"
     >

    <div class="card-body p-3">

            <h3 id="instance-614509-header" class="h5 card-title d-inline">Recent activity</h3>


        <div class="card-text content mt-3">
            <div class="activityhead">Activity since Sunday, 3 November 2024, 10:11 AM</div><div class="activityhead mb-3"><a href="https://qmplus.qmul.ac.uk/course/recent.php?id=12696">Full report of recent activity...</a></div><p class="message">No recent activity</p>
            <div class="footer"></div>
            
        </div>

    </div>

</section>

  <span id="sb-10"></span></aside>
                </section>

    </div>
</div>
    <div id="page" data-region="mainpage" data-usertour="scroller" class="drawers   drag-container">
        <div id="topofscroll" class="main-inner">
            <div class="drawer-toggles d-flex">
                    <div class="drawer-toggler drawer-left-toggle open-nav d-print-none">
                        <button
                            class="btn icon-no-margin"
                            data-toggler="drawers"
                            data-action="toggle"
                            data-target="theme_boost-drawers-courseindex"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Open course index"
                        >
                            <span class="sr-only">Open course index</span>
                            <i class="icon fa fa-list fa-fw "   ></i>
                        </button>
                    </div>
                    <div class="drawer-toggler drawer-right-toggle ml-auto d-print-none">
                        <button
                            class="btn icon-no-margin"
                            data-toggler="drawers"
                            data-action="toggle"
                            data-target="theme_boost-drawers-blocks"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Open block drawer"
                        >
                            <span class="sr-only">Open block drawer</span>
                            <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                            <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                        </button>
                    </div>
            </div>
            <header id="page-header" class="header-maxwidth d-print-none">
    <div class="w-100">
        <div class="d-flex flex-wrap">
            <div id="page-navbar">
                <nav aria-label="Navigation bar">
    <ol class="breadcrumb"></ol>
</nav>
            </div>
            <div class="ml-auto d-flex">
                
            </div>
            <div id="course-header">
                
            </div>
        </div>
        <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <div class="page-context-header"><div class="page-header-headings"><h1 class="h2">ECS658U - Further Object Oriented Programming - 2024/25</h1></div></div>
                    </div>
            <div class="header-actions-container ml-auto" data-region="header-actions-container">
            </div>
        </div>
    </div>
</header>

            <section id="region-page-top" class="has-blocks mb-3 " aria-label="Blocks">
                <span class="dragblocks label label-default">Drag your blocks to here.</span>
                <aside id="block-region-page-top" class="block-region" data-blockregion="page-top" data-droptarget="1"><h2 class="sr-only">Blocks</h2><section id="inst1243541"
     class=" block_html block  card mb-3"
     role="complementary"
     data-block="html"
     data-instance-id="1243541"
        aria-label="Text"
>

    <div class="card-body p-3">



        <div class="card-text content mt-3">
            <div class="no-overflow"><div style="position: relative; text-align: center; max-width: 100%; overflow: hidden;">
  <div style="position: relative; max-width: 100%; max-height: 70vh;">
    <img src="https://qmplus.qmul.ac.uk/pluginfile.php/4003278/block_html/content/banner%2012%20new%20%286%29.png" alt="" width="1024" height="283" role="presentation" style="width: 100%; height: auto; display: block; margin: 0; border-radius: 20px;" class="img-fluid atto_image_button_text-bottom"><br>
  </div>
  <div style="position: absolute; top: 43%; left: 53%; transform: translate(-50%, -50%);">
    <h1 style="font-family: 'Dress Code Semi Bold', sans-serif; color: white; white-space: nowrap; text-shadow: 2px 2px 1px black;">
      <strong style="font-size: 24px;"><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Further Object Oriented Programming&nbsp;</strong></h1>
    <h2 style="font-family: 'Dress Code Semi Bold', sans-serif; color: white; font-size: 20px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ECS658U</h2>
  </div>
</div>

<script>

function changeColors() {

   var fontColor = "white"; // Set the default font color

 

   var customBtns = document.getElementsByClassName("custom-btn");

   for (var i = 0; i < customBtns.length; i++) {

    customBtns[i].style.color = fontColor;

    customBtns[i].addEventListener("mouseenter", function () {

      this.style.backgroundColor = darkenColor(this.style.backgroundColor, 0.85);

    });

    customBtns[i].addEventListener("mouseleave", function () {

      this.style.backgroundColor = this.dataset.originalColor;

    });

    customBtns[i].dataset.originalColor = customBtns[i].style.backgroundColor;

   }

 }

 

function darkenColor(color, amount) {

   var rgba = color.match(/\d+/g);

   var r = rgba[0];

   var g = rgba[1];

   var b = rgba[2];

   var a = rgba[3] || 1;

   var newR = Math.floor(r * amount);

   var newG = Math.floor(g * amount);

   var newB = Math.floor(b * amount);

  return "rgba(" + newR + "," + newG + "," + newB + "," + a + ")";

 }

 

 // Add an event listener for the "DOMContentLoaded" event to ensure all elements are loaded

document.addEventListener("DOMContentLoaded", function () {

  changeColors();

 });

</script>

 

<div class="custom-block">

<p>

  <span class="custom-btn btn btn-block rounded-pill" style="background-color: #c10077;">

    <a href="https://qmplus.qmul.ac.uk/mod/forum/view.php?f=94437" target="_blank" style="color: white;">Module Announcements</a>

  </span>

</p>

<p>

  <span class="custom-btn btn btn-block rounded-pill" style="background-color: #0d3273;">

    <a href="https://qmplus.qmul.ac.uk/mod/forum/view.php?f=94438" target="_blank" style="color: white;">Module Questions and Comments</a>

  </span>

</p></div></div>
            <div class="footer"></div>
            
        </div>

    </div>

</section></aside>
            </section>

                <div class="secondary-navigation d-print-none">
                    <nav class="moremenu navigation">
                        <ul id="moremenu-6729ef396a871-nav-tabs" role="menubar" class="nav more-nav nav-tabs">
                                        <li data-key="coursehome" class="nav-item" role="none" data-forceintomoremenu="false">
                                                    <a role="menuitem" class="nav-link active active_tree_node "
                                                        href="https://qmplus.qmul.ac.uk/course/view.php?id=12696"
                                                        
                                                        aria-current="true"
                                                        data-disableactive="true"
                                                        
                                                    >
                                                        Module
                                                    </a>
                                        </li>
                                        <li data-key="participants" class="nav-item" role="none" data-forceintomoremenu="false">
                                                    <a role="menuitem" class="nav-link  "
                                                        href="https://qmplus.qmul.ac.uk/user/index.php?id=12696"
                                                        
                                                        
                                                        data-disableactive="true"
                                                        tabindex="-1"
                                                    >
                                                        Participants
                                                    </a>
                                        </li>
                                        <li data-key="grades" class="nav-item" role="none" data-forceintomoremenu="false">
                                                    <a role="menuitem" class="nav-link  "
                                                        href="https://qmplus.qmul.ac.uk/grade/report/index.php?id=12696"
                                                        
                                                        
                                                        data-disableactive="true"
                                                        tabindex="-1"
                                                    >
                                                        Grades
                                                    </a>
                                        </li>
                                        <li data-key="competencies" class="nav-item" role="none" data-forceintomoremenu="false">
                                                    <a role="menuitem" class="nav-link  "
                                                        href="https://qmplus.qmul.ac.uk/admin/tool/lp/coursecompetencies.php?courseid=12696"
                                                        
                                                        
                                                        data-disableactive="true"
                                                        tabindex="-1"
                                                    >
                                                        Competencies
                                                    </a>
                                        </li>
                                        <li data-key="kalturamediagallery-settings" class="nav-item" role="none" data-forceintomoremenu="false">
                                                    <a role="menuitem" class="nav-link  "
                                                        href="https://qmplus.qmul.ac.uk/local/kalturamediagallery/index.php?courseid=12696"
                                                        
                                                        
                                                        data-disableactive="true"
                                                        tabindex="-1"
                                                    >
                                                        Media Gallery
                                                    </a>
                                        </li>
                            <li role="none" class="nav-item dropdown dropdownmoremenu d-none" data-region="morebutton">
                                <a class="dropdown-toggle nav-link " href="#" id="moremenu-dropdown-6729ef396a871" role="menuitem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                    More
                                </a>
                                <ul class="dropdown-menu dropdown-menu-left" data-region="moredropdown" aria-labelledby="moremenu-dropdown-6729ef396a871" role="menu">
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            <div id="page-content" class="pb-6 d-print-block">
                <div id="region-main-box">
                    <section id="region-main" aria-label="Content">

                        <span class="notifications" id="user-notifications"></span>
                        <div role="main"><span id="maincontent"></span><div class="course-content"><div id="course-format-6729ef39b61406729ef389aae913">
    <h2 class="accesshide">Topic outline</h2>
    <ul class="nav nav-tabs tab-list " id="6729ef39b5b0e6729ef389aae912-tablist">
        <li class="nav-item ">
            
            <span class="nav-link allsectionsonepage  active " data-tabnumber="1" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=1">Info and Links</a>
                <span class="tabvisibilitywarning  d-none "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
        <li class="nav-item ">
            
            <span class="nav-link allsectionsonepage " data-tabnumber="4" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=4">Contents</a>
                <span class="tabvisibilitywarning  d-none "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
        <li class="nav-item ">
            
            <span class="nav-link allsectionsonepage " data-tabnumber="3" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=3">Assessment</a>
                <span class="tabvisibilitywarning  d-none "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
        <li class="nav-item ">
            
            <span class="nav-link allsectionsonepage " data-tabnumber="2" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=2">Q-Review</a>
                <span class="tabvisibilitywarning  d-none "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
        <li class="nav-item  d-none ">
            
            <span class="nav-link allsectionsonepage " data-tabnumber="5" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=5">Holding area</a>
                <span class="tabvisibilitywarning "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
        <li class="nav-item ">
            
            <span class="nav-link allsectionsonepage " data-tabnumber="6" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=6">mySkills</a>
                <span class="tabvisibilitywarning  d-none "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
        <li class="nav-item ">
            
            <span class="nav-link allsectionsonepage " data-tabnumber="7" >
                <a class="tablink tabname" href="https://qmplus.qmul.ac.uk/course/view.php?id=12696&amp;tabnumber=7">Pulse Survey</a>
                <span class="tabvisibilitywarning  d-none "><i class="icon fa fa-info fa-fw "  title="This tab contains only hidden sections and will not be shown to students" role="img" aria-label="This tab contains only hidden sections and will not be shown to students"></i></span>

                
            </span>
            
        </li>
</ul>
    <ul class="qmultopics" data-for="course_sectionlist">
                <li id="section-0"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="0"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="563849"
                    data-number="0"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="563849"
                        data-number="0"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox563849"
                                            type="checkbox"
                                            data-id="563849"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox563849">
                                             Select topic Module Summary 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse0"
                                                id="collapssesection0"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse0"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Module Summary">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-563849-title" data-for="section_title" data-id="563849" data-number="0">
                                                Module Summary
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            <div class="flex-fill d-flex justify-content-end mr-2 align-self-start mt-2">
                                <a
                                    id="collapsesections"
                                    class="section-collapsemenu"
                                    href="#"
                                    aria-expanded="true"
                                    role="button"
                                    data-toggle="toggleall"
                                >
                                    <span class="collapseall text-nowrap">Collapse all</span>
                                    <span class="expandall text-nowrap">Expand all</span>
                                </a>
                                </div>
                            </div>
                            <div id="coursecontentcollapse0"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper label modtype_label   "
                                                    id="module-1350732"
                                                    data-for="cmitem"
                                                    data-id="1350732"
                                                >
                                                        <div class="activity-item focus-control activityinline" data-activityname="This module covers the main aspects of Object Orie...">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox1350732"
                                                                        type="checkbox"
                                                                        data-id="1350732"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox1350732">
                                                                        Select activity This module covers the main aspects of Object Orie...
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid noname-grid">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break ">
                                                                            <div class="no-overflow"><div class="no-overflow"><p style="text-align: center;"><strong><span class="" style="font-size: x-large;"></span></strong></p><b id="docs-internal-guid-6318a33e-7fff-f345-65f2-bb90617f8f6f"><p dir="ltr">This module covers the main aspects of Object Oriented Programming (OOP) in a practical way.&nbsp; Where possible we will use useful and engaging examples to practice the art and engineering of OOP.</p><p dir="ltr">The labs and lectures will often coordinate to help reinforce your understanding of the material.</p><p dir="ltr">Attendance at labs is mandatory, and you must demonstrate that you understand all the work you submit in order to gain the marks for it.</p><p dir="ltr">For 2024/25 the course materials are being updated, with new versions available prior to each lab and lecture.</p><p dir="ltr">The labs and lectures cover much of the material you need for the coursework assignments term-time test, but you'll need to look up details of Java APIs using standard Java reference materials and text books.&nbsp; Also, you're encouraged to read around the area to deepen your understanding and see a range of opinions.</p></b><br><p></p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-1"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="1"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1238254"
                    data-number="1"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1238254"
                        data-number="1"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1238254"
                                            type="checkbox"
                                            data-id="1238254"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1238254">
                                             Select topic Module Announcements 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse1"
                                                id="collapssesection1"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse1"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Module Announcements">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1238254-title" data-for="section_title" data-id="1238254" data-number="1">
                                                Module Announcements
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse1"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper forum modtype_forum   "
                                                    id="module-1763434"
                                                    data-for="cmitem"
                                                    data-id="1763434"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Module Announcements">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox1763434"
                                                                        type="checkbox"
                                                                        data-id="1763434"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox1763434">
                                                                        Select activity Module Announcements
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller collaboration courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/forum/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="1763434"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_forum position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/forum/view.php?id=1763434" class=" aalink stretched-link" onclick="">        <span class="instancename">Module Announcements <span class="accesshide " > Forum</span></span>    </a>
                                                                                                            
                                                                                                            <span
                                                                                                                
                                                                                                                class="ml-1"
                                                                                                                
                                                                                                            >
                                                                                                                <span class="activitybadge badge badge-pill ">
                                                                                                                        
                                                                                                                </span>
                                                                                                            </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow">This forum will be used to send out messages about the module.  Messages sent here will also come to you as emails to your QMUL email.   This will be used for any general information that I need to send out as the module develops.  If you wish to ask questions about anything sent here, use the <b>Module Questions</b> forum to do it.</div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                                <li
                                                    class="activity activity-wrapper forum modtype_forum   "
                                                    id="module-1763443"
                                                    data-for="cmitem"
                                                    data-id="1763443"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Module Questions and Comments">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox1763443"
                                                                        type="checkbox"
                                                                        data-id="1763443"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox1763443">
                                                                        Select activity Module Questions and Comments
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller collaboration courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/forum/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="1763443"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_forum position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/forum/view.php?id=1763443" class=" aalink stretched-link" onclick="">        <span class="instancename">Module Questions and Comments <span class="accesshide " > Forum</span></span>    </a>
                                                                                                            
                                                                                                            <span
                                                                                                                
                                                                                                                class="ml-1"
                                                                                                                
                                                                                                            >
                                                                                                                <span class="activitybadge badge badge-pill ">
                                                                                                                        
                                                                                                                </span>
                                                                                                            </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p>Please use this forum for questions you have about this module.&nbsp; It is very good to ask questions <u><a href="https://qmplus.qmul.ac.uk/mod/forum/view.php?id=1763443">here</a></u>, as everyone can then share in the answers.</p><p>Also feel free to write answers yourself here to questions given by other students.&nbsp; Active interaction like this can work very well.</p><p>This forum can also be used to write any general comments about aspects of this module.</p><p>The one thing you should not do here is write questions that include your own code for lab exercises, as this should not be shared with other students.&nbsp;&nbsp;<br></p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-2"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="2"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1237998"
                    data-number="2"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1237998"
                        data-number="2"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1237998"
                                            type="checkbox"
                                            data-id="1237998"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1237998">
                                             Select topic Schedule 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse2"
                                                id="collapssesection2"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse2"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Schedule">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1237998-title" data-for="section_title" data-id="1237998" data-number="2">
                                                Schedule
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse2"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                            <div class="summarytext">
                                                <div class="no-overflow"><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Software%20Metrics%20v2.pdf">Software metrics</a></strong><div data-for="sectioninfo"><div><div><h4><strong>ECS658U Module SCHEDULE</strong></h4><p><br></p><strong>S</strong><strong>ynchronous</strong>&nbsp;<br><ul><li>Live lecture every week apart from reflection week: it's recommended to attend in person.&nbsp; They will also be live-streamed and recorded (assuming the tech works)</li><li>Labs start in week 2 and are used for working through lab scrips, developing and assessing assignment solutions, and the term-time test.</li><li>See timetable and check module announcements for any changes to the normal schedule</li></ul></div><div><div data-for="sectioninfo"><div><div><p><strong>Asynchronous</strong><strong>&nbsp;</strong><br></p><ul><li>Lecture notes</li><li>Lecture recordings subject to availability</li><li>Lab scripts</li><li>Recommended reading</li><li>Practice quizes</li></ul><br><strong>Note: the topic schedule is currently being updated - see also the Lecture Slides and Lab Scripts folders for the updated material.&nbsp; The Old Lecture Slides and Old Lab Scripts folders have last year's material, which may be subject to significant change.</strong><br><br><p></p>
      <p></p>
      <table style="border-collapse: collapse; width: 100%;">
        <thead>
          <tr>
            <th scope="col" style="border: 1px solid black; padding: 8px;">WEEK&nbsp;</th>
            <th scope="col" style="border: 1px solid black; text-align: center; padding: 8px;">&nbsp;DATE</th>
            <th scope="col" style="border: 1px solid black; padding: 8px;">TOPIC</th>
            <th scope="col" style="border: 1px solid black; padding: 8px;">ACTIVITY (links in relevant week)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">1</td>
            <td style="border: 1px solid black; padding: 8px;">23 - 27 Sep</td>
            <td style="border: 1px solid black; padding: 8px;"><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Introduction.pdf">Introduction (lecture slides)</a><br><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Java%20Recap.pdf">Java Recap</a><br></strong>(no lab)</td><td style="border: 1px solid black; padding: 8px;"><br>Course overview, aims and objectives.&nbsp; Intro to the labs and use of automated testing and evaluation<br><br><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">2</td>
            <td style="border: 1px solid black; padding: 8px;">30 Sep - 4 Oct</td>
            <td style="border: 1px solid black; padding: 8px;"><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Iteration%2C%20Enumeration%2C%20Counting.pdf?time=1727791375995"><strong>Iteration, Enumeration, Counting</strong></a><br><br><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/ECS658u%20Further%20OOP%20Software%20Assignment%201%20Updated.pdf?time=1728637567189" title="Lab 1">Lab 1</a><br></strong><br><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/ECS658u%20Further%20OOP%20Software%20Assignment%201%20Updated.pdf?time=1728637968689"><strong>Assignment 1</strong></a><br><br></td>
            <td style="border: 1px solid black; padding: 8px;"><span>Good versus bad ways of iterating our own list; implementing generic lists; counting, examples of Java v. Python, analysing time complexity of alternative list implementations - first lab to work through some of this.&nbsp; First assignment set at end of week.</span></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">3</td>
            <td style="border: 1px solid black; padding: 8px;">7 - 11 Oct</td>
            <td style="border: 1px solid black; padding: 8px;"><span><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Ordered%20Counter%20and%20Generic%20Types.pdf?time=1728556243070">Ordered Counter, Generic Types</a></strong><br><br><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Week%203%20Discussion%20Slides.pdf">Week 3 discussion slides</a><br><br><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Lab%202%20Further%20OOP%20v4.pdf">Lab 2</a></strong></span></td>
            <td style="border: 1px solid black; padding: 8px;"><br>Ordered counter, generic types including wildcards and some (perhaps) surprising things about subtypes of collections.&nbsp; Quiz.&nbsp; Assignment briefing.&nbsp;&nbsp;<br><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">4</td>
            <td style="border: 1px solid black; padding: 8px;">14 - 18 Oct</td>
            <td style="border: 1px solid black; padding: 8px;"><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Java%20Reflection%20Part%201.pdf"><strong>Java Reflection 1, Gson</strong></a><br><br><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Lab%203%20Further%20OOP%20v3.pdf">Lab 3</a></strong></td><td style="border: 1px solid black; padding: 8px;">Using the Java Reflection API to explore classes and create UML class diagrams.&nbsp; Using Gson to write out JSON.&nbsp; Pulse survey, Quiz (we may also start Software Metrics).<br>Lab script will work though examples of this for assignment 1.</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">5</td>
            <td style="border: 1px solid black; padding: 8px;">21 - 25 Oct</td>
            <td style="border: 1px solid black; padding: 8px;"><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Software%20Metrics-v3.pdf">Software Metrics</a><br><br></strong><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/OO%20Design%20Principles%20v3.pdf">OO Design Principles</a></strong></td>
            <td style="border: 1px solid black; padding: 8px;">Software metrics: LoC, Cyclomatic Complexity, Coupling, Cohesion<br>OO Design principles: Keep it Simple, Don't Repeat Yourself, SOLID principles, Tangram Puzzle Exercise<br>Quiz<br>No new lab material: use lab to work on assignment 1</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">6</td>
            <td style="border: 1px solid black; padding: 8px;">28 Oct - 1 Nov</td><td style="border: 1px solid black; padding: 8px;"><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Design%20Patterns%20v3.pdf"><strong>Design Patterns</strong></a><br>Demonstrate assignment 1<br><strong><a href="https://qmplus.qmul.ac.uk/pluginfile.php/1764631/course/section/1237998/Lab%204%20Further%20OOP%20Graphics.pdf">Lab 4 Graphics</a></strong></td><td style="border: 1px solid black; padding: 8px;">Design patterns, Quiz<br>Demonstrate in-lab parts of assignment 1; new lab script building in to assignment 2 - basic graphic components, events and line drawing.</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">7</td>
            <td style="border: 1px solid black; padding: 8px;">4 - 8 Nov</td>
            <td style="border: 1px solid black; padding: 8px;">Reflection Week<br>Skills and employability</td>
            <td style="border: 1px solid black; padding: 8px;">No lecture; Labs run as normal&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">8</td>
            <td style="border: 1px solid black; padding: 8px;">11 - 15 Nov</td><td style="border: 1px solid black; padding: 8px;"></td><td style="border: 1px solid black; padding: 8px;">Nov 15: In person term test</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">9</td>
            <td style="border: 1px solid black; padding: 8px;">18 - 22 Nov</td>
            <td style="border: 1px solid black; padding: 8px;"><br></td><td style="border: 1px solid black; padding: 8px;"></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">10</td>
            <td style="border: 1px solid black; padding: 8px;">25 - 29 Nov</td>
            <td style="border: 1px solid black; padding: 8px;"><br></td>
            <td style="border: 1px solid black; padding: 8px;"><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">11</td>
            <td style="border: 1px solid black; padding: 8px;">2 - 6 Dec</td>
            <td style="border: 1px solid black; padding: 8px;">Lecture: TBA<br>Labs: demonstrate assignment</td>
            <td style="border: 1px solid black; padding: 8px;"><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">12</td>
            <td style="border: 1px solid black; padding: 8px;">9 - 13 Dec</td>
            <td style="border: 1px solid black; padding: 8px;">Lecture: course review<br>Labs: demonstrate assignnment</td>
            <td style="border: 1px solid black; padding: 8px;"><br></td>
          </tr>
        </tbody>
      </table>
      <br>
    </div>
  </div>
</div>

<p></p></div></div><div></div></div><ul data-for="cmlist"><li id="module-2701946" data-for="cmitem" data-id="2701946" data-indexed="true"><div data-activityname="TEACHING ARRANGEMENTS The material will be deliver..."><div><div><div><div><p dir="ltr"></p><p><strong>TEACHING ARRANGEMENTS</strong></p><p><br></p></div></div></div></div></div></li></ul><p dir="ltr" style="text-align: left;"><br></p></div>
                                            </div>
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text " data-for="cmlist">
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-3"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="3"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="563861"
                    data-number="3"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="563861"
                        data-number="3"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox563861"
                                            type="checkbox"
                                            data-id="563861"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox563861">
                                             Select topic TEXTBOOKS 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse3"
                                                id="collapssesection3"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse3"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="TEXTBOOKS">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-563861-title" data-for="section_title" data-id="563861" data-number="3">
                                                TEXTBOOKS
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse3"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                            <div class="summarytext">
                                                <div class="no-overflow"><p></p><span class="" style="font-size: medium;"><strong>Here are books from previous iterations of this module - they are background reading:</strong></span><p></p><p></p><ul>
<li><a href="https://www.oreilly.com/library/view/effective-java-3rd/9780134686097/"><strong>Effective Java (3rd Edition)</strong></a> by <a href="https://en.wikipedia.org/wiki/Joshua_Bloch">Joshua Bloch</a><br>
  This is considered by many to be the best book for developing a deep understanding of the best ways to use Java.  
  The 3rd edition was an updated version to cover new aspects of Java introduced in Java version 7, 8 and 9.&nbsp; Official on-line version <a href="https://learning.oreilly.com/library/view/effective-java-3rd/9780134686097/contents.xhtml"><u>here</u></a>.&nbsp;</li>
<li><a href="https://www.oreilly.com/library/view/clean-code/9780136083238/"><strong>Clean Code</strong></a> by <a href="https://en.wikipedia.org/wiki/Robert_C._Martin">Robert C. Martin</a><br>
  The author of this book, also known as “Uncle Bob” is one of the most famous programmers, who is still an
  active speaker after very many years.  He was the person who developed the concept of the SOLID design principles.
</li><li><a href="https://www.oreilly.com/library/view/program-development-in/9780768685299/"><strong>Program Development in Java</strong></a> by <a href="https://en.wikipedia.org/wiki/Barbara_Liskov">Barbara Liskov</a> with <a href="https://en.wikipedia.org/wiki/John_Guttag">John Guttag</a><br>
  Although this book is quite old, and uses the earliest form of Java, it is still very relevant, as it played an
  important part in developing the principles of good object oriented programming using Java.</li><li><a href="https://www.manning.com/books/oca-java-se-8-programmer-i-certification-guide"><strong>OCA Java SE 8 Programmer I Certification Guide</strong></a> by <a href="https://blogs.oracle.com/certification/mala-gupta-success-story">Mala Gupta</a><br>
  This book is written to prepare you for the first level Java exam given by Oracle, as given <a href="https://qmplus.qmul.ac.uk/course/view.php?id=12696#section-11">above
</a></li>
<li><a href="https://www.manning.com/books/ocp-java-se-7-programmer-ii-certification-guide"><strong>OCP Java SE 7 Programmer II Certification Guide</strong></a> by <a href="http://ejavaguru.com/about/malagupta.html">Mala Gupta</a><br>
   This book is written to prepare you for the second level Java exam given by Oracle, as given <a href="https://qmplus.qmul.ac.uk/course/view.php?id=12696#section-11">above</a> (not yet updated to Java 8)</li></ul><br><ul>
</ul><p></p>

<p><span class="" style="font-size: medium;"><strong>Here are books which cover Java in detail and are available for free on-line:</strong></span></p>
<ul>
<li><a href="http://ocpj8.javastudyguide.com/"><strong>Java 8 Programmer II Study Guide</strong></a> by <a href="http://eherrera.net/">Esteban Herrera</a><br>
   This book is centred on covering enough Java to pass the <a href="https://education.oracle.com/oracle-certified-professional-java-se-8-programmer/trackp_357">Oracle Java exams</a>.</li>
<li><a href="http://math.hws.edu/javanotes/"><strong>Introduction to Programming Using Java</strong></a> by <a href="http://math.hws.edu/eck/">David.J.Eck</a><br>
   This is perhaps the most well-known and respected on-line textbook on Java, now available in a version which
   covers it up to Java 8.
</li><li><a href="https://beginnersbook.com/"><strong>Beginners Book</strong></a> by Chaitanya Singh<br>
   Has sections on <a href="https://beginnersbook.com/java-tutorial-for-beginners-with-examples/">Java</a>, and on other programming languages including <a href="https://beginnersbook.com/2018/03/python-tutorial-learn-programming/">Python</a>,&nbsp;<a href="https://beginnersbook.com/2017/08/c-plus-plus-tutorial-for-beginners/">C++</a> and <a href="https://beginnersbook.com/2017/12/kotlin-tutorial/">Kotlin</a>.&nbsp; The way it is called “Beginners Book” indicates what you really need to know about Java if you want to be able to claim after graduation that you have properly learned about it and so moved on from being a beginner.&nbsp; <br>More sites like this which give a general explanation of Java are given in the <a href="https://qmplus.qmul.ac.uk/course/view.php?id=12696#section-15">General Explanations section</a> below.</li><li><a href="https://www.artima.com/objectsandjava/webuscript/index.html"><strong>Objects and Java</strong></a> by <a href="https://skillsmatter.com/legacy_profile/bill-venners">Bill Venners</a> in <a href="https://www.artima.com/java/index.html">Artima's Java Corner</a><br>
Quite an old book, but gives good coverage of basic aspects of Java.</li></ul><br><ul>
</ul><p></p></div>
                                            </div>
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text " data-for="cmlist">
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-5"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="5"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1061775"
                    data-number="5"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1061775"
                        data-number="5"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1061775"
                                            type="checkbox"
                                            data-id="1061775"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1061775">
                                             Select topic mySkills; 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse5"
                                                id="collapssesection5"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse5"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="mySkills;">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1061775-title" data-for="section_title" data-id="1061775" data-number="5">
                                                mySkills;
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse5"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper label modtype_label   "
                                                    id="module-2401477"
                                                    data-for="cmitem"
                                                    data-id="2401477"
                                                >
                                                        <div class="activity-item focus-control activityinline" data-activityname="Text and media area">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2401477"
                                                                        type="checkbox"
                                                                        data-id="2401477"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2401477">
                                                                        Select activity Text and media area
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid noname-grid">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break ">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: center;"><img src="https://qmplus.qmul.ac.uk/pluginfile.php/4004972/mod_label/intro/mySkills_Logo.png" alt="" role="presentation"><br></p><p dir="ltr" style="text-align: center;"><img data-originalsrc="https://qmplus.qmul.ac.uk/pluginfile.php/4004972/mod_label/intro/ECS658U%20-%20Further%20Object%20Oriented%20Programming.png" width="1024" height="754.81842818428" src="https://qmplus.qmul.ac.uk/pluginfile.php/4004972/mod_label/intro/imageopt/1024/ECS658U - Further Object Oriented Programming.png" alt="" role="presentation" class="img-fluid"><br></p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-6"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="6"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1251337"
                    data-number="6"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1251337"
                        data-number="6"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1251337"
                                            type="checkbox"
                                            data-id="1251337"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1251337">
                                             Select topic Topic 6 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse6"
                                                id="collapssesection6"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse6"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Topic 6">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1251337-title" data-for="section_title" data-id="1251337" data-number="6">
                                                Topic 6
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse6"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text " data-for="cmlist">
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-8"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="8"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1222897"
                    data-number="8"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1222897"
                        data-number="8"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1222897"
                                            type="checkbox"
                                            data-id="1222897"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1222897">
                                             Select topic Lecture Recordings 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse8"
                                                id="collapssesection8"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse8"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Lecture Recordings">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1222897-title" data-for="section_title" data-id="1222897" data-number="8">
                                                Lecture Recordings
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse8"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper lti modtype_lti   "
                                                    id="module-2683793"
                                                    data-for="cmitem"
                                                    data-id="2683793"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Lecture Recordings 2024/25">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2683793"
                                                                        type="checkbox"
                                                                        data-id="2683793"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2683793">
                                                                        Select activity Lecture Recordings 2024/25
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller content courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://echo360.org.uk/assets/images/echo360_play_icon.png"
                                                                                                    class="activityicon nofilter"
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2683793"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_lti position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/lti/view.php?id=2683793" class=" aalink stretched-link" onclick="window.open('https://qmplus.qmul.ac.uk/mod/lti/launch.php?id=2683793', 'lti-2683793'); return false;">        <span class="instancename">Lecture Recordings 2024/25 <span class="accesshide " > External tool</span></span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-9"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="9"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1238013"
                    data-number="9"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1238013"
                        data-number="9"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1238013"
                                            type="checkbox"
                                            data-id="1238013"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1238013">
                                             Select topic Teaching Team 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse9"
                                                id="collapssesection9"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse9"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Teaching Team">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1238013-title" data-for="section_title" data-id="1238013" data-number="9">
                                                Teaching Team
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse9"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                            <div class="summarytext">
                                                <div class="no-overflow"><p dir="ltr" style="text-align: left;"></p><table><caption>MEET THE TEAM</caption><thead><tr><th scope="col">Name: Simon Lucas, Professor of AI<br>Role:&nbsp;Module Organiser<br>Background Information: Head of Game AI Research Group<br>Contact: simon.lucas@qmul.ac.uk</th><th scope="col"><br></th></tr></thead><tbody><tr><td><br><strong>Name: James Goodman<br>Role: Senior Demonstrator<br>Background Information: PhD student, Game AI Research Group and IGGI CDT<br></strong><br><strong>Name: Edward Lucas<br>Role: Demonstrator<br>Background Information: Masters by Research Student, Game AI Research Group</strong><br><br><br></td></tr></tbody></table><br><p></p></div>
                                            </div>
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text " data-for="cmlist">
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-10"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="10"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1238482"
                    data-number="10"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1238482"
                        data-number="10"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1238482"
                                            type="checkbox"
                                            data-id="1238482"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1238482">
                                             Select topic Docs 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse10"
                                                id="collapssesection10"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse10"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Docs">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1238482-title" data-for="section_title" data-id="1238482" data-number="10">
                                                Docs
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse10"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper folder modtype_folder   "
                                                    id="module-2709323"
                                                    data-for="cmitem"
                                                    data-id="2709323"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Lecture slides">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2709323"
                                                                        type="checkbox"
                                                                        data-id="2709323"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2709323">
                                                                        Select activity Lecture slides
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller content courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/folder/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2709323"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_folder position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/folder/view.php?id=2709323" class=" aalink stretched-link" onclick="">        <span class="instancename">Lecture slides <span class="accesshide " > Folder</span></span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                                <li
                                                    class="activity activity-wrapper folder modtype_folder   "
                                                    id="module-2709389"
                                                    data-for="cmitem"
                                                    data-id="2709389"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Lab scripts">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2709389"
                                                                        type="checkbox"
                                                                        data-id="2709389"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2709389">
                                                                        Select activity Lab scripts
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller content courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/folder/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2709389"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_folder position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/folder/view.php?id=2709389" class=" aalink stretched-link" onclick="">        <span class="instancename">Lab scripts <span class="accesshide " > Folder</span></span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                                <li
                                                    class="activity activity-wrapper folder modtype_folder   "
                                                    id="module-2715395"
                                                    data-for="cmitem"
                                                    data-id="2715395"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Old Lecture Slides">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2715395"
                                                                        type="checkbox"
                                                                        data-id="2715395"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2715395">
                                                                        Select activity Old Lecture Slides
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller content courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/folder/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2715395"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_folder position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/folder/view.php?id=2715395" class=" aalink stretched-link" onclick="">        <span class="instancename">Old Lecture Slides <span class="accesshide " > Folder</span></span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: left;">These are the lecture slides from autumn 2023: they're in the process of being updated.</p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                                <li
                                                    class="activity activity-wrapper folder modtype_folder   "
                                                    id="module-2716867"
                                                    data-for="cmitem"
                                                    data-id="2716867"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Old Lab Scripts">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2716867"
                                                                        type="checkbox"
                                                                        data-id="2716867"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2716867">
                                                                        Select activity Old Lab Scripts
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller content courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/folder/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2716867"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_folder position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/folder/view.php?id=2716867" class=" aalink stretched-link" onclick="">        <span class="instancename">Old Lab Scripts <span class="accesshide " > Folder</span></span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: left;">Lab scripts from autmun 2023 - currently being updated in the detail and some content updates.&nbsp;&nbsp;</p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-11"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="11"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1238019"
                    data-number="11"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1238019"
                        data-number="11"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1238019"
                                            type="checkbox"
                                            data-id="1238019"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1238019">
                                             Select topic Software Assignment 1 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse11"
                                                id="collapssesection11"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse11"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Software Assignment 1">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1238019-title" data-for="section_title" data-id="1238019" data-number="11">
                                                Software Assignment 1
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse11"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                            <div class="summarytext">
                                                <div class="no-overflow"><div data-for="sectioninfo">
  <div>
    <div>
      <h4><br></h4>
      <p></p>
      <table style="border-collapse: collapse; width: 100%;">
        <thead>
          <tr>
            <th scope="col" style="border: 1px solid black; padding: 8px;">Coursework Details</th>
            <th scope="col" style="border: 1px solid black; padding: 8px;">A series of lab exercises submitted via GitHub and largely auto-assessed.</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework number</td>
            <td style="border: 1px solid black; padding: 8px;"><b><i>SEQ 001 _CWK_Software Assignment 1</i></b><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework title</td>
            <td style="border: 1px solid black; padding: 8px;">Further OOP Lab Work</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework weighting</td>
            <td style="border: 1px solid black; padding: 8px;">30%</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Issue date</td>
            <td style="border: 1px solid black; padding: 8px;">4 Oct 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Hand-in date</td>
            <td style="border: 1px solid black; padding: 8px;">1 Nov 2024 (09:00)</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Cut-off date</td>
            <td style="border: 1px solid black; padding: 8px;">8 Nov 2024 (09:00)</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Late submission penalty</td>
            <td style="border: 1px solid black; padding: 8px;">Late submissions are subject to the discretion of the module organisers. By default, students should only be allowed to submit up to 7 days after the deadline.</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Penalty for late submission</td>
            <td style="border: 1px solid black; padding: 8px;">For each 24-hour period, or part thereof, that an assignment is late, five percent (five marks out of 100) will be deducted.</td>
          </tr>
        </tbody>
      </table>
      <br>
    </div>
  </div>
</div></div>
                                            </div>
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper resource modtype_resource   "
                                                    id="module-2718599"
                                                    data-for="cmitem"
                                                    data-id="2718599"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Assignment 1">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2718599"
                                                                        type="checkbox"
                                                                        data-id="2718599"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2718599">
                                                                        Select activity Assignment 1
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller content courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/core/1730236564/f/pdf?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2718599"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_resource position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/resource/view.php?id=2718599" class=" aalink stretched-link" onclick="">        <span class="instancename">Assignment 1 <span class="accesshide " > File</span></span>    </a>
                                                                                                            
                                                                                                            <span
                                                                                                                
                                                                                                                class="ml-1"
                                                                                                                
                                                                                                            >
                                                                                                                <span class="activitybadge badge badge-pill ">
                                                                                                                        
                                                                                                                </span>
                                                                                                            </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: left;">Link to assignment 1</p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                        <div class="activity-afterlink afterlink d-flex align-items-center">
                                                                             <span class="resourcelinkdetails">205.3 KB</span>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </li>
                                                <li
                                                    class="activity activity-wrapper assign modtype_assign   "
                                                    id="module-2737833"
                                                    data-for="cmitem"
                                                    data-id="2737833"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="QMPlus handin for Software Assignment 1">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2737833"
                                                                        type="checkbox"
                                                                        data-id="2737833"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2737833">
                                                                        Select activity QMPlus handin for Software Assignment 1
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller assessment courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/assign/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2737833"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_assign position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/assign/view.php?id=2737833" class=" aalink stretched-link" onclick="">        <span class="instancename">QMPlus handin for Software Assignment 1 </span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: left;">Submission of GitHub repo including the commit</p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-12"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="12"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1238020"
                    data-number="12"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1238020"
                        data-number="12"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1238020"
                                            type="checkbox"
                                            data-id="1238020"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1238020">
                                             Select topic Term Test 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse12"
                                                id="collapssesection12"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse12"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Term Test">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1238020-title" data-for="section_title" data-id="1238020" data-number="12">
                                                Term Test
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse12"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                            <div class="summarytext">
                                                <div class="no-overflow"><div data-for="sectioninfo">
  <div>
    <div>
      <h4><br></h4>
      <p></p>
      <table style="border-collapse: collapse; width: 100%;">
        <thead>
          <tr>
            <th scope="col" style="border: 1px solid black; padding: 8px;">Coursework Details</th>
            <th scope="col" style="border: 1px solid black; padding: 8px;">Invigilated open-book on-line test to be taken in-person in the labs</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework number</td>
            <td style="border: 1px solid black; padding: 8px;"><b><i>SEQ 002 _EXN_Term test(30%)</i></b><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework title</td>
            <td style="border: 1px solid black; padding: 8px;">Term test</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework weighting</td>
            <td style="border: 1px solid black; padding: 8px;">30%</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Issue date</td>
            <td style="border: 1px solid black; padding: 8px;">15 Nov 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Hand-in date</td>
            <td style="border: 1px solid black; padding: 8px;">15 Nov 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Cut-off date</td>
            <td style="border: 1px solid black; padding: 8px;">15 Nov 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Late submission penalty</td>
            <td style="border: 1px solid black; padding: 8px;">No late submissions; students unable to attend will be need to submit ECs, and if the ECs are accepted will be offered an invigilated in-person resit test at a later assigned date.</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Penalty for late submission</td>
            <td style="border: 1px solid black; padding: 8px;">N/A</td>
          </tr>
        </tbody>
      </table>
      <br>
    </div>
  </div>
</div></div>
                                            </div>
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text " data-for="cmlist">
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-13"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="13"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1238025"
                    data-number="13"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1238025"
                        data-number="13"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1238025"
                                            type="checkbox"
                                            data-id="1238025"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1238025">
                                             Select topic Software Assignment 2 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse13"
                                                id="collapssesection13"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse13"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Software Assignment 2">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1238025-title" data-for="section_title" data-id="1238025" data-number="13">
                                                Software Assignment 2
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse13"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                            <div class="summarytext">
                                                <div class="no-overflow"><div data-for="sectioninfo">
  <div>
    <div>
      <h4><br></h4>
      <p></p>
      <table style="border-collapse: collapse; width: 100%;">
        <thead>
          <tr>
            <th scope="col" style="border: 1px solid black; padding: 8px;">Coursework Details</th>
            <th scope="col" style="border: 1px solid black; padding: 8px;">Individual mini-project bringing together many aspects of the course.</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework number</td>
            <td style="border: 1px solid black; padding: 8px;"><b><i>SEQ 003 _CWK_Software Assignment 2</i></b><br></td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework title</td>
            <td style="border: 1px solid black; padding: 8px;">Mini-project</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Coursework weighting</td>
            <td style="border: 1px solid black; padding: 8px;">40%</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Issue date</td>
            <td style="border: 1px solid black; padding: 8px;">4 Nov 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Hand-in date</td>
            <td style="border: 1px solid black; padding: 8px;">06 Dec 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Cut-off date</td>
            <td style="border: 1px solid black; padding: 8px;">13 Dec 2024</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Late submission penalty</td>
            <td style="border: 1px solid black; padding: 8px;">Late submissions are subject to the discretion of the module organisers. By default, students should only be allowed to submit up to 7 days after the deadline.</td>
          </tr>
          <tr>
            <td style="border: 1px solid black; padding: 8px;">Penalty for late submission</td>
            <td style="border: 1px solid black; padding: 8px;">For each 24-hour period, or part thereof, that an assignment is late, five percent (five marks out of 100) will be deducted.</td>
          </tr>
        </tbody>
      </table>
      <br>
    </div>
  </div>
</div></div>
                                            </div>
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text " data-for="cmlist">
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-14"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="14"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1251336"
                    data-number="14"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1251336"
                        data-number="14"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1251336"
                                            type="checkbox"
                                            data-id="1251336"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1251336">
                                             Select topic Practice Quizzes 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse14"
                                                id="collapssesection14"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse14"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Practice Quizzes">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1251336-title" data-for="section_title" data-id="1251336" data-number="14">
                                                Practice Quizzes
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse14"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper quiz modtype_quiz   "
                                                    id="module-2728955"
                                                    data-for="cmitem"
                                                    data-id="2728955"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Week 4 Practice Quiz">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2728955"
                                                                        type="checkbox"
                                                                        data-id="2728955"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2728955">
                                                                        Select activity Week 4 Practice Quiz
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller assessment courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/quiz/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2728955"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_quiz position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/quiz/view.php?id=2728955" class=" aalink stretched-link" onclick="">        <span class="instancename">Week 4 Practice Quiz </span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: left;">Quiz with questions of similar type to the term-test.</p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                                <li
                                                    class="activity activity-wrapper quiz modtype_quiz   "
                                                    id="module-2743485"
                                                    data-for="cmitem"
                                                    data-id="2743485"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Week 6 Practice Quiz">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2743485"
                                                                        type="checkbox"
                                                                        data-id="2743485"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2743485">
                                                                        Select activity Week 6 Practice Quiz
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller assessment courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/quiz/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2743485"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_quiz position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/quiz/view.php?id=2743485" class=" aalink stretched-link" onclick="">        <span class="instancename">Week 6 Practice Quiz </span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
                <li id="section-17"
                    class="section course-section main  clearfix
                             
                            "
                    data-sectionid="17"
                    data-sectionreturnid="0"
                    data-for="section"
                    data-id="1249033"
                    data-number="17"
                >
                    <div class="course-section-header d-flex"
                        data-for="section_title"
                        data-id="1249033"
                        data-number="17"
                    >
                                    <div class="bulkselect align-self-center d-none" data-for="sectionBulkSelect">
                                        <input
                                            id="sectionCheckbox1249033"
                                            type="checkbox"
                                            data-id="1249033"
                                            data-action="toggleSelectionSection"
                                            data-bulkcheckbox="1"
                                        >
                                        <label class="sr-only" for="sectionCheckbox1249033">
                                             Select topic Module Pulse Survey 
                                        </label>
                                    </div>
                                        <div class="d-flex align-items-start position-relative">
                                            <a role="button"
                                                data-toggle="collapse"
                                                data-for="sectiontoggler"
                                                href="#coursecontentcollapse17"
                                                id="collapssesection17"
                                                aria-expanded="true"
                                                aria-controls="coursecontentcollapse17"
                                                class="btn btn-icon mr-1 icons-collapse-expand justify-content-center
                                                     stretched-link 
                                                    "
                                                aria-label="Module Pulse Survey">
                                            <span class="expanded-icon icon-no-margin p-2" title="Collapse">
                                                <i class="icon fa fa-chevron-down fa-fw "   ></i>
                                            </span>
                                            <span class="collapsed-icon icon-no-margin p-2" title="Expand">
                                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                            </span>
                                            </a>
                                            <h3 class="sectionname course-content-item d-flex align-self-stretch align-items-center mb-0"
                                                id="sectionid-1249033-title" data-for="section_title" data-id="1249033" data-number="17">
                                                Module Pulse Survey
                                            </h3>
                                        </div>
                            <div data-region="sectionbadges" class="sectionbadges d-flex align-items-center">
                            </div>
                            </div>
                            <div id="coursecontentcollapse17"
                                class="content 
                                    course-content-item-content collapse show
                                ">
                                <div class=" my-3" data-for="sectioninfo">
                                        <div class="section_availability">
                                        </div>
                            </div>
                                    <ul class="section m-0 p-0 img-text  d-block " data-for="cmlist">
                                                <li
                                                    class="activity activity-wrapper questionnaire modtype_questionnaire   "
                                                    id="module-2720440"
                                                    data-for="cmitem"
                                                    data-id="2720440"
                                                >
                                                        <div class="activity-item focus-control " data-activityname="Pulse Feedback Survey">
                                                                <div class="bulkselect d-none" data-for="cmBulkSelect">
                                                                    <input
                                                                        id="cmCheckbox2720440"
                                                                        type="checkbox"
                                                                        data-id="2720440"
                                                                        data-action="toggleSelectionCm"
                                                                        data-bulkcheckbox="1"
                                                                    >
                                                                    <label class="sr-only" for="cmCheckbox2720440">
                                                                        Select activity Pulse Feedback Survey
                                                                    </label>
                                                                </div>

                                                                <div class="activity-grid ">
                                                                
                                                                                            <div class="activity-icon activityiconcontainer smaller communication courseicon align-self-start mr-2">
                                                                                                <img
                                                                                                    src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/questionnaire/1730236564/monologo?filtericon=1"
                                                                                                    class="activityicon "
                                                                                                    data-region="activity-icon"
                                                                                                    data-id="2720440"
                                                                                                    alt=""
                                                                                                    
                                                                                                >
                                                                                            </div>
                                                                                
                                                                                    <div class="activity-name-area activity-instance d-flex flex-column mr-2 ">
                                                                                        <div class="activitytitle media  modtype_questionnaire position-relative align-self-start">
                                                                                            <div class="media-body align-self-center">
                                                                                                <div class="activityname">
                                                                                                                <a href="https://qmplus.qmul.ac.uk/mod/questionnaire/view.php?id=2720440" class=" aalink stretched-link" onclick="">        <span class="instancename">Pulse Feedback Survey <span class="accesshide " > Questionnaire</span></span>    </a>
                                                                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                        <div class="activity-altcontent d-flex text-break activity-description">
                                                                            <div class="no-overflow"><div class="no-overflow"><p dir="ltr" style="text-align: left;"></p><p><span>I would be very grateful if you could fill</span>&nbsp;in this questionnaire to provide feedback about the module and weekly content.&nbsp;</p><p><strong>Available from: Monday, 14th October 2024 - 09:00<br>Deadline: Friday 25th October 2024 - 23:59</strong></p><br><p></p></div></div>
                                                                        </div>
                                                                
                                                                
                                                                </div>
                                                        </div>
                                                </li>
                                        </ul>
                            
                    </div>
                </li>
    </ul>
</div></div></div>
                        
                        
                    </section>
                </div>
            </div>
        </div>
        <footer id="page-footer" data-region="mainpage" class="bg-inverse">
            <div data-region="footer-container-popover">
                <button class="btn btn-icon bg-primary icon-no-margin btn-footer-popover" data-action="footer-popover" aria-label="Show footer">
                    <i class="icon fa fa-question fa-fw "   ></i>
                </button>
            </div>
            <div class="footer-content-popover container" data-region="footer-content-popover">
                    <div class="footer-section p-3 border-bottom">
        
        
                            <div class="footer-support-link"><a href="https://qmplus.qmul.ac.uk/course/view.php?idnumber=ELU-Home" target="blank"><i class="icon fa fa-envelope-o fa-fw "   ></i>Contact site support<i class="icon fa fa-external-link fa-fw ml-1"   ></i></a></div>
                    </div>
                <div class="footer-section p-3 border-bottom">
                    <div class="logininfo">
                        <div class="logininfo">You are logged in as <a href="https://qmplus.qmul.ac.uk/user/profile.php?id=14551592" title="View profile">Roman James John Pretty</a> (<a href="https://qmplus.qmul.ac.uk/login/logout.php?sesskey=W8ymbnpm5r">Log out</a>)</div>
                    </div>
                    <div class="tool_usertours-resettourcontainer">
                    </div>
        
                    <a class="mobilelink" href="https://download.moodle.org/mobile?version=2023100908&amp;lang=en&amp;iosappid=633359593&amp;androidappid=com.moodle.moodlemobile">Get the mobile app</a><div id="theme_switch_link"><a rel="nofollow" href="https://qmplus.qmul.ac.uk/theme/switchdevice.php?url=https%3A%2F%2Fqmplus.qmul.ac.uk%2Fcourse%2Fview.php%3Fid%3D12696&amp;device=default&amp;sesskey=W8ymbnpm5r">Switch to the standard theme</a></div>
                    
<style>
.quizinfo .que {
    display: block;
    padding: 0 15px;
    width: 100%;
    margin: 0;
}

.path-mod-quiz .que .content {
    margin: 0;
}

.path-mod-quiz .que .info {
    float: none;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.path-mod-quiz .que .info .editquestion a {
    background-image: none;
    width: auto;
    height: auto;
}

.path-mod-quiz .que .info .editquestion a {
    display: flex;
    flex-wrap: wrap;
}

.path-mod-quiz .que .info>div,
.path-mod-quiz .que .info .pull-right>div {
    line-height: 100%;
}

.path-mod-quiz .que .info h3.no {
    margin-right: auto;
}

#page-mod-quiz-attempt .submitbtns,
#page-mod-quiz-review .submitbtns {
    padding: 15px;
}
</style><script>
//<![CDATA[
var require = {
    baseUrl : 'https://qmplus.qmul.ac.uk/lib/requirejs.php/1729024113/',
    // We only support AMD modules with an explicit define() statement.
    enforceDefine: true,
    skipDataMain: true,
    waitSeconds : 0,

    paths: {
        jquery: 'https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/lib/jquery/jquery-3.7.1.min',
        jqueryui: 'https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/lib/jquery/ui-1.13.2/jquery-ui.min',
        jqueryprivate: 'https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/lib/requirejs/jquery-private'
    },

    // Custom jquery config map.
    map: {
      // '*' means all modules will get 'jqueryprivate'
      // for their 'jquery' dependency.
      '*': { jquery: 'jqueryprivate' },
      // Stub module for 'process'. This is a workaround for a bug in MathJax (see MDL-60458).
      '*': { process: 'core/first' },

      // 'jquery-private' wants the real jQuery module
      // though. If this line was not here, there would
      // be an unresolvable cyclic dependency.
      jqueryprivate: { jquery: 'jquery' }
    }
};

//]]>
</script>
<script src="https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/lib/requirejs/require.min.js"></script>
<script>
//<![CDATA[
M.util.js_pending("core/first");
require(['core/first'], function() {
require(['core/prefetch'])
;
M.util.js_pending('local_tabableformathelpers/tabsmutations'); require(['local_tabableformathelpers/tabsmutations'], function(amd) {amd.init(); M.util.js_complete('local_tabableformathelpers/tabsmutations');});;
M.util.js_pending('local_tabableformathelpers/tabsglobalsetup'); require(['local_tabableformathelpers/tabsglobalsetup'], function(amd) {amd.init("region-main"); M.util.js_complete('local_tabableformathelpers/tabsglobalsetup');});;
M.util.js_pending('filter_mathjaxloader/loader'); require(['filter_mathjaxloader/loader'], function(amd) {amd.configure({"mathjaxconfig":"\n\nMathJax.Hub.Config({\r\n    TeX: {extensions: [\"mhchem.js\",\"color.js\",\"AMSmath.js\",\"AMSsymbols.js\",\"noErrors.js\",\"noUndefined.js\"]},\r\n    config: [\"Accessible.js\", \"Safe.js\"],\r\n    errorSettings: { message: [\"!\"] },\r\n    skipStartupTypeset: true,\r\n    messageStyle: \"none\"\r\n});\r\n\r\n","lang":"en"}); M.util.js_complete('filter_mathjaxloader/loader');});;
require(["media_videojs/loader"], function(loader) {
    loader.setUp('en');
});;
M.util.js_pending('core_courseformat/courseeditor'); require(['core_courseformat/courseeditor'], function(amd) {amd.setViewFormat("12696", {"editing":false,"supportscomponents":true,"statekey":"1730453519_1730801447","overriddenStrings":[{"component":"format_qmultopics","key":"sectionavailability_title"},{"component":"format_qmultopics","key":"sectiondelete_title"},{"component":"format_qmultopics","key":"sectionsdelete_title"},{"component":"format_qmultopics","key":"sectionsdelete_info"},{"component":"format_qmultopics","key":"sectionmove_title"},{"component":"format_qmultopics","key":"sectionsavailability_title"},{"component":"format_qmultopics","key":"sectionsmove_title"},{"component":"format_qmultopics","key":"sectionsmove_info"},{"component":"format_qmultopics","key":"selectsection"}]}); M.util.js_complete('core_courseformat/courseeditor');});;

require(['local_tabableformathelpers/tabplaceholder'], function(component) {
    component.init('6729ef39481776729ef389aae94-course-index-placeholder');
});
;

require(['core_courseformat/local/courseindex/drawer'], function(component) {
    component.init('courseindex');
});
;
M.util.js_pending('local_bfnewwindow/bfnewwindow'); require(['local_bfnewwindow/bfnewwindow'], function(amd) {amd.initialise("12696", "2023100908"); M.util.js_complete('local_bfnewwindow/bfnewwindow');});;
M.util.js_pending('local_bfaltformat/course'); require(['local_bfaltformat/course'], function(amd) {amd.init("12696", "catawesome", "qmultopics", "2023100908"); M.util.js_complete('local_bfaltformat/course');});;
M.util.js_pending('tool_usertours/usertours'); require(['tool_usertours/usertours'], function(amd) {amd.init([{"tourId":"25","startTour":false,"filtervalues":{"cssselector":{}}}], ["cssselector"]); M.util.js_complete('tool_usertours/usertours');});;

    require(['core/moremenu'], function(moremenu) {
        moremenu(document.querySelector('#moremenu-6729ef396ac6e-navbar-nav'));
    });
;

require(
[
    'jquery',
],
function(
    $
) {
    var uniqid = "6729ef396c22f6729ef389aae96";
    var container = $('#searchinput-navbar-' + uniqid);
    var opensearch = container.find('[data-action="opensearch"]');
    var input = container.find('[data-region="input"]');
    var submit = container.find('[data-action="submit"]');

    submit.on('click', function(e) {
        if (input.val() === '') {
            e.preventDefault();
        }
    });
    container.on('hidden.bs.collapse', function() {
        opensearch.removeClass('d-none');
        input.val('');
    });
    container.on('show.bs.collapse', function() {
        opensearch.addClass('d-none');
    });
    container.on('shown.bs.collapse', function() {
        input.focus();
    });
});
;

require(['jquery', 'message_popup/notification_popover_controller'], function($, Controller) {
    var container = $('#nav-notification-popover-container');
    var controller = new Controller(container);
    controller.registerEventListeners();
    controller.registerListNavigationEventListeners();
});
;

require(
[
    'jquery',
    'core_message/message_popover'
],
function(
    $,
    Popover
) {
    var toggle = $('#message-drawer-toggle-6729ef399a59b6729ef389aae98');
    Popover.init(toggle);
});
;
M.util.js_pending('local_activitytodo/addactivities'); require(['local_activitytodo/addactivities'], function(amd) {amd.init({"todolistCmids":[],"icons":{"loading":"<img class=\"icon \" alt=\"\" aria-hidden=\"true\" src=\"https:\/\/qmplus.qmul.ac.uk\/theme\/image.php\/catawesome\/core\/1730236564\/i\/ajaxloader\" \/>"},"excludedmods":["label"]}); M.util.js_complete('local_activitytodo/addactivities');});;

    require(['core/usermenu'], function(UserMenu) {
        UserMenu.init();
    });
;

    require(['theme_boost/courseindexdrawercontrols'], function(component) {
    component.init('courseindexdrawercontrols');
    });
;

require(['theme_boost/drawers']);
;

require(['theme_boost/drawers']);
;

    require(['core/moremenu'], function(moremenu) {
        moremenu(document.querySelector('#moremenu-6729ef396a871-nav-tabs'));
    });
;

require(['theme_boost/footer-popover'], function(FooterPopover) {
    FooterPopover.init();
});
;

require(['jquery', 'core_message/message_drawer'], function($, MessageDrawer) {
    var root = $('#message-drawer-6729ef399ee416729ef389aae910');
    MessageDrawer.init(root, '6729ef399ee416729ef389aae910', false);
});
;

require(['theme_catawesome/drawernew'], function(mod) {
    mod.init();
});
;

require(['theme_boost/loader']);
require(['theme_boost/drawer'], function(mod) {
    mod.init();
});

require(['theme_catawesome/waiting'], function(Waiting) {
    Waiting.init();
});

require(['theme_catawesome/metismenu', 'jquery'], function(metisMenu, $) {
    $(".metismenu").metisMenu();
});

$(document).ready(function(){
    $("#topbutton").hide();
    $(function (scrollTop) {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#topbutton').fadeIn();
            } else {
                $('#topbutton').fadeOut();
            }
        });

        $('#topbutton').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
});

;
M.util.js_pending('core_courseformat/courseeditor'); require(['core_courseformat/courseeditor'], function(amd) {amd.setViewFormat("12696", {"editing":false,"supportscomponents":true,"statekey":"1730453519_1730801447","overriddenStrings":[{"component":"format_qmultopics","key":"sectionavailability_title"},{"component":"format_qmultopics","key":"sectiondelete_title"},{"component":"format_qmultopics","key":"sectionsdelete_title"},{"component":"format_qmultopics","key":"sectionsdelete_info"},{"component":"format_qmultopics","key":"sectionmove_title"},{"component":"format_qmultopics","key":"sectionsavailability_title"},{"component":"format_qmultopics","key":"sectionsmove_title"},{"component":"format_qmultopics","key":"sectionsmove_info"},{"component":"format_qmultopics","key":"selectsection"}]}); M.util.js_complete('core_courseformat/courseeditor');});;

    require(['local_tabableformathelpers/tablist'], function(component) {
    component.init('6729ef39b5b0e6729ef389aae912-tablist');
    });
;

require(['core_courseformat/local/content'], function(component) {
    component.init('course-format-6729ef39b61406729ef389aae913', {}, 0);
});
;
M.util.js_pending('core/notification'); require(['core/notification'], function(amd) {amd.init(1764631, []); M.util.js_complete('core/notification');});;
M.util.js_pending('core/log'); require(['core/log'], function(amd) {amd.setConfig({"level":"warn"}); M.util.js_complete('core/log');});;
M.util.js_pending('core/page_global'); require(['core/page_global'], function(amd) {amd.init(); M.util.js_complete('core/page_global');});;
M.util.js_pending('core/utility'); require(['core/utility'], function(amd) {M.util.js_complete('core/utility');});;
M.util.js_pending('core/storage_validation'); require(['core/storage_validation'], function(amd) {amd.init(1730801251); M.util.js_complete('core/storage_validation');});
    M.util.js_complete("core/first");
});
//]]>
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@2.7.9/MathJax.js?delayStartupUntil=configured"></script>
<script src="https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/theme/catawesome/javascript/theme.js"></script>
<script src="https://qmplus.qmul.ac.uk/theme/javascript.php/catawesome/1730236564/footer"></script>
<script src="https://qmplus.qmul.ac.uk/lib/javascript.php/1729024113/course/format/topics/format.js"></script>
<script>
//<![CDATA[
M.str = {"moodle":{"lastmodified":"Last modified","name":"Name","error":"Error","info":"Information","yes":"Yes","no":"No","ok":"OK","cancel":"Cancel","confirm":"Confirm","areyousure":"Are you sure?","closebuttontitle":"Close","unknownerror":"Unknown error","file":"File","url":"URL","collapseall":"Collapse all","expandall":"Expand all"},"repository":{"type":"Type","size":"Size","invalidjson":"Invalid JSON string","nofilesattached":"No files attached","filepicker":"File picker","logout":"Logout","nofilesavailable":"No files available","norepositoriesavailable":"Sorry, none of your current repositories can return files in the required format.","fileexistsdialogheader":"File exists","fileexistsdialog_editor":"A file with that name has already been attached to the text you are editing.","fileexistsdialog_filemanager":"A file with that name has already been attached","renameto":"Rename to \"{$a}\"","referencesexist":"There are {$a} links to this file","select":"Select"},"admin":{"confirmdeletecomments":"Are you sure you want to delete the selected comment(s)?","confirmation":"Confirmation"},"debug":{"debuginfo":"Debug info","line":"Line","stacktrace":"Stack trace"},"langconfig":{"labelsep":": "}};
//]]>
</script>
<script>
//<![CDATA[
(function() {Y.use("moodle-filter_glossary-autolinker",function() {M.filter_glossary.init_filter_autolinking({"courseid":0});
});
 M.util.js_pending('random6729ef389aae91'); Y.on('domready', function() {  M.util.js_pending('random6729ef389aae91'); Y.use('block_module_info', function(Y) { M.block_module_info.init_collapsible_region(Y, "modinfo-core-info", "modinfo-core-info", "Click to expand or collapse");  M.util.js_complete('random6729ef389aae91'); });  M.util.js_complete('random6729ef389aae91'); });
 M.util.js_pending('random6729ef389aae92'); Y.on('domready', function() {  M.util.js_pending('random6729ef389aae92'); Y.use('block_module_info', function(Y) { M.block_module_info.init_collapsible_region(Y, "modinfo-viewlet-teaching", "modinfo-teaching", "Click to expand or collapse");  M.util.js_complete('random6729ef389aae92'); });  M.util.js_complete('random6729ef389aae92'); });
 M.util.js_pending('random6729ef389aae93'); Y.on('domready', function() {  M.util.js_pending('random6729ef389aae93'); Y.use('block_module_info', function(Y) { M.block_module_info.init_collapsible_region(Y, "modinfo-viewlet-schedule", "modinfo-schedule", "Click to expand or collapse");  M.util.js_complete('random6729ef389aae93'); });  M.util.js_complete('random6729ef389aae93'); });
M.util.help_popups.setup(Y);
 M.util.js_pending('random6729ef389aae914'); Y.on('domready', function() { M.util.js_complete("init");  M.util.js_complete('random6729ef389aae914'); });
})();
//]]>
</script>

                </div>
                <div class="footer-section p-3">
                    <div>Powered by <a href="https://moodle.com">Moodle</a></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="footer-lists row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <h4 class="title">Student Life</h4>
                        <div class="list"><ul><li><a href="https://mail.qmul.ac.uk/" target="_blank">Student email</a></li><li><a href="http://my.qmul.ac.uk/" target="_blank">My QMUL</a></li><li><a href="https://www.qmsu.org/" target="_blank">Queen Mary Students' Union</a></li><li><a href="http://www.arcs.qmul.ac.uk/students/" target="_blank">Student Enquiry Centre</a></li><li><a href="/course/view.php?id=22700">QMplus for students</a></li><li><a href="http://www.careers.qmul.ac.uk/" target="_blank">Careers</a></li></ul></div>
                    </div>
        
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <h4 class="title">Library</h4>
                        <div class="list"><ul><li><a href="/course/view.php?id=24311">Academic Skills Centre</a><br></li><li><a href="/course/view.php?id=4359">Library Landing Page</a></li>
  <li><a href="https://www.qmul.ac.uk/library">Library Website</a></li>
  <li><a href="https://citethemrightonline.com/">Cite Them Right</a></li>
</ul></div>
                    </div>
        
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <h4 class="title">Archives</h4>
                        <div class="list"><ul>
  <li><a href="http://archive.qmplus.qmul.ac.uk/">Archive</a></li><li><a href="https://2023.qmplus.qmul.ac.uk/" target="_blank">2023/24</a></li>
  <li><a href="https://2022.qmplus.qmul.ac.uk/">2022/23</a></li>
  <li><a href="https://2021.qmplus.qmul.ac.uk/">2021/22</a></li>
  <li><a href="https://2020.qmplus.qmul.ac.uk/">2020/21</a></li>
  <li><a href="https://2019.qmplus.qmul.ac.uk/">2019/20</a></li>
</ul></div>
                    </div>
        
        
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-7">
                            <p dir="ltr" style="text-align: left;"></p><p dir="ltr"><img src="//www.qmul.ac.uk/media/ow-assets/assets/icons/qm-logo-white.svg" alt="QMUL logo" class="img-responsive atto_image_button_text-bottom" style="width:215px;height:auto;"></p><p dir="ltr">©Queen Mary University of London</p><p dir="ltr"><a href="/mod/page/view.php?id=85412">Site policies and guidelines</a>&nbsp;|&nbsp;&nbsp;<a href="/login/index.php?authShib=NOSHIB">Manual login</a></p><br><br>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div class="copyright mb-3">
                            
                        </div>
        
                    </div>
                </div>
        
                <div class="footer-content-debugging my-3">
                    
                </div>
            </div>
        </footer>
        
        
        <!-- Modal -->
        <div class="modal fade" id="loadingmodal" tabindex="-1" role="dialog" aria-labelledby="loadingmodallabel" aria-hidden="true" data-waiting="0">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Loading...</h3>
                        <div class="waitloader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
    id="drawer-6729ef399ee416729ef389aae910"
    class=" drawer bg-white hidden"
    aria-expanded="false"
    aria-hidden="true"
    data-region="right-hand-drawer"
    role="region"
    tabindex="0"
>
            <div id="message-drawer-6729ef399ee416729ef389aae910" class="message-app" data-region="message-drawer" role="region">
            <h2 class="sr-only">Messaging</h2>
            <div class="closewidget text-right pr-2">
                <a class="text-dark btn-link" data-action="closedrawer" href="#"
                   title="Close" aria-label="Close"
                >
                    <i class="icon fa fa-window-close fa-fw "   ></i>
                </a>
            </div>
            <div class="header-container position-relative" data-region="header-container">
                <div class="hidden border-bottom p-1 px-sm-2" aria-hidden="true" data-region="view-contacts">
                    <div class="d-flex align-items-center">
                        <div class="align-self-stretch">
                            <a class="h-100 d-flex align-items-center mr-2" href="#" data-route-back role="button">
                                <div class="icon-back-in-drawer">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                    <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                </div>
                                <div class="icon-back-in-app">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-times fa-fw "   ></i></span>
                                </div>                            </a>
                        </div>
                        <div>
                            Contacts
                        </div>
                        <div class="ml-auto">
                            <a href="#" data-route="view-search" role="button" aria-label="Search">
                                <i class="icon fa fa-search fa-fw "   ></i>
                            </a>
                        </div>
                    </div>
                </div>                
                <div
                    class="hidden bg-white position-relative border-bottom p-1 px-sm-2"
                    aria-hidden="true"
                    data-region="view-conversation"
                >
                    <div class="hidden" data-region="header-content"></div>
                    <div class="hidden" data-region="header-edit-mode">
                        
                        <div class="d-flex p-2 align-items-center">
                            Messages selected:
                            <span class="ml-1" data-region="message-selected-court">1</span>
                            <button type="button" class="ml-auto close" aria-label="Cancel message selection"
                                data-action="cancel-edit-mode">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div data-region="header-placeholder">
                        <div class="d-flex">
                            <div
                                class="ml-2 rounded-circle bg-pulse-grey align-self-center"
                                style="height: 38px; width: 38px"
                            >
                            </div>
                            <div class="ml-2 " style="flex: 1">
                                <div
                                    class="mt-1 bg-pulse-grey w-75"
                                    style="height: 16px;"
                                >
                                </div>
                            </div>
                            <div
                                class="ml-2 bg-pulse-grey align-self-center"
                                style="height: 16px; width: 20px"
                            >
                            </div>
                        </div>
                    </div>
                    <div
                        class="hidden position-absolute z-index-1"
                        data-region="confirm-dialogue-container"
                        style="top: 0; bottom: -1px; right: 0; left: 0; background: rgba(0,0,0,0.3);"
                    ></div>
                </div>                <div class="border-bottom p-1 px-sm-2" aria-hidden="false"  data-region="view-overview">
                    <div class="d-flex align-items-center">
                        <div class="input-group simplesearchform">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search"
                                aria-label="Search"
                                data-region="view-overview-search-input"
                            >
                            <div class="input-group-append">
                                <span class="icon-no-margin btn btn-submit">
                                    <i class="icon fa fa-search fa-fw "   ></i>
                                </span>
                            </div>
                        </div>
                        <div class="ml-2">
                            <a
                                href="#"
                                data-route="view-settings"
                                data-route-param="14551592"
                                aria-label="Settings"
                                role="button"
                            >
                                <i class="icon fa icon-settings fa-fw "   ></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-right mt-sm-3">
                        <a href="#" data-route="view-contacts" role="button">
                            <i class="icon fa icon-user fa-fw "   ></i>
                            Contacts
                            <span
                                class="badge badge-primary bg-primary ml-2 hidden"
                                data-region="contact-request-count"
                            >
                                <span aria-hidden="true">0</span>
                                <span class="sr-only">There are 0 pending contact requests</span>
                            </span>
                        </a>
                    </div>
                </div>
                
                <div class="hidden border-bottom p-1 px-sm-2 view-search"  aria-hidden="true" data-region="view-search">
                    <div class="d-flex align-items-center">
                        <a
                            class="mr-2 align-self-stretch d-flex align-items-center"
                            href="#"
                            data-route-back
                            data-action="cancel-search"
                            role="button"
                        >
                            <div class="icon-back-in-drawer">
                                <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                            </div>
                            <div class="icon-back-in-app">
                                <span class="dir-rtl-hide"><i class="icon fa fa-times fa-fw "   ></i></span>
                            </div>                        </a>
                        <div class="input-group simplesearchform">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search"
                                aria-label="Search"
                                data-region="search-input"
                            >
                            <div class="input-group-append">
                                <button
                                    class="btn btn-submit icon-no-margin"
                                    type="button"
                                    data-action="search"
                                    aria-label="Search"
                                >
                                    <span data-region="search-icon-container">
                                        <i class="icon fa fa-search fa-fw "   ></i>
                                    </span>
                                    <span class="hidden" data-region="loading-icon-container">
                                        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="hidden border-bottom p-1 px-sm-2 pb-sm-3" aria-hidden="true" data-region="view-settings">
                    <div class="d-flex align-items-center">
                        <div class="align-self-stretch" >
                            <a class="h-100 d-flex mr-2 align-items-center" href="#" data-route-back role="button">
                                <div class="icon-back-in-drawer">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-chevron-left fa-fw "   ></i></span>
                                    <span class="dir-ltr-hide"><i class="icon fa fa-chevron-right fa-fw "   ></i></span>
                                </div>
                                <div class="icon-back-in-app">
                                    <span class="dir-rtl-hide"><i class="icon fa fa-times fa-fw "   ></i></span>
                                </div>                            </a>
                        </div>
                        <div>
                            Settings
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-container position-relative" data-region="body-container">
                
                <div
                    class="hidden"
                    data-region="view-contact"
                    aria-hidden="true"
                >
                    <div class="p-2 pt-3" data-region="content-container"></div>
                </div>                <div class="hidden h-100" data-region="view-contacts" aria-hidden="true" data-user-id="14551592">
                    <div class="d-flex flex-column h-100">
                        <div class="p-3 border-bottom">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a
                                        id="contacts-tab-6729ef399ee416729ef389aae910"
                                        class="nav-link active"
                                        href="#contacts-tab-panel-6729ef399ee416729ef389aae910"
                                        data-toggle="tab"
                                        data-action="show-contacts-section"
                                        role="tab"
                                        aria-controls="contacts-tab-panel-6729ef399ee416729ef389aae910"
                                        aria-selected="true"
                                    >
                                        Contacts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        id="requests-tab-6729ef399ee416729ef389aae910"
                                        class="nav-link"
                                        href="#requests-tab-panel-6729ef399ee416729ef389aae910"
                                        data-toggle="tab"
                                        data-action="show-requests-section"
                                        role="tab"
                                        aria-controls="requests-tab-panel-6729ef399ee416729ef389aae910"
                                        aria-selected="false"
                                    >
                                        Requests
                                        <span class="badge badge-primary bg-primary ml-2 hidden"
                                            data-region="contact-request-count"
                                        >
                                            <span aria-hidden="true">0</span>
                                            <span class="sr-only">There are 0 pending contact requests</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content d-flex flex-column h-100">
                                            <div
                    class="tab-pane fade show active h-100 lazy-load-list"
                    aria-live="polite"
                    data-region="lazy-load-list"
                    data-user-id="14551592"
                                        id="contacts-tab-panel-6729ef399ee416729ef389aae910"
                    data-section="contacts"
                    role="tabpanel"
                    aria-labelledby="contacts-tab-6729ef399ee416729ef389aae910"

                >
                    
                    <div class="hidden text-center p-2" data-region="empty-message-container">
                        No contacts
                    </div>
                    <div class="hidden list-group" data-region="content-container">
                        
                    </div>
                    <div class="list-group" data-region="placeholder-container">
                        
                    </div>
                    <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                    </div>
                </div>
                
                                            <div
                    class="tab-pane fade h-100 lazy-load-list"
                    aria-live="polite"
                    data-region="lazy-load-list"
                    data-user-id="14551592"
                                        id="requests-tab-panel-6729ef399ee416729ef389aae910"
                    data-section="requests"
                    role="tabpanel"
                    aria-labelledby="requests-tab-6729ef399ee416729ef389aae910"

                >
                    
                    <div class="hidden text-center p-2" data-region="empty-message-container">
                        No contact requests
                    </div>
                    <div class="hidden list-group" data-region="content-container">
                        
                    </div>
                    <div class="list-group" data-region="placeholder-container">
                        
                    </div>
                    <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                        <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
                
                <div
                    class="view-conversation hidden h-100"
                    aria-hidden="true"
                    data-region="view-conversation"
                    data-user-id="14551592"
                    data-midnight="1730764800"
                    data-message-poll-min="10"
                    data-message-poll-max="120"
                    data-message-poll-after-max="300"
                    style="overflow-y: auto; overflow-x: hidden"
                >
                    <div class="position-relative h-100" data-region="content-container" style="overflow-y: auto; overflow-x: hidden">
                        <div class="content-message-container hidden h-100 px-2 pt-0" data-region="content-message-container" role="log" style="overflow-y: auto; overflow-x: hidden">
                            <div class="py-3 sticky-top z-index-1 border-bottom text-center hidden" data-region="contact-request-sent-message-container">
                                <p class="m-0">Contact request sent</p>
                                <p class="font-italic font-weight-light" data-region="text"></p>
                            </div>
                            <div class="p-3 text-center hidden" data-region="self-conversation-message-container">
                                <p class="m-0">Personal space</p>
                                <p class="font-italic font-weight-light" data-region="text">Save draft messages, links, notes etc. to access later.</p>
                           </div>
                            <div class="hidden text-center p-3" data-region="more-messages-loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</div>
                        </div>
                        <div class="p-4 w-100 h-100 hidden position-absolute z-index-1" data-region="confirm-dialogue-container" style="top: 0; background: rgba(0,0,0,0.3);">
                            
                            <div class="p-3 bg-white" data-region="confirm-dialogue" role="alert">
                                <p class="text-muted" data-region="dialogue-text"></p>
                                <div class="mb-2 custom-control custom-checkbox hidden" data-region="delete-messages-for-all-users-toggle-container">
                                    <input type="checkbox" class="custom-control-input" id="delete-messages-for-all-users" data-region="delete-messages-for-all-users-toggle">
                                    <label class="custom-control-label text-muted" for="delete-messages-for-all-users">
                                        Delete for me and for everyone else
                                    </label>
                                </div>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-block">
                                    <span data-region="dialogue-button-text">Block</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-unblock">
                                    <span data-region="dialogue-button-text">Unblock</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-remove-contact">
                                    <span data-region="dialogue-button-text">Remove</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-add-contact">
                                    <span data-region="dialogue-button-text">Add</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-delete-selected-messages">
                                    <span data-region="dialogue-button-text">Delete</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="confirm-delete-conversation">
                                    <span data-region="dialogue-button-text">Delete</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="request-add-contact">
                                    <span data-region="dialogue-button-text">Send contact request</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block hidden" data-action="accept-contact-request">
                                    <span data-region="dialogue-button-text">Accept and add to contacts</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-secondary btn-block hidden" data-action="decline-contact-request">
                                    <span data-region="dialogue-button-text">Decline</span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-block" data-action="okay-confirm">OK</button>
                                <button type="button" class="btn btn-secondary btn-block" data-action="cancel-confirm">Cancel</button>
                            </div>
                        </div>
                        <div class="px-2 pb-2 pt-0" data-region="content-placeholder">
                            <div class="h-100 d-flex flex-column">
                                <div
                                    class="px-2 pb-2 pt-0 bg-light h-100"
                                    style="overflow-y: auto"
                                >
                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                    <div class="mt-4">
                                        <div class="mb-4">
                                            <div class="mx-auto bg-white" style="height: 25px; width: 100px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                        <div class="d-flex flex-column p-2 bg-white rounded mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="mr-2">
                                                    <div class="rounded-circle bg-pulse-grey" style="height: 35px; width: 35px"></div>
                                                </div>
                                                <div class="mr-4 w-75 bg-pulse-grey" style="height: 16px"></div>
                                                <div class="ml-auto bg-pulse-grey" style="width: 35px; height: 16px"></div>
                                            </div>
                                            <div class="bg-pulse-grey w-100" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-100 mt-2" style="height: 16px"></div>
                                            <div class="bg-pulse-grey w-75 mt-2" style="height: 16px"></div>
                                        </div>
                                    </div>                                </div>
                            </div>                        </div>
                    </div>
                </div>
                
                <div
                    class="hidden"
                    aria-hidden="true"
                    data-region="view-group-info"
                >
                    <div
                        class="pt-3 h-100 d-flex flex-column"
                        data-region="group-info-content-container"
                        style="overflow-y: auto"
                    ></div>
                </div>                <div class="h-100 view-overview-body" aria-hidden="false" data-region="view-overview"  data-user-id="14551592">
                    <div id="message-drawer-view-overview-container-6729ef399ee416729ef389aae910" class="d-flex flex-column h-100" style="overflow-y: auto">
                            
                            
                            <div
                                class="section border-0 card rounded-0"
                                data-region="view-overview-favourites"
                            >
                                <div id="view-overview-favourites-toggle" class="card-header rounded-0" data-region="toggle">
                                    <button
                                        class="btn btn-link w-100 text-left p-1 p-sm-2 d-flex rounded-0 align-items-center overview-section-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#view-overview-favourites-target-6729ef399ee416729ef389aae910"
                                        aria-expanded="false"
                                        aria-controls="view-overview-favourites-target-6729ef399ee416729ef389aae910"
                                    >
                                        <span class="collapsed-icon-container">
                                            <i class="icon fa fa-caret-right fa-fw "   ></i>
                                        </span>
                                        <span class="expanded-icon-container">
                                            <i class="icon fa fa-caret-down fa-fw "   ></i>
                                        </span>
                                        <span class="font-weight-bold">Starred</span>
                                        <small
                                            class="hidden ml-1"
                                            data-region="section-total-count-container" aria-labelledby="view-overview-favourites-total-count-label"
                                        >
                                            (<span aria-hidden="true" data-region="section-total-count"></span>)
                                            <span class="sr-only" id="view-overview-favourites-total-count-label">
                                                 total conversations
                                            </span>
                                        </small>
                                        <span class="hidden ml-2" data-region="loading-icon-container">
                                            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                        </span>
                                        <span
                                            class="hidden badge badge-pill badge-primary ml-auto bg-primary"
                                            data-region="section-unread-count-container" aria-labelledby="view-overview-favourites-unread-count-label"
                                        >
                                            <span aria-hidden="true" data-region="section-unread-count"></span>
                                            <span class="sr-only" id="view-overview-favourites-unread-count-label">
                                                There are  unread conversations
                                            </span>
                                        </span>
                                    </button>
                                </div>
                                                            <div
                                class="collapse border-bottom  lazy-load-list"
                                aria-live="polite"
                                data-region="lazy-load-list"
                                data-user-id="14551592"
                                            id="view-overview-favourites-target-6729ef399ee416729ef389aae910"
            aria-labelledby="view-overview-favourites-toggle"
            data-parent="#message-drawer-view-overview-container-6729ef399ee416729ef389aae910"

                            >
                                
                                <div class="hidden text-center p-2" data-region="empty-message-container">
                                            <p class="text-muted mt-2">No starred conversations</p>

                                </div>
                                <div class="hidden list-group" data-region="content-container">
                                    
                                </div>
                                <div class="list-group" data-region="placeholder-container">
                                            <div class="text-center py-2"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</div>

                                </div>
                                <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                </div>
                            </div>
                            </div>
                            
                            
                            <div
                                class="section border-0 card rounded-0"
                                data-region="view-overview-group-messages"
                            >
                                <div id="view-overview-group-messages-toggle" class="card-header rounded-0" data-region="toggle">
                                    <button
                                        class="btn btn-link w-100 text-left p-1 p-sm-2 d-flex rounded-0 align-items-center overview-section-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#view-overview-group-messages-target-6729ef399ee416729ef389aae910"
                                        aria-expanded="false"
                                        aria-controls="view-overview-group-messages-target-6729ef399ee416729ef389aae910"
                                    >
                                        <span class="collapsed-icon-container">
                                            <i class="icon fa fa-caret-right fa-fw "   ></i>
                                        </span>
                                        <span class="expanded-icon-container">
                                            <i class="icon fa fa-caret-down fa-fw "   ></i>
                                        </span>
                                        <span class="font-weight-bold">Group</span>
                                        <small
                                            class="hidden ml-1"
                                            data-region="section-total-count-container" aria-labelledby="view-overview-group-messages-total-count-label"
                                        >
                                            (<span aria-hidden="true" data-region="section-total-count"></span>)
                                            <span class="sr-only" id="view-overview-group-messages-total-count-label">
                                                 total conversations
                                            </span>
                                        </small>
                                        <span class="hidden ml-2" data-region="loading-icon-container">
                                            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                        </span>
                                        <span
                                            class="hidden badge badge-pill badge-primary ml-auto bg-primary"
                                            data-region="section-unread-count-container" aria-labelledby="view-overview-group-messages-unread-count-label"
                                        >
                                            <span aria-hidden="true" data-region="section-unread-count"></span>
                                            <span class="sr-only" id="view-overview-group-messages-unread-count-label">
                                                There are  unread conversations
                                            </span>
                                        </span>
                                    </button>
                                </div>
                                                            <div
                                class="collapse border-bottom  lazy-load-list"
                                aria-live="polite"
                                data-region="lazy-load-list"
                                data-user-id="14551592"
                                            id="view-overview-group-messages-target-6729ef399ee416729ef389aae910"
            aria-labelledby="view-overview-group-messages-toggle"
            data-parent="#message-drawer-view-overview-container-6729ef399ee416729ef389aae910"

                            >
                                
                                <div class="hidden text-center p-2" data-region="empty-message-container">
                                            <p class="text-muted mt-2">No group conversations</p>

                                </div>
                                <div class="hidden list-group" data-region="content-container">
                                    
                                </div>
                                <div class="list-group" data-region="placeholder-container">
                                            <div class="text-center py-2"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</div>

                                </div>
                                <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                </div>
                            </div>
                            </div>
                            
                            
                            <div
                                class="section border-0 card rounded-0"
                                data-region="view-overview-messages"
                            >
                                <div id="view-overview-messages-toggle" class="card-header rounded-0" data-region="toggle">
                                    <button
                                        class="btn btn-link w-100 text-left p-1 p-sm-2 d-flex rounded-0 align-items-center overview-section-toggle collapsed"
                                        data-toggle="collapse"
                                        data-target="#view-overview-messages-target-6729ef399ee416729ef389aae910"
                                        aria-expanded="false"
                                        aria-controls="view-overview-messages-target-6729ef399ee416729ef389aae910"
                                    >
                                        <span class="collapsed-icon-container">
                                            <i class="icon fa fa-caret-right fa-fw "   ></i>
                                        </span>
                                        <span class="expanded-icon-container">
                                            <i class="icon fa fa-caret-down fa-fw "   ></i>
                                        </span>
                                        <span class="font-weight-bold">Private</span>
                                        <small
                                            class="hidden ml-1"
                                            data-region="section-total-count-container" aria-labelledby="view-overview-messages-total-count-label"
                                        >
                                            (<span aria-hidden="true" data-region="section-total-count"></span>)
                                            <span class="sr-only" id="view-overview-messages-total-count-label">
                                                 total conversations
                                            </span>
                                        </small>
                                        <span class="hidden ml-2" data-region="loading-icon-container">
                                            <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                        </span>
                                        <span
                                            class="hidden badge badge-pill badge-primary ml-auto bg-primary"
                                            data-region="section-unread-count-container" aria-labelledby="view-overview-messages-unread-count-label"
                                        >
                                            <span aria-hidden="true" data-region="section-unread-count"></span>
                                            <span class="sr-only" id="view-overview-messages-unread-count-label">
                                                There are  unread conversations
                                            </span>
                                        </span>
                                    </button>
                                </div>
                                                            <div
                                class="collapse border-bottom  lazy-load-list"
                                aria-live="polite"
                                data-region="lazy-load-list"
                                data-user-id="14551592"
                                            id="view-overview-messages-target-6729ef399ee416729ef389aae910"
            aria-labelledby="view-overview-messages-toggle"
            data-parent="#message-drawer-view-overview-container-6729ef399ee416729ef389aae910"

                            >
                                
                                <div class="hidden text-center p-2" data-region="empty-message-container">
                                            <p class="text-muted mt-2">No private conversations</p>

                                </div>
                                <div class="hidden list-group" data-region="content-container">
                                    
                                </div>
                                <div class="list-group" data-region="placeholder-container">
                                            <div class="text-center py-2"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</div>

                                </div>
                                <div class="w-100 text-center p-3 hidden" data-region="loading-icon-container" >
                                    <span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                
                <div
                    data-region="view-search"
                    aria-hidden="true"
                    class="h-100 hidden"
                    data-user-id="14551592"
                    data-users-offset="0"
                    data-messages-offset="0"
                    style="overflow-y: auto"
                    
                >
                    <div class="hidden" data-region="search-results-container" style="overflow-y: auto">
                        
                        <div class="d-flex flex-column">
                            <div class="mb-3 bg-white" data-region="all-contacts-container">
                                <div data-region="contacts-container"  class="pt-2">
                                    <h3 class="h6 px-2">Contacts</h3>
                                    <div class="list-group" data-region="list"></div>
                                </div>
                                <div data-region="non-contacts-container" class="pt-2 border-top">
                                    <h3 class="h6 px-2">Non-contacts</h3>
                                    <div class="list-group" data-region="list"></div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-link text-primary" data-action="load-more-users">
                                        <span data-region="button-text">Load more</span>
                                        <span data-region="loading-icon-container" class="hidden"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white" data-region="messages-container">
                                <h3 class="h6 px-2 pt-2">Messages</h3>
                                <div class="list-group" data-region="list"></div>
                                <div class="text-right">
                                    <button class="btn btn-link text-primary" data-action="load-more-messages">
                                        <span data-region="button-text">Load more</span>
                                        <span data-region="loading-icon-container" class="hidden"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                    </button>
                                </div>
                            </div>
                            <p class="hidden p-3 text-center" data-region="no-results-container">No results</p>
                        </div>                    </div>
                    <div class="hidden" data-region="loading-placeholder">
                        <div class="text-center pt-3 icon-size-4"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</div>
                    </div>
                    <div class="p-3 text-center" data-region="empty-message-container">
                        <p>Search people and messages</p>
                    </div>
                </div>                
                <div class="h-100 hidden bg-white" aria-hidden="true" data-region="view-settings">
                    <div class="hidden" data-region="content-container">
                        
                        <div data-region="settings" class="p-3">
                            <h3 class="h6 font-weight-bold">Privacy</h3>
                            <p>You can restrict who can message you</p>
                            <div data-preference="blocknoncontacts" class="mb-3">
                                <fieldset>
                                    <legend class="sr-only">Accept messages from:</legend>
                                        <div class="custom-control custom-radio mb-2">
                                            <input
                                                type="radio"
                                                name="message_blocknoncontacts"
                                                class="custom-control-input"
                                                id="block-noncontacts-6729ef399ee416729ef389aae910-1"
                                                value="1"
                                            >
                                            <label class="custom-control-label ml-2" for="block-noncontacts-6729ef399ee416729ef389aae910-1">
                                                My contacts only
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-2">
                                            <input
                                                type="radio"
                                                name="message_blocknoncontacts"
                                                class="custom-control-input"
                                                id="block-noncontacts-6729ef399ee416729ef389aae910-0"
                                                value="0"
                                            >
                                            <label class="custom-control-label ml-2" for="block-noncontacts-6729ef399ee416729ef389aae910-0">
                                                My contacts and anyone in my courses
                                            </label>
                                        </div>
                                </fieldset>
                            </div>
                        
                            <div class="hidden" data-region="notification-preference-container">
                                <h3 class="mb-2 mt-4 h6 font-weight-bold">Notification preferences</h3>
                            </div>
                        
                            <h3 class="mb-2 mt-4 h6 font-weight-bold">General</h3>
                            <div data-preference="entertosend">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="enter-to-send-6729ef399ee416729ef389aae910" >
                                    <label class="custom-control-label" for="enter-to-send-6729ef399ee416729ef389aae910">
                                        Use enter to send
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-region="placeholder-container">
                        
                        <div class="d-flex flex-column p-3">
                            <div class="w-25 bg-pulse-grey h6" style="height: 18px"></div>
                            <div class="w-75 bg-pulse-grey mb-4" style="height: 18px"></div>
                            <div class="mb-3">
                                <div class="w-100 d-flex mb-3">
                                    <div class="bg-pulse-grey rounded-circle" style="width: 18px; height: 18px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                                <div class="w-100 d-flex mb-3">
                                    <div class="bg-pulse-grey rounded-circle" style="width: 18px; height: 18px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                                <div class="w-100 d-flex mb-3">
                                    <div class="bg-pulse-grey rounded-circle" style="width: 18px; height: 18px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                            </div>
                            <div class="w-50 bg-pulse-grey h6 mb-3 mt-2" style="height: 18px"></div>
                            <div class="mb-4">
                                <div class="w-100 d-flex mb-2 align-items-center">
                                    <div class="bg-pulse-grey w-25" style="width: 18px; height: 27px"></div>
                                    <div class="bg-pulse-grey w-25 ml-2" style="height: 18px"></div>
                                </div>
                                <div class="w-100 d-flex mb-2 align-items-center">
                                    <div class="bg-pulse-grey w-25" style="width: 18px; height: 27px"></div>
                                    <div class="bg-pulse-grey w-25 ml-2" style="height: 18px"></div>
                                </div>
                            </div>
                            <div class="w-25 bg-pulse-grey h6 mb-3 mt-2" style="height: 18px"></div>
                            <div class="mb-3">
                                <div class="w-100 d-flex mb-2 align-items-center">
                                    <div class="bg-pulse-grey w-25" style="width: 18px; height: 27px"></div>
                                    <div class="bg-pulse-grey w-50 ml-2" style="height: 18px"></div>
                                </div>
                            </div>
                        </div>                    </div>
                </div>            </div>
            <div class="footer-container position-relative" data-region="footer-container">
                
                <div
                    class="hidden border-top bg-white position-relative"
                    aria-hidden="true"
                    data-region="view-conversation"
                    data-enter-to-send="0"
                >
                    <div class="hidden p-sm-2" data-region="content-messages-footer-container">
                        
                            <div
                                class="emoji-auto-complete-container w-100 hidden"
                                data-region="emoji-auto-complete-container"
                                aria-live="polite"
                                aria-hidden="true"
                            >
                            </div>
                        <div class="d-flex mt-sm-1">
                            <textarea
                                dir="auto"
                                data-region="send-message-txt"
                                class="form-control bg-light"
                                rows="3"
                                data-auto-rows
                                data-min-rows="3"
                                data-max-rows="5"
                                aria-label="Write a message..."
                                placeholder="Write a message..."
                                style="resize: none"
                                maxlength="4096"
                            ></textarea>
                        
                            <div class="position-relative d-flex flex-column">
                                    <div
                                        data-region="emoji-picker-container"
                                        class="emoji-picker-container hidden"
                                        aria-hidden="true"
                                    >
                                        
                                        <div
                                            data-region="emoji-picker"
                                            class="card shadow emoji-picker"
                                        >
                                            <div class="card-header px-1 pt-1 pb-0 d-flex justify-content-between flex-shrink-0">
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0 selected"
                                                    data-action="show-category"
                                                    data-category="Recent"
                                                    title="Recent"
                                                >
                                                    <i class="icon fa fa-clock-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Smileys & Emotion"
                                                    title="Smileys & emotion"
                                                >
                                                    <i class="icon fa fa-smile-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="People & Body"
                                                    title="People & body"
                                                >
                                                    <i class="icon fa fa-male fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Animals & Nature"
                                                    title="Animals & nature"
                                                >
                                                    <i class="icon fa fa-leaf fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Food & Drink"
                                                    title="Food & drink"
                                                >
                                                    <i class="icon fa fa-cutlery fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Travel & Places"
                                                    title="Travel & places"
                                                >
                                                    <i class="icon fa fa-plane fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Activities"
                                                    title="Activities"
                                                >
                                                    <i class="icon fa fa-futbol-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Objects"
                                                    title="Objects"
                                                >
                                                    <i class="icon fa fa-lightbulb-o fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Symbols"
                                                    title="Symbols"
                                                >
                                                    <i class="icon fa fa-heart fa-fw "   ></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-secondary icon-no-margin category-button rounded-0"
                                                    data-action="show-category"
                                                    data-category="Flags"
                                                    title="Flags"
                                                >
                                                    <i class="icon fa fa-flag fa-fw "   ></i>
                                                </button>
                                            </div>
                                            <div class="card-body p-2 d-flex flex-column overflow-hidden">
                                                <div class="input-group mb-1 flex-shrink-0">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text pr-0 bg-white text-muted">
                                                            <i class="icon fa fa-search fa-fw "   ></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        type="text"
                                                        class="form-control border-left-0"
                                                        placeholder="Search"
                                                        aria-label="Search"
                                                        data-region="search-input"
                                                    >
                                                </div>
                                                <div class="flex-grow-1 overflow-auto emojis-container h-100" data-region="emojis-container">
                                                    <div class="position-relative" data-region="row-container"></div>
                                                </div>
                                                <div class="flex-grow-1 overflow-auto search-results-container h-100 hidden" data-region="search-results-container">
                                                    <div class="position-relative" data-region="row-container"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="card-footer d-flex flex-shrink-0"
                                                data-region="footer"
                                            >
                                                <div class="emoji-preview" data-region="emoji-preview"></div>
                                                <div data-region="emoji-short-name" class="emoji-short-name text-muted text-wrap ml-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="btn btn-link btn-icon icon-size-3 ml-1"
                                        aria-label="Toggle emoji picker"
                                        data-action="toggle-emoji-picker"
                                    >
                                        <i class="icon fa fa-smile-o fa-fw "   ></i>
                                    </button>
                                <button
                                    class="btn btn-link btn-icon icon-size-3 ml-1 mt-auto"
                                    aria-label="Send message"
                                    data-action="send-message"
                                >
                                    <span data-region="send-icon-container"><i class="icon fa fa-paper-plane fa-fw "   ></i></span>
                                    <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-sm-2" data-region="content-messages-footer-edit-mode-container">
                        
                        <div class="d-flex p-3 justify-content-end">
                            <button
                                class="btn btn-link btn-icon my-1 icon-size-4"
                                data-action="delete-selected-messages"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Delete selected messages"
                            >
                                <span data-region="icon-container"><i class="icon fa icon-trash fa-fw "   ></i></span>
                                <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                                <span class="sr-only">Delete selected messages</span>
                            </button>
                        </div>                    </div>
                    <div class="hidden bg-secondary p-sm-3" data-region="content-messages-footer-require-contact-container">
                        
                        <div class="p-3 bg-white">
                            <p data-region="title"></p>
                            <p class="text-muted" data-region="text"></p>
                            <button type="button" class="btn btn-primary btn-block" data-action="request-add-contact">
                                <span data-region="dialogue-button-text">Send contact request</span>
                                <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                            </button>
                        </div>
                    </div>
                    <div class="hidden bg-secondary p-sm-3" data-region="content-messages-footer-require-unblock-container">
                        
                        <div class="p-3 bg-white">
                            <p class="text-muted" data-region="text">You have blocked this user.</p>
                            <button type="button" class="btn btn-primary btn-block" data-action="request-unblock">
                                <span data-region="dialogue-button-text">Unblock user</span>
                                <span class="hidden" data-region="loading-icon-container"><span class="loading-icon icon-no-margin"><i class="icon fa fa-circle-o-notch fa-spin fa-fw "  title="Loading" role="img" aria-label="Loading"></i></span>
</span>
                            </button>
                        </div>
                    </div>
                    <div class="hidden bg-secondary p-sm-3" data-region="content-messages-footer-unable-to-message">
                        
                        <div class="p-3 bg-white">
                            <p class="text-muted" data-region="text">You are unable to message this user</p>
                        </div>
                    </div>
                    <div class="p-sm-2" data-region="placeholder-container">
                        <div class="d-flex">
                            <div class="bg-pulse-grey w-100" style="height: 80px"></div>
                            <div class="mx-2 mb-2 align-self-end bg-pulse-grey" style="height: 20px; width: 20px"></div>
                        </div>                    </div>
                    <div
                        class="hidden position-absolute z-index-1"
                        data-region="confirm-dialogue-container"
                        style="top: -1px; bottom: 0; right: 0; left: 0; background: rgba(0,0,0,0.3);"
                    ></div>
                </div>                    <div data-region="view-overview" class="text-center">
                        <a href="https://qmplus.qmul.ac.uk/message/index.php">
                            See all
                        </a>
                    </div>
            </div>
        </div>

</div>
    <div id="nav-drawer" data-region="drawer" class="hidden-print hidden-mobile moodle-has-zindex closed" aria-hidden="true" tabindex="-1">
        <a href="https://qmplus.qmul.ac.uk/?redirect=0" class="navbar-brand drawer has-logo
                ">
                <span class="logo">
                    <img src="//qmplus.qmul.ac.uk/pluginfile.php/1/theme_catawesome/logo/1730236564/qm-logo-white.svg" alt="MyQMUL">
                </span>
        </a>
        <nav class="mobile-custom-menu">
            <ul class="metismenu">
                <!-- custom_menu -->
                <li class="nav-item">
    <a class="nav-link" href="https://qmplus.qmul.ac.uk/course/" >All Modules</a>
</li><li class="dropdown nav-item">
    <a class="dropdown-toggle nav-link" id="drop-down-6729ef39a27e06729ef389aae911" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"  aria-controls="drop-down-menu-6729ef39a27e06729ef389aae911">
        Help
    </a>
    <div class="dropdown-menu" role="menu" id="drop-down-menu-6729ef39a27e06729ef389aae911" aria-labelledby="drop-down-6729ef39a27e06729ef389aae911">
                <a class="dropdown-item" role="menuitem" href="http://its.qmul.ac.uk"  >Raise a Ticket</a>
                <a class="dropdown-item" role="menuitem" href="https://elearning.qmul.ac.uk/learning-applications/qmplus/"  >User Guides</a>
    </div>
</li>
            </ul>
        </nav>
        <nav class="list-group" aria-label="ECS658U - Further Object Oriented Programming - 2024/25">
            <ul class="metismenu">
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/user/index.php?id=12696" data-key="participants" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="90" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="12696" data-toggle="tooltip" data-placement="right"
                            title="Participants">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-people fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">Participants</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/admin/tool/lp/coursecompetencies.php?courseid=12696" data-key="competencies" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="12696" data-toggle="tooltip" data-placement="right"
                            title="Competencies">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa fa-check-square-o fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">Competencies</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/grade/report/index.php?id=12696" data-key="grades" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="12696" data-toggle="tooltip" data-placement="right"
                            title="Grades">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-book-open fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">Grades</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    </nav>
                    <nav class="list-group" aria-label="Site">
                    <ul class="metismenu">
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/my/" data-key="myhome" data-isexpandable="0" data-indent="0" data-showdivider="1" data-type="1" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="0" data-hidden="0" data-preceedwithhr="0"  data-toggle="tooltip" data-placement="right"
                            title="Dashboard">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-speedometer fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">Dashboard</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/?redirect=0" data-key="home" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="1" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="myhome" data-toggle="tooltip" data-placement="right"
                            title="My Home">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-home fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">My Home</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/local/mymedia/mymedia.php" data-key="mymedia" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="0" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="home" data-toggle="tooltip" data-placement="right"
                            title="My Media">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <img class="icon " alt="" aria-hidden="true" src="https://qmplus.qmul.ac.uk/theme/image.php/catawesome/local_mymedia/1730236564/my-media" />
                                            </span>
                                        <span class="media-body ">My Media</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/calendar/view.php?view=month&amp;course=12696" data-key="calendar" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="60" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="home" data-toggle="tooltip" data-placement="right"
                            title="Calendar">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-calendar fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">Calendar</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/user/files.php" data-key="privatefiles" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="70" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="1" data-toggle="tooltip" data-placement="right"
                            title="Private files">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-docs fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">Private files</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="list-group-item list-group-item-action nav-link  " href="https://qmplus.qmul.ac.uk/my/courses.php" data-key="mycourses" data-isexpandable="1" data-indent="0" data-showdivider="0" data-type="0" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="0" data-hidden="0" data-preceedwithhr="0" data-parent-key="myhome" data-toggle="tooltip" data-placement="right"
                            title="My Modules">
                                <div class="ml-0">
                                    <div class="media">
                                            <span class="media-left">
                                                <i class="icon fa icon-graduation fa-fw "   ></i>
                                            </span>
                                        <span class="media-body ">My Modules</span>
                                    </div>
                                </div>
                            </a>
                        </li>
            </ul>
        </nav>
    </div>
</div>


</body></html>