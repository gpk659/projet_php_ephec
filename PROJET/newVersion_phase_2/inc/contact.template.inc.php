<div id='f_login' class="contact">
        <form method='post' action='testForm.php'>
            <fieldset>
                <legend>Contact</legend>
                <p>
                    <label for=username>Email : </label>
                    <input type=email name=email id=email required>
                </p>
                <p>
                    <label for=verif_email>Verification email : </label>
                    <input type="email" name="verif_email" id="verif_email" required placeholder="Enter a valid email address">
                </p>
                <p>
                    <label for=sujet>Sujet </label>
                    <input type="text" name="sujet" id="sujet" required>
                </p>
                <p>
                    <label for=message>Message </label>
                    <textarea rows="5" cols="25" name="message" id="message" required placeholder="Votre message ici..."></textarea>
                </p>
                <p>
                    <input type=submit name=contact id=contect value=Envoyer>
                </p>
            </fieldset>
        </form>
</div>
