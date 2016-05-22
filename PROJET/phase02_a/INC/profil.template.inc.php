<div id="f_login" class="profil">
        <form method="post" id="" action="testForm.php">
            <fieldset>
                <legend>Profil (<label for="modif">modifier</label><input type="checkbox" name="modif" id="modif">)</legend>
                <p>
                    <label for="id_profil">Id : </label>
                    <input type="number" name="id_profil" id="id_profil" min="1" max="100">
                </p>   <p>
                    <label for="avatar">Avatar : </label>
                    <input type="file" name="avatar" id="avatar">
                </p>   <p>
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
                    <label for=verif_email>Verification email : </label>
                    <input type="email" name="verif_email" id="verif_email" required placeholder="Enter a valid email address">
                </p>
                <p>
                    <label for="question">Question secrete : </label>
                    <input type="text" name="question" id="question">
                </p>
                <p>
                    <label for="reponse_question">Réponse secrete : </label>
                    <input type="password" name="reponse_question" id="reponse_question">
                </p>
                <p>
                    <label for="verif_question">Vérification réponse secrete : </label>
                    <input type="password" name="verif_question" id="verif_question">
                </p>
                <p>
                    <input type="submit" name="profil" id="profil" value="Sauvegarder">
                </p>
            </fieldset>
        </form>
</div>
