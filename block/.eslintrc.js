module.exports = {
	settings: {
		'import/resolver': {
			webpack: {
				config: '.dev/config/webpack.config.js',
				'config-index': 1,
			},
		},
	},
	extends: [ 'plugin:@wordpress/eslint-plugin/recommended-with-formatting' ],
	env: {
		browser: true,
	},
	plugins: [ 'chai-friendly' ],
};
