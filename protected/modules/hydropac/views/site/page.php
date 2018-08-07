<div class="inner-banner text-center">
    <div class="container">
        <div class="box">
            <h3><?php echo $rs->name ?></h3>
        </div><!-- /.box -->
        <div class="breadcumb-wrapper">
            <div class="clearfix">
                <div class="pull-left">
                    <ul class="list-inline link-list">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl("/") ?>">Home</a>
                        </li><!-- comment for inline hack
                        --><li>
                        <?php echo $rs->name ?>
                        </li>
                    </ul><!-- /.list-line --> 
                </div><!-- /.pull-left -->
                
            </div><!-- /.container -->
        </div>
    </div><!-- /.container -->
</div>

<?php echo $rs->content2 ?>

<section class="default-section sec-padd">
    <div class="container">
        <div class="row">
            <?php
            if (trim($rs->title1) != ""){
                ?>            
                <div class="col-md-12">
                    <div class="section-title center">
                        <h2><?php echo $rs->title1 ?></h2>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="text-content editor-style">
                    <div class="text">                        
                        <?php echo $rs->content1 ?>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $rs->content3 ?>
