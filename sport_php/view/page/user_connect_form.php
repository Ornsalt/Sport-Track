<?php include VIEW_DIR."/static/header.html"; ?>
        <div>
            <p>Log in to your account</p>

            <form action="/connect" method="post">
                <div>
                    <input type="text" id="email" name="email" placeholder="email" required>
                </div>

                <div>
                    <input type="text" id="password" name="password" placeholder="password" required>
                </div>

                <div>
                    <button type="submit"><span>Send</span></button>
                </div>
            </form>
        </div>
<?php include VIEW_DIR."/static/footer.html"; ?>