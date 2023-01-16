<?php include VIEW_DIR."/static/header.html"; ?>

<form action="/upload" method="POST" enctype="multipart/form-data">
    <label for="fileJson">insert .json file</label><br>
    <input type="file"  name="fichierJson" accept=".json" required><br>
    <input type="submit" value="Valider"><br>
</form>
<?php include VIEW_DIR."/static/footer.html"; ?>