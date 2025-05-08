<template>
	<JsPanel class="panneau" :visible="!chargement" :options="options">
		<div class="conteneur panneau-horloge">
			<div class="contenu">
				<div class="date">
					<span>{{ date }}</span>
				</div>
				<div class="temps">
					<span class="heures">{{ heure }}</span>
					<span class="separateur">:</span>
					<span class="minutes">{{ minute }}</span>
				</div>
				<div class="horloge">
					<div :id="'h_' + id" class="aiguille un"><i></i></div>
					<div :id="'m_' + id" class="aiguille deux"><i></i></div>
					<div :id="'s_' + id" class="aiguille trois"><i></i></div>
					<span style="--i: 1"><b>1</b></span>
					<span style="--i: 2"><b>2</b></span>
					<span style="--i: 3"><b>3</b></span>
					<span style="--i: 4"><b>4</b></span>
					<span style="--i: 5"><b>5</b></span>
					<span style="--i: 6"><b>6</b></span>
					<span style="--i: 7"><b>7</b></span>
					<span style="--i: 8"><b>8</b></span>
					<span style="--i: 9"><b>9</b></span>
					<span style="--i: 10"><b>10</b></span>
					<span style="--i: 11"><b>11</b></span>
					<span style="--i: 12"><b>12</b></span>
					<span class="trait large" style="transform: rotate(90deg); left: 100%; top: 50%;" />
					<span class="trait" style="transform: rotate(96deg); left: 99.7261%; top: 55.2264%;" />
					<span class="trait" style="transform: rotate(102deg); left: 98.9074%; top: 60.3956%;" />
					<span class="trait" style="transform: rotate(108deg); left: 97.5528%; top: 65.4508%;" />
					<span class="trait" style="transform: rotate(114deg); left: 95.6773%; top: 70.3368%;" />
					<span class="trait large" style="transform: rotate(120deg); left: 93.3013%; top: 75%;" />
					<span class="trait" style="transform: rotate(126deg); left: 90.4508%; top: 79.3893%;" />
					<span class="trait" style="transform: rotate(132deg); left: 87.1572%; top: 83.4565%;" />
					<span class="trait" style="transform: rotate(138deg); left: 83.4565%; top: 87.1572%;" />
					<span class="trait" style="transform: rotate(144deg); left: 79.3893%; top: 90.4508%;" />
					<span class="trait large" style="transform: rotate(150deg); left: 75%; top: 93.3013%;" />
					<span class="trait" style="transform: rotate(156deg); left: 70.3368%; top: 95.6773%;" />
					<span class="trait" style="transform: rotate(162deg); left: 65.4508%; top: 97.5528%;" />
					<span class="trait" style="transform: rotate(168deg); left: 60.3956%; top: 98.9074%;" />
					<span class="trait" style="transform: rotate(174deg); left: 55.2264%; top: 99.7261%;" />
					<span class="trait large" style="transform: rotate(180deg); left: 50%; top: 100%;" />
					<span class="trait" style="transform: rotate(186deg); left: 44.7736%; top: 99.7261%;" />
					<span class="trait" style="transform: rotate(192deg); left: 39.6044%; top: 98.9074%;" />
					<span class="trait" style="transform: rotate(198deg); left: 34.5492%; top: 97.5528%;" />
					<span class="trait" style="transform: rotate(204deg); left: 29.6632%; top: 95.6773%;" />
					<span class="trait large" style="transform: rotate(210deg); left: 25%; top: 93.3013%;" />
					<span class="trait" style="transform: rotate(216deg); left: 20.6107%; top: 90.4508%;" />
					<span class="trait" style="transform: rotate(222deg); left: 16.5435%; top: 87.1572%;" />
					<span class="trait" style="transform: rotate(228deg); left: 12.8428%; top: 83.4565%;" />
					<span class="trait" style="transform: rotate(234deg); left: 9.54915%; top: 79.3893%;" />
					<span class="trait large" style="transform: rotate(240deg); left: 6.69873%; top: 75%;" />
					<span class="trait" style="transform: rotate(246deg); left: 4.32273%; top: 70.3368%;" />
					<span class="trait" style="transform: rotate(252deg); left: 2.44717%; top: 65.4508%;" />
					<span class="trait" style="transform: rotate(258deg); left: 1.09262%; top: 60.3956%;" />
					<span class="trait" style="transform: rotate(264deg); left: 0.273905%; top: 55.2264%;" />
					<span class="trait large" style="transform: rotate(270deg); left: 0%; top: 50%;" />
					<span class="trait" style="transform: rotate(276deg); left: 0.273905%; top: 44.7736%;" />
					<span class="trait" style="transform: rotate(282deg); left: 1.09262%; top: 39.6044%;" />
					<span class="trait" style="transform: rotate(288deg); left: 2.44717%; top: 34.5492%;" />
					<span class="trait" style="transform: rotate(294deg); left: 4.32273%; top: 29.6632%;" />
					<span class="trait large" style="transform: rotate(300deg); left: 6.69873%; top: 25%;" />
					<span class="trait" style="transform: rotate(306deg); left: 9.54915%; top: 20.6107%;" />
					<span class="trait" style="transform: rotate(312deg); left: 12.8428%; top: 16.5435%;" />
					<span class="trait" style="transform: rotate(318deg); left: 16.5435%; top: 12.8428%;" />
					<span class="trait" style="transform: rotate(324deg); left: 20.6107%; top: 9.54915%;" />
					<span class="trait large" style="transform: rotate(330deg); left: 25%; top: 6.69873%;" />
					<span class="trait" style="transform: rotate(336deg); left: 29.6632%; top: 4.32273%;" />
					<span class="trait" style="transform: rotate(342deg); left: 34.5492%; top: 2.44717%;" />
					<span class="trait" style="transform: rotate(348deg); left: 39.6044%; top: 1.09262%;" />
					<span class="trait" style="transform: rotate(354deg); left: 44.7736%; top: 0.273905%;" />
					<span class="trait large" style="transform: rotate(360deg); left: 50%; top: 0%;" />
					<span class="trait" style="transform: rotate(366deg); left: 55.2264%; top: 0.273905%;" />
					<span class="trait" style="transform: rotate(372deg); left: 60.3956%; top: 1.09262%;" />
					<span class="trait" style="transform: rotate(378deg); left: 65.4508%; top: 2.44717%;" />
					<span class="trait" style="transform: rotate(384deg); left: 70.3368%; top: 4.32273%;" />
					<span class="trait large" style="transform: rotate(390deg); left: 75%; top: 6.69873%;" />
					<span class="trait" style="transform: rotate(396deg); left: 79.3893%; top: 9.54915%;" />
					<span class="trait" style="transform: rotate(402deg); left: 83.4565%; top: 12.8428%;" />
					<span class="trait" style="transform: rotate(408deg); left: 87.1572%; top: 16.5435%;" />
					<span class="trait" style="transform: rotate(414deg); left: 90.4508%; top: 20.6107%;" />
					<span class="trait large" style="transform: rotate(420deg); left: 93.3013%; top: 25%;" />
					<span class="trait" style="transform: rotate(426deg); left: 95.6773%; top: 29.6632%;" />
					<span class="trait" style="transform: rotate(432deg); left: 97.5528%; top: 34.5492%;" />
					<span class="trait" style="transform: rotate(438deg); left: 98.9074%; top: 39.6044%;" />
					<span class="trait" style="transform: rotate(444deg); left: 99.7261%; top: 44.7736%;" />
				</div>
			</div>
		</div>
	</JsPanel>
</template>

<script>
import dayjs from 'dayjs'
import 'dayjs/locale/de.js'
import 'dayjs/locale/es.js'
import 'dayjs/locale/fr.js'
import 'dayjs/locale/hr.js'
import 'dayjs/locale/it.js'
import 'dayjs/locale/nl.js'
import localizedFormat from 'dayjs/plugin/localizedFormat.js'
dayjs.extend(localizedFormat)
import JsPanel from '@/components/jspanel.vue'
import Panneau from '@/panneau'

export default {
	name: 'PHorloge',
	components: {
		JsPanel
	},
	props: {
		panneau: Object,
		pages: Array,
		nav: Boolean,
		export: Boolean,
		evenementClavier: Object,
		langue: String
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
			minw: 40,
			minh: 43.6,
			statut: '',
			dimensions: {},
			position: {},
			date: '',
			heure: '',
			minute: '',
			horloge: '',
			temps: ''
		}
	},
	watch: {
		export: function (valeur) {
			if (valeur === true) {
				this.position = { x: this.x, y: this.y }
				this.$emit('export', { id: this.id, titre: this.titre, statut: this.statut, dimensions: this.dimensions, position: this.position, contenu: '', w: this.w, h: this.h, x: this.x, y: this.y })
			}
		},
		langue: function (langue) {
			this.date = dayjs(new Date()).locale(langue).format('dddd LL')
		}
	},
	created () {
		this.definirCaracteristiques('horloge')
		this.genererOptions('horloge')
	},
	mounted () {
		this.initialiser()
		this.positionner()
		this.chargement = false
		this.date = dayjs(new Date()).locale(this.langue).format('dddd LL')
		this.$nextTick(function () {
			this.afficherHorloge()
			this.definirHeure()
			this.horloge = setInterval(this.afficherHorloge, 1000)
			this.temps = setInterval(this.definirHeure, 1000)
		}.bind(this))
	},
	methods: {
		definirHeure () {
			const maintenant = new Date()
			let heure = maintenant.getHours()
			let minute = maintenant.getMinutes()
			if (minute < 10) {
				minute = '0' + minute
			}
			this.heure = heure
			this.minute = minute
		},
		afficherHorloge () {
			const h = document.querySelector('#h_' + this.id)
			const m = document.querySelector('#m_' + this.id)
			const s = document.querySelector('#s_' + this.id)
			const date = new Date()
			const hh = date.getHours()
			const mm = date.getMinutes()
			const ss = date.getSeconds()
			const hRotation = 30 * hh + mm / 2
			const mRotation = 6 * mm
			const sRotation = 6 * ss
			h.style.transform = `rotate(${hRotation}deg)`
			m.style.transform = `rotate(${mRotation}deg)`
			s.style.transform = `rotate(${sRotation}deg)`
		}
	}
}
</script>

<style>
.panneau .panneau-horloge {
	width: 100%!important;
	height: 100%!important;
}

.panneau .panneau-horloge .date {
	display: flex;
	justify-content: center;
	text-align: center;
	font-size: 2.3rem;
	color: #001d1d;
	background: #00ced1;
    padding: 1.2rem 1rem 0 1rem;
	user-select: none;
}

.panneau .panneau-horloge .temps .heures,
.panneau .panneau-horloge .temps .minutes {
	display: inline-block;
}

.panneau .panneau-horloge .temps {
	display: flex;
	justify-content: center;
	text-align: center;
	font-family: 'Orbitron', sans-serif;
	font-size: 4rem;
	color: #001d1d;
	background: #00ced1;
	letter-spacing: 0.5rem;
	text-indent: 0.5rem;
	line-height: 1;
    padding: 1.2rem;
	user-select: none;
}

.panneau .panneau-horloge .temps span {
	display: inline-block;
	text-indent: 0.5rem;
}

.panneau .panneau-horloge .horloge {
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	width: 27rem;
	height: 27rem;
	margin: 1.5rem auto;
	border-radius: 50%;
	background-color: rgba(255, 255, 255, 0.7);
	border: 2px solid rgba(255, 255, 255, 0.85);
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
	overflow: hidden;
}

.panneau .panneau-horloge .horloge span {
	position: absolute;
	inset: 1.2rem;
	text-align: center;
	transform: rotate(calc(30deg * var(--i)));
}

.panneau .panneau-horloge .horloge span b {
	display: inline-block;
	font-size: 2rem;
	transform: rotate(calc(-30deg * var(--i)));
	user-select: none;
}

.panneau .panneau-horloge .horloge:before {
	content: '';
	position: absolute;
	width: 0.8rem;
	height: 0.8rem;
	border-radius: 50%;
	background-color: #001d1d;
	z-index: 2;
}

.panneau .panneau-horloge .horloge .aiguille {
	position: absolute;
	display: flex;
	justify-content: center;
	align-items: flex-end;
}

.panneau .panneau-horloge .horloge .aiguille i {
	position: absolute;
	border-radius: 0.8rem;
}

.panneau .panneau-horloge .horloge .aiguille.un i {
	width: 0.5rem;
	height: 7.5rem;
	background-color: #001d1d;
}

.panneau .panneau-horloge .horloge .aiguille.deux i {
	width: 0.5rem;
	height: 9rem;
	background-color: #001d1d;
}

.panneau .panneau-horloge .horloge .aiguille.trois i {
	width: 0.2rem;
	height: 10rem;
	background-color: #777;
}

.panneau .panneau-horloge .horloge .trait {
	position: absolute;
	width: 1px;
	height: 0.7rem;
	background-color: #777;
	transform-origin: 0% 0%;
	user-select: none;
}

.panneau .panneau-horloge .horloge .trait.large {
	width: 2px;
	height: 0.85rem;
	background-color: #001d1d;
}
</style>
