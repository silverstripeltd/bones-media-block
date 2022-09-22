Feature: Footer

  Background:
    Given I load the home page

  @desktop
  Scenario: I can see media block in desktop
    Given I am on desktop
    Then I click on a link with label "About us"
    And I should see a page with main title "About us"
    And I should see the media block on the page
    And I should see the media block with image on the page
    And I should see the media block with video on the page

  @mobile
  Scenario: I can see media block in in mobile
    Given I am on mobile
    Then  I click on a link with label "About us"
    And I should see a page with main title "About us"
    And I should see the media block on the page
    And I should see the media block with image on the page
    And I should see the media block with video on the page
