<!DOCTYPE html>
<html lang="en" data-ng-app="app">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $this->appTitle ?></title>
    <meta name="description" content="<?php echo $this->appTitle ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Infovinity Systems Pvt. Ltd.">
    <?php
    AssetHelper::insertPlugins(Helper::YiiParam("modules")['backend']['libs'], "css");
    AssetHelper::insertPlugins(array('backend', 'engine'), "css");
    ?>
</head>
<body ng-controller="AppCtrl">
    <!-- toaster directive -->
    <toaster-container toaster-options="{'position-class': 'toast-top-right', 'close-button':true}"></toaster-container>
    <!-- / toaster directive -->
    <div class="app" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}" ui-view>
    </div>

    <script>
        var appConfig = {
            appKey: "<?php echo Helper::YiiParam('appKey'); ?>",
            appName: "<?php echo Helper::YiiParam('appName'); ?>",
            appTitle: "<?php echo Helper::YiiParam('appTitle'); ?>",
            appDir: "<?php echo Helper::YiiParam('appDir'); ?>",
            libUrl: "<?php echo Helper::YiiParam('libUrl'); ?>",
            module: <?php echo json_encode(Helper::YiiParam('modules')['backend']); ?>,
            
            hostUrl: "<?php echo $this->hostUrl ?>",
            wsUrl: "<?php echo $this->wsUrl . Helper::YiiParam('modules')['backend']['wsModule'] ?>",
            dataUrl: "<?php echo $this->dataUrl ?>",
    
            appUrl: "<?php echo $this->hostUrl . Helper::YiiParam('appDir') ?>",
        }    
    </script>

    <?php
    AssetHelper::insertPlugins(Helper::YiiParam("modules")['backend']['libs'], "js");
    AssetHelper::insertPlugins(array('backend', 'engine', 'directives'), "js");
    AssetHelper::addRouters(Helper::YiiParam()['modules']['backend']['addons'],"js");
    ?>  
   
    <?php echo $content ?>
</body>
</html>