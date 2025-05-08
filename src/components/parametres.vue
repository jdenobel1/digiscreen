<template>
	<div id="conteneur-menu">
		<div id="menu-parametres" class="menu" role="menu" :class="{'ouvert': ouvert}">
			<header>
				<span class="titre">{{ $t('options') }}</span>
				<span class="fermer" role="button" tabindex="0" @click="$parent.fermerMenu" @keydown.enter="$parent.fermerMenu"><i class="material-icons">close</i></span>
			</header>
			<div class="conteneur" tabindex="-1">
				<div class="contenu">
					<label>{{ $t('langue') }}</label>
					<div class="langue">
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'fr'}" @click="modifierLangue('fr')" @keydown.enter="modifierLangue('fr')">FR</span>
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'es'}" @click="modifierLangue('es')" @keydown.enter="modifierLangue('es')">ES</span>
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'it'}" @click="modifierLangue('it')" @keydown.enter="modifierLangue('it')">IT</span>
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'de'}" @click="modifierLangue('de')" @keydown.enter="modifierLangue('de')">DE</span>
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'nl'}" @click="modifierLangue('nl')" @keydown.enter="modifierLangue('nl')">NL</span>
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'hr'}" @click="modifierLangue('hr')" @keydown.enter="modifierLangue('hr')">HR</span>
						<span role="button" tabindex="0" :class="{'selectionne': $parent.langue === 'en'}" @click="modifierLangue('en')" @keydown.enter="modifierLangue('en')">EN</span>
					</div>

					<label>{{ $t('arrierePlanPage') }}</label>
					<div class="fond">
						<span role="button" tabindex="0" @click="modifierFond('./static/img/digitale.jpg')" @keydown.enter="modifierFond('./static/img/digitale.jpg')">
							<img src="@/assets/img/miniatures/digitale.jpg" alt="Digitale">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/lavande.jpg')" @keydown.enter="modifierFond('./static/img/lavande.jpg')">
							<img src="@/assets/img/miniatures/lavande.jpg" alt="Lavande">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/plage.jpg')" @keydown.enter="modifierFond('./static/img/plage.jpg')">
							<img src="@/assets/img/miniatures/plage.jpg" alt="Plage">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/lac.jpg')" @keydown.enter="modifierFond('./static/img/lac.jpg')">
							<img src="@/assets/img/miniatures/lac.jpg" alt="Lac">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/feuilles.jpg')" @keydown.enter="modifierFond('./static/img/feuilles.jpg')">
							<img src="@/assets/img/miniatures/feuilles.jpg" alt="Feuilles">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/arbre.jpg')" @keydown.enter="modifierFond('./static/img/arbre.jpg')">
							<img src="@/assets/img/miniatures/arbre.jpg" alt="Arbre">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/aurore.jpg')" @keydown.enter="modifierFond('./static/img/aurore.jpg')">
							<img src="@/assets/img/miniatures/aurore.jpg" alt="Aurore">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/points.png')" @keydown.enter="modifierFond('./static/img/points.png')">
							<img src="@/assets/img/miniatures/points.png" alt="Points" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/lignes-horizontales.png')" @keydown.enter="modifierFond('./static/img/lignes-horizontales.png')">
							<img src="@/assets/img/miniatures/lignes-horizontales.png" alt="Lignes" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/seyes.png')" @keydown.enter="modifierFond('./static/img/seyes.png')">
							<img src="@/assets/img/miniatures/seyes.png" alt="Seyes" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/quadrillage.png')" @keydown.enter="modifierFond('./static/img/quadrillage.png')">
							<img src="@/assets/img/miniatures/quadrillage.png" alt="Quadrillage" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/quadrillage-grand.png')" @keydown.enter="modifierFond('./static/img/quadrillage-grand.png')">
							<img src="@/assets/img/miniatures/quadrillage-grand.png" alt="Quadrillage grand" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/quadrillage-gris.png')" @keydown.enter="modifierFond('./static/img/quadrillage-gris.png')">
							<img src="@/assets/img/miniatures/quadrillage-gris.png" alt="Quadrillage gris" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/quadrillage-gris-grand.png')" @keydown.enter="modifierFond('./static/img/quadrillage-gris-grand.png')">
							<img src="@/assets/img/miniatures/quadrillage-gris-grand.png" alt="Quadrillage gris grand" style="border: 1px solid #ddd;">
						</span>
						<span role="button" tabindex="0" @click="modifierFond('./static/img/partition.png')" @keydown.enter="modifierFond('./static/img/partition.png')">
							<img src="@/assets/img/miniatures/partition.png" alt="Partition" style="border: 1px solid #ddd;">
						</span>
						<span class="couleur-fond" role="button" tabindex="0" @click="modifierFond('#00ced1')" @keydown.enter="modifierFond('#00ced1')" style="background-color: #00ced1;" />
						<span class="couleur-fond" role="button" tabindex="0" @click="modifierFond('#ff2d55')" @keydown.enter="modifierFond('#ff2d55')" style="background-color: #ff2d55;" />
						<span class="couleur-fond" role="button" tabindex="0" @click="modifierFond('#f7d000')" @keydown.enter="modifierFond('#f7d000')" style="background-color: #f7d000;" />
						<span class="couleur-fond" role="button" tabindex="0" @click="modifierFond('#ffffff')" @keydown.enter="modifierFond('#ffffff')" style="background-color: #ffffff; border: 1px solid #ddd;" />
						<span class="couleur-fond icone">
							<label for="couleur-fond-page" tabindex="0" @keydown.enter="activerInput('couleur-fond-page')"><i class="material-icons">colorize</i></label>
							<input id="couleur-fond-page" type="color" value="#001d1d" :title="$t('selectionnerCouleur')">
						</span>
					</div>

					<div class="recherche" v-if="pixabayAPIKey !== ''">
						<div class="rechercher">
							<input type="text" :value="requete" @input="requete = $event.target.value" @keyup="verifierRequete" @keydown.enter="valider" :placeholder="$t('lienImageRecherche')">
							<span role="button" tabindex="0" class="bouton-secondaire" :title="$t('rechercher')" @click="valider" @keydown.enter="valider"><i class="material-icons">search</i></span>
							<label for="televerser-fond" class="bouton-secondaire" tabindex="0" @keydown.enter="activerInput('televerser-fond')" :title="$t('selectionnerImage')"><i class="material-icons">upload_file</i></label>
							<input id="televerser-fond" type="file" @change="televerserImage" style="display: none" accept=".jpg, .jpeg, .png, .gif">
						</div>
						<div class="resultats" v-if="Object.keys(resultats).length > 0">
							<div class="item" role="button" tabindex="0" :data-w="image.previewWidth" :data-h="image.previewHeight" v-for="(image, index) in resultats.hits" @click="modifierFond(image.previewURL.replace('_150', '_1280'))" @keydown.enter="modifierFond(image.previewURL.replace('_150', '_1280'))" :key="'image_' + index">
								<img :src="image.previewURL" :alt="'Image_' + index">
							</div>
						</div>
						<div class="navigation" v-if="Object.keys(resultats).length > 0 && (pageResultats > 1 || pageResultats < (resultats.total / 15))">
							<span role="button" tabindex="0" :class="{'invisible': pageResultats < 2}" @click="modifierPageResultats('precedente')" @keydown.enter="modifierPageResultats('precedente')">{{ $t('pagePrecedente') }}</span>
							<span role="button" tabindex="0" :class="{'invisible': pageResultats >= (resultats.total / 15)}" @click="modifierPageResultats('suivante')" @keydown.enter="modifierPageResultats('suivante')">{{ $t('pageSuivante') }}</span>
						</div>
					</div>

					<label>{{ $t('pages') }}</label>
					<div class="pages">
						<draggable v-model="$parent.pages" @sort="verifierPages">
							<span class="page" role="button" tabindex="0" :class="{'selectionne': $parent.page === indexPage + 1}" @click="afficherPage(indexPage + 1)" @keydown.enter="afficherPage(indexPage + 1)" v-for="(page, indexPage) in $parent.pages" :key="'page_' + indexPage">{{ indexPage + 1 }}</span>
						</draggable>
						<span class="bouton-secondaire visible" role="button" tabindex="0" :title="$t('supprimerPage')" v-if="$parent.pages.length > 1" @click="afficherSupprimerPage" @keydown.enter="afficherSupprimerPage"><i class="material-icons">remove_circle_outline</i></span>
						<span class="bouton-secondaire" role="button" tabindex="0" :class="{'visible': $parent.pages.length < 12, 'invisible': $parent.pages.length > 11}" :title="$t('ajouterPage')" @click="ajouterPage" @keydown.enter="ajouterPage"><i class="material-icons">add_circle_outline</i></span>
					</div>

					<label>{{ $t('exporter') }}</label>
					<span role="button" tabindex="0" class="bouton" @click="exporter" @keydown.enter="exporter">{{ $t('exporterEcran') }}</span>
					<label>{{ $t('importer') }}</label>
					<label for="televerser" class="bouton" tabindex="0" @keydown.enter="activerInput('televerser')">{{ $t('importerEcran') }}</label>
					<input id="televerser" type="file" style="display: none;" accept=".dgb, .dgs" @change="importer">

					<label>{{ $t('modules') }}</label>
					<div class="modules">
						<div class="module">
							<span>{{ $t('codeqr') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_codeqr')">
								<input id="module_codeqr" type="checkbox" value="codeqr" :checked="$parent.modules.includes('codeqr')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('texte') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_texte')">
								<input id="module_texte" type="checkbox" value="texte" :checked="$parent.modules.includes('texte')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('tableau') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_tableau')">
								<input id="module_tableau" type="checkbox" value="tableau" :checked="$parent.modules.includes('tableau')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('image') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_image')">
								<input id="module_image" type="checkbox" value="image" :checked="$parent.modules.includes('image')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('galerieImages') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_galerie')">
								<input id="module_galerie" type="checkbox" value="galerie" :checked="$parent.modules.includes('galerie')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('dessin') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_dessin')">
								<input id="module_dessin" type="checkbox" value="dessin" :checked="$parent.modules.includes('dessin')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('document') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_document')">
								<input id="module_document" type="checkbox" value="document" :checked="$parent.modules.includes('document')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('audio') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_audio')">
								<input id="module_audio" type="checkbox" value="audio" :checked="$parent.modules.includes('audio')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('syntheseVocale') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_synthese')">
								<input id="module_synthese" type="checkbox" value="synthese" :checked="$parent.modules.includes('synthese')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('video') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_video')">
								<input id="module_video" type="checkbox" value="video" :checked="$parent.modules.includes('video')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('webcam') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_webcam')">
								<input id="module_webcam" type="checkbox" value="webcam" :checked="$parent.modules.includes('webcam')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('lien') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_lien')">
								<input id="module_lien" type="checkbox" value="lien" :checked="$parent.modules.includes('lien')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('contenuIntegre') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_iframe')">
								<input id="module_iframe" type="checkbox" value="iframe" :checked="$parent.modules.includes('iframe')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('html') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_html')">
								<input id="module_html" type="checkbox" value="html" :checked="$parent.modules.includes('html')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('liste') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_liste')">
								<input id="module_liste" type="checkbox" value="liste" :checked="$parent.modules.includes('liste')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('nuageMots') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_nuage')">
								<input id="module_nuage" type="checkbox" value="nuage" :checked="$parent.modules.includes('nuage')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('remiseOrdre') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_ordre')">
								<input id="module_ordre" type="checkbox" value="ordre" :checked="$parent.modules.includes('ordre')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('imagesSequentielles') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_images-sequentielles')">
								<input id="module_images-sequentielles" type="checkbox" value="images-sequentielles" :checked="$parent.modules.includes('images-sequentielles')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('texteATrous') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_trous')">
								<input id="module_trous" type="checkbox" value="trous" :checked="$parent.modules.includes('trous')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('surlignage') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_surlignage')">
								<input id="module_surlignage" type="checkbox" value="surlignage" :checked="$parent.modules.includes('surlignage')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('pendu') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_pendu')">
								<input id="module_pendu" type="checkbox" value="pendu" :checked="$parent.modules.includes('pendu')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('cartes') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_cartes')">
								<input id="module_cartes" type="checkbox" value="cartes" :checked="$parent.modules.includes('cartes')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('tirageSortTexte') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_tirage-texte')">
								<input id="module_tirage-texte" type="checkbox" value="tirage-texte" :checked="$parent.modules.includes('tirage-texte')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('tirageSortNombre') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_tirage-nombre')">
								<input id="module_tirage-nombre" type="checkbox" value="tirage-nombre" :checked="$parent.modules.includes('tirage-nombre')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('tirageSortImage') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_tirage-image')">
								<input id="module_tirage-image" type="checkbox" value="tirage-image" :checked="$parent.modules.includes('tirage-image')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('tirageSortAudio') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_tirage-audio')">
								<input id="module_tirage-audio" type="checkbox" value="tirage-audio" :checked="$parent.modules.includes('tirage-audio')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('roue') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_roue')">
								<input id="module_roue" type="checkbox" value="roue" :checked="$parent.modules.includes('roue')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('histoire') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_histoire')">
								<input id="module_histoire" type="checkbox" value="histoire" :checked="$parent.modules.includes('histoire')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('plateauJeu') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_plateau')">
								<input id="module_plateau" type="checkbox" value="plateau" :checked="$parent.modules.includes('plateau')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('des') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_des')">
								<input id="module_des" type="checkbox" value="des" :checked="$parent.modules.includes('des')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('classement') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_classement')">
								<input id="module_classement" type="checkbox" value="classement" :checked="$parent.modules.includes('classement')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('feuQuadricolore') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_feu')">
								<input id="module_feu" type="checkbox" value="feu" :checked="$parent.modules.includes('feu')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('modalitesTravail') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_modalites')">
								<input id="module_modalites" type="checkbox" value="modalites" :checked="$parent.modules.includes('modalites')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('groupes') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_groupes')">
								<input id="module_groupes" type="checkbox" value="groupes" :checked="$parent.modules.includes('groupes')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('chronometre') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_chrono')">
								<input id="module_chrono" type="checkbox" value="chrono" :checked="$parent.modules.includes('chrono')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('compteRebours') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_rebours')">
								<input id="module_rebours" type="checkbox" value="rebours" :checked="$parent.modules.includes('rebours')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('horlogeModulable') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_horloge_modulable')">
								<input id="module_horloge_modulable" type="checkbox" value="horloge-modulable" :checked="$parent.modules.includes('horloge-modulable')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('horloge') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_horloge')">
								<input id="module_horloge" type="checkbox" value="horloge" :checked="$parent.modules.includes('horloge')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('calendrier') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_calendrier')">
								<input id="module_calendrier" type="checkbox" value="calendrier" :checked="$parent.modules.includes('calendrier')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('sonometre') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_sonometre')">
								<input id="module_sonometre" type="checkbox" value="sonometre" :checked="$parent.modules.includes('sonometre')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('retroaction') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_retroaction')">
								<input id="module_retroaction" type="checkbox" value="retroaction" :checked="$parent.modules.includes('retroaction')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
						<div class="module">
							<span>{{ $t('grille') }}</span>
							<label class="interrupteur" role="button" tabindex="0" @keydown.enter="activerInput('module_grille')">
								<input id="module_grille" type="checkbox" value="grille" :checked="$parent.modules.includes('grille')" @change="modifierModule">
								<span class="curseur" />
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="confirmation" class="conteneur-modale" v-if="confirmation">
			<div class="modale" role="dialog">
				<div class="conteneur">
					<div class="contenu">
						<p v-html="$t('confirmationSuppressionPage', { page: $parent.page })" />
						<div class="actions">
							<span class="bouton" role="button" tabindex="0" @click="confirmation = false" @keydown.enter="confirmation = false">{{ $t('annuler') }}</span>
							<span class="bouton" role="button" tabindex="0" @click="supprimerPage" @keydown.enter="supprimerPage">{{ $t('valider') }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { VueDraggableNext } from 'vue-draggable-next'
import imagesLoaded from 'imagesloaded'

export default {
	name: 'MParametres',
	components: {
		draggable: VueDraggableNext
	},
	data () {
		return {
			ouvert: false,
			image: '',
			pixabayAPIKey: '',
			requete: '',
			resultats: {},
			pageResultats: 1,
			confirmation: false
		}
	},
	watch: {
		pageResultats: function (page) {
			this.rechercher(page)
		}
	},
	created () {
		if (import.meta.env.VITE_PIXABAY_API_KEY) {
			this.pixabayAPIKey = import.meta.env.VITE_PIXABAY_API_KEY
		}
	},
	mounted () {
		setTimeout(function () {
			this.ouvert = true
			setTimeout(function () {
				document.querySelector('#menu-parametres .fermer').focus()
			}.bind(this), 150)
		}.bind(this), 10)
		document.querySelector('#couleur-fond-page').addEventListener('change', this.modifierCouleurFond)
		document.querySelector('#conteneur-menu').addEventListener('click', this.fermer)
	},
	beforeUnmount () {
		if (document.querySelector('#couleur-fond-page')) {
			document.querySelector('#couleur-fond-page').removeEventListener('change', this.modifierCouleurFond)
		}
		if (document.querySelector('#conteneur-menu')) {
			document.querySelector('#conteneur-menu').removeEventListener('click', this.fermer)
		}
	},
	methods: {
		modifierLangue (langue) {
			this.$root.$i18n.locale = langue
			this.$parent.langue = langue
			document.getElementsByTagName('html')[0].setAttribute('lang', langue)
			localStorage.setItem('digiscreen_lang', langue)
		},
		activerInput (id) {
			document.querySelector('#' + id).click()
		},
		modifierFond (fond) {
			const index = this.$parent.page - 1
			this.$parent.pages[index].fond = fond
		},
		modifierCouleurFond (event) {
			this.modifierFond(event.target.value)
		},
		valider () {
			if (this.requete !== '' && this.verifierURL(this.requete) === true) {
				this.modifierFond(this.requete)
			} else if (this.requete !== '') {
				this.rechercher(1)
			}
		},
		rechercher (page) {
			if (this.requete !== '') {
				const requete = this.requete.replace(/\s+/g, '+')
				const xhr = new XMLHttpRequest()
				xhr.onload = function () {
					if (xhr.readyState === xhr.DONE && xhr.status === 200) {
						const donnees = JSON.parse(xhr.responseText)
						if (donnees && donnees.total > 0) {
							this.resultats = donnees
							this.$nextTick(function () {
								// eslint-disable-next-line
								new flexImages({ selector: '.resultats', rowHeight: this.convertirRem(6.5) })
							})
						}
					}
				}.bind(this)
				if (page === 1) {
					this.pageResultats = page
				}
				xhr.open('GET', 'https://pixabay.com/api/?key=' + this.pixabayAPIKey + '&q=' + requete + '&image_type=photo&lang=fr&orientation=horizontal&safesearch=true&per_page=15&page=' + page, true)
				xhr.send()
			}
		},
		modifierPageResultats (type) {
			if (type === 'suivante' && this.pageResultats < (this.resultats.total / 15)) {
				this.pageResultats++
			} else if (type === 'precedente' && this.pageResultats > 1) {
				this.pageResultats--
			}
		},
		verifierRequete () {
			if (this.requete === '') {
				this.resultats = {}
				this.pageResultats = 1
			}
		},
		televerserImage (event) {
			const fichier = event.target.files[0]
			if (fichier) {
				const reader = new FileReader()
				reader.readAsDataURL(fichier)
				reader.onloadend = function (e) {
					const img = new Image()
					img.src = e.target.result
					img.onload = function () {
						if (img.width > 1920) {
							const canvas = document.createElement('canvas')
							const ratio = img.width / img.height
							const largeur = 1920
							const hauteur = 1920 / ratio
							canvas.width = largeur
							canvas.height = hauteur
							canvas.getContext('2d').drawImage(img, 0, 0, largeur, hauteur)
							this.modifierFond(canvas.toDataURL('image/jpeg', 0.85))
						} else {
							this.modifierFond(e.target.result)
						}
					}.bind(this)
				}.bind(this)
			}
		},
		ajouterPage () {
			let index = this.$parent.pages.length
			if (index < 12) {
				index++
				let fond = ''
				switch (index) {
				case 2:
				case 9:
					fond = './static/img/lavande.jpg'
					break
				case 3:
				case 10:
					fond = './static/img/plage.jpg'
					break
				case 4:
				case 11:
					fond = './static/img/lac.jpg'
					break
				case 5:
				case 12:
					fond = './static/img/arbre.jpg'
					break
				case 6:
					fond = './static/img/aurore.jpg'
					break
				case 7:
					fond = './static/img/feuilles.jpg'
					break
				case 8:
					fond = './static/img/digitale.jpg'
					break
				}
				this.$parent.pages.push({ fond: fond, grille: {}, annotations: {}, annotation: false })
			}
		},
		afficherPage (page) {
			this.$parent.page = page
		},
		verifierPages (event) {
			const panneaux = this.$parent.panneaux
			if (event.newIndex < event.oldIndex) {
				panneaux.forEach(function (panneau, indexPanneau) {
					if (panneau.page === event.oldIndex + 1) {
						panneaux[indexPanneau].page = event.newIndex + 1
					} else if (panneau.page >= event.newIndex + 1 && panneau.page <= event.oldIndex + 1) {
						panneaux[indexPanneau].page = panneau.page + 1
					}
				})
			} else {
				panneaux.forEach(function (panneau, indexPanneau) {
					if (panneau.page === event.oldIndex + 1) {
						panneaux[indexPanneau].page = event.newIndex + 1
					} else if (panneau.page >= event.oldIndex + 1 && panneau.page <= event.newIndex + 1) {
						panneaux[indexPanneau].page = panneau.page - 1
					}
				})
			}
			this.$parent.panneaux = panneaux
			if (this.$parent.page === event.oldIndex + 1) {
				this.$parent.page = event.newIndex + 1
			} else if (this.$parent.page === event.newIndex + 1) {
				this.$parent.chargementPage = true
				if (this.$parent.pages[this.$parent.page - 1].annotation === false) {
					this.$parent.annotation = false
				} else {
					this.$parent.annotation = true
				}
				this.$parent.retroaction = false
				this.$parent.modalites = false
				this.$parent.panneauxPage.forEach(function (panneau) {
					if (document.querySelector('#' + panneau.id)) {
						document.querySelector('#' + panneau.id).close()
					}
				})
				const panneauxPage = panneaux.filter(function (element) {
					return element.page === event.newIndex + 1
				})
				imagesLoaded('main', { background: true }, function () {
					this.$parent.panneauxPage = []
					setTimeout(function () {
						this.$parent.panneauxPage.push(...panneauxPage)
						for (let i = 0; i < this.$parent.panneauxPage.length; i++) {
							if (this.$parent.panneauxPage[i].type === 'retroaction') {
								this.$parent.retroaction = true
							}
							if (this.$parent.panneauxPage[i].type === 'modalites') {
								this.$parent.modalites = true
							}
						}
						imagesLoaded('main', { background: true }, function () {
							this.$parent.chargementPage = false
						}.bind(this))
					}.bind(this), 150)
				}.bind(this))
			}
		},
		afficherSupprimerPage () {
			if (this.$parent.pages.length > 1) {
				this.confirmation = true
			}
		},
		supprimerPage () {
			this.confirmation = false
			const index = this.$parent.page - 1
			const pages = this.$parent.pages.length
			this.$parent.pages.splice(index, 1)
			const panneaux = this.$parent.panneaux.filter(function (element) {
				return element.page !== this.$parent.page
			}.bind(this))
			panneaux.forEach(function (panneau) {
				if (panneau.page > this.$parent.page) {
					panneau.page = panneau.page - 1
				}
			}.bind(this))
			this.$parent.panneaux = panneaux
			if (index + 1 < pages) {
				this.$parent.chargementPage = true
				this.$parent.page = index + 1
				if (this.$parent.pages[this.$parent.page - 1].annotation === false) {
					this.$parent.annotation = false
				} else {
					this.$parent.annotation = true
				}
				this.$parent.retroaction = false
				this.$parent.modalites = false
				this.$parent.panneauxPage.forEach(function (panneau) {
					if (document.querySelector('#' + panneau.id)) {
						document.querySelector('#' + panneau.id).close()
					}
				})
				const panneauxPage = panneaux.filter(function (element) {
					return element.page === index + 1
				})
				imagesLoaded('main', { background: true }, function () {
					this.$parent.panneauxPage = []
					setTimeout(function () {
						this.$parent.panneauxPage.push(...panneauxPage)
						for (let i = 0; i < this.$parent.panneauxPage.length; i++) {
							if (this.$parent.panneauxPage[i].type === 'retroaction') {
								this.$parent.retroaction = true
							}
							if (this.$parent.panneauxPage[i].type === 'modalites') {
								this.$parent.modalites = true
							}
						}
						imagesLoaded('main', { background: true }, function () {
							this.$parent.chargementPage = false
						}.bind(this))
					}.bind(this), 150)
				}.bind(this))
			} else {
				this.$parent.page = index
			}
		},
		importer (event) {
			this.$parent.importer(event)
			this.$parent.fermerMenu()
		},
		exporter () {
			this.$parent.exporter()
			this.$parent.fermerMenu()
		},
		modifierModule (event) {
			this.$parent.modifierModule(event)
		},
		fermer (event) {
			if (!document.querySelector('#menu-parametres').contains(event.target)) {
				this.$parent.fermerMenu()
			}
		},
		convertirRem (valeur) {
			const taille = window.getComputedStyle(document.querySelector('html'), null).getPropertyValue('font-size')
			return 'undefined' != typeof valeur && valeur > 0 ? parseFloat(taille) * valeur : parseFloat(taille)
		},
		verifierURL (lien) {
			let url
			try {
				url = new URL(lien)
			} catch (_) {
				return false
			}
			return url.protocol === 'http:' || url.protocol === 'https:'
		}
	}
}
</script>

<style>
#conteneur-menu {
	cursor: pointer;
}

#menu-parametres {
	cursor: default;
}

.menu .langue,
.menu .recherche {
	margin-bottom: 2rem;
}

.menu .pages {
	display: flex;
	justify-content: flex-start;
	align-items: center;
	margin-bottom: 1rem;
}

.menu .pages span:not(.bouton-secondaire),
.menu .langue span {
	display: inline-flex;
	width: 4.5rem;
	height: 4.5rem;
	justify-content: center;
	align-items: center;
	line-height: 1;
	font-size: 2rem;
	border-radius: 50%;
	margin-right: 1rem;
	border: 1px solid #ddd;
	cursor: pointer;
	user-select: none;
}

.menu .pages span:not(.bouton-secondaire) {
	margin-bottom: 1rem;
}

.menu .pages span.selectionne,
.menu .langue span.selectionne {
	background: #444;
	color: #fff;
	border: 1px solid #222;
}

.menu .pages .bouton-secondaire {
	height: 4.5rem!important;
	margin-bottom: 1rem;
}

.menu .pages .bouton-secondaire:first-of-type {
	margin-right: 0.5rem;
}

.menu .pages .bouton-secondaire i {
	line-height: 4.5rem!important;
}

.menu .pages .bouton-secondaire.visible {
	visibility: visible;
}

.menu .pages .bouton-secondaire.invisible {
	visibility: hidden;
}

.menu .fond {
	display: flex;
	justify-content: flex-start;
	flex-wrap: wrap;
	margin-bottom: 1rem;
}

.menu .fond span {
	margin-right: 1rem;
	margin-bottom: 1rem;
	cursor: pointer;
}

.menu .fond span.couleur-fond {
	width: 4.5rem;
	height: 4.5rem;
	border-radius: 50%;
}

.menu .fond span img {
	width: 4.5rem;
	height: 4.5rem;
	font-size: 0;
	line-height: 1;
	border-radius: 50%;
	user-select: none;
}

.menu .fond span.couleur-fond.icone {
	display: flex;
	align-items: center;
	width: 10rem;
	height: 4.5rem;
}

.menu .fond span label {
	font-size: 3.6rem;
	width: 4.5rem;
	text-align: center;
	margin-bottom: 0;
	font-weight: 400;
}

.menu .fond input[type="color"] {
	width: 4.5rem;
	height: 4.5rem;
	border: none;
	margin-left: 1rem;
	cursor: pointer;
}

.menu .fond input[type="color"]::-moz-color-swatch {
	border: 1px solid #ddd;
	border-radius: 50%;
}

.menu .fond input[type="color"]:focus::-moz-color-swatch {
	border: 1px solid #001d1d;
}

.menu .fond input[type="color"]::-webkit-color-swatch {
	border: 1px solid #ddd;
	border-radius: 50%;
}

.menu .fond input[type="color"]:focus::-webkit-color-swatch {
	border: 1px solid #001d1d;
}

.menu .fond input[type="color"]::-webkit-color-swatch-wrapper {
	padding: 0;
}

.menu .fond span:last-child,
.menu .langue span:last-child {
	margin-right: 0;
}

.menu .rechercher label.bouton-secondaire {
	font-size: 3.6rem;
	font-weight: 400;
	margin-bottom: 0;
}

.menu .conteneur .bouton {
	display: inline-block;
	width: 100%;
	margin-top: 0;
	margin-bottom: 2rem;
	text-align: center;
}

.menu .modules {
	width: 100%;
}

.menu .modules .module {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 2rem;
}

.menu .modules .module .interrupteur {
	position: relative;
	display: inline-block;
	width: 6rem;
	height: 3rem;
}

.menu .modules .module .interrupteur input {
	display: none;
}

.menu .modules .module .interrupteur .curseur {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ddd;
	transition: 0.3s;
}

.menu .modules .module .interrupteur .curseur::before {
	position: absolute;
	content: '';
	height: 2.2rem;
	width: 2.6rem;
	left: 0.4rem;
	bottom: 0.4rem;
	background-color: #fff;
	transition: 0.3s;
}

.menu .modules .module .interrupteur input:checked + .curseur {
	background-color: #00ced1;
}

.menu .modules .module .interrupteur input:focus + .curseur {
	box-shadow: 0 0 1px #00ced1;
}

.menu .modules .module .interrupteur input:checked + .curseur::before {
	transform: translateX(2.6rem);
}
</style>
