
<h1>ПОЧТАААААААААААА!!!!!!!!!!!!</h1>

<?php foreach($session['cart'] as $item ): ?>
    <h3><?= $item['title'] ?></h3>
    <p><?= $item['qty'] ?></p>
    <p><?= $item['price'] ?></p>
    <p><?= $item['id'] ?></p>
<?php endforeach ?>