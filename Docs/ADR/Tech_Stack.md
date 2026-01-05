# {Chosen Technology stack}

## Deciding what technology stack to use for proof-of-concept

{Describe the context and problem statement, e.g., in free form using two to three sentences or in the form of an illustrative story. You may want to articulate the problem in form of a question and add links to collaboration boards or issue management systems.}

For my proof-of-concept application, I need to identify what technology stack and tools I am going to use to create the system. The chosen tech stack needs to be ideally familiar and fairly easy to use, yet widely extensible so that appropriate features can be implemented in the future.



## Considered Options

*1. {HTML/ CSS (frontend), PHP (backend), MySQL (database), Server (Apache), }

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
