<?php

use Behat\MinkExtension\Context\MinkContext;

/**
 * Features context.
 */
class FeatureContext extends MinkContext {
    /**
     * Click on the element with the provided CSS Selector
     *
     * @When /^I click on the element with css selector "([^"]*)"$/
     */
    public function iClickOnTheElementWithCSSSelector($cssSelector) {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('css', $cssSelector) // just changed xpath to css
        );
        if (null === $element) {
            throw new InvalidArgumentException(sprintf('Could not evaluate CSS Selector: "%s"', $cssSelector));
        }

        $element->click();
    }

    /**
     * @When /^wait for the page to be loaded$/
     */
    public function waitForThePageToBeLoaded() {
        $this->getSession()->wait(10000, "document.readyState === 'complete'");
    }

    /**
     * @When /^I wait for (\d+) seconds$/
     */
    public function iWaitForSeconds($seconds) {
        $this->getSession()->wait($seconds * 1000);
    }

    /**
     * @When /^I log in to Zoho$/
     */
    public function iLogInToZoho() {
        $credentials = require __DIR__ . '/../../credentials.php';

        // Then I fill in "lid" with "my@email.com"
        $this->fillField('lid', $credentials['zoho_user']);

        // And I fill in "pwd" with "myPassword"
        $this->fillField('pwd', $credentials['zoho_password']);

        // Then I click on the element with css selector "div#signin_submit"
        $this->iClickOnTheElementWithCSSSelector('div#signin_submit');
    }
}
