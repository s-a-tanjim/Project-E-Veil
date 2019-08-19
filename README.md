<h2>Read Me</h2>
This is my Level 2 Term 2 Advanced Programming Language Project. Its a basic version of email service, where you can share message. AES method (Details below) is used to encrypt messages.

Features:
1. Sending and Receiving Emails
2. Sending emails anonymously
3. Encrypted emails
4. Responsive web design
5. Account delete permanently
6. Can change profile picture and other user information

Platform/Language used:
1. HTML + CSS + Js for website design
2. PHP for server connection
3. MySQL for Database

MySQL code to create the main database:

CREATE TABLE `user_info` ( `email` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , `pw` VARCHAR(255) NOT NULL , `p_number` VARCHAR(20) NOT NULL , `creation_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `pro_pic` VARCHAR(255) NULL DEFAULT NULL , `country` VARCHAR(255) NULL DEFAULT NULL , `city` VARCHAR(255) NULL DEFAULT NULL , `postal_code` VARCHAR(20) NULL DEFAULT NULL , `sent_mail_count` INT(10) NOT NULL DEFAULT '0' , `received_mail_count` INT(10) NOT NULL DEFAULT '0' , PRIMARY KEY (`email`)) ENGINE = InnoDB;

** Database name is: project_eveil


Advanced Encryption Standard (AES):

To encrypt & decrypt mysql data AES_ENCRYPT() and AES_DECRYPT() functions were used. These functions used the official AES (Advanced Encryption Standard) algorithm & encode data with a 128-bit key length. 128 bits is much faster and secure enough for most purposes. To store encrypted data VARBINARY (not VARCHAR) was used. 
Because AES_ENCRYPT() encrypts a string and returns a binary string. AES_DECRYPT() decrypts the encrypted string and returns the original string.

Functions:
AES_ENCRYPT(string_needs_to_be_encrypted, key_string);
AES_DECRYPT(encrypted_string,key_string);

The length of the VARBINARY is: 16 × (trunc(string_length / 16) + 1)

Reference: https://thinkdiff.net/mysql/encrypt-mysql-data-using-aes-techniques/

