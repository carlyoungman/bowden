import getUrlParameter from './vendor/getUrlParameter';
import icons from './components/icons';
import forms from './components/forms';
import sliders from './components/sliders';
import tweens from './components/tweens';
import navigation from './components/navigation';
import partners from './components/partners';
import maps from './components/maps';
import searchResults from './components/search_results';
import property from './components/property';
import gridBlock from './components/grid_block';
import imageGalleryWithContent from './components/image-gallery-with-content';

// Wait for document to load
document.addEventListener('DOMContentLoaded', () => {
	// Call each component's init function
	// getUrlParameter();
	icons.init();
	forms.init();
	sliders.init();
	tweens.init();
	navigation.init();
	partners.init();
	maps.init();
	searchResults.init();
	property.init();
	gridBlock.init();
	imageGalleryWithContent.init();
});
