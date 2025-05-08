<template>
	<JsPanel class="panneau" :visible="!chargement" :options="options">
		<div class="conteneur-gauche" />
		<div class="conteneur panneau-classement">
			<div class="contenu" v-if="mode === 'edition'">
				<label :for="'liste_personnes_' + id">{{ $t('listePersonnes') }}</label>
				<span class="consigne" v-html="$t('consigneClassement')" />
				<textarea :id="'liste_personnes_' + id" class="classement" :value="texte" @input="texte = $event.target.value" :placeholder="$t('exempleGroupe')"></textarea>
				<label :for="'nombre_points_' + id">{{ $t('nombrePoints') }}</label>
				<input :id="'nombre_points_' + id" type="number" :value="points" :min="1" @input="points = $event.target.value">
				<span class="bouton" role="button" tabindex="0" @click="generer" @keydown.enter="generer">{{ $t('valider') }}</span>
			</div>
			<div class="contenu" v-else>
				<div class="classement">
					<div class="personne" v-for="(item, index) in classement" :key="'personne_' + index">
						<div class="titre" tabindex="0" @dblclick="afficherRenommerPersonne(item.personne, item.id)" @keydown.enter="afficherRenommerPersonne(item.personne, item.id)">{{ item.personne }}</div>
						<div class="score">
							<span class="moins" role="button" tabindex="0" @click="retirerPoints(item.id)" @keydown.enter="retirerPoints(item.id)"><i class="material-icons">remove</i></span>
							<span class="points" role="button" tabindex="0" @click="modifierScore(item.id)" @keydown.enter="modifierScore(item.id)">{{ item.score }}</span>
							<span class="plus" role="button" tabindex="0" @click="ajouterPoints(item.id)" @keydown.enter="ajouterPoints(item.id)"><i class="material-icons">add</i></span>
						</div>
					</div>
				</div>
				<div class="actions">
					<span class="bouton" role="button" tabindex="0" @click="classer" @keydown.enter="classer">{{ $t('classer') }}</span>
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
	name: 'PClassement',
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
			minw: 32,
			minh: 28,
			statut: '',
			dimensions: {},
			position: {},
			donnees: { w: 0, h: 0, x: 0, y: 0 },
			texte: '',
			points: 100,
			classement: [],
			personneId: ''
		}
	},
	watch: {
		export: function (valeur) {
			if (valeur === true) {
				this.position = { x: this.x, y: this.y }
				this.$emit('export', { id: this.id, titre: this.titre, mode: this.mode, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: { texte: this.texte, points: this.points, classement: this.classement }, w: this.w, h: this.h, x: this.x, y: this.y })
			}
		}
	},
	created () {
		this.definirCaracteristiques('classement')
		if (this.panneau.contenu !== '') {
			this.texte = this.panneau.contenu.texte
			this.points = this.panneau.contenu.points
			this.classement = this.panneau.contenu.classement
		}
		if (this.mode === 'lecture') {
			this.redimensionnement = true
		}
		this.genererOptions('classement')
	},
	mounted () {
		this.initialiser()
		this.positionner()
		this.chargement = false
		if (this.mode === 'edition' && this.statut !== 'min' && this.texte === '') {
			setTimeout(function () {
				document.querySelector('#' + this.id + ' textarea').focus()
			}.bind(this), 0)
		}
	},
	methods: {
		generer () {
			if (this.texte !== '') {
				this.mode = 'lecture'
				this.redimensionnement = true
				let liste = this.texte.split(',').map(item => item.trim())
				liste = liste.filter(item => item !== '')
				liste.forEach(function (personne) {
					const id = 'personne-' + (new Date()).getTime() + Math.random().toString(16).slice(12)
					this.classement.push({ id: id, personne: personne, score: 0 })
				}.bind(this))
				if (this.donnees.w > 0 && this.donnees.h > 0) {
					this.w = this.donnees.w
					this.h = this.donnees.h
				} else {
					this.w = 64
					this.h = 48
				}
				if (this.donnees.x > 0 && this.donnees.y > 0) {
					this.x = this.donnees.x
					this.y = this.donnees.y
				}
				this.$nextTick(function () {
					document.querySelector('#' + this.id).focus()
				}.bind(this))
				this.positionner()
			}
		},
		editer () {
			this.mode = 'edition'
			this.redimensionnement = false
			this.classement = []
			this.donnees.w = this.w
			this.donnees.h = this.h
			this.donnees.x = this.x
			this.donnees.y = this.y
			this.w = 46
			this.h = 45
			this.$nextTick(function () {
				document.querySelector('#' + this.id + ' textarea').focus()
			}.bind(this))
			this.positionner()
		},
		ajouterPoints (id) {
			this.classement.forEach(function (item) {
				if (item.id === id) {
					const score = item.score + parseInt(this.points)
					item.score = score
				}
			}.bind(this))
		},
		retirerPoints (id) {
			this.classement.forEach(function (item) {
				if (item.id === id) {
					const score = item.score - parseInt(this.points)
					item.score = score
				}
			}.bind(this))
		},
		modifierScore (id) {
			this.classement.forEach(function (item) {
				if (item.id === id) {
					const score = window.prompt(this.$t('modifierScore'), item.score)
					if (score !== null && isNaN(score) === false) {
						item.score = parseInt(score)
					}
				}
			}.bind(this))
		},
		classer () {
			this.classement.sort(function (a, b) {
				const scoreA = a.score
				const scoreB = b.score
				return scoreA < scoreB ? 1 : -1
			})
		},
		afficherRenommerPersonne (nom, id) {
			const div = document.createElement('div')
			div.id = 'conteneur-modale-panneau'
			div.className = 'conteneur-modale'
			div.innerHTML = '<div id="modale-panneau" class="modale" role="dialog"><div class="conteneur"><div class="contenu"><label>' + this.$t('nouveauNom') + '</label><input type="text" value="' + nom + '"><div class="actions"><span id="annuler" class="bouton" role="button" tabindex="0">' + this.$t('annuler') + '</span><span id="valider" class="bouton" role="button" tabindex="0">' + this.$t('valider') + '</span></div></div></div></div>'
			document.body.appendChild(div)
			this.personneId = id
			this.$nextTick(function () {
				document.querySelector('#annuler').addEventListener('click', function () {
					this.personneId = ''
					document.querySelector('#conteneur-modale-panneau').remove()
				}.bind(this))
				document.querySelector('#annuler').addEventListener('keydown', function (e) {
					if (e.key === 'Enter') {
						this.personneId = ''
						document.querySelector('#conteneur-modale-panneau').remove()
					}
				}.bind(this))
				document.querySelector('#valider').addEventListener('click', function () {
					this.renommerPersonne()
				}.bind(this))
				document.querySelector('#valider').addEventListener('keydown', function (e) {
					if (e.key === 'Enter') {
						this.renommerPersonne()
					}
				}.bind(this))
			}.bind(this))
		},
		renommerPersonne () {
			const nom = document.querySelector('#modale-panneau input').value
			if (nom !== null) {
				this.classement.forEach(function (item, index) {
					if (item.id === this.personneId) {
						this.texte = this.texte.replace(item.personne, nom)
						this.classement[index].personne = nom
					}
				}.bind(this))
				this.personneId = ''
				document.querySelector('#conteneur-modale-panneau').remove()
			}
		}
	}
}
</script>

<style>
.panneau .conteneur textarea.classement {
	height: 15rem;
	max-height: 15rem;
	margin-bottom: 2rem;
}

.panneau .conteneur div.classement {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.panneau .conteneur .personne {
    border: 1px solid #ddd;
    width: 28rem;
    padding: 1.5rem 1rem;
    margin: 1rem;
    font-size: 1.8rem;
}

.panneau .conteneur .personne .titre {
    padding-bottom: 1rem;
    border-bottom: 1px solid #ddd;
    margin-bottom: 1rem;
    font-weight: 700;
}

.panneau .conteneur .personne .score {
	display: flex;
	justify-content: space-between;
	align-items: center;
	cursor: pointer;
}

.panneau .conteneur .personne .moins,
.panneau .conteneur .personne .plus {
	display: inline-flex;
	justify-content: center;
	align-items: center;
	border: 1px solid #ddd;
	width: 4rem;
	height: 4rem;
	cursor: pointer;
	user-select: none;
}

.panneau .conteneur .personne .moins:hover,
.panneau .conteneur .personne .plus:hover,
.panneau .conteneur .personne .moins:active,
.panneau .conteneur .personne .plus:active {
	background-color: #ddd;
}
</style>
