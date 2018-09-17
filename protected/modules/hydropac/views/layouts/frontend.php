<!DOCTYPE html>
<html lang="en" data-ng-app="app" data-ng-controller="AppCtrl" ng-class="app.settings.htmlClass">

<head>
	<base href="/sneh/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Lavando</title>

<?php
AssetHelper::insertPlugins(Helper::YiiParam("modules")['frontend']['libs'], "css");
AssetHelper::insertPlugins(Helper::YiiParam("plugins"), "css");
?>
<link href="<?php echo $this->moduleUrl ?>css/style-import.css" rel="stylesheet">
   

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body ng-class="app.settings.bodyClass" class = "login">
	<!-- toaster directive -->
    <toaster-container toaster-options="{'position-class': 'toast-top-right', 'close-button':true}"></toaster-container>
    
    <div data-ui-view class="ui-view-main"></div>  
    
    <script src="https://unpkg.com/@shareactor/shareactor-sdk@latest/dist/main.bundle.js"></script>

    
    <script>
        var appConfig = {
            appKey: "<?php echo Helper::YiiParam('appKey'); ?>",
            appName: "<?php echo Helper::YiiParam('appName'); ?>",
            appTitle: "<?php echo Helper::YiiParam('appTitle'); ?>",
            appDir: "<?php echo Helper::YiiParam('appDir'); ?>",      
            libUrl: "<?php echo Helper::YiiParam('libUrl'); ?>",
            module: <?php echo json_encode(Helper::YiiParam('modules')['frontend']); ?>,
                        
            hostUrl: "<?php echo $this->hostUrl ?>",
            wsUrl: "<?php echo $this->wsUrl . Helper::YiiParam('modules')['frontend']['wsModule'] ?>",
            dataUrl: "<?php echo $this->dataUrl ?>", 
            
            appUrl: "<?php echo $this->appUrl ?>",            
            moduleUrl: "<?php echo $this->moduleUrl ?>"
        }    
    </script>
  
   

<?php
AssetHelper::insertPlugins(Helper::YiiParam("modules")['frontend']['libs'], "js");
AssetHelper::insertPlugins(array('frontend', 'engine'), "js");
AssetHelper::addRouters(Helper::YiiParam()['modules']['frontend']['addons'],"js");
?>  

<script src="<?php echo $this->moduleUrl ?>router.js"></script>
<script type="text/javascript" src="<?php echo $this->moduleUrl ?>js/all.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics_debug.js','ga');

  ga('create', 'UA-100820335-2', 'none');
</script>
</body>
</html>