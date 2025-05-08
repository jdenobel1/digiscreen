<template>
	<div class="conteneur-modale">
		<div id="modale-corbeille" class="modale" role="dialog">
			<header>
				<span class="titre">{{ $t('corbeille') }}</span>
				<span class="fermer" role="button" tabindex="0" @click="$parent.fermerModale" @keydown.enter="$parent.fermerModale"><i class="material-icons">close</i></span>
			</header>
			<div class="conteneur">
				<div class="contenu">
					<template v-if="$parent.pages.length === 1 && corbeille.length > 0">
						<div class="item" v-for="(item, index) in corbeille" :key="'panneau_supprime_' + index">
							<span class="titre" v-if="item.titre">{{ item.titre }}</span>
							<span class="titre" v-else>{{ definirTitre(item.type) }}</span>
							<div class="actions">
								<span role="button" tabindex="0" :title="$t('restaurer')" @click="restaurerPanneau(item.id, item.page)" @keydown.enter="restaurerPanneau(item.id, item.page)"><i class="material-icons">history</i></span>
								<span role="button" tabindex="0" :title="$t('supprimer')" @click="supprimerPanneau(item.id)" @keydown.enter="supprimerPanneau(item.id)"><i class="material-icons">delete</i></span>
							</div>
						</div>
					</template>
					<span class="vide" v-else-if="$parent.pages.length === 1 && corbeille.length === 0">{{ $t('aucunPanneauSupprime') }}</span>
					<template v-else-if="$parent.pages.length > 1">
						<div class="panneaux" v-for="page in $parent.pages.length" :key="'panneaux_' + page">
							<span class="page">{{ $t('page') + ' ' + page }}</span>
							<template v-for="(item, index) in corbeille" :key="'panneau_supprime_' + index">
								<div class="item" v-if="item.page === page">
									<span class="titre" v-if="item.titre">{{ item.titre }}</span>
									<span class="titre" v-else>{{ definirTitre(item.type) }}</span>
									<div class="actions">
										<span role="button" tabindex="0" :title="$t('restaurer')" @click="restaurerPanneau(item.id, item.page)" @keydown.enter="restaurerPanneau(item.id, item.page)"><i class="material-icons">history</i></span>
										<span role="button" tabindex="0" :title="$t('supprimer')" @click="supprimerPanneau(item.id)" @keydown.enter="supprimerPanneau(item.id)"><i class="material-icons">delete</i></span>
									</div>
								</div>
							</template>
							<span class="vide" v-if="definirPanneauxPage(page) === 0">{{ $t('aucunPanneauSupprime') }}</span>
						</div>
					</template>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import imagesLoaded from 'imagesloaded'

export default {
	name: 'MCorbeille',
	props: {
		corbeille: Array
	},
	data () {
		return {
			panneaux: ['chrono', 'feu', 'galerie', 'horloge-modulable', 'iframe', 'images-sequentielles', 'nuage', 'ordre', 'plateau', 'rebours', 'synthese', 'tirage-audio', 'tirage-image', 'tirage-nombre', 'tirage-texte', 'trous'],
			nomsPanneaux: { chrono: 'chronometre', feu: 'feuQuadricolore', galerie: 'galerieImages', 'horloge-modulable': 'horlogeModulable', iframe: 'contenuIntegre', 'images-sequentielles': 'imagesSequentielles', nuage: 'nuageMots', ordre: 'remiseOrdre', plateau: 'plateauJeu', rebours: 'compteRebours', synthese: 'syntheseVocale', 'tirage-audio': 'tirageSortAudio', 'tirage-image': 'tirageSortImage', 'tirage-nombre': 'tirageSortNombre', 'tirage-texte': 'tirageSortTexte', trous: 'texteATrous' },
			elementPrecedent: null
		}
	},
	methods: {
		definirTitre (type) {
			if (this.panneaux.includes(type)) {
				return this.$t(this.nomsPanneaux[type])
			} else {
				return this.$t(type)
			}
		},
		definirPanneauxPage (page) {
			let panneaux = 0
			this.corbeille.forEach(function (panneau) {
				if (panneau.page === page) {
					panneaux++
				}
			})
			return panneaux
		},
		restaurerPanneau (id, page) {
			if (this.$parent.page === page) {
				this.$parent.chargementPage = true
				this.corbeille.forEach(function (panneau, index) {
					if (panneau.id === id) {
						this.$parent.panneaux.push(panneau)
						this.corbeille.splice(index, 1)
					}
				}.bind(this))
				this.$parent.panneauxPage.forEach(function (panneau) {
					if (document.querySelector('#' + panneau.id)) {
						document.querySelector('#' + panneau.id).close()
					}
				})
				this.$parent.panneauxPage = []
				const panneauxPage = this.$parent.panneaux.filter(function (element) {
					return element.page === page
				})
				imagesLoaded('main', { background: true }, function () {
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
						this.$nextTick(function () {
							if (this.$parent.lectureSeule === true) {
								const panneaux = document.querySelectorAll('.jsPanel')
								panneaux.forEach(function (panneau) {
									if (panneau.querySelector('.jsPanel-btn-close')) {
										panneau.setControlStatus('close', 'hide')
									}
								})
							}
						}.bind(this))
						this.$parent.chargementPage = false
					}.bind(this), 150)
				}.bind(this))
			} else {
				this.corbeille.forEach(function (panneau, index) {
					if (panneau.id === id) {
						this.$parent.panneaux.push(panneau)
						this.corbeille.splice(index, 1)
					}
				}.bind(this))
			}
		},
		supprimerPanneau (id) {
			this.corbeille.forEach(function (panneau, index) {
				if (panneau.id === id) {
					this.corbeille.splice(index, 1)
				}
			}.bind(this))
		},
		gererFocus () {
			if (this.elementPrecedent) {
				this.elementPrecedent.focus()
				this.elementPrecedent = null
			}
		}
	}
}
</script>

<style scoped>
#modale-corbeille {
	height: 40rem;
}

.conteneur .item {
	display: flex;
	justify-content: space-between;
	align-items: center;
	border: 1px solid #ddd;
	padding: 1rem;
	margin-bottom: 1rem;
	border-radius: 5px;
}

.conteneur .item:last-child {
	margin-bottom: 0;
}

.conteneur .titre {
	width: calc(100% - 58px);
	font-size: 16px;
	text-align: left;
}

.conteneur .actions {
	width: 58px;
}

.conteneur .actions span {
	user-select: none;
	cursor: pointer;
}

.conteneur .actions span:first-child {
	margin-right: 10px;
}

.conteneur .actions span i {
	font-size: 24px;
}

.conteneur .page {
	display: block;
	font-size: 14px;
	font-weight: 700;
	text-align: left;
	margin-bottom: 1rem;
	padding-bottom: 1rem;
	border-bottom: 1px dashed #ddd;
}

.conteneur .panneaux {
	margin-bottom: 1rem;
	padding-bottom: 1rem;
	border-bottom: 1px dashed #ddd;
}

.conteneur .vide {
	font-size: 16px;
}
</style>
