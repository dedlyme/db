

<?php require "views/components/head.php";?>
<?php require "views/components/navbar.php";?>

<form method="POST">
    <label>title:
    <input name="title" value="<?= $_POST["title"] ?? ""?>">
    <?php if (isset($errors["title"])){ ?>
    <p class="invalid-data"><?= $errors["title"] ?></p>
<?php } ?>
    </label>
    <label>category ID:
    <select name="category-id">
    <option value="1">sport</option>
    <option value="2">music</option>
    <option value="3">food</option>
    </select>
    <?php if (isset($errors["category-id"])){ ?>
    <p class="invalid-data"><?= $errors["category-id"] ?></p>
<?php } ?>
    </label>
    <button>Save</button>
</form>

<?php require "views/components/footer.php";?>