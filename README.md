---
**README - English**

---

This Mink context provides the following steps definitions:

- **When I hover "css selector"**

  Provides a Mink action to hover elements matching a css selector. This is working with the @javascript.
Selenium webdriver only support javascript mouseovers so this won't work on css :hover rules.

* **When I wait (\d)sec**

  You can use this step to wait for elements to appear after AJAX calls, or to put breaks in a Behat scenario.

* **When I click the element matching "css selector"**

  This is a Mink method to click elements other than hyperlinks.

---

**Installation:** Place the context file bootstrap/context/OwsContext.php in your behat features/bootstrap directory and 
it will be automatically available as a subcontext.

**@see** FeatureContext.php for an exemple on how to use a behat subcontext.

---

**LISEZ-MOI - Français**

---

Ce projet contient une extension de context Mink afin de définir les steps suivants:

* **When I hover "css selector"**

  Ce step utilise une méthode Mink pour survoler des éléments à partir d'un sélecteur css. Nécessite @javascript.
Attention: le hover de Selenium WebDriver n'est compatible qu'avec le javascript, pas avec la règle css :hover.

* **When I wait (\d)sec**

  Ce step permet de marquer des pauses dans un Scenario javascript par exemple, en prenant le temps de voir une action,
mais surtout pour tester l'AJAX, vous pouvez utiliser par exemple "When I wait 3sec" pour attendre qu'un élément 
soit disponible.

* **When I click the element matching "css selector"**

  Une méthode Mink pour cliquer sur un élément autre qu'un lien hyperlink, à partir de n'importe quel sélecteur css.

---

**Installation:** Placez le fichier bootstrap/context/OwsContext.php dans votre dossier features/bootstrap, le context sera alors
automatiquement disponible en sous contexte.

**@see** FeatureContext.php pour un exemple de déclaration de sous contexte.

---