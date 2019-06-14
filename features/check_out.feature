Feature: Check out
  Zoho People automated check out

  @mink:selenium2
  Scenario: Checking out
    Given I go to "signin?servicename=zohopeople"
    And I should see "Sign In to access People"
    Then I log in to Zoho
    And wait for the page to be loaded
    And I wait for 5 seconds
    Then I should see "Check-out"
    Then I click on the element with css selector "div#ZPD_Top_Att_Stat"
    And I wait for 5 seconds
    Then I should see "Check-in"
