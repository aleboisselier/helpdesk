<form method="post" action="Alerts/update">
    <fieldset>
        <legend>Configurer les alertes Mail</legend>
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$alert->getId()?>">
            <input type="hidden" name="idUser" value="<?=Auth::getUser()->getId()?>">
        </div>
        <?php if ($alert->getEnabled()):?>
            <div class="row">
                <div class="form-group col-md-5 has-success enable">
                    <div class="input-group">
                        <span class="input-group-addon"><input type="checkbox" name="enabled" class="enableCheck" checked></span>
                        <span class="input-group-addon" id="title" style="width: 120px;"><b>Nouveau(x) Message(s) sur un ticket</b></span>
                        <span class="input-group-addon" id="enabled">Activé</span>
                    </div>
                </div>
            </div>
        <?php else:?>
            <div class="row">
                <div class="form-group col-md-5 has-error enable">
                    <div class="input-group">
                        <span class="input-group-addon"><input type="checkbox" class="enableCheck" name="enabled"></span>
                        <span class="input-group-addon" id="title" style="width: 120px;"><b>Nouveau(x) Message(s) sur un ticket</b></span>
                        <span class="input-group-addon" id="enabled">Désactivé</span>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <div class="days-list">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-2">
                    <div class="input-group" >
                        <span class="input-group-addon"><input type="checkbox" class="input-all"></span>
                        <span class="input-group-addon" id="basic-addon2" style="width: 120px;"><b>Tous les jours</b></span>
                    </div>
                </div>
            </div>
            <?php foreach ($days as $day):?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-2">
                        <div class="input-group" >
                            <span class="input-group-addon"><input name="frequence[]" type="checkbox" class="checkDay" value="<?= array_search($day, $days)?>"></input></span>
                            <span class="input-group-addon" id="basic-addon2" style="width: 120px;"><?= $day?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="row">
	            <div class="col-md-1"></div>
	            <div class="form-group col-md-2">
	            	<div class="input-group clockpicker" data-placement="top">
	                	<input type="text" class="form-control" name="time" placeholder="00:00" value="<?= json_decode($alert->getFrequence(), true)[0]['time']?>"/></input>
	                    <span class="input-group-addon">
	                    	<span class="glyphicon glyphicon-time"></span>
	                    </span>
	                </div>
                </div>
	       </div>
	    </div>
        <div class="form-group">
            <input type="submit" value="Valider" class="btn btn-default">
            <a class="btn btn-default" href="<?php echo $config["siteUrl"]?>categories">Annuler</a>
        </div>
    </fieldset>
</form>

<script type="text/javascript" src="assets/js/alertsFrmScript.js"></script>





























