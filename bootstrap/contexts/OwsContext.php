<?php

use Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Exception\ElementException,
    Behat\Mink\Exception\ElementNotFoundException; 

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
   * @When /^I wait (?P<timing>\d+)sec$/
   */
  public function iWaitNSec($timing) {
    $this->getSession()->wait($timing*1000); 
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
   * @When /^I switch to the iframe "(?P<iframe>(?:[^"]|\\")*)"$/
   */
  public function iSwitchToTheIframe($iframe) {
    $this->getSession()->switchToIFrame($iframe);
  }

  /**
   * @When /^I switch back from iframe$/
   */
  public function iSwitchBackFromIframe() {
    $this->getSession()->switchToIFrame(NULL);
  }

}
