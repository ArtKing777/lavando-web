<!DOCTYPE html>
<html lang="en" data-ng-app="app" data-ng-controller="AppCtrl" ng-class="app.settings.htmlClass">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Learning</title>

<?php
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

    <div data-ui-view class="ui-view-main"></div>  
    
    <script>
        var appConfig = {
            appKey: "<?php echo Helper::YiiParam('appKey'); ?>",
            appName: "<?php echo Helper::YiiParam('appName'); ?>",
            appTitle: "<?php echo Helper::YiiParam('appTitle'); ?>",
            appDir: "<?php echo Helper::YiiParam('appDir'); ?>",            
            module: <?php echo json_encode(Helper::YiiParam('modules')[$this->module]); ?>,
            
            libUrl: "<?php echo Helper::YiiParam('libUrl'); ?>",
            hostUrl: "<?php echo $this->hostUrl ?>",
            wsUrl: "<?php echo $this->wsUrl . Helper::YiiParam('modules')[$this->module]['wsModule'] ?>",
            dataUrl: "<?php echo $this->dataUrl ?>",    
            appUrl: "<?php echo $this->appUrl ?>",            
            moduleUrl: "<?php echo $this->moduleUrl ?>"
        }    
    </script>
  
   

<?php
AssetHelper::insertPlugins(Helper::YiiParam("modules")['frontend']['libs'], "js");
AssetHelper::insertPlugins(array('frontend', 'engine'), "js");
?>  

<script src="<?php echo $templatePath ?>router.js"></script>
<script type="text/javascript" src="<?php echo $this->moduleUrl ?>js/all.js"></script>

</body>
</html>