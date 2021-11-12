<div class="container">    
    <div class="row">
        <div class="col-lg-12 ">
            <h1 style="text-align:center;">История заказов</h1>
        </div>
    </div>


    <div class="row">                        
        <div class="col-lg-12 ">
            <ul class="cabinet-list"> 
                <?php foreach($orders as $item): ?>
                    <li><?= $item->item ?> <span> - </span> <?= $item->quantity ?> шт.</span>  <span> - </span><?= $item->price ?> руб.</li>
                <?php endforeach ?>
            </ul>
    </div>
</div>