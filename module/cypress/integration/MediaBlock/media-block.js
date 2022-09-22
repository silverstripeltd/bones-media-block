const MediaBlock = require('../../page_objects/MediaBlock');

And("I should see the media block on the page", () => {
  cy.get(MediaBlock.media_block).eq(1).should('be.visible');
});

And("I should see the media block with image on the page", () => {
  cy.get(MediaBlock.media_block_image).eq(1).should('be.visible');
});

And("I should see the media block with video on the page", () => {
  cy.get(MediaBlock.media_block_video).eq(1).should('be.visible');
});