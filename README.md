[![codecov](https://cdn.prod.website-files.com/5e0f1144930a8bc8aace526c/65dd9eb5aaca434fac4f1c31_Coverage-83%2525-yellow.svg)]()

![E-Inscription](https://media-hosting.imagekit.io//22a2b80c8c8e47cf/image%20(2).png?Expires=1836916609&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=dIooaW6GajeSfJA437fSLZMbvGONJqK1qRT5Bs1JUHHI5tgxzFsrNAr6xBm7tlMzDBWzLXskSmtYBwCEnHAuqQeyAy4pmU9eUvZe7xqFHM81H~Gw-jjXmpADOB2uFWmSgSE4upqZ5TBsY8dkA2C0l5Kc9a7J0coQUUzltsEG7EklgNz2uR8d0l0XNzWdol4mMiDFzTTry9QwOEeAs0OziYwYVP3e~lzBS1XlF0oy~y7DK0JJnUJKj-pAm6mKvm4BoOoue2iLkJc~l9gwHLHkWIWKREDTLjnaYUXfkqvRNnURxs9-NmUl8t6X5eqqDFBKTd7kT59A2LOX5nAo3PLFlw__)

---

## 📌 Les prérequis

Pour l’installation des applications ainsi que de la base de données, il est nécessaire d’avoir ces éléments.  
Merci de **lire la documentation** avant d’installer les composants.

- **Debian12**
- **Symfony CLI**
- **PHP** (Dernière version)
- **MariaDB** (Dernière version)
- **DSRF** : [Lien vers la release](https://github.com/GouvernementFR/dsfr/releases/tag/v1.13.0)
- **Node.js**

---

## ⚙️ Installation des composants

### Mise à jour des paquets  
```bash
sudo apt update && sudo apt upgrade -y

```
<h2> 🗄 Installation Mariadb</h2>

`Installez MariaDB :` 
```bash
sudo apt install mariadb-server -y
```

<h4>Vérifiez l'état de MariaDB :</h4>

```bash
sudo systemctl status mariadb
```

<h4>Démarrez et activez MariaDB au démarrage : </h4>

  ```bash
sudo systemctl start mariadb 
  ```
```bash

sudo systemctl enable mariadb   
  ```
<h4> Sécurisez l'installation de MariaDB : </h4>

  ```bash
sudo mysql_secure_installation 
  ```

<h5>Définissez un mot de passe pour l'utilisateur root.</h5> 

<h5> Désactivez les connexions root distantes. </h5>

<h5> Configurez l'adresse de liaison (bind address) : </h5>

```bash
sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf
  ```
`Modifiez ou ajoutez la ligne suivante :
```bash
 bind_address = 0.0.0.0 
  ```

<h5>Redémarrez MariaDB : </h5>
  
  ```bash
sudo systemctl restart mariadb 
  ```

 <h5>`Créez un utilisateur et accordez des privilèges : Connectez-vous à MariaDB :` </h5> 

```bash
`sudo mysql -u root -p 
  ```

 <h5>`Créez un utilisateur : </h5> 

```bash
CREATE USER 'nouvel_utilisateur'@'%' IDENTIFIED BY 'mot_de_passe'; 
  ```

 <h5>`Accordez tous les privilèges :` </h5>
 
 ```bash
GRANT ALL PRIVILEGES ON *.* TO 'nouvel_utilisateur'@'%' WITH GRANT OPTION; 
 ``` 

 <h5>`Quittez MariaDB : </h5>

```bash
EXIT;
```
### Installation PHP et APACHE2

<h5>Installation de apache2 , php , composer uwf</h5>

```bash
sudo apt update 
sudo apt install apache2 
sudo apt install php libapache2-mod-php php-mysql php-xml php-curl php-zip php-mbstring  
sudo apt install composer
sudo apt install curl
sudo apt install ufw

```

```bash
curl -sS https://get.symfony.com/cli/installer | bash 
```

```bash
sudo mv ~/.symfony*/bin/symfony /usr/local/bin/symfony 
```
 
```bash
sudo apachectl -v 
```
```bash
sudo ufw allow 80 
```
```bash
sudo ufw restart 
```
```bash
sudo systemctl start apache2 
```
```bash
sudo ufw reload 
```
```bash
–sudo systemctl status apache2 
```
```bash
sudo systemctl start apache2 
```
```bash
sudo system restart apache2 
```

sudo   

Transférer du projet dans www sur la VM 

 

