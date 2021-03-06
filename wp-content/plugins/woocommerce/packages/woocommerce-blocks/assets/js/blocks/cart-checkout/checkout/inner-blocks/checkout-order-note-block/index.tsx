/**
 * External dependencies
 */
import { Icon, notes } from '@woocommerce/icons';
import { registerFeaturePluginBlockType } from '@woocommerce/block-settings';

/**
 * Internal dependencies
 */
import { Edit, Save } from './edit';
import metadata from './block.json';

registerFeaturePluginBlockType( metadata, {
	icon: {
		src: <Icon srcElement={ notes } />,
		foreground: '#7f54b3',
	},
	edit: Edit,
	save: Save,
} );
