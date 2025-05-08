<template>
	<JsPanel class="panneau" :visible="!chargement" :options="options">
		<div class="conteneur-gauche" :class="{'masque': mode === 'lecture'}" />
		<div class="conteneur panneau-html" v-if="mode === 'edition'">
			<div class="contenu" v-if="!chargementFichier">
				<label>{{ $t('fichierAppareil') }} (.html)</label>
				<label :for="'selectionner_fichier_' + id" class="bouton" role="button" tabindex="0" @keydown.enter="activerInput('selectionner_fichier_' + id)">{{ $t('selectionnerFichier') }}</label>
				<input :id="'selectionner_fichier_' + id" type="file" @change="televerserFichier" style="display: none" accept=".html">
				<div class="separateur"><span>{{ $t('ou') }}</span></div>
				<label :for="'code_html_' + id">{{ $t('codeHTML') }}</label>
				<textarea :id="'code_html_' + id" :value="html" @input="html = $event.target.value" :placeholder="$t('codeHTML')" />
				<span class="bouton" role="button" tabindex="0" @click="generer" @keydown.enter="generer">{{ $t('valider') }}</span>
			</div>
			<div class="contenu" v-else>
				<div class="conteneur-chargement">
					<div class="chargement" />
				</div>
			</div>
		</div>
		<div class="conteneur panneau-html large" v-else>
			<object type="text/html" :data="html" v-if="type === 'fichier'" />
			<div class="html" v-html="html" v-else />
		</div>
		<div class="conteneur-droite" :class="{'masque': mode === 'lecture'}" />
		<div class="conteneur-bas" :class="{'masque': mode === 'lecture'}" />
	</JsPanel>
</template>

<script>
import JsPanel from '@/components/jspanel.vue'
import Panneau from '@/panneau'

export default {
	name: 'PHtml',
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
			minw: 22,
			minh: 10,
			statut: '',
			dimensions: {},
			position: {},
			html: '',
			dataURL: '',
			type: 'texte',
			chargementFichier: false
		}
	},
	watch: {
		export: function (valeur) {
			if (valeur === true) {
				this.position = { x: this.x, y: this.y }
				this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { html: this.html, dataURL: this.dataURL, type: this.type }, w: this.w, h: this.h, x: this.x, y: this.y })
			}
		}
	},
	created () {
		this.definirCaracteristiques('html')
		if (this.panneau.contenu !== '') {
			this.type = this.panneau.contenu.type
			if (this.type === 'fichier') {
				this.dataURL = this.panneau.contenu.dataURL
				const blob = this.convertirDataURL(this.dataURL)
				this.html = window.URL.createObjectURL(blob)
			} else {
				this.html = this.panneau.contenu.html
			}
		}
		this.genererOptions('html')
	},
	mounted () {
		this.initialiser()
		this.positionner()
		this.chargement = false
		if (this.mode === 'edition' && this.statut !== 'min') {
			setTimeout(function () {
				document.querySelector('label[for="selectionner_fichier_' + this.id + '"]').focus()
			}.bind(this), 0)
		} else if (this.mode === 'lecture') {
			this.redimensionnement = true
		}
	},
	methods: {
		generer () {
			this.mode = 'lecture'
			this.redimensionnement = true
			this.w = 50
			this.h = 42
			this.$nextTick(function () {
				document.querySelector('#' + this.id).focus()
			}.bind(this))
			this.positionner()
		},
		televerserFichier (event) {
			const fichier = event.target.files[0]
			if (fichier) {
				const extension = fichier.name.substring(fichier.name.lastIndexOf('.') + 1)
				if (extension.toLowerCase() === 'html') {
					this.chargementFichier = true
					this.type = 'fichier'
					const reader = new FileReader()
					reader.readAsDataURL(fichier)
					reader.onloadend = function (e) {
						this.chargementFichier = false
						this.dataURL = e.target.result
						this.html = window.URL.createObjectURL(fichier)
						this.generer()
					}.bind(this)
				}
			}
		}
	}
}
</script>

<style>
.panneau .panneau-html.large {
	width: 100%!important;
	height: 100%!important;
	padding: 0 2rem 2rem;
}

.panneau .panneau-html .conteneur-chargement {
	font-size: 0;
	line-height: 1;
	text-align: center;
}

.panneau .panneau-html .chargement {
	display: inline-block;
	border: 7px solid #ddd;
	border-top: 7px solid #00ced1;
	border-radius: 50%;
	width: 45px;
	height: 45px;
	animation: rotation 0.7s linear infinite;
}

.panneau .panneau-html label.bouton {
	width: auto!important;
    display: inline-block!important;
	margin-top: 0;
	margin-bottom: 0!important;
}

.panneau .panneau-html object {
	width: 100%;
	height: 100%;
}

.panneau .panneau-html textarea {
	height: 12.9rem;
}

.panneau .panneau-html .separateur {
    position: relative;
    margin: 2rem 25% 2rem;
    text-align: center;
    width: 50%;
}

.panneau .panneau-html .separateur::before {
    position: absolute;
    top: 50%;
    display: block;
    content: '';
    width: 100%;
    height: 1px;
    background-color: #ddd;
}

.panneau .panneau-html .separateur span {
    position: relative;
	display: inline-block;
    margin: 0;
    font-size: 1.5rem;
    z-index: 2;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    vertical-align: middle;
    background-color: #fff;
}
</style>
