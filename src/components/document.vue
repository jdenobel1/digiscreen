<template>
	<JsPanel class="panneau" :visible="!chargement" :options="options">
		<div class="conteneur-gauche" :class="{'masque': mode === 'lecture'}" />
		<div class="conteneur panneau-document" v-if="mode === 'edition'">
			<div class="contenu" v-if="!chargementDocument">
				<label>{{ $t('documentAppareil') }}</label>
				<label :for="'selectionner_document_' + id" class="bouton" role="button" tabindex="0" @keydown.enter="activerInput('selectionner_document_' + id)">{{ $t('selectionnerDocument') }}</label>
				<input :id="'selectionner_document_' + id" type="file" @change="televerserDocument" style="display: none" accept=".pdf, .ods, .odt, .odp, .odg">
			</div>
			<div class="contenu" v-else>
				<div class="conteneur-chargement">
					<div class="chargement" />
				</div>
			</div>
		</div>
		<div class="conteneur panneau-document large" v-else>
			<iframe :src="'./static/pdfjs/web/viewer.html?file=' + document" allowfullscreen crossorigin v-if="type === 'pdf'"></iframe>
			<iframe :src="'./static/viewer/#' + document" allowfullscreen crossorigin v-else></iframe>
		</div>
		<div class="conteneur-droite" :class="{'masque': mode === 'lecture'}" />
		<div class="conteneur-bas" :class="{'masque': mode === 'lecture'}" />
	</JsPanel>
</template>

<script>
import JsPanel from '@/components/jspanel.vue'
import Panneau from '@/panneau'

export default {
	name: 'PDocument',
	components: {
		JsPanel
	},
	props: {
		panneau: Object,
		pages: Array,
		nav: Boolean,
		export: Boolean,
		evenementClavier: Object
	},
	extends: Panneau,
	data () {
		return {
			chargement: true,
			options: {},
			mode: 'edition',
			deplacement: false,
			redimensionnement: false,
			titre: '',
			id: '',
			w: 0,
			h: 0,
			x: 0,
			y: 0,
			minw: 40,
			minh: 16,
			statut: '',
			dimensions: {},
			position: {},
			document: '',
			dataURL: '',
			type: '',
			chrono: '',
			chargementDocument: false
		}
	},
	watch: {
		export: async function (valeur) {
			if (valeur === true && this.type === 'pdf') {
				const iframe = document.querySelector('#' + this.id + ' iframe')
				if (iframe && iframe.contentWindow.PDFViewerApplication.pdfDocument !== null) {
					const annotations = iframe.contentWindow.PDFViewerApplication.pdfDocument._transport.annotationStorage.getAll()
					if (annotations === null) {
						this.position = { x: this.x, y: this.y }
						this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { document: this.document, dataURL: this.dataURL, type: this.type }, w: this.w, h: this.h, x: this.x, y: this.y })
					} else {
						const donnees = await iframe.contentWindow.PDFViewerApplication.pdfDocument._transport.saveDocument()
						const blob = new Blob([donnees], { type: 'application/pdf' })
						const reader = new FileReader()
						reader.readAsDataURL(blob)
						reader.onloadend = function (e) {
							this.dataURL = e.target.result
							this.position = { x: this.x, y: this.y }
							this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { document: this.document, dataURL: this.dataURL, type: this.type }, w: this.w, h: this.h, x: this.x, y: this.y })
						}.bind(this)
					}
				} else {
					this.position = { x: this.x, y: this.y }
					this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { document: this.document, dataURL: this.dataURL, type: this.type }, w: this.w, h: this.h, x: this.x, y: this.y })
				}
			} else if (valeur === true) {
				this.position = { x: this.x, y: this.y }
				this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { document: this.document, dataURL: this.dataURL, type: this.type }, w: this.w, h: this.h, x: this.x, y: this.y })
			}
		}
	},
	created () {
		this.definirCaracteristiques('document')
		if (this.panneau.contenu !== '') {
			this.type = this.panneau.contenu.type
			if (this.type === 'pdf') {
				this.dataURL = this.panneau.contenu.dataURL
				const blob = this.convertirDataURL(this.dataURL)
				this.document = window.URL.createObjectURL(blob)
			} else {
				this.document = this.panneau.contenu.document
			}
		}
		this.genererOptions('document')
	},
	mounted () {
		this.initialiser()
		this.positionner()
		this.chargement = false
		if (this.mode === 'lecture') {
			this.redimensionnement = true
		}
		if (this.type === 'pdf') {
			this.$nextTick(function () {
				this.enregistrerAnnotations()
			}.bind(this))
		}
	},
	methods: {
		generer () {
			this.mode = 'lecture'
			this.redimensionnement = true
			this.w = 50
			this.h = 35
			this.$nextTick(function () {
				document.querySelector('#' + this.id).focus()
				if (this.type === 'pdf') {
					this.enregistrerAnnotations()
				}
			}.bind(this))
			this.positionner()
		},
		televerserDocument (event) {
			const fichier = event.target.files[0]
			if (fichier) {
				const extension = fichier.name.substring(fichier.name.lastIndexOf('.') + 1)
				if (extension.toLowerCase() === 'pdf') {
					this.chargementDocument = true
					this.type = 'pdf'
					const reader = new FileReader()
					reader.readAsDataURL(fichier)
					reader.onloadend = function (e) {
						this.chargementDocument = false
						this.dataURL = e.target.result
						this.document = window.URL.createObjectURL(fichier)
						this.generer()
					}.bind(this)
				} else if (extension.toLowerCase() === 'odt' || extension.toLowerCase() === 'odp' || extension.toLowerCase() === 'ods' || extension.toLowerCase() === 'odg') {
					if (fichier.size < 1024000) {
						this.chargementDocument = true
						this.type = 'doc'
						const reader = new FileReader()
						reader.readAsDataURL(fichier)
						reader.onloadend = function (e) {
							this.chargementDocument = false
							this.document = e.target.result
							this.generer()
						}.bind(this)
					} else {
						alert(this.$t('erreurTailleFichier'))
					}
				}
			}
		},
		enregistrerAnnotations () {
			const iframe = document.querySelector('#' + this.id + ' iframe')
			iframe.addEventListener('load', function () {
				iframe.contentWindow.PDFViewerApplication.initializedPromise.then(function () {
					iframe.contentWindow.PDFViewerApplication.eventBus.on('documentloaded', function () {
						iframe.contentWindow.PDFViewerApplication.eventBus.on('annotationeditorparamschanged', function () {
							const annotations = iframe.contentWindow.PDFViewerApplication.pdfDocument._transport.annotationStorage.getAll()
							if (annotations !== null) {
								if (this.chrono !== '') {
									clearTimeout(this.chrono)
									this.chrono = ''
								}
								this.chrono = setTimeout(async function () {
									const donnees = await iframe.contentWindow.PDFViewerApplication.pdfDocument._transport.saveDocument()
									const blob = new Blob([donnees], { type: 'application/pdf' })
									const reader = new FileReader()
									reader.readAsDataURL(blob)
									reader.onloadend = function (e) {
										this.dataURL = e.target.result
									}.bind(this)
									this.chrono = ''
								}.bind(this), 1000)
							}
						}.bind(this))
					}.bind(this))
				}.bind(this))
			}.bind(this))
		}
	}
}
</script>

<style>
.panneau .panneau-document.large {
	width: 100%!important;
	height: 100%!important;
	border-bottom-left-radius: 0.7rem;
	border-bottom-right-radius: 0.7rem;
}

.panneau .panneau-document .conteneur-chargement {
	font-size: 0;
	line-height: 1;
	text-align: center;
}

.panneau .panneau-document .chargement {
	display: inline-block;
	border: 7px solid #ddd;
	border-top: 7px solid #00ced1;
	border-radius: 50%;
	width: 45px;
	height: 45px;
	animation: rotation 0.7s linear infinite;
}

.panneau .panneau-document label.bouton {
	width: auto!important;
    display: inline-block!important;
	margin-top: 0;
	margin-bottom: 0!important;
}
</style>
