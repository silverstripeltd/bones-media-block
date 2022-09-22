import { Given, Then } from 'cypress-cucumber-preprocessor/steps';

Given('I load the home page', () => {
  cy.visit('/');
});

Given('I am on mobile', () => {
  cy.viewport('iphone-6');
});

Given('I am on desktop', () => {
  cy.viewport('macbook-13');
});

Then('the title should be {string}', (title) => {
  cy.title().should('eq', title);
});

When('I click on a link with label {string}', (label) => {
  cy.get('a').contains(`${label}`).click({force : true});
});

Then("I should see a page with main title {string}", (pageTitle) => {
  cy.get('h1').contains(`${pageTitle}`);
});
