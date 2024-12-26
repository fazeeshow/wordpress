( function( api ) {

	// Extends our custom "astrocare" section.
	api.sectionConstructor['astrocare'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );