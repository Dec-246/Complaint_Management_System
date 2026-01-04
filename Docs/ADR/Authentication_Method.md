# {Chosen Technology stack}

## Deciding what authentication method to use for proof-of-concept

For my proof-of-concept, I need to decide what technology stack and tools I am going to use for my authentication. My decision will be based on the most ideal languages and tools for the feature/s I am wanting to implement. This decision is important as it can either benefit (drastically improve user experience & security performance) or disadvantage my system (some languages are harder to use for implementing certain features- may delay project).

## Considered Options

*1. {PHP - Standard Login with account authorisation (using email)  - using MailHog for verifying email | quite easy to implement, has good documentation}

*2. {Python | Django/ Twilio - Send OTP to use for login (2fa) | can be complicated to adjust to language for first time use & for website use.}

*3. {Laravel - Session tokens | can take long time to set up and understand. Lecturer (Martin Cooper) advised not to implement so soon to deadline as it could be a risk to submitting late.}

## Decision Outcome

Chosen option: "Standard Login with account authorisation (using email)", because I am already most familiar with using PHP. Therefore, this would not take me long to implement into my system. Using an alternative, less familiar language would likely take me longer and delay my assignment submission. Moreover, this option is the best fit for me.

For the authentication process, I am deciding to use a service called MailHog. This will allow me to send emails to a fake address, acting as the user and sending a link to verify the users' email (needed to register successfully).

### Consequences

* The overall outcome of my decision was a success. I managed to implement a secure and user-friendly register/ login system which sent an email to the user and only allowing them to log into their account if they had accessed the link. This allowed me to reach my expectations of creating a form of 2fa and further meaning I had an extra level of security.

* With my chosen decision, it means I am able to implement other features (such as OTP via text messages) in the future. This is an advantage due to it being extensible in the future.

* By choosing the first option, it means that I can decrease the intervening of bots into my system. This is because I require a user to manually check their emails and click a link, then enter their credentials again to login with those they have just used to register with.
