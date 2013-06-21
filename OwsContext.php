<?php

use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\Mink\Exception\ElementException,
    Behat\Mink\Exception\ElementNotFoundException;

use Behat\Mink\Driver\DriverInterface;

/**
 * Features context.
 */
class OwsContext extends MinkContext
{

  /**
   * @When /^I hover "([^"]*)"$/
   */
  public function iHover($cssId)
  {
    $page = $this->getSession()->getPage();
    $element = $page->find('css', $cssId);
    if (null === $element) {
      throw new ElementNotFoundException($this->getSession(), 'element', 'css', $cssId);
    } 
    $element->mouseOver();
  }

  /**
   * @When /^I wait for the text "(?P<text>(?:[^"]|\\")*)"$/
   */
  public function iWaitForTheText($text) {
    $this->getSession()->wait(10000, $this->assertPageContainsText($text)); 
  }

  /**
   * @When /^I wait (?P<timing>\d+)sec$/
   */
  public function iWaitNSec($timing) {
    $this->getSession()->wait($timing*1000); 
  }

  /**
   * @When /^I wait (?P<timing>\d+)sec for the text "(?P<text>(?:[^"]|\\")*)"$/
   */
  public function iWaitNSecForTheText($timing, $text) {
    $this->getSession()->wait($timing, $this->assertPageContainsText($text)); 
  }

  /**
   * @When /^I click the element matching "(?P<selector>(?:[^"]|\\")*)"$/
   */
  public function iClickTheElementMatching($selector) {
    $session = $this->getSession();
    if (is_object($session->getPage()->find("css", $selector))) {
      $session->getPage()->find("css", $selector)->click();
    }
    else {
      throw new \RuntimeException('Element not found');
    }
  }

  /**
   * @When /^I switch to the iframe named "(?P<iframe>(?:[^"]|\\")*)"$/
   */
  public function iSwitchToTheIframeNamed($iframe) {
    $this->getSession()->switchToIFrame($iframe);
  }

  /**
   * @When /^I switch back from iframe$/
   */
  public function iSwitchBackFromIframe() {
    $this->getSession()->switchToIFrame(NULL);
  }

}
