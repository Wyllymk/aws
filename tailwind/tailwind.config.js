// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
	darkMode: 'class',
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			boxShadow: {
				custom: '8px 0px 24px 0px rgba(76, 128, 178, 0.1)',
			},
			fontFamily: {
				sans: ['"Proxima Nova"', ...defaultTheme.fontFamily.sans],
				nico: ['Nico', 'sans-serif'],
				oswald: ['Oswald', 'sans-serif'],
				manrope: ['Manrope', 'sans-serif'],
				satisfy: ['Satisfy', 'sans-serif'],
			},
			colors: {
				'regal-blue': '#140F49',
				'nav-blue': '#605C8D',
				'header-blue': '#140F49',
				'white-blue': '#111c43',
				'prime-blue': '#536485',
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
