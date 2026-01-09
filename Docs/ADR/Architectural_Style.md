# {short title, representative of solved problem and found solution}

## Context and Problem Statement

Before beginning the planning process for my proof-of-concept, I need to choose what architectural style I am going to use to align my project with. This architectural style is an important decision to make as it will set out the structure of my application as well as having a major impact on the overall behaviour of my application; further affecting the performance, maintainability and security of my system.

## Considered Options

* {Monolith}
  * easily understandeable
  * easy to test & deploy
  * single database - greater consistency
  * ideal for small-medium apps

* {MicroServices}
  * split into seperate services providing business functionality
  * services are independent; more scalable
  * reliable - automation prevents human errors
  * not easy - building scalable/ fail safe microservices
  * often requires skilled engineers & organisational change

* {Serverless}
  * scales easily
  * easy to manage infrastructure if managed by cloud platform
  * vendor control - working with constraints enforced by service you're working with... might stop supporting version of framework required... not easy to switch vendor
  * development is different to normal. functions should be stateless.
  * costs - cloud platforms charge accordingly to memory use.

## Decision Outcome

Chosen option: "Monolith", This is due to how easy and versatile the architectural style is to use and adapt to. When making this decision it was important that I chose an architectural style that I would be able to learn and understand as quickly as possible and also avoid creating a complex situation for my system that I was yet to develop. The outcome of this was that the project went seamlessly; allowing me to easily complete appropriate designs and follow up with a proof-of-concept system which aligned with the Monolith architectural style.

### Consequences

Good

* Good, because the outcome of my assignment was successful. I found the workload manageable and the development process was quite straightforward. The Monolith architectural style provided an easy-to-follow blueprint meaning processes such as designing, architecting and testing were seamless. The Monolith architectural style made for a very appropriate and fitting style to follow along with, given that I was only to be creating a proof-of-concept instead of a full working system, and that I was a solo developer on this project. Overall, the Monolith approach was a sensible decision which led to the overall success of my system.

Bad

* The bad consequence of choosing the Monolith architectural style is that an alternative style such as MicroServices would likely be better for the real world scenario of building a full application which involves banking customers. This is because MicroServices is more scalable and requires a skilled team as opposed to an individual alone. Therefore, this may be a more appropriate choice for a commercial level application.
  
* However, the Monolith architecture can be scaled into microservices if need be. This is backed by Martin Fowler (Chief Scientist at Thoughtworks), stating that 'monolithic systems become too large to deal with, many enterprises are drawn to breaking them down into the microservices'[1].
  
* Moreover, this could additionally be another advantage of my original choice over choosing Monolith due to its (despite being known to be time consuming/ difficult) flexibility later in the development lifecycle.
* Adding to the flexibility, Harris, C. stated the 'Lack of flexibility' and saying how 'a monolith is constrained by the technologies already used in the monolith'[2]. This strengthens the popular knowledge on the difficulty of managing a Monolith project later on, eventhough it is possible to change, it can be very difficult to do so.

Reference:

[1] How to break a Monolith into Microservices. (2018). Martinfowler.com. https://martinfowler.com/articles/break-monolith-into-microservices.html

‌[2] Harris, C. (2024). Microservices vs. monolithic architecture. Atlassian. https://www.atlassian.com/microservices/microservices-architecture/microservices-vs-monolith

‌
