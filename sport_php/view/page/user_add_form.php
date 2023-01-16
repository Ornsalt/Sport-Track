<?php include VIEW_DIR."/static/header.html"; ?>
    <body>
        <p>Register your account.</p>

        <form action="/user_add" method="post">
            <div>
                <input type="text" id="email" name="email" placeholder="email" required>
                <input type="text" id="password" name="password" placeholder="password" required>
            </div>
            <div>
                <input type="text" id="name" name="name" placeholder="Your name" required>
                <input type="text" id="lastname" name="lastname" placeholder="Your lastname" required>
                <input type="date" id="birthday" name="birthday" min="1900-01-01" max="2022-12-31" required>
            </div>
            <div>
                <input type="text" id="height" name="height" placeholder="Your height" required>
                <input type="text" id="weight" name="weight" placeholder="Your weight" required>
                <select name="sex" id="sex" required>
                    <option value="">choose gender</option>
                    <option value="♂">♂</option>
                    <option value="♀">♀</option>
                    <option value="?">?</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </body>
<?php include VIEW_DIR."/static/footer.html"; ?>