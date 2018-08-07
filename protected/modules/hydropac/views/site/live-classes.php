<section class="our-team">
    <div class="container">
        <div class="table-responsive">
        <table class="b-table-secondary f-table-secondary center">
            <thead>
                <tr>
                    <th class="col-md-2 pad10">Event Date</th>
                    <th class="col-md-2 pad10">Event Time</th>
                    <th class="col-md-3 pad10">Event Title</th>
                    <th class="col-md-1 pad10">City</th>
                    <th class="col-md-1 pad10">State</th>
                    <th class="col-md-1 pad10">Price</th>
                    <th class="col-md-2 pad10">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($rs as $rw){
                ?> 
                <tr>
                    <td>
                        <div class="calender">
                            <span class="month_inn ng-binding"><?php echo date("d", strtotime($rw->event_date)) ?></span>
                            <span class="date_inn ng-binding"><?php echo date("M", strtotime($rw->event_date)) ?></span>
                        </div>
                    </td>
                    <td><?php echo date("h:i A", strtotime($rw->start_time)) ?> - <?php echo date("h:i A", strtotime($rw->end_time)) ?></td>
                    <td><?php echo $rw->title ?></td>
                    <td><?php echo $rw->city ?></td>
                    <td><?php echo $rw->state ?></td>
                    <td>$<?php echo $rw->price ?></td>
                    <td>
                        <a href="<?php echo Yii::app()->createUrl("nacff/site/register", array("id"=>$rw->id)) ?>" class="thm-btn b-btn-md">
                            <i class="fa fa-pencil-square-o"></i> Register Now 
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
</section>
