![Logo](https://camo.githubusercontent.com/4cf45904e67161611071520974b92a39ef49544ad2c03c027a4e07bf7f44d871/68747470733a2f2f692e696d6775722e636f6d2f784933474c46632e6a706567)


# MythicalWebPanel

The best free web hosting panel with multi-node support and a powerful API
MythicalWebPanel is currently in development by [@SnyderWillCode](https://github.com/SnyderWillCode) & [@NaysKutzu](https://github.com/nayskutzu).

### 🎨 Frontend
We are using vuexy as a frontend. You can change that!

### 👔 Contributing
I'm open to all contributions! Feel free to help! :) 

### 💸 Financial support
Do you want to support our hard work?

MythicalSystems
https://paypal.me/mythicalsystems


### 🎧 Support

You can join our support server:

https://discord.gg/7BZTmSK2D8

## DOCS
Here you will find the stuff that we will have to add in our docs:

### Create a new user:
Use the following command to create a new user.
```bash
sudo adduser mythicalsystems
```
### Add the user to the sudo group:
The sudo group allows users to run commands with administrative privileges.
```bash
sudo usermod -aG sudo mythicalsystems
```
### Edit the sudoers file:
The sudoers file is the configuration file for controlling sudo privileges. We'll use the `visudo` command to safely edit it:

### Allow passwordless sudo for the new user:
Inside the sudoers file, add the following line at the end of the file:
```bash
mythicalsystems ALL=(ALL) NOPASSWD: ALL
```