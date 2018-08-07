<div class="inner-banner text-center">
    <div class="container">
        <div class="box">
            <h3>News</h3>
        </div><!-- /.box -->
        <div class="breadcumb-wrapper">
            <div class="clearfix">
                <div class="pull-left">
                    <ul class="list-inline link-list">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl("/") ?>">Home</a>
                        </li><!-- comment for inline hack
                        -->
                        
                        <li>
                        <?php echo $rs->title ?>
                        </li>
                    </ul><!-- /.list-line --> 
                </div><!-- /.pull-left -->
                
            </div><!-- /.container -->
        </div>
    </div><!-- /.container -->
</div>

<?php //echo $rs->content2 ?>

<section class="default-section" style = "padding-top:25px;padding-bottom:20px;">
    <div class="container">
        <div>
            <?php
            if (false){
                ?>            
                <div class="col-md-12">
                    <div class="section-title center">
                        <h2><?php echo $rs->title ?></h2>
                        
                    </div>
                    <p class = "">by <?php echo $rs->author ?></p>
                    <p class = ""><?php echo date("d-M-Y H:i", strtotime($rs->news_date)) ?></p>
                </div>                
                <?php
            }
            ?>
            <h4><?php echo $rs->title ?></h4>
            <div class="post-meta">by <?php echo $rs->author ?>  |  <?php echo date("d-M-Y H:i", strtotime($rs->news_date)) ?></div>
            <div class="col-md-12 col-sm-12 col-xs-12" style = "padding-top:15px;">
                <div class="text-content editor-style">
                    <div class="text">                        
                        <?php echo $rs->content ?>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</section>

<?php //echo $rs->content3 ?>
