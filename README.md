# devtest
My solution for this test
1. Create HTML form with fields:
Estimated value of the car (100 - 100 000 EUR)
Tax percentage (0 - 100%)
Number of instalments (count of payments in which client wants to pay for the policy (1 – 12))
Calculate button
2. Build calculator logic in PHP using OOP:
Base price of policy is 11% from entered car value, except every Friday 15-20 o’clock (user time) when it is 13%
Commission is added to base price (17%)
Tax is added to base price (user entered)
Calculate different payments separately (if number of payments are larger than 1)
Installment sums must match total policy sum- pay attention to cases where sum does not divide equally
Output is rounded to two decimal places
3. Final output (price matrix):
Base price
Price with commission and tax (every instalment separately)
Tax amount (separately with every instalment)
Grand totals (sum of all instalments): Price with commission and tax, total tax sum.
Example with 2 instalments:
