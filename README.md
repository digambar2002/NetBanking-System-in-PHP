
# Net Banking Project in PHP

In this project i have develop real world net-banking project. This project is a best simulator for banking learners

## Features

- Secure login and signup system with md5 encryption
- OTP verification 
- Admin & user panel
- Withdraw and deposit section
- Money transfer system
- KYC verification
- Email alerts after every transaction
- Saving page
- Request debit card 

## Demo

View live demo of project 👇

https://skybnk.000webhostapp.com  
            
            OR 
Watch video on YouTube 👇   
https://youtu.be/9OP36wzL4tE
## Screenshots
1] Landing Page

![App Screenshot](https://raw.githubusercontent.com/DigambarBC/image-hosting/main/landing%20page.png)

2] Login Page

![App Screenshot](https://raw.githubusercontent.com/DigambarBC/image-hosting/main/login_dash.png)

3] User Dashboard

![App Screenshot](https://raw.githubusercontent.com/DigambarBC/image-hosting/main/php_bank_userdash.png)

## Installation

Install project with git

```bash
  git clone https://github.com/DigambarBC/NetBanking-System-in-PHP.git
  cd NetBanking-System-in-PHP
```
## Steps to run Project 

1. Copy SkyBank Project Folder And Paste in htdocs folder (htdocs found in xampp Setup)  
2. Open SkyBank Folder With VScode or other editor   
3. Create app password in google (follow the video tutorial -> how to make app password [video link -> https://youtu.be/J4CtP1MBtOE] )  
4. Now Edit Some Files given Below ():  

    (Note: You Have to just fill the Username with your email, and password with your app key(password))

    1]. Open the files given Below
    2]. insert your username and password in all mail files  

    admin > mail > congraMail.php  
    admin > mail > mail_config.php  
    admin > mail > TransactionMail.php  

5. Edit Parent mail folder Files  

    (Note: do same changes perform in step: 4 )  

    mail > congraMail.php  
    mail > contactMail.php  
    mail > mail_config.php  
    mail > otpForgot.php  
    mail > TransactionMail.php  

6. Edit user mail folder  

    (Note: do same changes perform in step: 4 )  
    user > mail > TransactionMail.php  
    

7. Setup Database  

    1] Run xampp.exe  
    2] Start Apache then start mysql  
    3] click on Admin botton in front of mysql OR  type this url in browser (http://localhost/phpmyadmin/)  
    4] Create New Database With The Same Name of (skybank)  
    5] click on import tab  
    6] click on Choose File Button and Select Database file from Project Folder Location : SkyBank > database > skybank.sql  
    7] click on go Button  
    8] refer this tutorial (https://youtu.be/7WUw9J3Xs8Q)  


8. now start project with this link (http://localhost/SkyBank/)  
9. Create Account  
10. To Make Admin Account follow the step given Below  

    1] Create Normal User Account  
    2] Go to mysql Database   
    3] Open login tabel  
    4] repalce value in the status coloumn with "Super" and in State = 1   

    Note: One Example is given in the database check it  

11. Admin Credentail :  
    Username = Admin123  
    password = I@mindi@n1234  

12. User Credentail :  
    Username = (Check Username In Database)  
    password = I@mindi@n1234   
  
  🎉 Now Enjoy Extention 😉  

