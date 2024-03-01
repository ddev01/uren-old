/** @type {import('tailwindcss').Config} */
import groupModifierPlugin from 'tailwindcss-group-modifier-plugin';

export default {
	darkMode: 'class',
	content: ['./resources/views/**/*.blade.php', './app/View/**/*.php', './app/Livewire/**/*.php', './resources/js/**/*.js', './resources/css/**/*.css', './vendor/usernotnull/tall-toasts/config/**/*.php', './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php', 'public/svgs/**/*.svg'],

	theme: {
		extend: {
			fontFamily: {
				geist: ['Geist', 'system-ui', 'sans-serif'],
			},
			boxShadow: {
				primary: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1)',
			},
			zIndex: {
				1: '1',
				'-1': '-1',
				2: '2',
				'-2': '-2',
				3: '3',
				'-3': '-3',
				4: '4',
				'-4': '-4',
				5: '5',
				'-5': '-5',
				6: '6',
				'-6': '-6',
				7: '7',
				'-7': '-7',
				8: '8',
				'-8': '-8',
				9: '9',
				'-9': '-9',
			},
			ransitionTimingFunction: {
				button: 'cubic-bezier(0.4, 0, 0.2, 1)',
			},
		},
	},

	plugins: [
		require('flowbite/plugin', { tooltips: false, charts: false }),
		groupModifierPlugin({ prefix: 'g' }),
		function ({ addUtilities }) {
			const newFlexItems = {
				'.flexc': {
					display: 'flex',
					alignItems: 'center',
					justifyContent: 'center',
				},
				'.flexb': {
					display: 'flex',
					alignItems: 'center',
					justifyContent: 'space-between',
				},
				'.flexx': {
					display: 'flex',
					justifyContent: 'center',
				},
				'.flexy': {
					display: 'flex',
					alignItems: 'center',
				},
				'.colc': {
					display: 'flex',
					flexDirection: 'column',
					alignItems: 'center',
					justifyContent: 'center',
				},
				'.colb': {
					display: 'flex',
					flexDirection: 'column',
					alignItems: 'center',
					justifyContent: 'space-between',
				},
				'.colx': {
					display: 'flex',
					flexDirection: 'column',
					alignItems: 'center',
				},
				'.coly': {
					display: 'flex',
					flexDirection: 'column',
					justifyContent: 'center',
				},
			};
			addUtilities(newFlexItems);
		},
		// function ({ addVariant, e }) {
		//     addVariant('placeholder-shown', ({ modifySelectors, separator }) => {
		//         modifySelectors(({ className }) => {
		//             return `.${e(`placeholder-shown${separator}${className}`)}:placeholder-shown`;
		//         });
		//     });
		// },
		// function ({ addVariant, e }) {
		//     addVariant('placeholder-hidden', ({ modifySelectors, separator }) => {
		//         modifySelectors(({ className }) => {
		//             return `.${e(`placeholder-hidden${separator}${className}`)}:not(:placeholder-shown)`;
		//         });
		//     });
		// },
	],
};
