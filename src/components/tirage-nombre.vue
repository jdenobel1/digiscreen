<template>
	<JsPanel class="panneau" :visible="!chargement" :options="options">
		<div class="conteneur-gauche" />
		<div class="conteneur panneau-tirage-nombre">
			<div class="contenu" v-if="mode === 'edition'">
				<div class="plage-nombre">
					<div class="min">
						<label :for="'minimum_' + id">{{ $t('minimum') }}</label>
						<input :id="'minimum_' + id" type="number" :value="nombreMin" :min="1" @input="nombreMin = $event.target.value">
					</div>
					<div class="max">
						<label :for="'maximum_' + id">{{ $t('maximum') }}</label>
						<input :id="'maximum_' + id" type="number" :value="nombreMax" :min="1" @input="nombreMax = $event.target.value">
					</div>
				</div>
				<label>{{ $t('supprimerItemTirage') }}</label>
				<div class="choix">
					<span class="oui">
						<input :id="'choix_oui_' + id" type="radio" :name="'choix_' + id" value="oui" :checked="suppression === 'oui'" @change="suppression = $event.target.value">
						<label :for="'choix_oui_' + id" tabindex="0" @keydown.enter="activerInput('choix_oui_' + id)">{{ $t('oui') }}</label>
					</span>
					<span class="non">
						<input :id="'choix_non_' + id" type="radio" :name="'choix_' + id" value="non" :checked="suppression === 'non'" @change="suppression = $event.target.value">
						<label :for="'choix_non_' + id" tabindex="0" @keydown.enter="activerInput('choix_non_' + id)">{{ $t('non') }}</label>
					</span>
				</div>
				<span class="bouton" role="button" tabindex="0" @click="generer" @keydown.enter="generer">{{ $t('valider') }}</span>
			</div>
			<div class="contenu" v-else>
				<div class="tirage" :class="{'tirage-en-cours': tirageEnCours, 'plein-ecran': statut === 'max'}">
					{{ tirage }}
				</div>
				<div class="actions">
					<span class="bouton" role="button" tabindex="0" @click="tirer" @keydown.enter="tirer">{{ $t('tirer') }}</span>
				</div>
			</div>
		</div>
		<div class="conteneur-droite" />
		<div class="conteneur-bas" />
	</JsPanel>
</template>

<script>
import JsPanel from '@/components/jspanel.vue'
import Panneau from '@/panneau'

export default {
	name: 'PTirageNombre',
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
			minw: 30,
			minh: 15,
			statut: '',
			dimensions: {},
			position: {},
			donnees: { w: 0, h: 0, x: 0, y: 0 },
			nombreMin: 1,
			nombreMax: 100,
			tirage: '',
			itemsTires: [],
			suppression: 'non',
			tirageEnCours: false
		}
	},
	watch: {
		export: function (valeur) {
			if (valeur === true) {
				this.position = { x: this.x, y: this.y }
				this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { nombreMin: this.nombreMin, nombreMax: this.nombreMax, suppression: this.suppression }, w: this.w, h: this.h, x: this.x, y: this.y })
			}
		}
	},
	created () {
		this.definirCaracteristiques('tirageSortNombre')
		if (this.panneau.contenu !== '') {
			this.nombreMin = this.panneau.contenu.nombreMin
			this.nombreMax = this.panneau.contenu.nombreMax
			this.suppression = this.panneau.contenu.suppression
		}
		if (this.mode === 'lecture') {
			this.redimensionnement = true
			this.tirage = '✨✨✨'
		}
		this.genererOptions('tirage-nombre')
	},
	mounted () {
		this.initialiser()
		this.positionner()
		this.chargement = false
		if (this.mode === 'edition' && this.statut !== 'min') {
			setTimeout(function () {
				document.querySelector('#minimum_' + this.id).focus()
			}.bind(this), 0)
		} else if (this.mode === 'lecture' && this.statut !== 'min') {
			setTimeout(function () {
				document.querySelector('#' + this.id + ' .actions .bouton').focus()
			}.bind(this), 0)
		}
	},
	methods: {
		generer () {
			if (this.nombreMin > 0 && this.nombreMax > this.nombreMin) {
				this.mode = 'lecture'
				this.redimensionnement = true
				if (this.donnees.w > 0 && this.donnees.h > 0) {
					this.w = this.donnees.w
					this.h = this.donnees.h
				} else {
					this.w = 40
					this.h = 30
				}
				if (this.donnees.x > 0 && this.donnees.y > 0) {
					this.x = this.donnees.x
					this.y = this.donnees.y
				}
				this.tirage = '✨✨✨'
				this.$nextTick(function () {
					document.querySelector('#' + this.id + ' .actions .bouton').focus()
				}.bind(this))
				this.positionner()
			}
		},
		tirer () {
			let itemTire
			const tirageEnCours = setInterval(function () {
				let tirage = Math.floor(Math.random() * (this.nombreMax - this.nombreMin + 1) + this.nombreMin)
				while (this.itemsTires.includes(tirage) === true) {
					tirage = Math.floor(Math.random() * (this.nombreMax - this.nombreMin + 1) + this.nombreMin)
				}
				itemTire = tirage
				this.tirage = tirage.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ')
				this.tirageEnCours = true
			}.bind(this), 5)
			setTimeout(function () {
				clearInterval(tirageEnCours)
				this.tirageEnCours = false
				if (this.suppression === 'oui') {
					this.itemsTires.push(itemTire)
				}
			}.bind(this), 1200)
		},
		editer () {
			this.mode = 'edition'
			this.redimensionnement = false
			this.donnees.w = this.w
			this.donnees.h = this.h
			this.donnees.x = this.x
			this.donnees.y = this.y
			this.w = 46
			this.h = 28
			this.$nextTick(function () {
				document.querySelector('#' + this.id + ' input').focus()
			}.bind(this))
			this.positionner()
		}
	}
}
</script>

<style>
.panneau .panneau-tirage-nombre .plage-nombre {
	margin-bottom: 2rem;
}

.panneau .panneau-tirage-nombre .min,
.panneau .panneau-tirage-nombre .max {
	display: inline-block;
}

.panneau .panneau-tirage-nombre .min input,
.panneau .panneau-tirage-nombre .max input {
	width: 12rem;
}

.panneau .panneau-tirage-nombre .min {
	margin-right: 2rem;
}

.panneau .panneau-tirage-nombre .oui {
	margin-right: 2.5rem;
}

.panneau .panneau-tirage-nombre .choix label {
	display: inline-block;
	width: auto;
	font-size: 1.6rem;
	font-weight: 400;
    margin-left: 1rem;
	margin-bottom: 0;
}

.panneau .panneau-tirage-nombre div.tirage {
    display: flex;
    justify-content: center;
	flex-wrap: wrap;
	font-size: 7.5rem;
	font-weight: 400;
	margin-bottom: 2rem;
}

.panneau .panneau-tirage-nombre div.tirage.plein-ecran {
	font-size: 11rem;
}

.panneau .panneau-tirage-nombre div.tirage.tirage-en-cours {
	opacity: 0.25;
}

.panneau .panneau-tirage-nombre div.tirage span {
    font-size: 2rem;
	color: orange;
}
</style>
