const plugin = require( 'tailwindcss/plugin' );
const colors = require( 'tailwindcss/colors' );
const defaultTheme = require( 'tailwindcss/defaultTheme' );

module.exports = {
	purge: {
		//enabled: true,
		layers: [ 'utilities' ],
		content: [
			'./**/*.php',
			'./*.php',
			'./src/components/*.js',
			'./src/scss/**/*.scss',
		],
		options: {
			safelist: {
				deep: [
					/^p-/,
					/^py-/,
					/^px-/,
					/^pt-/,
					/^pb-/,
					/^pl-/,
					/^pr-/,
					/^md:p-/,
					/^md:py-/,
					/^md:px-/,
					/^md:pt-/,
					/^md:pb-/,
					/^md:pl-/,
					/^md:pr-/,
					/^m-/,
					/^my-/,
					/^mx-/,
					/^mt-/,
					/^mb-/,
					/^ml-/,
					/^mr-/,
					/^w-/,
					/^h-/,
					/text-center/,
					/^list-/,
					/^backdrop-/,
				],
			},
		},
	},
	corePlugins: {
		boxDecorationBreak: false,
		// overscrollBehavior: false,
		brightness: false,
		contrast: false,
		hueRotate: false,
		invert: false,
		saturate: false,
	},
	// darkMode: 'class',
	theme: {
		colors: {
			black: '#000000',
			'gray-dark': '#6F6F6F',
			'gray-medium': '#AAAAAA',
			gray: '#707070',
			'gray-light': '#F0F0F0',
			white: colors.white,

			//brand colors
			primary: '#E5AC40',

			tan: '#F8F5EB',
			'tan-light': '#FAF9F5',

			brown: '#695D58',
			'brown-dark': '#49473E',

			error: '#eb5757',
			warning: '#f2994a',
			success: '#27ae60',
			info: '#359dd9',

			transparent: 'transparent',
			current: 'currentColor',
		},
		fontFamily: {
			sans: [ 'basis-grotesque', ...defaultTheme.fontFamily.sans ],
			'sans-alt': [ 'Louize', ...defaultTheme.fontFamily.sans ],
			serif: [ 'RecklessNeue', ...defaultTheme.fontFamily.serif ],
		},
		fontSize: {
			'root-em': '16px',
			base: '1rem',
			11: '0.7rem',
			12: '0.8rem',
			13: '0.8125rem',
			14: '0.875rem',
			16: '1rem',
			18: '1.125rem',
			20: '1.25rem',
			24: '1.5rem',
			28: '1.75rem',
			30: '1.875rem',
			32: '2rem',
			36: '2.25rem',
			40: '2.5rem',
			60: '3.75rem',
			80: '5rem',
			100: '6.25rem',
		},
		spacing: {
			px: '1px',

			0: '0',
			1: '0.0625rem',
			2: '0.125rem',
			3: '0.1875rem',
			4: '0.25rem',
			5: '0.3125rem',
			6: '0.375rem',
			8: '0.5rem',
			10: '0.625rem',
			12: '0.75rem',
			16: '1rem',
			18: '1.15rem',
			20: '1.25rem',
			24: '1.5rem',
			26: '1.625rem',
			28: '1.75rem',
			30: '1.875rem',
			32: '2rem',
			36: '2.25rem',
			40: '2.5rem',
			48: '3rem',
			50: '3.125rem',
			56: '3.5rem',
			60: '3.75rem',
			64: '4rem',
			68: '4.25rem',
			72: '4.5rem',
			75: '75px',
			76: '4.75rem',
			80: '5rem',
			90: '5.625rem',
			100: '6.25rem',
			120: '7.5rem',
			130: '8.125rem',
			140: '8.75rem',
			150: '9.375rem',
			160: '10rem',
			192: '12rem',
			200: '12.5rem',
		},
		boxShadow: {
			default:
				'0 0.0625rem 0.1875rem 0 rgba(0, 0, 0, 0.1), 0 0.0625rem 0.125rem 0 rgba(0, 0, 0, 0.06)',

			inner: 'inset 0 0.125rem 0.25rem 0 rgba(0, 0, 0, 0.06)',
			outline: '0 0 0 0.1875rem rgba(66, 153, 225, 0.5)',
			focus: '0 0 0 0.1875rem rgba(66, 153, 225, 0.5)',
			none: 'none',
		},
		screens: {
			phone: '300px',
			'tablet-portrait': '600px',
			'wp-admin-bar': '783px',
			'tablet-landscape': '900px',
			'desktop-min': { min: '1200px' },
			desktop: '1200px',
			'desktop-large': '1600px',

			sm: '600px',
			md: '768px',
			lg: '1024px',
			xl: '1600px',
		},
		container: {
			center: true,
			screens: {
				xs: '100%',
				sm: '100%',
				desktop: '100%',
				'desktop-large': '100%',
			},
		},
		extend: {
			lineHeight: {
				11: '0.7rem',
				12: '0.8rem',
				13: '0.8125rem',
				14: '0.875rem',
				16: '1rem',
				18: '1.125rem',
				20: '1.25rem',
				24: '1.5rem',
				28: '1.75rem',
				30: '1.875rem',
				32: '2rem',
				36: '2.25rem',
				40: '2.5rem',
				60: '3.75rem',
				100: '6.25rem',
			},
			backgroundOpacity: {
				10: '0.1',
			},
			transitionTimingFunction: {
				'timing-header': 'cubic-bezier(.78,.13,.15,.86)',
				'timing-soft': 'cubic-bezier(0.49, 0.02, 0.58, 1)',
			},
		},
	},
	future: {
		removeDeprecatedGapUtilities: true,
		purgeLayersByDefault: true,
		defaultLineHeights: true,
		standardFontWeights: true,
	},
	variants: {},
	plugins: [
		// require( '@tailwindcss/aspect-ratio' ),
		plugin( function ( { addBase, config } ) {
			addBase( {
				html: {
					fontSize: config( 'theme.fontSize.root-em' ),
				},
				body: {
					fontSize: config( 'theme.fontSize.base' ),
					fontWeight: '400',
					lineHeight: '1.5',
				},
				'h1,.h1,h2,.h2': {
					fontWeight: '500',
				},
				'h1,.h1,.has-h-1-font-size': {
					fontSize: config( 'theme.fontSize.40' ),
				},
				'h2,.h2,.has-h-2-font-size': {
					fontSize: config( 'theme.fontSize.30' ),
				},
				'h3,.h3,.has-h-3-font-size': {
					fontSize: config( 'theme.fontSize.30' ),
				},
				'h4,.h4,.has-h-4-font-size': {
					fontSize: config( 'theme.fontSize.heading-sm' ),
				},
				'h5,.h5,.has-h-5-font-size': {
					fontSize: config( 'theme.fontSize.heading-xs' ),
				},
				'h6,.h6,.has-h-6-font-size': {
					fontSize: config( 'theme.fontSize.heading-xs' ),
				},
				'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6': {
					marginBottom: config( 'theme.spacing.16' ),
				},
				// a: {
				// 	//textDecoration: 'underline',
				// },
				p: {
					marginBottom: config( 'theme.spacing.16' ),
					'&:last-child': {
						marginBottom: '0',
					},
				},
				'button,.btn': {
					fontSize: config( 'theme.fontSize.sm' ),
				},
			} );
		} ),
		plugin( function ( { addComponents, config } ) {
			const screenReaderText = {
				'.screen-reader-text': {
					clip: 'rect(1px, 1px, 1px, 1px)',
					height: '1px',
					overflow: 'hidden',
					position: 'absolute',
					whiteSpace: 'nowrap',
					width: '1px',
					'&:hover,&:active,&:focus': {
						backgroundColor: config( 'theme.colors.black' ),
						clip: 'auto',
						color: config( 'theme.colors.white' ),
						display: 'block',
						fontSize: config( 'theme.fontSize.base' ),
						fontWeight: config( 'theme.fontWeight.medium' ),
						height: 'auto',
						left: '5px',
						lineHeight: 'normal',
						padding: config( 'theme.spacing.8' ),
						textDecoration: 'none',
						top: '5px',
						width: 'auto',
						zIndex: '100000',
					},
				},
			};

			addComponents( screenReaderText, {
				variants: [ 'hover', 'active', 'focus' ],
			} );
		} ),
	],
};
