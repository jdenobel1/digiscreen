<template>
	<JsPanel class="panneau" :visible="!chargement" :options="options">
		<div class="conteneur-gauche" />
		<div class="conteneur panneau-retroaction">
			<div class="contenu">
				<div class="retroactions">
					<span id="confettis" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('applaudissements', 'confettis')" @keydown.enter="ouvrirCarte('applaudissements', 'confettis')" style="background-image: url(./static/img/retroactions/confettis.svg)" />
					<span id="applaudissements" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('applaudissements', 'applaudissements')" @keydown.enter="ouvrirCarte('applaudissements', 'applaudissements')" style="background-image: url(./static/img/retroactions/applaudissements.svg)" />
					<span id="victoire" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('victoire', 'victoire')" @keydown.enter="ouvrirCarte('victoire', 'victoire')" style="background-image: url(./static/img/retroactions/victoire.svg)" />
					<span id="dommage" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('dommage', 'dommage')" @keydown.enter="ouvrirCarte('dommage', 'dommage')" style="background-image: url(./static/img/retroactions/dommage.svg)" />
					<span id="vrai" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('vrai', 'vrai')" @keydown.enter="ouvrirCarte('vrai', 'vrai')" style="background-image: url(./static/img/retroactions/vrai.svg)" />
					<span id="faux" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('faux', 'faux')" @keydown.enter="ouvrirCarte('faux', 'faux')" style="background-image: url(./static/img/retroactions/faux.svg)" />
					<span id="pouce-haut" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('vrai', 'pouce-haut')" @keydown.enter="ouvrirCarte('vrai', 'pouce-haut')" style="background-image: url(./static/img/retroactions/pouce-haut.svg)" />
					<span id="pouce-bas" class="bouton" role="button" tabindex="0" @click="ouvrirCarte('faux', 'pouce-bas')" @keydown.enter="ouvrirCarte('faux', 'pouce-bas')" style="background-image: url(./static/img/retroactions/pouce-bas.svg)" />
				</div>
				<label>{{ $t('activerEffetsSonores') }}</label>
				<div class="choix">
					<span class="oui">
						<input :id="'son_oui_' + id" type="radio" :name="'son_' + id" value="oui" :checked="son === 'oui'" @change="son = $event.target.value">
						<label :for="'son_oui_' + id" tabindex="0" @keydown.enter="activerInput('son_oui_' + id)">{{ $t('oui') }}</label>
					</span>
					<span class="non">
						<input :id="'son_non_' + id" type="radio" :name="'son_' + id" value="non" :checked="son === 'non'" @change="son = $event.target.value">
						<label :for="'son_non_' + id" tabindex="0" @keydown.enter="activerInput('son_non_' + id)">{{ $t('non') }}</label>
					</span>
				</div>
			</div>
		</div>
		<div class="conteneur-droite" />
		<div class="conteneur-bas" />
	</JsPanel>

	<div id="carte-confettis" class="conteneur-carte" :class="{'ouvert': carte === 'confettis'}" @click="fermerCarte" key="confettis">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/confettis.svg" alt="confettis"></span>
	</div>

	<div id="carte-applaudissements" class="conteneur-carte" :class="{'ouvert': carte === 'applaudissements'}" @click="fermerCarte" key="applaudissements">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/applaudissements.svg" alt="applaudissements"></span>
	</div>

	<div id="carte-victoire" class="conteneur-carte" :class="{'ouvert': carte === 'victoire'}" @click="fermerCarte" key="victoire">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/victoire.svg" alt="victoire"></span>
	</div>

	<div id="carte-dommage" class="conteneur-carte" :class="{'ouvert': carte === 'dommage'}" @click="fermerCarte" key="dommage">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/dommage.svg" alt="dommage"></span>
	</div>

	<div id="carte-vrai" class="conteneur-carte" :class="{'ouvert': carte === 'vrai'}" @click="fermerCarte" key="vrai">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/vrai.svg" alt="vrai"></span>
	</div>

	<div id="carte-faux" class="conteneur-carte" :class="{'ouvert': carte === 'faux'}" @click="fermerCarte" key="faux">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/faux.svg" alt="faux"></span>
	</div>

	<div id="carte-pouce-haut" class="conteneur-carte" :class="{'ouvert': carte === 'pouce-haut'}" @click="fermerCarte" key="pouce-haut">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/pouce-haut.svg" alt="pouce-haut"></span>
	</div>

	<div id="carte-pouce-bas" class="conteneur-carte" :class="{'ouvert': carte === 'pouce-bas'}" @click="fermerCarte" key="pouce-bas">
		<span class="carte"><img role="button" tabindex="0" @keydown.enter="fermerCarte" src="@/assets/img/retroactions/pouce-bas.svg" alt="pouce-bas"></span>
	</div>
</template>

<script>
import JsPanel from '@/components/jspanel.vue'
import Panneau from '@/panneau'

export default {
	name: 'PRetroaction',
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
	emits: {
		afficher: null,
		fermer: null,
		export: null
	},
	extends: Panneau,
	data () {
		return {
			chargement: true,
			options: {},
			mode: 'lecture',
			deplacement: false,
			redimensionnement: false,
			titre: '',
			id: '',
			w: 0,
			h: 0,
			x: 0,
			y: 0,
			minw: 36,
			minh: 31,
			statut: '',
			dimensions: {},
			position: {},
			donnees: { w: 0, h: 0, x: 0, y: 0 },
			carte: '',
			son: 'oui',
			elementPrecedent: null
		}
	},
	watch: {
		export: function (valeur) {
			if (valeur === true) {
				this.position = { x: this.x, y: this.y }
				this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { son: this.son }, w: this.w, h: this.h, x: this.x, y: this.y })
			}
		}
	},
	created () {
		this.definirCaracteristiques('retroaction')
		if (this.panneau.contenu !== '') {
			this.son = this.panneau.contenu.son
		}
		this.genererOptions('retroaction')
	},
	mounted () {
		this.initialiser()
		this.positionner()
		this.chargement = false
		if (this.statut !== 'min') {
			setTimeout(function () {
				document.querySelector('#' + this.id + ' .bouton').focus()
			}.bind(this), 0)
		}
	},
	methods: {
		ouvrirCarte (audio, carte) {
			this.carte = carte
			this.elementPrecedent = document.querySelector('#' + carte)
			if (this.son === 'oui') {
				if (this.$parent.audio.src !== '') {
					this.$parent.audio.pause()
					this.$parent.audio.currentTime = 0
				}
				this.$parent.audio.src = './static/audio/' + audio + '.mp3'
				this.$parent.audio.play()
			}
			if (carte === 'confettis' || carte === 'applaudissements' || carte === 'victoire') {
				this.lancerConfettis()
			}
			setTimeout(function () {
				document.querySelector('#carte-' + carte + ' img').focus()
			}.bind(this), 20)
		},
		fermerCarte () {
			this.carte = ''
			if (this.$parent.audio.src !== '') {
				this.$parent.audio.pause()
				this.$parent.audio.currentTime = 0
			}
			this.gererFocus()
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

<style>
.panneau .panneau-retroaction .retroactions {
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
	margin-bottom: 2rem;
}

.panneau .panneau-retroaction .bouton {
	background-color: #fff;
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	height: 7rem;
	width: 7rem;
	border: 2px solid #00ced1;
	border-radius: 50%;
}

.panneau .panneau-retroaction .bouton:hover {
	border: 2px solid #00acb0;
	background: #00ced1;
}

.panneau .panneau-retroaction .oui {
	margin-right: 2.5rem;
}

.panneau .panneau-retroaction .choix label {
	display: inline-block;
	width: auto;
	font-size: 1.6rem;
	font-weight: 400;
    margin-left: 1rem;
	margin-bottom: 0;
}

.conteneur-carte {
	visibility: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	height: 100%;
	width: 100%;
	z-index: 10005;
	background-color: rgba(0, 0, 0, 0.3);
	opacity: 0;
	transition: opacity 0.4s ease-in-out;
	cursor: pointer;
}

.conteneur-carte.ouvert {
	visibility: visible;
	opacity: 1;
}

.conteneur-carte .carte {
	color: #fff;
	transform: scale(0);
	transition: all 0.4s ease-in-out;
	user-select: none;
}

.conteneur-carte .carte img {
	width: auto;
	height: 75vh;
}

.conteneur-carte.ouvert .carte {
	transform: scale(1);
}
</style>
