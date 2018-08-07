<html>
<head><title>Processing Payment...</title></head>
<body onLoad="document.form.submit();">
<center><h3>Please wait, your order is being processed...</h3></center>
<form method="post" name="form" action="https://www.paypal.com/cgi-bin/webscr">
<INPUT TYPE="hidden" name="rm" value=2>
<INPUT TYPE="hidden" name="business" value="rick@nationalcffassociation.org">
<INPUT TYPE="hidden" name="return" value="<?php echo Yii::app()->createAbsoluteUrl('nacff/site/returnPaypal'); ?>">
<INPUT TYPE="hidden" name="cancel_return" value="<?php echo Yii::app()->createAbsoluteUrl('nacff/site/cancelPaypal'); ?>">
<INPUT TYPE="hidden" name="notify_url" value="<?php echo Yii::app()->createAbsoluteUrl('nacff/site/notifyPaypal'); ?>">
<INPUT TYPE="hidden" name="currency_code" value="USD">
<INPUT TYPE="hidden" name="item_name" value="<?php echo $item_name ?>">
<INPUT TYPE="hidden" name="amount" value="<?php echo $amount ?>">
<INPUT TYPE="hidden" name="custom" value="<?php echo $id ?>">
<INPUT TYPE="hidden" name="cmd" value="_xclick">
</form>
</body></html>

