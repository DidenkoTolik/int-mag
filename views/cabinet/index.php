<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <h1>Кабінет користувача</h1>

                <h3>Вітаємо, <?php echo $user['name'];?>!</h3>
                <ul>
                    <li><a href="/cabinet/edit">Редагувати дані</a></li>
                    <li><a href="/cabinet/history">Історія покупок</a></li>
                </ul>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>