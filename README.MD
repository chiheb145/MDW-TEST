
# Maisonduweb - Technical Test - Take-Home Assignment  
  
Hi there!  
Looks like you already nailed the first part of this challenge - finding this repo. This repo contains everything you need to take our take-home assignment.  
  
Most of our projects are focused on building high performance and scalable Multi Level Marketing (MLM) web / mobile applications.  
[1st Link:  [https://www.investopedia.com/terms/m/multi-level-marketing.asp](https://www.investopedia.com/terms/m/multi-level-marketing.asp)]  
[2nd link:  [https://en.wikipedia.org/wiki/Multi-level_marketing](https://en.wikipedia.org/wiki/Multi-level_marketing)]  
  
To help you get started, we have setup a fresh Laravel project and provided a data input (database.sql) for you to use in this test. You can then extend upon this application as you see fit to build features.  
  
## The project  
  
Below, we have defined what is required of your project, since we believe this will serve as a good basis for you to show your problem solving skills and describe your reasoning and decisions.  
Video: [https://watch.screencastify.com/v/fzq4elFGgYSAuqF7wL33](https://watch.screencastify.com/v/fzq4elFGgYSAuqF7wL33)  
  
### Instructions  
Setup a fresh Laravel install using the latest version (v9.x)
Setup the dev env using Docker (preferably) 
Create an empty database
Import database using the sql file provided  
Code
Push your solution to a separate branch (feature branch), feel free to use gitflow.  
Share a link with us once you finish  

We would like to have a README file on how to run the project locally and you can include in this file any notes or information you believe will help us evaluate your assignment correctly (why choose this solution over the other one, technical limitations, nice to have features or improvements etc...).  

### Database Schema
We provided you with a database containing list of advisors, orders and other table containing the config you need to determine certain rules (like when to upgrade advisors level) (Check screenshot of the database tables)
#### List of tables
<ul>
<li>advisors: list of advisors</li>
<li>advisors_tree: list of advisors and their direct and indirect children (direct = 1 meaning the child is direct)</li>
<li>config_rank_levellings: contains the minimum amount that will allow the user to upgrade to the next rank </li>
<li>config_referral_bonuses: contains the information necessary to calculate referral bonuses (when you referral new advisor and he/she join the network/</li>
<li>config_team_bonuses: contains the information necessary to calculate team bonuses</li>
<li>orders: list of orders</li>
<li>personal_scores: store advisors personal scores here</li>
<li>rank_revisions: store rank revisions here. Every time the user rank changes (when he reach specific goal, we want to store the info in this table. (passage de grade)</li>
<li>referral_bonuses: store advisors referral bonuses here (prime parrainage)</li>
<li>team_bonuses: store advisors team bonuses here (prime d'animation)</li>
<li>team_scores: store advisors team bonuses here (chiffre equipe)</li>
</ul>

  
# Task: Calculate Remuneration Scores, Bonuses and Upgrade Advisors Ranks  
  
1. Calculate personal and team scores  
2. Calculate referral bonuses | Video: [https://watch.screencastify.com/v/g38CE8zhxtcFw01Yh1Ll](https://watch.screencastify.com/v/g38CE8zhxtcFw01Yh1Ll)  
3. Calculate team bonuses | Video: [https://watch.screencastify.com/v/c1TT6weFquezKipXD45l](https://watch.screencastify.com/v/c1TT6weFquezKipXD45l)  
4. Upgrade advisors ranks | Video: [https://watch.screencastify.com/v/wA7ITjAdSIr3VPFY6imh](https://watch.screencastify.com/v/wA7ITjAdSIr3VPFY6imh)  
5. Build a dashboard to visualize the results you calculated (1,2,3,4).
  
The parent_id represent the user id who referred current user to join the network (one user can refer unlimited new users and has unlimited direct children)  
Each user can order multiple product (similar to a traditional ecommerce website, each order can have one or multiple products)  
We want to calculate and store the team's total sales number for the current month (it's the number of product sold by you and all your children (direct and non direct))  
Once we calculate each team score, we want to display (each member will have a page were we display his team's score and his personal score) 
  
## FAQ  
How will I be evaluated?  
You bring in your solution and get to walk it through with us. We use this as a starting point to have discussion. We want to understand your reasoning and depth of knowledge. As a rule the discussion is more important than the actual code. Also no one is an expert at everything so this also helps us understand your strengths as well as areas of improvement across the stack.  
  
Some of the things we will look at in the evaluation:  
  
- Code quality - How you reason about making sure code is readable and maintainable.  
- Testing - How you reason about what to test and how to test it.  
- Performance - How you can identify performance bottlenecks and reason around solving them.  
- System design - How you reason about concepts like reusability, separation of concerns and various abstractions.  
- Dev Env setup, Infrastructure and operations - How to setup a dev env? How you would run the web platform and what's important to think about.  
  
In this we also try to understand how you solve problems generally and how you communicate your solutions. Problem solving and communication are both things we value highly.  
  
## Why did you pick this stack?  
This is the stack that the majority of our platform is written in. We want to recruit new senior developers that can use the full potential of Laravel.  
  
## Can I use additional libraries/frameworks?  
You're free to use whatever you want. The important thing is that you can explain why you made the decision. We would recommend sticking to the basic stack however (Laravel for backend and feel free to use blade or any frontend framework if you want to).  
Again, using a frontend framework is not required. We respect that everyone has different amounts of time to put on something like this and we evaluate accordingly.

## What happen if I get stuck?
We provided you with multiple videos explaining the core concept of the technical test. If you can't find the information you are looking for or have any questions regarding this assignment, feel free to contact us via email: contact@maisonduweb.com