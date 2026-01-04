# {Chosen Technology stack}

## Deciding what technology stacks to use for proof-of-concept

{Describe the context and problem statement, e.g., in free form using two to three sentences or in the form of an illustrative story. You may want to articulate the problem in form of a question and add links to collaboration boards or issue management systems.}

For my proof-of-concept, I need to decide what technology stack and tools I am going to use. I need to consider my options and make a decision based on the most ideal approach in terms of the languages and tools I can use with those languages. This decision is important as it can either benefit (drastically improve user experience) or disadvantage my system (some languages are harder to use for implementing certain features).

## Considered Options

*1. {PHP - Standard Login with account authorisation (using email)  - using MailHog for verifying email | quite easy to implement, has good documentation}

*2. {Python | Django/ Twilio - Send OTP to use for login (2fa) | can be complicated to adjust to language for first time use & for website use.}

*3. {Laravel - Session tokens | can take long time to set up and understand. Lecturer (Martin Cooper) advised not to implement so soon to deadline as it could be a risk to submitting late.}

* … <!-- numbers of options can vary -->

## Decision Outcome

Chosen option: "{title of option 1}", because {justification. e.g., only option, which meets k.o. criterion decision driver | which resolves force {force} | … | comes out best (see below)}.


Chosen option: "Standard Login with account authorisation (using email)", because I am already most familiar with using PHP. Therefore, this would not take me long to implement into my system. Using an alternative, less familiar language would likely take me longer and delay my assignment submission. Moreover, this option is the best fit for me.


For the frontend of my application I am going to use HTML for the structure (content) as well as using CSS for styling.

For the backend of my application, I am choosing to use PHP to post and get data to and from my database. I am going to use the tool, Xampp/ MySQL as a service to connect to my database and display backend driven content on my website. Additionally, I am going to be using Xampp/ Apache to display my website in chrome.

For the authentication process, I am deciding to use a service called MailHog. This will allow me to send emails to a fake address, acting as the user and sending a link to verify the users' email (needed to register successfully).


<!-- This is an optional element. Feel free to remove. -->
### Consequences

* Good, because {positive consequence, e.g., improvement of one or more desired qualities, …}
* Simple, straighforward, user friendly
* can be used together with further security
* OTP can be implemented at a later time
* fits nicely with system
* improves security, safety, human authentication



* Bad, because {negative consequence, e.g., compromising one or more desired qualities, …}
* 
* … <!-- numbers of consequences can vary -->
