# E-Inscription

![image (2).png](<https://media-hosting.imagekit.io//22a2b80c8c8e47cf/image%20(2).png?Expires=1836916609&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=dIooaW6GajeSfJA437fSLZMbvGONJqK1qRT5Bs1JUHHI5tgxzFsrNAr6xBm7tlMzDBWzLXskSmtYBwCEnHAuqQeyAy4pmU9eUvZe7xqFHM81H~Gw-jjXmpADOB2uFWmSgSE4upqZ5TBsY8dkA2C0l5Kc9a7J0coQUUzltsEG7EklgNz2uR8d0l0XNzWdol4mMiDFzTTry9QwOEeAs0OziYwYVP3e~lzBS1XlF0oy~y7DK0JJnUJKj-pAm6mKvm4BoOoue2iLkJc~l9gwHLHkWIWKREDTLjnaYUXfkqvRNnURxs9-NmUl8t6X5eqqDFBKTd7kT59A2LOX5nAo3PLFlw__>)
# Les prérequis : 
`-Pour l’installation des applications ainsi que de la base de données il est nécessaire d’avoir ces éléments. Voici la liste des prérequis, merci de ne pas faire des procéder à l’installations des composant sans lire la documentation et en la suivant.`

`-Symfony CLI` <br>
`-PHP (Lastest version)` <br>
`MariaDB (Lastest version)`<br>
`-DSRF : https://github.com/GouvernementFR/dsfr/releases/tag/v1.13.0` <br>
`- node.js` <br>
# Pour installer les composant nécéssaires :

 `Mettez à jour les paquets : `

`sudo apt update && sudo apt upgrade -y` 

<h2> Installation Mariadb</h2>

`Installez MariaDB :` 

`sudo apt install mariadb-server -y` 
  

<h4>Vérifiez l'état de MariaDB :</h4>

`sudo systemctl status mariadb` 
  

<h4>Démarrez et activez MariaDB au démarrage : </h4>

`sudo systemctl start mariadb` 
`sudo systemctl enable mariadb` 
  

`Sécurisez l'installation de MariaDB :` 

`sudo mysql_secure_installation `
  

`Définissez un mot de passe pour l'utilisateur root.` 

`Désactivez les connexions root distantes. `

`Configurez l'adresse de liaison (bind address) :` 

`sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf `
  

`Modifiez ou ajoutez la ligne suivante : bind_address = 0.0.0.0` 
  

`Redémarrez MariaDB : `

`sudo systemctl restart mariadb` 
  

`Créez un utilisateur et accordez des privilèges : Connectez-vous à MariaDB :` 

`sudo mysql -u root -p `
  

`Créez un utilisateur : CREATE USER 'nouvel_utilisateur'@'%' IDENTIFIED BY 'mot_de_passe';` 
  

`Accordez tous les privilèges : GRANT ALL PRIVILEGES ON *.* TO 'nouvel_utilisateur'@'%' WITH GRANT OPTION;` 
  

`Quittez MariaDB : EXIT;`
