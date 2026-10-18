# Complaint Management System Application start

This Project involved creating a system that managed complaints on behalf of different Mobile/ Banking companies. I created different logins for both staff and customer user roles as well as purposely not adding a signup for staff accounts. The customers however could choose their company during their signup process and their account will then be connected to that tenant in the system. Once customers make a complaint, the system automatically assigned this complaint to a staff member that worked on behalf of that tenant and under the same department as the complaint. 

## Learning Outcomes:

- Learnt intricacies of assigning tasks to certain users (staff) based on conditions such as their company and department. 
- Gained experience using local email testing tools.
- Integrating activation email to activate the customers account as a form of 2fa.

## Setup

### Xampp

- xampp-control.exe
- start Apache & MySQL

### Mail system

- [need to change ' smtp_port=25 ' to 1025 (from 25) in xampp/php/php.ini]
- open "C:\MailHog\MailHog.exe"
- paste http://localhost:8025/# in URL

### Website

- http://localhost/ComplaintManagementSystem/login.php

## Preview

### Staff
Dashboard
<img width="1360" height="1252" alt="staff dashboard" src="https://github.com/user-attachments/assets/5fa97ff9-d230-4d21-add6-e85cc9b71b7c" />

Profile
<img width="1356" height="1054" alt="staff profile" src="https://github.com/user-attachments/assets/d5553ea5-2458-4a54-89c5-4c242424caac" />

Assigned complaints
<img width="1322" height="1452" alt="staff assigned_complaints" src="https://github.com/user-attachments/assets/6652052f-812c-4819-aa56-4ec6e3ae8428" />

### Customer

Register as customer
<img width="648" height="912" alt="customer register_screen" src="https://github.com/user-attachments/assets/654bfb0a-0d38-4128-8eda-5e2215cf0232" />

Customer register- selecting tenant options
<img width="636" height="1150" alt="customer register_screen_tenant_options" src="https://github.com/user-attachments/assets/88c0368e-a8a1-443b-a285-918417bd89c5" />

Dashboard
<img width="1316" height="1456" alt="customer dashboard" src="https://github.com/user-attachments/assets/0e675f7a-c1f8-4298-9292-f70a2b26c57d" />

Profile
<img width="1352" height="1206" alt="customer profile" src="https://github.com/user-attachments/assets/b842b2ab-67cc-47dc-91c7-baa441a4ec2d" />

Log complaint
<img width="1350" height="1438" alt="customer log_complaint" src="https://github.com/user-attachments/assets/7608c84c-763d-4012-9df3-307f719b6242" />

Log complaint type options
<img width="1348" height="1444" alt="customer log_complaint options" src="https://github.com/user-attachments/assets/b61c6a83-a2cf-4d49-9039-fdf39b7ef754" />

Complaint history<img width="1328" height="1442" alt="customer past_complaints" src="https://github.com/user-attachments/assets/d6dbf051-fd1f-44e4-a71d-c207fbff4de0" />

Future chatbot screen
<img width="1356" height="1348" alt="customer chatbot_screen" src="https://github.com/user-attachments/assets/767b8684-57fd-414e-a654-583fe61a9226" />


