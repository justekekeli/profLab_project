<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>TestPage1</title>
    </head>
    <body>
    <h1>Connexion</h1>
    <form action="../index.php?action=auth" method="post">
        <input type="email" name="email" placeholder="entrez votre email" required/>
        <input type="password" name="pwd" placeholder="entrez votre mot de passe" required/>
        <input type="submit" value="valider"/>
    </form>
    <?php if(!empty($message)){ echo "<p style='color:red;'>$message</p>";} ?>
    <h1>Inscription</h1>
    <form action="../index.php?action=signup" method="post">
        <input type="email" name="email" placeholder="entrez votre email" required/>
        <input type="password" name="pwd" placeholder="entrez votre mot de passe" required/>
        <label for="role">Vous vous inscrivez en tant que :</label>
        <select name="role" id="role">
        <option value="student">Apprenant</option>
        <option value="prof">Professeur</option>
        </select>
        <input type="submit" value="valider"/>
    </form>
    </body>
</html>