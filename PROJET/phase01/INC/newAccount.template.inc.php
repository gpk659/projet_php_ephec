<div id="f_login" class="inscription">
        <form method="post" action="testForm.php">
            <fieldset>
                <legend>Nouveau Compte</legend>
                <p>
                    <label for="username">Pseudo : </label>
                    <input type="text" name="username" id="username">
                </p>
                <p>
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password">
                </p>
                <p>
                    <label for="password">Vérification de mot de passe : </label>
                    <input type="password" name="verif_password" id="verif_password">
                </p>
                <p>
                    <label for=username>Email : </label>
                    <input type=email name=email id=email required>
                </p>
                <p>
                    <label for=email>Verification email : </label>
                    <input type="email" name="email" id="email" required placeholder="Enter a valid email address">
                </p>
                <p>
                    <input type="submit" name="inscription" id="inscription" value="Inscription">
                </p>
            </fieldset>
        </form>
</div>
