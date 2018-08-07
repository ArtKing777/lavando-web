<!-- Find CFF Section -->
<section class="b-upcoming-event">
    <div class="b-upcoming-event__title center">
	<div class="nacff_search_wrap gradient">
            <div class="container">
                
                <form action="<?php echo Yii::app()->createUrl("live-classes") ?>" method="POST" class="default-form">
                    <div class="b-search-map__name f-search-map__name"> 
                        Select<br>
                        <span class="f-search-map__name_hight">STATE</span> 
                    </div>
                    <div class="b-search-map__fields">
                        <div class="form-group">
                            <label class="field-label" for="guests">Select State</label>
                            <div class="form-group">                                
                                <select name = "state" class="form-control">
                                    <option value="">Please select State</option>
                                    <?php
                                    foreach($states as $s => $value){
                                        $selected = "";
                                        if ($state == $s){
                                            $selected = "selected";
                                        }
                                        ?>
                                        <option value="<?php echo $s ?>" <?php echo $selected ?>><?php echo $value ?></option>
                                        <?php
                                    }
                                    ?>                                

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="field-label">&nbsp;</label>
                            <button type="submit" class="thm-btn-tr">View Classes</button>
                        </div>
                        <div class="form-group">
                            <label class="field-label">&nbsp;</label>
                            <a class="thm-btn-tr" href="<?php echo Yii::app()->createUrl("live-classes") ?>">View All Classes</a> 
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</section>
<!-- Find CFF section End here  -->
