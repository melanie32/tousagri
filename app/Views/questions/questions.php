<?php $this->layout('layout', ['title' => 'Listes des Questions']) ?>

<?php $this->start('main_content') ?>
 
<div id="wrapper_Questions">
	<div class="conteneur_L">
		<div id="nav_Category">
			<ul>
	<?php foreach($selectC as $select): ?>
				<li><?= $select['title']?></li>
	<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>

<div id="bloc_Questions">
	<div class="bloc_Question">
		<div id="question_1">
		<?php foreach ($selectQ as $select) : ?>
			<p><?= $select['question'];?>
			</p>
		<?php endforeach?>
		</div>
		<div class="button_ComA">
			<button class="affiche_Comments" name="affiche_Comments" class="btn btn-info btn-lg">Voir commentaires</button>
		</div>
	</div>

	<div id="reponse_1">
		<p>Il faut distinguer :

			Les limites des espaces où la vie est possible : la biosphère. Il s’agit d’une tranche de 35 km maximum d’épaisseur qui comprend : <br>
			- une partie de l’atmosphère (25 km), partie gazeuse entourant l’atmosphère ; <br>
			- l’hydrosphère (10 km maximum d’épaisseur), partie liquide de la croûte terrestre ; <br>
			- quelques mètres de lithosphère (couche externe du globe terrestre) : le sol. <br>
			La biosphère ne représente que 0,5 % de l’ensemble atmosphère + Terre dont le rayon total est de 6 770 km.<br>

			Les limites des espaces occupés par les hommes, c’est-à-dire la surface des terres émergées habitables, soit 26,3 % de la superficie de la planète.<br>

			Quelques chiffres :<br>

			- Surface totale de la Terre : 510 000 000 km2.<br>
			- Surface des terres immergées : 360 000 000 km2 (soit 70,7 %).<br>
			- Surface des terres émergées : 149 000 000 km2 (soit 29,3 %).<br>
			- Surface des terres habitables : 134 000 000 km2 (soit 26,3%).<br>
			- Altitude maximale habitée (hauts plateaux tibétains) : 4 500 m.<br>
			- Circonférence de la Terre : 40 000 km.<br>
			- Rayon moyen : 6 370 km.<br>
		</p>
	</div>

	<div class="clear"></div>

	<div class="bloc_Question">
		<div id="question_2">
			<p>
				Existe-t-il un "capital planète" à gérer pour l'avenir ?
			</p>
		</div>
		<div class="button_ComA">
			<button class="affiche_Comments" name="affiche_Comments" class="btn btn-info btn-lg">Voir commentaires</button>
		</div>
	</div>


	<div id="reponse_2">
		<p>
			Oui, car l’homme fait partie d’un ensemble unique d’où il tire les ressources pour vivre. Préserver ce capital est vital à long terme.<br>
			La notion de « capital planète » doit être considérée à plusieurs niveaux.<br>

			1. A l’échelle de l’univers, la terre est la seule planète du système solaire où existe la vie telle que nous la connaissons. On ne connaît pas d’autre système solaire identique au nôtre dans notre galaxie. Nous sommes en présence d’un phénomène unique dans notre proche univers.<br>

			2. A l’échelle planétaire, la vie végétale et animale est la partie essentielle de ce «capital planète ». Il s’agit d’un phénomène évolutif, instable. On connaît assez bien les stades d’évolution passés, mais on ne connaît pas les étapes à venir : quels autres groupes de plantes et d’animaux apparaîtront au cours des millions d’années à venir ? Comment l’espèce humaine va-t-elle évoluer ? L’homme ne doit pas entraver cette évolution ; il doit conserver la diversité des espèces et leurs habitats, éviter aussi la modification définitive de leurs caractères par des modifications génétiques non maîtrisées. Cette « biodiversité » - gènes, espèces et écosystèmes - a fait l’objet d’une convention internationale à Rio en juin 1992 .<br>

			3. A l’échelle de l’homme, le « capital planète » comprend d’abord les éléments indispensables à sa survie : l’air, l’eau, doivent être sains ; la terre fertile. Il comprend également l’ensemble des ressources utilisées pour le développement des sociétés humaines et l’amélioration de leur confort, soit l’ensemble des ressources minérales et énergétiques, qui peuvent être classées en quatre groupes.<br>

			Des techniques nouvelles permettent, aujourd’hui, de rentabiliser des gisements où la ressource est peu concentrée et d’en découvrir de nouveaux. Ceci permet de penser que le problème de l’épuisement des minerais métallifères ne se pose pas. Seul subsiste celui des sources d’énergie et des déchets produits. Il apparaît donc nécessaire de s’orienter, par une transition douce, vers une industrie où le recyclage des matériaux et l’utilisation d’une énergie renouvelable, comme l’électricité d’origine hydraulique, seraient prépondérants. Ceci impliquerait aussi la production d’appareils d’usage courant plus durables et réparables et également plus économes en énergie<br>

			(1) Une ressource est considérée comme renouvelable quand les mécanismes de sa production compensent les effets de son prélèvement.<br>
			(2) Une ressource est considérée comme recyclable quand les produits de son utilisation permettent de reconstituer une partie de la ressource initiale.
		</p>
	</div>

	<div class="clear"></div>

	<div class="bloc_Question">
		<div id="question_3">
			<p>
				Quelles sont les "catastrophes écologiques" provoquées par l'homme ?
			</p>
		</div>
		<div class="button_ComA">
			<button class="affiche_Comments" name="affiche_Comments" class="btn btn-info btn-lg">Voir commentaires</button>
		</div>
	</div>


	<div id="reponse_3">
		<p>
			Ce sont des déséquilibres déclenchés de façon brutale, dans le milieu naturel, à grande échelle, qui ont des conséquences graves à court et à long terme sur l’environnement.<br>

			L’expression "catastrophe écologique" souvent utilisée par les médias, traduit mal le caractère et l’impact de la perturbation évoquée. On devrait plutôt parler de déséquilibre.
			Deux niveaux de gravité doivent être distingués. Voici, pour chacun d’eux, quelques exemples.<br>

			1. Déséquilibres non irréversiblesbullet	
			Désertification de la Mésopotamie.<br>

			Désertification de l’Ouest américain (plus de la moitié de la surface totale des USA), suite à la mise en culture des prairies naturelles. Mises à nu par les labours, les terres furent érodées par le vent et la pluie ; elles devinrent stériles en moins d’un siècle.<br>

			Déséquilibre profond de l’écosystème de la Vallée du Nil (Egypte). Construit dans les années 60, le barrage d’Assouan a provoqué l’arrêt des dépôts de limons fertiles en aval, du fait de la suppression des inondations. Les terres autrefois très fertiles doivent être aujourd’hui fertilisées chimiquement. Simultanément, la remontée de sels en surface dans les régions nouvellement irriguées risque de provoquer la stérilisation des terres, comme en Mésopotamie. 
			Par ailleurs, la suppression des apports de sels minéraux dans la mer Méditerranée par les inondations, a provoqué la chute des populations de sardines : de 18 000 tonnes pêchées en 1965, on est passé à 500 tonnes en 1968. 
			Enfin, le développement d’une espèce de mollusque aquatique, à la suite du changement de régime des eaux, a provoqué l’extension d’une maladie parasitaire, la bilharziose, dans la population humaine du delta. 
			Les avantages apportés par le barrage (production d’électricité, industrialisation) apparaissent de faible importance, à long terme, car les limons auront comblé le barrage dans moins de cent ans.
			Quelle que doit l’importance et la durée de ces nuisances, l’équilibre initial peut être rétabli plus ou moins rapidement selon le coût, ce qui n’est pas le cas pour d’autres.

			2. Déséquilibres irréversibles<br>

			Remontée de la nappe d’eau salée d’origine marine dans les plaines littorales, suite au pompage excessif de l’eau douce située juste au-dessus. Ces régions très peuplées partout dans le monde risquent de manquer d’eau à brève échéance. Seule, une forte glaciation, en provoquant la baisse générale du niveau des mers, pourrait éviter de tels problèmes.<br>

			Extinction d’espèces animales ou végétales par surexploitation ou destruction de leurs habitats. Or, un grand nombre de remèdes indispensables sont extraits de plantes devenues rares.<br>

			Pollution génétique de nombreuses espèces dont l’homme par les déchets ou retombées radioactives, type Tchernobyl, pouvant entraîner leur dégénérescence totale.<br>

			Introduction d’espèces nouvelles (le doryphore en Europe, le lapin en Australie, etc.). Le génie génétique, s’il peut être envisagé comme un parade future, ne pourra être appliqué qu’à quelques espèces bien connues et ne saurait être envisagé pour la totalité des êtres vivants. 
		</p>
	</div>

	<div class="clear"></div>

	<div class="bloc_Question">
		<div id="question_4">
			<p>
				Quelles sont les nuisances liées aux conditions de vie en milieu urbain ?
			</p>
		</div>
		<div class="button_ComA">
			<button class="affiche_Comments" name="affiche_Comments" class="btn btn-info btn-lg">Voir commentaires</button>
		</div>
	</div>

	<div id="reponse_4" reponse_2>
		<p>
			Les désagréments physiques sont multiples et variés :</br>

			bruit de fond permanent produit par le trafic de la rue, les moteurs des usines, ou simplement l’activité humaine dans un immeuble mal insonorisé ;
			bullet	
			odeurs désagréables des rejets gazeux (voitures, usines) ;</br>

			cadre visuel inesthétique lié à la laideur des bâtiments, à l’absence de soleil et d’arbres.
			L’ensemble de ces désagréments entraîne une fatigue nerveuse chronique, un manque de gaîté et de joie de vivre et parfois de véritables maladies d’ordre psychique.</br>

			Les rejets toxiques issus des moteurs des voitures et des chaufferies ont des conséquences plus graves : bronchites chroniques, asthme, allergies de toutes sortes, anémies, intoxications par le plomb (saturnisme)...</br>

			La forte densité de population peut provoquer chez certains individus des troubles psychiques dus à l’impossibilité de s’isoler.</br>

			Un stress est lié au rythme de vie urbain et à ses désagréments.
		</p>
	</div>
</div>

<div class="clear"></div>

	<div class="comment_S">


		<div class="button_Com2">
			<button id="masquer_Comments" name="masquer_Comments" class="btn btn-info btn-lg">Masquer</button>
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Déposer Commentaire</button>		
		</div>


		<div class="list_Comments">
			<p>
				!! oniqseubngv lijqsbvlkj qdsbvlkqdjv bljeqgfrqj m sdvbmrjfffzeombf oqIEUFH XPQZOEUCFRH PRUFHC EGOPICH ¨PIH ià hoîhdf poscdhidgo pfihg dvoifhg xcdiopfhc gdpfogich dfopichg egfioph djoh do^gkhse cr^gioph egpbdegtiu bfgviuc eiugcb ibfr ericbh fsjisjisjisjiqhoer îcgh jogch erophj cpiuerh xcpoerch eropch peroiht cqskomh mocghilg pcruiohe cpoisdufh vpcoeruifh tpoergh veocfhdrhiog cqsjodf mgh opserihjvte oniqseubngv lijqsbvlkj qdsbvlkqdjv bljeqgfrqj m sdvbmrjfffzeombf oqIEUFH XPQZOEUCFRH PRUFHC EGOPICH ¨PIH ià hoîhdf poscdhidgo pfihg dvoifhg xcdiopfhc gdpfogich dfopichg egfioph djoh do^gkhse cr^gioph egpbdegtiu bfgviuc eiugcb ibfr ericbh fsjisjisjisjiqhoer îcgh jogch erophj cpiuerh xcpoerch eropch peroiht cqskomh mocghilg pcruiohe cpoisdufh vpcoeruifh tpoergh veocfhdrhiog cqsjodf mgh opserihjvte !!
			</p>
		</div>

	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Déposer un commentaire</h4>
				</div>

				<?php if(isset($errors) && !empty($errors)):?> 
					<div class="alert alert-danger">
						<?=implode('<br>', $errors); ?>
					</div>
				<?php endif; ?>

				<?php if(isset($success) && $success == true):?>
					<div class="alert alert-success">
						Votre message a bien été enregistré !
					</div>
				<?php endif; ?>

				<div class="modal-body">
					<form class="form-horizontal" method="POST">

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="username">Pseudo</label>  
							<div class="col-md-4">
								<input id="username" name="username" type="text" placeholder="" class="form-control input-md">
							</div>
						</div>

									<!-- Textarea -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="message">Message</label>
							<div class="col-md-4">                     
								<textarea class="form-control" id="message" name="message"></textarea>
							</div>
						</div>

									<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="envoyer"></label>
							<div class="col-md-4">
								<button id="envoyer" name="envoyer" class="btn btn-primary">Envoyer</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>


</div>


<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<style>
.conteneur_L{
	background-image: url("<?=$this->assetUrl('img/vache.jpg')?>");
}

#nav_Category ul li:first-child {
	background-image: url("<?=$this->assetUrl('img/picto/poisson.png')?>");
}

</style>
<?php $this->stop('css') ?>

		






