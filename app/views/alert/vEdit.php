<form method="post" action="Alerts/update">
    <fieldset>
        <legend>Configurer les alertes Mail</legend>
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$alert->getId()?>">
        </div>
        <?php if ($alert->getEnabled()):?>
            <div class="row">
                <div class="form-group col-md-5 has-sucess enable">
                    <div class="input-group">
                        <span class="input-group-addon"><input type="checkbox"></span>
                        <span class="input-group-addon" id="title" style="width: 120px;"><b>Nouveau(x) Message(s) sur un ticket</b></span>
                        <span class="input-group-addon" id="enabled">Activé</span>
                    </div>
                </div>
            </div>
        <?php else:?>
            <div class="row">
                <div class="form-group col-md-5 has-error enable">
                    <div class="input-group">
                        <span class="input-group-addon"><input type="checkbox" class="enableCheck"></span>
                        <span class="input-group-addon" id="title" style="width: 120px;"><b>Nouveau(x) Message(s) sur un ticket</b></span>
                        <span class="input-group-addon" id="enabled">Désactivé</span>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <div class="days-list">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-3">
                    <div class="input-group clockpicker" >
                        <span class="input-group-addon"><input type="checkbox" class="input-all"></span>
                        <span class="input-group-addon" id="basic-addon2" style="width: 120px;"><b>Tous les jours</b></span>
                        <input type="text" class="form-control" value="09:30">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
            </div>
            <?php foreach ($days as $day):?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-3">
                        <div class="input-group clockpicker" >
                            <span class="input-group-addon"><input type="checkbox" class="checkDay"></span>
                            <span class="input-group-addon" id="basic-addon2" style="width: 120px;"><?= $day?></span>
                            <input type="text" class="form-control" value="09:30">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="form-group">
            <input type="submit" value="Valider" class="btn btn-default">
            <a class="btn btn-default" href="<?php echo $config["siteUrl"]?>categories">Annuler</a>
        </div>
    </fieldset>
</form>

<script type="text/javascript" src="assets/js/alertsFrmScript.js"></script>





























