<div class="row text-center">
	<h2 class="text-info"><?=$faq->getTitre()?></h2>
	<small><i>par <b><?=$faq->getUser()?></b></i></small>
	<div>
		<?php if($faq->getUser()->getId() == Auth::getUser()->getId()):?>
			<a class='btn btn-primary btn-sm btnVoirFaq' href='<?php echo "Faqs/frm/".$faq->getId(); ?>'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Modifier </a>
		<?php endif; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3"><hr></div>
</div>

<div class="row" style="margin-top:3%">
	<div class="col-md-10 col-md-offset-1"><?=$faq->getContenu()?></div>
</div>

<div class="row" style="margin-top:3%">
	<div class="col-md-10 col-md-offset-1 "><i><small class="pull-right">Version <?=$faq->getVersion()?></small></i></div>
</div>
